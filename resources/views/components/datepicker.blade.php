@props(['label','placeholder', 'name', 'id', 'value'])

<fieldset class="form-group">
    <label class="col-form-label" for="{{$id ?? ''}}">{{ $label ?? '' }}</label>
    <input type="text" class="form-control "
           id="{{$id ?? ''}}" placeholder="{{ $placeholder ?? ''  }}" value="{{ $value ? verta($value)->formatJalaliDate() : '' }}">
    <input type="hidden" name="{{ $name ?? '' }}" class="{{$id ?? ''}}" value="{{ $value ?? '' }}">
</fieldset>

@push('js')
    <script>
        $('#{{$id ?? ''}}').MdPersianDateTimePicker({
            targetTextSelector: '#{{$id ?? ''}}',
            targetDateSelector: '.{{$id ?? ''}}',
        });
    </script>
@endpush
