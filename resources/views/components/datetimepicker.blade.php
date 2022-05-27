@props(['label','placeholder', 'name', 'id', 'value'])

<fieldset class="form-group">
    <label for="{{$id ?? ''}}">{{ $label ?? '' }}</label>
    <input type="text" class="form-control "
           id="{{$id ?? ''}}" placeholder="{{ $placeholder ?? ''  }}" value="{{ isset($value) ? jdate($value)->format('Y/d/j H:i') : '' }}">
    <input type="hidden" name="{{ $name ?? '' }}" class="{{$id ?? ''}}" value="{{ $value ?? '' }}">
</fieldset>

@push('js')
    <script>
        $('#{{$id ?? ''}}').MdPersianDateTimePicker({
            targetTextSelector: '#{{$id ?? ''}}',
            targetDateSelector: '.{{$id ?? ''}}',
            dateFormat: 'yyyy-MM-dd HH:mm:ss',
            enableTimePicker: true
        });
    </script>
@endpush
