@extends('pegawai.layouts.app')

@section('content')
    <h1>Perancanaan Belanja Modal</h1>
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
                            <label for="tanggal-spk-modal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-spk-modal" placeholder="DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <label for="nomor-spk-modal">Nomor Surat</label>
                            <input type="number" class="form-control" id="nomor-spk-modal" placeholder="123.." disabled>
                        </div>
                        <div class="form-group">
                            <label for="jenis-spk-modal">Jenis Belanja Modal</label>
                            <input type="text" class="form-control" id="jenis-spk-modal" placeholder="belanja modal..">
                        </div>
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
                            <label for="nilai-kedua-modal" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-kedua-modal"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uraian-pengadaan-modal" class="col-sm-3 col-form-label">Uraian Pengadaan (Sesuai
                                Kontrak)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="uraian-pengadaan-modal"
                                    placeholder="misal. Pembayaran Belanja Modal Mebel Set 3 Seater" rows="4"></textarea>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jangka Waktu Kontrak</h4>
                        <div class="form-group">
                            <label for="nomor-spk-modal">Nomor</label>
                            <input type="number" class="form-control" id="nomor-spk-modal" placeholder="123.." disabled>
                        </div>
                        <div class="form-group">
                            <label for="jumlah-hari-kontrak-modal" class="col-sm-3 col-form-label">Jumlah Hari</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" id="jumlah-hari-kontrak-modal" class="form-control"
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
                                    <label for="mulai-kontrak-modal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="mulai-kontrak-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-kontrak-modal">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="berakhir-kontrak-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Adendum Kontrak</h4>
                        <div class="form-group">
                            <label for="nomor-adendum-modal">Nomor dan Tanggal</label>
                            <input type="text" class="form-control" id="nomor-adendum-modal"
                                placeholder="misal. 420/1058/SKT.DISDIKBUD" disabled>
                        </div>
                        <div class="form-group">
                            <label for="uraian-adendum-modal" class="col-sm-3 col-form-label">Uraian Adendum (Beserta
                                Nilai)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="uraian-adendum-modal"
                                    placeholder="misal. Pembayaran Belanja Modal Mebel Set 3 Seater" rows="4"></textarea>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jangka Waktu Adendum</h4>
                        <div class="form-group">
                            <label for="jumlah-hari-adendum-modal" class="col-sm-3 col-form-label">Jumlah Hari</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" id="jumlah-hari-adendum-modal" class="form-control"
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
                                    <label for="mulai-adendum-modal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="mulai-adendum-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-adendum-modal">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="berakhir-adendum-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jaminan Pelaksanaan</h4>
                        <div class="form-group">
                            <label for="bentuk-pelaksanaan-modal">Bentuk</label>
                            <input type="text" class="form-control" id="jenis-spk-modal">
                        </div>
                        <div class="form-group">
                            <label for="nilai-pelaksanaan-modal" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-pelaksanaan-modal"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <p>Masa Berlaku :</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-pelaksanaan-modal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="mulai-pelaksanaan-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-pelaksanaan-modal">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="berakhir-pelaksanaan-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jaminan pemeliharaan</h4>
                        <div class="form-group">
                            <label for="bentuk-pemeliharaan-modal">Bentuk</label>
                            <input type="text" class="form-control" id="jenis-spk-modal">
                        </div>
                        <div class="form-group">
                            <label for="nilai-pemeliharaan-modal" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-pemeliharaan-modal"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <p>Masa Berlaku :</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-pemeliharaan-modal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="mulai-pemeliharaan-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-pemeliharaan-modal">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="berakhir-pemeliharaan-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
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
                            <label for="nomor-dpa-modal">Nomor</label>
                            <input type="number" class="form-control" id="nomor-dpa-modal"
                                placeholder=" misal. DPPA/B.1/1.01.2.22.0.00.01.0000/001/2023" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal-dpa-modal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-dpa-modal" placeholder="DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <label for="nilai-dpa-modal" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-dpa-modal"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metode-dpa-modal">Metode Pengadaan</label>
                            <input type="text" class="form-control" id="metode-dpa-modal">
                        </div>
                        <div class="form-check form-check-flat form-check-success">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Metode LPSE (Layanan Pengadaan Secara Elektronik)
                            </label>
                        </div>
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
                            <label for="nomor-spmk-modal">Nomor</label>
                            <input type="number" class="form-control" id="nomor-spmk-modal"
                                placeholder=" misal. 16.09/03.0/005830/LS/1.01.2.22.0.00.01.0000/P.04/12/2023" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal-spmk-modal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-spmk-modal" placeholder="DD/MM/YYYY">
                        </div>
                        <hr>

                        <h4 class="card-title">Berita Acara Serah Terima (BAST)</h4>
                        <div class="form-group">
                            <label for="nomor-bast-modal">Nomor</label>
                            <input type="number" class="form-control" id="nomor-bast-modal"
                                placeholder=" misal.  420/1302/SKT.DISDIKBUD" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal-bast-modal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-bast-modal" placeholder="DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <label for="nilai-bast-modal" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-bast-modal"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-bast-modal">Tanggal Proses Hasil Operasi</label>
                                    <input type="date" class="form-control" id="mulai-bast-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-bast-modal">Tanggal Proses Hasil Operasi</label>
                                    <input type="date" class="form-control" id="berakhir-bast-modal"
                                        placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Surat Perintah Pencairan Dana (SP2D)</h4>
                        <div class="form-group">
                            <label for="tanggal-sp2d-modal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-sp2d-modal" placeholder="DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <label for="nomor-sp2d-modal">Nomor</label>
                            <input type="number" class="form-control" id="nomor-sp2d-modal"
                                placeholder=" misal.  16.09/04.0/005450/LS/1.01.2.22.0.00.01.0000/P.04/12/2023" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nilai-sp2d-modal" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="nilai-sp2d-modal"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- card kelima presentase input --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <label for="persentase-number-modal" class="card-title">Persentase Progress</label>
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="range" class="form-range" id="persentase-range-modal" min="0"
                                    max="100">
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="persentase-number-modal"
                                        min="0" max="100">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 mb-2">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- end of div.row --}}
    </div>

    {{-- JS function for range --}}
    <script>
        document.getElementById('persentase-number-modal').addEventListener('input', function() {
            let value = parseInt(this.value, 10);
            if (value < 0) value = 0;
            if (value > 100) value = 100;

            document.getElementById('persentase-range-modal').value = value;
        });

        document.getElementById('persentase-range-modal').addEventListener('input', function() {
            document.getElementById('persentase-number-modal').value = this.value;
        });
    </script>
@endsection
