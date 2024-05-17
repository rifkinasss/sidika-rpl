@extends('admin.layouts.app')

@section('content')
    <div class="row">
        {{-- card tabel admin --}}
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Verifikasi Belanja Modal</h4>
                    <p class="card-description">
                        Super Admin & Admin dapat menyetujui, menambah komentar, dan menolak belanja modal.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <b>No</b>
                                    </th>
                                    <th>
                                        <b>Nama Lengkap</b>
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
                                        <b>Status Pekerjaan</b>
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
                                @foreach ($barmod as $b)
                                    <tr>
                                        <td class="py-1">
                                            1
                                        </td>
                                        <td>
                                            {{ $b->user->nama }}
                                        </td>
                                        <td>
                                            {{ $b->jns_belanja }}
                                        </td>
                                        <td>
                                            Rp {{ number_format($b->nilai_kontrak, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            @if ($b->status === 'Diproses')
                                                <span class="badge text-bg-warning">Diproses</span>
                                            @elseif ($b->status === 'Disetujui')
                                                <span class="badge text-bg-success">Disetujui</span>
                                            @else
                                                <span class="badge text-bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($b->persentase_progress < '40%')
                                                <span class="badge text-bg-warning">{{ $b->persentase_progress }}</span>
                                            @elseif ($b->persentase_progress >= '50%')
                                                <span class="badge text-bg-success">{{ $b->persentase_progress }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($b->tgl_mulai_kontrak)->format('d-M-y') }} -
                                            {{ \Carbon\Carbon::parse($b->tgl_berakhir_kontrak)->format('d-M-y') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('verifikasi-belanja-modal.show', $b->id) }}" type="button"
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
