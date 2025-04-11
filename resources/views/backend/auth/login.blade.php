@extends('backend.auth.layouts.app')

@section('title', $pageTitle ?? 'Login')

@push('style')
    </style>
@endpush

@section('main')
    <section class="section">
        <div class="d-flex align-items-stretch flex-wrap">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="m-3 p-4">
                    <img src="{{ asset('assets/images/logo-fix.png') }}" alt="logo" width="80"
                        class="shadow-light rounded-circle mb-4 mt-2">
                    <h4 class="text-dark font-weight-normal">Selamat Datang, <span class="font-weight-bold"></span></h4>
                    <h4 class="text-dark font-weight-normal"><span class="font-weight-bold">SMAIT Al-Ghozali</span></h4>
                    {{-- <p class="text-muted">Before you get started, you must login or register if you don't already
                        have an account.</p> --}}
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                                autofocus>
                            <div class="invalid-feedback">
                                Please fill in your email
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                required>
                            <div class="invalid-feedback">
                                please fill in your password
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                    id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                            </div>
                        </div> --}}

                        <div class="form-group text-right">
                            <a href="{{ route('reset-password-admin') }}" class="float-left mt-3">
                                Forgot Password?
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                Login
                            </button>
                        </div>

                        {{-- <div class="mt-5 text-center">
                            Don't have an account? <a href="auth-register.html">Create new one</a>
                        </div> --}}
                    </form>

                    <div class="text-small mt-5 text-center">
                        Copyright &copy; SMAIT AL-Ghozali
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 min-vh-100 background-walk-y position-relative overlay-gradient-bottom order-1"
                data-background="{{ asset('assets/images/login-bg-2.jpg') }}">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="display-4 font-weight-bold mb-2">SMAIT Al-Ghozali</h1>
                            <h5 class="font-weight-normal text-muted-transparent">Jember, Indonesia</h5>
                        </div>
                        {{-- Photo by <a class="text-light bb" target="_blank"
                            href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb"
                            target="_blank" href="https://unsplash.com">Unsplash</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/backend/library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
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
@endpush
