@props(['label', 'name', 'id'])

<fieldset>
    <fieldset class="form-group">
        <label for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
        <textarea rows="10" name="{{ $name ?? '' }}" id="gutenberg-{{ $id ?? '' }}" class="form-control" hidden>
            {{ $slot }}
        </textarea>
    </fieldset>
</fieldset>
@push('page-scripts')
<script>
    Laraberg.init('gutenberg-{{ $id ?? '' }}',{
        laravelFilemanager: { prefix: '/file-manager/fm-button' },
        sidebar: true
    })

</script>
@endpush
