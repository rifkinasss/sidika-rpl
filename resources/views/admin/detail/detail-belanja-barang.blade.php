@extends('admin.layouts.app')

@section('content')
    <div class="row">
        {{-- card nama --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengaju</h4>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" value="{{ $barjas->user->nama }}"
                                disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" value="{{ $barjas->user->nip }}"
                                disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="tgl_mengajukan">Waktu Pengajuan</label>
                            <input type="text" class="form-control" id="tgl_mengajukan"
                                value="{{ \Carbon\Carbon::parse($barjas->created_at)->format('(H:i) d M Y') }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- card pertama --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Perjanjian/Kontrak/SPK</h4>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="tanggal-spk-barjas">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-spk-barjas"
                                value="{{ \Carbon\Carbon::parse($barjas->tgl_spk)->format('d M Y') }}" disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="nomor-spk-barjas">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor-spk-barjas" value="{{ $barjas->nomor_surat_spk }}"
                                disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="jenis-spk-barjas">Jenis Belanja Barang Jasa</label>
                            <input type="text" class="form-control" id="jenis-spk-barjas"
                                value="{{ $barjas->jns_belanja }}" disabled>
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
                        <label for="nilai-kedua-barjas" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white">Rp.</span>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text">0.00</span>
                            </div>
                            <input type="text" class="form-control" id="nilai-kedua-barjas"
                                aria-label="Amount (to the nearest dollar)"
                                value="{{ number_format($barjas->nilai_kontrak, 0, ',', '.') }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="uraian-pengadaan-barjas" class="col-sm-3 col-form-label">Uraian Pengadaan (Sesuai
                            Kontrak)</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="uraian-pengadaan-barjas" rows="4" disabled>{{ $barjas->uraian_pengadaan }}</textarea>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Jangka Waktu Kontrak</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nomor-spk-barjas">Nomor</label>
                                <input type="text" class="form-control" id="nomor-spk-barjas"
                                    value="{{ $barjas->nomor_kontrak }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="mulai-kontrak-barjas">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="mulai-kontrak-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_mulai_kontrak)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="berakhir-kontrak-barjas">Tanggal Berakhir</label>
                                <input type="text" class="form-control" id="berakhir-kontrak-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_berakhir_kontrak)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="jumlah-hari-kontrak-barjas">Jumlah Hari</label>
                            <div class="input-group">
                                <input type="text" id="jumlah-hari-kontrak-barjas" class="form-control"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ $barjas->jumlah_hari_kontrak }}" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white">HARI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Adendum Kontrak</h4>
                    <div class="form-group">
                        <label for="nomor-adendum-barjas">Nomor</label>
                        <input type="text" class="form-control" id="nomor-adendum-barjas"
                            value="{{ $barjas->nomor_tgl_adendum }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="uraian-adendum-barjas" class="col-sm-3 col-form-label">Uraian Adendum (Beserta
                            Nilai)</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="uraian-adendum-barjas" rows="4" disabled>{{ $barjas->uraian_adendum }}</textarea>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Jangka Waktu Adendum</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="mulai-adendum-barjas">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="mulai-adendum-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_mulai_adendum)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="berakhir-adendum-barjas">Tanggal Berakhir</label>
                                <input type="text" class="form-control" id="berakhir-adendum-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_berakhir_adendum)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="jumlah-hari-adendum-barjas">Jumlah Hari</label>
                                <div class="input-group">
                                    <input type="text" id="jumlah-hari-adendum-barjas" class="form-control"
                                        aria-label="Amount (to the nearest dollar)"
                                        value="{{ $barjas->jumlah_hari_adendum }}" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">HARI</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Jaminan Pelaksanaan</h4>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="bentuk-pelaksanaan-barjas">Bentuk</label>
                            <input type="text" class="form-control" id="jenis-spk-barjas"
                                value="{{ $barjas->bentuk_pelaksanaan }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nilai-pelaksanaan-barjas">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-pelaksanaan-barjas"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($barjas->nilai_pelaksanaan, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <p><b>Masa Berlaku :</b></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="mulai-pelaksanaan-barjas">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="mulai-pelaksanaan-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_mulai_pelaksanaan)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="berakhir-pelaksanaan-barjas">Tanggal Berakhir</label>
                                <input type="text" class="form-control" id="berakhir-pelaksanaan-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_berakhir_pelaksanaan)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Jaminan pemeliharaan</h4>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="bentuk-pemeliharaan-barjas">Bentuk</label>
                            <input type="text" class="form-control" id="jenis-spk-barjas"
                                value="{{ $barjas->bentuk_pemeliharaan }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nilai-pemeliharaan-barjas">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-pemeliharaan-barjas"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($barjas->nilai_pemeliharaan, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <p><b>Masa Berlaku :</b></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="mulai-pemeliharaan-barjas">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="mulai-pemeliharaan-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_mulai_pemeliharaan)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="berakhir-pemeliharaan-barjas">Tanggal Berakhir</label>
                                <input type="text" class="form-control" id="berakhir-pemeliharaan-barjas"
                                    value="{{ \Carbon\Carbon::parse($barjas->tgl_selesai_pemeliharaan)->format('d M Y') }}"
                                    disabled>
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
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nomor-dpa-barjas">Nomor</label>
                            <input type="text" class="form-control" id="nomor-dpa-barjas"
                                value="{{ $barjas->nomor_sumber_dpa }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="tanggal-dpa-barjas">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-dpa-barjas"
                                value="{{ $barjas->tgl_sumber_dpa }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nilai-dpa-barjas">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-dpa-barjas"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($barjas->nilai_sumber_dpa, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="metode-dpa-barjas">Metode Pengadaan</label>
                            <input type="text" class="form-control" id="metode-dpa-barjas"
                                value="{{ $barjas->metode_pengadaan_dpa }}" disabled>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-between mt-3">
                        <a href="{{ url('/dashboard-admin/verifikasi-belanja-barjas') }}" class="btn btn-secondary mt-2 mb-2">Kembali</a>
                        @if ($barjas->status != 'Disetujui' && $barjas->status != 'Ditolak')
                            <form action="{{ route('verifikasi-belanja-barang-jasa.update', $barjas->id) }}" method="POST">
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
        {{-- end of div.row --}}
    </div>
@endsection
