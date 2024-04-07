<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Carbon\Carbon;

use App\Models\v2\Events;
use App\Models\v2\EventsProduct;

use DataTables;
use Validator;
use File;
use DB;
class EventController extends Controller
{
    protected $events;

    function __construct(
        Events $events,
        EventsProduct $events_product
    )
    {
        $this->events = $events;
        $this->events_product = $events_product;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->events->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('cover_image', function($row){
                        return "<img src='".url('events/cover/'.$row->cover_image)."' class='img-thumbnail' width='200' style='width: 100%; height: 150px; object-fit: cover;'>";
                    })
                    ->addColumn('schedules', function($row){
                        $ol = "<ul>";
                        foreach (json_decode($row->schedules) as $key => $schedules) {
                            $ol = $ol."<li>".$schedules->day." - ".Carbon::create($schedules->time)->isoFormat('LLL')."</li>";
                        }
                        $ol = $ol."</ul>";
                        return $ol;
                    })
                    ->addColumn('status', function($row){
                        switch ($row->status) {
                            case 'Y':
                                return '<span class="badge bg-success">Approved</span>';
                                break;
                            case 'N':
                                return '<span class="badge bg-danger">Rejected</span>';
                                break;
                            case 'O':
                                return '<span class="badge bg-warning">Waiting Verification</span>';
                                break;
                            case 'C':
                                return '<span class="badge bg-danger">Cancel</span>';
                                break;
                            default:
                                return '<span class="badge bg-danger">Fail</span>';
                                break;
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href='.route('b.events.detail',['id' => $row->id]).' class="btn btn-success btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href='.route('b.events.edit',['id' => $row->id]).' class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>';
                        // $btn = '<a class="btn btn-success btn-sm" title="Detail">
                        //             <i class="fas fa-eye"></i>
                        //         </a>
                        //         <a href="'.route('events.detailRegister',['id' => $row->id]).'" class="btn btn-success btn-sm" target="_blank">
                        //             <i class="fas fa-eye"></i> Pendaftaran Event
                        //         </a>
                        //         <button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                        //             <i class="fas fa-pencil-alt"></i>
                        //         </button>
                        //         <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                        //             <i class="fas fa-trash"></i>
                        //         </button>';
                        return $btn;
                    })
                    ->rawColumns(
                        [
                            'action',
                            'cover_image',
                            'schedules',
                            'status',
                            // 'finish_event',
                            // 'is_event',
                        ])
                    ->make(true);
        }
        return view('backend_new_2023.event.index');
    }

