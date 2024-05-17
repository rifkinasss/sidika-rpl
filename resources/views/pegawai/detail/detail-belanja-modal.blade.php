@extends('pegawai.layouts.app')

@section('content')
    <div class="row">

        {{-- card pertama --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Perjanjian/Kontrak/SPK</h4>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="tanggal-spk-modal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-spk-modal"
                                value="{{ \Carbon\Carbon::parse($barmod->tgl_spk)->format('d M Y') }}" disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="nomor-spk-modal">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor-spk-modal"
                                value="{{ $barmod->nomor_surat_spk }}" disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="jenis-spk-modal">Jenis Belanja Modal</label>
                            <input type="text" class="form-control" id="jenis-spk-modal"
                                value="{{ $barmod->jns_belanja }}" disabled>
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
                            <input type="text" class="form-control" id="nilai-kedua-modal"
                                aria-label="Amount (to the nearest dollar)"
                                value="{{ number_format($barmod->nilai_kontrak, 0, ',', '.') }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="uraian-pengadaan-modal" class="col-sm-3 col-form-label">Uraian Pengadaan (Sesuai
                            Kontrak)</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="uraian-pengadaan-modal" rows="4" disabled>{{ $barmod->uraian_pengadaan }}</textarea>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Jangka Waktu Kontrak</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nomor-spk-modal">Nomor</label>
                                <input type="text" class="form-control" id="nomor-spk-modal"
                                    value="{{ $barmod->nomor_kontrak }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="mulai-kontrak-modal">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="mulai-kontrak-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_mulai_kontrak)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="berakhir-kontrak-modal">Tanggal Berakhir</label>
                                <input type="text" class="form-control" id="berakhir-kontrak-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_berakhir_kontrak)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="jumlah-hari-kontrak-modal">Jumlah Hari</label>
                            <div class="input-group">
                                <input type="text" id="jumlah-hari-kontrak-modal" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" value="{{ $barmod->jumlah_hari_kontrak }}"
                                    disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white">HARI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Adendum Kontrak</h4>
                    <div class="form-group">
                        <label for="nomor-adendum-modal">Nomor</label>
                        <input type="text" class="form-control" id="nomor-adendum-modal"
                            value="{{ $barmod->nomor_tgl_adendum }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="uraian-adendum-modal" class="col-sm-3 col-form-label">Uraian Adendum (Beserta
                            Nilai)</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="uraian-adendum-modal" rows="4" disabled>{{ $barmod->uraian_adendum }}</textarea>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Jangka Waktu Adendum</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="mulai-adendum-modal">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="mulai-adendum-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_mulai_adendum)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="berakhir-adendum-modal">Tanggal Berakhir</label>
                                <input type="text" class="form-control" id="berakhir-adendum-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_berakhir_adendum)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="jumlah-hari-adendum-modal">Jumlah Hari</label>
                                <div class="input-group">
                                    <input type="text" id="jumlah-hari-adendum-modal" class="form-control"
                                        aria-label="Amount (to the nearest dollar)"
                                        value="{{ $barmod->jumlah_hari_adendum }}" disabled>
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
                            <label for="bentuk-pelaksanaan-modal">Bentuk</label>
                            <input type="text" class="form-control" id="jenis-spk-modal"
                                value="{{ $barmod->bentuk_pelaksanaan }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nilai-pelaksanaan-modal">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-pelaksanaan-modal"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($barmod->nilai_pelaksanaan, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <p><b>Masa Berlaku :</b></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="mulai-pelaksanaan-modal">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="mulai-pelaksanaan-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_mulai_pelaksanaan)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="berakhir-pelaksanaan-modal">Tanggal Berakhir</label>
                                <input type="text" class="form-control" id="berakhir-pelaksanaan-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_berakhir_pelaksanaan)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="card-title">Jaminan pemeliharaan</h4>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="bentuk-pemeliharaan-modal">Bentuk</label>
                            <input type="text" class="form-control" id="jenis-spk-modal"
                                value="{{ $barmod->bentuk_pemeliharaan }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nilai-pemeliharaan-modal">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-pemeliharaan-modal"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($barmod->nilai_pemeliharaan, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <p><b>Masa Berlaku :</b></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="mulai-pemeliharaan-modal">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="mulai-pemeliharaan-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_mulai_pemeliharaan)->format('d M Y') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="berakhir-pemeliharaan-modal">Tanggal Berakhir</label>
                                <input type="text" class="form-control" id="berakhir-pemeliharaan-modal"
                                    value="{{ \Carbon\Carbon::parse($barmod->tgl_selesai_pemeliharaan)->format('d M Y') }}"
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
                            <label for="nomor-dpa-modal">Nomor</label>
                            <input type="text" class="form-control" id="nomor-dpa-modal"
                                value="{{ $barmod->nomor_sumber_dpa }}" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="tanggal-dpa-modal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal-dpa-modal"
                                value="{{ $barmod->tgl_sumber_dpa }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nilai-dpa-modal">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">Rp.</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" class="form-control" id="nilai-dpa-modal"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ number_format($barmod->nilai_sumber_dpa, 0, ',', '.') }}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="metode-dpa-modal">Metode Pengadaan</label>
                            <input type="text" class="form-control" id="metode-dpa-modal"
                                value="{{ $barmod->metode_pengadaan_dpa }}" disabled>
                        </div>
                    </div>
                    <a href="{{ route('pegawai') }}" type="submit" class="btn btn-secondary mt-4 mb-2">Kembali</a>
                </div>
            </div>
        </div>
        {{-- end of div.row --}}
    </div>
@endsection
