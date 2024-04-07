<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Announcement;
use DataTables;
use Validator;

class AnnouncementController extends Controller
{
    function __construct(
        Announcement $announcement
    ){
        $this->announcement = $announcement;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->announcement->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        switch ($row->status) {
                            case 'O':
                                return '<span class="badge bg-success">Open</span>';
                                break;
                            case 'C':
                                return '<span class="badge bg-danger">Close</span>';
                                break;
                            default:
                                return '<span class="badge bg-danger">Fail</span>';
                                break;
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a class="btn btn-warning btn-sm" onclick="edit(`'.$row->id.'`)">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>';
                        return $btn;
                    })
                    ->rawColumns(
                        [
                            'action',
                            'status',
                        ])
                    ->make(true);
        }
        return view('backend_new_2023.announcement.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul Event wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['title'] = $request->title;
            $input['description'] = $request->description;
            $input['status'] = 'O';

            $announcements = $this->announcement->create($input);

            if ($announcements) {
                $message_title="Berhasil !";
                $message_content= "Announcement ".$request->title." Berhasil Disimpan";
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
        $announcements = $this->announcement->find($id);
        if (empty($announcements)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal',
                'message_content' => 'Announcement Tidak Ada'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $announcements
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'edit_title' => 'required',
            'edit_description' => 'required',
        ];

        $messages = [
            'edit_title.required' => 'Judul Event wajib diisi.',
            'edit_description.required' => 'Deskripsi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $announcement = $this->announcement->find($request->edit_id);
            $input['title'] = $request->edit_title;
            $input['description'] = $request->edit_description;
            $input['status'] = $request->edit_status;
            $announcement->update($input);

            if ($announcement) {
                $message_title="Berhasil !";
                $message_content= "Announcement ".$request->edit_title." Berhasil Disimpan";
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
