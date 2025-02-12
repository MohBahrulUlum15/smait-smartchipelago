@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Artikel')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.css') }}">

    {{-- CSS Library for Datatable Bootstrap 5 --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Artikel Sekolah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Artikel</a></div>
                    <div class="breadcrumb-item">Artikel Sekolah</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header d-flex justify-content-center">
                                <h4>---------- Artikel ----------</h4>
                            </div> --}}
                            <div class="card-body">
                                <div class="float-right mb-2">
                                    <div class="d-flex mx-3 justify-content-end">
                                        <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Artikel
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    {{-- Data Table --}}
                                    <table id="myDataTable" class="table table-hover table-sm" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="row" class="text-center">
                                                    #
                                                </th>
                                                <th>Judul Artikel</th>
                                                <th class="text-center">Gambar</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                                <tr class="align-middle">
                                                    <th class="text-center align-middle">
                                                        {{ $loop->iteration }}</th>
                                                    <td class="align-middle">{{ $item->judul_artikel }}</td>
                                                    <td class="align-middle text-center">
                                                        @if ($item->gambar_artikel)
                                                            <div class="d-flex justify-content-center">
                                                                <div style="width: 80px; height: 60px; overflow: hidden;">
                                                                    <img src="{{ asset($item->gambar_artikel) }}"
                                                                        alt="image" class="img-fluid"
                                                                        style="height: 100%; object-fit: contain;">
                                                                </div>
                                                            </div>
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td class="align-middle">{{ $item->deskripsi }}</td> --}}
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('artikel.edit', $item->id) }}"
                                                                class="btn btn-info btn-sm">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                            <div class="clearfix mx-1"></div>
                                                            <form action="{{ route('artikel.destroy', $item->id) }}"
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
                                                <div class="alert alert-info alert-dismissible show fade">
                                                    <div class="alert-body">
                                                        <button class="close" data-dismiss="alert">
                                                            <span>&times;</span>
                                                        </button>
                                                        Belum ada data!.
                                                    </div>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
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

    {{-- Datatable Bootsrap 5 Library --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                "scrollX": true,
                // "scrollY": true,
            });
        });
    </script>
@endpush
