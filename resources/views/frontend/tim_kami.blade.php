@extends('layouts.frontend2.app')

@section('title')
    Tim Kami
@endsection

@section('content')
    <section class="about-us-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title page-title">
                        <h3 style="font-size: 3em">Tim Pesona Plesiran Indonesia</h3>
                    <p>Sebagai salah satu startup di Malang, Pesona Plesiran Indonesia bekerja bersama tim Informasi Teknologi yang bekerja dengan profesional dan memiliki integritas yang tinggi. Sehingga, mampu untuk menciptakan sebuah layanan Digital Marketing untuk kebutuhan bisnis anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-team">
        <div class="container">
        <div class="row">
         <div class="col-12">
          <!-- end col-12 -->
            <div class="col-12">
                <ul class="team-list">
                    @foreach ($teams as $team)
                    <li><div class="team-member">
                        <figure><img src="{{ asset('frontend/assets2/images/team/'.$team['image']) }}" alt="Image">
                        <figcaption>
                            <h6>{{ $team['name'] }}</h6>
                            <span>{{ $team['posisi'] }}</span>
                        </figcaption>
                        </figure>
                    </div>
                    @endforeach
                    </li>
                </ul>
                <!-- end team-list -->
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    
@endsection
