@extends('pegawai.layouts.app')

@section('content')
<style>
    /* Custom CSS for sidebar */
    .sidebar {
        height: calc(100vh - 159px);
        position: fixed;
        left: 0;
        top: 159px;
        background-color: #ffffff;
        width: 250px;
        padding-top: 20px;
    }

    .sidebar .nav-link {
        color: #0082D4;
        font-weight: 500;
        background-color: #ffffff;
    }

    .sidebar .nav-link:hover {
        background-color: #0082D4;
        color: #ffffff;
    }

    .menu-icon {
        margin-right: 10px;
    }

    .menu-title {
        margin-left: 5px;
    }

    .page-body-wrapper {
        background-color: #ffffff
    }

    .main-panel {
        margin-left: 250px; /* adjust based on sidebar width */
        padding: 20px;
    }

    @media (max-width: 768px) {
    .sidebar {
        display: none;
    }
    .main-panel {
        margin-left: 0;
    }
    }
</style>
<div class="sidebar">
    <h3 class="ms-3">Navigasi</h3>
    <nav class="nav flex-column">
        <a class="nav-link py-4 active" href="#Tujuan-Perjadin">
            <i class="mdi mdi-airplane menu-icon"></i>
            <span class="menu-title">Tujuan Perjalanan Dinas</span>
        </a>
        <a class="nav-link py-4" href="#Perencanaan-Perjadin">
            <i class="mdi mdi-calendar menu-icon"></i>
            <span class="menu-title">Perencanaan Tanggal</span>
        </a>
        <a class="nav-link py-4" href="#Rincian-Biaya-Perjadin">
            <i class="mdi mdi-currency-usd menu-icon"></i>
            <span class="menu-title">Rincian Biaya</span>
        </a>
    </nav>
</div>
<div class="content-wrapper">
    <h1>Form Perencanaan Perjalanan Dinas</h1>
    <p class="card-description text-danger">Semua data yang diinput dapat menjadi penentu keputusan persetujuan perjalanan
        dinas, harap isi dengan lengkap dan jelas*</p>
    <form class="forms-sample" method="POST" action="{{ route('perjalanan-dinas.store') }}">
        @csrf
        {{-- form Tujuan Perjadin --}}
        <div class="col-sm-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" id="Tujuan-Perjadin">Tujuan Perjalanan Dinas</h4>
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama"
                                value="{{ Auth::user()->nama }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NIP" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="NIP" value="{{ Auth::user()->nip }}"
                                disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keperluan" class="col-sm-3 col-form-label">Keperluan Perjalanan Dinas</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="keperluan" placeholder="Contoh: Kunjungan ke kantor DPRD" rows="4"
                                name="keperluan_perjadin" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah Dibayarkan</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="jumlah"
                                aria-label="Amount (to the nearest dollar)" name="jumlah_dibayarkan" placeholder="misal. Rp 1.000.000" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tujuan"
                                placeholder="Kota, Provinsi, Negara" name="tujuan" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- form Perencanaan tanggal --}}
        <div class="col-sm-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"  id="Perencanaan-Perjadin">Perencanaan Tanggal Perjalanan Dinas</h4>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Berangkat</label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" type="date" id="tanggal-berangkat"
                                name="tgl_berangkat" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" type="date" id="tanggal-kembali"
                                name="tgl_kembali" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah-hari" class="col-sm-3 col-form-label">Jumlah Hari</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" id="jumlah-hari" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" placeholder="" name="jumlah_hari" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white">HARI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- form panjang bawah --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" id="Rincian-Biaya-Perjadin">Rincian Biaya Perjalan Dinas</h4>
                    <p class="card-description text-danger mb-4">
                        Masukkan nominal tanpa koma (,) format jumlah akan dibuat secara otomatis.*
                    </p>
                    <div class="bg-primary ps-2 pe-2 pt-2">
                        <h5 class="card-title text-white">Uang Harian :</h5>
                        <div class="form-group row">
                            <label for="uang-perhari" class="col-sm-3 col-form-label text-white">Uang Perhari</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="uang-perhari"
                                    aria-label="Amount (to the nearest dollar)" name="uang_harian" placeholder="misal. Rp 1000.000" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uang-total" class="col-sm-3 col-form-label text-white">Uang Total</label>
                            <div class="col-sm-9">
                                <input type="number" id="uang-total" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" name="uang_total"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 bg-transparent">
                        <div class="form-group row">
                            <label for="biaya-akomodasi" class="col-sm-3 col-form-label">Biaya Akomodasi</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="biaya-akomodasi"
                                    aria-label="Amount (to the nearest dollar)" name="biaya_akomodasi" placeholder="misal. Rp 1000.000" required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="biaya-lain" class="col-sm-3 col-form-label">Biaya lain /Kontribusi/ Bantuan
                                Transport</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="biaya-lain"
                                    aria-label="Amount (to the nearest dollar)" name="biaya_lain" placeholder="misal. Rp 1000.000" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biaya-lain" class="col-sm-3 col-form-label">Biaya Tiket PP</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="biaya-tiket"
                                    aria-label="Amount (to the nearest dollar)" name="biaya_tiket" placeholder="misal. Rp 1000.000" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah-biaya" class="col-sm-3 col-form-label">Jumlah Biaya</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="jumlah-biaya"
                                    aria-label="Amount (to the nearest dollar)" name="jumlah_biaya" disabled>
                            </div>
                        </div>
                        <div class="form-check form-check-flat form-check-success">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required>
                                Saya yakin telah mengisi semua data diatas dengan benar
                            </label>
                        </div>
                    </div>
                    <div class="container text-center">
                        <div class="row">
                            <button type="submit" class="btn align-self-center btn-primary submit-form-perjadin mt-2 mb-2">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
