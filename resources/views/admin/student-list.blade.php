@extends('layout.admin.app')

@push('css')
@endpush

@section('content')
    <!-- ✅ REQUIRED Tabler Wrapper -->
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">

                <div class="row row-cards">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover text-nowrap align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>School Name</th>
                                            <th>Parent Contact</th>
                                            <th>Parent WhatsApp</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($students as $key => $student)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->user->email }}</td>
                                                <td>{{ $student->school_name }}</td>
                                                <td>{{ $student->guardian_mobile }}</td>
                                                <td>{{ $student->guardian_whatsapp }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-sm"
                                                        onclick="viewStudent({{ json_encode($student) }})"
                                                        data-bs-toggle="modal" data-bs-target="#studentModal">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">
                                                    No students found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <!-- ✅ PAGINATION -->
                                <div class="mt-4 d-flex justify-content-center">
                                    {{ $students->links('pagination::bootstrap-5') }}
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ✅ STUDENT VIEW MODAL -->
    <div class="modal modal-blur fade" id="studentModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <table class="table table-bordered">
                        <tr>
                            <th>Student Name</th>
                            <td id="view_name"></td>
                        </tr>
                        <tr>
                            <th>Current Class</th>
                            <td id="view_class"></td>
                        </tr>
                        <tr>
                            <th>School Name</th>
                            <td id="view_school"></td>
                        </tr>
                        <tr>
                            <th>Future Stream</th>
                            <td id="view_stream"></td>
                        </tr>
                        <tr>
                            <th>Student Mobile</th>
                            <td id="view_mobile"></td>
                        </tr>
                        <tr>
                            <th>Parent Contact</th>
                            <td id="view_parent_mobile"></td>
                        </tr>
                        <tr>
                            <th>Parent WhatsApp</th>
                            <td id="view_parent_whatsapp"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="view_email"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td id="view_address"></td>
                        </tr>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        function viewStudent(student) {
            document.getElementById('view_name').innerText = student.name ?? '-';
            document.getElementById('view_class').innerText = student.current_class ?? '-';
            document.getElementById('view_school').innerText = student.school_name ?? '-';
            document.getElementById('view_stream').innerText = student.future_stream ?? '-';
            document.getElementById('view_mobile').innerText = student.mobile ?? '-';
            document.getElementById('view_parent_mobile').innerText = student.guardian_mobile ?? '-';
            document.getElementById('view_parent_whatsapp').innerText = student.guardian_whatsapp ?? '-';
            document.getElementById('view_email').innerText = student.email ?? '-';
            document.getElementById('view_address').innerText = student.address ?? '-';
        }
    </script>
@endpush
