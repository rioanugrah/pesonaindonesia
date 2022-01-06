@extends('layouts.frontend_3.app')

@section('title')
    Confirmation
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
    <div class="step-section booking-section">
        <div class="container">
            <div class="step-link-wrap">
                <div class="step-item active">
                    Your cart
                    <a href="#" class="step-icon"></a>
                </div>
                <div class="step-item active">
                    Your Details
                    <a href="#" class="step-icon"></a>
                </div>
                <div class="step-item active">
                    Finish
                    <a href="#" class="step-icon"></a>
                </div>
            </div>
            <div class="confirmation-outer">
                <div class="success-notify">
                    <div class="success-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="success-content">
                        <h3>PAYMENT CONFIRMED</h3>
                        <p>Thank you, your payment has been successful and your booking is now confirmed.A confirmation
                            email has been sent to info@travele.com.</p>
                    </div>
                </div>
                <div class="confirmation-inner">
                    <div class="row">
                        <div class="col-lg-8 right-sidebar">
                            <div class="confirmation-details">
                                <h3>BOOKING DETAILS</h3>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Booking id:</td>
                                            <td>{{ $input['kode_booking'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>First Name:</td>
                                            <td>{{ $input['firstname_booking'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td>{{ $input['lastname_booking'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ $input['email_booking'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $input['phone_booking'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="details payment-details">
                                    <h3>PAYMENT</h3>
                                    <div class="details-desc">
                                        @if ($data['status'] != false)
                                        <p><a href="{{ $data['url'] }}" target="_blank">{{ $data['url'] }}</a></p>
                                        @else
                                        <p><a href="{{ $url }}" target="_blank">{{ $url }}</a></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="details">
                                    <h3>VIEW BOOKING DETAILS</h3>
                                    <div class="details-desc">
                                        <p><a href="#">https://www.travele.com/sadsd-f646556</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside class="sidebar">
                                <div class="widget-bg widget-table-summary">
                                    <h4 class="bg-title">Ringkasan</h4>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>{{ $input['qty'] }}x {{ $input['description'] }} </strong>
                                                </td>
                                                <td class="text-right">
                                                   IDR {{ number_format($input['amount'],0,",",".") }}
                                                </td>
                                            </tr>
                                            <tr class="total">
                                                <td>
                                                    <strong>Total cost</strong>
                                                </td>
                                                <td class="text-right">
                                                    <strong>IDR {{ number_format($input['amount'],0,",",".") }} </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- {{ dd(auth()->user()->id_unique) }} --}}
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
