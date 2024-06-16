@extends('superadmin.layouts.app')

@section('content')
<script>
        // login
    @if(session('alert'))
        Swal.fire({
            position: 'center',
            icon: 'success',
            title : 'Login Berhasil!',
            text: '{{ session('alert') }}',
            showConfirmButton: false,
            timer: 1500
        });
    @endif
</script>
    <div class="row">
        {{-- card tabel admin --}}
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card mt-4">
                <div class="card-body">
                    @auth
                        <h4 class="card-title text-center">Selamat Datang {{ Auth::user()->nama }}</h4>
                    @endauth
                    <div class="card-description text-center">
                        <span class="fs-8">Anda Masuk Sebagai Super Admin!!!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
