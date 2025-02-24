@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Beranda')

@push('styles')
    {{-- For styles --}}
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
                                        <p class="lead">With Landigoo responsive landing page template, you can promote
                                            your all hosting, domain and email services. </p>
                                        {{-- <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                        <a href="#" class="hover-btn-new"><span>Read More</span></a>
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
                                        <p class="lead" data-animation="animated fadeInLeft">With Landigoo responsive
                                            landing page template, you can promote your all hosting, domain and email
                                            services. </p>
                                        {{-- <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                        <a href="#" class="hover-btn-new"><span>Read More</span></a>
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
                                        <p class="lead" data-animation="animated fadeInLeft">1 IP included with each
                                            server
                                            Your Choice of any OS (CentOS, Windows, Debian, Fedora)
                                            FREE Reboots</p>
                                        {{-- <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                        <a href="#" class="hover-btn-new"><span>Read More</span></a>
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

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>SMAIT Al-Ghozali Jember</h3>
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem
                        quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
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

    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Berita Terbaru</h3>
                    {{-- <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem
                        quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p> --}}
                </div>
            </div><!-- end title -->
        </div>
    </div><!-- end section -->
@endsection

@push('scripts')
    {{-- For scripts --}}
@endpush
