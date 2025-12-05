@extends('layout.admin.app')

@section('content')
<div class="page-wrapper">
    <div class="page-body container-xl">
        <h2 class="mb-4">Search Students</h2>

        <form action="{{ route('students.search.results') }}" method="GET">
            <div class="input-group mb-3">
                <input list="students_list" name="query" class="form-control" placeholder="Type or select a student" required>
                <datalist id="students_list">
                    @foreach($students as $stu)
                        <option value="{{ $stu->user->name }} ({{ $stu->user->email }})" data-id="{{ $stu->id }}"></option>
                    @endforeach
                </datalist>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
@endsection
