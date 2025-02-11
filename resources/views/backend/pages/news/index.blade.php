@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Berita')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/selectric/public/selectric.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/backend/library/datatables/media/css/jquery.dataTables.min.css') }}"> --}}
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Semua Berita</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Berita</a></div>
                    <div class="breadcrumb-item">Semua Berita</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <h2 class="section-title">Berita</h2>
                <p class="section-lead">
                    You can manage all Berita, such as editing, deleting and more.
                </p> --}}


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="float-left">
                                    <form action="{{ route('berita.index') }}" method="GET">
                                        <div class="input-group">
                                            <label for="perPage">Show entries</label>
                                            <select name="perPage" class="form-control selectric"
                                                onchange="this.form.submit()">
                                                <option value="10" {{ request('perPage', 10) == 10 ? 'selected' : '' }}>
                                                    10
                                                </option>
                                                <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25
                                                </option>
                                                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50
                                                </option>
                                                <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100
                                                </option>
                                            </select>
                                            <input type="hidden" name="search" value="{{ request('search') }}">
                                        </div>
                                    </form>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('berita.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search"
                                                value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                                <div class="float-right mb-3">
                                    <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita
                                    </a>
                                </div>
                                {{-- Data Table --}}
                                <div class="table-responsive">
                                    <table class="table-hover table table-lg" id="table-1">
                                        <thead>
                                            <tr>
                                                <th scope="row" class="text-center">
                                                    #
                                                </th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                {{-- <th>Author</th> --}}
                                                {{-- <th>Tags</th> --}}
                                                <th>Image</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($news as $item)
                                                <tr class="align-middle">
                                                    <th class="text-center align-middle">
                                                        {{ $loop->iteration }}</th>
                                                    <td class="align-middle">{{ $item->title }}</td>

                                                    <td class="align-middle">{{ $item->type }}</td>
                                                    {{-- <td class="align-middle">
                                                        {{ $item->author }}</td> --}}
                                                    {{-- <td>{{ ($item->tags) }}</td> --}}
                                                    <td class="align-middle">
                                                        @if ($item->featured_image)
                                                            <img src="{{ asset($item->featured_image) }}" alt="image"
                                                                width="50">
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('berita.edit', $item->id) }}"
                                                                class="btn btn-info btn-sm">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                            <div class="clearfix mx-1"></div>
                                                            <form action="{{ route('berita.destroy', $item->id) }}"
                                                                method="POST" style="display:inline;"
                                                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fa-regular fa-trash-can"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-warning alert-dismissible show fade">
                                                    <div class="alert-body">
                                                        <button class="close" data-dismiss="alert">
                                                            <span>&times;</span>
                                                        </button>
                                                        Belum ada data News!.
                                                    </div>
                                                </div>
                                            @endforelse


                                            {{-- <tr>
                                                <td class="text-center">
                                                    1
                                                </td>
                                                <td>Create a mobile app</td>
                                                <td class="align-middle">
                                                    <div class="progress" data-height="4" data-toggle="tooltip"
                                                        title="100%">
                                                        <div class="progress-bar bg-success" data-width="100%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img alt="image" src="{{ asset('img/avatar/avatar-5.png') }}"
                                                        class="rounded-circle" width="35" data-toggle="tooltip"
                                                        title="Wildan Ahdian">
                                                </td>
                                                <td>2018-01-20</td>
                                                <td>
                                                    <div class="badge badge-success">Completed</div>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> --}}
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
    <script src="{{ asset('assets/backend/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/backend/js/page/index-0.js') }}"></script>

    <script src="{{ asset('assets/backend/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/backend/js/page/modules-datatables.js') }}"></script>

    <script src="{{ asset('assets/backend/library/sweetalert/dist/sweetalert.min.js') }}"></script>
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
