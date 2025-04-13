@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Beranda')

@push('styles')
    {{-- For styles --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}

    {{-- Swipper --}}
    <!-- Tambahkan Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <!-- Tambahkan CSS untuk tata letak pagination & navigasi -->
    <style>
        .swiper-container-wrapper {
            position: relative !important;
            bottom: 0 !important;
            padding-bottom: 10px;
            /* Beri ruang untuk pagination */
        }

        .swiper-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            z-index: 10;
        }

        .swiper-button-prev,
        .swiper-button-next {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .swiper-footer {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            width: 100%;
        }

        .swiper-pagination {
            position: relative !important;
            bottom: 0 !important;
            display: flex;
            justify-content: center;
            align-items: center;
            width: auto;
            /* margin-top: 20px; */
        }

        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background-color: #ccc;
            opacity: 1;
            transition: all 0.3s ease;
            display: inline-block;
            margin: 0 5px;
        }

        .swiper-pagination-bullet-active {
            background-color: #007bff;
            /* Warna aktif */
        }

        .swiper-pagination-bullet-dynamic {
            transform: scale(0.8);
            /* Ukuran bullet non-aktif */
        }
    </style>

    {{-- Styling Carousel --}}
    {{-- <style>
        @media (max-width: 768px) {

            .carousel-control-prev,
            .carousel-control-next {
                top: 50%;
                transform: translateY(-50%);
                width: 30px;
            }

            .carousel-control-prev {
                left: 10px;
            }

            .carousel-control-next {
                right: 10px;
            }
        }

        @media (max-width: 576px) {

            .carousel-control-prev,
            .carousel-control-next {
                top: 50%;
                transform: translateY(-50%);
                width: 25px;
            }
        }
    </style> --}}
    <style>
        /* Untuk layar dengan lebar tablet dan lebih kecil */
        @media (max-width: 768px) {
            .box-slider .carousel-control-prev {
                border-radius: 2px;
                /* background: #EEA412; */
                background: rgba(238, 164, 18, 0.1);
                /* Warna oranye dengan transparansi 80% */
                /* background: transparent; */
                position: absolute;
                left: 0px;
                font-size: 20px;
                top: 40%;
                width: 32px;
                height: 32px;
                line-height: 20px;
                opacity: 1;
            }

            .box-slider .carousel-control-next {
                border-radius: 2px;
                /* background: #EEA412; */
                background: rgba(238, 164, 18, 0.1);
                /* Warna oranye dengan transparansi 80% */
                /* background: transparent; */
                position: absolute;
                right: 0px;
                font-size: 20px;
                top: 40%;
                width: 32px;
                height: 32px;
                line-height: 20px;
                opacity: 1;
            }
        }

        @media (max-width: 576px) {

            .carousel-control-prev,
            .carousel-control-next {
                display: none;
                /* Sembunyikan kontrol carousel */
            }
        }
    </style>
@endpush

