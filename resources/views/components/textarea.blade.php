@props(['label', 'name', 'id'])

<fieldset>
    <fieldset class="form-group">
        <label class="col-form-label" for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
        <textarea {{$attributes->merge(['rows' => 4, 'class' => 'form-control'])}} name="{{ $name ?? '' }}" id="{{ $id ?? '' }}">{{ $slot }}</textarea>
    </fieldset>
</fieldset>
