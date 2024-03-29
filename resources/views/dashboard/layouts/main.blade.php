<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="shortcut icon" href="{{ asset('img/shield-check.ico') }}" type="image/x-icon">
    <!--plugins-->
    <link href="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/assets/css/pace.min.css" rel="stylesheet" />
    <script src="/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="/assets/css/app.css" rel="stylesheet">
    <link href="/assets/css/icons.css" rel="stylesheet">
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- Datatable.js --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    {{-- Datatable bootstrap 5 --}}
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Clipboard.js --}}
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>


    <title>SIGAR -  Sistem Garansi</title>
</head>

<body>
    @include('dashboard.partials.header')
    @yield('content.dashboard')

    <!-- Bootstrap JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="/assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="/assets/plugins/jquery-knob/excanvas.js"></script>
    <script src="/assets/plugins/jquery-knob/jquery.knob.js"></script>

 
    <script src="/assets/js/index.js"></script>
    <!--app JS-->
    <script src="/assets/js/app.js"></script>
</body>

</html>
