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
                            <label for="nomor-spmk-modal">Nomor</label>
                            <input type="text" class="form-control" id="nomor-spmk-modal" value="{{ $barmod->nomor_spmk }}"
                                disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="tanggal-spmk-modal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-spmk-modal"
                                value="{{ \Carbon\Carbon::parse($barmod->tgl_spmk)->format('d M Y') }}" disabled>
                        </div>

                    </div>
                    <hr>

                    <h4 class="card-title">Berita Acara Serah Terima (BAST)</h4>
                    <div class="row mb-3">
                        <div class="form-group col-sm-3">
                            <label for="nomor-bast-modal">Nomor</label>
                            <input type="text" class="form-control" id="nomor-bast-modal"
                                value="{{ $barmod->nomor_bast }}" disabled>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="tanggal-bast-modal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-bast-modal"
                                value="{{ \Carbon\Carbon::parse($barmod->tgl_bast)->format('d M Y') }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nilai-bast-modal">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-bast-modal"
                                    aria-label="Amount (to the nearest dollar)" value="{{ number_format($barmod->nilai_bast, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="mulai-bast-modal">Tanggal Proses Hasil Operasi (PHO)</label>
                                <input type="text" class="form-control id="mulai-bast-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_pho)->format('d M Y') }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="berakhir-bast-modal">Tanggal Proses Hasil Operasi (FHO)</label>
                                <input type="text" class="form-control" id="berakhir-bast-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_fho)->format('d M Y') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Surat Perintah Pencairan Dana (SP2D)</h4>
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="nomor-sp2d-modal">Nomor</label>
                            <input type="text" class="form-control" id="nomor-sp2d-modal"
                                value="{{ $barmod->nomor_sp2d }}" disabled>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="tanggal-sp2d-modal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-sp2d-modal"
                                value="{{ \Carbon\Carbon::parse($barmod->tgl_sp2d)->format('d M Y') }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nilai-sp2d-modal">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-sp2d-modal"
                                    aria-label="Amount (to the nearest dollar)" value="{{ number_format($barmod->nilai_sp2d, 0, ',', '.') }}" disabled>
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
                    <label for="persentase-number-modal" class="card-title">Persentase Progress</label>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input type="number" class="form-control" name="persentase_progress"
                                    id="persentase-number-modal" min="0" max="100"
                                    value="{{ $barmod->persentase_progress }}" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-between mt-3">
                        <a href="{{ url('/dashboard-admin/verifikasi-belanja-modal') }}"
                            class="btn btn-secondary mt-2 mb-2">Kembali</a>
                        @if ($barmod->nomor_spmk == '' && $barmod->nomor_bast == '' && $barmod->nomor_sp2d == '')
                            <form action="{{ route('verifikasi-belanja-modal.verif', $barmod->id) }}" method="POST">
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
