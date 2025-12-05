@php
$type = $item['type'];
$name = "q".$index;
@endphp

@if($type == "mcq")
    @foreach($item['options'] as $key => $val)
        @php
            $optionValue = chr(97 + $key); // a, b, c, d...
        @endphp
        <div class="option">
            <label>
                <input type="radio" name="{{ $name }}" value="{{ $optionValue }}">
                {{ $optionValue }}) {{ $val }}
            </label>
        </div>
    @endforeach
@endif


@if($type == "multi")
    <div class="checkbox-group" data-max="3">
        @foreach($item['options'] as $val)
            <div class="option">
                <label>
                    <input 
                        type="checkbox" 
                        name="{{ $name }}[]" 
                        value="{{ $val }}" 
                        class="limit-checkbox">
                    {{ $val }}
                </label>
            </div>
        @endforeach
    
        <p class="error-msg" style="color:red; font-size:13px; display:none;">
            You can select only 3 options.
        </p>
    </div>
@endif



@if($type == "textarea")
    <textarea name="{{ $name }}" style="width:100%; height:70px; margin-top:6px;"></textarea>
@endif

@if($type == "textarea3")
    <input type="text" name="{{ $name }}[]" style="width:100%; margin-bottom:10px;">
    <input type="text" name="{{ $name }}[]" style="width:100%; margin-bottom:10px;">
    <input type="text" name="{{ $name }}[]" style="width:100%;">
@endif
