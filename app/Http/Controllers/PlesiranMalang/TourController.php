<?php

namespace App\Http\Controllers\PlesiranMalang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \App\Models\PlesiranMalang\Tour;
use \App\Models\PlesiranMalang\TourImages;

use DataTables;
use Validator;
use File;

class TourController extends Controller
{
    function __construct(
        Tour $tour
    )
    {
        $this->tour = $tour;
    }

    public function tour(Request $request)
    {
        if ($request->ajax()) {
            $data = Tour::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            // ->addColumn('images', function($row){
                            //     return '<img src='.asset('backend_2023/images/tour/').'/'.$row->images.' width="150">';
                            // })
                            ->addColumn('action', function($row){
                                // return '<img src='.asset('backend_2023/images/tour/').'/'.$row->images.' width="150">';
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return view('backend_new_2023.plesiran_malang.tour.index');
    }

    public function tour_create()
    {
        return view('backend_new_2023.plesiran_malang.tour.create');
    }

    public function tour_simpan(Request $request)
    {
        $rules = [
            'nama_tour'  => 'required',
            'deskripsi'  => 'required',
            'durasi'  => 'required',
            'grup'  => 'required',
            'age'  => 'required',
            'lokasi'  => 'required',
            'jam_mulai'  => 'required',
            'harga'  => 'required',
            // 'email'  => 'required|unique:cooperation',
        ];
 
        $messages = [
            'nama_tour.required'  => 'Nama Tour wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'durasi.required'  => 'Durasi wajib diisi.',
            'grup.required'  => 'Grup wajib diisi.',
            'age.required'  => 'Umur wajib diisi.',
            'lokasi.required'  => 'Lokasi wajib diisi.',
            'jam_mulai.required'  => 'Jam Mulai wajib diisi.',
            'harga.required'  => 'Harga wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->nama_tour);
            $input['nama_tour'] = $request->nama_tour;
            $input['deskripsi'] = $request->deskripsi;
            $input['durasi'] = $request->durasi;
            $input['grup'] = $request->grup;
            $input['age'] = $request->age;
            $input['lokasi'] = $request->lokasi;
            $input['jam_mulai'] = $request->jam_mulai;
            $input['harga'] = $request->harga;

            // if ($request->file('group_images')) {
            // }
            $path = public_path('plesiran_malang/assets/images/tour');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }  

            foreach ($request->group_images as $key => $value) {
                $image = $value['images'];
                // $image->move($path);
                // dd($image);
                $img = \Image::make($image->path());
                $img = $img->encode('webp', 75);
                $saveImages = time().'.webp';
                $img->save(public_path('plesiran_malang/assets/images/tour/').$saveImages);
                $titleImages[] = [
                    'images' => $saveImages
                ];
            }

            $input['images'] = json_encode($titleImages);

            // dd($image);

            $tour = $this->tour->create($input);

            if($tour){
                $message_title="Berhasil !";
                $message_content="Paket Travelling ".$request->nama_tour." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }
    
            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return redirect()->route('b.plesiran_malang.tour')->with($array_message);
        }

        dd($validator->errors()->all());

        // dd($request->all());
        
    }
}
