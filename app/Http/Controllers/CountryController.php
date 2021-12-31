<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use DB;
class CountryController extends Controller
{
    public function simpan()
    {
        //  Initiate curl
        $url = 'https://restcountries.com/v2/all';
        $ch = curl_init();
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        $data = json_decode($result, true);
        foreach ($data as $key => $value) {
            DB::table('country')->insert([
                'nama_negara' => $value['name'],
                'kode_negara' => $value['alpha2Code'],
                'kode_telepon' => $value['callingCodes'][0],
                // 'kapital' => $value['capital'][0],
                'region' => $value['region'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        return 'Data Disimpan';
    }
}
