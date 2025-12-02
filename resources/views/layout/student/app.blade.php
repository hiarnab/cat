<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Career Assessment')</title>

    {{-- Global CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Extra page CSS --}}
    @stack('styles')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* prevent horizontal scroll */
        }

        .main-wrapper {
            display: flex;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    @include('layout.student.partials.header')

    <div class="main-wrapper">

        {{-- SIDEBAR --}}
        @include('layout.student.partials.sidebar')

        {{-- MAIN CONTENT AREA --}}
        <main>
            @yield('content')
        </main>

    </div>

    {{-- FOOTER --}}
    @include('layout.student.partials.footer')

    {{-- Extra page JS --}}
    @stack('scripts')
</body>
</html>
