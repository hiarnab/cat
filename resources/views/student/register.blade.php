<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Student Registration</title>

    <link rel="icon" type="image/x-icon" href="https://careerandcourses.com/simages/favicon.ico">

    <!-- Tabler CSS -->
    <link href="{{ asset('assets/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', sans-serif;
        }

        /* ✅ 80% Screen Width Card */
        .custom-card-width {
            width: 60vw;
            max-width: 1100px;
            margin: auto;
        }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="{{ asset('assets/js/demo-theme.min.js') }}"></script>

    <div class="page page-center">
        <div class="container py-4">

            <!-- Logo -->
            <div class="text-center mb-4">
                <a href="#" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('assets/image/CNC_LOGO.webp') }}" height="80" alt="Logo">
                </a>
            </div>

            <!-- ✅ 80% Width Card -->
            <div class="card custom-card-width">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Student Registration Form</h2>

                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf

                        <div class="row">

                            <!-- Student Name -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Student Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <!-- Current Class -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Current Class Studying</label>
                                <input type="text" name="current_class" class="form-control" required>
                            </div>

                            <!-- School Name -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">School Name</label>
                                <input type="text" name="school_name" class="form-control" required>
                            </div>

                            <!-- Future Stream -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Future Stream Choosing</label>
                                <select name="future_stream" class="form-select" required>
                                    <option value="">-- Select Stream --</option>
                                    <option value="Science">Science</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Arts">Arts</option>
                                    <option value="Vocational">Vocational</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>

                            <!-- Student Mobile -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Student Mobile Number</label>
                                <input type="text" name="mobile" maxlength="10" class="form-control">
                            </div>

                            <!-- Guardian Mobile -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Guardian Mobile Number</label>
                                <input type="text" name="guardian_mobile" maxlength="10" class="form-control"
                                    required>
                            </div>

                            <!-- Guardian WhatsApp -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Guardian WhatsApp Number</label>
                                <input type="text" name="guardian_whatsapp" maxlength="10" class="form-control">
                            </div>

                            <!-- Email -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email ID</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <!-- Address -->
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Address</label>
                                <textarea name="address" rows="3" class="form-control" required></textarea>
                            </div>

                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabler JS -->
    <script src="{{ asset('assets/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/demo.min.js') }}" defer></script>

</body>

</html>
