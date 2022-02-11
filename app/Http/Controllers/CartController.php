<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Country;
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

    public function chart($id)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['carts'] = Cart::where('id',$id)->
                                where('user_id',auth()->user()->id)->first();
        $data['cart_detail'] = CartItem::where('cart_id',$id)->first();

        return view('frontend.frontend4.checkout',$data);
    }

    public function simpan(Request $request)
    {
        $input['id'] = Str::uuid()->toString();
        $input['kode_booking'] = 'H-'.rand(100,999).date('Ymd');
        $input['user_id'] = auth()->user()->id;
        $input['is_cart'] = 'W';
        $input['jppn'] = $request->jppn;
        $input['created_at'] = Carbon::now();

        // dd($input);

        $cek_cart = Cart::where('user_id',auth()->user()->id)
                        ->where('is_cart','W')
                        ->select('id','user_id')->first();
        if($cek_cart){
            return redirect()->route('checkout.id', ['id'=>$cek_cart->id])->with('danger','Selesaikan Booking Anda');
        }else{
            // dd($inputItem['qty'] = $request->qty);
            $cart = Cart::create($input);
    
            if($cart){
                $inputItem['cart_id'] = $cart->id;
                $inputItem['nama_item'] = $request->nama_item;
                $inputItem['price'] = $request->price;
                $inputItem['qty'] = $request->qty;
                $inputItem['created_at'] = Carbon::now();
                $inputItem['updated_at'] = $request->updated_at;
                
                $cartItem = CartItem::create($inputItem);
                
                return redirect()->route('checkout.id', $input['id']);
            }
        }

        // dd($input);
    }

    public function status($kode_booking)
    {
        Cart::where('kode_booking',$kode_booking)->update([
            'is_cart' => 'S'
        ]);
        return response()->json([
            'status' => true
        ]);
    }

    public function checkout(Request $request)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['data'] = $request->all();
        $data['data']['jmlppn'] = $request->jppn;
        $cekCart = Cart::where('kode_booking',$request->kode_booking)->first();
        $data['data']['created_at'] = $cekCart->created_at;
        $cart = Cart::where('kode_booking',$cekCart->kode_booking)->update([
            'price' => $request->order_total
        ]);
        $cartItem = CartItem::where('cart_id',$cekCart->id)->update([
            'qty' => $request->qty
        ]);
        // $data['country'] = $request->all();
        // dd($data['data']);
        // dd($cart);
        // dd($request->all());
        return view('frontend.frontend4.checkout', $data);
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        if(!empty($cart)){
            $cartItem = CartItem::where('cart_id',$cart->id)->delete();
            $cart->delete();
            return redirect()->route('cart');
        }else{
            return redirect('/');
        }
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data Berhasil Dihapus'
        // ]);
    }
}
