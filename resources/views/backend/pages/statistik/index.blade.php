@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Statistik')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/selectric/public/selectric.css') }}">

    <style>
        .form-group.row .col-md-4 {
            margin-bottom: 20px;
        }

        .form-group.row.justify-content-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Statistik</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Statistik</a></div>
                    <div class="breadcrumb-item">Statistik</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h4>---------- Statistik Sekolah ----------</h4>
                            </div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="clearfix mt-2"></div>
                                    <div class="alert alert-light alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                            {{ Session::get('success') }}
                                        </div>
                                    </div>
                                @endif
                                @if (Session::has('errorr'))
                                    <div class="clearfix mt-2"></div>
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                            {{ Session::get('error') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="clearfix mb-2"></div>
                                <form action="{{ route('statistik.update', $statistik->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah
                                            Pengajar</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" class="form-control" name="jumlah_pengajar"
                                                value="{{ $jumlah_pengajar ?? old('jumlah_pengajar') }}" readonly>
                                            @error('jumlah_pengajar')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah
                                            Siswa/i Aktif</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" class="form-control" name="jumlah_siswa"
                                                value="{{ $statistik->jumlah_siswa ?? old('jumlah_siswa') }}" required>
                                            @error('jumlah_siswa')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah
                                            Lulusan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" class="form-control" name="jumlah_lulusan"
                                                value="{{ $statistik->jumlah_lulusan ?? old('jumlah_lulusan') }}" required>
                                            @error('jumlah_lulusan')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        {{-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label> --}}
                                        <div class="col-12 text-center">
                                            {{-- <hr class="mb-3"> --}}
                                            <button type="submit" class="btn btn-success"
                                                style="min-width: 100px;">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/backend/library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/backend/js/page/features-post-create.js') }}"></script>
@endpush
