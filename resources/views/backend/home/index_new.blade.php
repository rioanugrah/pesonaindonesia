@extends('layouts.backend_2.app')

@section('title')
    Beranda
@endsection

@section('content')
@include('backend.paket.order.modalBuat')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Dashboard</h6>
        </div>
        <div class="col-md-4">
            <div class="float-end d-none d-md-block">
                <div class="dropdown">
                    <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-cog me-2"></i> Settings
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="assets/images/services-icon/01.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Balance</h5>
                    <h4 class="fw-medium font-size-24">Rp. {{ number_format($balances['balance'],0,',','.') }} <i
                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                    <div class="mini-stat-label bg-success">
                        <p class="mb-0">+ 12%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-xl-4 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="assets/images/services-icon/01.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Wisata</h5>
                    <h4 class="fw-medium font-size-24">{{ $wisata }}<i
                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                    <div class="mini-stat-label bg-success">
                        <p class="mb-0">+ 12%</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-xl-4 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="assets/images/services-icon/01.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Hotel</h5>
                    <h4 class="fw-medium font-size-24">{{ $hotel }}<i
                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                    <div class="mini-stat-label bg-success">
                        <p class="mb-0">+ 12%</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Data Transaksi</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Paket</th>
                                <th>Pemesan</th>
                                <th>Bank</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @foreach (json_decode($order->pemesan) as $p)
                                    <?php $pemesan = $p; ?>
                                @endforeach
                                @foreach (json_decode($order->bank) as $b)
                                    <?php $bank = $b; ?>
                                @endforeach
                                <tr>
                                    @if ($order->status == 0)
                                    <td><span class="badge bg-danger">{{ $order->id }}</span></td>
                                    @elseif ($order->status == 1)
                                    <td><span class="badge bg-primary">{{ $order->id }}</span></td>
                                    @elseif ($order->status == 2)
                                    <td><span class="badge bg-warning">{{ $order->id }}</span></td>
                                    @elseif ($order->status == 3)
                                    <td><span class="badge bg-success">{{ $order->id }}</span></td>
                                    @endif
                                    <td>{{ $order->nama_paket }}</td>
                                    <td>{{ $pemesan->first_name.' '.$pemesan->last_name }}</td>
                                    <td>{{ $bank->nama_bank.' : '.$bank->nama_penerima }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>Rp. {{ number_format($order->price,2,",",".") }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button onclick="bukti_pembayaran(`{{ $order->id }}`)" class="btn btn-primary btn-sm" title="Bukti Pembayaran">
                                                <i class="fas fa-file-alt"></i> Bukti Pembayaran
                                            </button>
                                            <a href="javascript:void()" onclick="alert('Fitur dalam pengembangan')" class="btn btn-success btn-sm" title="Invoice">
                                                <i class="fas fa-file-pdf"></i> Invoice
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        function bukti_pembayaran(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/paket_order') }}"+'/'+id+'/bukti_pembayaran',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    // alert(result.data);
                    $('#bukti_id').val(id);
                    $('#uploaded_image').html(result.data.images);
                    $('#tf').modal('show');
                }
            })
        }
    </script>
@endsection