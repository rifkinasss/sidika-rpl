@extends('pegawai.layouts.app')

@section('content')
    <h1>Perancanaan Belanja Barang Jasa</h1>
    <div class="row">
        {{-- card pertama --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Perjanjian/Kontrak/SPK</h4>
                    <p class="card-description text-danger">
                        Harap laporkan data selengkap-lengkapnya. alur dana tidak boleh lebih besar ataupun lebih kecil dari
                        dana yang diberikan.*
                    </p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="tanggal-spk-barjas">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-spk-barjas" placeholder="DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <label for="nomor-spk-barjas">Nomor Surat</label>
                            <input type="number" class="form-control" id="nomor-spk-barjas" placeholder="123.." disabled>
                        </div>
                        <div class="form-group">
                            <label for="jenis-spk-barjas">Jenis Belanja Barang Jasa</label>
                            <input type="text" class="form-control" id="jenis-spk-barjas" placeholder="belanja Barang..">
                        </div>
                        <button type="submit" class="btn btn-info mt-2 mb-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- card kedua --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <h4 class="card-title">Detail Kontrak</h4>
                        <div class="form-group">
                            <label for="nilai-kedua-barjas" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-kedua-barjas"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uraian-pengadaan-barjas" class="col-sm-3 col-form-label">Uraian Pengadaan (Sesuai
                                Kontrak)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="uraian-pengadaan-barjas"
                                    placeholder="misal. Pembayaran Belanja Barang Mebel Set 3 Seater" rows="4"></textarea>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jangka Waktu Kontrak</h4>
                        <div class="form-group">
                            <label for="nomor-spk-barjas">Nomor</label>
                            <input type="number" class="form-control" id="nomor-spk-barjas" placeholder="123.." disabled>
                        </div>
                        <div class="form-group">
                            <label for="jumlah-hari-kontrak-barjas" class="col-sm-3 col-form-label">Jumlah Hari</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" id="jumlah-hari-kontrak-barjas" class="form-control"
                                        aria-label="Amount (to the nearest dollar)" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">HARI</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-kontrak-barjas">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="mulai-kontrak-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-kontrak-barjas">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="berakhir-kontrak-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Adendum Kontrak</h4>
                        <div class="form-group">
                            <label for="nomor-adendum-barjas">Nomor dan Tanggal</label>
                            <input type="text" class="form-control" id="nomor-adendum-barjas"
                                placeholder="misal. 420/1058/SKT.DISDIKBUD" disabled>
                        </div>
                        <div class="form-group">
                            <label for="uraian-adendum-barjas" class="col-sm-3 col-form-label">Uraian Adendum (Beserta
                                Nilai)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="uraian-adendum-barjas"
                                    placeholder="misal. Pembayaran Belanja Barang Mebel Set 3 Seater" rows="4"></textarea>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jangka Waktu Adendum</h4>
                        <div class="form-group">
                            <label for="jumlah-hari-adendum-barjas" class="col-sm-3 col-form-label">Jumlah Hari</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" id="jumlah-hari-adendum-barjas" class="form-control"
                                        aria-label="Amount (to the nearest dollar)" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">HARI</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-adendum-barjas">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="mulai-adendum-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-adendum-barjas">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="berakhir-adendum-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jaminan Pelaksanaan</h4>
                        <div class="form-group">
                            <label for="bentuk-pelaksanaan-barjas">Bentuk</label>
                            <input type="text" class="form-control" id="jenis-spk-barjas">
                        </div>
                        <div class="form-group">
                            <label for="nilai-pelaksanaan-barjas" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-pelaksanaan-barjas"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <p>Masa Berlaku :</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-pelaksanaan-barjas">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="mulai-pelaksanaan-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-pelaksanaan-barjas">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="berakhir-pelaksanaan-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jaminan pemeliharaan</h4>
                        <div class="form-group">
                            <label for="bentuk-pemeliharaan-barjas">Bentuk</label>
                            <input type="text" class="form-control" id="jenis-spk-barjas">
                        </div>
                        <div class="form-group">
                            <label for="nilai-pemeliharaan-barjas" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-pemeliharaan-barjas"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <p>Masa Berlaku :</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-pemeliharaan-barjas">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="mulai-pemeliharaan-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-pemeliharaan-barjas">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="berakhir-pemeliharaan-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info mt-2 mb-2">Simpan</button>

                    </form>
                </div>
            </div>
        </div>

        {{-- card ketiga --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sumber Dana DPA</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="nomor-dpa-barjas">Nomor</label>
                            <input type="number" class="form-control" id="nomor-dpa-barjas"
                                placeholder=" misal. DPPA/B.1/1.01.2.22.0.00.01.0000/001/2023" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal-dpa-barjas">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-dpa-barjas" placeholder="DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <label for="nilai-dpa-barjas" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-dpa-barjas"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metode-dpa-barjas">Metode Pengadaan</label>
                            <input type="text" class="form-control" id="metode-dpa-barjas">
                        </div>
                        <div class="form-check form-check-flat form-check-success">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Metode LPSE (Layanan Pengadaan Secara Elektronik)
                            </label>
                        </div>
                        <button type="submit" class="btn btn-info mt-2 mb-2">Simpan</button>

                    </form>
                </div>
            </div>
        </div>

        {{-- card keempat --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sistem Pelaporan Monitoring Kontrak (SPMK)</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="nomor-spmk-barjas">Nomor</label>
                            <input type="number" class="form-control" id="nomor-spmk-barjas"
                                placeholder=" misal. 16.09/03.0/005830/LS/1.01.2.22.0.00.01.0000/P.04/12/2023" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal-spmk-barjas">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-spmk-barjas"
                                placeholder="DD/MM/YYYY">
                        </div>
                        <hr>

                        <h4 class="card-title">Berita Acara Serah Terima (BAST)</h4>
                        <div class="form-group">
                            <label for="nomor-bast-barjas">Nomor</label>
                            <input type="number" class="form-control" id="nomor-bast-barjas"
                                placeholder=" misal.  420/1302/SKT.DISDIKBUD" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal-bast-barjas">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-bast-barjas"
                                placeholder="DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <label for="nilai-bast-barjas" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-bast-barjas"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-bast-barjas">Tanggal Proses Hasil Operasi</label>
                                    <input type="date" class="form-control" id="mulai-bast-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-bast-barjas">Tanggal Proses Hasil Operasi</label>
                                    <input type="date" class="form-control" id="berakhir-bast-barjas"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Surat Perintah Pencairan Dana (SP2D)</h4>
                        <div class="form-group">
                            <label for="tanggal-sp2d-barjas">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-sp2d-barjas"
                                placeholder="DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <label for="nomor-sp2d-barjas">Nomor</label>
                            <input type="number" class="form-control" id="nomor-sp2d-barjas"
                                placeholder=" misal.  16.09/04.0/005450/LS/1.01.2.22.0.00.01.0000/P.04/12/2023" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nilai-sp2d-barjas" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-sp2d-barjas"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info mt-2 mb-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- card kelima presentase input --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <label for="persentase-number-barjas" class="card-title">Persentase Progress</label>
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="range" class="form-range" id="persentase-range-barjas" min="0"
                                    max="100">
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="persentase-number-barjas"
                                        min="0" max="100">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 mb-2">Kirim</button>
                        <button class="btn btn-light">Batalkan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- end of div.row --}}
    </div>

    {{-- JS function for range --}}
    <script>
        document.getElementById('persentase-number-barjas').addEventListener('input', function() {
            let value = parseInt(this.value, 10);
            if (value < 0) value = 0;
            if (value > 100) value = 100;

            document.getElementById('persentase-range-barjas').value = value;
        });

        document.getElementById('persentase-range-barjas').addEventListener('input', function() {
            document.getElementById('persentase-number-barjas').value = this.value;
        });
    </script>
@endsection
