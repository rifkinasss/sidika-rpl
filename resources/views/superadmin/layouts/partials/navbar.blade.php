<!-- partial:partials/_horizontal-navbar.html -->
<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
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
                <div
                    class="navbar-nav text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="{{ url('/dashboard-superadmin') }}">
                        <div class="row">
                            <div class="col">
                                <img src="/images/logo_dinas.png" alt="logo dinas">
                                <span> | </span>
                                <img src="/images/SIDIKA_rpl.png" style="height: 65px; width: auto;" alt="logo sidika">
                            </div>
                        </div>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard-superadmin') }}"><img
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
                                <a class="dropdown-item" href="{{ url('/dashboard-superadmin/profile-superadmin') }}">
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
                <li class="nav-item {{ request()->is('dashboard-superadmin') ? 'active' : '' }}">
                    <a href=" {{ url('/dashboard-superadmin') }}" class="nav-link ">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard-superadmin/user*') ? 'active' : '' }}">
                    <a href="/dashboard-superadmin/user" class="nav-link ">
                        <span class="mdi mdi-account menu-icon"></span>
                        <span class="menu-title">User</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard-superadmin/bantuan*') ? 'active' : '' }}">
                    <a href=" {{ route('dashboard-superadmin-bantuan') }}" class="nav-link">
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
