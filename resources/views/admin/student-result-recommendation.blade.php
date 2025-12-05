@extends('layout.admin.app')

@section('content')

<div class="page-wrapper bg-light py-5 min-vh-100">
  <div class="container">

    <!-- ✅ HEADER -->
    <div class="card shadow-sm mb-4">
      <div class="card-body bg-primary text-white text-center">
        <h3 class="mb-0">
          <i class="fas fa-chart-line"></i> Career Assessment Report
        </h3>
      </div>
    </div>

    <!-- ✅ MARKSHEET -->
    <div class="card shadow border-0">
      <div class="card-body p-4">

        <!-- ✅ TITLE -->
        <div class="text-center mb-4 border-bottom pb-3">
          <h2 class="fw-bold">Career Stream Assessment Report</h2>
          <p class="text-muted mb-0">Based on your performance and interests</p>
        </div>

        <!-- ✅ STUDENT DETAILS -->
        <div class="row g-3 mb-4">
          <div class="col-md-3">
            <div class="p-3 bg-light rounded">
              <small class="text-muted d-block">Student Name</small>
              <strong>{{ $student->user->name }}</strong>
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
              <small class="text-muted d-block">Test Date</small>
              <strong>{{ now()->format('d-m-Y') }}</strong>
            </div>
          </div>

          <div class="col-md-3">
            <div class="p-3 bg-light rounded">
              <small class="text-muted d-block">Test Time</small>
              <strong>{{ now()->format('h:i A') }}</strong>
            </div>
          </div>
        </div>

        <!-- ✅ SUBJECT SCORES -->
        <h4 class="text-primary mb-3">Subject-wise Scores</h4>

        <div class="row g-3 mb-4">
          @foreach($scores as $subject => $score)
            <div class="col-md-3 col-sm-6">
              <div class="border rounded p-3 text-center bg-light">
                <h6 class="text-dark mb-2">
                  {{ ucfirst(str_replace('_',' ',$subject)) }}
                </h6>
                <div class="fs-3 fw-bold text-success">{{ $score }}</div>
                <small class="text-muted">{{ $percentages[$subject] }}%</small>
              </div>
            </div>
          @endforeach
        </div>

        <!-- ✅ STREAM RECOMMENDATION -->
        <div class="bg-success bg-opacity-10 p-4 rounded mb-4 border-start border-4 border-success">
          <h4 class="fw-bold">
            <i class="fas fa-bullseye"></i> Stream Recommendation
          </h4>

          <div class="bg-white p-3 rounded shadow-sm mt-2">
            <strong>{{ $recommendation }}</strong>
            <p class="mb-0 mt-2">
              This stream is suggested based on your strongest subject performance.
            </p>
          </div>
        </div>

        <!-- ✅ CAREER GUIDANCE -->
        <h4 class="text-primary">Career Guidance</h4>

        <div class="bg-white border rounded p-3 shadow-sm mb-4">
          @if(str_contains($recommendation, 'Engineering'))
            Engineering, AI, Robotics, Data Science, Architecture, Research.
          @elseif(str_contains($recommendation, 'Medical'))
            MBBS, Nursing, Pharmacy, Biotechnology, Clinical Research.
          @elseif(str_contains($recommendation, 'Commerce'))
            CA, CS, BBA, MBA, Accounting, Finance, Entrepreneurship.
          @elseif(str_contains($recommendation, 'Humanities'))
            Law, Civil Services, Journalism, Psychology, Literature, Teaching.
          @else
            Career guidance will be provided after expert counseling.
          @endif
        </div>

        <!-- ✅ ACTION BUTTONS -->
        <div class="text-end">
          <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">
            <i class="fas fa-arrow-left"></i> Back
          </a>

          <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print"></i> Print Report
          </button>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection
