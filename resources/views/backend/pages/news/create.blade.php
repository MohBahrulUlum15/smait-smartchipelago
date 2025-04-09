@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Berita')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/library/dropzone/dist/dropzone.css') }}">

    <style>
        .supporting-images-container {
            display: flex;
            gap: 10px;
            /* Adjust the gap as needed */
        }

        .image-preview {
            flex: 1;
            position: relative;
            overflow: hidden;
            /* Adjust the margin as needed */
        }

        .image-preview.landscape {
            width: 150px;
            /* Adjust the width as needed */
            height: 100px;
            /* Adjust the height as needed to maintain 6:4 ratio */
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">

                <div class="section-header-back">
                    <a href="{{ route('berita.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Buat Berita</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Berita</a></div>
                    <div class="breadcrumb-item">Buat Berita</div>
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

                                <form action="{{ route('berita.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="featured_image" id="image-upload"
                                                    class="form-control" accept="image/jpg, image/png, image/jpeg"
                                                    required />
                                                @error('featured_image')
                                                    <strong class="fw-bold d-block text-danger mt-2">
                                                        <small>&nbsp;* {{ $message }}</small>
                                                    </strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul
                                            Berita</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="title"
                                                value="{{ old('title') }}" required>
                                            @error('title')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi
                                            Konten</label>
                                        <div class="col-sm-12 col-md-7">
                                            @error('content')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                            <textarea class="summernote-simple form-control" name="content" required>{{ old('content') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="tags[]"
                                                value="{{ old('tags') }}" required>
                                            @error('tags')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe
                                            Berita</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="type" required>
                                                <option value="">~ Pilih Tipe Berita ~</option>
                                                <option value="event" {{ old('type') == 'event' ? 'selected' : '' }}>Event
                                                </option>
                                                <option value="kunjungan"
                                                    {{ old('type') == 'kunjungan' ? 'selected' : '' }}>Kunjungan</option>
                                                <option value="lomba" {{ old('type') == 'lomba' ? 'selected' : '' }}>Lomba
                                                </option>
                                                <option value="pembelajaran"
                                                    {{ old('type') == 'pembelajaran' ? 'selected' : '' }}>Pembelajaran
                                                </option>
                                                <option value="pelatihan"
                                                    {{ old('type') == 'pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                                                <option value="seminar" {{ old('type') == 'seminar' ? 'selected' : '' }}>
                                                    Seminar</option>
                                                <option value="workshop" {{ old('type') == 'workshop' ? 'selected' : '' }}>
                                                    Workshop</option>
                                                <option value="lainnya" {{ old('type') == 'lainnya' ? 'selected' : '' }}>
                                                    Lainnya</option>
                                            </select>
                                            @error('type')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="author"
                                                value="{{ old('author') }}" required>
                                            @error('author')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- FITUR GAMBAR TAMBAHAN --}}
                                    {{-- <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                            Tambahan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="supporting-images-container">
                                                <div id="supporting-image-preview-1" class="image-preview landscape">
                                                    <label for="supporting-image-upload-1"
                                                        id="supporting-image-label-1">Choose File</label>
                                                    <input type="file" name="supporting_images[]"
                                                        id="supporting-image-upload-1" class="form-control"
                                                        accept="image/jpg, image/png, image/jpeg" />
                                                </div>
                                                <div id="supporting-image-preview-2" class="image-preview landscape">
                                                    <label for="supporting-image-upload-2"
                                                        id="supporting-image-label-2">Choose File</label>
                                                    <input type="file" name="supporting_images[]"
                                                        id="supporting-image-upload-2" class="form-control"
                                                        accept="image/jpg, image/png, image/jpeg" />
                                                </div>
                                                <div id="supporting-image-preview-3" class="image-preview landscape">
                                                    <label for="supporting-image-upload-3"
                                                        id="supporting-image-label-3">Choose File</label>
                                                    <input type="file" name="supporting_images[]"
                                                        id="supporting-image-upload-3" class="form-control"
                                                        accept="image/jpg, image/png, image/jpeg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                            Tambahan Multiple Dropzone</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dropzone" id="mydropzone">
                                                <div class="fallback">
                                                    <input name="tes_supporting_images[]" type="file" multiple
                                                        accept="image/png, image/jpg, image/jpeg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

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
        document.addEventListener('DOMContentLoaded', function() {
            function readURL(input, previewId, labelId) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(previewId).style.backgroundImage = 'url(' + e.target.result +
                            ')';
                        document.getElementById(previewId).classList.add('image-preview-loaded');
                        document.getElementById(labelId).innerText = 'Change File';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            document.getElementById('supporting-image-upload-1').addEventListener('change', function() {
                readURL(this, 'supporting-image-preview-1', 'supporting-image-label-1');
            });

            document.getElementById('supporting-image-upload-2').addEventListener('change', function() {
                readURL(this, 'supporting-image-preview-2', 'supporting-image-label-2');
            });

            document.getElementById('supporting-image-upload-3').addEventListener('change', function() {
                readURL(this, 'supporting-image-preview-3', 'supporting-image-label-3');
            });
        });
    </script>
@endpush
