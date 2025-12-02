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

                <li class="nav-item">
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
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
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
                            Admission Enquiry
                        </span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" role="button"
                        aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Staff Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="7" r="4" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Add Staff
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('staff.personal_info') }}">
                            Personal Information
                        </a>
                        <a class="dropdown-item" href="{{ route('staff.contact_info') }}">
                            Contact Information
                        </a>
                        <a class="dropdown-item" href="{{ route('staff.staff_details') }}">
                            staff Details
                        </a>
                        <a class="dropdown-item" href="{{ route('staff.salary_compensation') }}">
                            Salary & Compensation
                        </a>
                        <a class="dropdown-item" href="{{ route('staff.document_uploads') }}">
                            Document Uploads
                        </a>
                        <a class="dropdown-item" href="{{ route('staff.education_work_experience') }}">
                            Education & <br> Work Background
                        </a>
                    </div>
                </li> --}}


                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" role="button"
                        aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Staff Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="7" r="4" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Member
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('faculty.personal_info') }}">
                            Member for staff
                        </a>
                        <a class="dropdown-item" href="{{ route('faculty.contact_info') }}">
                           Member for faculty
                    </div>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="3" y="5" width="18" height="16" rx="2" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M3 11h18" />
                                <!-- small clock at bottom-right -->
                                <circle cx="17" cy="16" r="3" />
                                <path d="M17 15v1.5l1 1" />
                            </svg>


                        </span>
                        <span class="nav-link-title">
                            Duty Timing
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
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
                            Profile
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Tabler Icon: settings -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.89 3.31 .876 2.42 2.42a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.89 1.543 -.876 3.31 -2.42 2.42a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .89 -3.31 -.876 -2.42 -2.42a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.89 -1.543 .876 -3.31 2.42 -2.42a1.724 1.724 0 0 0 2.572 -1.065z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>




                        </span>
                        <span class="nav-link-title">
                            Settings
                        </span>
                    </a>
                </li>

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
