<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Hotel;
use App\Models\KamarHotel;
use App\Models\KamarHotelPopuler;
use App\Models\KebijakanKamarHotel;
use App\Models\FasilitasKamarHotel;
use App\Models\ImageKamarHotel;
use App\Models\RoomHotel;
use DataTables;
use Validator;
use Input;

class KamarHotelController extends Controller
{
    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = KamarHotel::where('hotel_id',$id)->get();
            // dd($data);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,0,",",".");
                    })
                    ->addColumn('gambar_kamar_hotel', function($row){
                        $btn = '<button onclick="kamar('.$row->id.')" class="btn btn-primary btn-sm" title="Upload Gambar Kamar">
                                    <i class="fas fa-upload"></i> Upload Gambar Kamar
                                </button>';
                        return $btn;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href='.route('hotel.detail', ['id' => $row->id]).' class="btn btn-success btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action','gambar_kamar_hotel','kamar'])
                    ->make(true);
        }
        $data['hotel'] = Hotel::find($id);
        return view('backend.kamar_hotel.index', $data);
    }

    public function simpan1(Request $request)
    {
        foreach ($request->file('addimage') as $key => $img) {
            // $extension = time().'.'.$img->getClientOriginalExtension();
            // $destinationPath = public_path('backend/assets2/images/kamar_hotel');
            // $img->move($destinationPath, $extension);
            dd($img->getClientOriginalExtension());
        }
        // dd(time().'.'.$request->addimage->getClientOriginalExtension());
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_kamar'  => 'required',
            'deskripsi_kamar'  => 'required',
            'price'  => 'required',
            'qty'  => 'required',
            // 'fasilitas_kamar_populer'  => 'required',
            // 'fasilitas_kamar_populer_detail'  => 'required',
            // 'fasilitas_kamar'  => 'required',
            // 'judul_kebijakan_kamar'  => 'required',
            // 'deskripsi_kebijakan_kamar'  => 'required',
            // 'upload_kamar'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'nama_kamar.required'  => 'Kamar Hotel Wajib Diisi.',
            'deskripsi_kamar.required'  => 'Deskripsi Kamar Hotel Wajib Diisi.',
            'price.required'  => 'Harga Kamar Hotel Wajib Diisi.',
            'qty.required'  => 'Jumlah Kamar Wajib Diisi.',
            // 'fasilitas_kamar_populer.required'  => 'Fasilitas Kamar Populer Wajib Diisi.',
            // 'fasilitas_kamar.required'  => 'Fasilitas Kamar Hotel Wajib Diisi.',
            // 'judul_kebijakan_kamar.required'  => 'Judul Kebijakan Kamar Hotel Wajib Diisi.',
            // 'deskripsi_kebijakan_kamar.required'  => 'Deskripsi Kebijakan Kamar Hotel Wajib Diisi.',
            // 'upload_kamar.required'  => 'Upload Foto Kamar Hotel Wajib Diisi.',
            // 'upload_kamar.max'  => 'Upload Foto Kamar Hotel Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->passes()){
            // $input = $request->all();
            // $hotel_id = Hotel::select('id')->where('id',$request['id_hotel'])->first();
            $input['hotel_id'] = $request['id_hotel'];
            $input['nama_kamar'] = $request->nama_kamar;
            $input['slug'] = Str::slug($request->nama_kamar);
            $input['deskripsi_kamar'] = $request->deskripsi_kamar;
            $input['price'] = $request->price;
            $input['qty'] = $request->qty;

            $kamar_hotel = KamarHotel::firstOrCreate($input);
            // $room_hotel = RoomHotel::firstOrCreate([
            //     'kamar_hotel_id' => $kamar_hotel->id,
            //     'jumlah_kamar' => $request->jumlah_kamar
            // ]);

            foreach ($request->fasilitas_kamar_hotel_populer as $key => $fkhp) {
                KamarHotelPopuler::create([
                    'kamar_hotel_id' => $kamar_hotel->id,
                    'fasilitas_kamar_populer' => $fkhp['fasilitas_kamar_populer'],
                    'fasilitas_kamar_populer_detail' => $fkhp['fasilitas_kamar_populer_detail'],
                ]);
            }

            foreach ($request->fasilitas_kamar_hotel as $key => $fkh) {
                FasilitasKamarHotel::create([
                    'kamar_hotel_id' => $kamar_hotel->id,
                    'fasilitas_kamar' => $fkh['fasilitas_kamar'],
                ]);
            }

            foreach ($request->kebijakan_kamar_hotel as $key => $kkh) {
                KebijakanKamarHotel::create([
                    'kamar_hotel_id' => $kamar_hotel->id,
                    'judul_kebijakan_kamar' => $kkh['judul_kebijakan_kamar'],
                    'deskripsi_kebijakan_kamar' => $kkh['deskripsi_kebijakan_kamar'],
                ]);
            }
            // dd(time().'.'.$request->image1->getClientOriginalExtension());

            // $countImage = count($request->foto_kamar_hotel);
            // $image = $request->file('image');
            // $destinationPath = public_path('backend/assets2/images/kamar_hotel');

            // for ($i=0; $i < $countImage; $i++) { 
            //     $data = new ImageKamarHotel;
            //     $file = $image[$i];

            //     if ($file->isValid()) {
            //         $extension = $file->getClientOriginalExtension(); // file extension
            //         $fileName = uniqid(). '.' .$extension; // file name with extension
            //         $file->move($destinationPath, $fileName); // move file to our uploads path
            
            //         $data->image = $fileName;
            //         $data->kamar_hotel_id = $kamar_hotel->id;
            //         $data->save();
            //     } else {
            //         // handle error here
            //     }
            // }

            // dd(count($request->foto_kamar_hotel));


            // dd($input['image'] = time().'.'.$request->image->getClientOriginalExtension());
            
            // dd($request->foto_kamar_hotel);

            // $hotel = Hotel::find($request['id_hotel']);
            // dd($input);

            if($kamar_hotel){
                $message_title="Berhasil !";
                $message_content="Hotel ".$request->nama_hotel." Berhasil Terinput";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);
        }

        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
        // $input = $request->all();
        // dd($input);
    }
}
