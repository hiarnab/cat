@extends('layout.admin.app')

@section('content')
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">

            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title mb-0">Search Student Result</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.student.result.page', '') }}" method="GET"
                          onsubmit="event.preventDefault(); window.location=this.action + '/' + document.getElementById('student_id').value;">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <label>Select Student:</label>
                                <select id="student_id" class="form-control">
                                    <option value="">Select student...</option>
                                    @foreach($students as $stu)
                                        <option value="{{ $stu->id }}">
                                            {{ $stu->user->name }} ({{ $stu->user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <button class="btn btn-primary w-100">View Answers</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--single { height: 38px; }
</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#student_id').select2({
            placeholder: 'Select a student...',
            allowClear: true
        });
    });
</script>
@endpush
