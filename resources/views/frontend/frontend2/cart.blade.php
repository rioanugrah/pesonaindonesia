@extends('layouts.frontend_3.app')

@section('title')
    Booking
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <div class="inner-baner-container"
            style="background-image: url({{ asset('frontend/assets3/images/wallpaper/news-6.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">Booking</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <div class="step-section cart-section">
        <div class="container">
            <div class="step-link-wrap">
                <div class="step-item active">
                    Your cart
                    <a class="step-icon"></a>
                </div>
                <div class="step-item">
                    Your Details
                    <a class="step-icon"></a>
                </div>
                <div class="step-item">
                    Finish
                    <a class="step-icon"></a>
                </div>
            </div>
            <!-- step one form html start -->
            <div class="cart-list-inner">
                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Kode Booking</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $key => $cart)
                                @if ($cart->is_cart != 'S')
                                <tr>
                                    <td>
                                        <button type="button" class="close" onclick="hapus('{{ $cart->id }}')"><span>×</span></button>
                                    </td>
                                    <td data-column="Kode Booking">
                                        <div class="accordion" id="accordion{{ $key }}">
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $key }}">
                                                   <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                                    {{ $cart->kode_booking }}
                                                    <input type="hidden" name="kode_booking" value="{{ $cart->kode_booking }}">
                                                   </button>
                                                </div>
                                                <div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordion{{ $key }}">
                                                   <div class="card-body">
                                                    <?php $cartItems = \App\Models\CartItem::where('cart_id', $cart->id)->select('nama_item','qty','price')->get(); ?>
                                                    @foreach ($cartItems as $cartItem)
                                                    <input type="hidden" name="item_detail" value="{{ $cartItem->nama_item }}">
                                                    {{ $cartItem->nama_item }}
                                                    @endforeach 
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-column="Price">IDR {{ number_format($cartItem->price,0,",",".") }}
                                    <input type="hidden" class="price" name="price" value="{{ $cartItem->price }}">
                                    <input type="hidden" name="created_at" value="{{ $cartItem->created_at }}">
                                    </td>
                                    <td data-column="Quantity" class="count-input">
                                        <div>
                                            <a class="minus-btn1"><i class="fa fa-minus"></i></a>
                                            <input class="quantity1" type="text" name="qty" id="jumlah">
                                            <a class="plus-btn1"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </td>
                                    <td data-column="Sub Total" class="sub_total"></td>
                                    <input type="hidden" name="sub_total" class="subs_total">
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data Tidak Tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="updateArea">
                        <a href="#" class="outline-primary update-btn">update cart</a>
                    </div>
                    <div class="totalAmountArea">
                        <ul class="list-unstyled">
                            <li><strong>Total Semua</strong> <span class="grandTotal">0</span></li>
                        </ul>
                    </div>
                    <div class="checkBtnArea text-right">
                        <button type="submit" class="button-primary">checkout</button>
                    </div>
                </form>
            </div>
            <!-- step one form html end -->
        </div>
    </div>
@endsection

@section('js')
    <script>
        
        let counterDisplayElem = document.querySelector('.sub_total');
        let counterDisplayTotalSemua2 = document.querySelector('.grandTotal');
        let counterMinusElem = document.querySelector('.minus-btn1');
        let counterPlusElem = document.querySelector('.plus-btn1');
        let count = 1;

        updateDisplay();

        counterPlusElem.addEventListener("click",()=>{
            count++;
            updateDisplay();
        }) ;

        counterMinusElem.addEventListener("click",()=>{
            count--;
            updateDisplay();
        });

        function updateDisplay(){
            var bilangan = $('.price').val() * count;
	
            var	number_string = bilangan.toString(),
                sisa 	= number_string.length % 3,
                rupiah 	= number_string.substr(0, sisa),
                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            counterDisplayElem.innerHTML = 'IDR '+rupiah;
            counterDisplayTotalSemua2.innerHTML = 'IDR '+rupiah;
            $('.subs_total').val(bilangan);
            $('.quantity1').val(count);
            // counterDisplayElem.innerHTML = count;
        };

        function hapus(id) {
            $.ajax({
                url: "{{ url('cart/delete') }}"+'/'+id,
                type: 'GET',
                success: function(result) {
                    if(result.status == true){
                        alert(result.message);
                        location.reload();
                    }else{
                        alert(result.message);
                    }
                    // Do something with the result
                }
            });
            // alert(id);
            // location.reload();
        }
    </script>
@endsection