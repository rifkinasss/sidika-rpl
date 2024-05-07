@extends('admin.layouts.app')

@section('content')
    <div class="row">
        {{-- card tabel admin --}}
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Verifikasi Perencanaan Perjalanan Dinas</h4>
                    <p class="card-description">
                        Admin dapat menyetujui dan menolak perencanaan perjadin.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <b>No</b>
                                    </th>
                                    <th>
                                        <b>Keperluan Perjalanan Dinas</b>
                                    </th>
                                    <th>
                                        <b>Status</b>
                                    </th>
                                    <th>
                                        <b>Jumlah Dibayar</b>
                                    </th>
                                    <th>
                                        <b>Tanggal</b>
                                    </th>
                                    <th>
                                        <b>Aksi</b>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perjalanandinas as $p)
                                    <tr>
                                        <td class="py-1">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td style="width: 500px; height: auto;">
                                            {{ $p->keperluan_perjadin }}
                                        </td>
                                        <td>
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
                                            Rp {{ number_format($p->jumlah_dibayarkan, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($p->tgl_berangkat)->format('d-M-y') }} -
                                            {{ \Carbon\Carbon::parse($p->tgl_kembali)->format('d-M-y') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('verifikasi-perjalanan-dinas.show', $p->id) }}" type="button"
                                                class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- end card tabel admin --}}

    </div>
@endsection
