@extends('superadmin.layouts.app')

@section('content')
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
                        data-target="#importModal"><i class="mdi mdi-account-multiple-plus"></i>
                        Import
                    </button>
                    <div class="modal fade" id="importModal" tabindex="-1" role="dialog"
                        aria-labelledby="importModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="importModalLabel">Import Excel File</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="excelFile">Choose Excel File</label>
                                            <input type="file" class="form-control-file" id="excelFile" name="file"
                                                accept=".xls,.xlsx" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
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
                                    <th>
                                        <b>Password</b>
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
                                        <td>
                                            {{ $u->password }}
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $u->id) }}" class="btn btn-success"><i
                                                    class="mdi mdi-pencil text-white"></i></a>
                                            <form action="{{ route('user.destroy', $u->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                        class="mdi mdi-delete text-white"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
