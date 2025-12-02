<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard</title>
 <link rel="icon" type="image/x-icon" href="https://careerandcourses.com/simages/favicon.ico">
    <!-- CSS files -->
    <link href="{{ asset('assets/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @stack('css')
</head>

<body>
    <script src="{{ asset('admin/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
        @include('layout.students.partials.sidebar')
        @yield('content')
        @include('layout.students.partials.footer')
    </div>
    <!-- Libs JS -->

    <script src="{{ asset('assets/js/demo-theme.min.js?1692870487') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world-merc.js?1692870487') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets/js/demo.min.js?1692870487') }}" defer></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
     
    @stack('js')
</body>

</html>
