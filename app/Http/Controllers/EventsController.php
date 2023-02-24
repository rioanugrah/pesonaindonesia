<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Events;
use App\Models\EventRegister;
use \Carbon\Carbon;
use DataTables;
use Validator;
use File;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Hotel::join('kamar_hotel', 'kamar_hotel.hotel_id', '=', 'hotel.id')->get();
            $data = Events::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                        return "<a href='".url('frontend/assets4/img/events/'.$row->image)."' target='_blank'><img src='".url('frontend/assets4/img/events/'.$row->image)."' class='img-thumbnail' width='850' /></a>";
                    })
                    ->addColumn('is_event', function($row){
                        if($row->is_event == 'W'){
                            return '<span class="text-warning"><b>Sedang Menunggu</b></span>';
                        }
                    })
                    ->addColumn('start_event', function($row){
                        return Carbon::parse($row->start_event)->isoFormat('llll');
                    })
                    ->addColumn('finish_event', function($row){
                        if($row->finish_event == null){
                            return '<span class="text-success"><b>Sampai Selesai</b></span>';
                        }else{
                            return Carbon::parse($row->finish_event)->isoFormat('llll');
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a class="btn btn-success btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="'.route('events.detailRegister',['id' => $row->id]).'" class="btn btn-success btn-sm" target="_blank">
                                    <i class="fas fa-eye"></i> Pendaftaran Event
                                </a>
                                <button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(
                        [
                            'action',
                            'image',
                            'finish_event',
                            'is_event',
                        ])
                    ->make(true);
        }
        return view('backend.events.index');
    }

    public function create()
    {
        return view('backend.events.create');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'title' => 'required',
            'deskripsi' => 'required',
            'location' => 'required',
            'start_event' => 'required',
            'finish_event' => 'required',
            'kuota' => 'required',
            'image'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'title.required' => 'Judul Event wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'location.required' => 'Lokasi Event wajib diisi.',
            'start_event.required' => 'Mulai Event wajib diisi.',
            'finish_event.required' => 'Selesai Event wajib diisi.',
            'kuota.required' => 'Kuota Event wajib diisi.',
            'image.required'  => 'Upload Gambar wajib diisi.',
            'image.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $input = $request->all();
            $input['id'] = Str::uuid();
            $input['slug'] = Str::slug($request->title);
            $input['is_event'] = 'W';

            $image = $request->file('image');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['image'] = time().'.webp';
            $img->save(public_path('frontend/assets4/img/events/').$input['image']);
            // $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('frontend/assets4/img/events'), $input['image']);

            $events = Events::create($input);

            if($events){
                $message_title="Berhasil !";
                $message_content="Event ".$input['title']." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
                return redirect()->route('events')->with('success',$message_content);
            }

            // $array_message = array(
            //     'success' => $message_succes,
            //     'message_title' => $message_title,
            //     'message_content' => $message_content,
            //     'message_type' => $message_type,
            // );
            // return response()->json($array_message);
        }
        return redirect()->back()->with('error',$validator->errors()->all());
        // return response()->json(
        //     [
        //         'success' => false,
        //         'error' => $validator->errors()->all()
        //     ]
        // );
    }

    public function detail($id)
    {
        $events = Events::find($id);

        if (!empty($events)) {
            return response()->json([
                'status' => true,
                'data' => $events
            ]);
        }

        return response()->json([
            'status' => false,
            'error' => 'Data Events Tidak Ditemukan'
        ]);
    }

    public function detailEventRegister(Request $request, $id)
    {
        if ($request->ajax()) {
            // $data = Hotel::join('kamar_hotel', 'kamar_hotel.hotel_id', '=', 'hotel.id')->get();
            $data = EventRegister::where('event_id',$id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->first_name.' '.$row->last_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a class="btn btn-success btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>';
                        return $btn;
                    })
                    ->rawColumns(
                        [
                            'action',
                        ])
                    ->make(true);
        }
        $data['event'] = Events::find($id);
        return view('backend.events.eventRegisterDetail',$data);
        // $eventsRegister = EventRegister::where('event_id',$id)->get();
        // return $eventsRegister;
    }

    public function destroy($id)
    {
        $events = Events::find($id);

        if (!empty($events)) {
            $user = \Auth::user();
            $image_path = public_path('frontend/assets4/img/events/'.$events->image);
            File::delete($image_path);
            EventRegister::where('event_id',$id)->delete();
            $events->delete();

            $message_title="Berhasil !";
            $message_content="Event ".$events->title." Berhasil Dihapus";
            $message_type="success";
            $message_succes = true;

            activity('events')
                    ->performedOn($events)
                    ->causedBy($user)
                    ->withProperties(
                        [
                            'old' => [
                                'title' => $events->title
                            ]
                        ])
                    ->log('Events delete by ' . $user->name);

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);
        }
        return response()->json([
            'status' => false,
            'error' => 'Data Event Tidak Ditemukan'
        ]);
    }
}
