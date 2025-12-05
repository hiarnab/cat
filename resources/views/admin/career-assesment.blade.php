@extends('layout.admin.app')

@section('content')

<h2 class="mb-4">Career Test Result for {{ $student->name }}</h2>

@foreach($sections as $section)

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0">{{ $section->name }}</h3>
    </div>

    <div class="card-body">

        {{-- 1️⃣ SECTION WITH SUB-SECTIONS (Physics / Chemistry / Biology etc.) --}}
        @if($section->subSections->count() > 0)

            @foreach($section->subSections as $sub)
                <h4 class="mt-4">{{ $sub->name }}</h4>

                @include('admin.question-table', [
                    'questions' => $sub->questions,
                    'sectionName' => $sub->name
                ])
            @endforeach

        {{-- 2️⃣ SECTION WITHOUT SUB-SECTIONS (Mathematics / Languages / Commerce etc.) --}}
        @else

            @include('admin.question-table', [
                'questions' => $section->questions,
                'sectionName' => $section->name
            ])

        @endif

    </div>
</div>

@endforeach

@endsection
