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
                                        <h3>Kelola User</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="control mb-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                        data-bs-target="#addUser"><i class='bx bx-user-plus'></i></button>
                                    {{-- Modal Add User --}}
                                    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addUserLabel">Tambah user</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('users.store') }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="form-label" for="username">Nama</label>
                                                            <input
                                                                class="form-control @error('username')
                                                            is-invalid @enderror"
                                                                name="username" id="username" type="text"
                                                                placeholder="Nama">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="email">Email</label>
                                                            <input
                                                                class="form-control @error('email')
                                                            is-invalid @enderror"
                                                                name="email" id="email" type="email"
                                                                placeholder="example@gmail.com">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="password">Password</label>
                                                            <input
                                                                class="form-control @error('password')
                                                            is-invalid @enderror"
                                                                name="password" id="password" type="password"
                                                                placeholder="********">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="gender">Jenis Kelamin</label>
                                                            <select class="form-select mb-3" id="gender" name="gender">
                                                                <option selected>- Pilih Jenis Kelamin -</option>
                                                                <option value="Male"
                                                                    {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                                                </option>
                                                                <option value="Female"
                                                                    {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                                                </option>
                                                                <option value="Other"
                                                                    {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="birth">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" name="birth"
                                                                id="birth">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="role">Role</label>
                                                            <select name="role" id="role" class="form-select">
                                                                <option selected>- Pilih Role -</option>
                                                                <option value="Client">Client</option>
                                                                <option value="Admin">Admin</option>
                                                            </select>
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
                                    {{-- End Modal Add User --}}
                                </div>
                                {{-- Table All User --}}
                                <div class="table-container">
                                    <div class="table-responsive">
                                        <table id="userTable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->role }}</td>
                                                        <td><button type="button"
                                                                class="btn btn-sm btn-warning text-white radius-30"
                                                                data-bs-toggle="modal" data-bs-target="#editUser{{ $user->id }}"><i
                                                                    class='bx bx-edit'></i>
                                                            </button>
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger text-white radius-30"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteUser{{ $user->id }}"><i
                                                                    class='bx bx-trash'></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    {{-- Modal Edit User --}}
                                                    <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1"
                                                        aria-labelledby="editUser{{ $user->id }}Label" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editUser{{ $user->id }}Label">Edit user
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="username">Nama</label>
                                                                            <input
                                                                                class="form-control @error('username') is-invalid @enderror"
                                                                                name="username" id="username"
                                                                                type="text" placeholder="Nama" value="{{ old('username', $user->username) }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="email">Email</label>
                                                                            <input
                                                                                class="form-control @error('email')
                                                        is-invalid @enderror"
                                                                                name="email" id="email"
                                                                                type="email"
                                                                                placeholder="example@gmail.com" value="{{ old('email', $user->email) }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="gender">Jenis
                                                                                Kelamin</label>
                                                                            <select class="form-select mb-3"
                                                                                id="gender" name="gender">
                                                                                <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male
                                                                                </option>
                                                                                <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female
                                                                                </option>
                                                                                <option value="Other" {{ $user->gender === 'Other' ? 'selected' : '' }}>Other
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="birth">Tanggal Lahir</label>
                                                                            <input type="date" class="form-control"
                                                                                name="birth" id="birth" value="{{ old('birth', $user->birth) }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="role">Role</label>
                                                                            <select name="role" id="role"
                                                                                class="form-select">
                                                                                <option value="Client" {{ $user->role === 'Client' ? 'selected' : '' }}>Client
                                                                                </option>
                                                                                <option value="Admin" {{ $user->role === 'Admin' ? 'selected' : '' }}>Admin
                                                                                </option>
                                                                            </select>
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
                                                    {{-- End Modal Edit User --}}

                                                    {{-- Modal Delete User --}}
                                                    <div class="modal fade" id="deleteUser{{ $user->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="deleteUser{{ $user->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteUser{{ $user->id }}Label">Hapus user
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    Apakah kamu yakin ingin menghapus user ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Kembali</button>
                                                                    <form
                                                                        action="{{ route('users.destroy', ['user' => $user->id]) }}"
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
                                {{-- End Table All User --}}
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
        <footer class="page-footer">
            <p class="mb-0">Copyright © Roshit 2023. All right reserved.</p>
        </footer>
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
    </script>
@endsection
