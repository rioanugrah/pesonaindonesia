<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use \App\Models\v2\Tour;
use \App\Models\v2\TourCategory;
use \App\Models\v2\TourAttribute;
use \App\Models\v2\TourAttributeDetail;
use \App\Models\v2\TourOrder;

use DataTables;
use Validator;
use File;

class TourController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:kt-marketing', ['only' => [
                            'all_tour',
                            'tour_category',
                            'tour_attribute',
                            'tour_order_view'
                            ]]);
        // $this->middleware('permission:posting-create', ['only' => ['create']]);
    }
    public function all_tour(Request $request)
    {
        if ($request->ajax()) {
            $data = Tour::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('images', function($row){
                                return '<img src='.asset('backend_2023/images/tour/').'/'.$row->images.' width="150">';
                            })
                            ->addColumn('action', function($row){
                                $btn = '<div class="btn-group">';
                                $btn .= '<a href='.route('tour.edit',['id' => $row->id]).' class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                                $btn .= '<button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>';
                                $btn .= '</div>';
                                return $btn;
                            })
                            ->rawColumns(['action','images'])
                            ->make(true);
        }
        return view('backend_new_2023.tour.all_tour');
    }

    public function all_tour_create()
    {
        $data['tour_categories'] = TourCategory::all();
        return view('backend_new_2023.tour.create',$data);
    }

    public function all_tour_simpan(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title'  => 'required',
            'jenis_tour'  => 'required',
            'deskripsi'  => 'required',
            'tour_category_id'  => 'required',
            'min_people'  => 'required',
            'max_people'  => 'required',
            'location'  => 'required',
            'current_price'  => 'required',
            'previous_price'  => 'required',
            'discount'  => 'required',
            'group_include'  => 'required',
            'group_exclude'  => 'required',
            // 'facilities'  => 'required',
            'group_itinerary'  => 'required',
            'group_faq'  => 'required',
            'images'  => 'required|file|max:2048',
            // 'email'  => 'required|unique:cooperation',
        ];
 
        $messages = [
            'title.required'  => 'Judul wajib diisi.',
            'jenis_tour.required'  => 'Jenis Tour wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'tour_category_id.required'  => 'Kategori Tour wajib diisi.',
            'min_people.required'  => 'Minimal Pax wajib diisi.',
            'max_people.required'  => 'Maksimal Pax wajib diisi.',
            'location.required'  => 'Lokasi wajib diisi.',
            'current_price.required'  => 'Harga Sekarang wajib diisi.',
            'previous_price.required'  => 'Harga Sebelum wajib diisi.',
            'discount.required'  => 'Diskon wajib diisi.',
            'group_include.required'  => 'Include wajib diisi.',
            'group_exclude.required'  => 'Exclude wajib diisi.',
            // 'facilities.required'  => 'Fasilitas wajib diisi.',
            'group_itinerary.required'  => 'Rencana Perjalanan wajib diisi.',
            'group_faq.required'  => 'Faq wajib diisi.',
            'images.required'  => 'Upload Gambar wajib diisi.',
            'images.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $norut = Tour::max('kode_tour');
            if (empty($norut)) {
                $nomor_urut = 0;
            } else {
                $explode_norut = explode("-",$norut);
                $nomor_urut = $explode_norut[1];
            }

            $input['id'] = Str::uuid()->toString();
            $input['user_id'] = auth()->user()->id;

            $kode_tour = 'TOUR';
            $input['kode_tour'] = $kode_tour.'-'.sprintf("%03s",$nomor_urut+1).'-'.date('mY');
            
            $input['title'] = $request->title;
            $input['slug'] = Str::slug($request->title);
            $input['jenis_tour'] = $request->jenis_tour;
            $input['deskripsi'] = $request->deskripsi;
            $input['tour_category_id'] = $request->tour_category_id;
            $input['min_people'] = $request->min_people;
            $input['max_people'] = $request->max_people;
            $input['location'] = $request->location;
            $input['current_price'] = $request->current_price;
            $input['previous_price'] = $request->previous_price;
            $input['discount'] = $request->discount;
            $input['include'] = json_encode($request->group_include);
            $input['exclude'] = json_encode($request->group_exclude);
            $input['itinerary'] = json_encode($request->group_itinerary);
            $input['faq'] = json_encode($request->group_faq);
            $input['status'] = 'Aktif';

            if ($request->file('images')) {
                $image = $request->file('images');
                $img = \Image::make($image->path());
                $img = $img->encode('webp', 75);
                $input['images'] = $input['kode_tour'].'.webp';
                $img->save(public_path('backend_2023/images/tour/').$input['images']);
            }

            $tour = Tour::create($input);

            if($tour){
                $message_title="Berhasil !";
                $message_content="Paket Travelling ".$request->title." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }
    
            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return redirect()->route('tour')->with($array_message);
            // dd($input);
        }
        // return redirect()->back()->with('error',$validator->errors()->all());
        dd($validator->errors()->all());
    }
    
    public function all_tour_edit($id)
    {
        $data['tour'] = Tour::find($id);
        $data['tour_categories'] = TourCategory::all();
        return view('backend_new_2023.tour.edit',$data);
    }

    public function all_tour_update(Request $request, $id)
    {
        $rules = [
            'title'  => 'required',
            'jenis_tour'  => 'required',
            'deskripsi'  => 'required',
            'tour_category_id'  => 'required',
            'min_people'  => 'required',
            'max_people'  => 'required',
            'location'  => 'required',
            'current_price'  => 'required',
            'previous_price'  => 'required',
            'discount'  => 'required',
            // 'group_include'  => 'required',
            // 'group_exclude'  => 'required',
            // 'facilities'  => 'required',
            // 'group_itinerary'  => 'required',
            // 'group_faq'  => 'required',
            // 'images'  => 'required|file|max:2048',
            // 'email'  => 'required|unique:cooperation',
        ];
 
        $messages = [
            'title.required'  => 'Judul wajib diisi.',
            'jenis_tour.required'  => 'Jenis Tour wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'tour_category_id.required'  => 'Kategori Tour wajib diisi.',
            'min_people.required'  => 'Minimal Pax wajib diisi.',
            'max_people.required'  => 'Maksimal Pax wajib diisi.',
            'location.required'  => 'Lokasi wajib diisi.',
            'current_price.required'  => 'Harga Sekarang wajib diisi.',
            'previous_price.required'  => 'Harga Sebelum wajib diisi.',
            'discount.required'  => 'Diskon wajib diisi.',
            // 'group_include.required'  => 'Include wajib diisi.',
            // 'group_exclude.required'  => 'Exclude wajib diisi.',
            // 'facilities.required'  => 'Fasilitas wajib diisi.',
            // 'group_itinerary.required'  => 'Rencana Perjalanan wajib diisi.',
            // 'group_faq.required'  => 'Faq wajib diisi.',
            // 'images.required'  => 'Upload Gambar wajib diisi.',
            // 'images.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {

            $tour = Tour::find($id);

            $input['title'] = $request->title;
            $input['slug'] = Str::slug($request->title);
            $input['jenis_tour'] = $request->jenis_tour;
            $input['deskripsi'] = $request->deskripsi;
            $input['tour_category_id'] = $request->tour_category_id;
            $input['min_people'] = $request->min_people;
            $input['max_people'] = $request->max_people;
            $input['location'] = $request->location;
            $input['current_price'] = $request->current_price;
            $input['previous_price'] = $request->previous_price;
            $input['discount'] = $request->discount;
            $input['include'] = json_encode($request->group_include);
            $input['exclude'] = json_encode($request->group_exclude);
            $input['itinerary'] = json_encode($request->group_itinerary);
            $input['faq'] = json_encode($request->group_faq);
            $input['status'] = 'Aktif';

            if ($request->file('images')) {
                $image = $request->file('images');
                $img = \Image::make($image->path());
                $img = $img->encode('webp', 75);
                $input['images'] = time().'.webp';
                $img->save(public_path('backend_2023/images/tour/').$input['images']);
                
                $image_path = public_path('backend_2023/images/tour/').$tour['images'];
                File::delete($image_path);
                $input['images'] = $input['images'];
            }

            $tour->update($input);

            if ($tour) {
                $message_title="Berhasil !";
                $message_content="Data Tour Berhasil Update";
                $message_type="success";
                $message_succes = true;

                $array_message = array(
                    'success' => $message_succes,
                    'message_title' => $message_title,
                    'message_content' => $message_content,
                    'message_type' => $message_type,
                );
                return redirect()->route('tour')->with($array_message['success'],$array_message['message_content']);
                // return response()->json($array_message);
            }
        }

        // return $validator->errors()->all();
        return redirect()->back()->withErrors($validator->errors()->all());

        // return response()->json(
        //     [
        //         'success' => false,
        //         'error' => $validator->errors()->all()
        //     ]
        // );

    }

    public function all_tour_delete($id)
    {
        $tour = Tour::find($id);
        if(!empty($tour)){
            $message_title="Berhasil !";
            $message_content="Data ".$tour->title." Berhasil Dihapus";
            $message_type="success";
            $message_succes = true;
            $image_path = public_path('backend_2023/images/tour/'.$tour->images);
            File::delete($image_path);
            $tour->delete();
            
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

    public function tour_category(Request $request)
    {
        if ($request->ajax()) {
            $data = TourCategory::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                // $btn = '<div class="btn-group">';
                                // $btn .= '<a>Edit</a>';
                                // $btn = '</div>';
                                // return $btn;
                                $btn = '<div class="d-flex flex-wrap gap-2">
                                            <a href="'.route('travelling.edit',['id' => $row->id]).'" class="btn btn-warning btn-sm waves-effect waves-light"><i class="fas fa-edit"></i> Edit</a>
                                            <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return view('backend_new_2023.tour.category.category');
    }

    public function tour_category_simpan(Request $request)
    {
        $rules = [
            'nama_kategori'  => 'required',
        ];
 
        $messages = [
            'nama_kategori.required'   => 'Nama Kategori wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $norut = TourCategory::max('id');
            if(empty($norut)){
                $input['id'] = 1;
            }else{
                $input['id'] = $norut+1;
            }
            $input['slug'] = Str::slug($request->nama_kategori);
            $input['status'] = 'y';
            $tour_category = TourCategory::create($input);

            if($tour_category){
                $message_title="Success !";
                $message_content="Category Tour is Save";
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

    public function tour_attribute(Request $request)
    {
        if ($request->ajax()) {
            $data = TourAttribute::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $btn = '<div class="d-flex flex-wrap gap-2">
                                            <a href="" class="btn btn-warning btn-sm waves-effect waves-light"><i class="fas fa-edit"></i> Edit</a>
                                            <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <a href="'.route('tour.attribute.manage',['id' => $row->id]).'" class="btn btn-primary btn-sm" title="Hapus">
                                                <i class="fas fa-cog"></i> Manage
                                            </a>
                                        </div>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('backend_new_2023.tour.attribute.attribute');
    }

    public function tour_attribute_simpan(Request $request)
    {
        $rules = [
            'nama_attribute'  => 'required',
        ];
 
        $messages = [
            'nama_attribute.required'   => 'Nama Attribute wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $norut = TourAttribute::max('id');
            if(empty($norut)){
                $input['id'] = 1;
            }else{
                $input['id'] = $norut+1;
            }
            $tour_attribute = TourAttribute::create($input);

            if($tour_attribute){
                $message_title="Success !";
                $message_content="Attribute Tour is Save";
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

    public function tour_attribute_manage(Request $request, $id)
    {
        // $data = TourAttributeDetail::with('tour_attribute')
        //                             ->where('tour_attribute_id',$id)
        //                             ->get();
        // dd($data);
        if ($request->ajax()) {
            $data = TourAttributeDetail::where('tour_attribute_id',$id)
                                        ->with('tour_attribute')
                                        ->get();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $btn = '<div class="d-flex flex-wrap gap-2">
                                            <button onclick="edit('.$row->tour_attribute->id.','.$row->id.')" class="btn btn-warning btn-sm waves-effect waves-light"><i class="fas fa-edit"></i> Edit</button>
                                            <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        $data['id'] = $id;
        return view('backend_new_2023.tour.attribute.manage.manage',$data);
    }

    public function tour_attribute_manage_simpan(Request $request, $id)
    {
        $rules = [
            'nama_attribute'  => 'required',
        ];
 
        $messages = [
            'nama_attribute.required'   => 'Nama Attribute wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['tour_attribute_id'] = $id;
            $norut = TourAttributeDetail::max('id');
            if(empty($norut)){
                $input['id'] = 1;
            }else{
                $input['id'] = $norut+1;
            }
            $tour_attribute = TourAttributeDetail::create($input);

            if($tour_attribute){
                $message_title="Success !";
                $message_content="Manage Attribute Tour is Save";
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

    public function tour_attribute_manage_detail($id, $tour_manage_id)
    {
        $tour_attribute_manage = TourAttributeDetail::find($tour_manage_id);
        if(empty($tour_attribute_manage)){
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $tour_attribute_manage
        ],200);
    }

    public function tour_attribute_manage_update(Request $request, $id)
    {
        $rules = [
            'edit_nama_attribute'  => 'required',
        ];
 
        $messages = [
            'edit_nama_attribute.required'   => 'Nama Attribute wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['nama_attribute'] = $request->edit_nama_attribute;

            $tour_attribute_manage = TourAttributeDetail::where('id', $request->edit_id)->first();
            $tour_attribute_manage->update($input);

            if($tour_attribute_manage){
                $message_title="Success !";
                $message_content="Manage Attribute Tour is Update";
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

    public function tour_order_view(Request $request)
    {
        if ($request->ajax()) {
            $data = TourOrder::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            // ->addColumn('images', function($row){
                            //     return '<img src='.asset('backend_2023/images/tour/').'/'.$row->images.' width="150">';
                            // })
                            ->addColumn('action', function($row){
                                $btn = '<div class="btn-group">';
                                $btn .= '<a class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                                $btn .= '<a class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>';
                                $btn .= '</div>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return view('backend_new_2023.tour.order');
    }

    public function tour_order_buy(Request $request)
    {
        # code...
    }
}
