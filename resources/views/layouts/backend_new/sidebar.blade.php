<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('wisata') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Wisata</span>
                    </a>
                </li>

                <li class="menu-title">Executive Officer</li>
                <li class="menu-title">Marketing Officer</li>
                <li class="menu-title">Operational Officer</li>
                <li>
                    <a href="{{ route('cooperation') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Kerjasama</span>
                    </a>
                </li>
                <li class="menu-title">Finance Officer</li>
                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Cash Flow</span>
                    </a>
                </li>
                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Laporan Keuangan</span>
                    </a>
                </li>
                <li class="menu-title">Information Technology</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email-outline"></i>
                        <span>Frontend</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('roles') }}">Slider</a></li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email-outline"></i>
                        <span>Akses User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('roles') }}">Roles</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('pengguna') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Users</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>