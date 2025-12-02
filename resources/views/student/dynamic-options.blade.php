@php
$type = $item['type'];
$name = "q".$index;
@endphp

@if($type == "mcq")
    @foreach($item['options'] as $key => $val)
        <div class="option">
            <label>
                <input type="radio" name="{{ $name }}" value="{{ $val }}">
                {{ chr(97+$key) }}) {{ $val }}
            </label>
        </div>
    @endforeach
@endif

@if($type == "checkbox")
    @foreach($item['items'] as $val)
        <div class="option">
            <label>
                <input type="checkbox" name="{{ $name }}[]" value="{{ $val }}">
                {{ $val }}
            </label>
        </div>
    @endforeach
@endif

@if($type == "textarea")
    <textarea name="{{ $name }}" style="width:100%; height:70px; margin-top:6px;"></textarea>
@endif

@if($type == "textarea3")
    <input type="text" name="{{ $name }}[]" style="width:100%; margin-bottom:10px;">
    <input type="text" name="{{ $name }}[]" style="width:100%; margin-bottom:10px;">
    <input type="text" name="{{ $name }}[]" style="width:100%;">
@endif
