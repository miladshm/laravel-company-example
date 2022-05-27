@props(['label','placeholder', 'name', 'id', 'options', 'values','url', 'terms'])
<fieldset class="form-group">
    <label for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
    <select class="form-control select2-tags" multiple name="{{ $name ?? '' }}[]" id="{{ $id ?? '' }}" data-placeholder="{{ $placeholder ?? '' }}">
        {{--            options must be array of id and value pairs --}}
        @if(isset($values) && count($values))
            @foreach($values as $value)
                <option value="{{$value['id']}}" selected>{{$value['text'] ?? $value['title'] ?? $value['name']}}</option>
            @endforeach
        @endif
        {{ $slot }}
    </select>
</fieldset>
@push('js')
    <script>
        $(function () {
            $("#{{ $id ?? '' }}").select2({
                // dropdownAutoWidth: true,
                // width: '100%',
                allowClear: true,
                language: "fa",
                ajax: {
                    url: "{{ $url ?? '' }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        let terms = @json($terms ?? []);
                        return {
                            q: params.term, // search term
                            ...terms
                        };
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
