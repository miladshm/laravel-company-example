@props(['label','placeholder', 'name', 'id', 'options' , 'value'])
<div class="form-group">
    <label class="col-form-label" for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
    <select class="form-control select2" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" data-placeholder="{{ $placeholder ?? '' }}">
        <option value="">{{ $placeholder ?? '' }}</option>
        {{--            options must be array of id and value pairs --}}
        <x-select-options :options="$options" :value="$value ?? null" />
        {{ $slot }}
    </select>
</div>
