@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Berita')

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
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center center;
            color: #ccc;
            font-size: 18px;
            /* Adjust the margin as needed */
        }

        .supporting-images-container {
            display: flex;
            gap: 10px;
            /* Adjust the gap as needed */
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
                    <a href="{{ route('news-backend.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Berita</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Berita</a></div>
                    <div class="breadcrumb-item">Edit Berita</div>
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

                                <form action="{{ route('news-backend.update', $news->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview"
                                                style="background-image: url('{{ $news->featured_image ? asset($news->featured_image) : '' }}');">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="featured_image" id="image-upload"
                                                    class="form-control" accept="image/jpg, image/png, image/jpeg"
                                                    value="{{ $news->featured_image }}" />
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
                                                value="{{ $news->title ?? old('title') }}" required>
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
                                            <textarea class="summernote-simple form-control" name="content" required>{{ $news->content ?? old('content') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags
                                            <small>(Contoh:
                                                tag1, tag2)</small></label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="tags[]"
                                                value="{{ implode(',', $news->tags) }}" required>
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
                                                <option value="" disabled>~ Pilih Tipe Berita ~</option>
                                                <option value="event" {{ $news->type == 'event' ? 'selected' : '' }}>Event
                                                </option>
                                                <option value="kunjungan"
                                                    {{ $news->type == 'kunjungan' ? 'selected' : '' }}>Kunjungan</option>
                                                <option value="lomba" {{ $news->type == 'lomba' ? 'selected' : '' }}>Lomba
                                                </option>
                                                <option value="pembelajaran"
                                                    {{ $news->type == 'pembelajaran' ? 'selected' : '' }}>Pembelajaran
                                                </option>
                                                <option value="pelatihan"
                                                    {{ $news->type == 'pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                                                <option value="seminar" {{ $news->type == 'seminar' ? 'selected' : '' }}>
                                                    Seminar</option>
                                                <option value="workshop" {{ $news->type == 'workshop' ? 'selected' : '' }}>
                                                    Workshop</option>
                                                <option value="lainnya" {{ $news->type == 'lainnya' ? 'selected' : '' }}>
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
                                                value="{{ $news->author ?? old('author') }}" required>
                                            @error('author')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                            Tambahan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="supporting-images-container">
                                                @for ($i = 0; $i < 3; $i++)
                                                    <div id="supporting-image-preview-{{ $i }}"
                                                        class="image-preview landscape"
                                                        style="background-image: url('{{ isset($news->supporting_images[$i]) ? asset($news->supporting_images[$i]) : '' }}');">
                                                        <label for="supporting-image-upload-{{ $i }}"
                                                            id="supporting-image-label-{{ $i }}">Choose
                                                            File</label>
                                                        <input type="file" name="supporting_images[]"
                                                            id="supporting-image-upload-{{ $i }}"
                                                            class="form-control"
                                                            accept="image/jpg, image/png, image/jpeg" />
                                                        @if (isset($news->supporting_images[$i]))
                                                            <input type="hidden"
                                                                name="existing_supporting_images[{{ $i }}]"
                                                                value="{{ $news->supporting_images[$i] }}">
                                                        @endif
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div> --}}

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
    <script src="{{ asset('assets/backend/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/upload-preview/upload-preview.js') }}"></script>
    <script src="{{ asset('assets/backend/library/dropzone/dist/min/dropzone.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/backend/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/backend/js/page/components-multiple-upload.js') }}"></script>

    {{-- <script>
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
    </script> --}}

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

            @for ($i = 0; $i < 3; $i++)
                $.uploadPreview({
                    input_field: "#supporting-image-upload-{{ $i }}",
                    preview_box: "#supporting-image-preview-{{ $i }}",
                    label_field: "#supporting-image-label-{{ $i }}",
                    label_default: "Choose File",
                    label_selected: "Change File",
                    no_label: false
                });
            @endfor
        });
    </script>
@endpush
