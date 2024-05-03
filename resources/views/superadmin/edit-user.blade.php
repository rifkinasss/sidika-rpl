@extends('superadmin.layouts.app')

@section('content')
    <div class="row">
        {{-- card tabel admin --}}
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Edit User</h4>
                    <form action="{{ route('createuser.update', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" id="nip" name="nip"
                                    value="{{ $user->nip }}" readonly disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $user->nama }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select id="Role" class="form-select" name="role">
                                    <option value="{{ $user->role }}" disabled selected>{{ $user->role }}</option>
                                    <option value="pegawai">Pegawai</option>
                                    <option value="admin">Admin</option>
                                    <option value="superadmin">Superadmin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10"><select id="jabatan" class="form-select" name="jabatan">
                                    <option value="{{ $user->jabatan }}" disabled selected>{{ $user->jabatan }}</option>
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                    <option>Kepala Dinas Pendidikan</option>
                                    <option>Wakil Kepala Dinas Pendidikan</option>
                                    <option>Sekretaris Dinas Pendidikan</option>
                                    <option>Kepala Bidang</option>
                                    <option>Wakil Kepala Bidang</option>
                                    <option>Sekretaris Bidang</option>
                                    <option>Staff</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="unit_kerja" class="col-sm-2 col-form-label">Unit Kerja</label>
                            <div class="col-sm-10"><select id="unit_kerja" class="form-select" name="unit_kerja">
                                    <option value="{{ $user->unit_kerja }}" disabled selected>{{ $user->unit_kerja }}
                                    </option>
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                    <option>Dinas Pendidikan Jakarta</option>
                                    <option>Bidang Pendidikan Dasar</option>
                                    <option>Bidang Pendidikan Menengah</option>
                                    <option>Bidang Pendidikan Tinggi</option>
                                    <option>Bidang Kurikulum dan Pembelajaran</option>
                                    <option>Bidang Ketenagaan</option>
                                    <option>Bidang Sarana dan Prasarana Pendidikan</option>
                                    <option>Bidang Penelitian dan Pengembangan Pendidikan</option>
                                    <option>Bidang Evaluasi Pendidikan</option>
                                    <option>Bidang Keuangan dan Administrasi</option>
                                    <option>Bidang Hukum</option>
                                    <option>Bidang Humas dan Komunikasi</option>
                                    <option>Bidang Teknologi Informasi dan Komputerisasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="Password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Password" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="Password" name="password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Password" class="col-sm-2 col-form-label">Confirm New Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="Password"required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href=" {{ route('createuser.index') }}" role="button"
                                class="btn btn-secondary col-2">Kembali</a>
                            <button type="submit" class="btn btn-primary col-2">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
