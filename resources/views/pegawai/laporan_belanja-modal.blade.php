@extends('pegawai.layouts.app')

@section('content')
<style>
    /* Custom CSS for sidebar */
    .sidebar {
        height: calc(100vh - 159px);
        position: fixed;
        left: 0;
        top: 159px;
        background-color: #ffffff;
        width: 250px;
        padding-top: 20px;
    }

    .sidebar .nav-link {
        color: #0082D4;
        font-weight: 500;
        background-color: #ffffff;
    }

    .sidebar .nav-link:hover {
        background-color: rgba(0, 131, 212, 0.3);
        color: #ffffff;
    }

    .menu-icon {
        margin-right: 10px;
    }

    .menu-title {
        margin-left: 5px;
    }

    .page-body-wrapper {
        background-color: #ffffff
    }

    .main-panel {
        margin-left: 250px; /* adjust based on sidebar width */
        padding: 20px;
    }

    @media (max-width: 768px) {
    .sidebar {
        display: none;
    }
    .main-panel {
        margin-left: 0;
    }
    }
</style>
<div class="sidebar">
    <h3 class="ms-3">Navigasi</h3>
    <nav class="nav flex-column">
        <a class="nav-link py-4 active" href="#surat-surat-modal">
            <i class="mdi mdi-email menu-icon"></i>
            <span class="menu-title">Surat-surat</span>
        </a>
        <a class="nav-link py-4" href="#persentase-progress-modal">
            <i class="mdi mdi-progress-check menu-icon"></i>
            <span class="menu-title">Persentase Progress</span>
        </a>
    </nav>
</div>
<div class="content-wrapper">    
    <h1>Pelaporan Belanja Modal</h1>
    <p class="mb-4 text-danger">Harap laporkan data selengkap-lengkapnya.*</p>
    <div class="row">
        <form action="{{ route('belanja-modal.update', $barmod->id) }}" method="POST">
            @method('PUT')
            @csrf
            {{-- card pertama --}}
            <div class="col-sm-12 grid-margin stretch-card" id="surat-surat-modal">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sistem Pelaporan Monitoring Kontrak (SPMK)</h4>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nomor-spmk-modal">Nomor</label>
                                <input type="text" class="form-control" name="nomor_spmk" id="nomor-spmk-modal"
                                    placeholder="Akan terisi setelah terverifikasi oleh admin" value="{{ $barmod->nomor_spmk }}" disabled>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="tanggal-spmk-modal">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_spmk" id="tanggal-spmk-modal"
                                    placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_spmk ?? '' }}"
                                    {{ $barmod->tgl_spmk ? 'disabled' : '' }}>
                            </div>

                        </div>
                        <hr>

                        <h4 class="card-title">Berita Acara Serah Terima (BAST)</h4>
                        <div class="row mb-3">
                            <div class="form-group col-sm-12">
                                <label for="nomor-bast-modal">Nomor</label>
                                <input type="text" class="form-control" name="nomor_bast" id="nomor-bast-modal"
                                    placeholder="Akan terisi setelah diverifikasi oleh admin" value="{{ $barmod->nomor_bast }}" disabled>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="tanggal-bast-modal">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_bast" id="tanggal-bast-modal"
                                    placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_bast ?? '' }}"
                                    {{ $barmod->tgl_bast ? 'disabled' : '' }}>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="nilai-bast-modal">Nilai</label>
                                <input type="number" class="form-control" name="nilai_bast" id="nilai-bast-modal"
                                    aria-label="Amount (to the nearest dollar)" value="{{ $barmod->nilai_bast ?? '' }}"
                                    {{ $barmod->nilai_bast ? 'disabled' : '' }}>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="mulai-bast-modal">Tanggal Proses Hasil Operasi (PHO)</label>
                                    <input type="date" class="form-control" name="tgl_pho" id="mulai-bast-modal"
                                        placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_pho ?? '' }}"
                                        {{ $barmod->tgl_pho ? 'disabled' : '' }}>
                                </div>
                            </div>
                            <div class="col-sm-12">
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
                            <div class="form-group col-sm-12">
                                <label for="nomor-sp2d-modal">Nomor</label>
                                <input type="text" class="form-control" name="nomor_sp2d" id="nomor-sp2d-modal"
                                    placeholder="Akan terisi setelah diverifikasi oleh admin" value="{{ $barmod->nomor_sp2d }}" disabled>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="tanggal-sp2d-modal">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_sp2d" id="tanggal-sp2d-modal"
                                    placeholder="DD/MM/YYYY" value="{{ $barmod->tgl_sp2d ?? '' }}"
                                    {{ $barmod->tgl_sp2d ? 'disabled' : '' }}>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="nilai-sp2d-modal">Nilai</label>
                                <input type="number" class="form-control" name="nilai_sp2d" id="nilai-sp2d-modal"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="{{ $barmod->nilai_sp2d ?? '' }}"
                                    {{ $barmod->nilai_sp2d ? 'disabled' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- card kedua presentase input --}}
            <div class="col-sm-12 grid-margin stretch-card" id="persentase-progress-modal">
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
                            <a href="{{ route('pegawai') }}" class="btn btn-outline-danger">Kembali</a>
                        @else
                            <a href="{{ route('pegawai') }}" class="btn btn-danger mt-5">Kembali</a>
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
</div>
@endsection
