@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Detail Informasi')

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
                <h1>Detail Informasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Detail Informasi</a></div>
                    <div class="breadcrumb-item">Detail Informasi</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h4>---------- Detail Informasi Sekolah ----------</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-2"></div>
                                <form action="{{ route('detail-info.update', $detailInformation->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email
                                            Information</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="email_info"
                                                value="{{ $detailInformation->email_info ?? old('email_info') }}" required>
                                            @error('email_info')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone
                                            Information</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="phone_info"
                                                oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                value="{{ $detailInformation->phone_info ?? old('phone_info') }}" required>
                                            @error('phone_info')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address
                                            Information</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="address_info"
                                                value="{{ $detailInformation->address_info ?? old('address_info') }}"
                                                required>
                                            @error('address_info')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                            Website</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="website_name_info"
                                                value="{{ $detailInformation->website_name_info ?? old('website_name_info') }}">
                                            @error('website_name_info')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            Website</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="link" class="form-control" name="website_link_info"
                                                placeholder="Contoh: https://www.google.com"
                                                value="{{ $detailInformation->website_link_info ?? old('website_link_info') }}">
                                            @error('website_link_info')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            Facebook</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="link" class="form-control" name="facebook_link_info"
                                                placeholder="Contoh: https://www.facebook.com/name"
                                                value="{{ $detailInformation->facebook_link_info ?? old('facebook_link_info') }}">
                                            @error('facebook_link_info')
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
                                            <input type="link" class="form-control" name="instagram_link_info"
                                                placeholder="Contoh: https://www.instagram.com/name"
                                                value="{{ $detailInformation->instagram_link_info ?? old('instagram_link_info') }}">
                                            @error('instagram_link_info')
                                                <strong class="fw-bold d-block text-danger mt-2">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                            Youtube</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="link" class="form-control" name="youtube_link_info"
                                                placeholder="Contoh: https://www.youtube.com/name"
                                                value="{{ $detailInformation->youtube_link_info ?? old('youtube_link_info') }}">
                                            @error('youtube_link_info')
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
            @if (Session::has('errorr'))
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
@endpush
