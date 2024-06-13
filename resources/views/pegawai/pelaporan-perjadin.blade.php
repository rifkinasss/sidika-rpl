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
        background-color: rgba(0, 131, 212, 0.3);
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
        <a class="nav-link py-4 active" href="#data-pengajuan">
            <i class="mdi mdi-file-send menu-icon"></i>
            <span class="menu-title">Data Pengajuan</span>
        </a>
        <a class="nav-link py-4" href="#data-akomodasi-transportasi">
            <i class="mdi mdi-train menu-icon"></i>
            <span class="menu-title">Akomodasi & Transportasi</span>
        </a>
        <a class="nav-link py-4" href="#pengumpulan-bukti">
            <i class="mdi mdi-file-document-box-check menu-icon"></i>
            <span class="menu-title">Pengumpulan Bukti</span>
        </a>
    </nav>
</div>
<div class="content-wrapper">    
    <h1>Pelaporan Perjalanan Dinas</h1>
    <p class="text-danger">Harap laporkan data selengkap-lengkapnya. alur dana tidak boleh lebih besar ataupun
        lebih kecil dari dana yang diberikan.*</p>
    <form class="forms-sample" method="POST" action="{{ route('pelaporan-perjadin.store', $perjadin->id) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{-- form atas besar --}}
            <div class="col-md-12 grid-margin stretch-card" id="data-pengajuan">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pengajuan</h4>
                        <div class="row">
                            <div class="form-group">
                                <label for="nomor-surat">Nomor Surat</label>
                                <input type="text" class="form-control" value="{{ $perjadin->nomor_surat }}"
                                    name="nomor_surat" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nama-lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->nama }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->nip }}" disabled>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="keperluan">Keperluan Perjalanan Dinas</label>
                                    <input type="text" class="form-control" id="keperluan" name="keperluan_perjadin"
                                        value="{{ $perjadin->keperluan_perjadin }}" disabled></input>
                                </div>
                                <div class="form-group">
                                    <label for="pelaporan-tujuan">Tujuan</label>
                                    <input type="text" class="form-control" id="pelaporan-tujuan"
                                        placeholder="Masukkan Tujuan Pelaporan" name="tujuan"
                                        value="{{ $perjadin->tujuan }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- data akomodasi & transportasi --}}
            <div class="col-md-12 grid-margin stretch-card" id="data-akomodasi-transportasi">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Akomodasi & Transportasi</h4>
                        <div class="row">
                            <div class="form-group">
                                <label for="penginapan">Nama Penginapan</label>
                                <input type="text" class="form-control" id="penginapan" name="jns_penginapan"
                                    placeholder="Masukkan Nama Penginapan" required>
                            </div>
                            {{-- card form kiri --}}
                            <div class="col-sm-6">
                                <div class="p-2 bg-primary me-2">
                                    <h5 class="text-white">Berangkat</h5>
                                    <div class="form-group">
                                        <label for="tanggal-berangkat"
                                            class="col-sm-12 col-form-label text-white">Tanggal</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tanggal-berangkat"
                                                name="tgl_berangkat" placeholder="dd/mm/yyyy" disabled
                                                value="{{ \Carbon\Carbon::parse($perjadin->tgl_berangkat)->format('d-M-Y') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white">Jenis Transportasi</label>
                                        <div class="col-sm-12">
                                            <select class="form-control text-black" name="jns_transportasi_berangkat">
                                                <option selected>Pilih Jenis Transportasi</option>
                                                <option value="Pesawat">Pesawat</option>
                                                <option value="Kereta Api">Kereta Api</option>
                                                <option value="Bis">Bis</option>
                                                <option value="Kapal Laut">Kapal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama-transportasi-berangkat"
                                            class="col-sm-12 col-form-label text-white">Nama Pesawat/Kereta Api</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nama-transportasi-berangkat"
                                                name="nama_transportasi_berangkat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor-tiket-berangkat" class="col-sm-12 col-form-label text-white">Nomor
                                            Tiket</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nomor-tiket-berangkat"
                                                name="nomor_tiket_berangkat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat-duduk-berangkat"
                                            class="col-sm-12 col-form-label text-white">Tempat Duduk</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tempat-duduk-berangkat"
                                                name="nomor_kursi_berangkat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga-berangkat"
                                            class="col-sm-12 col-form-label text-white">Harga</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="harga-berangkat"
                                                name="harga_berangkat" placeholder="misal. Rp 1.000.000" aria-label="Amount (to the nearest dollar)"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- card form kanan --}}
                            <div class="col-sm-6">
                                <div class="p-2 bg-success ms-2">
                                    <h5 class="text-white">Kembali</h5>
                                    <div class="form-group">
                                        <label for="tanggal-kembali"
                                            class="col-sm-12 col-form-label text-white">Tanggal</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tanggal-kembali"
                                                name="tgl_kembali" placeholder="dd/mm/yyyy" disabled
                                                value="{{ \Carbon\Carbon::parse($perjadin->tgl_kembali)->format('d-M-Y') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white">Jenis Transportasi</label>
                                        <div class="col-sm-12">
                                            <select class="form-control text-black" name="jns_transportasi_kembali">
                                                <option selected>Pilih Jenis Transportasi</option>
                                                <option value="Pesawat">Pesawat</option>
                                                <option value="Kereta Api">Kereta Api</option>
                                                <option value="Bis">Bis</option>
                                                <option value="Kapal Laut">Kapal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama-transportasi-kembali"
                                            class="col-sm-12 col-form-label text-white">Nama Pesawat/Kereta Api</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nama-transportasi-kembali"
                                                name="nama_transportasi_kembali">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor-tiket-kembali" class="col-sm-12 col-form-label text-white">Nomor
                                            Tiket</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nomor-tiket-kembali"
                                                name="nomor_tiket_kembali">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat-duduk-kembali"
                                            class="col-sm-12 col-form-label text-white">Tempat Duduk</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tempat-duduk-kembali"
                                                name="nomor_kursi_kembali" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga-kembali"
                                            class="col-sm-12 col-form-label text-white">Harga</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="harga-kembali"
                                                name="harga_kembali" placeholder="misal. Rp 1.000.000" aria-label="Amount (to the nearest dollar)"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- form bukti --}}
            <div class="col-md-12 grid-margin stretch-card" id="pengumpulan-bukti">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengumpulan Bukti</h4>
                        <p class="card-description text-danger">
                            satu file pdf yang tergabung dari foto tiket pesawat/kereta api, struk pembelian, atau nota
                            pembayaran lainnya. tuliskan total transaksi disebelah form uploadnya.*
                        </p>
                        <form class="forms-sample">
                            {{-- card 1 akomodasi biru --}}
                            <div class="card bg-primary rounded-1 p-2 my-5">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label for="akomodasi"
                                                class="col-sm-12 col-form-label text-white">Akomodasi
                                                :</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" class="form-control file-input-default"
                                                    accept="application/pdf" name="bukti_akomodasi"
                                                    placeholder="Upload PDF" id="bukti_akomodasi" required>
                                                {{-- <span class="input-group-append"> --}}
                                                <label for="bukti_akomodasi"
                                                    class="file-upload-browse btn btn-dark">Upload</label>
                                                {{-- </span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="biaya-akomodasi"
                                                class="col-sm-12 col-form-label text-white">Biaya
                                                :</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="biaya-akomodasi"
                                                    name="total_biaya_akomodasi"
                                                    aria-label="Amount (to the nearest dollar)" placeholder="misal. Rp 1.000.000" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- card 2 berangkat abu-abu --}}
                            <div class="card bg-secondary rounded-1 p-2 my-5">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label for="berangkat"
                                                class="col-sm-12 col-form-label text-white">Berangkat
                                                :</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" class="form-control file-input-default"
                                                    accept="application/pdf" name="bukti_berangkat"
                                                    id="bukti_berangkat" required>
                                                <label for="bukti_berangkat"
                                                    class="file-upload-browse btn btn-dark">Upload<label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="biaya-berangkat"
                                                class="col-sm-12 col-form-label text-white">Biaya
                                                :</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="biaya-berangkat"
                                                    name="total_biaya_berangkat" placeholder="misal. Rp 1.000.000"
                                                    aria-label="Amount (to the nearest dollar)" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- card 3 kembali hijau --}}
                            <div class="card bg-success rounded-1 p-2 my-5">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label for="kembali" class="col-sm-12 col-form-label text-white">Kembali
                                                :</label>
                                            <div class="input-group col-xs-12">
                                                <input class="form-control file-input-default" type="file"
                                                    accept="application/pdf" name="bukti_kembali" id="bukti_kembali"
                                                    required>
                                                <label for="bukti_kembali"
                                                    class="file-upload-browse btn btn-dark">Upload</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="biaya-kembali"
                                                class="col-sm-12 col-form-label text-white">Biaya
                                                :</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="biaya-kembali"
                                                    name="total_biaya_kembali" placeholder="misal. Rp 1.000.000"
                                                    aria-label="Amount (to the nearest dollar)" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit"
                                    class="btn btn-primary submit-form-perjadin mt-2 mb-2">Submit</button>
                                <a href="{{ route('pegawai') }}" class="btn btn-outlinne-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
