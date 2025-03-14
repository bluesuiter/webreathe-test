@php 
    $name = isset($name) ? preg_replace("/[^A-Za-z0-9 _-]/", '', $name) : exit('<span style="color:red;">Must define name!</span>');
    $id = isset($id) ? $id : $name; 
    $class = isset($class) ? $class : ''; 
    $label = isset($label) ? $label : ucwords(str_replace(['_', '-'], " ", $name));
    $attributes = (isset($attributes) && !empty($attributes) ? implode(' ', $attributes) : '');
    $value = (isset($value) && $value != '' ? $value : old($name));
    $required = isset($required) && $required == true ? 'required' : false;
    $maxlength = isset($maxlength) ? 'maxlength=' . $maxlength : '';
@endphp

    @if ($label != '')
        <label for="{{ $name }}" class="form-label">
            {{ $label }} 
            {!! $required == true ? '<span class="text-danger">*</span>' : '' !!}
        </label>
    @endif

@switch($type)
    
    @case('text')
    @case('email')
    @case('tel')
    @case('number')
    @case('password')
    @case('file')
            <input id="{{ $id }}" type="{{ $type }}" {{ $maxlength }} placeholder="{{ $placeholder ?? $label }}" class="form-control {{ $class ?? '' }}" name="{{ $name }}" value="{{ $value }}" {{ $required }} {{ $attributes }} />
            @if ($errors->has($name))
                <span class="help-block">
                    <strong>{{ $errors->first($name) }}</strong>
                </span>
            @endif
        @break

            
    @case('select')
            <select id="{{ $id }}" class="form-control form-control-sm {{ $class ?? '' }}" name="{{ $name }}" {{ $required }} {{ $attributes }}>
                <option value="">Select {{ $label }}</option>
                @if(isset($options) && !empty($options))
                    @if(isset($value) && is_array($value))
                        @foreach($options as $key => $val)
                            <option {{ in_array($key, $value) ? "selected" : "" }} value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    @else
                        @foreach($options as $key => $val)
                            <option {{ ($value) == $key ? "selected" : "" }} value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    @endif
                @endif
            </select>
            @if ($errors->has($name))
                <span class="help-block">
                    <strong>{{ $errors->first($name) }}</strong>
                </span>
            @endif
        @break


    @case('submit') 
    @case('button')
            <button id="{{ $id }}" type="{{ $type }}" class="btn btn-default {{ $class ?? '' }}" name="{{ $name }}" {{ $attributes }}>
                {!! $text ?? 'Submit' !!}
            </button>
        @break
            

    @case('checkbox')
        <div class="form-check">
            @php $checked = isset($checked) ? $checked : ''; @endphp
            <input id="{{ $id }}" type="checkbox" class="form-check-input {{ $class ?? '' }}" name="{{ $name }}" value="{{ $value ?? 1 }}" {{ $checked }} {{ $required }} {{ $attributes }} />
            @if ($label != '')
                <label for="{{ $name }}" class="form-check-label">{{ $valueLabel ?? '' }} {!! $required == true ? '<span class="text-danger">*</span>' : '' !!}</label>
            @endif
                @if ($errors->has($name))
                    <span class="help-block">
                        <strong>{{ $errors->first($name) }}</strong>
                    </span>
                @endif
        </div>
        @break    
        

    @case('textarea') 
            <textarea id="{{ $id }}" placeholder="{{ $placeholder ?? $label }}" class="form-control {{ $class ?? '' }}" name="{{ $name }}" {{ $required }} {{ $attributes }}>{{ $value }}</textarea>
            @if ($errors->has($name))
                <span class="help-block">
                    <strong>{{ $errors->first($name) }}</strong>
                </span>
            @endif
        @break
        

    @case('hidden')
        <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" />
        @break
        
@endswitch