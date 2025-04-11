@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Beranda')

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
                <h1>Beranda</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Beranda</a></div>
                    <div class="breadcrumb-item">Beranda</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h4>---------- Gambar Slider ----------</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('beranda.update', $beranda->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-3 justify-content-center">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-4 mx-2">
                                                <label class="col-form-label text-md-left">Slider 1</label>
                                                <div id="image-preview-slider-1" class="image-preview"
                                                    style="background-image: url('{{ $beranda->slider_img_1 ? asset($beranda->slider_img_1) : '' }}');">
                                                    <label for="image-upload-slider-1" class="image-label"
                                                        id="image-label-slider-1">Choose File</label>
                                                    <input type="file" name="slider_img_1" id="image-upload-slider-1"
                                                        class="image-input form-control"
                                                        accept="image/jpg, image/png, image/jpeg"
                                                        value="{{ $beranda->slider_img_1 }}" />
                                                    @error('slider_img_1')
                                                        <strong class="fw-bold d-block text-danger mt-2">
                                                            <small>&nbsp;* {{ $message }}</small>
                                                        </strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mx-2">
                                                <label class="col-form-label text-md-left">Slider 2</label>
                                                <div id="image-preview-slider-2" class="image-preview"
                                                    style="background-image: url('{{ $beranda->slider_img_2 ? asset($beranda->slider_img_2) : '' }}');">
                                                    <label for="image-upload-slider-2" class="image-label"
                                                        id="image-label-slider-2">Choose File</label>
                                                    <input type="file" name="slider_img_2" id="image-upload-slider-2"
                                                        class="image-input form-control"
                                                        accept="image/jpg, image/png, image/jpeg"
                                                        value="{{ $beranda->slider_img_2 }}" />
                                                    @error('slider_img_2')
                                                        <strong class="fw-bold d-block text-danger mt-2">
                                                            <small>&nbsp;* {{ $message }}</small>
                                                        </strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mx-2">
                                                <label class="col-form-label text-md-left">Slider 3</label>
                                                <div id="image-preview-slider-3" class="image-preview"
                                                    style="background-image: url('{{ $beranda->slider_img_3 ? asset($beranda->slider_img_3) : '' }}');">
                                                    <label for="image-upload-slider-3" class="image-label"
                                                        id="image-label-slider-3">Choose File</label>
                                                    <input type="file" name="slider_img_3" id="image-upload-slider-3"
                                                        class="image-input form-control"
                                                        accept="image/jpg, image/png, image/jpeg"
                                                        value="{{ $beranda->slider_img_3 }}" />
                                                    @error('slider_img_3')
                                                        <strong class="fw-bold d-block text-danger mt-2">
                                                            <small>&nbsp;* {{ $message }}</small>
                                                        </strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi
                                            Slider
                                            1</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="deskripsi_slider_1"
                                                value="{{ $beranda->deskripsi_slider_1 ?? old('deskripsi_slider_1') }}"
                                                required>
                                            @error('deskripsi_slider_1')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            Slider
                                            1 (Optional)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="link_slider_1"
                                                value="{{ old('link_slider_1') }}"
                                                placeholder="Contoh: https://www.google.com">
                                            @error('link_slider_1')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            slider 1</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="link" class="form-control" name="link_slider_1"
                                                value="{{ $beranda->link_slider_1 ?? old('link_slider_1') }}"
                                                placeholder="Contoh: https://www.google.com">
                                            @error('link_slider_1')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi
                                            Slider
                                            2</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="deskripsi_slider_2"
                                                value="{{ $beranda->deskripsi_slider_2 ?? old('deskripsi_slider_2') }}"
                                                required>
                                            @error('deskripsi_slider_2')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            Slider
                                            2 (Optional)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="link_slider_2"
                                                value="{{ old('link_slider_2') }}"
                                                placeholder="Contoh: https://www.google.com">
                                            @error('link_slider_2')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            slider 2</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="link" class="form-control" name="link_slider_2"
                                                value="{{ $beranda->link_slider_2 ?? old('link_slider_2') }}"
                                                placeholder="Contoh: https://www.google.com">
                                            @error('link_slider_2')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi
                                            Slider
                                            3</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="deskripsi_slider_3"
                                                value="{{ $beranda->deskripsi_slider_3 ?? old('deskripsi_slider_3') }}"
                                                required>
                                            @error('deskripsi_slider_3')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            Slider
                                            3 (Optional)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="link_slider_3"
                                                value="{{ old('link_slider_3') }}"
                                                placeholder="Contoh: https://www.google.com">
                                            @error('link_slider_3')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            slider 3</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="link" class="form-control" name="link_slider_3"
                                                value="{{ $beranda->link_slider_3 ?? old('link_slider_3') }}"
                                                placeholder="Contoh: https://www.google.com">
                                            @error('link_slider_3')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
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
    <script src="{{ asset('assets/backend/library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/upload-preview/upload-preview.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/backend/library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/backend/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/backend/js/page/modules-sweetalert.js') }}"></script>

    <!-- Sweet Alert Notifikasi dengan Penghapusan Session -->
    <script>
        $(document).ready(function() {
            // Sweet Alert untuk success
            @if (Session::has('success'))
                swal({
                    title: 'Sukses!',
                    text: '{{ Session::get('success') }}',
                    icon: 'success',
                    button: 'OK'
                }).then(() => {
                    // Kirim request untuk menghapus session
                    $.ajax({
                        url: '{{ route('clear.session') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('Session cleared');
                        }
                    });
                });
            @endif

            // Sweet Alert untuk error
            @if (Session::has('error'))
                swal({
                    title: 'Oops...',
                    text: '{{ Session::get('error') }}',
                    icon: 'error',
                    button: 'OK'
                }).then(() => {
                    // Kirim request untuk menghapus session
                    $.ajax({
                        url: '{{ route('clear.session') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('Session cleared');
                        }
                    });
                });
            @endif
        });
    </script>

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

            document.getElementById('image-upload-slider-1').addEventListener('change', function() {
                readURL(this, 'image-preview-slider-1', 'image-label-slider-1');
            });

            document.getElementById('image-upload-slider-2').addEventListener('change', function() {
                readURL(this, 'image-preview-slider-2', 'image-label-slider-2');
            });

            document.getElementById('image-upload-slider-3').addEventListener('change', function() {
                readURL(this, 'image-preview-slider-3', 'image-label-slider-3');
            });
        });
    </script>
@endpush
