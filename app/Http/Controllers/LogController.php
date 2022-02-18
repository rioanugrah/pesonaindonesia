<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Models\Log;
use DataTables;

class LogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Log::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('created_at', function($row){
                        return Carbon::parse($row->created_at)->isoFormat('llll') ;
                    })
                    ->addColumn('updated_at', function($row){
                        return Carbon::parse($row->updated_at)->isoFormat('llll') ;
                    })
                    ->addColumn('data', function($row){
                        $model = "App\Models";

                        if($model.'\Slider'){
                            return $row->slider->nama_slider;
                        }
                    })
                    ->make(true);
        }
        return view('backend.log.index');
    }
}
