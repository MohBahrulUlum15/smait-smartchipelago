@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Artikel')

@push('styles')
    {{-- For styles --}}
    <style>
        .blog-desc p {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* Batasi hingga 4 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
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
                    <p class="lead">Artikel SMAIT Al-Ghozali</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                @forelse ($artikel as $item)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{ $item->gambar_artikel ?? asset('assets/frontend/images/blog_1.jpg') }}"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a href="#">{{ $item->created_at }}</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="#">{{ $item->type }}</a> </span>
                                {{-- <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                            </div>
                            <div class="blog-title">
                                <h2><a href="#" title="">{{ $item->judul_artikel }}</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>{{ strip_tags($item->isi_artikel) }}</p>
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
                                    <h2><a href="#" title="">Artikel</a></h2>
                                </div>
                                <div class="course-desc">
                                    <p>Belum ada data artikel.</p>
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
