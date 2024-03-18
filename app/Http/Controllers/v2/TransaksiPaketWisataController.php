<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\v2\TransaksiPaketWisata;
use App\Models\v2\TransaksiPaketWisataHotel;
use App\Models\v2\TransaksiPaketWisataMaskapai;

use \Carbon\Carbon;
use \Carbon\CarbonPeriod;

use DataTables;
use Notification;
use Validator;
use DB;
use Mail;
use HTTP_Request2;
class TransaksiPaketWisataController extends Controller
{
    function __construct(
        TransaksiPaketWisata $transaksi_paket_wisata,
        TransaksiPaketWisataHotel $transaksi_paket_wisata_hotel,
        TransaksiPaketWisataMaskapai $transaksi_paket_wisata_maskapai
    ){
        $this->transaksi_paket_wisata = $transaksi_paket_wisata;
        $this->transaksi_paket_wisata_hotel = $transaksi_paket_wisata_hotel;
        $this->transaksi_paket_wisata_maskapai = $transaksi_paket_wisata_maskapai;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->transaksi_paket_wisata->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('durasi_wisata', function($row){
                        $explode_durasi_wisata = explode('|',$row->durasi_wisata);
                        return $explode_durasi_wisata[0].' Hari '.$explode_durasi_wisata[1].' Malam';
                    })
                    ->addColumn('status', function($row){

                    })
                    ->addColumn('kuota_tersedia', function($row){

                    })
                    ->addColumn('jumlah_pax', function($row){

                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .= '<a href='.route('b.transaksi_paket_wisata.detail',['kode' => $row->kode, 'id' => $row->id]).' class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Detail</a>';
                        // $btn .= '<a href='.route('tour.edit',['id' => $row->id]).' class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                        // $btn .= '<button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('backend_new_2023.transaksi_paket_wisata.index');
        // return 'Transaksi Paket Wisata';
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_keberangkatan' => 'required',
            'jenis_tujuan' => 'required',
            'group_destination' => 'required',
            'durasi_hari' => 'required',
            'durasi_malam' => 'required',
            'waktu_keberangkatan' => 'required',
            'kuota_peserta' => 'required',
        ];

        $messages = [
            'nama_keberangkatan.required'   => 'Nama Keberangkatan wajib diisi.',
            'jenis_tujuan.required'   => 'Jenis Tujuan wajib diisi.',
            'group_destination.required'   => 'Objek Wisata wajib diisi.',
            'durasi_hari.required'   => 'Durasi Hari wajib diisi.',
            'durasi_malam.required'   => 'Durasi Malam wajib diisi.',
            'waktu_keberangkatan.required'   => 'Waktu Keberangkatan wajib diisi.',
            'kuota_peserta.required'   => 'Kuota Peserta wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['kode'] = 'TPW'.Carbon::today()->format('Ymd').rand(1000,9999);
            $input['nama_keberangkatan'] = $request->nama_keberangkatan;
            $input['jenis_tujuan'] = $request->jenis_tujuan;
            $input['objek_wisata'] = json_encode($request->group_destination);
            $input['durasi_wisata'] = $request->durasi_hari.'|'.$request->durasi_malam;
            $input['waktu_keberangkatan'] = $request->waktu_keberangkatan;
            $input['kuota_peserta'] = $request->kuota_peserta;
            $input['remaks'] = $request->remaks;

            $save_transaksi_paket_wisata = $this->transaksi_paket_wisata->create($input);
            if ($save_transaksi_paket_wisata) {
                $message_title="Berhasil !";
                $message_content=$input['nama_keberangkatan']." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }
        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function detail($kode,$id)
    {
        $data['transaksi_paket_wisata'] = $this->transaksi_paket_wisata->where('id',$id)->where('kode',$kode)->first();
        // dd($data);
        if (empty($data['transaksi_paket_wisata'])) {
            return redirect()->back();
        }

        return view('backend_new_2023.transaksi_paket_wisata.detail',$data);
    }

    public function edit($kode,$id)
    {
        $data['transaksi_paket_wisata'] = $this->transaksi_paket_wisata->where('id',$id)->where('kode',$kode)->first();
        if (empty($data['transaksi_paket_wisata'])) {
            return redirect()->back();
        }

        return view('backend_new_2023.transaksi_paket_wisata.edit',$data);
    }

    public function update(Request $request, $kode,$id)
    {
        $rules = [
            'nama_keberangkatan' => 'required',
            'jenis_tujuan' => 'required',
            'tujuan_wisata' => 'required',
            'group_destination' => 'required',
            'group_tour_leader' => 'required',
            'jenis_keberangkatan' => 'required',
            'durasi_hari' => 'required',
            'durasi_malam' => 'required',
            'waktu_keberangkatan' => 'required',
            'kuota_peserta' => 'required',
        ];

        $messages = [
            'nama_keberangkatan.required'   => 'Nama Keberangkatan wajib diisi.',
            'jenis_tujuan.required'   => 'Jenis Tujuan wajib diisi.',
            'tujuan_wisata.required'   => 'Tujuan Wisata wajib diisi.',
            'group_destination.required'   => 'Objek Wisata wajib diisi.',
            'group_tour_leader.required'   => 'Leader wajib diisi.',
            'jenis_keberangkatan.required'   => 'Jenis Keberangkatan wajib diisi.',
            'durasi_hari.required'   => 'Durasi Hari wajib diisi.',
            'durasi_malam.required'   => 'Durasi Malam wajib diisi.',
            'waktu_keberangkatan.required'   => 'Waktu Keberangkatan wajib diisi.',
            'kuota_peserta.required'   => 'Kuota Peserta wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $update_transaksi_paket_wisata = $this->transaksi_paket_wisata->where('id',$id)->where('kode',$kode)->first();
            $input['nama_keberangkatan'] = $request->nama_keberangkatan;
            $input['jenis_tujuan'] = $request->jenis_tujuan;
            $input['tujuan_wisata'] = $request->tujuan_wisata;
            $input['objek_wisata'] = json_encode($request->group_destination);
            $input['durasi_wisata'] = $request->durasi_hari.'|'.$request->durasi_malam;
            $input['jenis_keberangkatan'] = $request->jenis_keberangkatan;
            $input['waktu_keberangkatan'] = $request->waktu_keberangkatan;
            $input['kuota_peserta'] = $request->kuota_peserta;
            $input['tour_leader'] = json_encode($request->group_tour_leader);
            $input['remaks'] = $request->remaks;

            $update_transaksi_paket_wisata->update($input);
            if ($update_transaksi_paket_wisata) {
                $message_title="Berhasil !";
                $message_content=$input['nama_keberangkatan']." Berhasil Diupdate";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }
        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function simpan_hotel_wisata(Request $request,$kode,$id)
    {
        $rules = [
            'hotel_lokasi' => 'required',
            'hotel_nama_hotel' => 'required',
            'hotel_jumlah_malam' => 'required',
            'hotel_checkin' => 'required',
        ];

        $messages = [
            'hotel_lokasi.required'   => 'Lokasi wajib diisi.',
            'hotel_nama_hotel.required'   => 'Nama Hotel wajib diisi.',
            'hotel_jumlah_malam.required'   => 'Jumlah Malam wajib diisi.',
            'hotel_checkin.required'   => 'Check In wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['t_paket_wisata_id'] = $id;
            $input['nama_hotel'] = $request->hotel_nama_hotel;
            $input['lokasi'] = $request->hotel_lokasi;
            $input['jumlah_malam'] = $request->hotel_jumlah_malam;
            $input['check_in'] = $request->hotel_checkin;

            $save_transaksi_paket_wisata_hotel = $this->transaksi_paket_wisata_hotel->create($input);
            if ($save_transaksi_paket_wisata_hotel) {
                $message_title="Berhasil !";
                $message_content=$input['nama_hotel']." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }

        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function detail_wisata_hotel($kode,$id)
    {
        $datas = $this->transaksi_paket_wisata_hotel->where('t_paket_wisata_id',$id)->get();
        if ($datas->isEmpty()) {
            return response()->json([
                'success' => false
            ]);
        }else{
            foreach ($datas as $key => $data) {
                $transaksi_paket_wisata_hotel[] = [
                    'no' => $key+1,
                    'id' => $data->id,
                    'nama_hotel' => $data->nama_hotel,
                    'lokasi' => $data->lokasi,
                    'jumlah_malam' => $data->jumlah_malam,
                    'check_in' => $data->check_in,
                ];
            }
            return response()->json([
                'success' => true,
                'data' => $transaksi_paket_wisata_hotel
            ]);
            // return $transaksi_paket_wisata_hotel;
        }
    }

    public function edit_wisata_hotel($kode,$id,$t_paket_wisata_id)
    {
        $data = $this->transaksi_paket_wisata_hotel->where('id',$t_paket_wisata_id)->where('t_paket_wisata_id',$id)->first();
        if (empty($data)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Data tidak ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function update_hotel_wisata(Request $request,$kode,$id)
    {
        $rules = [
            'edit_hotel_lokasi' => 'required',
            'edit_hotel_nama_hotel' => 'required',
            'edit_hotel_jumlah_malam' => 'required',
            'edit_hotel_checkin' => 'required',
        ];

        $messages = [
            'edit_hotel_lokasi.required'   => 'Lokasi wajib diisi.',
            'edit_hotel_nama_hotel.required'   => 'Nama Hotel wajib diisi.',
            'edit_hotel_jumlah_malam.required'   => 'Jumlah Malam wajib diisi.',
            'edit_hotel_checkin.required'   => 'Check In wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $update_transaksi_paket_wisata_hotel = $this->transaksi_paket_wisata_hotel->where('id',$request->edit_hotel_id)->where('t_paket_wisata_id',$id)->first();
            $input['nama_hotel'] = $request->edit_hotel_nama_hotel;
            $input['lokasi'] = $request->edit_hotel_lokasi;
            $input['jumlah_malam'] = $request->edit_hotel_jumlah_malam;
            $input['check_in'] = $request->edit_hotel_checkin;
            $update_transaksi_paket_wisata_hotel->update($input);
            // $save_transaksi_paket_wisata_hotel = $this->transaksi_paket_wisata_hotel->create($input);
            if ($update_transaksi_paket_wisata_hotel) {
                $message_title="Berhasil !";
                $message_content=$input['nama_hotel']." Berhasil Diperbarui";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }

        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function delete_hotel_wisata($kode,$id,$t_paket_wisata_id)
    {
        $data = $this->transaksi_paket_wisata_hotel->where('id',$t_paket_wisata_id)->where('t_paket_wisata_id',$id)->first();
        if(empty($data))
        {
            return response()->json([
                'success' => false,
                'message_title' => 'Data tidak ditemukan'
            ]);
        }
        $data->delete();
        return response()->json([
            'success' => true,
            'message_title' => 'Berhasil',
            'message_content' => $data->nama_hotel.' berhasil dihapus'
        ]);
    }

    public function detail_wisata_maskapai($kode,$id)
    {
        $datas = $this->transaksi_paket_wisata_maskapai->where('t_paket_wisata_id',$id)->get();
        if ($datas->isEmpty()) {
            return response()->json([
                'success' => false
            ]);
        }else{
            foreach ($datas as $key => $data) {
                $transaksi_paket_wisata_maskapai[] = [
                    'no' => $key+1,
                    'id' => $data->id,
                    'nama_maskapai' => $data->nama_maskapai,
                    'no_penerbangan' => $data->no_penerbangan,
                    'arah' => $data->arah,
                    'jam_berangkat' => $data->jam_berangkat,
                    'remaks' => $data->remaks,
                ];
            }
            return response()->json([
                'success' => true,
                'data' => $transaksi_paket_wisata_maskapai
            ]);
            // return $transaksi_paket_wisata_hotel;
        }
    }

    public function simpan_maskapai_wisata(Request $request, $kode,$id)
    {
        $rules = [
            'maskapai_nama_maskapai' => 'required',
            'maskapai_no_penerbangan' => 'required',
            'maskapai_arah' => 'required',
            'maskapai_jam_berangkat' => 'required',
        ];

        $messages = [
            'maskapai_nama_maskapai.required'   => 'Nama Maskapai wajib diisi.',
            'maskapai_no_penerbangan.required'   => 'No. Penerbangan wajib diisi.',
            'maskapai_arah.required'   => 'Arah Keberangkatan wajib diisi.',
            'maskapai_jam_berangkat.required'   => 'Jam Keberangkatan wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['t_paket_wisata_id'] = $id;
            $input['nama_maskapai'] = $request->maskapai_nama_maskapai;
            $input['no_penerbangan'] = $request->maskapai_no_penerbangan;
            $input['arah'] = $request->maskapai_arah;
            $input['jam_berangkat'] = $request->maskapai_jam_berangkat;
            $input['remaks'] = $request->remaks;

            $save_transaksi_paket_wisata_maskapai = $this->transaksi_paket_wisata_maskapai->create($input);
            if ($save_transaksi_paket_wisata_maskapai) {
                $message_title="Berhasil !";
                $message_content=$input['nama_maskapai']." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }

        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function edit_wisata_maskapai($kode,$id,$t_paket_wisata_id)
    {
        $data = $this->transaksi_paket_wisata_maskapai->where('id',$t_paket_wisata_id)->where('t_paket_wisata_id',$id)->first();
        if (empty($data)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Data tidak ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function update_maskapai_wisata(Request $request,$kode,$id)
    {
        $rules = [
            'edit_maskapai_nama_maskapai' => 'required',
            'edit_maskapai_no_penerbangan' => 'required',
            'edit_maskapai_arah' => 'required',
            'edit_maskapai_jam_berangkat' => 'required',
        ];

        $messages = [
            'edit_maskapai_nama_maskapai.required'   => 'Nama Maskapai wajib diisi.',
            'edit_maskapai_no_penerbangan.required'   => 'No. Penerbangan wajib diisi.',
            'edit_maskapai_arah.required'   => 'Arah Keberangkatan wajib diisi.',
            'edit_maskapai_jam_berangkat.required'   => 'Jam Keberangkatan wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $update_transaksi_paket_wisata_maskapai = $this->transaksi_paket_wisata_maskapai->where('id',$request->edit_maskapai_id)->where('t_paket_wisata_id',$id)->first();
            $input['nama_maskapai'] = $request->edit_maskapai_nama_maskapai;
            $input['no_penerbangan'] = $request->edit_maskapai_no_penerbangan;
            $input['arah'] = $request->edit_maskapai_arah;
            $input['jam_berangkat'] = $request->edit_maskapai_jam_berangkat;
            $input['remaks'] = $request->edit_maskapai_remaks;
            $update_transaksi_paket_wisata_maskapai->update($input);
            // $save_transaksi_paket_wisata_hotel = $this->transaksi_paket_wisata_hotel->create($input);
            if ($update_transaksi_paket_wisata_maskapai) {
                $message_title="Berhasil !";
                $message_content=$input['nama_maskapai']." Berhasil Diperbarui";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }

        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function delete_maskapai_wisata($kode,$id,$t_paket_wisata_id)
    {
        $data = $this->transaksi_paket_wisata_maskapai->where('id',$t_paket_wisata_id)->where('t_paket_wisata_id',$id)->first();
        if(empty($data))
        {
            return response()->json([
                'success' => false,
                'message_title' => 'Data tidak ditemukan'
            ]);
        }
        $data->delete();
        return response()->json([
            'success' => true,
            'message_title' => 'Berhasil',
            'message_content' => $data->nama_maskapai.' berhasil dihapus'
        ]);
    }
}