    public function create()
    {
        return view('backend_new_2023.event.create');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'team_lead' => 'required',
            'group_committee' => 'required',
            'group_schedule' => 'required',
            'cover_image'  => 'required',
            'group_images' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul Event wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'team_lead.required' => 'Leader Event wajib diisi.',
            'group_committee.required' => 'Panitia Event wajib diisi.',
            'group_schedule.required' => 'Schedule Event wajib diisi.',
            'group_images.required' => 'Detail Gambar Event wajib diisi.',
            'cover_image.required' => 'Cover Gambar Event wajib diisi.',
            // 'cover_image.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()){
            if (!File::exists(public_path('events'))) {
                File::makeDirectory(public_path('events'), 0777, true, true);
            }

            $input['id'] = Str::uuid();
            $input['slug'] = Str::slug($request->title);
            $input['title'] = $request->title;
            $input['description'] = $request->description;
            $input['team_lead'] = $request->team_lead;
            $input['committee'] = json_encode($request->group_committee);
            $input['schedules'] = json_encode($request->group_schedule);
            $input['location'] = $request->location;
            $input['user_id'] = auth()->user()->generate;

            $cover_image = $request->file('cover_image');
            $img_cover_image = \Image::make($cover_image->path());
            $img_cover_image = $img_cover_image->encode('webp', 75);
            $input['cover_image'] = 'cover'.time().'.webp';
            $img_cover_image->save(public_path('events/cover/').$input['cover_image']);

            foreach ($request->group_images as $key => $group_images) {
                // dd($group_images['image']);
                $image = $group_images['image'];
                $img_image = \Image::make($image->path());
                $img_image = $img_image->encode('webp', 75);
                $detailImage = time().'.webp';
                // $input['image'] = time().'.webp';
                $img_image->save(public_path('events/').$detailImage);
                $dataImage[] = $detailImage;
            }
            $input['image'] = json_encode($dataImage);
            $input['status'] = 'O';
            $events = $this->events->create($input);

            if ($events) {
                $message_title="Berhasil !";
                $message_content= "Event ".$request->title." Berhasil Disimpan";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
                'url' => $input['id']
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
        $data['event'] = $this->events->find($id);
        if (empty($data['event'])) {
            return redirect()->back();
        }
        return view('backend_new_2023.event.detail',$data);
    }

    public function event_product($id)
    {
        $data = $this->events_product->where('event_id',$id)->get();
        // dd($data);
        foreach ($data as $key => $event_product) {
            $event_products[] = [
                'id' => $event_product->id,
                'product' => $event_product->product,
                'quota' => $event_product->quota,
                'price' => number_format($event_product->price,0,',','.'),
            ];
        }
        return $event_products;
    }

    public function event_product_simpan(Request $request,$id)
    {
        $rules = [
            'group_event_price' => 'required',
        ];

        $messages = [
            'group_event_price.required' => 'Event Price wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            foreach ($request->group_event_price as $key => $event_price) {
                $input['id'] = Str::uuid()->toString();
                $input['event_id'] = $id;
                $input['product'] = $event_price['product'];
                $input['quota'] = $event_price['quota'];
                $input['price'] = $event_price['price'];
                $events_product_simpan = $this->events_product->create($input);
            }

            if ($events_product_simpan) {
                $message_title="Berhasil !";
                $message_content= "Event Price Berhasil Dibuat";
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

    public function edit($id)
    {
        $data['event'] = $this->events->find($id);
        if (empty($data['event'])) {
            return redirect()->back();
        }

        return view('backend_new_2023.event.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'group_schedule' => 'required',
            // 'cover_image'  => 'required',
            // 'group_images' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul Event wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'group_schedule.required' => 'Schedule Event wajib diisi.',
            // 'group_images.required' => 'Detail Gambar Event wajib diisi.',
            // 'cover_image.required' => 'Cover Gambar Event wajib diisi.',
            // 'cover_image.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()){
            $events = $this->events->find($id);

            $input['title'] = $request->title;
            $input['slug'] = Str::slug($request->title);
            $input['description'] = $request->description;
            $input['schedules'] = json_encode($request->group_schedule);
            $input['location'] = $request->location;
            $input['user_id'] = auth()->user()->generate;

            if ($request->file('cover_image')) {
                $img_cover = \Image::make($file->path());
                $img_cover = $img_cover->encode('webp', 75);
                $input['cover_image'] = 'cover'.time().'.webp';

                $image_path_cover_previous = public_path('events/cover/'.$events->cover_image);
                File::delete($image_path_cover_previous);

                $img_cover->save(public_path('events/cover/').$input['cover_image']);

            }

            if ($request->group_images) {
                foreach ($request->group_images as $key => $group_images) {
                    $image = $group_images['image'];
                    $img_image = \Image::make($image->path());
                    $img_image = $img_image->encode('webp', 75);
                    $detailImage = time().'.webp';
                    $img_image->save(public_path('events/').$detailImage);
                    $dataImage[] = $detailImage;
                }
                foreach (json_decode($events->image) as $key => $img) {
                    $image_path = public_path('events/'.$img);
                    File::delete($image_path);
                }
            }

            $events->update($input);
            if ($events) {
                $message_title="Berhasil !";
                $message_content= "Event ".$request->title." Berhasil Diupdate";
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
        // $events = $this->events->find($id);
        // return $events;
    }
}
