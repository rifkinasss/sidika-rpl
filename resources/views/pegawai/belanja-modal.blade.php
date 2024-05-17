@extends('pegawai.layouts.app')

@section('content')
    <h1>Perancanaan Belanja Modal</h1>
    <div class="row">
        <form action="{{ route('belanja-modal.store') }}" method="POST">
            @csrf
            {{-- card pertama --}}
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Perjanjian/Kontrak/SPK</h4>
                        <p class="card-description text-danger">
                            Harap laporkan data selengkap-lengkapnya. alur dana tidak boleh lebih besar ataupun lebih kecil
                            dari
                            dana yang diberikan.*
                        </p>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="tanggal-spk-modal">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_spk" id="tanggal-spk-modal"
                                    placeholder="DD/MM/YYYY">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="nomor-spk-modal">Nomor Surat</label>
                                <input type="number" class="form-control" name="nomor_surat_spk" id="nomor-spk-modal"
                                    placeholder="" disabled>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="jenis-spk-modal">Jenis Belanja Modal</label>
                                <input type="text" class="form-control" name="jns_belanja" id="jenis-spk-modal">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- card kedua --}}
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Kontrak</h4>
                        <div class="form-group">
                            <label for="nilai-kedua-modal" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="number" class="form-control" name="nilai_kontrak" id="nilai-kedua-modal"
                                    aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uraian-pengadaan-modal" class="col-sm-3 col-form-label">Uraian Pengadaan (Sesuai
                                Kontrak)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="uraian_pengadaan" id="uraian-pengadaan-modal" rows="4"></textarea>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jangka Waktu Kontrak</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nomor-spk-modal">Nomor</label>
                                    <input type="number" class="form-control" name="nomor_kontrak" id="nomor-spk-modal"
                                        placeholder="123.." disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="mulai-kontrak-modal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai_kontrak"
                                        id="mulai-kontrak-modal" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="berakhir-kontrak-modal">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_berakhir_kontrak"
                                        id="berakhir-kontrak-modal" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah-hari-kontrak-modal">Jumlah Hari</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_hari_kontrak" id="jumlah-hari-kontrak-modal"
                                    class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white">HARI</span>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Adendum Kontrak</h4>
                        <div class="form-group">
                            <label for="nomor-adendum-modal">Nomor dan Tanggal</label>
                            <input type="text" class="form-control" name="nomor_tgl_adendum" id="nomor-adendum-modal"
                                placeholder="misal. 420/1058/SKT.DISDIKBUD" disabled>
                        </div>
                        <div class="form-group">
                            <label for="uraian-adendum-modal" class="col-sm-3 col-form-label">Uraian Adendum (Beserta
                                Nilai)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="uraian_adendum" id="uraian-adendum-modal"
                                    placeholder="misal. Pembayaran Belanja Modal Mebel Set 3 Seater" rows="4"></textarea>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jangka Waktu Adendum</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-adendum-modal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai_adendum"
                                        id="mulai-adendum-modal" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-adendum-modal">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_berakhir_adendum"
                                        id="berakhir-adendum-modal" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah-hari-adendum-modal" class="col-sm-3 col-form-label">Jumlah Hari</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" name="jumlah_hari_adendum" id="jumlah-hari-adendum-modal"
                                        class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">HARI</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jaminan Pelaksanaan</h4>
                        <div class="form-group">
                            <label for="bentuk-pelaksanaan-modal">Bentuk</label>
                            <input type="text" class="form-control" name="bentuk_pelaksanaan" id="jenis-spk-modal">
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
                                    <input type="number" class="form-control" name="nilai_pelaksanaan"
                                        id="nilai-pelaksanaan-modal" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <p>Masa Berlaku :</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-pelaksanaan-modal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai_pelaksanaan"
                                        id="mulai-pelaksanaan-modal" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-pelaksanaan-modal">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_berakhir_pelaksanaan"
                                        id="berakhir-pelaksanaan-modal" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Jaminan pemeliharaan</h4>
                        <div class="form-group">
                            <label for="bentuk-pemeliharaan-modal">Bentuk</label>
                            <input type="text" class="form-control" name="bentuk_pemeliharaan" id="jenis-spk-modal">
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
                                    <input type="number" class="form-control" name="nilai_pemeliharaan"
                                        id="nilai-pemeliharaan-modal" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <p>Masa Berlaku :</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-pemeliharaan-modal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai_pemeliharaan"
                                        id="mulai-pemeliharaan-modal" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-pemeliharaan-modal">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_selesai_pemeliharaan"
                                        id="berakhir-pemeliharaan-modal" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- card ketiga --}}
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sumber Dana DPA</h4>
                        <div class="form-group">
                            <label for="nomor-dpa-modal">Nomor</label>
                            <input type="number" class="form-control" name="nomor_sumber_dpa" id="nomor-dpa-modal"
                                placeholder=" misal. DPPA/B.1/1.01.2.22.0.00.01.0000/001/2023" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal-dpa-modal">Tanggal</label>
                            <input type="date" class="form-control" name="tgl_sumber_dpa" id="tanggal-dpa-modal"
                                placeholder="DD/MM/YYYY">
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
                                    <input type="number" class="form-control" name="nilai_sumber_dpa"
                                        id="nilai-dpa-modal" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metode-dpa-modal">Metode Pengadaan</label>
                            <input type="text" class="form-control" name="metode_pengadaan_dpa"
                                id="metode-dpa-modal">
                        </div>
                        <div class="form-check form-check-flat form-check-success">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required>
                                Metode LPSE (Layanan Pengadaan Secara Elektronik)
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 mb-2">Submit</button>
                    </div>
                </div>
            </div>
        </form>
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
