@props(['label','placeholder', 'name', 'id', 'value','disabled','type'])

<div class="form-group">
    <label class="col-form-label" for="{{$id ?? ''}}">{{ $label ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control" name="{{ $name ?? '' }}" @isset($disabled) disabled @endisset
           id="{{$id ?? ''}}" placeholder="{{ $placeholder ?? ''  }}" value="{{ $value ?? '' }}">
</div>
