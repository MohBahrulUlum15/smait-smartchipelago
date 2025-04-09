@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Pengajar')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/dropzone/dist/dropzone.css') }}">

    <style>
        /* .supporting-images-container {
                    display: flex;
                    gap: 10px;
                } */

        .image-preview {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        /* .image-preview.landscape {
                    width: 150px;
                    height: 100px;
                } */
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">

                <div class="section-header-back">
                    <a href="{{ route('pengajar.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Buat Pengajar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pengajar</a></div>
                    <div class="breadcrumb-item">Buat Pengajar</div>
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

                                <form action="{{ route('pengajar.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="nama"
                                                value="{{ old('nama') }}" required>
                                            @error('nama')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="jabatan"
                                                value="{{ old('jabatan') }}" required>
                                            @error('jabatan')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor
                                            Handphone</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="nomor_hp"
                                                oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                value="{{ old('nomor_hp') }}" required>
                                            @error('nomor_hp')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="foto" id="image-upload" class="form-control"
                                                    accept="image/jpg, image/png, image/jpeg" required />
                                                @error('foto')
                                                    <strong class="fw-bold d-block text-danger mt-2">
                                                        <small>&nbsp;* {{ $message }}</small>
                                                    </strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            Facebook</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="link" class="form-control" name="facebook"
                                                value="{{ old('facebook') }}">
                                            @error('facebook')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            Instagram</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="link" class="form-control" name="instagram"
                                                value="{{ old('instagram') }}">
                                            @error('instagram')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quote</label>
                                        <div class="col-sm-12 col-md-7">
                                            @error('quote')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                            <textarea class="summernote-simple form-control" name="quote">{{ old('quote') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7 text-right">
                                            <hr class="mb-3">
                                            <button type="submit" class="btn btn-primary"
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
    <script src="{{ asset('assets/backend/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/upload-preview/upload-preview.js') }}"></script>
    <script src="{{ asset('assets/backend/library/dropzone/dist/min/dropzone.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/backend/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/backend/js/page/components-multiple-upload.js') }}"></script>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     function readURL(input, previewId, labelId) {
        //         if (input.files && input.files[0]) {
        //             var reader = new FileReader();
        //             reader.onload = function(e) {
        //                 document.getElementById(previewId).style.backgroundImage = 'url(' + e.target.result +
        //                     ')';
        //                 document.getElementById(previewId).classList.add('image-preview-loaded');
        //                 document.getElementById(labelId).innerText = 'Change File';
        //             }
        //             reader.readAsDataURL(input.files[0]);
        //         }
        //     }

        //     document.getElementById('supporting-image-upload-1').addEventListener('change', function() {
        //         readURL(this, 'supporting-image-preview-1', 'supporting-image-label-1');
        //     });

        //     document.getElementById('supporting-image-upload-2').addEventListener('change', function() {
        //         readURL(this, 'supporting-image-preview-2', 'supporting-image-label-2');
        //     });

        //     document.getElementById('supporting-image-upload-3').addEventListener('change', function() {
        //         readURL(this, 'supporting-image-preview-3', 'supporting-image-label-3');
        //     });
        // });
    </script>
@endpush
