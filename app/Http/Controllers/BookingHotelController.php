<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\BookingHotel;
use App\Models\BookingHotelDetail;
use Validator;

class BookingHotelController extends Controller
{
    public function __construct(){
        $this->whatsapp = ['nomor' => '-', 'message' => 'Hello'];
    }

    public function index()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['booking_hotels'] = BookingHotel::join('booking_hotel_detail','booking_hotel_detail.booking_hotel_id','booking_hotel.id')
                                                ->select('booking_hotel.hotel_id','booking_hotel.kode_booking','booking_hotel.name_booking','booking_hotel.email_booking','booking_hotel.phone_booking','booking_hotel.booking_date','booking_hotel.total','booking_hotel_detail.nama_kamar','booking_hotel_detail.harga')
                                                ->where('booking_hotel.user_id',auth()->user()->id)->get();
        return view('frontend.frontend2.booking_hotel_cart', $data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'name_booking'  => 'required',
            'email_booking'  => 'required',
            'phone_booking'  => 'required',
            'booking_date'  => 'required',
        ];
 
        $messages = [
            'name_booking.required'  => 'Nama wajib diisi.',
            'email_booking.required'   => 'Email wajib diisi.',
            'phone_booking.required'   => 'No. Telepon wajib diisi.',
            'booking_date.required'   => 'Tanggal Booking wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->passes()){
            $hotel = Hotel::select('id','nama_hotel')->where('nama_hotel','LIKE',"%{$request->hotel}%")->first();
            $input['kode_booking'] = 'H-'.date('Ymd');
            $input['hotel_id'] = $hotel->id;
            $input['user_id'] = auth()->user()->id;
            $input['name_booking'] = $request->name_booking;
            $input['email_booking'] = $request->email_booking;
            $input['phone_booking'] = $request->phone_booking;
            $input['booking_date'] = $request->booking_date;
            $input['total'] = $request->amount;
    
            $booking_hotel = BookingHotel::create($input);
    
            $input1['booking_hotel_id'] = $booking_hotel->id;
            $input1['nama_kamar'] = $request->kamar;
    
            $booking_hotel_detail = BookingHotelDetail::create($input1);

            if($booking_hotel || $booking_hotel_detail){
                return redirect()->route('booking_hotel');
            }
        }
        // if($booking_hotel || $booking_hotel_detail){
        //     return redirect()->route('booking_hotel');
        // }

        // try {
        // } catch (\Throwable $th) {
        //     return redirect()->back();
        // }


        dd($input);
    }
}
