@extends('layout.admin.app')

@section('content')
<div class="page-wrapper">
    <div class="page-body container-xl">

        <h2 class="mb-4">Career Test Result – {{ $student->user->name }}</h2>

        @php
            // Normalize function to match controller answer keys
            $normalize = function($name) {
                return strtolower(str_replace([' ', '-'], '_', $name));
            };
        @endphp

        @foreach($sections as $section)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">{{ $section->name }}</h3>
            </div>
            <div class="card-body">

                @if($section->subSections->count() > 0)
                    {{-- Section has sub-sections --}}
                    @foreach($section->subSections as $sub)
                        <h4 class="mt-3">{{ $sub->name }}</h4>
                        <table class="table table-bordered mt-2">
                            <thead class="table-light">
                                <tr>
                                    <th width="60%">Question</th>
                                    <th width="40%">Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $key = $normalize($sub->name);
                                @endphp
                                @foreach($sub->questions as $question)
                                    @php
                                        $answerModel = $answers[$key][$question->id] ?? null;
                                        if ($answerModel) {
                                            $decoded = json_decode($answerModel->answer_option, true);
                                            $studentAnswer = is_array($decoded) ? implode(', ', $decoded) : $answerModel->answer_option;
                                        } else {
                                            $studentAnswer = null;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            @if($studentAnswer)
                                                {{ $studentAnswer }}
                                            @else
                                                <span class="text-muted">Not Answered</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @else
                    {{-- Section without sub-sections --}}
                    @php
                        $key = $normalize($section->name);
                    @endphp
                    <table class="table table-bordered mt-2">
                        <thead class="table-light">
                            <tr>
                                <th width="60%">Question</th>
                                <th width="40%">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($section->questions as $question)
                                @php
                                    $answerModel = $answers[$key][$question->id] ?? null;
                                    if ($answerModel) {
                                        $decoded = json_decode($answerModel->answer_option, true);
                                        $studentAnswer = is_array($decoded) ? implode(', ', $decoded) : $answerModel->answer_option;
                                    } else {
                                        $studentAnswer = null;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $question->question }}</td>
                                    <td>
                                        @if($studentAnswer)
                                            {{ $studentAnswer }}
                                        @else
                                            <span class="text-muted">Not Answered</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
