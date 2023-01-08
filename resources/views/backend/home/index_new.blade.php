@extends('layouts.backend_2.app')

@section('title')
    Beranda
@endsection

<?php $asset = asset('backend/assets2/'); ?>

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
                        <img src="{{ $asset }}/images/services-icon/01.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Balance</h5>
                    <h4 class="fw-medium font-size-24">Rp. {{ number_format($balances['balance'],0,',','.') }} <i
                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                    {{-- <div class="mini-stat-label bg-success">
                        <p class="mb-0">+ 12%</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-3">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="{{ $asset }}/images/services-icon/04.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Paket</h5>
                    <h4 class="fw-medium font-size-24">{{ number_format($total_paket,0,',','.') }}<i
                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                    {{-- <div class="mini-stat-label bg-success">
                        <p class="mb-0">+ 12%</p>
                    </div> --}}
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
                                <th>Nama Transaksi</th>
                                <th>Pemesan</th>
                                <th>Bank</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Tanggal Transaksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                {{-- <tr>
                                    @if ($order->status == 0)
                                    <td><span class="badge bg-danger">{{ $order->id }}</span></td>
                                    @elseif ($order->status == 1)
                                    <td><span class="badge bg-primary">{{ $order->id }}</span></td>
                                    @elseif ($order->status == 2)
                                    <td><span class="badge bg-warning">{{ $order->id }}</span></td>
                                    @elseif ($order->status == 3)
                                    <td><span class="badge bg-success">{{ $order->id }}</span></td>
                                    @endif
                                    <td>{{ $order->nama_order }}</td>
                                    <td>{{ $order->pemesan }}</td>
                                </tr> --}}
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
                                    @elseif ($order->status == 4)
                                    <td><span class="badge bg-success">{{ $order->id }}</span></td>
                                    @endif
                                    {{-- <td>{{ $order->id }}</td> --}}
                                    <td>{{ $order->nama_order }}</td>
                                    <td>{{ $pemesan->first_name.' '.$pemesan->last_name }}</td>
                                    <td>{{ $bank->kode_bank.' : '.$bank->nama_penerima }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>Rp. {{ number_format($order->price,2,",",".") }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('LLLL') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            {{-- <button onclick="bukti_pembayaran(`{{ $order->id }}`)" class="btn btn-primary btn-sm" title="Bukti Pembayaran">
                                                <i class="fas fa-file-alt"></i> Bukti Pembayaran
                                            </button> --}}
                                            <a href="javascript:void()" onclick="alert('Fitur dalam pengembangan')" class="btn btn-success btn-sm" title="Invoice">
                                                <i class="fas fa-file-pdf"></i> Invoice
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- @foreach ($orders as $order)
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
                                    <td>{{ $bank->kode_bank.' : '.$bank->nama_penerima }}</td>
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
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Activity</h4>
                <ol class="activity-feed">
                    @foreach ($visitorss as $visitor)
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <span class="date">{{ $visitor['created_at'] }}</span>
                            <div class="row">
                                <span class="activity-text"><b>Url : </b>{{ $visitor['url'] }}</span>
                                <span class="activity-text"><b>Method : </b>{{ $visitor['method'] }}</span>
                                <span class="activity-text"><b>User : </b>{{ $visitor['visitor']['name'] }}</span>
                                <span class="activity-text"><b>Sistem Operasi : </b>{{ $visitor['platform'] }}</span>
                                <span class="activity-text"><b>Device : </b>{{ $visitor['device'] }}</span>
                                <span class="activity-text"><b>Useragent : </b>{{ $visitor['useragent'] }}</span>
                                <span class="activity-text"><b>Languages : </b>{{ $visitor['languages'] }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ol>
                {{-- <div class="text-center">
                    <a href="#" class="btn btn-primary">Load More</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Devices</h4>
                <ol class="activity-feed">
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <div class="row">
                                <span class="activity-text"><b>IP Address :</b> {{ $devices[0]['ip'] }}</span>
                                <span class="activity-text"><b>Devices :</b> {{ $devices[0]['device'] }}</span>
                                <span class="activity-text"><b>Useragent :</b> {{ $devices[0]['useragent'] }}</span>
                                <span class="activity-text"><b>Sistem Operasi :</b> {{ $devices[0]['platform'] }}</span>
                            </div>
                        </div>
                    </li>
                </ol>
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