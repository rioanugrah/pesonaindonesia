<script src="{{ asset('backend_2/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend_2/js/plugins.js') }}"></script>
<script src="{{ asset('backend_2/js/search.js') }}"></script>
<script src="{{ asset('backend_2/js/custom/custom-script.js') }}"></script>
@if (Request::is('b/home'))
<script src="{{ asset('backend_2/vendors/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('backend_2/vendors/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('backend_2/js/scripts/dashboard-analytics.js') }}"></script>
@endif
@yield('js')