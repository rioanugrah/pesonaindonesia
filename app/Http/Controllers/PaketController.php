<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Paket;
use App\Models\PaketList;
use App\Models\PaketOrder;
use App\Models\PaketOrderList;
use App\Models\PaketImages;
use App\Models\Bank;
use App\Models\BuktiPembayaran;
use DataTables;
use Validator;
use DB;
use File;

use App\Mail\Pembayaran;
use Mail;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Paket::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('deskripsi', function($row){
                        return substr($row->deskripsi, 0, 50);
                    })
                    // ->addColumn('price', function($row){
                    //     return 'Rp. '.number_format($row->price,2,",",".");
                    // })
                    // ->addColumn('diskon', function($row){
                    //     return $row->diskon.'%';
                    // })
                    ->addColumn('total_harga', function($row){
                        return 'Rp. '.number_format($row->price-($row->diskon/100)*$row->price,2,",",".");
                    })
                    // ->addColumn('status', function($row){
                    //     if($row->status == 'Y'){
                    //         return 'Aktif';
                    //     }else{
                    //         return 'Tidak Aktif';
                    //     }
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<a href='.route('paket.list',['id' => $row->id]).' class="btn btn-secondary btn-sm" title="Paket List">
                                    <i class="fas fa-list"></i> Paket List
                                </a>
                                <button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.paket.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_paket'  => 'required',
            // 'price'  => 'required',
            // 'diskon'  => 'required',
            // 'deskripsi'  => 'required',
            'images'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'images.required'  => 'Upload Gambar wajib diisi.',
            'images.max'  => 'Upload Gambar Max 2MB.',
            'nama_paket.required'   => 'Nama Paket wajib diisi.',
            // 'price.required'   => 'Harga wajib diisi.',
            // 'diskon.required'   => 'Diskon Harga wajib diisi.',
            // 'deskripsi.required'   => 'Deskripsi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($request['outer-group'][0]['images']);
        // dd($request->all());
        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->nama_paket);
            // $image = $request->file('images');
            $image = $request->file('images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['images'] = time().'.webp';
            $img->save(public_path('frontend/assets4/img/paket/').$input['images']);
            // foreach ($request['outer-group'][0] as $imagefile) {
            //     $name=$imagefile->getClientOriginalName();
            //     $imagefile->move(public_path('frontend/assets4/img/paket/'),$name);
            //     $images[]=$name;
            //     dd($images);
            //     // $img = \Image::make($imagefile->path());
            //     // // dd($img);
            //     // $img = $img->encode('webp', 75);
            //     // $imagefile = time().'.webp';
            //     // // $input = $imagefile;
            //     // $img->save(public_path('frontend/assets4/img/paket/').$imagefile);
            // }

            $paket = Paket::create($input);

            if($paket){
                $message_title="Berhasil !";
                $message_content="Paket ".$input['nama_paket']." Berhasil Disimpan";
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

    public function detail_upload($id)
    {
        $paket = Paket::find($id);
        if(empty($paket)){
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $paket
        ]);
    }

    public function simpan_image(Request $request)
    {
        $rules = [
            'images'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'images.required'  => 'Upload Gambar wajib diisi.',
            'images.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['paket_id'] = $request->upload_paket_id;
            
            $image = $request->file('images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['images'] = time().'.webp';
            $img->save(public_path('frontend/assets4/img/paket/').$input['images']);
            
            $paketImages = PaketImages::create($input);
            
            if($paketImages){
                $message_title="Berhasil !";
                $message_content="Upload Paket Berhasil Disimpan";
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

    public function paket_list(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = PaketList::where('paket_id',$id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,2,",",".");
                    })
                    // ->addColumn('deskripsi', function($row){
                    //     return substr($row->deskripsi, 0, 50);
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data['pakets'] = Paket::find($id);
        return view('backend.paket.list.index',$data);
    }

    public function paket_list_simpan(Request $request, $id)
    {
        $rules = [
            'nama_paket'  => 'required',
            'price'  => 'required',
            'jumlah_paket'  => 'required',
            // 'diskon'  => 'required',
            // 'deskripsi'  => 'required',
            // 'images'  => 'required|file|max:2048',
        ];
 
        $messages = [
            // 'images.required'  => 'Upload Gambar wajib diisi.',
            // 'images.max'  => 'Upload Gambar Max 2MB.',
            'nama_paket.required'   => 'Nama Paket wajib diisi.',
            'price.required'   => 'Harga wajib diisi.',
            'jumlah_paket.required'   => 'Jumlah Paket wajib diisi.',
            // 'deskripsi.required'   => 'Deskripsi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($request['outer-group'][0]['images']);
        // dd($request->all());
        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = 'PK-'.rand(1000,9999);
            $input['paket_id'] = $id;

            $image = $request->file('images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['images'] = time().'.webp';
            $img->save(public_path('frontend/assets4/img/paket/list/').$input['images']);

            $paket_list = PaketList::create($input);

            if($paket_list){
                $message_title="Berhasil !";
                $message_content="Paket ".$input['nama_paket']." Berhasil Disimpan";
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

    public function paket_list_order(Request $request,$slug,$id)
    {
        $rules = [
            'first_name'  => 'required',
            'last_name'  => 'required',
            'alamat'  => 'required',
            'email'  => 'required',
            'phone'  => 'required',
            'tanggal_berangkat'  => 'required',
        ];
 
        $messages = [
            // 'images.required'  => 'Upload Gambar wajib diisi.',
            // 'images.max'  => 'Upload Gambar Max 2MB.',
            'first_name.required'   => 'Nama Pertama wajib diisi.',
            'last_name.required'   => 'Nama Terakhir wajib diisi.',
            'alamat.required'   => 'Alamat wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'phone.required'   => 'No. Telpon wajib diisi.',
            'tanggal_berangkat.required'   => 'Tanggal berangkat wajib diisi.',
            // 'deskripsi.required'   => 'Deskripsi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $data['pakets'] = Paket::where('slug',$slug)->first();
            $data['banks'] = Bank::where('nama_bank',$request->payment_method)->first();
            // dd($banks->nama_bank);
            $data['paket_lists'] = PaketList::where('paket_id',$data['pakets']['id'])->first();
            // $input = $request;
            $input['id'] = 'INV-'.rand(0000001,9999999);
            $data['order'] = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'phone' => $request->phone,
                'jumlah' => $request->qty,
                'tanggal_berangkat' => $request->tanggal_berangkat,
            ];
            // $input['bank'] = [
            //     'nama_bank' => $banks->nama_bank,
            // ];
            // foreach ($data['banks'] as $key => $bk) {
            //     $data['bank'] = [
            //         'bank' => $bk
            //     ];
            // }
            if($request->qty > 1){
                foreach ($request->nama_anggota as $key => $value) {
                    // $data['anggota']['team'] = [
                    //     'nama' => $value,
                    //     'jumlah' => 1
                    // ];
                    PaketOrderList::create([
                        // 'id' => rand(10000,99999),
                        'order_paket_id' => $input['id'],
                        'pemesan' => $value,
                        'qty' => 1
                    ]);
                }
            }
            // foreach ($banks as $key => $bk) {
            //     $input['bank'] = [
            //         'nama_bank' => $bk['nama_bank'],
            //         'nama_penerima' => $bk['nama_penerima'],
            //         'nomor_rekening' => $bk['nomor_rekening'],
            //     ];
            // }
            $input['nama_paket'] = $data['paket_lists']['nama_paket'];
            $input['pemesan'] = json_encode([
                $data['order']
            ]);
            $input['bank'] = json_encode(
                [
                    [
                        'nama_bank' => $data['banks']['nama_bank'],
                        'nama_penerima' => $data['banks']['nama_penerima'],
                        'nomor_rekening' => $data['banks']['nomor_rekening'],
                    ]
                ]
            );
            // $input['bank'] = $bank;

            $input['qty'] = $request->qty;
            $input['price'] = $data['paket_lists']['price'];
            $input['status'] = 1;

            $paket_order = PaketOrder::create($input);
            
            if($paket_order){
                $message_title="Berhasil !";
                $message_content="Orderan Berhasil";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return redirect(route('frontend.paket.payment',['id' => $input['id']]));
            // return response()->json($array_message);
            // return $input;
        }

        // return response()->json(
        //     [
        //         'success' => false,
        //         'error' => $validator->errors()->all()
        //     ]
        // );
        // return $data;
    }

    public function paket_bukti_pembayaran(Request $request, $id)
    {
        $image = $request->file('images');
        $img = \Image::make($image->path());
        $img = $img->encode('webp', 75);
        $input['id'] = $id;
        $input['images'] = $id.'.webp';
        $img->save(public_path('frontend/assets4/img/tf/').$input['images']);

        $bukti_pembayaran = BuktiPembayaran::firstOrCreate($input);
        
        $email_marketing = 'marketing@plesiranindonesia.com';
        $details = [
            'title' => 'Pembayaran ',
            'email' => $request->email_payment,
            'body' => null,
            'nama_pembayaran' => $request->nama_pembayaran,
            'bukti_pembayaran' => asset('frontend/assets4/img/tf/'.$input['images'])
            // 'url' => 'https://www.itsolutionstuff.com'
        ];

        // Mail::send(new Pembayaran($details));
        Mail::to($email_marketing)->send(new Pembayaran($details));
        
        PaketOrder::where('id',$id)->update([
            'status' => 2
        ]);
        
        if($bukti_pembayaran){
            $message_title="Berhasil !";
            $message_content="Bukti pembayaran berhasil dikirim. Silahkan menunggu konfirmasi";
            $message_type="success";
            $message_succes = true;
        }else{
            $message_title="Gagal !";
            $message_content="Bukti pembayaran gagal dikirim. Silahkan dicoba lagi";
            $message_type="danger";
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
