<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\KamarHotel;
use App\Models\KamarHotelPopuler;
use App\Models\KebijakanKamarHotel;
use App\Models\FasilitasKamarHotel;
use App\Models\ImageKamarHotel;
use DataTables;
use Validator;
use Input;

class KamarHotelController extends Controller
{
    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = KamarHotel::where('hotel_id',$id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,2,".", ",");
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
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data['hotel'] = Hotel::find($id);
        return view('backend.kamar_hotel.index', $data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_kamar'  => 'required',
            'deskripsi_kamar'  => 'required',
            'price'  => 'required',
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
            $input['deskripsi_kamar'] = $request->deskripsi_kamar;
            $input['price'] = $request->price;

            $kamar_hotel = KamarHotel::create($input);

            // foreach ($request->fasilitas_kamar_hotel_populer as $key => $fkhp) {
            //     KamarHotelPopuler::create([
            //         'kamar_hotel_id' => $kamar_hotel->id,
            //         'fasilitas_kamar_populer' => $fkhp['fasilitas_kamar_populer'],
            //         'fasilitas_kamar_populer_detail' => $fkhp['fasilitas_kamar_populer_detail'],
            //     ]);
            // }

            // foreach ($request->fasilitas_kamar_hotel as $key => $fkh) {
            //     FasilitasKamarHotel::create([
            //         'kamar_hotel_id' => $kamar_hotel->id,
            //         'fasilitas_kamar' => $fkh['fasilitas_kamar'],
            //     ]);
            // }

            // foreach ($request->kebijakan_kamar_hotel as $key => $kkh) {
            //     KebijakanKamarHotel::create([
            //         'kamar_hotel_id' => $kamar_hotel->id,
            //         'judul_kebijakan_kamar' => $kkh['judul_kebijakan_kamar'],
            //         'deskripsi_kebijakan_kamar' => $kkh['deskripsi_kebijakan_kamar'],
            //     ]);
            // }

            // foreach ($request->foto_kamar_hotel as $key => $fkh) {
            //     // $fkh['image'] = Input::file($fkh['image']);
            //     $inputImage = $fkh['image'];
            //     $fkh['image'] = time().'.'.$inputImage->guessExtension();
            //     $fkh['image']->move(public_path('backend/assets2/images/kamar_hotel'), $fkh['image']);
            //     // ImageKamarHotel::create([
            //     //     'kamar_hotel_id' => $kamar_hotel->id,
            //     //     'image' => $fkh['image'],
            //     // ]);
            //     $image[] = $fkh['image'];
            // }
            // dd($image);


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
