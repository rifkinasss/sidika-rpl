@extends('admin.layouts.app')

@section('content')
    <div class="row">
        {{-- card tabel admin --}}
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Detail Pelaporan Perjalanan Dinas</h4>
                    <div class="row mb-3">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_lengkap"
                                value="{{ $detail_pelaporanperjadin->perjalanandinas->nomor_surat }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_lengkap"
                                value="{{ $detail_pelaporanperjadin->perjalanandinas->user->nama }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_lengkap"
                                value="{{ $detail_pelaporanperjadin->perjalanandinas->user->nip }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keperluan_perjadin" class="col-sm-2 col-form-label">Keperluan Perjalanan Dinas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keperluan_perjadin"
                                value="{{ $detail_pelaporanperjadin->perjalanandinas->keperluan_perjadin }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tujuan"
                                value="{{ $detail_pelaporanperjadin->perjalanandinas->tujuan }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jumlah_hari" class="col-sm-2 col-form-label">Jumlah Hari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah_hari"
                                value="{{ $detail_pelaporanperjadin->perjalanandinas->jumlah_hari }} Hari" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Keberangkatan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ \Carbon\Carbon::parse($detail_pelaporanperjadin->perjalanandinas->tgl_berangkat)->format('d-M-Y') }}"
                                disabled>
                        </div>
                        <div class="col-sm-1"></div>
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Kedatangan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ \Carbon\Carbon::parse($detail_pelaporanperjadin->perjalanandinas->tgl_kembali)->format('d-M-Y') }}"
                                disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Jenis Transportasi</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ $detail_pelaporanperjadin->jns_transportasi_berangkat }}" disabled>
                        </div>
                        <div class="col-sm-1"></div>
                        <label for="tanggal" class="col-sm-2 col-form-label">Jenis Transportasi</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ $detail_pelaporanperjadin->jns_transportasi_kembali }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Nama Transportasi</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ $detail_pelaporanperjadin->nama_transportasi_berangkat }}" disabled>
                        </div>
                        <div class="col-sm-1"></div>
                        <label for="tanggal" class="col-sm-2 col-form-label">Nama Transportasi</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ $detail_pelaporanperjadin->nama_transportasi_kembali }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Nomor Tiket</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ $detail_pelaporanperjadin->nomor_tiket_berangkat }}" disabled>
                        </div>
                        <div class="col-sm-1"></div>
                        <label for="tanggal" class="col-sm-2 col-form-label">Nomor Tiket</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ $detail_pelaporanperjadin->nomor_tiket_kembali }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Nomor Kursi</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ $detail_pelaporanperjadin->nomor_kursi_berangkat }}" disabled>
                        </div>
                        <div class="col-sm-1"></div>
                        <label for="tanggal" class="col-sm-2 col-form-label">Nomor Kursi</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tanggal"
                                value="{{ $detail_pelaporanperjadin->nomor_kursi_kembali }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="uang_perhari"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($detail_pelaporanperjadin->harga_berangkat, 2, ',', '.') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                        <label for="tanggal" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="uang_perhari"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($detail_pelaporanperjadin->harga_kembali, 2, ',', '.') }}"
                                    disabled>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-between mt-5">
                        <div>
                            <a href="{{ route('verifikasi-pelaporan-perjadin.index') }}" role="button"
                                class="btn btn-secondary">Kembali</a>
                        </div>
                        @if ($detail_pelaporanperjadin->status != 'Disetujui' && $detail_pelaporanperjadin->status != 'Ditolak')
                            <form
                                action="{{ route('verifikasi-pelaporan-perjadin.update', $detail_pelaporanperjadin->id) }}"
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
