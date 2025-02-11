@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Berita')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/selectric/public/selectric.css') }}">

    <style>
        .image-preview {
            flex: 1;
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 200px;
            border: 2px dashed #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center center;
            color: #ccc;
            font-size: 18px;
        }

        .image-preview input {
            display: none;
        }

        .image-label {
            cursor: pointer;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sambutan Kepala Sekolah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Sambutan</a></div>
                    <div class="breadcrumb-item">Sambutan Kepala Sekolah</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
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
                                <form action="{{ route('sambutan.update', $sambutan->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview"
                                                style="background-image: url('{{ $sambutan->foto_kepala_sekolah ? asset($sambutan->foto_kepala_sekolah) : '' }}');">
                                                <label for="image-upload" class="image-label" id="image-label">Choose
                                                    File</label>
                                                <input type="file" name="foto_kepala_sekolah" id="image-upload"
                                                    class="image-input form-control"
                                                    accept="image/jpg, image/png, image/jpeg"
                                                    value="{{ $sambutan->foto_kepala_sekolah }}" />
                                                @error('foto_kepala_sekolah')
                                                    <strong class="fw-bold d-block text-danger mt-2">
                                                        <small>&nbsp;* {{ $message }}</small>
                                                    </strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                            Kepala</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="nama_kepala_sekolah"
                                                value="{{ $sambutan->nama_kepala_sekolah ?? old('nama_kepala_sekolah') }}"
                                                required>
                                            @error('nama_kepala_sekolah')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi
                                            Sambutan</label>
                                        <div class="col-sm-12 col-md-7">
                                            @error('sambutan_kepala_sekolah')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                            <textarea class="summernote-simple form-control" name="sambutan_kepala_sekolah" required>
                                                {{ $sambutan->sambutan_kepala_sekolah ?? old('sambutan_kepala_sekolah') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            {{-- <button type="reset" class="btn btn-secodary">Batal</button> --}}
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
