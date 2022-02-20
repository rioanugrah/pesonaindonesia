<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Events;
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
                        return "<img src='".url('frontend/assets4/img/events/'.$row->image)."' width='150' />";
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
                            return '<span class="text-success"><b>Selesai</b></span>';
                        }else{
                            return Carbon::parse($row->finish_event)->isoFormat('llll');
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a class="btn btn-success btn-sm" title="Detail">
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

    public function simpan(Request $request)
    {
        $rules = [
            'title' => 'required',
            'image'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'title.required' => 'Judul Event wajib diisi.',
            'image.required'  => 'Upload Gambar wajib diisi.',
            'image.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $input = $request->all();
            $input['slug'] = Str::slug($request->title);
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('frontend/assets4/img/events'), $input['image']);

            $events = Events::create($input);

            if($events){
                $message_title="Berhasil !";
                $message_content="Event ".$input['title']." Berhasil Dibuat";
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
