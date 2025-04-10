@extends('frontend.layouts.app')

@section('title', $pageTitle ?? 'Contoh')

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

    <div id="teachers" class="section wb">
        <div class="container">
            <div class="row">

                @forelse ($pengajars as $item)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="our-team">
                            <div class="team-img">
                                <img src="{{ $item->foto ?? asset('assets/frontend/images/team-01.png') }}">
                                <div class="social">
                                    <ul>
                                        {{-- <li><a href="{{ $item->facebook ?? '#' }}" class="fa fa-facebook"></a></li>
                                        <li><a href="{{ $item->instagram ?? '#' }}" class="fa fa-instagram"></a></li> --}}
                                        {{-- <li><a href="{{  }}" class="fa fa-linkedin"></a></li>
                                        <li><a href="{{  }}" class="fa fa-skype"></a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="team-content">
                                <h3 class="title" style="text-transform: capitalize">{{ $item->nama ?? 'Nama Pengajar' }}
                                </h3>
                                <span class="post">{{ $item->jabatan ?? 'Jabatan Pengajar' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="inner-hmv text-center">
                            <h3>Pengajar</h3>
                            <div class="tr-pa">P</div>
                            <p>Data pengajar belum tersedia.</p>
                        </div>
                    </div>
                @endforelse

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

@endsection

@push('scripts')
    {{-- For scripts --}}
@endpush
