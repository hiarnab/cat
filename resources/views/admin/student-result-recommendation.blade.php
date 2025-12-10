@extends('layout.admin.app')

@section('content')

    <div class="page-wrapper bg-light py-5 min-vh-100">
        <div class="container">

            <!-- PAGE 1: Subject Scores + Career Guidance -->
            <div class="print-page">
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <img src="{{ asset('assets/image/BIG-SD-Logo-R.webp') }}" class="print-logo" alt="SD Logo">

                    <img src="{{ asset('assets/image/CNC_LOGO-R.webp') }}" class="print-logo" alt="CNC Logo">
                </div>

                <!-- HEADER -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body bg-primary text-white text-center">
                        <h3 class="mb-0">
                            <i class="fas fa-chart-line"></i> Career Assessment Report
                        </h3>
                    </div>
                </div>

                <!-- STUDENT DETAILS -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded">
                            <small class="text-muted d-block">Student Name</small>
                            <strong>{{ $student->user->name }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded">
                            <small class="text-muted d-block">Email</small>
                            <strong>{{ $student->user->email ?? 'N/A' }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded">
                            <small class="text-muted d-block">School Name</small>
                            <strong>{{ $student->school_name ?? 'N/A' }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded">
                            <small class="text-muted d-block">Current Class</small>
                            <strong vls>{{ $student->current_class ?? 'N/A' }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded">
                            <small class="text-muted d-block">Future Stream</small>
                            <strong>{{ $student->future_stream ?? 'N/A' }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded">
                            <small class="text-muted d-block">Mobile</small>
                            <strong>{{ $student->mobile ?? 'N/A' }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded">
                            <small class="text-muted d-block">Guardian Mobile</small>
                            <strong>{{ $student->guardian_mobile ?? 'N/A' }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded">
                            <small class="text-muted d-block">Guardian Whatsapp</small>
                            <strong>{{ $student->guardian_whatsapp ?? 'N/A' }}</strong>
                        </div>
                    </div>
                </div>

                <!-- SUBJECT SCORES -->
                <h4 class="text-primary mb-3">Subject-wise Scores</h4>
                <div class="row mb-4">
                    @foreach ($scores as $subject => $score)
                        <div class="col-md-3 col-sm-6">
                            <div class="border rounded p-3 text-center bg-light">
                                <h6 class="text-dark mb-2">
                                    {{ ucfirst(str_replace('_', ' ', $subject)) }}
                                </h6>
                                <div class="fs-3 fw-bold text-success">{{ $score }}</div>
                                <small class="text-muted">{{ $percentages[$subject] }}%</small>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="print-footer">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fs-4">Powered by</span>
                            <img src="{{ asset('assets/image/BIG-SD-Logo-R.webp') }}" class="print-logo" alt="SD Logo">
                            <span class="fs-4">in Association with</span>
                            <img src="{{ asset('assets/image/CNC_LOGO-R.webp') }}" class="print-logo" alt="CNC Logo">
                        </div>

                        {{-- <div>
                            Page <span class="pageNumber"></span>
                        </div> --}}
                    </div>
                </div>

            </div>

            <div class=" page-break"></div>

            <!-- STREAM RECOMMENDATION -->

            {{-- <div class="bg-success bg-opacity-10 p-4 rounded mb-4 border-start border-4 border-success">
                    <h4 class="fw-bold">
                        <i class="fas fa-bullseye"></i> Stream Recommendation
                    </h4>
                    <div class="bg-white p-3 rounded shadow-sm mt-2">
                        <strong>{{ $recommendation ?? 'No recommendation available' }}</strong>
        
                        <p class="mb-0 mt-2">
                            This stream is suggested based on your strongest subject performance.
                        </p>
                    </div>
                </div> --}}
            <div class="print-page print-pad-top">
                <div class="bg-success bg-opacity-10 p-4 rounded mb-4 border-start border-4 border-success">
                    <h4 class="fw-bold">
                        <i class="fas fa-bullseye"></i> Stream Recommendation
                    </h4>

                    @php
                        // $recommendation =
                        //     'Science Stream (PCB) – Medical, Healthcare, Life Sciences | Other Suitable Streams: Science Stream (PCM) – Engineering, Technology, Research, Commerce Stream – Business, Finance, Entrepreneurship, Humanities/Arts – Arts, Literature, Social Sciences';
                        // dd($recommendation);
                        $rec = $recommendation ?? '';

                        // Split by |  (Main | Other Streams)
                        $parts = explode('|', $rec);
                        $main = trim($parts[0] ?? '');

                        // Process other suitable streams
                        $othersRaw = trim($parts[1] ?? '');
                        $othersRaw = str_replace('Other Suitable Streams:', '', $othersRaw);

                        // Convert to array
                        $otherStreams = array_filter(array_map('trim', explode(',', $othersRaw)));
                    @endphp

                    <div class="bg-white p-3 rounded shadow-sm mt-2">

                        <!-- Main Recommended Stream -->
                        <strong class="text-primary d-block mb-2">{{ $main }}</strong>

                        <p class="mb-2 text-muted small">
                            This stream is suggested based on your strongest subject performance.
                        </p>

                        <!-- Always show Other Suitable Streams -->
                        @if (count($otherStreams) > 0)
                            <h6 class="fw-bold mt-3">Other Suitable Streams</h6>

                            @foreach ($otherStreams as $stream)
                                <div class="d-flex align-items-center py-1">
                                    <i class="fas fa-caret-right me-2 text-success"></i>
                                    <span>{{ $stream }}</span>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>




                <!-- CAREER GUIDANCE -->
                <h4 class="text-primary">Career Guidance</h4>
                <div class="bg-white border rounded p-3 shadow-sm mb-4">
                    @if (str_contains($recommendation, 'Medical'))
                        MBBS, Nursing, Pharmacy, Biotechnology, Clinical Research.
                    @elseif (str_contains($recommendation, 'Engineering'))
                        Engineering, AI, Robotics, Data Science, Architecture, Research.
                    @elseif(str_contains($recommendation, 'Commerce'))
                        CA, CS, BBA, MBA, Accounting, Finance, Entrepreneurship.
                    @elseif(str_contains($recommendation, 'Humanities'))
                        Law, Civil Services, Journalism, Psychology, Literature, Teaching.
                    @else
                        Career guidance will be provided after expert counseling.
                    @endif
                </div>
                <div class="print-footer">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fs-4">Powered by</span>
                            <img src="{{ asset('assets/image/BIG-SD-Logo-R.webp') }}" class="print-logo" alt="SD Logo">
                            <span class="fs-4">in Association with</span>
                            <img src="{{ asset('assets/image/CNC_LOGO-R.webp') }}" class="print-logo" alt="CNC Logo">
                        </div>

                        {{-- <div>
                            Page <span class="pageNumber"></span>
                        </div> --}}
                    </div>
                </div>

            </div>

            <!-- PAGE BREAK -->
            <div class=" page-break"></div>

            <!-- PAGE 2: Student Answers -->
            <div class="print-page print-pad-top">
                <h4 class="text-primary mb-3">Student Answers</h4>

                @php
                    $normalize = function ($name) {
                        return strtolower(str_replace([' ', '-'], '_', $name));
                    };
                @endphp

                @foreach ($finalSections as $section)
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title mb-0">{{ $section->name }}</h3>
                        </div>
                        <div class="card-body">
                            @php $key = $normalize($section->name); @endphp
                            <table class="table table-bordered mt-2">
                                <thead class="table-light">
                                    <tr>
                                        <th width="60%">Question</th>
                                        <th width="40%">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($section->questions as $question)
                                        @php $answerModel = $answers[$key][$question->id] ?? null; @endphp
                                        <tr>
                                            <td>{{ $question->question }}</td>
                                            <td>
                                                @if ($answerModel)
                                                    @php
                                                        $raw = $answerModel->answer_option ?? null;
                                                        $decoded = json_decode($raw, true);
                                                    @endphp

                                                    @if (is_array($decoded))
                                                        @if (is_numeric($decoded[0] ?? null))
                                                            @php $options = \App\Models\AnswerOption::whereIn('id', $decoded)->get(); @endphp
                                                            <ul class="mb-0">
                                                                @foreach ($options as $opt)
                                                                    <li><strong>({{ $opt->option }})</strong>
                                                                        {{ $opt->option_value }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <ul class="mb-0">
                                                                @foreach ($decoded as $item)
                                                                    <li>{{ $item }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    @elseif ($answerModel->answer_id && isset($answerModel->answerOption))
                                                        <strong>({{ $answerModel->answerOption->option }})</strong>
                                                        {{ $answerModel->answerOption->option_value }}
                                                    @elseif (!empty($raw))
                                                        {{ $raw }}
                                                    @else
                                                        <span class="text-muted">Not Answered</span>
                                                    @endif
                                                @else
                                                    <span class="text-muted">Not Answered</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
                <div class="print-footer">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fs-4">Powered by</span>
                            <img src="{{ asset('assets/image/BIG-SD-Logo-R.webp') }}" class="print-logo" alt="SD Logo">
                            <span class="fs-4">in Association with</span>
                            <img src="{{ asset('assets/image/CNC_LOGO-R.webp') }}" class="print-logo" alt="CNC Logo">
                        </div>

                        {{-- <div>
                            Page <span class="pageNumber"></span>
                        </div> --}}
                    </div>
                </div>

            </div>

            <!-- PRINT BUTTON -->
            <!-- PRINT BUTTON -->
            <div class="text-end mb-5 print-button">
                <button onclick="window.print()" class="btn btn-primary">
                    <i class="fas fa-print"></i> Print Report
                </button>
            </div>

        </div>
    </div>

@endsection

{{-- @push('css')
    <style>
        @media print {

            @page {
                margin: 0;
            }

            body {
                margin: 20px !important;
                padding: 0 !important;
                font-size: 12pt;
                -webkit-print-color-adjust: exact;
                background: #ffffff !important;
            }

            /* ❌ Hide only print button */
            .print-button {
                display: none !important;
            }

            /* Remove header color backgrounds */
            /* .card-header,
            .card-header * {
                background: transparent !important;
                color: #000 !important;
                border: none !important;
                box-shadow: none !important;
                display:none !important;
            } */

            header,
            .page-header,
            hr {
                display: none !important;
                border: 0 !important;
            }

            /* Avoid page break inside cards/tables */
            .card,
            .card-body,
            .print-page,
            .section-block,
            table {
                page-break-inside: avoid !important;
            }

            .card {
                border: none !important;
                box-shadow: none !important;
                margin-bottom: 20px !important;
            }

            table {
                width: 100% !important;
                border-collapse: collapse !important;
                background: white !important;
            }

            th,
            td {
                border: 1px solid #000 !important;
                padding: 6px !important;
                color: #000 !important;
            }

            .table-light th {
                background: #f2f2f2 !important;
                color: #000 !important;
            }

            .page-wrapper,
            .container {
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }
        }
    </style>
@endpush --}}
@push('css')
    <style>
        .print-footer {
            display: none;
        }

        .print-logo {
            height: 50px;
            width: auto;
            object-fit: contain;
        }

        @media print {
            
            @page {
                size: A4;
                margin: 0;
            }

            body {
                margin: 20px !important;
                /* ❗IMPORTANT: Must be 0 */
                padding: 0 !important;
                font-size: 12pt;
                -webkit-print-color-adjust: exact;
                background: #ffffff !important;
                counter-reset: page;
            }

            .print-pad-top {
                padding-top: 40px !important;

            }

            .print-page {
                width: 210mm;
                min-height: 297mm;
                position: relative;
                /* padding:8mm; */
                box-sizing: border-box;
                page-break-inside: avoid !important;
            }

            .print-content {
                flex: 1;
            }

            /* ✅ PDF SAFE FOOTER */
            .print-footer {
                position: absolute;
                bottom: 10mm;
                left: 0;
                width: 100%;
                text-align: center;
                display: flex !important;
                justify-content: center;
                border-top: 1px solid #ccc;
                padding-top: 6px;
            }

            .pageNumber::after {
                counter-increment: page;
                content: counter(page);
            }

            .print-logo {
                height: 50px;
                width: auto;
                object-fit: contain;
            }

            .print-footer img {
                vertical-align: middle;
            }

            /* ✅ Hide only print button */
            .print-button {
                display: none !important;
            }

            /* ✅ FORCE ALL NAVBARS & HEADERS TO SHOW IN PRINT */
            header,
            nav,
            .navbar,
            .navbar-header,
            .mobile-header,
            .page-header,
            .topbar,
            .app-header {
                display: none !important;
                visibility: hidden !important;
                opacity: 1 !important;
                height: auto !important;
                overflow: visible !important;
                position: relative !important;
            }

            /* ✅ OVERRIDE BOOTSTRAP hide classes */
            .d-none,
            .d-print-none {
                display: block !important;
            }

            .print-page {
                display: flex;
                flex-direction: column;
            }

            /* ✅ Avoid page break inside sections */
            .card,
            .card-body,
            .section-block,
            table {
                page-break-inside: avoid !important;
            }

            .card {
                border: none !important;
                box-shadow: none !important;
                margin-bottom: 20px !important;
            }

            table {
                width: 100% !important;
                border-collapse: collapse !important;
                background: white !important;
            }

            th,
            td {
                border: 1px solid #000 !important;
                padding: 6px !important;
                color: #000 !important;
            }

            .table-light th {
                background: #f2f2f2 !important;
                color: #000 !important;
            }

            .page-wrapper,
            .container {
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            /* ALWAYS WRAP LONG TEXT */
            * {
                white-space: normal !important;
                word-break: break-word !important;
            }

            /* STUDENT DETAILS BOX FIX */
            .student-info-box,
            .p-3.bg-light.rounded {
                overflow: visible !important;
                white-space: normal !important;
            }

            /* TABLE TEXT SHOULD NOT BE HIDDEN */
            table td,
            table th {
                white-space: normal !important;
                word-break: break-word !important;
                overflow: visible !important;
            }

            /* FORCE PAGE BREAK */
            .page-break {
                page-break-after: always !important;
            }

        }
    </style>
@endpush
