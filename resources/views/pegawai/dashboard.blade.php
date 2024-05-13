@extends('pegawai.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 mb-4 mb-xl-0">
            <div class="d-lg-flex align-items-center">
                <div>
                    <h3 class="text-dark font-weight-bold mb-2">Hi, welcome {{ Auth::user()->nama }}!</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="d-flex align-items-center justify-content-md-end">
                <div class="pe-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-outline-info btn-icon-text">
                        Print
                        <i class="mdi mdi-printer btn-icon-append"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin mt-4 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengajuan</h4>
                    <canvas id="barCharts"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- card tabel perjadin --}}
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">Pengajuan Perjalanan Dinas</h4>
            <p class="card-description">
                Semua hasil form perencanaan yang sudah dikirimkan akan ditampilkan disini</code>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Nomor Surat</b>
                            </th>
                            <th>
                                <b>Keperluan Perjalanan Dinas</b>
                            </th>
                            <th class="text-center">
                                <b>Status</b>
                            </th>
                            <th class="text-center">
                                <b>Anggaran</b>
                            </th>
                            <th class="text-center">
                                <b>Tanggal</b>
                            </th>
                            <th>
                                <b>Action</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perjadin->where('user_id', auth()->user()->id) as $p)
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    {{ $p->nomor_surat }}
                                </td>
                                <td>
                                    {{ $p->keperluan_perjadin }}
                                </td>
                                <td class="text-center">
                                    @if ($p->status === 'Diproses')
                                        <span class="badge text-bg-warning">Diproses</span>
                                    @elseif ($p->status === 'Disetujui')
                                        <span class="badge text-bg-success">Disetujui</span>
                                    @elseif ($p->status === 'Ditolak')
                                        <span class="badge text-bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge">Status tidak valid</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    Rp {{ number_format($p->jumlah_dibayarkan, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($p->tgl_berangkat)->format('d-M-y') }} -
                                    {{ \Carbon\Carbon::parse($p->tgl_kembali)->format('d-M-y') }}
                                </td>
                                <td>
                                    @if ($p->status === 'Disetujui')
                                        <a href="{{ route('pelaporan-perjadin.create') }}"
                                            class="btn btn-outline-danger btn-icon-text">Lapor<i
                                                class="mdi mdi-file-chart btn-icon-append"></i></a>
                                        <button type="button" class="btn btn-outline-info btn-icon-text">
                                            Print
                                            <i class="mdi mdi-printer btn-icon-append"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="card-title">Pelaporan Perjalanan Dinas</h4>
            <p class="card-description">
                Semua hasil form pelaporan yang sudah divalidasi akan ditampilkan disini</code>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <b>No</b>
                            </th>
                            <th>
                                <b>Tujuan</b>
                            </th>
                            <th>
                                <b>Status</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan->where('user_id', auth()->user()->id) as $lapor)
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="width: 500px; height: auto;">
                                    {{ $lapor->keperluan_perjadin }}
                                </td>
                                <td>
                                    @if ($lapor->status === 'Diproses')
                                        <span class="badge text-bg-warning">Diproses</span>
                                    @elseif ($lapor->status === 'Disetujui')
                                        <span class="badge text-bg-success">Disetujui</span>
                                    @else
                                        <span class="badge text-bg-danger">Ditolak</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="card-title">Belanja Modal</h4>
            <p class="card-description">
                Semua hasil form pelaporan yang sudah divalidasi akan ditampilkan disini</code>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <b>No</b>
                            </th>
                            <th>
                                <b>Tujuan</b>
                            </th>
                            <th>
                                <b>Status</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan->where('user_id', auth()->user()->id) as $lapor)
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="width: 500px; height: auto;">
                                    {{ $lapor->keperluan_perjadin }}
                                </td>
                                <td>
                                    @if ($lapor->status === 'Diproses')
                                        <span class="badge text-bg-warning">Diproses</span>
                                    @elseif ($lapor->status === 'Disetujui')
                                        <span class="badge text-bg-success">Disetujui</span>
                                    @else
                                        <span class="badge text-bg-danger">Ditolak</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="card-title">Belanja Barang Jasa</h4>
            <p class="card-description">
                Semua hasil form pelaporan yang sudah divalidasi akan ditampilkan disini</code>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <b>No</b>
                            </th>
                            <th>
                                <b>Tujuan</b>
                            </th>
                            <th>
                                <b>Status</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan->where('user_id', auth()->user()->id) as $lapor)
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="width: 500px; height: auto;">
                                    {{ $lapor->keperluan_perjadin }}
                                </td>
                                <td>
                                    @if ($lapor->status === 'Diproses')
                                        <span class="badge text-bg-warning">Diproses</span>
                                    @elseif ($lapor->status === 'Disetujui')
                                        <span class="badge text-bg-success">Disetujui</span>
                                    @else
                                        <span class="badge text-bg-danger">Ditolak</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
