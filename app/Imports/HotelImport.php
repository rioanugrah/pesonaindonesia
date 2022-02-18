<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Hotel;

class HotelImport implements ToModel, WithHeadingRow
// class HotelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
    //     //
    // }

    public function model(array $row)
    {
        return new Hotel([
            'slug'          => $row['1'],
            'nama_hotel'    => $row['2'], 
            'alamat'        => $row['3'], 
            'provinsi'      => $row['4'], 
            'kota_kabupaten'=> $row['5'], 
            'kecamatan'     => $row['6'], 
            'kode_pos'      => $row['7'], 
            'deskrpisi'     => $row['8'], 
            'ppn'           => $row['9'], 
            'created_at'    => $row['10'], 
            'updated_at'    => $row['11'], 
            'deleted_at'    => $row['12'], 
        ]);
    }
}
