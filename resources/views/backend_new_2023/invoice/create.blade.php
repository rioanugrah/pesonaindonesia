@extends('layouts.backend_new_2023.master')
@section('title')
    Buat Invoice
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Invoice
        @endslot
        @slot('title')
            @yield('title')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        {{-- <h4 class="float-end font-size-16">Invoice #MN0131 <span
                                class="badge bg-success font-size-12 ms-2">Paid</span></h4> --}}
                        <div class="mb-4">
                            <img src="{{ URL::asset('backend_2023/images/logo_plesiran_new_black.webp') }}" height="50" />
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">Jl. Raya Tlogowaru No. 3, Tlogowaru <br> Kec. Kedungkandang, Kota Malang, Jawa Timur</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> business@plesiranindonesia.com</p>
                            <p><i class="uil uil-phone me-1"></i> 0813-3112-6991</p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2"><input type="text" name="nama_pembeli" class="form-control" placeholder="Nama Pembeli"></h5>
                                <p class="mb-2"><input type="text" name="email_pembeli" class="form-control" placeholder="Email"></p>
                                <p><input type="text" name="no_telp_pembeli" class="form-control" placeholder="No.Telp Pembeli"></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-16 mb-3">Kategori Invoice</h5>
                                    <p><input type="text" name="invoice_kategori_id" class="form-control" placeholder="Kategori Invoice"></p>
                                </div>
                                <div class="mt-1">
                                    <h5 class="font-size-16 mb-1">Tanggal Invoice</h5>
                                    <p><input type="date" name="tanggal_invoice" class="form-control"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <h5 class="font-size-15">Ringkasan Pesanan</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>#</td>
                                <td style="width: 50%"><input type="text" name="" class="form-control" id="item"></td>
                                <td><input type="text" name="" class="form-control price" id="price"></td>
                                <td style="width: 5%"><input type="text" name="" class="form-control jml" id="jml"></td>
                                <td><input type="text" name="" class="form-control total" id="total"></td>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="text-align: right">Total All</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <button id="tambah">Click me: 0</button> --}}
                        {{-- <input type="button" id="tambah" class="btn btn-success mt-3 mt-lg-0" value="Add"> --}}
                        <input type="button" onclick="tambah()" class="btn btn-success mt-3 mt-lg-0" value="Add">
                        {{-- <div class="repeater">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="items">
                                    <tr data-repeater-item>
                                        <td>#</td>
                                        <td style="width: 50%"><input type="text" name="" class="form-control" id=""></td>
                                        <td><input type="text" name="" class="form-control price" onkeyup="sum()" id=""></td>
                                        <td style="width: 5%"><input type="text" name="" class="form-control jml" onkeyup="sum()" id=""></td>
                                        <td><input type="text" name="" class="form-control total" id=""></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align: right">Total All</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                        </div> --}}
                        {{-- <div class="row">
                            <div class="mb-3 col-lg-1 text-center">
                                <label for="">#</label>
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="">Item</label>
                            </div>
                            <div class="mb-3 col-lg-2 text-center">
                                <label for="">Harga</label>
                            </div>
                            <div class="mb-3 col-lg-1 text-center">
                                <label for="">Jumlah</label>
                            </div>
                            <div class="mb-3 col-lg-2 text-center">
                                <label for="">Total</label>
                            </div>
                        </div>
                        <div class="repeater">
                            <div data-repeater-list="list_item">
                                <div data-repeater-item class="row">
                                    <div class="mb-3 col-lg-1">
                                        <input type="text" name="" class="form-control no" id="">
                                    </div>
                                    <div class="mb-3 col-lg-5">
                                        <input type="text" name="" class="form-control" id="">
                                    </div>
                                    <div class="mb-3 col-lg-2">
                                        <input type="text" name="" class="form-control price" onkeyup="sum()" id="">
                                    </div>
                                    <div class="mb-3 col-lg-1">
                                        <input type="text" name="" class="form-control jml" onkeyup="sum()" id="">
                                    </div>
                                    <div class="mb-3 col-lg-2">
                                        <input type="text" name="" class="form-control total" id="">
                                    </div>
                                    <div class="mb-3 col-lg-1">
                                        <button type="button" class="btn btn-danger" data-repeater-delete><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                        </div> --}}
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="#" class="btn btn-primary w-md waves-effect waves-light">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ URL::asset('backend_new/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
<script>
    $('.repeater').repeater({
        // defaultValues: {
        //     'textarea-input': 'foo',
        //     'text-input': 'bar',
        //     'select-input': 'B',
        //     'checkbox-input': ['A', 'B'],
        //     'radio-input': 'B'
        // },
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

    function sum() {
        // var price = $('.price').val();
        // var jml = $('.jml').val();
        var price = document.getElementsByClassName('price')[0].value;
        // alert(price);
        var jml = document.getElementsByClassName('jml')[0].value;
        var result = parseInt(price)*parseInt(jml);
        // alert(result);
        if (!isNaN(result)) {
            // document.getElementsByClassName('total')[0].result;
            $('.total').val(result);
            // document.getElementById('txt3').value = result;
        }
    }
    function tambah() {
        var no = 0;

        var item = document.getElementById('item').value;
        var price = document.getElementById('price').value;
        var jml = document.getElementById('jml').value;
        var total = document.getElementById('total').value;

        var table = document.getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);
        var cell5 = newRow.insertCell(4);

        // for (let i = 1; i <= table.rows.length; i++) {
        //     // const element = array[i];
        //     cell1.innerHTML = i;
        // }
        
        // no++;
        cell1.innerHTML = '#';
        cell2.innerHTML = item;
        cell3.innerHTML = price;
        cell4.innerHTML = jml;
        cell5.innerHTML = total;
    }

    // $('.total').change(function(){
    //     let price = $('.price').val();
    //     let jml = $('.jml').val();
        
    //     let total = price*jml;
    //     $('.total').val(total);
    // });
    // $(document).ready(function(){
    //     // alert(price);
    //     var price = $('.price').val();
    //     var jml = $('.jml').val();
        
    //     var total = price*jml;
    //     $('.total').val(total);
    // })
</script>
@endsection