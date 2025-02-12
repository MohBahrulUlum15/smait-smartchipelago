@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Prestasi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/dropzone/dist/dropzone.css') }}">

    <style>
        .image-preview {
            flex: 1;
            position: relative;
            overflow: hidden;
            width: 100%;
            border: 2px dashed #ddd;
            display: flex;
            /* align-items: center; */
            justify-content: center;
            background-size: cover;
            background-position: center center;
            color: #ccc;
            font-size: 18px;
            /* Adjust the margin as needed */
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">

                <div class="section-header-back">
                    <a href="{{ route('prestasi.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Prestasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Prestasi</a></div>
                    <div class="breadcrumb-item">Edit Prestasi</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('prestasi.update', $data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview"
                                                style="background-image: url('{{ $data->gambar_prestasi ? asset($data->gambar_prestasi) : '' }}');">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="gambar_prestasi" id="image-upload"
                                                    class="form-control" accept="image/jpg, image/png, image/jpeg"
                                                    value="{{ $data->gambar_prestasi }}" />
                                                @error('gambar_prestasi')
                                                    <strong class="fw-bold d-block text-danger mt-2">
                                                        <small>&nbsp;* {{ $message }}</small>
                                                    </strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                            Prestasi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="judul_prestasi"
                                                value="{{ $data->judul_prestasi ?? old('judul_prestasi') }}" required>
                                            @error('judul_prestasi')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            @error('deskripsi_prestasi')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                            <textarea class="summernote-simple form-control" name="deskripsi_prestasi" required>{{ $data->deskripsi_prestasi ?? old('deskripsi_prestasi') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7 text-right">
                                            <hr class="mb-3">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-input
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false // Default: false
            });
        });
    </script>
@endpush
