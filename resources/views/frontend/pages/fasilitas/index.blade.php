@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Fasilitas')

@push('styles')
    {{-- For styles --}}
@endpush

@section('content')
    {{-- For content --}}
    <div class="all-title-box">
        <div class="container text-center">
            <h1>Fasilitas Sekolah<span class="m_1">Fasilitas yang tersedia di sekolah kami mendukung kegiatan belajar
                    mengajar dengan
                    optimal, memberikan kenyamanan dan keamanan bagi siswa serta mendukung pengembangan potensi mereka
                    secara maksimal.</span>
            </h1>
        </div>
    </div>

    <div id="overviews" class="section lb">
        <div class="container">
            <div class="row">
                @forelse ($fasilitas as $item)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="pricing-table" style="border-radius: 6px;">
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
                        </div>
                    </div><!-- end col -->
                @empty
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="course-item">
                            <div class="course-br">
                                <div class="course-title">
                                    <h2><a href="#" title="">Fasilitas</a></h2>
                                </div>
                                <div class="course-desc">
                                    <p>Belum ada data fasilitas.</p>
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
