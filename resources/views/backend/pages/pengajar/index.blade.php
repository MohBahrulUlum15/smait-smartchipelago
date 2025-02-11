@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Pengajar')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/selectric/public/selectric.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Semua Pengajar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pengajar</a></div>
                    <div class="breadcrumb-item">Semua Pengajar</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right" style="margin-bottom: 6px;">
                                    <a href="{{ route('pengajar.create') }}" class="btn btn-primary">Tambah Pengajar
                                    </a>
                                </div>

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

                                {{-- Data Table --}}
                                <div class="table-responsive">
                                    <table class="table-hover table table-lg" id="table-1">
                                        <thead>
                                            <tr>
                                                <th scope="row" class="text-center">
                                                    #
                                                </th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                {{-- <th>Author</th> --}}
                                                {{-- <th>Tags</th> --}}
                                                <th>Image</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pengajar as $item)
                                                <tr class="align-middle">
                                                    <th class="text-center align-middle">
                                                        {{ $loop->iteration }}</th>
                                                    <td class="align-middle">{{ $item->nama }}</td>

                                                    <td class="align-middle">{{ $item->jabatan }}</td>
                                                    {{-- <td class="align-middle">
                                                        {{ $item->author }}</td> --}}
                                                    {{-- <td>{{ ($item->tags) }}</td> --}}
                                                    <td class="align-middle">
                                                        @if ($item->foto)
                                                            <img src="{{ asset($item->foto) }}" alt="image"
                                                                width="50">
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('pengajar.edit', $item->id) }}"
                                                                class="btn btn-info btn-sm">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                            <div class="clearfix mx-1"></div>
                                                            <form action="{{ route('pengajar.destroy', $item->id) }}"
                                                                method="POST" style="display:inline;"
                                                                onsubmit="return confirm('Yakin ingin menghapus Pengajar ini?')">
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
                                                        Belum ada data pengajar!.
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
@endpush
