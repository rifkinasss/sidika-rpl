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
    {{-- Leaflet API --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-scroller">
        @include('pegawai.layouts.partials.navbar')
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
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
    <!-- jQuery (diperlukan untuk Bootstrap 5) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Assuming $formattedData contains the data in the correct format
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
</body>

</html>
