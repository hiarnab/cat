@extends('layout.admin.app')

@section('content')
<div class="page-wrapper">
    <div class="page-body container-xl">
        <h2 class="mb-4">Search Results for "{{ $query }}"</h2>

        @if($students->count() > 0)
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->user->email }}</td>
                            <td>
                                <a href="{{ route('student.result.recommendation', $student->id) }}" class="btn btn-success btn-sm">
                                    View Result & Recommendation
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">No students found matching your search.</p>
        @endif
    </div>
</div>
@endsection
