@extends('admin.layouts.app')

@section('content')
    <div class="row">

        {{-- card pertama --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hubungi Kami</h4>
                    <p class="mt-4">
                        Kamu punya pertanyaan atau keluhan terkait kendala pada layanan aplikasi SIDIKA? Hubungi kami
                        melalui
                        email dan call center di bawah ini!
                    </p>
                    <ul style="list-style-type: none;">
                        <li>
                            <i class="mdi mdi-email me-2"></i>
                            Email : bantuan.sidika@dinaspendidikan.go.id
                        </li>
                        <li>
                            <i class="mdi mdi-phone me-2"></i>
                            Telp. : (021) 5255385
                        </li>
                    </ul>
                    <p class="mt-4">
                        Kamu juga bisa mendapatkan lebih banyak informasi mengenai SIDIKA dari akun resmi media sosial
                        SIDIKA
                        berikut!
                    </p>
                    <ul style="list-style-type: none;">
                        <li>
                            <a href="https://id-id.facebook.com/disdikdkijakarta" class="text-decoration-none">
                                <i class="mdi mdi-twitter me-2"></i>
                                Twitter: @disdikdkijakarta</a>
                        </li>
                        <li>
                            <a href="https://twitter.com/disdik_dki?lang=en" class="text-decoration-none">
                                <i class="mdi mdi-facebook me-2"></i>
                                Facebook: @disdik_dki</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/disdikdki/?hl=en" class="text-decoration-none">
                                <i class="mdi mdi-instagram me-2"></i>
                                Instagram: @disdikdki</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- card kedua --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kantor Pusat</h4>
                    <h5><b>Dinas Pendidikan</b></h5>
                    <h6><b>Pemerintah Provinsi DKI Jakarta</b></h6>
                    <p class="mt-2">
                        Jln. Jendral Gatot Subroto, Kav. 40-41,<br>
                        Jakarta Selatan
                    </p>
                    <div id="map" style="height: 400px; width: 100%;"></div>

                </div>
            </div>
        </div>


    </div>
@endsection
