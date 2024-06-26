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
        <a class="nav-link py-4 active" href="#perjanjian-belanja-barjas">
            <i class="mdi mdi-file-document menu-icon"></i>
            <span class="menu-title">Perjanjian Belanja Barjas</span>
        </a>
        <a class="nav-link py-4" href="#detail-belanja-barjas">
            <i class="mdi mdi-file-document-outline menu-icon"></i>
            <span class="menu-title">Detail Kontrak</span>
        </a>
        <a class="nav-link py-4" href="#jaminan-belanja-barjas">
            <i class="mdi mdi-shield-check menu-icon"></i>
            <span class="menu-title">Jaminan Belanja Barjas</span>
        </a>
        <a class="nav-link py-4" href="#dpa-belanja-barjas">
            <i class="mdi mdi-cash menu-icon"></i>
            <span class="menu-title">Sumber Dana Belanja Barjas</span>
        </a>    </nav>
</div>
<div class="content-wrapper">
    <h1>Perancanaan Belanja Barang Jasa</h1>
    <p class="card-description text-danger">
        Harap laporkan data selengkap-lengkapnya. alur dana tidak boleh lebih besar ataupun lebih kecil
        dari
        dana yang diberikan.*
    </p>
    <div class="row">
        <form action="{{ route('belanja-barang-jasa.store') }}" method="POST">
            @csrf
            {{-- card pertama --}}
            <div class="col-sm-12 grid-margin stretch-card" id="perjanjian-belanja-barjas">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Perjanjian/Kontrak/SPK</h4>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nomor-spk-barjas">Nomor Surat</label>
                                <input type="number" class="form-control" name="nomor_surat_spk" id="nomor-spk-barjas"
                                placeholder="Akan terisi setelah disetujui oleh admin" disabled>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="jenis-spk-barjas">Jenis Belanja Barang Jasa</label>
                                <input type="text" class="form-control" name="jns_belanja" id="jenis-spk-barjas" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="tanggal-spk-barjas">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_spk" id="tanggal-spk-barjas"
                                    placeholder="DD/MM/YYYY" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- card kedua --}}
            <div class="col-sm-12 grid-margin stretch-card" id="detail-belanja-barjas">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Kontrak</h4>
                        <div class="form-group">
                            <label for="nilai-kedua-barjas" class="col-sm-12 col-form-label">Nilai Kontrak</label>
                            <input type="number" class="form-control" name="nilai_kontrak" id="nilai-kedua-barjas" placeholder="misal. Rp 1.000.000"
                                aria-label="Amount (to the nearest dollar)" required>
                        </div>
                        <div class="form-group">
                            <label for="uraian-pengadaan-barjas" class="col-sm-12 col-form-label">Uraian Pengadaan (Sesuai
                                Kontrak)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="uraian_pengadaan" id="uraian-pengadaan-barjas"
                                    placeholder="Contoh: Pembayaran Belanja barjas Mebel Set 3 Seater" rows="4" required></textarea>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jangka Waktu Kontrak</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nomor-spk-barjas">Nomor</label>
                                    <input type="number" class="form-control" name="nomor_kontrak" id="nomor-spk-barjas"
                                        placeholder="Akan terisi setelah disetujui oleh admin" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="mulai-kontrak-barjas">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai_kontrak"
                                        id="mulai-kontrak-barjas" placeholder="DD/MM/YYYY" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="berakhir-kontrak-barjas">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_berakhir_kontrak"
                                        id="berakhir-kontrak-barjas" placeholder="DD/MM/YYYY" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="jumlah-hari-kontrak-barjas">Jumlah Hari</label>
                                <div class="input-group">
                                    <input type="number" name="jumlah_hari_kontrak" id="jumlah-hari-kontrak-barjas"
                                        class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">HARI</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Adendum Kontrak</h4>
                        <div class="form-group">
                            <label for="nomor-adendum-barjas">Nomor dan Tanggal</label>
                            <input type="text" class="form-control" name="nomor_tgl_adendum" id="nomor-adendum-barjas"
                                placeholder="Akan terisi setelah disetujui oleh admin" disabled>
                        </div>
                        <div class="form-group">
                            <label for="uraian-adendum-barjas" class="col-sm-12 col-form-label">Uraian Adendum (Beserta
                                Nilai)</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="uraian_adendum" id="uraian-adendum-barjas" placeholder="" rows="4" required></textarea>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jangka Waktu Adendum</h4>
                        <div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="mulai-adendum-barjas">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai_adendum"
                                        id="mulai-adendum-barjas" placeholder="DD/MM/YYYY" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="berakhir-adendum-barjas">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_berakhir_adendum"
                                        id="berakhir-adendum-barjas" placeholder="DD/MM/YYYY" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="jumlah-hari-adendum-barjas">Jumlah Hari</label>
                                    <div class="input-group">
                                        <input type="number" name="jumlah_hari_adendum" id="jumlah-hari-adendum-barjas"
                                            class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-primary text-white">HARI</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title" id="jaminan-belanja-barjas">Jaminan Pelaksanaan</h4>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="bentuk-pelaksanaan-barjas">Bentuk</label>
                                <input type="text" class="form-control" name="bentuk_pelaksanaan"
                                    id="jenis-spk-barjas" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="nilai-pelaksanaan-barjas">Nilai</label>
                                <input type="number" class="form-control" name="nilai_pelaksanaan"
                                    id="nilai-pelaksanaan-barjas" placeholder="misal. Rp 1.000.000" aria-label="Amount (to the nearest dollar)" required>
                            </div>
                        </div>
                        <p><b>Masa Berlaku :</b></p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="mulai-pelaksanaan-barjas">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai_pelaksanaan"
                                        id="mulai-pelaksanaan-barjas" placeholder="DD/MM/YYYY" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="berakhir-pelaksanaan-barjas">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_berakhir_pelaksanaan"
                                        id="berakhir-pelaksanaan-barjas" placeholder="DD/MM/YYYY" required>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jaminan pemeliharaan</h4>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="bentuk-pemeliharaan-barjas">Bentuk</label>
                                <input type="text" class="form-control" name="bentuk_pemeliharaan"
                                    id="jenis-spk-barjas" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="nilai-pemeliharaan-barjas">Nilai</label>
                                <input type="number" class="form-control" name="nilai_pemeliharaan"
                                    id="nilai-pemeliharaan-barjas" placeholder="misal. Rp 1.000.000" aria-label="Amount (to the nearest dollar)" required>
                            </div>
                        </div>
                        <p><b>Masa Berlaku :</b></p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="mulai-pemeliharaan-barjas">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai_pemeliharaan"
                                        id="mulai-pemeliharaan-barjas" placeholder="DD/MM/YYYY" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="berakhir-pemeliharaan-barjas">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_selesai_pemeliharaan"
                                        id="berakhir-pemeliharaan-barjas" placeholder="DD/MM/YYYY" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- card ketiga --}}
            <div class="col-sm-12 grid-margin stretch-card" id="dpa-belanja-barjas">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sumber Dana DPA</h4>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nomor-dpa-barjas">Nomor</label>
                                <input type="number" class="form-control" name="nomor_sumber_dpa" id="nomor-dpa-barjas"
                                    placeholder="Akan terisi setelah disetujui oleh admin" disabled>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="tanggal-dpa-barjas">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_sumber_dpa" id="tanggal-dpa-barjas"
                                    placeholder="DD/MM/YYYY" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nilai-dpa-barjas">Nilai</label>
                                <input type="number" class="form-control" name="nilai_sumber_dpa"
                                    id="nilai-dpa-barjas" placeholder="misal. Rp 1.000.000" aria-label="Amount (to the nearest dollar)" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="metode-dpa-barjas">Metode Pengadaan</label>
                                <input type="text" class="form-control" name="metode_pengadaan_dpa"
                                    id="metode-dpa-barjas" required>
                            </div>
                        </div>
                        <div class="form-check form-check-flat form-check-success">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required>
                                Metode LPSE (Layanan Pengadaan Secara Elektronik)
                            </label>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn align-self-center btn-primary mt-2 mb-2">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- end of div.row --}}
    </div>

    <script>
        function calculateDays(startDate, endDate) {
            const start = new Date(startDate);
            const end = new Date(endDate);
            const diffTime = Math.abs(end - start);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            return diffDays;
        }

        document.getElementById('mulai-kontrak-barjas').addEventListener('change', function() {
            const startDate = this.value;
            const endDate = document.getElementById('berakhir-kontrak-barjas').value;
            if (startDate && endDate) {
                const days = calculateDays(startDate, endDate);
                document.getElementById('jumlah-hari-kontrak-barjas').value = days;
            }
        });

        document.getElementById('berakhir-kontrak-barjas').addEventListener('change', function() {
            const startDate = document.getElementById('mulai-kontrak-barjas').value;
            const endDate = this.value;
            if (startDate && endDate) {
                const days = calculateDays(startDate, endDate);
                document.getElementById('jumlah-hari-kontrak-barjas').value = days;
            }
        });

        document.getElementById('mulai-adendum-barjas').addEventListener('change', function() {
            const startDate = this.value;
            const endDate = document.getElementById('berakhir-adendum-barjas').value;
            if (startDate && endDate) {
                const days = calculateDays(startDate, endDate);
                document.getElementById('jumlah-hari-adendum-barjas').value = days;
            }
        });

        document.getElementById('berakhir-adendum-barjas').addEventListener('change', function() {
            const startDate = document.getElementById('mulai-adendum-barjas').value;
            const endDate = this.value;
            if (startDate && endDate) {
                const days = calculateDays(startDate, endDate);
                document.getElementById('jumlah-hari-adendum-barjas').value = days;
            }
        });
    </script>
</div>
@endsection
