<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Wisata;
use App\Models\Provinsi;
use Notification;
// use Illuminate\Notifications\Notification;
use DataTables;
use Validator;
use App\User;
use App\Notifications\WisataNotification;
use App\Events\WisataEvent;
class WisataController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Wisata::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        // $btn = '<div class="button-items">';
                        // $btn = $btn.'<a href="'.url('item/download_barcode/'.$row->kode_barang).'" class="btn btn-success waves-effect waves-light">
                        //             <i class="bx bx-barcode font-size-16 align-middle mr-2"></i> Unduh
                        //         </a>';
                        // $btn = $btn.'<button type="button" onclick="detail('.$row->kode_barang.')" class="btn btn-primary waves-effect waves-light">
                        //             <i class="bx bx-box font-size-16 align-middle mr-2"></i> Lihat Barang
                        //         </button>';
                        // $btn = $btn.'<button type="button" onclick="edit('.$row->kode_barang.')" class="btn btn-warning waves-effect waves-light">
                        //             <i class="bx bx-highlight font-size-16 align-middle mr-2"></i> Edit
                        //         </button>';
                        // $btn = $btn.'<button type="button" onclick="delete('.$row->kode_barang.')" class="btn btn-danger waves-effect waves-light">
                        //             <i class="bx bx-trash-alt font-size-16 align-middle mr-2"></i> Delete
                        //         </button>';
                        // $btn = $btn.'</div>';

                        // $btn = '<a href=wisata/'.$row->created_at.' type="button" class="btn btn-success btn-icon">
                        //             <i class="fa fa-eye"></i>
                        //         </a>
                        //         <a href='.$row->created_at.' type="button" class="btn btn-warning btn-icon">
                        //             <i class="fa fa-edit"></i>
                        //         </a>
                        //         <button type="button" class="btn btn-danger btn-icon">
                        //             <i class="fa fa-trash"></i>
                        //         </button>';

                        //    $btn = '<button onclick="show('.$row->id.')" class="btn btn-warning dim"><i class="fa fa-edit"></i></button>';
                        //    $btn = $btn.'<button class="btn btn-danger dim" onclick="hapus('.$row->id.')"><i class="fa fa-trash"></i></button>';
                        $btn = '<a href="" class="btn btn-success btn-sm" title="Detail">
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
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data['provinsis'] = Provinsi::pluck('nama','id');
        // return view('backend.wisata.index2');
        return view('backend.wisata.index2',$data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_wisata'  => 'required',
            'deskripsi'  => 'required',
            'alamat'  => 'required',
            'images'  => 'required',
        ];
 
        $messages = [
            'nama_wisata.required'  => 'Nama Wisata wajib diisi.',
            'deskripsi.required'  => 'Deskripsi Wisata wajib diisi.',
            'alamat.required'   => 'Alamat wajib diisi.',
            'images.required'   => 'Upload Gambar wajib diisi.',
        ];

        // $fasilitas = [];
        // $rencana_perjalanan = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->nama_wisata);
            $image = $request->file('images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['images'] = time().'.webp';
            $img->save(public_path('frontend/assets4/img/wisata/').$input['images']);
            // $input['images'] = time().'.'.$request->images->getClientOriginalExtension();
            // $request->image->move(public_path('image'), $input['image']);
            // $request->foto->move(storage_path('app/public/image'), $input['image']);

            $wisata = Wisata::create($input);
            // dd($input);
            $userSchema = User::where('id',auth()->user()->id)->first();
            // $userSchema = auth()->user()->id;
            $offerData = [
                'message' => $input['nama_wisata'].' Berhasil Ditambah',
                // 'icons' => 'fa fa-envelope',
                // 'url' => 'lihat_tiket/'.$tiketDetail->tiket_id,
            ];
            
            // Notification::send($userSchema, new WisataNotification($offerData));
            // new WisataEvent($offerData['message']);
            
            if($wisata){
                $message_title="Berhasil !";
                $message_content="Wisata Berhasil Disimpan";
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
}
