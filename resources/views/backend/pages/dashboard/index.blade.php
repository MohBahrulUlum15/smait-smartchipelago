@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard - SMAIT Al-Ghozali</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengajar</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumlahPengajar }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-solid fa-medal"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Program Unggulan</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumlahProgram }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="far fa-solid fa-universal-access"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Fasilitas</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumlahFasilitas }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Berita</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumlahBerita }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-file-lines"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Artikel</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumlahArtikel }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('assets/backend/js/page/index-0.js') }}"></script> --}}
@endpush
