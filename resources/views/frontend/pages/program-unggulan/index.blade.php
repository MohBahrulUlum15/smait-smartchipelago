@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Program Unggulan')

@push('styles')
    {{-- For styles --}}
@endpush

@section('content')
    {{-- For content --}}
    <div class="all-title-box">
        <div class="container text-center">
            <h1>Program Unggulan<span class="m_1">Program unggulan yang dibentuk untuk mencetak leader dengan
                    kemampuan intelejensi yang
                    tinggi, competitive skill,
                    dan karakter islam yang kuat.</span>
            </h1>
        </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            {{-- <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Program Unggulan SMAIT Al-Ghozali</p>
                </div>
            </div><!-- end title -->

            <hr class="invis"> --}}

            <div class="row">
                @forelse ($programs as $item)
                    <div class="col-lg-6 col-md-6 col-12 mb-4">
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
