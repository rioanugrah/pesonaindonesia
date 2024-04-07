@extends('layouts.backend_new_2023.master')
@section('title')
    Event {{ $event->title }}
@endsection
@section('css')
<link href="{{ URL::asset('backend_new/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    @include('backend_new_2023.event.modalEventPrice')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ $event->title }}</h4>
                        <hr>
                        <img class="rounded mr-2" width="300" src="{{ asset('events/cover/'.$event->cover_image) }}" data-holder-rendered="true" style="width: 100%; height: 250px; object-fit: cover;">
                        <div>
                            @foreach (json_decode($event->image) as $image)
                            <img class="rounded mr-2 ml-2 mb-1 mt-4" width="200" src="{{ asset('events/'.$image) }}" data-holder-rendered="true" style="width: 200px; height: 200px; object-fit: cover;">
                            @endforeach
                        </div>
                        <div>Description</div>
                        <div>{!! $event->description !!}</div>
                        <hr>
                        <div class="mb-3"><span></span> Team Lead : {{ $event->team_lead }}</div>
                        <div class="mb-3"><span></span> Committee : </div>
                        <ul>
                            @foreach (json_decode($event->committee) as $committee)
                            <li>
                                <div>{{ $committee->team.' - '.$committee->position }}</div>
                            </li>
                            @endforeach
                        </ul>
                        <div><span class="bx bx-calendar-event"></span> Schedule :</div>
                        <ul>
                            @foreach (json_decode($event->schedules) as $schedules)
                            <li>
                                <div>{{ $schedules->day }}</div>
                                <div>{{ \Carbon\Carbon::create($schedules->time)->isoFormat('DD MMMM YYYY h:mm:ss') }}</div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="mb-3">Event Price : <button type="button" onclick="event_price()" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create Price Event</button></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Event Name</th>
                                    <th class="text-center">Quota</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_event_price"></tbody>
                        </table>
                        <div><span class="mdi mdi-crosshairs-gps"></span> Location :</div>
                        <div>{{ $event->location }}</div>
                        <iframe style="width: 100%" height="400" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+({{ $event->location }})&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('b.events.edit',['id' => $event->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit Data</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ URL::asset('backend_new/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
<script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function event_price() {
            $('#event_price').modal('show');
        };

        $('.repeater').repeater({
            show: function show() {
                $(this).slideDown();
            },
            hide: function hide(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function ready(setIndexes) {}
        });

        function event_product(id) {
            $.ajax({
                type: 'GET',
                url: "{{ route('b.events.product',['id' => $event->id]) }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function(){
                    $('.modalloading').modal('show');
                },
                success: function(result){
                    var dataEventProduct = result;
                    var txt = "";
                    dataEventProduct.forEach(hasilEventProduct);
                    function hasilEventProduct(value,index) {
                        txt = txt+"<tr>";
                        txt = txt+  "<td class='text-center'>"+value.product+"</td>";
                        txt = txt+  "<td class='text-center'>"+value.quota+"</td>";
                        txt = txt+  "<td class='text-center'>"+value.price+"</td>";
                        txt = txt+  "<td></td>";
                        txt = txt+"</tr>";
                    }
                    document.getElementById('table_event_price').innerHTML = txt;

                    $('.modalloading').modal('hide');
                    // setInterval(() => {
                    //     $('.modalloading').modal('hide');
                    // }, 3000);

                },
                error: function (request, status, error) {
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('.modalloading').modal('hide');
                }
            })
        };

        $('#upload-form-product').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('b.events.product_simpan',['id' => $event->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('.modalloading').modal('show');
                    $('#event_price').modal('hide');
                },
                success: (result) => {
                    if(result.success != false){
                        toastr["success"](result.message_content);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        event_product();
                        setInterval(() => {
                            $('.modalloading').modal('hide');
                        }, 3000);
                    }else{
                        toastr["error"](result.error);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        $('.modalloading').modal('hide');
                    }
                },
                error: function (request, status, error) {
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('.modalloading').modal('hide');
                }
            });
        });

        $(document).ready(function(){
            event_product();
        });
    </script>
@endsection
