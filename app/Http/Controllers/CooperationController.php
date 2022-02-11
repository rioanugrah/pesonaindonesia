<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cooperation;
use App\Mail\CooperationMail;
use App\Models\KabupatenKota;
use App\Models\Perusahaan;
use App\Models\Provinsi;
use App\Models\Country;
use Illuminate\Support\Facades\Mail;
use PDF;
use File;
use DataTables;
use Validator;
class CooperationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cooperation::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        if($row->status == 0){
                            return '<span class="badge bg-warning">Waiting</span>';
                        }elseif($row->status == 1){
                            return '<span class="badge bg-info">Process</span>';
                        }elseif($row->status == 2){
                            return '<span class="badge bg-success">Success</span>';
                        }else{
                            return '<span class="alert alert-danger">Rejected</span>';
                        }
                    })
                    // ->addColumn('berkas', function($row){
                    //     return '<a href="'.url('backend/berkas/coorporate/'.$row->berkas).'" target="_blank">'.$row->berkas.'</a>';
                    // })
                    ->addColumn('action', function($row){
                        $btn = '
                                <a href="'.route('cooperation.download',['id' => $row->id]).'" class="btn btn-primary btn-sm" title="Download File" target="_blank">
                                    <i class="fas fa-print"></i> Download File
                                </a>
                                <button onclick="berkas('.$row->id.')" class="btn btn-primary btn-sm" title="Upload Berkas">
                                    <i class="fas fa-upload"></i> Upload Berkas
                                </button>
                                <button onclick="detail('.$row->id.')" class="btn btn-success btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        // <a href='.route('cooperation.download', ['id' => $row->id]).' class="btn btn-primary btn-sm" title="Download" target="_blank">
                        //     <i class="fas fa-print"></i> Download File
                        // </a>
                        //    $btn = '<button onclick="show('.$row->id.')" class="btn btn-warning dim"><i class="fa fa-edit"></i></button>';
                        //    $btn = $btn.'<button class="btn btn-danger dim" onclick="hapus('.$row->id.')"><i class="fa fa-trash"></i></button>';
         
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        $data['kabupaten_kotas'] = KabupatenKota::all();
        $data['provinsis'] = Provinsi::pluck('nama','id');
        $data['countrys'] = Country::select('nama_negara')->get();
        $data['kategoris'] = [
            [
                'nama_kategori' => 'Pribadi'
            ],
            [
                'nama_kategori' => 'Bisnis'
            ]
        ];
        // dd($data);
        return view('backend.cooperation.index', $data);
    }

    public function detail($id)
    {
        $data['cooperation'] = Cooperation::find($id);
        
        if(auth()->user()->role == 1){
            $array_message = array(
                'success' => false,
                'message_title' => 'Access Denied',
                'message_content' => 'Anda Tidak Memiliki Akses',
                'message_type' => "error",
            );
            return response()->json($array_message);
        }else{
            return response()->json($data);
        }
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama'  => 'required',
            'nama_perusahaan'  => 'required',
            'email'  => 'required',
            'logo_perusahaan'  => 'required',
            'kategori'  => 'required',
            'alamat_perusahaan'  => 'required',
            'kab_kota'  => 'required',
            'provinsi'  => 'required',
            'kode_pos'  => 'required',
            'telp_kantor'  => 'required',
            'telp_selular'  => 'required',
            'no_fax'  => 'required',
        ];
 
        $messages = [
            'nama.required'  => 'Nama wajib diisi.',
            'nama_perusahaan.required'  => 'Nama Perusahaan wajib diisi.',
            'email.required'  => 'Email wajib diisi.',
            'logo_perusahaan.required'   => 'Logo Perusahaan wajib diisi.',
            'kategori.required'   => 'Kategori wajib diisi.',
            'alamat_perusahaan.required'   => 'Alamat Perusahaan wajib diisi.',
            'kab_kota.required'   => 'Kabupaten / Kota wajib diisi.',
            'provinsi.required'   => 'Provinsi wajib diisi.',
            'kode_pos.required'   => 'Kode Pos wajib diisi.',
            'telp_kantor.required'   => 'Telpon Kantor wajib diisi.',
            'telp_selular.required'   => 'Telpon Selular wajib diisi.',
            'no_fax.required'   => 'No. Fax wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = rand(1,9999);
            $input['negara'] = 'Indonesia';
            $input['status'] = 0;
            $input['logo_perusahaan'] = 'logo-'.Str::slug($request->nama_perusahaan).'.'.$request->logo_perusahaan->getClientOriginalExtension();
            $request->logo_perusahaan->move(public_path('backend/berkas/coorporate'), $input['logo_perusahaan']);
            // $request->foto->move(storage_path('app/public/image'), $input['image']);
    
           $cooperation = Cooperation::create($input);

           if($cooperation){
                $message_title="Berhasil !";
                $message_content="Kerjasama Berhasil Dibuat";
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

    public function upload_berkas(Request $request)
    {
        $rules = [
            'upload_berkas'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'upload_berkas.required'  => 'Berkas wajib diisi.',
            'upload_berkas.max'  => 'Berkas Max 2MB.',
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
            }
            else{
                $cooperation = Cooperation::find($request->berkas_id);
            
                $file = $request->file('upload_berkas');
                $fileName = $cooperation->nama_perusahaan.'-'.$file->getClientOriginalName();
                // if($image_path == null){
                //     $image_path = public_path('backend/berkas/coorporate/');
                // }else{
                //     $image_path = public_path('backend/berkas/coorporate/'.$cooperation->berkas);
                //     File::delete($image_path);
                // }

                // dd($image_path);

                if($cooperation->status == 2){
                    return response()->json(
                        [
                            'success' => false,
                            'error' => 'Berkas Telah Terverifikasi'
                        ]
                    );
                }
                elseif($cooperation->status == 1){
                    $message_title="Berhasil !";
                    $message_content="Berkas ".$cooperation->nama_perusahaan." Sedang Diverifikasi";
                    $message_type="info";
                    $message_succes = true;

                    $array_message = array(
                        'success' => $message_succes,
                        'message_title' => $message_title,
                        'message_content' => $message_content,
                        'message_type' => $message_type,
                    );
                    return response()->json($array_message);
                }
                else{
                    $file->move(public_path('backend/berkas/coorporate'), $fileName);
                    $image_path = public_path('backend/berkas/coorporate/'.$cooperation->berkas);
                    File::delete($image_path);
                    $cooperation->berkas = $fileName;
                    $cooperation->status = 1;
                    $cooperation->update();
                }

                if($cooperation){
                    $message_title="Berhasil !";
                    $message_content="Berkas ".$cooperation->nama_perusahaan." Berhasil Upload";
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
        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function berkas(Request $request)
    {
        $rules = [
            'berkas'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'berkas.required'  => 'Berkas wajib diisi.',
            'berkas.max'  => 'Berkas Max 2MB.',
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
            }
            else{
                $cooperation = Cooperation::find($request->id);
            
                $file = $request->file('upload_berkas');
                $fileName = $cooperation->nama_perusahaan.$file->getClientOriginalName();
                $file->move(public_path('backend/berkas/coorporate'), $fileName);
                $image_path = public_path('backend/berkas/coorporate');
                File::delete($image_path);

                $cooperation->berkas = $fileName;
                $cooperation->update();

                if($cooperation){
                    $message_title="Berhasil !";
                    $message_content="Berkas Berhasil Upload";
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
        // foreach ($select_kab_kota as $key => $kb) {
        //     $data[] = [
        //         'id' => $kb['id'],
        //         'nama' => $kb['nama']
        //     ];
        // }

        return response()->json($select_kab_kota);
    }

    public function download($id)
    {
        $data['cooperation'] = Cooperation::find($id);
        $data['perusahaan'] = Perusahaan::where('status','Y')->first();
        if(auth()->user()->role == 1){
            $array_message = array(
                'success' => false,
                'message_title' => 'Access Denied',
                'message_content' => 'Anda Tidak Memiliki Akses',
                'message_type' => "error",
            );
            return response()->json($array_message);
        }else{
            if($data['cooperation']['berkas'] == null){
                $array_message = array(
                    'success' => false,
                    'message_content' => 'Berkas Belum Upload',
                    'message_type' => "error",
                );
                return response()->json($array_message);
            }else{
                return redirect(asset('backend/berkas/coorporate/'.$data['cooperation']['berkas']));
                // $pdf = PDF::loadView('backend.cooperation.download', $data);
                // return $pdf->stream();
            }
            // return view('backend.cooperation.download', $data);
        }
    }

    public function notif()
    {
        Mail::to("filekerjario@gmail.com")
            ->send(new CooperationMail());
 
		return "Email telah dikirim";
    }
}
