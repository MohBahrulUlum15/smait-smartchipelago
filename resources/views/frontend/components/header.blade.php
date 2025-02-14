<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
                aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->routeIs('beranda.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('beranda.index') }}">Beranda</a>
                    </li>
                    <li
                        class="nav-item dropdown {{ request()->routeIs('frontend-visi-misi.index') || request()->routeIs('frontend-pengajar.index') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Profil
                            Sekolah</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item {{ request()->routeIs('frontend-visi-misi.index') ? 'active' : '' }}"
                                href="{{ route('frontend-visi-misi.index') }}">Visi & Misi</a>
                            <a class="dropdown-item {{ request()->routeIs('frontend-pengajar.index') ? 'active' : '' }}"
                                href="{{ route('frontend-pengajar.index') }}">Pengajar</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Program Unggulan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Fasilitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Prestasi</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Berita
                            & Kegiatan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="">Berita</a>
                            <a class="dropdown-item" href="">Kegiatan</a>
                            <a class="dropdown-item" href="">Artikel</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="hover-btn-new log orange" href="#" data-toggle="modal"
                            data-target="#login"><span>Login</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
