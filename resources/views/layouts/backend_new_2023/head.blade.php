@yield('css')
<link href="{{ URL::asset('backend_new/css/bootstrap.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('backend_new/css/icons.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('backend_new/css/app.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<meta name="_token" content="{{ csrf_token() }}">