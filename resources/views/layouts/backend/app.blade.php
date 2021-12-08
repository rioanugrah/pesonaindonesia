<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="route" content="{{ $route }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ Request::url() }}" data-user="{{ Auth::user()->id }}">
	<meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="Pesona Plesiran Indonesia">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <link href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/scroll.css') }}">

    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet" />
    @yield('css')
</head>
<body data-base-url="{{url('/')}}">
    <script src="{{ asset('backend/assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        @include('layouts.backend.sidebar')
        <div class="page-wrapper">
        @include('layouts.backend.header')
        <div class="page-content">
            @yield('content')
        </div>
        @include('layouts.backend.footer')
        </div>
    </div>
</body>
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
    
    @yield('js')
    <script type="text/javascript">
        var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notificationsCount     = parseInt(notificationsCountElem.data('count'));
        var notifications          = notificationsWrapper.find('div.p-1');
  
        if (notificationsCount <= 0) {
          notificationsWrapper.hide();
        }
  
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;
  
        var pusher = new Pusher('API_KEY_HERE', {
            encrypted: true
        });
  
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('notif-wisata');
  
        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\WisataEvent', function(data) {
          var existingNotifications = notifications.html();
          var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
          var newNotificationHtml = `
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                    <i class="icon-sm text-white" data-feather="gift"></i>
                </div>
                <div class="flex-grow-1 me-2">
                    <p>New Order Recieved</p>
                    <p class="tx-12 text-muted">30 min ago</p>
                </div>	
            </a>
          `;
          notifications.html(newNotificationHtml + existingNotifications);
  
          notificationsCount += 1;
          notificationsCountElem.attr('data-count', notificationsCount);
          notificationsWrapper.find('.notif-count').text(notificationsCount);
          notificationsWrapper.show();
        });
      </script>
</html>