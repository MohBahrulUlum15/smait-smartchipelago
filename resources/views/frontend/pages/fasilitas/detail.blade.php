@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Fasilitas')

@push('styles')
    {{-- For styles --}}

    <style>
        /* Container full width */
        .supporting-images-container {
            width: 100%;
            /* Full width */
            background-color: #ffffff;
            /* Latar belakang putih */
            padding: 20px;
            /* Padding di dalam container */
            border-radius: 8px;
            /* Membuat sudut container melengkung */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Memberikan efek bayangan */
        }

        /* Wrapper untuk gambar dengan rasio 16:9 */
        .supporting-image-wrapper {
            position: relative;
            width: 100%;
            padding-top: 56.25%;
            /* Rasio 16:9 (9/16 = 0.5625 * 100) */
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Gambar di dalam wrapper */
        .supporting-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Menjaga rasio gambar */
        }
    </style>
@endpush

@section('content')
    {{-- For content --}}
    <div class="all-title-box">
        <div class="container text-center">
            <h1>Detail Fasilitas<span class="m_1">SMAIT Al-Ghozali Jember</span></h1>
            </h1>
        </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
                        <div class="image-blog">
                            <img src="{{ $fasilitas->foto ?? '' }}" alt="" class="img-fluid"
                                style="max-height: 400px; width: 100%; object-fit: cover;">
                        </div>
                        @if (!empty($supportingImages))
                            <div class="supporting-images-container mt-4 mx-auto">
                                {{-- <h5 class="text-center mb-3">Gambar Pendukung:</h5> --}}
                                <div class="row">
                                    @foreach ($supportingImages as $image)
                                        <div class="col-md-4 col-sm-6 col-12 mb-3">
                                            <div class="supporting-image-wrapper">
                                                <img src="{{ asset($image) }}" alt="Supporting Image"
                                                    class="img-fluid supporting-image" data-toggle="modal"
                                                    data-target="#imageModal"
                                                    onclick="showImageInModal('{{ asset($image) }}')">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="post-content">
                            {{-- <div class="post-date">
                                <span class="day">{{ $fasilitas->created_at->format('d') ?? '' }}</span>
                                <span class="month">{{ $fasilitas->created_at->format('M') ?? '' }}</span>
                            </div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a
                                        href="#">{{ $fasilitas->created_at->format('d M Y') ?? '' }}</a></span>
                            </div> --}}
                            <div class="blog-title">
                                <h2><a href="#" title="">{{ $fasilitas->nama_fasilitas ?? '' }}</a></h2>
                            </div>
                            <div class="blog-desc">
                                {{-- <p>{{ strip_tags($fasilitas->deskripsi) ?? '' }}</p> --}}
                                <p>{!! $fasilitas->deskripsi ?? '' !!}</p>
                                {{-- <blockquote class="default">
                                    Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus
                                    id sodales in, auctor fringilla libero. Pellentesque pellentesque eget tempor tellus.
                                    Fusce lacinia tempor malesuada. Ut lacus sapien, placerat a ornare nec, elementum sit
                                    amet felis. Maecenas pretium lorem hendrerit eros sagittis fermentum.
                                </blockquote>
                                <p>Phasellus tristique commodo libero, eget dignissim turpis dignissim quis. Morbi sit amet
                                    laoreet nibh, gravida scelerisque felis. Phasellus ultrices pellentesque ligula et
                                    viverra. Integer elementum, risus et tempor ultricies, libero turpis pellentesque massa,
                                    at facilisis erat nunc hendrerit erat. Praesent rhoncus, augue nec condimentum porta,
                                    magna dui volutpat augue, vitae blandit magna quam in massa. Fusce a rhoncus diam. Proin
                                    nec lacinia nibh. Praesent sed nisi sed purus dictum laoreet.</p>
                                <p>Duis at tortor augue. Ut et justo consequat, facilisis lectus facilisis, tincidunt massa.
                                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                    egestas. Nam vel vestibulum urna. Fusce sed magna posuere, vehicula odio vitae, tempor
                                    arcu. Pellentesque eget felis sed eros maximus elementum ultrices a elit. Sed ac sodales
                                    enim.</p> --}}
                            </div>
                        </div>
                    </div>

                    {{-- <div class="blog-author">
                        <div class="author-bio">
                            <h3 class="author_name"><a href="#">Tom Jobs</a></h3>
                            <h5>CEO at <a href="#">SmartEDU</a></h5>
                            <p class="author_det">
                                Lorem ipsum dolor sit amet, consectetur adip, sed do eiusmod tempor incididunt ut aut
                                reiciendise voluptat maiores alias consequaturs aut perferendis doloribus omnis saperet
                                docendi nec, eos ea alii molestiae aliquand.
                            </p>
                        </div>
                        <div class="author-desc">
                            <img src="images/author.jpg" alt="about author">
                            <ul class="author-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}

                    {{-- KOMENTAR --}}
                    {{-- <div class="blog-comments">
                        <h4>{{ 'Komentar (' . count($komentar) . ')' }}</h4>
                        <div id="comment-blog">
                            <ul class="comment-list">
                                @forelse ($komentar as $item)
                                    <li class="comment">
                                        <div class="avatar"><img alt=""
                                                src="{{ asset('assets/backend/img/avatar/avatar-4.png') }}" class="avatar">
                                        </div>
                                        <div class="comment-container">
                                            <h5 class="comment-author"><a href="#">{{ $item->nama ?? '' }}</a></h5>
                                            <div class="comment-meta">
                                                <a href="#"
                                                    class="comment-date link-style1">{{ $item->created_at->format('d M Y') }}</a>
                                            </div>
                                            <div class="comment-body">
                                                <p>{{ $item->komentar }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="comment">
                                        <p class="text-center">Belum ada komentar.</p>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="comments-form">
                        <h4>Tinggalkan Komentar</h4>
                        <div class="comment-form-main">
                            <form action="{{ route('frontend-fasilitas.komentar', $fasilitas->id) }}" id="commentform"
                                class="comment-form" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="fasilitas_id" value="{{ $fasilitas->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" name="nama" placeholder="Nama" id="nama"
                                                type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email" placeholder="Email" id="email"
                                                type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="komentar" placeholder="Komentar" id="komentar" cols="30" rows="2"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 post-btn">
                                        <button type="submit" class="hover-btn-new orange"><span>Posting
                                                Komentar</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                </div><!-- end col -->
                <div class="col-lg-3 col-12 right-single">
                    {{-- <div class="widget-search">
                        <div class="site-search-area">
                            <form method="get" id="site-searchform" action="#">
                                <div>
                                    <input class="input-text form-control" name="search-k" id="search-k"
                                        placeholder="Search keywords..." type="text">
                                    <input id="searchsubmit" value="Search" type="submit">
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    <div class="widget-categories">
                        <h3 class="widget-title">Fasilitas Lainnya</h3>
                        <ul>
                            @forelse ($semuaFasilitas as $item)
                                <li>
                                    <a
                                        href="{{ route('frontend-fasilitas.show', $item->id) }}">{{ $item->nama_fasilitas }}</a>
                                </li>
                            @empty
                                <li><a href="#">Belum ada data fasilitas.</a></li>
                            @endforelse
                        </ul>
                    </div>
                    {{-- <div class="widget-tags">
                        <h3 class="widget-title">Tags Fasilitas</h3>
                        <ul class="tags">

                            <li><a href="#"><b>business</b></a></li>
                            <li><a href="#"><b>jquery</b></a></li>
                            <li><a href="#">corporate</a></li>
                            <li><a href="#">portfolio</a></li>
                            <li><a href="#">css3</a></li>
                            <li><a href="#"><b>theme</b></a></li>
                            <li><a href="#"><b>html5</b></a></li>
                            <li><a href="#"><b>mysql</b></a></li>
                            <li><a href="#">multipurpose</a></li>
                            <li><a href="#">responsive</a></li>
                            <li><a href="#">premium</a></li>
                            <li><a href="#">javascript</a></li>
                            <li><a href="#"><b>Best jQuery</b></a></li>
                        </ul>
                    </div> --}}
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <!-- Modal untuk menampilkan gambar -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="imageModalLabel">Gambar Pendukung</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Supporting Image" class="img-fluid" style="max-height: 80vh;">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- For scripts --}}

    <script>
        function showImageInModal(imageUrl) {
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;
        }
    </script>
@endpush
