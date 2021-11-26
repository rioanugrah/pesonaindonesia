<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use DataTables;
use Validator;
class RolesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Roles::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href='.$row->created_at.' type="button" class="btn btn-warning btn-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-icon">
                                    <i class="fa fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.roles.index');
    }
}
