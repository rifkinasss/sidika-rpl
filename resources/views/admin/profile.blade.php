@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <h4 class="card-title">Profile Saya</h4>
                        <h5><b>Data Diri</b></h5>
                        <div class="row">
                            <div class="col-sm-3 me-2">
                                <div style="width: 200px; height: 200px; overflow: hidden;">
                                    <img src="/images/faces/face2.jpg" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col ms-2">
                                <p class="my-4 h5">
                                    <b>Nama</b> : Pegawai 1
                                </p>
                                <p class="my-4 h5">
                                    <b>NIP</b> : 10221052
                                </p>
                                <p class="my-4 h5">
                                    <b>Jabatan</b> : Pegawai
                                </p>
                                <p class="my-4 h5">
                                    <b>Unit Kerja</b> : Departemen Komunikasi dan Teknologi
                                </p>
                            </div>
                        </div>
                        <div class="float-sm-start mt-4">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                        <div class="float-sm-end mt-4">
                            <button type="submit" class="btn btn-warning"><i
                                    class="col-sm mdi mdi-pencil"></i>Edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{-- card bawah password --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah Password</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="password-lama">Password Lama</label>
                            <input type="text" class="form-control" id="password-lama">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password-baru">Password Baru</label>
                            <input type="text" class="form-control" id="password-baru">
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi-password">Konfirmasi Password Baru</label>
                            <input type="text" class="form-control" id="konfirmasi-password">
                        </div>
                        <div class="float-sm-start mt-4">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                        <div class="float-sm-end mt-4">
                            <button type="submit" class="btn btn-warning"><i
                                    class="col-sm mdi mdi-pencil"></i>Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
