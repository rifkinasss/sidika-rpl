<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dinas Pendidikan | SIDIKA</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    {{-- css bootstrap jangan dihapus kalau mau dropdown tetap ada --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- Leaflet API --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
        }

        .flex-container .currency {
            flex-shrink: 0;
        }

        .flex-container .amount {
            flex-grow: 1;
            text-align: right;
        }
    </style>
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-scroller">
        @include('pegawai.layouts.partials.navbar')
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                {{-- content-wrapper ada di section --}}
                @yield('content')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('pegawai.layouts.partials.footer')
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src='{{ asset('js/template.js') }}'></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('vendors/justgage/raphael-2.1.4.min.js') }}"></script>
    <script src="{{ asset('vendors/justgage/justgage.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src='{{ asset('js/dashboard.js') }}'></script>
    <!-- End custom js for this page-->
    {{-- js bootstrap penting! --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-6.2355758005389115, 106.82640045400846],
            50); // Inisialisasi peta dengan koordinat dan zoom tertentu

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Anda bisa menambahkan marker atau elemen lainnya ke peta di sini
        L.marker([-6.2355758005389115, 106.82640045400846]).addTo(map)
            .bindPopup('Dinas Pendidikan DKI Jakarta')
            .openPopup();
    </script>

    <!-- Form Handler Pengajuan Perjadin -->
    <script src="{{ asset('js/form-handler.js') }}"></script>

</body>

</html>
