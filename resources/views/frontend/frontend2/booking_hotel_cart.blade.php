@extends('layouts.frontend_3.app')

@section('title')
    Booking Hotel
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <div class="inner-baner-container"
            style="background-image: url({{ asset('frontend/assets3/images/wallpaper/news-6.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">Booking Hotel</h1>
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
                    <a href="#" class="step-icon"></a>
                </div>
                <div class="step-item">
                    Your Details
                    <a href="#" class="step-icon"></a>
                </div>
                <div class="step-item">
                    Finish
                    <a href="#" class="step-icon"></a>
                </div>
            </div>
            <!-- step one form html start -->
            <div class="cart-list-inner">
                <form action="#">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Hotel</th>
                                    <th>Nama Kamar</th>
                                    <th>Harga</th>
                                    <th>Jumlah Kamar</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($booking_hotels as $bookhotel)
                                <tr>
                                    <td class="">
                                        <button class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </td>
                                    <td data-column="Nama Hotel">{{ $bookhotel->hotel->nama_hotel }}</td>
                                    <td data-column="Kamar Hotel">{{ $bookhotel->nama_kamar }}</td>
                                    <td data-column="Price">IDR {{ number_format($bookhotel->harga,0,",",".") }}
                                    <input type="hidden" class="price" value="{{ $bookhotel->harga }}">
                                    </td>
                                    <td data-column="Quantity" class="count-input">
                                        <div>
                                            <a class="minus-btn" href="#"><i class="fa fa-minus"></i></a>
                                            <input class="quantity" type="text" id="jumlah_kamar">
                                            <a class="plus-btn" href="#"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </td>
                                    <td data-column="Sub Total" class="sub_total"></td>
                                    <input type="hidden" class="subs_total">
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="updateArea">
                        <a href="#" class="outline-primary update-btn">update cart</a>
                    </div>
                    <div class="totalAmountArea">
                        <ul class="list-unstyled">
                            <li><strong>Total</strong> <span class="total_semua">0</span></li>
                            <li><strong>Total Semua</strong> <span class="grandTotal">0</span></li>
                        </ul>
                    </div>
                    <div class="checkBtnArea text-right">
                        <a href="#" class="button-primary">checkout</a>
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
        let counterDisplayTotalSemua = document.querySelector('.total_semua');
        let counterDisplayTotalSemua2 = document.querySelector('.grandTotal');
        let counterMinusElem = document.querySelector('.minus-btn');
        let counterPlusElem = document.querySelector('.plus-btn');
        let count = 0;

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
            counterDisplayTotalSemua.innerHTML = 'IDR '+rupiah;
            counterDisplayTotalSemua2.innerHTML = 'IDR '+rupiah;
            $('.subs_total').val(rupiah);
            $('.quantity').val(count);
            // counterDisplayElem.innerHTML = count;
        };


    </script>
@endsection