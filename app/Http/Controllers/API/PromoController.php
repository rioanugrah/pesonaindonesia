<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PromoController extends Controller
{
    public function index()
    {
        $datas = DB::table('promosi')->get();
        foreach ($datas as $key => $data) {
            $promo[] = [
                'id' => $data->id,
                'id_generate' => $data->id_generate,
                'slug' => $data->slug,
                'nama_promosi' => $data->nama_promosi,
                'deskripsi' => $data->deskripsi,
                'images' => asset('frontend/assets5/promosi/'.$data->images),
            ];
        }
        return response()->json(
            [
                'success' => true,
                'data' => $promo
            ]
        );
    }
}
