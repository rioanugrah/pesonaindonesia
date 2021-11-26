<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket {{ $cek_tiket->wisata->nama_wisata }} {{ \Carbon\Carbon::parse($cek_tiket->created_at)->isoFormat('L') }}</title>
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Oswald');

        * {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box
        }

        body {
            background-color: #f5f5f5;
            font-family: arial
        }

        .fl-left {
            float: left
        }

        .fl-right {
            float: right
        }

        h1 {
            text-transform: uppercase;
            font-weight: 900;
            border-left: 10px solid #fec500;
            padding-left: 10px;
            margin-bottom: 30px
        }

        .row {
            overflow: hidden
        }

        .card {
            display: table-row;
            width: 32%;
            background-color: #025691;
            color: #fff;
            margin-bottom: 10px;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            border-radius: 4px;
            position: relative;
        }

        .card+.card {
            margin-left: 2%
        }

        .date {
            display: table-cell;
            width: 25%;
            position: relative;
            text-align: center;
            border-right: 2px dashed #f1643f
        }

        .date:before,
        .date:after {
            content: "";
            display: block;
            width: 30px;
            height: 30px;
            background-color: #f5f5f5;
            position: absolute;
            top: -15px;
            right: -15px;
            z-index: 1;
            border-radius: 50%
        }

        .date:after {
            top: auto;
            bottom: -15px
        }

        .date time {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .date time span {
            display: block
        }

        .date time span:first-child {
            color: #fcb619;
            font-weight: 600;
            font-size: 250%
        }

        .date time span:last-child {
            text-transform: uppercase;
            font-weight: 600;
            margin-top: -10px
        }

        .card-cont {
            display: table-cell;
            width: 75%;
            font-size: 85%;
            padding: 10px 10px 30px 50px
        }

        .card-cont h3 {
            color: #fcb619;
            font-size: 130%
        }

        .row:last-child .card:last-of-type .card-cont h3 {
            /* text-decoration: line-through */
        }

        .card-cont>div {
            display: table-row
        }

        .card-cont .even-date i,
        .card-cont .even-info i,
        .card-cont .even-date time,
        .card-cont .even-info p {
            display: table-cell
        }

        .card-cont .even-date i,
        .card-cont .even-info i {
            padding: 5% 5% 0 0
        }

        .card-cont .even-info p {
            padding: 30px 50px 0 0
        }

        .card-cont .even-date time span {
            display: block
        }

        .card-cont a {
            display: block;
            text-decoration: none;
            width: 80px;
            height: 30px;
            background-color: #D8DDE0;
            color: #fff;
            text-align: center;
            line-height: 30px;
            border-radius: 2px;
            position: absolute;
            right: 10px;
            bottom: 10px
        }

        .row:last-child .card:first-child .card-cont a {
            background-color: #037FDD
        }

        .row:last-child .card:last-child .card-cont a {
            background-color: #F8504C
        }

        @media screen and (max-width: 860px) {
            .card {
                display: block;
                float: none;
                width: 100%;
                margin-bottom: 10px;
            }

            .row {
                margin: 11px 
            }

            .card+.card {
                margin-left: 0
            }

            .card-cont .even-date,
            .card-cont .even-info {
                font-size: 75%
            }
        }

    </style>
</head>

<body>
    <section class="container">
        <h1>Tiket</h1>
        <div class="row">
            @foreach ($cek_tiket_detail as $ctd)
                {{-- <div class="col">
                </div> --}}
                <article class="card fl-left">
                    <section class="date">
                        <time datetime="{{ \Carbon\Carbon::parse($ctd->created_at) }}">
                            <span>{{ \Carbon\Carbon::parse($ctd->created_at)->format('d') }}</span><span>{{ \Carbon\Carbon::parse($ctd->created_at)->format('M') }}</span>
                        </time>
                    </section>
                    <section class="card-cont">
                        <small>{{ $ctd->tiket_wisata->user->name }}</small>
                        <h3>{{ $ctd->tiket_wisata->wisata->nama_wisata }}</h3>
                        <div class="even-date">
                            <i class="fa fa-calendar"></i>
                            <time>
                                <span>{{ \Carbon\Carbon::parse($ctd->created_at)->isoFormat('L') }}</span>
                                <span>08:55pm to 12:00 am</span>
                            </time>
                        </div>
                        <div class="even-info">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                Tiket ID : {{ $ctd->kode_tiket }}
                            </p>
                        </div>
                        {{-- <a href="#">tickets</a> --}}
                    </section>
                </article>
            @endforeach
        </div>
    </section>
</body>
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}
</html>
