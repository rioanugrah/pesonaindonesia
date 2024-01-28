<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\v2\Tour;
use \Carbon\Carbon;
use DataTables;
use Validator;
use File;

class TourController extends Controller
{
    function __construct(
        Tour $tour
    ){
        $this->tour = $tour;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tour::get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                        
                    })
                    ->addColumn('action', function($row){
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
                        // return $btn;
                    })
                    ->rawColumns(
                        [
                            'action',
                        ])
                    ->make(true);
        }
        return view('backend_new_2023.tour.index');
    }
}
