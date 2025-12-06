<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
                <img src="{{ asset('assets/image/CNC_LOGO.webp') }}" width="110" height="110" alt="Tabler"
                    class="navbar-brand-image">
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">

                {{-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li> --}}





                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.student-list') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">

                                <!-- Student Head -->
                                <circle cx="9" cy="7" r="3" />

                                <!-- Student Body -->
                                <path d="M4 19v-1a5 5 0 0 1 10 0v1" />

                                <!-- List Lines -->
                                <path d="M15 7h5" />
                                <path d="M15 12h5" />
                                <path d="M15 17h5" />

                            </svg>



                        </span>
                        <span class="nav-link-title">
                            Student List
                        </span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.student.result.search') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Tabler Icon: settings -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">

                                <!-- Clipboard -->
                                <rect x="6" y="4" width="12" height="16" rx="2" />
                                <path d="M9 4h6v3H9z" />

                                <!-- Checklist -->
                                <path d="M9 10h6" />
                                <path d="M9 14h4" />

                                <!-- Growth Arrow -->
                                <path d="M3 20l5-5 4 4 8-8" />
                                <path d="M17 11h3v3" />

                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Career Assessment
                        </span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('students.search') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Tabler "User Circle" icon for Profile -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="12" r="9" />
                                <circle cx="12" cy="10" r="3" />
                                <path d="M6.75 18a6.5 6.5 0 0 1 10.5 0" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                           Result & Recommendation
                        </span>
                    </a>
                </li> --}}



                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Log Out
                        </span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </div>
</aside>
