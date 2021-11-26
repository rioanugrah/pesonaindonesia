<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooperation;
use App\Models\KabupatenKota;
use App\Models\Provinsi;
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
                    ->addColumn('action', function($row){
                        $btn = '<a href='.$row->created_at.' type="button" class="btn btn-success btn-icon">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href='.$row->created_at.' type="button" class="btn btn-warning btn-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-icon">
                                    <i class="fa fa-trash"></i>
                                </button>';
                        //    $btn = '<button onclick="show('.$row->id.')" class="btn btn-warning dim"><i class="fa fa-edit"></i></button>';
                        //    $btn = $btn.'<button class="btn btn-danger dim" onclick="hapus('.$row->id.')"><i class="fa fa-trash"></i></button>';
         
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data['kabupaten_kotas'] = KabupatenKota::all();
        $data['provinsis'] = Provinsi::pluck('nama','id');
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

    public function simpan(Request $request)
    {
        $rules = [
            'nama'  => 'required',
            'nama_perusahaan'  => 'required',
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
            $input['logo_perusahaan'] = time().'.'.$request->logo_perusahaan->getClientOriginalExtension();
            $request->logo_perusahaan->move(public_path('logo_perusahaan'), $input['logo_perusahaan']);
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
}
