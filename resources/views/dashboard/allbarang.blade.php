@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="wrapper">
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-12 col-lg-12 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Kelola Product</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="control mb-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                        data-bs-target="#addBarang"><i class='bx bx-plus'></i></button>
                                    {{-- Modal Add Barang --}}
                                    <div class="modal fade" id="addBarang" tabindex="-1" aria-labelledby="addBarangLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addBarangLabel">Tambah product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('barang.store') }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nama_barang">Nama product</label>
                                                            <input
                                                                class="form-control @error('nama_barang')
                                                            is-invalid @enderror"
                                                                name="nama_barang" id="nama_barang" type="text"
                                                                placeholder="Nama barang">
                                                            @error('nama_barang')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="description">Deskripsi
                                                                *opsional</label>
                                                            <textarea class="form-control" name="description" id="description" rows="3" name="description"
                                                                placeholder="Lorem ipsum dolor sit amet"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label for="start-date" class="form-label">Tanggal mulai
                                                                        garansi</label>
                                                                    <input type="date" class="form-control"
                                                                        id="start-date" name="start_date">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="end-date" class="form-label">Tanggal akhir
                                                                        garansi</label>
                                                                    <input type="date" id="end-date"
                                                                        class="form-control" name="end_date">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary px-3 radius-30"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit"
                                                        class="btn btn-success px-3 radius-30">Simpan</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal Add Barang --}}
                                </div>

                                {{-- Table All Barang --}}
                                <div class="table-container">
                                    <div class="table-responsive">
                                        <table id="userTable" class="table table-striped table-bordered table-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Product</th>
                                                    <th>Kode Product</th>
                                                    <th>Masa Garansi</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barangs as $barang)
                                                    <tr>
                                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                                        <td>{{ $barang->nama_barang }}</td>
                                                        <td>
                                                            <div class="col-8 d-flex">
                                                                <div class="input-group">
                                                                    <input id="kd_barang{{ $barang->id }}"
                                                                        class="form-control"
                                                                        value="{{ $barang->kd_barang }}" readonly>
                                                                    <button
                                                                        class="btn bg-secondary text-white btn-clipboard mx-auto"
                                                                        data-clipboard-target="#kd_barang{{ $barang->id }}"
                                                                        data-bs-toggle="tooltip"
                                                                        data-barang-id="{{ $barang->id }}"
                                                                        title="Copy to Clipboard">
                                                                        <i class='bx bx-clipboard' id="iconClipboard"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $barang->masa_garansi }}</td>
                                                        <td>
                                                            @if ($barang->status == 'Active')
                                                                <span class="badge bg-success text-white">{{ $barang->status }}</span>
                                                            @elseif ($barang->status == 'Expired')
                                                                <span class="badge bg-danger text-white">{{ $barang->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td><button type="button"
                                                                class="btn btn-sm btn-warning text-white radius-30"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editBarang{{ $barang->id }}"><i
                                                                    class='bx bx-edit'></i>
                                                            </button>
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger text-white radius-30"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteBarang{{ $barang->id }}"><i
                                                                    class='bx bx-trash'></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    {{-- Modal Edit Barang --}}
                                                    <div class="modal fade" id="editBarang{{ $barang->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="editBarang{{ $barang->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editBarang{{ $barang->id }}Label">Edit
                                                                        barang
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('barang.update', $barang->id) }}"
                                                                        method="POST">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="nama_barang">Nama Product</label>
                                                                            <input
                                                                                class="form-control @error('nama_barang')
                                                                            is-invalid @enderror"
                                                                                name="nama_barang" id="nama_barang"
                                                                                type="text"
                                                                                value="{{ old('nama_barang', $barang->nama_barang) }}"
                                                                                placeholder="Nama barang">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="description">Deskripsi
                                                                                *opsional</label>
                                                                            <textarea class="form-control" name="description" id="description" rows="3" name="description"
                                                                                placeholder="Lorem ipsum dolor sit amet">{{ old('description', $barang->description) }}</textarea>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <label for="start-date"
                                                                                        class="form-label">Tanggal mulai
                                                                                        garansi</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="start-date" name="start_date"
                                                                                        value="{{ old('start_date', $barang->start_date) }}">
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <label for="end-date"
                                                                                        class="form-label">Tanggal akhir
                                                                                        garansi</label>
                                                                                    <input type="date" id="end-date"
                                                                                        class="form-control"
                                                                                        name="end_date"
                                                                                        value="{{ old('end_date', $barang->end_date) }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary px-3 radius-30"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success px-3 radius-30">Simpan</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End Modal Edit Barang --}}

                                                    {{-- Modal Delete Barang --}}
                                                    <div class="modal fade" id="deleteBarang{{ $barang->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="deleteBarang{{ $barang->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteBarang{{ $barang->id }}Label">Hapus
                                                                        product
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    Apakah kamu yakin ingin menghapus product ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Kembali</button>
                                                                    <form
                                                                        action="{{ route('barang.destroy', ['barang' => $barang->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End Modal Delete User --}}
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- End Table All Barang --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->
    {{-- MESSAGE --}}
    @if (session('success'))
        <script>
            // Success Message
            Swal.fire({
                toast: true,
                icon: 'success',
                title: '{{ session('success') }}',
                position: 'top-right',
                animation: true,
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
    @endif
    {{-- MESSAGE END --}}
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });

        // Clipboard JS
        new ClipboardJS('.btn');
        // Change Icon Clipboard
        $(document).ready(function() {
            $('.btn-clipboard').on('click', function() {
                var button = $(this);
                var barangId = button.data('barang-id');

                // Ganti ikon menjadi check
                button.find('.bx.bx-clipboard').removeClass('bx bx-clipboard');
                button.find('i').addClass('bx bx-check');

                // Setelah beberapa detik, kembalikan ikon ke clipboard
                setTimeout(function() {
                    button.find('.bx.bx-check').removeClass('bx bx-check');
                    button.find('i').addClass('bx bx-clipboard');
                }, 800); // Waktu dalam milidetik (misalnya 3000 untuk 3 detik)
            });
        });
    </script>
@endsection
