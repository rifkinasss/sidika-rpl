@extends('pegawai.layouts.app')

@section('content')
    <h1>Pelaporan Belanja Modal</h1>
    <h6 style="color: red;" class="mb-4">Harap laporkan data selengkap-lengkapnya.*</h6>
    <div class="row">
        <form action="{{ route('belanja-modal.update', $barmod->id) }}" method="POST">
            @method('PUT')
            @csrf
            {{-- card pertama --}}
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sistem Pelaporan Monitoring Kontrak (SPMK)</h4>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="nomor-spmk-modal">Nomor</label>
                                <input type="text" class="form-control" name="nomor_spmk" id="nomor-spmk-modal"
                                    value="{{ $barmod->nomor_spmk }}" disabled>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="tanggal-spmk-modal">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_spmk" id="tanggal-spmk-modal"
                                    placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_spmk ?? '' }}"
                                    {{ $barmod->tgl_spmk ? 'disabled' : '' }}>
                            </div>

                        </div>
                        <hr>

                        <h4 class="card-title">Berita Acara Serah Terima (BAST)</h4>
                        <div class="row mb-3">
                            <div class="form-group col-sm-3">
                                <label for="nomor-bast-modal">Nomor</label>
                                <input type="text" class="form-control" name="nomor_bast" id="nomor-bast-modal"
                                    value="{{ $barmod->nomor_bast }}" disabled>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="tanggal-bast-modal">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_bast" id="tanggal-bast-modal"
                                    placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_bast ?? '' }}"
                                    {{ $barmod->tgl_bast ? 'disabled' : '' }}>
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
                                    <input type="number" class="form-control" name="nilai_bast" id="nilai-bast-modal"
                                        aria-label="Amount (to the nearest dollar)" value="{{ $barmod->nilai_bast ?? '' }}"
                                        {{ $barmod->nilai_bast ? 'disabled' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mulai-bast-modal">Tanggal Proses Hasil Operasi (PHO)</label>
                                    <input type="date" class="form-control" name="tgl_pho" id="mulai-bast-modal"
                                        placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_pho ?? '' }}"
                                        {{ $barmod->tgl_pho ? 'disabled' : '' }}>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berakhir-bast-modal">Tanggal Proses Hasil Operasi (FHO)</label>
                                    <input type="date" class="form-control" name="tgl_fho" id="berakhir-bast-modal"
                                        placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_fho ?? '' }}"
                                        {{ $barmod->tgl_fho ? 'disabled' : '' }}>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title">Surat Perintah Pencairan Dana (SP2D)</h4>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="nomor-sp2d-modal">Nomor</label>
                                <input type="text" class="form-control" name="nomor_sp2d" id="nomor-sp2d-modal"
                                    value="{{ $barmod->nomor_sp2d }}" disabled>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="tanggal-sp2d-modal">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_sp2d" id="tanggal-sp2d-modal"
                                    placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_sp2d ?? '' }}"
                                    {{ $barmod->tgl_sp2d ? 'disabled' : '' }}>
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
                                    <input type="number" class="form-control" name="nilai_sp2d" id="nilai-sp2d-modal"
                                        aria-label="Amount (to the nearest dollar)"
                                        value="{{ $barmod->nilai_sp2d ?? '' }}"
                                        {{ $barmod->nilai_sp2d ? 'disabled' : '' }}>
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
                            <div class="col-sm-10">
                                <input type="range" class="form-range" id="persentase-range-modal" min="0"
                                    max="100">
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="persentase_progress"
                                        id="persentase-number-modal" min="0" max="100"
                                        value="{{ $barmod->persentase_progress }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($barmod->persentase_progress != '100')
                            <button type="submit" class="btn btn-primary mt-2 mb-2">Submit</button>
                            <a href="{{ route('pegawai') }}" class="btn btn-light">Kembali</a>
                        @else
                            <a href="{{ route('pegawai') }}" class="btn btn-secondary mt-5">Kembali</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
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
