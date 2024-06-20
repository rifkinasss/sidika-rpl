@extends('superadmin.layouts.app')

@section('content')
    <script>
        // berhasil import
        @if (session('success-import'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success-import') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        // gagal import
        @if (session('error-import'))
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error-import') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        // user dibuat
        @if (session('tambah-user'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Berhasil Ditambahkan!',
                text: '{{ session('tambah-user') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        // user diedit
        @if (session('edit-user'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Berhasil Diubah!',
                text: '{{ session('edit-user') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
    <div class="row">
        {{-- card tabel admin --}}
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Tabel Pegawai</h4>
                    <div class="card-description">
                        <span class="fs-8 mb-5">Super Admin dapat memenambahkan, mengedit, dan menghapus admin</span>
                    </div>
                    <a href="{{ route('user.create') }}" type="button" class="btn btn-primary text-white mb-3"><i
                            class="mdi mdi-account-multiple-plus"></i>
                        Tambah</a>
                    <button type="button" class="btn btn-success text-white mb-3" data-toggle="modal"
                        data-target="#importModal"><span class="mdi mdi-import"></span>
                        Import
                    </button>
                    <div class="modal fade" id="importModal" tabindex="-1" role="dialog"
                        aria-labelledby="importModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="importModalLabel">Import User Excel File</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="inputGroupFile01">Upload File Excel</label>
                                            <input type="file" class="form-control" id="inputGroupFile01" name="file"
                                                accept=".xls,.xlsx" required>
                                        </div>
                                        <div>
                                            <h6>Template dapat di unduh : <a href="/excel/user.xlsx" download>Template
                                                    User</a></h6>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger text-white mb-3"
                                            data-dismiss="modal"><span class="mdi mdi-progress-close"></span>Close</button>
                                        <button type="submit" class="btn btn-success text-white mb-3"><span
                                                class="mdi mdi-import"></span>Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table id="user" class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <b>No</b>
                                </th>
                                <th>
                                    <b>NIP</b>
                                </th>
                                <th>
                                    <b>Nama</b>
                                </th>
                                <th>
                                    <b>Email</b>
                                </th>
                                <th>
                                    <b>Status</b>
                                </th>
                                <th>
                                    <b>Jabatan</b>
                                </th>
                                <th>
                                    <b>Unit Kerja</b>
                                </th>
                                {{-- <th>
                                        <b>Password</b>
                                    </th> --}}
                                <th>
                                    <b>Aksi</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $u->nip }}
                                    </td>
                                    <td>
                                        {{ $u->nama }}
                                    </td>
                                    <td>
                                        {{ $u->email }}
                                    </td>
                                    <td>
                                        @if ($u->role === 'superadmin')
                                            <span class="badge text-bg-danger">{{ $u->role }}</span>
                                        @elseif($u->role === 'admin')
                                            <span class="badge text-bg-warning">{{ $u->role }}</span>
                                        @elseif($u->role === 'pegawai')
                                            <span class="badge text-bg-success">{{ $u->role }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $u->jabatan }}
                                    </td>
                                    <td>
                                        {{ $u->unit_kerja }}
                                    </td>
                                    {{-- <td>
                                            {{ $u->password }}
                                        </td> --}}
                                    <td>
                                        <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning"><i
                                                class="mdi mdi-pencil text-dark"></i></a>
                                        <form action="{{ route('user.destroy', $u->id) }}" method="POST"
                                            style="display:inline;" id="deleteForm{{ $u->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger deleteUser"
                                                data-id="{{ $u->id }}">
                                                <i class="mdi mdi-delete text-white"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    <b>No</b>
                                </th>
                                <th>
                                    <b>NIP</b>
                                </th>
                                <th>
                                    <b>Nama</b>
                                </th>
                                <th>
                                    <b>Email</b>
                                </th>
                                <th>
                                    <b>Status</b>
                                </th>
                                <th>
                                    <b>Jabatan</b>
                                </th>
                                <th>
                                    <b>Unit Kerja</b>
                                </th>
                                {{-- <th>
                                        <b>Password</b>
                                    </th> --}}
                                <th>
                                    <b>Aksi</b>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
