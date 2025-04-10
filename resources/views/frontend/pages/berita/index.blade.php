@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Berita')

@push('styles')
    {{-- For styles --}}
@endpush

@section('content')
    {{-- For content --}}
    <div class="all-title-box">
        <div class="container text-center">
            <h1>Semua Berita<span class="m_1">Temukan berita terbaru dan informasi terkini dari SMAIT Al-Ghozali di
                    halaman ini.</span></h1>
            </h1>
        </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            {{-- <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Berita SMAIT Al-Ghozali</p>
                </div>
            </div><!-- end title -->

            <hr class="invis"> --}}

            <div class="row">
                @forelse ($berita as $item)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{ $item->featured_image ?? asset('assets/frontend/images/blog_1.jpg') }}"
                                    alt="" class="img-fluid"
                                    style="max-height: 150px; width: 100%; object-fit: cover;>
                            </div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a
                                        href="">{{ $item->created_at->format('d M Y') }}</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="">{{ $item->type }}</a> </span>
                                {{-- <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                            </div>
                            <div class="blog-title">
                                <h2><a href="#" title="">{{ $item->title }}</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>{{ strip_tags($item->content) }}</p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange"
                                    href="{{ route('frontend-berita.show', $item->id) }}"><span>Read More<span></a>
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
                                    <p>Belum ada data berita.</p>
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
