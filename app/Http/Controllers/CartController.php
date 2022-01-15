<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function __construct(){
        $this->whatsapp = ['nomor' => env('WA_BUSINESS'), 'message' => env('WA_MESSAGE')];
    }

    public function index()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['carts'] = Cart::where('user_id',auth()->user()->id)->get();
        // dd($data);
        return view('frontend.frontend4.cart',$data);
    }

    public function simpan(Request $request)
    {
        $input['id'] = Str::uuid()->toString();
        $input['kode_booking'] = 'H-'.rand(100,999).date('Ymd');
        $input['user_id'] = auth()->user()->id;
        $input['is_cart'] = 'P';
        $input['created_at'] = Carbon::now();

        $cek_cart = Cart::where('user_id',auth()->user()->id)
                        ->select('user_id')->first();
        if($cek_cart){
            return redirect()->route('cart')->with('danger','Selesaikan Booking Anda');
        }else{
            $cart = Cart::create($input);
    
            if($cart){
                $inputItem['cart_id'] = $cart->id;
                $inputItem['nama_item'] = $request->nama_item;
                $inputItem['price'] = $request->price;
                $inputItem['created_at'] = Carbon::now();
                $inputItem['updated_at'] = $request->updated_at;
                
                $cartItem = CartItem::create($inputItem);
                
                return redirect()->route('cart');
            }
        }

        // dd($input);
    }

    public function checkout(Request $request)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['data'] = $request->all();
        // dd($data['data']);
        // dd($request->all());
        return view('frontend.frontend2.checkout', $data);
    }

    public function delete($id)
    {
        $cart = Cart::find($id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Dihapus'
        ]);
    }
}
