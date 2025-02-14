@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Contoh')

@push('styles')
    {{-- For styles --}}
@endpush

@section('content')
    {{-- For content --}}
    <div class="all-title-box">
        <div class="container text-center">
            <h1>SMA Islam Terpadu Al-Ghozali<span class="m_1">{{ $motto->deskripsi }}</span></h1>
        </div>
    </div>

    <div id="overviews" class="section lb">
        <div class="container">
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

    <div class="hmv-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="flaticon-achievement"></i></div>
                        <h3>Misi</h3>
                        <div class="tr-pa">M</div>
                        @if ($misi->isEmpty())
                            <p>Data misi belum tersedia.</p>
                        @else
                            <ol>
                                @foreach ($misi as $item)
                                    <li>{{ $item->deskripsi }}</li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
                        <h3>Visi</h3>
                        <div class="tr-pa">V</div>
                        <p>{{ $visi->deskripsi }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="flaticon-history"></i></div>
                        <h3>Tujuan</h3>
                        <div class="tr-pa">H</div>
                        @if ($tujuan->isEmpty())
                            <p>Data tujuan belum tersedia.</p>
                        @else
                            <ol>
                                @foreach ($misi as $item)
                                    <li>{{ $item->deskripsi }}</li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- For scripts --}}
@endpush
