@extends('pegawai.layouts.app')

@section('content')
    <div class="content-wrapper bg-primary">
        <div class="row mt-4">
            <h2 class="text-center text-light mb-4">Ringkasan {{ Auth::user()->nama }}</h2>
            <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Perjalanan Dinas yang Diajukan</h4>
                            <h4 class="text-success font-weight-bold">Disetujui :<span
                                    class="text-dark ms-3">{{ $jumlahDisetujui }}</span></h4>
                        </div>
                        <div id="support-tracker-legend" class="support-tracker-legend"></div>
                        <canvas id="supportTracker"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center justify-content-between mb-4">
                            <h4 class="card-title">Perbandingan Layanan yang Berhasil Diajukan</h4>
                        </div>
                        <div class="product-order-wrap padding-reduced">
                            <canvas id="bestSellers"></canvas>
                        </div>
                        <ul class="graphl-legend-rectangle">
                            <li><span class="bg-primary"></span>Perjalanan Dinas</li>
                            <li><span class="bg-success"></span>Belanja Modal</li>
                            <li><span class="bg-warning"></span>Belanja Barang Jasa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title mb-2">Tren Jumlah Perjalanan Dinas, Belanja Modal & Belanja Barang Jasa
                            </h4>
                            <div class="dropdown">
                                <a href="#" class="text-success btn btn-link  px-1"><i
                                        class="mdi mdi-refresh"></i></a>
                            </div>
                        </div>
                        <div>
                            <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active ps-2 pe-2" id="revenue-for-last-month-tab"
                                        data-bs-toggle="tab" href="#revenue-for-last-month" role="tab"
                                        aria-controls="revenue-for-last-month" aria-selected="true">Seminggu Terakhir</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2" id="server-loading-tab" data-bs-toggle="tab"
                                        href="#server-loading" role="tab" aria-controls="server-loading"
                                        aria-selected="false">Sebulan Terakhir</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2" id="data-managed-tab" data-bs-toggle="tab"
                                        href="#data-managed" role="tab" aria-controls="data-managed"
                                        aria-selected="false">Setahun Terakhir</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-no-active-fill-tab-content">
                                <div class="tab-pane fade show active" id="revenue-for-last-month" role="tabpanel"
                                    aria-labelledby="revenue-for-last-month-tab">
                                    <div class="d-lg-flex justify-content-between">
                                        <p class="mb-4"></p>
                                        <div id="revenuechart-legend" class="revenuechart-legend">f</div>
                                    </div>
                                    <canvas id="revenue-for-last-month-chart"></canvas>
                                </div>
                                <div class="tab-pane fade" id="server-loading" role="tabpanel"
                                    aria-labelledby="server-loading-tab">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-4"></p>
                                        <div id="serveLoading-legend" class="revenuechart-legend">f</div>
                                    </div>
                                    <canvas id="serveLoading"></canvas>
                                </div>
                                <div class="tab-pane fade" id="data-managed" role="tabpanel"
                                    aria-labelledby="data-managed-tab">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-4"></p>
                                        <div id="dataManaged-legend" class="revenuechart-legend">f</div>
                                    </div>
                                    <canvas id="dataManaged"></canvas>
                                </div>
                                <div class="tab-pane fade" id="sales-by-traffic" role="tabpanel"
                                    aria-labelledby="sales-by-traffic-tab">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-4"></p>
                                        <div id="salesTrafic-legend" class="revenuechart-legend">f</div>
                                    </div>
                                    <canvas id="salesTrafic"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-2">Perjalanan Dinas Terbaik Anda</h4>
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="font-weight-bold text-secondary">Kota Jakarta Pusat, DKI Jakarta</h3>
                                <p class="text-dark">23-10-2023 - 28-10-2023</p>
                                <div class="d-lg-flex align-items- mb-3">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="position-relative">
                                    <img src="images/dashboard/live.png" class="w-100" alt="">
                                    <div class="live-info badge badge-success">Live</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-4 mt-lg-0">
                                <h4 class="mb-3">Biaya :</h4>
                                <div class="bg-primary text-white px-4 py-4 card">
                                    <div class="row">
                                        <div class="col-sm-6 pl-lg-5">
                                            <h2>Rp 3,3jt</h2>
                                            <p class="mb-0">Akomodasi</p>
                                        </div>
                                        <div class="col-sm-6 climate-info-border mt-lg-0 mt-2">
                                            <h2>Rp 3,4jt</h2>
                                            <p class="mb-0">Transportasi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <h4 class="text-dark">Keperluan Perjalanan Dinas :</h4>
                            <p>Pembayaran biaya perjalanan dinas ke DKI Jakarta dalam rangka menghadiri rangkaian..</p>
                            <h4 class="text-dark mt-4">Penginapan :</h4>
                            <p>HOTEL MARRAKESH INN</p>
                            <h4 class="text-dark mt-4">Transportasi :</h4>
                            <p>SUPER AIR JET & BATIK AIR</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 flex-column d-flex stretch-card">
                <div class="row">
                    <div class="col-lg-3 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">Rp 1jt</h2>
                                <h4 class="card-title mb-2">Total Biaya Perjalanan Dinas</h4>
                                <small class="text-muted">Juni 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex grid-margin stretch-card">
                        <div class="card sale-visit-statistics-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">Rp 12jt</h2>
                                <h4 class="card-title mb-2">Total Biaya Belanja Modal</h4>
                                <small class="text-muted">Mei 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-barjas">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">Rp 1,2jt</h2>
                                <h4 class="card-title mb-2">Total Biaya Belanja Barang Jasa</h4>
                                <small class="text-muted">Juni 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex grid-margin stretch-card">
                        <div class="card sale-visit-statistics-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">Rp 1,2jt</h2>
                                <h4 class="card-title mb-2">Total Biaya Belanja Barang Jasa</h4>
                                <small class="text-muted">Juni 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <h3 class="text-primary text-center font-weight-bold mb-2">Tabel {{ Auth::user()->nama }}</h3>
        {{-- <div class="row">
            <div class="col-lg-12 grid-margin mt-4 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pengajuan</h4>
                        <canvas id="barCharts"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}

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
                                <th class="text-center">
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
                                <th class="text-center">
                                    <b>Action</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perjadin->where('user_id', auth()->user()->id) as $p)
                                <tr>
                                    <td class="text-center">
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
                                    <td>
                                        <div class="flex-container">
                                            <span class="currency">Rp</span>
                                            <span
                                                class="amount">{{ number_format($p->jumlah_dibayarkan, 0, ',', '.') }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($p->tgl_berangkat)->format('d-M-y') }} -
                                        {{ \Carbon\Carbon::parse($p->tgl_kembali)->format('d-M-y') }}
                                    </td>
                                    <td class="text-center">
                                        @if ($p->status === 'Disetujui')
                                            <a href="{{ route('pelaporan-perjadin.show', $p->id) }}"
                                                class="btn btn-outline-danger btn-icon-text">Lapor<i
                                                    class="mdi mdi-file-chart btn-icon-append"></i></a>
                                            <a href="{{ route('SPPD', $p->id) }}" type="button" target="_blank"
                                                class="btn btn-outline-info btn-icon-text">
                                                Print
                                                <i class="mdi mdi-printer btn-icon-append"></i>
                                            </a>
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
                                    <b>Lokasi Penginapan</b>
                                </th>
                                <th>
                                    <b>Tujuan</b>
                                </th>
                                <th class="text-center">
                                    <b>Lama Hari</b>
                                </th>
                                <th class="text-center">
                                    <b>Status</b>
                                </th>
                                <th class="text-center">
                                    <b>Tanggal Lapor</b>
                                </th>
                                <th class="text-center">
                                    <b>Tanggal Disetujui</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan->where('perjalanan_dinas_id') as $lapor)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $lapor->jns_penginapan }}
                                    </td>
                                    <td>
                                        {{ $lapor->tujuan }}
                                    </td>
                                    <td class="text-center">
                                        {{ $lapor->perjalanandinas->jumlah_hari }} Hari
                                    </td>
                                    <td class="text-center">
                                        @if ($lapor->status === 'Diproses')
                                            <span class="badge text-bg-warning">Diproses</span>
                                        @elseif ($lapor->status === 'Disetujui')
                                            <span class="badge text-bg-success">Disetujui</span>
                                        @else
                                            <span class="badge text-bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($lapor->created_at)->format('d-M-y') }}
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($lapor->updated_at)->format('d-M-y') }}
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
                                    <b>Nomor Surat</b>
                                </th>
                                <th>
                                    <b>Jenis Belanja Barang</b>
                                </th>
                                <th>
                                    <b>Nilai Kontrak</b>
                                </th>
                                <th class="text-center">
                                    <b>Status</b>
                                </th>
                                <th class="text-center">
                                    <b>Masa Berlaku</b>
                                </th>
                                <th>
                                    <b>Action</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang_modal->where('user_id', auth()->user()->id) as $barmod)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $barmod->nomor_surat_spk }}
                                    </td>
                                    <td>
                                        {{ $barmod->jns_belanja }}
                                    </td>
                                    <td>
                                        Rp {{ number_format($barmod->nilai_kontrak, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        @if ($barmod->status === 'Diproses')
                                            <span class="badge text-bg-warning">Diproses</span>
                                        @elseif ($barmod->status === 'Disetujui')
                                            <span class="badge text-bg-success">Disetujui</span>
                                        @else
                                            <span class="badge text-bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($barmod->tgl_mulai_kontrak)->format('d-M-y') }} -
                                        {{ \Carbon\Carbon::parse($barmod->tgl_berakhir_kontrak)->format('d-M-y') }}
                                    </td>
                                    <td>
                                        @if ($barmod->status === 'Disetujui')
                                            <a href="{{ route('belanja-modal.show', $barmod->id) }}"
                                                class="btn btn-outline-danger btn-icon-text">
                                                Lapor
                                                <i class="mdi mdi-file-chart btn-icon-append"></i></a>
                                            <a href="{{ route('belanja-modal.detail', $barmod->id) }}"
                                                class="btn btn-outline-info btn-icon-text">
                                                Detail
                                                <i class="mdi mdi-information-outline btn-icon-append"></i></a>
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
                                    <b>Nomor Surat</b>
                                </th>
                                <th>
                                    <b>Jenis Belanja Barang</b>
                                </th>
                                <th>
                                    <b>Nilai Kontrak</b>
                                </th>
                                <th class="text-center">
                                    <b>Status</b>
                                </th>
                                <th class="text-center">
                                    <b>Masa Berlaku</b>
                                </th>
                                <th>
                                    <b>Action</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang_jasa->where('user_id', auth()->user()->id) as $barjas)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $barjas->nomor_surat_spk }}
                                    </td>
                                    <td>
                                        {{ $barjas->jns_belanja }}
                                    </td>
                                    <td>
                                        Rp {{ number_format($barjas->nilai_kontrak, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        @if ($barjas->status === 'Diproses')
                                            <span class="badge text-bg-warning">Diproses</span>
                                        @elseif ($barjas->status === 'Disetujui')
                                            <span class="badge text-bg-success">Disetujui</span>
                                        @else
                                            <span class="badge text-bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($barjas->tgl_mulai_kontrak)->format('d-M-y') }} -
                                        {{ \Carbon\Carbon::parse($barjas->tgl_berakhir_kontrak)->format('d-M-y') }}
                                    </td>
                                    <td>
                                        @if ($barjas->status === 'Disetujui')
                                            <a href="{{ route('belanja-barang-jasa.show', $barjas->id) }}"
                                                class="btn btn-outline-danger btn-icon-text">
                                                Lapor
                                                <i class="mdi mdi-file-chart btn-icon-append"></i></a>
                                            <a href="{{ route('belanja-barang-jasa.detail', $barjas->id) }}"
                                                class="btn btn-outline-info btn-icon-text">
                                                Detail
                                                <i class="mdi mdi-information-outline btn-icon-append"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var formattedData = {!! json_encode($formattedData) !!}; // Convert PHP array to JavaScript object

        var months = formattedData.map(function(item) {
            return item.month;
        });

        var totals = formattedData.map(function(item) {
            return item.total;
        });

        var ctx = document.getElementById('barCharts').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Total',
                    data: totals,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
