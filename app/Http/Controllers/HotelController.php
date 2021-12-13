<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\FasilitasHotel;
use App\Models\FasilitasUmumHotel;
use App\Models\KebijakanHotel;
use DataTables;
use Validator;
class HotelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Hotel::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,2,',','.');
                    })
                    ->addColumn('kamar', function($row){
                        $btn = '<a href='.route('kamar', ['id' => $row->id]).' class="btn btn-success btn-sm" title="Kamar">
                                    <i class="fas fa-bed"></i>
                                </a>';
                        return $btn;
                    })
                    ->addColumn('action', function($row){
                        // $btn = '<a href='.$row->created_at.' type="button" class="btn btn-success btn-icon">
                        //             <i class="fa fa-eye"></i>
                        //         </a>
                        //         <a href='.$row->created_at.' type="button" class="btn btn-warning btn-icon">
                        //             <i class="fa fa-edit"></i>
                        //         </a>
                        //         <button type="button" class="btn btn-danger btn-icon">
                        //             <i class="fa fa-trash"></i>
                        //         </button>';
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
                    ->rawColumns(['action','kamar'])
                    ->make(true);
        }
        $data['icons'] = [
            ['icon' => 'wifi.png', 'value' => 'Wifi'],
            ['icon' => 'parked-car.png', 'value' => 'Parkir'],
            ['icon' => 'air-conditioner.png', 'value' => 'AC'],
            ['icon' => 'restaurant.png', 'value' => 'Restoran'],
            ['icon' => 'meeting.png', 'value' => 'Ruang Rapat'],
        ];
        return view('backend.hotel.index_new', $data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_hotel'  => 'required',
            'alamat_hotel'  => 'required',
            'deskripsi_hotel'  => 'required',
            'layanan'  => 'required',
            'price'  => 'required',
            // 'nama_fasilitas'  => 'required',
            // 'icon'  => 'required',
            // 'nama_fasilitas_umum'  => 'required',
            // 'judul_kebijakan'  => 'required',
            // 'deskripsi_kebijakan'  => 'required',
        ];
 
        $messages = [
            'nama_hotel.required'  => 'Judul Hotel Wajib Diisi.',
            'alamat_hotel.required'  => 'Alamat Hotel Wajib Diisi.',
            'deskripsi_hotel.required'  => 'Deskripsi Hotel Wajib Diisi.',
            'layanan.required'  => 'Layanan Hotel Wajib Diisi.',
            'price.required'  => 'Harga Tiket Wajib Diisi.',
            // 'nama_fasilitas.required'  => 'Fasilitas Populer Wajib Diisi.',
            // 'icon.required'  => 'Icon Wajib Diisi.',
            // 'nama_fasilitas_umum.required'  => 'Fasilitas Umum Wajib Diisi.',
            // 'judul_kebijakan.required'  => 'Judul Kebijakan Wajib Diisi.',
            // 'deskripsi_kebijakan.required'  => 'Deskripsi Kebijakan Hotel Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            // $input = $request->all();
            $input['nama_hotel'] = $request->nama_hotel;
            $input['alamat'] = $request->alamat_hotel;
            $input['deskripsi'] = $request->deskripsi_hotel;
            $input['layanan'] = $request->layanan;
            $input['price'] = $request->price;

            $hotel = Hotel::create($input);

            foreach ($request->fasilitas_populer as $key => $fp) {
                // $inputFasilitasPopular[] = [
                //     'hotel_id' => $hotel->id,
                //     'nama_fasilitas' => $fp['nama_fasilitas'],
                //     'icon' => $fp['icon'],
                // ];
                FasilitasHotel::create([
                    'hotel_id' => $hotel->id,
                    'nama_fasilitas' => $fp['nama_fasilitas'],
                    'icon' => $fp['icon'],
                ]);

            }

            foreach ($request->fasilitas_umum as $key => $fu) {
                // $inputFasilitasPopular[] = [
                //     'hotel_id' => $hotel->id,
                //     'nama_fasilitas' => $fp['nama_fasilitas'],
                //     'icon' => $fp['icon'],
                // ];
                FasilitasUmumHotel::create([
                    'hotel_id' => $hotel->id,
                    'nama_fasilitas_umum' => $fu['nama_fasilitas_umum'],
                ]);

            }

            foreach ($request->kebijakan_hotel as $key => $kh) {
                // $inputFasilitasPopular[] = [
                //     'hotel_id' => $hotel->id,
                //     'nama_fasilitas' => $fp['nama_fasilitas'],
                //     'icon' => $fp['icon'],
                // ];
                KebijakanHotel::create([
                    'hotel_id' => $hotel->id,
                    'judul' => $kh['judul_kebijakan'],
                    'deskripsi' => $kh['deskripsi_kebijakan'],
                ]);

            }

            if($hotel){
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
    }

    public function detail($id)
    {
        $data['hotel'] = Hotel::find($id);
        return view('backend.hotel.detail', $data);
    }

    public function destroy($id)
    {

        $hotel = Hotel::find($id);
        $fasilitas_hotel = FasilitasHotel::where('hotel_id',$id)->get();
        $fasilitas_umum_hotel = FasilitasUmumHotel::where('hotel_id',$id)->get();
        $kebijakan_hotel = KebijakanHotel::where('hotel_id',$id)->get();

        if(!empty($hotel)){
            // dd($fasilitas_hotel);
            $hotel->delete();
            $fasilitas_hotel->each->delete();
            $fasilitas_umum_hotel->each->delete();
            $kebijakan_hotel->each->delete();

            $message_title="Berhasil !";
            $message_content="Hotel ".$hotel->nama_hotel." Berhasil Dihapus";
            $message_type="success";
            $message_succes = true;

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
                'error' => 'Data Tidak Berhasil Dihapus'
            ]
        );

    }
}
