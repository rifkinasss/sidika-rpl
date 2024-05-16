@extends('pegawai.layouts.app')

@section('content')
    <h1>Pelaporan Belanja Modal</h1>
    <h6 style="color: red;" class="mb-4">Harap laporkan data selengkap-lengkapnya.*</h6>
    <div class="row">
        {{-- card pertama --}}
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

        {{-- card kedua presentase input --}}
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
                        <button class="btn btn-light">Batalkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection