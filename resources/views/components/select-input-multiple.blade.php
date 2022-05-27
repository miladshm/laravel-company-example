@props(['label','placeholder', 'name', 'id', 'options', 'values'])
<div class="form-group">
    <label class="col-form-label" for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
    <select class="form-control select2" multiple name="{{ $name ?? '' }}[]" id="{{ $id ?? '' }}" data-placeholder="{{ $placeholder ?? '' }}">
        {{--            options must be array of id and value pairs --}}
        <x-select-options :options="$options" :values="$values ?? null" />
        {{ $slot }}
    </select>
</div>
