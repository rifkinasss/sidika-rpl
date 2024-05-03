<!-- partial:partials/_horizontal-navbar.html -->
<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                {{-- Search Navbar --}}
                <ul class="navbar-nav navbar-nav-left">
                    <li class="nav-item nav-search d-none d-lg-block ms-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="search">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="search" aria-label="search"
                                aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="{{ url('/dashboard-admin') }}">
                        <div class="row">
                            <div class="col">
                                <img src="/images/logo_dinas.png" alt="logo dinas">
                                <span> | </span>
                                <img src="/images/SIDIKA_rpl.png" style="height: 65px; width: auto;" alt="logo sidika">
                            </div>
                        </div>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard-admin') }}"><img
                            src="{{ asset('images/logo-mini.svg') }}" alt="logo" /></a>
                </div>

                {{-- Profile Navbar --}}
                <ul class="navbar-nav navbar-nav-right">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('login') }}" data-bs-toggle="dropdown"
                                    id="profileDropdown">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('register') }}" data-bs-toggle="dropdown"
                                    id="profileDropdown">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                id="profileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                <span class="nav-profile-name">{{ Auth::user()->nama }}<span
                                        class="online-status"></span></span>
                                <img src="{{ asset('images/faces/face2.jpg') }}" alt="profile" />
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="/profile-pegawai">
                                    <i class="mdi mdi-settings text-primary"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item {{ request()->is('dashboard-admin') ? 'active' : '' }}">
                    <a href=" {{ url('/dashboard-admin') }}" class="nav-link ">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard-admin/verifikasi-perjalanan-dinas*') ? 'active' : '' }}">
                    <a href=" {{ route('verifikasi-perjalanan-dinas.index') }}" class="nav-link ">
                        <i class="mdi mdi-airplane-takeoff menu-icon"></i>
                        <span class="menu-title">Verifikasi Perencanaan</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard-admin/verifikasi-pelaporan-perjadin*') ? 'active' : '' }}">
                    <a href=" {{ route('verifikasi-pelaporan-perjadin.index') }}" class="nav-link ">
                        <i class="mdi mdi-file-multiple menu-icon"></i>
                        <span class="menu-title">Verifikasi Pelaporan</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard-admin/verifikasi-belanja-modal*') ? 'active' : '' }}">
                    <a href=" {{ route('verifikasi-belanja-modal.index') }}" class="nav-link ">
                        <i class="mdi mdi-finance menu-icon"></i>
                        <span class="menu-title">Verifikasi Belanja Modal</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard-admin/verifikasi-belanja-barang-jasa*') ? 'active' : '' }}">
                    <a href=" {{ route('verifikasi-belanja-barang-jasa.index') }}" class="nav-link ">
                        <i class="mdi mdi-cube-outline menu-icon"></i>
                        <span class="menu-title">Verifikasi Belanja BarJas</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard-admin/bantuan*') ? 'active' : '' }}">
                    <a href=" {{ url('/dashboard-admin/bantuan') }}" class="nav-link">
                        <i class="mdi mdi-help-circle-outline menu-icon"></i>
                        <span class="menu-title">Bantuan</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- partial -->
