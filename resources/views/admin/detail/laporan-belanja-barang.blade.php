@extends('admin.layouts.app')

@section('content')
    <div class="row">
        {{-- card pertama --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sistem Pelaporan Monitoring Kontrak (SPMK)</h4>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nomor-spmk-barjas">Nomor</label>
                            <input type="text" class="form-control" id="nomor-spmk-barjas" value="{{ $barjas->nomor_spmk }}"
                                disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="tanggal-spmk-barjas">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-spmk-barjas"
                                value="{{ \Carbon\Carbon::parse($barjas->tgl_spmk)->format('d M Y') }}" disabled>
                        </div>

                    </div>
                    <hr>

                    <h4 class="card-title">Berita Acara Serah Terima (BAST)</h4>
                    <div class="row mb-3">
                        <div class="form-group col-sm-3">
                            <label for="nomor-bast-barjas">Nomor</label>
                            <input type="text" class="form-control" id="nomor-bast-barjas"
                                value="{{ $barjas->nomor_bast }}" disabled>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="tanggal-bast-barjas">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-bast-barjas"
                                value="{{ \Carbon\Carbon::parse($barjas->tgl_bast)->format('d M Y') }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nilai-bast-barjas">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-bast-barjas"
                                    aria-label="Amount (to the nearest dollar)" value="{{ number_format($barjas->nilai_bast, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="mulai-bast-barjas">Tanggal Proses Hasil Operasi (PHO)</label>
                                <input type="text" class="form-control id="mulai-bast-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_pho)->format('d M Y') }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="berakhir-bast-barjas">Tanggal Proses Hasil Operasi (FHO)</label>
                                <input type="text" class="form-control" id="berakhir-bast-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_fho)->format('d M Y') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Surat Perintah Pencairan Dana (SP2D)</h4>
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="nomor-sp2d-barjas">Nomor</label>
                            <input type="text" class="form-control" id="nomor-sp2d-barjas"
                                value="{{ $barjas->nomor_sp2d }}" disabled>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="tanggal-sp2d-barjas">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-sp2d-barjas"
                                value="{{ \Carbon\Carbon::parse($barjas->tgl_sp2d)->format('d M Y') }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nilai-sp2d-barjas">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-sp2d-barjas"
                                    aria-label="Amount (to the nearest dollar)" value="{{ number_format($barjas->nilai_sp2d, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- card kedua presentase input --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <label for="persentase-number-barjas" class="card-title">Persentase Progress</label>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input type="number" class="form-control" name="persentase_progress"
                                    id="persentase-number-barjas" min="0" max="100"
                                    value="{{ $barjas->persentase_progress }}" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-between mt-3">
                        <a href="{{ url('/dashboard-admin/verifikasi-belanja-barang-jasa') }}"
                            class="btn btn-secondary mt-2 mb-2">Kembali</a>
                        @if ($barjas->nomor_spmk == '' && $barjas->nomor_bast == '' && $barjas->nomor_sp2d == '')
                            <form action="{{ route('verifikasi-belanja-barang-jasa.verif', $barjas->id) }}" method="POST">
                                @csrf
                                <div>
                                    <button class="btn btn-primary" type="submit" name="disetujui"><i
                                            class="mdi mdi-check-circle-outline text-white"></i></button>
                                    <button class="btn btn-danger" type="submit" name="ditolak"><i
                                            class="mdi mdi-cancel text-white"></i></button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
