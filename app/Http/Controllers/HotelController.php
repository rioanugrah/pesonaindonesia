<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Hotel;
use App\Models\CheckRoom;
use App\Models\FasilitasHotel;
use App\Models\FasilitasUmumHotel;
use App\Models\KebijakanHotel;
use App\Models\KamarHotel;
use App\Models\ImageHotel;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;

use App\Exports\HotelExport;
use App\Imports\HotelImport;
use Maatwebsite\Excel\Facades\Excel;
use \Carbon\Carbon;

use DataTables;
use Validator;
class HotelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Hotel::join('kamar_hotel', 'kamar_hotel.hotel_id', '=', 'hotel.id')->get();
            $data = Hotel::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kamar', function($row){
                        $btn = '<a href='.route('kamar', ['id' => $row->id]).' class="btn btn-success btn-sm" title="Kamar">
                                    <i class="fas fa-bed"></i>
                                </a>';
                        return $btn;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="gambar('.$row->id.')" class="btn btn-success btn-sm" title="Upload Gambar Hotel">
                                    <i class="fas fa-upload"></i> Upload Gambar Hotel
                                </button>
                                <button onclick="room('.$row->id.')" class="btn btn-primary btn-sm" title="Upload Gambar Hotel">
                                    <i class="fas fa-bed"></i> Check Room
                                </button>
                                <a href='.route('hotel.detail', ['id' => $row->id]).' class="btn btn-success btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
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
        $data['provinsis'] = Provinsi::pluck('nama','id');
        // dd($data['provinsis']);
        // return view('backend.hotel.hotel', $data);
        return view('backend.hotel.index_new', $data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_hotel'  => 'required',
            'alamat_hotel'  => 'required',
            'deskripsi_hotel'  => 'required',
            'layanan'  => 'required',
            // 'price'  => 'required',
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
            // 'price.required'  => 'Harga Tiket Wajib Diisi.',
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
            $input['provinsi'] = $request->provinsi;
            $input['kota_kabupaten'] = $request->kota_kabupaten;
            $input['kecamatan'] = $request->kecamatan;
            $input['slug'] = Str::slug($request->nama_hotel);
            // $input['price'] = $request->price;

            if(auth()->user()->role == 1){
                $array_message = array(
                    'success' => false,
                    'message_title' => 'Access Denied',
                    'message_content' => 'Anda Tidak Memiliki Akses',
                    'message_type' => "error",
                );
                return response()->json($array_message);
            }else{
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
                    $message_content="Hotel ".$request->nama_hotel." Berhasil Ditambah";
                    $message_type="success";
                    $message_succes = true;

                    $sitemap = \App\Models\Post::create([
                        'title' => route('frontend.hotelDetail',['slug' => Str::slug($request->nama_hotel)]),
                        'slug' => Str::slug($request->nama_hotel),
                        'body' => $request->deskripsi_hotel
                    ]);
                }
    
                $array_message = array(
                    'success' => $message_succes,
                    'message_title' => $message_title,
                    'message_content' => $message_content,
                    'message_type' => $message_type,
                );
                return response()->json($array_message);
            }

        }

        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function select_kab_kota(Request $request)
    {
        $get_id = (int)$request->id;
        $select_kab_kota = KabupatenKota::where('id_provinsi', $get_id)->pluck('nama', 'id');

        return response()->json($select_kab_kota);
    }
    public function select_kecamatan(Request $request)
    {
        $get_id = (int)$request->id;
        $select_kecamatan = Kecamatan::where('id_kota', $get_id)->pluck('nama', 'id');

        return response()->json($select_kecamatan);
    }

    public function upload_image(Request $request)
    {
        $rules = [
            'image'  => 'required',
        ];
 
        $messages = [
            'image.required'  => 'Upload Gambar Hotel Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->passes()){
            if(auth()->user()->role == 1){
                $array_message = array(
                    'success' => false,
                    'message_title' => 'Access Denied',
                    'message_content' => 'Anda Tidak Memiliki Akses',
                    'message_type' => "error",
                );
                return response()->json($array_message);
            }else{
                $image = $request->file('image');
                $extension = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('backend/assets2/images/hotel');
                $image->move($destinationPath, $extension);

                $input['hotel_id'] = $request->image_id;
                $input['image'] = $extension;
                $imageHotel = ImageHotel::create($input);
    
                if($imageHotel){
                    $message_title="Berhasil !";
                    $message_content="Hotel ".$request->nama_hotel." Berhasil Ditambah";
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
        }
    }

    public function detail_image($id)
    {
        $data['hotel'] = Hotel::find($id);
        return response()->json($data);
        // return view('backend.hotel.detail', $data);
    }

    public function detail($id)
    {
        $data['hotel'] = Hotel::find($id);
        return view('backend.hotel.detail', $data);
    }

    public function edit($id)
    {
        $data['hotel'] = Hotel::find($id);
        // $data['fasilitas_hotel'] = FasilitasHotel::where('hotel_id',$id)->get();
        // $data['fasilitas_umum_hotel'] = FasilitasUmumHotel::where('hotel_id',$id)->get();
        // $data['kebijakan_hotel'] = KebijakanHotel::where('hotel_id',$id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $rules = [
            'edit_nama_hotel'  => 'required',
            'edit_alamat_hotel'  => 'required',
            'edit_deskripsi_hotel'  => 'required',
            'edit_layanan'  => 'required',
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
            // 'nama_fasilitas.required'  => 'Fasilitas Populer Wajib Diisi.',
            // 'icon.required'  => 'Icon Wajib Diisi.',
            // 'nama_fasilitas_umum.required'  => 'Fasilitas Umum Wajib Diisi.',
            // 'judul_kebijakan.required'  => 'Judul Kebijakan Wajib Diisi.',
            // 'deskripsi_kebijakan.required'  => 'Deskripsi Kebijakan Hotel Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['nama_hotel'] = $request->edit_nama_hotel;
            $input['alamat'] = $request->edit_alamat_hotel;
            $input['deskripsi'] = $request->edit_deskripsi_hotel;
            $input['provinsi'] = $request->edit_provinsi;
            $input['kota_kabupaten'] = $request->edit_kota_kabupaten;
            $input['kecamatan'] = $request->edit_kecamatan;
            $input['layanan'] = $request->edit_layanan;

            // dd($input);
            
            if(auth()->user()->role == 1){
                $array_message = array(
                    'success' => false,
                    'message_title' => 'Access Denied',
                    'message_content' => 'Anda Tidak Memiliki Akses',
                    'message_type' => "error",
                );
                return response()->json($array_message);
            }
            else{
                $hotel = Hotel::find($request->edit_id)->update($input);
    
                if($hotel){
                    $message_title="Berhasil !";
                    $message_content="Data Hotel ".$request->edit_nama_hotel." Berhasil Update";
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
        }
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

    public function checkRoom($id, Request $request)
    {
        // $checkRoom = CheckRoom::where('hotel_id',$id)->get();
        
        // foreach ($checkRoom as $key => $value) {
        //     $checkDataRoom[] = [
        //         'kode_booking' => $value->kode_booking,
        //         'kamar' => $value->kamar->nama_kamar,
        //         'check_in' => Carbon::parse($value->check_in)->isoFormat('LLLL'),
        //         'check_out' => Carbon::parse($value->check_out)->isoFormat('LLLL'),
        //     ];
        // }
        
        // return response()->json([
        //     'status' => true,
        //     'data' => $checkDataRoom
        // ],201);

        if ($request->ajax()) {
            // $data = Hotel::join('kamar_hotel', 'kamar_hotel.hotel_id', '=', 'hotel.id')->get();
            $data = CHeckRoom::where('hotel_id',$id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kamar', function($row){
                        return $row->kamar->nama_kamar;
                    })
                    ->addColumn('kode_booking', function($row){
                        return '<b>'.$row->kode_booking.'</b>';
                    })
                    ->addColumn('check_in', function($row){
                        if($row->check_in != null){
                            return $row->check_in;
                        }else{
                            return '-';
                        }
                    })
                    ->addColumn('check_out', function($row){
                        if($row->check_out != null){
                            return $row->check_out;
                        }else{
                            return '-';
                        }
                    })
                    ->addColumn('status', function($row){
                        if($row->check_in != null && $row->check_out != null){
                            return '<span class="text-danger"><b>CHECK OUT</b></span>';
                        }elseif($row->check_in != null){
                            return '<span class="text-success"><b>CHECK IN</b></span>';
                        }
                        // if($row->check_in){
                        //     return '<span class="text-success">IN</span>';
                        // }elseif($row->check_in != null && $row->check_out != null){
                        //     return '<span class="text-danger">OUT</span>';
                        // }
                    })
                    // ->addColumn('action', function($row){
                    //     $btn = '<button onclick="gambar('.$row->id.')" class="btn btn-success btn-sm" title="Upload Gambar Hotel">
                    //                 <i class="fas fa-upload"></i> Upload Gambar Hotel
                    //             </button>
                    //             <button onclick="room('.$row->id.')" class="btn btn-primary btn-sm" title="Upload Gambar Hotel">
                    //                 <i class="fas fa-bed"></i> Check Room
                    //             </button>
                    //             <a href='.route('hotel.detail', ['id' => $row->id]).' class="btn btn-success btn-sm" title="Detail">
                    //                 <i class="fas fa-eye"></i>
                    //             </a>
                    //             <button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                    //                 <i class="fas fa-pencil-alt"></i>
                    //             </button>
                    //             <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                    //                 <i class="fas fa-trash"></i>
                    //             </button>';
                    //     return $btn;
                    // })
                    ->rawColumns(
                        [
                            // 'action',
                            'kamar','status','kode_booking'
                        ]
                    )
                    ->make(true);
        }
    }

    public function export() 
    {
        // dd('test');
        $export = Carbon::now()->isoFormat('LL').' - Hotels.xlsx';
        return Excel::download(new HotelExport, $export);
        // return redirect()->back();
    }

    public function import() 
    {
        Excel::import(new HotelImport,request()->file('upload_excel'));
        return redirect()->back();
    }

    
}
