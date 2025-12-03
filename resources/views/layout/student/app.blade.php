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
            overflow-x: hidden;
            /* prevent horizontal scroll */
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <form id="autoLogoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Submitted!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
            }).then(() => {
                // Logout immediately when OK is clicked
                document.getElementById('autoLogoutForm').submit();
            });

            // Also auto-logout after 3 seconds if user does nothing
            setTimeout(() => {
                document.getElementById('autoLogoutForm').submit();
            }, 3000);
        </script>
    @endif

    {{-- Extra page JS --}}
    @stack('scripts')
</body>

</html>
