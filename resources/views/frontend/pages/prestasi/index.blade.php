@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Prestasi')

@push('styles')
    {{-- For styles --}}
@endpush

@section('content')
    {{-- For content --}}
    <div class="all-title-box">
        <div class="container text-center">
            <h1>SMA Islam Terpadu Al-Ghozali<span class="m_1">{{ $motto->deskripsi ?? 'Disini Tulisan Motto' }}</span>
            </h1>
        </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Prestasi Siswa & Siswi SMAIT Al-Ghozali</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                @forelse ($prestasi as $item)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{ $item->gambar_prestasi ?? asset('assets/frontend/images/blog_1.jpg') }}"
                                    alt="" class="img-fluid">
                            </div>
                            {{-- <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a href="#">May 11, 2015</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="#">News</a> </span>
                                <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                            </div> --}}
                            <div class="blog-title text-center">
                                <h2><a href="#" title="">{{ $item->judul_prestasi }}</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>Lorem ipsum door sit amet, fugiat deicata avise id cum, no quo maiorum intel ogrets
                                    geuiat
                                    operts elicata libere avisse id cumlegebat, liber regione eu sit.... </p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange" href="#"><span>Read More<span></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                @empty
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="course-item">
                            <div class="course-br">
                                <div class="course-title">
                                    <h2><a href="#" title="">Program Unggulan</a></h2>
                                </div>
                                <div class="course-desc">
                                    <p>Belum ada data program unggulan.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                @endforelse
            </div>
        </div><!-- end container -->
    </div><!-- end section -->

@endsection

@push('scripts')
    {{-- For scripts --}}
@endpush
