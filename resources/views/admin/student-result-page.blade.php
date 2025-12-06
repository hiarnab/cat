@extends('layout.admin.app')

@section('content')
<div class="page-wrapper">
    <div class="page-body container-xl">

        <h2 class="mb-4">Career Test Result – {{ $student->user->name }}</h2>

        @php
            $normalize = function ($name) {
                return strtolower(str_replace([' ', '-'], '_', $name));
            };
        @endphp

        @foreach ($sections as $section)

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">{{ $section->name }}</h3>
                </div>

                <div class="card-body">

                    {{-- ✅ SECTION WITH SUB-SECTIONS --}}
                    @if ($section->subSections->count() > 0)

                        @foreach ($section->subSections as $sub)

                            <h4 class="mt-3">{{ $sub->name }}</h4>

                            @php $key = $normalize($sub->name); @endphp

                            <table class="table table-bordered mt-2">
                                <thead class="table-light">
                                    <tr>
                                        <th width="60%">Question</th>
                                        <th width="40%">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sub->questions as $question)

                                        @php
                                            $answerModel = $answers[$key][$question->id] ?? null;
                                        @endphp

                                        <tr>
                                            <td>{{ $question->question }}</td>
                                            <td>
                                                @if ($answerModel)

                                                    @php
                                                        $raw = $answerModel->answer_option;
                                                        $decoded = json_decode($raw, true);
                                                    @endphp

                                                    {{-- ✅ MULTIPLE JSON ANSWER --}}
                                                    @if (is_array($decoded))

                                                        {{-- ✅ IF JSON CONTAINS OPTION IDS --}}
                                                        @if (is_numeric($decoded[0] ?? null))

                                                            @php
                                                                $options = \App\Models\AnswerOption::whereIn('id', $decoded)->get();
                                                            @endphp

                                                            <ul class="mb-0">
                                                                @foreach ($options as $opt)
                                                                    <li>
                                                                        <strong>({{ $opt->option }})</strong>
                                                                        {{ $opt->option_value }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                        {{-- ✅ IF JSON CONTAINS FULL TEXT --}}
                                                        @else
                                                            <ul class="mb-0">
                                                                @foreach ($decoded as $item)
                                                                    <li>{{ $item }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif

                                                    {{-- ✅ SINGLE MCQ --}}
                                                    @elseif ($answerModel->answer_id && isset($answerModel->answerOption))
                                                        <strong>({{ $answerModel->answerOption->option }})</strong>
                                                        {{ $answerModel->answerOption->option_value }}

                                                    {{-- ✅ SINGLE TEXT --}}
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

                        @endforeach

                    {{-- ✅ SECTION WITHOUT SUB-SECTIONS --}}
                    @else

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

                                    @php
                                        $answerModel = $answers[$key][$question->id] ?? null;
                                    @endphp

                                    <tr>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            @if ($answerModel)

                                                @php
                                                    $raw = $answerModel->answer_option;
                                                    $decoded = json_decode($raw, true);
                                                @endphp

                                                {{-- ✅ MULTIPLE JSON ANSWER --}}
                                                @if (is_array($decoded))

                                                    {{-- ✅ OPTION ID JSON --}}
                                                    @if (is_numeric($decoded[0] ?? null))

                                                        @php
                                                            $options = \App\Models\AnswerOption::whereIn('id', $decoded)->get();
                                                        @endphp

                                                        <ul class="mb-0">
                                                            @foreach ($options as $opt)
                                                                <li>
                                                                    <strong>({{ $opt->option }})</strong>
                                                                    {{ $opt->option_value }}
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                    {{-- ✅ PLAIN TEXT JSON --}}
                                                    @else
                                                        <ul class="mb-0">
                                                            @foreach ($decoded as $item)
                                                                <li>{{ $item }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                {{-- ✅ SINGLE MCQ --}}
                                                @elseif ($answerModel->answer_id && isset($answerModel->answerOption))
                                                    <strong>({{ $answerModel->answerOption->option }})</strong>
                                                    {{ $answerModel->answerOption->option_value }}

                                                {{-- ✅ SINGLE TEXT --}}
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

                    @endif

                </div>
            </div>

        @endforeach

    </div>
</div>
@endsection
