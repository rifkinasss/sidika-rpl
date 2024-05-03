@extends('pegawai.layouts.app')

@section('content')
    <h1>Form Perencanaan Perjalanan Dinas</h1>
    <h6 style="color: red;" class="mb-4">Semua data yang diinput dapat menjadi penentu keputusan persetujuan perjalanan
        dinas, harap isi dengan lengkap dan jelas*</h6>
    <div class="row">
        {{-- form kiri atas --}}
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('perjalanan-dinas.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama"
                                    value="{{ Auth::user()->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIP" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="NIP" value="{{ Auth::user()->nip }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keperluan" class="col-sm-3 col-form-label">Keperluan Perjalanan Dinas</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="keperluan" placeholder="Contoh: Kunjungan ke kantor DPRD" rows="4"
                                    name="keperluan_perjadin" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah Dibayarkan</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="jumlah"
                                        aria-label="Amount (to the nearest dollar)" name="jumlah_dibayarkan" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tujuan"
                                    placeholder="Kota, Provinsi, Negara" name="tujuan" required>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        {{-- form kanan atas --}}
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Berangkat</label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" type="date" id="tanggal-berangkat"
                                name="tgl_berangkat" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" type="date" id="tanggal-kembali"
                                name="tgl_kembali" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah-hari" class="col-sm-3 col-form-label">Jumlah Hari</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" id="jumlah-hari" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" placeholder="" name="jumlah_hari" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white">HARI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- form panjang bawah --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Rincian Biaya</h4>
                    <p class="card-description text-danger mb-4">
                        Masukkan nominal tanpa koma (,) format jumlah akan dibuat secara otomatis.*
                    </p>
                    <div class="card bg-secondary p-2 rounded-3">
                        <h5 class="text-white">Uang Harian :</h5>
                        <div class="form-group row">
                            <label for="uang-perhari" class="col-sm-3 col-form-label text-white">Uang Perhari</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="uang-perhari"
                                        aria-label="Amount (to the nearest dollar)" name="uang_harian" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uang-total" class="col-sm-3 col-form-label text-white">Uang Total</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" id="uang-total" class="form-control"
                                        aria-label="Amount (to the nearest dollar)" placeholder="" name="uang_total"
                                        disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-2 bg-transparent">
                        <div class="form-group row">
                            <label for="biaya-akomodasi" class="col-sm-3 col-form-label">Biaya Akomodasi</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-success">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="biaya-akomodasi"
                                        aria-label="Amount (to the nearest dollar)" name="biaya_akomodasi" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biaya-lain" class="col-sm-3 col-form-label">Biaya lain/Kontribusi/Bantuan
                                Transport</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-success">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="biaya-lain"
                                        aria-label="Amount (to the nearest dollar)" name="biaya_lain" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biaya-lain" class="col-sm-3 col-form-label">Biaya Tiket PP</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-success">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="biaya-tiket"
                                        aria-label="Amount (to the nearest dollar)" name="biaya_tiket" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah-biaya" class="col-sm-3 col-form-label">Jumlah Biaya</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-success">Rp.</span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="number" class="form-control" id="jumlah-biaya"
                                        aria-label="Amount (to the nearest dollar)" name="jumlah_biaya" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-check form-check-flat form-check-success">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required>
                                Saya yakin telah mengisi semua data diatas dengan benar
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submit-form-perjadin mt-2 mb-2">Submit</button>
                </div>
            </div>
        </div>
        </form>
    @endsection
