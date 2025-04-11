@extends('backend.layouts.app')

@section('title', $pageTitle ?? 'Motto & Tujuan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Motto & Tujuan Sekolah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Motto & Tujuan</a></div>
                    <div class="breadcrumb-item">Motto & Tujuan Sekolah</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h4>---------- MOTTO ----------</h4>
                            </div>
                            <div class="card-body text-center">
                                @forelse ($motto as $mottoData)
                                    <form action="{{ route('motto.update', $mottoData->id) }}" method="post"
                                        class="d-flex flex-column align-items-center">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group w-75">
                                            @error('deskripsi')
                                                <strong class="fw-bold d-block text-danger">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                            <textarea class="form-control text-center" name="deskripsi" rows="5" style="min-height: 100px;">{{ $mottoData->deskripsi ?? old('deskripsi') }}</textarea>
                                        </div>
                                        <div class="form-group w-75">
                                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                        </div>
                                    </form>
                                @empty
                                    <form action="{{ route('motto.store') }}" method="post"
                                        class="d-flex flex-column align-items-center">
                                        @csrf
                                        <div class="form-group w-75">
                                            @error('deskripsi')
                                                <strong class="fw-bold d-block text-danger">
                                                    <small>&nbsp;* {{ $message }}</small>
                                                </strong>
                                            @enderror
                                            <textarea class="form-control text-center" name="deskripsi" rows="5" style="min-height: 100px;" required>{{ old('deskripsi') }}</textarea>
                                        </div>
                                        <div class="form-group w-75">
                                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                        </div>
                                    </form>
                                @endforelse
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h4>---------- TUJUAN ----------</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right mb-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#tambahMisiModal">
                                        <i class="fas fa-plus"></i> Tambah Tujuan
                                    </button>
                                </div>
                                {{-- Data Table --}}
                                <div class="table-responsive">
                                    <table class="table-hover table table-lg" id="table-1">
                                        <thead>
                                            <tr>
                                                <th scope="row" class="text-center">
                                                    #
                                                </th>
                                                <th>Deskripsi</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tujuan as $item)
                                                <tr class="align-middle">
                                                    <th class="text-center align-middle">
                                                        {{ $loop->iteration }}</th>
                                                    <td class="align-middle">{{ $item->deskripsi }}</td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center">
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal" data-target="#editTujuanModal"
                                                                data-id="{{ $item->id }}"
                                                                data-deskripsi="{{ $item->deskripsi }}">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </button>
                                                            <div class="clearfix mx-1"></div>
                                                            <form action="{{ route('tujuan.destroy', $item->id) }}"
                                                                method="POST" style="display:inline;"
                                                                onsubmit="return confirm('Yakin ingin menghapus tujuan ini?')">
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
                                                        Belum ada data tujuan!.
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

        <!-- Modal Tambah Tujuan -->
        <div class="modal fade" id="tambahMisiModal" tabindex="-1" role="dialog" aria-labelledby="tambahMisiModalLabel"
            aria-hidden="true">
            <div class="modal-dialog mmodal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahMisiModalLabel">Tambah Tujuan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tujuan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Tujuan</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" style="min-height: 150px" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Tujuan -->
        <div class="modal fade" id="editTujuanModal" tabindex="-1" role="dialog"
            aria-labelledby="editTujuanModalLabel" aria-hidden="true">
            <div class="modal-dialog mmodal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTujuanModalLabel">Edit Tujuan Sekolah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editTujuanForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="editDeskripsi">Deskripsi Tujuan</label>
                                <textarea class="form-control" id="editDeskripsi" name="deskripsi" rows="5" style="min-height: 150px"
                                    required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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

    <!-- Script untuk menampilkan modal edit tujuan -->
    <script>
        $(document).ready(function() {
            $('button[data-target="#editTujuanModal"]').on('click', function() {
                var id = $(this).data('id');
                var deskripsi = $(this).data('deskripsi');

                $('#editTujuanForm').attr('action', `{{ route('tujuan.update', '') }}/${id}`);
                $('#editDeskripsi').val(deskripsi);

                // Jika ada nilai lama dari server (old value), gunakan nilai tersebut
                @if (old('deskripsi'))
                    $('#editDeskripsi').val("{{ old('deskripsi') }}");
                @endif
            });

            $('#editTujuanModal').on('hidden.bs.modal', function() {
                $('#editTujuanForm')[0].reset();
            });
        });
    </script>
@endpush
