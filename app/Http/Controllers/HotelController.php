<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Hotel;
use App\Models\CheckRoom;
use App\Models\FasilitasHotel;
use App\Models\FasilitasUmumHotel;
use App\Models\KebijakanHotel;
use App\Models\KamarHotel;
use App\Models\ImageHotel;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;

use App\Exports\HotelExport;
use App\Imports\HotelImport;
use Maatwebsite\Excel\Facades\Excel;
use \Carbon\Carbon;

use DataTables;
use Validator;
class HotelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Hotel::join('kamar_hotel', 'kamar_hotel.hotel_id', '=', 'hotel.id')->get();
            $data = Hotel::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kamar', function($row){
                        $btn = '<a href='.route('kamar', ['id' => $row->id]).' class="btn btn-success btn-sm" title="Kamar">
                                    <i class="fas fa-bed"></i>
                                </a>';
                        return $btn;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="gambar('.$row->id.')" class="btn btn-success btn-sm" title="Upload Gambar Hotel">
                                    <i class="fas fa-upload"></i> Upload Gambar Hotel
                                </button>
                                <button onclick="room('.$row->id.')" class="btn btn-primary btn-sm" title="Upload Gambar Hotel">
                                    <i class="fas fa-bed"></i> Check Room
                                </button>
                                <a href='.route('hotel.detail', ['id' => $row->id]).' class="btn btn-success btn-sm" title="Detail">
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
                    ->rawColumns(['action','kamar'])
                    ->make(true);
        }
        $data['icons'] = [
            ['icon' => 'wifi.png', 'value' => 'Wifi'],
            ['icon' => 'parked-car.png', 'value' => 'Parkir'],
            ['icon' => 'air-conditioner.png', 'value' => 'AC'],
            ['icon' => 'restaurant.png', 'value' => 'Restoran'],
            ['icon' => 'meeting.png', 'value' => 'Ruang Rapat'],
        ];
        $data['provinsis'] = Provinsi::pluck('nama','id');
        // dd($data['provinsis']);
        // return view('backend.hotel.hotel', $data);
        return view('backend.hotel.index_new', $data);
    }
    
}
