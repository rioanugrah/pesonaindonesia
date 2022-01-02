<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function __construct(){
        $this->whatsapp = ['nomor' => '-', 'message' => 'Hello'];
    }

    public function index()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['carts'] = Cart::where('user_id',auth()->user()->id)->get();
        // dd($data);
        return view('frontend.frontend2.cart',$data);
    }

    public function simpan(Request $request)
    {
        $input['id'] = Str::uuid()->toString();
        $input['kode_booking'] = 'H-'.rand(100,999).date('Ymd');
        $input['user_id'] = auth()->user()->id;
        
        $cart = Cart::create($input);

        if($cart){
            $inputItem['cart_id'] = $cart->id;
            $inputItem['nama_item'] = $request->nama_item;
            $inputItem['price'] = $request->price;
            
            $cartItem = CartItem::create($inputItem);
            
            return redirect()->route('cart');
        }
        return redirect()->back();


        // dd($input);
    }

    public function checkout(Request $request)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['data'] = $request->all();
        // dd($request->all());
        return view('frontend.frontend2.checkout', $data);
    }
}
