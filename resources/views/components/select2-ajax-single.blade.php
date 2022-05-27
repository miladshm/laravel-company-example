@props(['label','placeholder', 'name', 'id', 'options', 'value','url', 'terms'])
<fieldset class="form-group">
    <label class="col-form-label" for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>

    <select class="form-control" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" data-placeholder="{{ $placeholder ?? '' }}">
        {{--            options must be array of id and value pairs --}}
        @if(isset($value))
            <option value="{{ $value['id']}}" selected>{{$value['text'] ?? $value['name'] ?? $value['title']}}</option>
        @endif
        {{ $slot }}
    </select>
</fieldset>
@push('js')
    <script>
        $(function () {
            $("#{{ $id ?? '' }}").select2({
                // dropdownAutoWidth: true,
                width: '100%',
                allowClear: true,
                language: "fa",
                ajax: {
                    url: "{{ $url ?? '' }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        let terms = @json($terms??[]);
                        return {
                            q: params.term, // search term
                            ...terms
                        }
                    },
                    cache: true
                },
                placeholder: '{{ $placeholder ?? '' }}',
                // escapeMarkup: function (markup) {
                //     return markup;
                // }, // let our custom formatter work
                minimumInputLength: 3,
            });

        })
        {{--$("#{{ $id ?? ''}}").select2('data', @json($values))--}}
    </script>

@endpush
