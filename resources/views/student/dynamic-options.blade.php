@php
$type = $item['type'];
$name = $index;
@endphp

{{-- ✅ MCQ TYPE --}}
@if($type == "mcq")
    @foreach($item['options'] as $key => $opt)
        @php
            $optionLabel = chr(97 + $key); // a, b, c, d...
        @endphp

        <div class="option">
            <label>
                <input 
                    type="radio" 
                    name="{{ $name }}" 
                    value="{{ $opt['id'] }}"  {{-- ✅ SEND ID --}}
                 
                >
                {{ $optionLabel }}) {{ $opt['value'] }}
            </label>
        </div>
    @endforeach
@endif


{{-- ✅ MULTI SELECT TYPE --}}
@if($type == "multi")
    <div class="checkbox-group" data-max="3">
        @foreach($item['options'] as $opt)
            <div class="option">
                <label>
                    <input 
                        type="checkbox" 
                        name="{{ $name }}[]" 
                        value="{{ $opt['id'] }}"  {{-- ✅ SEND ID --}}
                        class="limit-checkbox"
                    >
                    {{ $opt['value'] }}
                </label>
            </div>
        @endforeach
    
        <p class="error-msg" style="color:red; font-size:13px; display:none;">
            You can select only 3 options.
        </p>
    </div>
@endif


{{-- ✅ SINGLE TEXTAREA --}}
@if($type == "textarea")
    <textarea 
        name="{{ $name }}" 
        style="width:100%; height:70px; margin-top:6px;"
    ></textarea>
@endif


{{-- ✅ THREE TEXT INPUTS --}}
@if($type == "textarea3")
    <input type="text" name="{{ $name }}[]" style="width:100%; margin-bottom:10px;">
    <input type="text" name="{{ $name }}[]" style="width:100%; margin-bottom:10px;">
    <input type="text" name="{{ $name }}[]" style="width:100%;">
@endif