@section('content')
    {{-- For content --}}

    {{-- Carousel --}}
    <div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover"
        data-interval="2000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleControls" data-slide-to="1"></li>
            <li data-target="#carouselExampleControls" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                {{-- <div id="home" class="first-section" style="background-image:url('images/slider-01.jpg');"> --}}
                <div id="home" class="first-section"
                    style="background-image:url('{{ $beranda->slider_img_1 ?? asset('assets/frontend/images/slider-01.jpg') }}');">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-right">
                                    <div class="big-tagline">
                                        <h2><strong>SMAIT </strong>Al-Ghozali</h2>
                                        <p class="lead">{{ $beranda->deskripsi_slider_1 ?? $visi->deskripsi }}</p>
                                        {{-- <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                        <a href="{{ $beranda->link_slider_1 ?? '#' }}" target="blank"
                                            class="hover-btn-new"><span>Selengkapnya</span></a>
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end container -->
                    </div>
                </div><!-- end section -->
            </div>
            <div class="carousel-item">
                <div id="home" class="first-section"
                    style="background-image:url('{{ $beranda->slider_img_2 ?? asset('assets/frontend/images/slider-02.jpg') }}');">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-left">
                                    <div class="big-tagline">
                                        <h2 data-animation="animated zoomInRight">SMAIT <strong>Al-Ghozali</strong>
                                        </h2>
                                        <p class="lead" data-animation="animated fadeInLeft">
                                            {{ $beranda->deskripsi_slider_2 ?? $motto->deskripsi }}</p>
                                        {{-- <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                        <a href="{{ $beranda->link_slider_2 ?? '#' }}" target="blank"
                                            class="hover-btn-new"><span>Selengkapnya</span></a>
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end container -->
                    </div>
                </div><!-- end section -->
            </div>
            <div class="carousel-item">
                <div id="home" class="first-section"
                    style="background-image:url('{{ $beranda->slider_img_3 ?? asset('assets/frontend/images/slider-03.jpg') }}');">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="big-tagline">
                                        <h2 data-animation="animated zoomInRight"><strong>SMAIT</strong> Al-Ghozali</h2>
                                        <p class="lead" data-animation="animated fadeInLeft">
                                            {{ $beranda->deskripsi_slider_3 ?? 'Welcome to Islamic Leader School, SMA IT Al-Ghozali Jember' }}
                                        </p>
                                        {{-- <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                        <a href="{{ $beranda->link_slider_3 ?? '#' }}" target="blank"
                                            class="hover-btn-new"><span>Selengkapnya</span></a>
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end container -->
                    </div>
                </div><!-- end section -->
            </div>
            <!-- Left Control -->
            <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    {{-- SAMBUTAN --}}
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>SMAIT Al-Ghozali Jember</h3>
                    <hr>
                    <p class="lead">{{ $motto->deskripsi ?? 'Teks Motto' }}</p>
                </div>
            </div><!-- end title -->
            <div class="row d-flex align-items-stretch">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-center">
                        <div class="post-media wow fadeIn mt-4">
                            <div class="img-container d-flex align-items-center overflow-hidden">
                                <img src="{{ asset($sambutan->foto_kepala_sekolah) }}" alt=""
                                    class="img-fluid img-rounded object-fit-cover">
                            </div>
                        </div><!-- end media -->
                    </div>
                </div><!-- end col -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4 class="mb-2">Sambutan Kepala Sekolah</h4>
                        <h2>{{ $sambutan->nama_kepala_sekolah }}</h2>
                        <p>{!! $sambutan->sambutan_kepala_sekolah !!}</p>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    {{-- PROGRAM UNGGULAN --}}
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Program Unggulan</h3>
                    <hr>
                    <p class="lead">Program unggulan yang dibentuk untuk mencetak leader dengan kemampuan intelejensi yang
                        tinggi, competitive skill,
                        dan karakter islam yang kuat.</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <!-- Wrapper untuk slider dan navigasi -->
            <div class="swiper-container-wrapper">
                <!-- Swiper Carousel -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @forelse ($program as $item)
                            <div class="swiper-slide">
                                <div class="course-item" style="border-radius: 6px;">
                                    <div class="course-br" style="border-radius: 6px;">
                                        <div class="image-blog">
                                            <img src="{{ $item->foto ?? asset('assets/frontend/images/blog_1.jpg') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="course-title text-center">
                                            <h2><a href="{{ route('frontend-program-unggulan.show', $item->id) }}"
                                                    title="">{{ $item->nama_program ?? '' }}</a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end swiper-slide -->
                        @empty
                            <div class="swiper-slide">
                                <div class="course-item">
                                    <div class="course-br">
                                        <div class="course-title">
                                            <h2><a href="#" title="">Program</a></h2>
                                        </div>
                                        <div class="course-desc">
                                            <p>Belum ada data program.</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end swiper-slide -->
                        @endforelse
                    </div>
                </div>


                <!-- Pagination di luar slider -->
                <div class="swiper-footer">
                    <div class="swiper-pagination program-pagination"></div>
                </div>

            </div>

            <div class="row d-flex justify-content-center my-3">
                <div class="blog-button">
                    <a class="hover-btn-new orange" href="{{ route('frontend-program-unggulan.index') }}"><span>Lihat
                            Semua Program<span></a>
                </div>
            </div>

        </div><!-- end container -->
    </div>

    {{-- FASILITAS --}}
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Fasilitas Sekolah</h3>
                    <hr>
                    <p class="lead">Fasilitas yang tersedia di sekolah kami mendukung kegiatan belajar mengajar dengan
                        optimal, memberikan kenyamanan dan keamanan bagi siswa serta mendukung pengembangan potensi mereka
                        secara maksimal.</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <!-- Wrapper untuk slider dan navigasi -->
            <div class="swiper-container-wrapper">
                <div class="swiper fasilitasSwiper">
                    <div class="swiper-wrapper">
                        @forelse ($fasilitas as $item)
                            <div class="swiper-slide">
                                <div class="blog-item" style="background-color: #f9f9f9; border-radius: 6px;">
                                    <div class="image-blog">
                                        <img src="{{ $item->foto ?? asset('assets/frontend/images/blog_1.jpg') }}"
                                            alt="" class="img-fluid">
                                    </div>
                                    <div class="blog-title text-center">
                                        <h2><a href="{{ route('frontend-fasilitas.show', $item->id) }}"
                                                title="">{{ $item->nama_fasilitas }}</a></h2>
                                    </div>
                                </div>
                            </div><!-- end swiper-slide -->
                        @empty
                            <div class="swiper-slide">
                                <div class="course-item">
                                    <div class="course-br">
                                        <div class="course-title">
                                            <h2><a href="#" title="">Berita</a></h2>
                                        </div>
                                        <div class="course-desc">
                                            <p>Belum ada data fasilitas.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- Pagination Swiper -->
                <div class="swiper-footer">
                    <div class="swiper-pagination fasilitas-pagination"></div>
                </div>

            </div>

            <div class="row d-flex justify-content-center my-3">
                <div class="blog-button">
                    <a class="hover-btn-new orange" href="{{ route('frontend-fasilitas.index') }}"><span>Lihat Semua
                            Fasilitas<span></a>
                </div>
            </div>

        </div><!-- end container -->
    </div><!-- end section -->

    {{-- STATISKIK --}}
    <div class="section cl">
        <div class="container">
            <div class="row text-left stat-wrap">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <span data-scroll class="global-radius icon_wrap effect-1 alignleft">
                        <i class="fa fa-user"></i> <!-- Ikon dari Font Awesome -->
                    </span>
                    <p class="stat_count">{{ $jumlah_pengajar ?? '0' }}</p>
                    <h3>Pengajar</h3>
                </div><!-- end col -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <span data-scroll class="global-radius icon_wrap effect-1 alignleft">
                        <i class="fa fa-users"></i> <!-- Ikon dari Font Awesome -->
                    </span>
                    <p class="stat_count">{{ $statistik->jumlah_siswa ?? '0' }}</p>
                    <h3>Siswa & Siswi</h3>
                </div><!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <span data-scroll class="global-radius icon_wrap effect-1 alignleft">
                        <i class="fa fa-graduation-cap"></i> <!-- Ikon dari Font Awesome -->
                    </span>
                    <p class="stat_count">{{ $statistik->jumlah_lulusan ?? '0' }}</p>
                    <h3>Lulusan</h3>
                </div><!-- end col -->


            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    {{-- BERITA TERBARU --}}
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Berita Terbaru</h3>
                    <hr>
                    {{-- <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem
                        quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p> --}}
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                @forelse ($beritaTerbaru as $item)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{ $item->featured_image ?? asset('assets/frontend/images/blog_1.jpg') }}"
                                    alt="" class="img-fluid"
                                    style="max-height: 150px; width: 100%; object-fit: cover;>
                            </div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a
                                        href="#">{{ $item->created_at->format('d M Y') }}</a>
                                </span>
                                <span><i class="fa fa-tag"></i> <a href="#">{{ $item->type }}</a>
                                </span>
                                {{-- <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                            </div>
                            <div class="blog-title">
                                <h2><a href="{{ route('frontend-berita.show', $item->id) }}"
                                        title="">{{ $item->title }}</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>{{ strip_tags($item->content) }}</p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange"
                                    href="{{ route('frontend-berita.show', $item->id) }}"><span>Baca Berita<span></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                @empty
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="course-item">
                            <div class="course-br">
                                <div class="course-title">
                                    <h2><a href="#" title="">Berita</a></h2>
                                </div>
                                <div class="course-desc">
                                    <p>Belum ada data beritaTerbaru.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                @endforelse
            </div>

            <div class="row d-flex justify-content-center my-3">
                <div class="blog-button">
                    <a class="hover-btn-new orange" href="{{ route('frontend-berita.index') }}"><span>Lihat Semua
                            Berita<span></a>
                </div>
            </div>
        </div>
    </div><!-- end section -->

@endsection

@push('scripts')
    {{-- For scripts --}}

    {{-- Swipper --}}
    <!-- Tambahkan Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var fasilitasSwiper = new Swiper(".fasilitasSwiper", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 1,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".fasilitas-pagination",
                    clickable: true,
                    // dynamicBullets: true,
                    // dynamicMainBullets: 1,
                },
                navigation: {
                    nextEl: ".fasilitasSwiper + .swiper-footer .swiper-button-next",
                    prevEl: ".fasilitasSwiper + .swiper-footer .swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                }
            });

            var programSwiper = new Swiper(".mySwiper", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 1,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".program-pagination",
                    clickable: true,
                    // dynamicBullets: true,
                    // dynamicMainBullets: 1,
                },
                navigation: {
                    nextEl: ".mySwiper + .swiper-footer .swiper-button-next",
                    prevEl: ".mySwiper + .swiper-footer .swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                },
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const paragraphs = document.querySelectorAll('.blog-desc p');
            paragraphs.forEach(paragraph => {
                const maxLines = 3;
                const lineHeight = parseFloat(getComputedStyle(paragraph).lineHeight);
                const maxHeight = maxLines * lineHeight;

                if (paragraph.scrollHeight > maxHeight) {
                    paragraph.style.height = `${maxHeight}px`;
                    paragraph.style.overflow = 'hidden';
                    paragraph.style.textOverflow = 'ellipsis';
                }
            });
        });
    </script>
@endpush
