@extends('layouts.master')

@section('content')
<script>
    @if(session('error'))
        Swal.fire({
            position: 'center',
            icon: 'error',
            title : 'Login Gagal!',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        });
    @endif
</script>
    <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <div class="row">
                                <div class="col">
                                    <img src="/images/logo_dinas.png" alt="logo dinas">
                                    <span> | </span>
                                    <img src="/images/SIDIKA_rpl.png" style="height: 55px; width: auto;" alt="logo sidika">
                                </div>
                            </div>
                        </div>
                        <h4>Selamat Datang di website SIDIKA</h4>
                        <h6 class="font-weight-light">Masuk Sebagai Pegawai ataupun Admin</h6>
                        @if (session('alert'))
                            <div class="alert alert-success text-center mb-1 mt-3">
                                {{ session('alert') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger text-center mb-1 mt-3">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="pt-3">
                            @csrf
                            <div class="form-group">
                                <input type="text"
                                    class="form-control form-control-lg @error('nip_or_email') is-invalid @enderror"
                                    id="nip_or_email" placeholder="Masukkan NIP" name="nip_or_email" required autofocus>
                                @error('nip_or_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    id="password" placeholder="Password" name="password" required
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        Remember me
                                    </label>
                                </div>
                                {{-- <a href="#" class="auth-link text-black">Forgot password?</a> --}}
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    type="submit">Log In</button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
