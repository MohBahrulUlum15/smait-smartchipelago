<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('frontend-beranda.index') }}">
                <img src="{{ asset('assets/images/logo-smait.png') }}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
                aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->routeIs('frontend-beranda.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend-beranda.index') }}"
                            style="text-transform: capitalize">Beranda</a>
                    </li>
                    {{-- <li
                        class="nav-item dropdown {{ request()->routeIs('frontend-visi-misi.index') || request()->routeIs('frontend-pengajar.index') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Profil
                            Sekolah</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item {{ request()->routeIs('frontend-visi-misi.index') ? 'active' : '' }}"
                                href="{{ route('frontend-visi-misi.index') }}">Visi & Misi</a>
                            <a class="dropdown-item {{ request()->routeIs('frontend-pengajar.index') ? 'active' : '' }}"
                                href="{{ route('frontend-pengajar.index') }}">Pengajar</a>
                        </div>
                    </li> --}}
                    <li class="nav-item {{ request()->routeIs('frontend-visi-misi.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend-visi-misi.index') }}"
                            style="text-transform: capitalize">Profil Sekolah</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('frontend-program-unggulan.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend-program-unggulan.index') }}"
                            style="text-transform: capitalize">Program Unggulan</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('frontend-fasilitas.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend-fasilitas.index') }}"
                            style="text-transform: capitalize">Fasilitas</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('frontend-pengajar.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend-pengajar.index') }}"
                            style="text-transform: capitalize">Pengajar</a>
                    </li>
                    <li
                        class="nav-item dropdown {{ Route::is('frontend-berita*', 'frontend-artikel*', 'frontend-kegiatan*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"
                            style="text-transform: capitalize">Berita
                            & Artikel
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{ route('frontend-berita.index') }}"
                                style="text-transform: capitalize">Berita</a>
                            {{-- <a class="dropdown-item" href="{{ route('frontend-kegiatan.index') }}">Kegiatan</a> --}}
                            <a class="dropdown-item" href="{{ route('frontend-artikel.index') }}"
                                style="text-transform: capitalize">Artikel</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="hover-btn-new log orange" href="{{ route('login-admin') }}"><span>Login</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
