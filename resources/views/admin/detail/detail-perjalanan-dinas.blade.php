@extends('admin.layouts.app')

@section('content')
    <div class="row">
        {{-- card tabel admin --}}
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Detail Pengajuan Perjalanan Dinas</h4>
                    <div class="row mb-3">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_lengkap"
                                value="{{ $detail_perjalanandinas->nama }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keperluan_perjadin" class="col-sm-2 col-form-label">Keperluan Perjalanan Dinas</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="keperluan_perjadin" rows="3" disabled>{{ $detail_perjalanandinas->keperluan_perjadin }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Jumlah Dibayarkan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="jumlah"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($detail_perjalanandinas->jumlah_dibayarkan, 2, ',', '.') }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tujuan"
                                value="{{ $detail_perjalanandinas->tujuan }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Keberangkatan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ \Carbon\Carbon::parse($detail_perjalanandinas->tgl_berangkat)->format('d-M-Y') }}"
                                disabled>
                        </div>
                        <div class="col-sm-1"></div>
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Kedatangan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ \Carbon\Carbon::parse($detail_perjalanandinas->tgl_kembali)->format('d-M-Y') }}"
                                disabled>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label for="jumlah_hari" class="col-sm-2 col-form-label">Jumlah Hari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah_hari"
                                value="{{ $detail_perjalanandinas->jumlah_hari }} Hari" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="uang_perhari" class="col-sm-2 col-form-label">Uang Perhari</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="uang_perhari"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($detail_perjalanandinas->uang_harian, 2, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label for="total_uang_perhari" class="col-sm-2 col-form-label">Total Uang Perhari</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="total_uang_perhari"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($detail_perjalanandinas->uang_total, 2, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="biaya_akomodasi" class="col-sm-2 col-form-label">Biaya Akomodasi</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="biaya_akomodasi"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($detail_perjalanandinas->biaya_akomodasi, 2, ',', '.') }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="biaya_lain" class="col-sm-2 col-form-label">Biaya
                            lain/Kontribusi/<br>Bantuan/Transport</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="biaya_lain"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($detail_perjalanandinas->biaya_lain, 2, ',', '.') }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jumlah_biaya" class="col-sm-2 col-form-label">Jumlah Biaya</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="jumlah_biaya"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($detail_perjalanandinas->jumlah_biaya, 2, ',', '.') }}"
                                    disabled>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-between mt-5">
                        <div>
                            <a href="{{ route('verifikasi-perjalanan-dinas.index') }}" role="button"
                                class="btn btn-secondary">Kembali</a>
                        </div>
                        @if ($detail_perjalanandinas->status != 'Disetujui' && $detail_perjalanandinas->status != 'Ditolak')
                            <form action="{{ route('verifikasi-perjalanan-dinas.update', $detail_perjalanandinas->id) }}"
                                method="POST">
                                @method('PUT')
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
