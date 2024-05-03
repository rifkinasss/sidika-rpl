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
                    <b>#</b>
                  </th>
                  <th>
                    <b>Jenis Belanja Modal</b>
                  </th>
                  <th>
                    <b>Nilai Kontrak</b>
                  </th>
                  <th>
                    <b>Status Dana</b>
                  </th>
                  <th>
                    <b>Status Pekerjaan</b>
                  </th>
                  <th>
                    <b>Masa Berlaku</b>
                  </th>
                  <th>
                    <b>Kebijakan</b>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-1">
                    1
                  </td>
                  <td>
                    Belanja Modal Mebel
                  </td>
                  <td>
                    Rp 152.760.000
                  </td>
                  <td>
                    <span class="badge text-bg-success">Lunas</span>
                  </td>
                  <td>
                    <span class="badge text-bg-warning">80%</span>
                  </td>
                  <td>
                    10-Jan-23 - 09-Feb-23
                  </td>
                  <td>
                    <button class="btn btn-success"><i class="mdi mdi-check-circle-outline text-white"></i></button>
                    <button class="btn btn-warning"><i class="mdi mdi-message-text-outline text-white"></i></button>
                    <button class="btn btn-danger"><i class="mdi mdi-delete text-white"></i></button>
                  </td>
                </tr>      
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    {{-- end card tabel admin --}}

  </div>    
@endsection
