@props(['label','placeholder', 'name', 'id', 'options', 'values'])
<fieldset class="form-group">
    <label for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
    <select class="form-control select2-tags" multiple name="{{ $name ?? '' }}[]" id="{{ $id ?? '' }}" data-placeholder="{{ $placeholder ?? '' }}">
        <option value="">{{ $placeholder ?? '' }}</option>
        {{--            options must be array of id and value pairs --}}
        @isset( $options )
            @if(is_array($options) && \Illuminate\Support\Arr::isAssoc($options))
                @foreach($options as $id => $option)
                    <option value="{{ $id }}"
                            @if(isset($values) && (($values instanceof \Illuminate\Database\Eloquent\Collection && $values->contains($id)) || (is_array($values) && in_array($id,$values))) )
                            selected
                        @endif>
                        {{ $option }}
                    </option>
                @endforeach
            @elseif($options instanceof \Illuminate\Database\Eloquent\Collection)
                @foreach($options as $option)
                    <option value="{{ $option->title ?? $option->name ?? $option->value ?? '' }}"
                            @if(isset($values) && (($values instanceof \Illuminate\Database\Eloquent\Collection && $values->contains($option->id)) || (is_array($values) && in_array($option->id,$values))) )
                            selected
                        @endif>
                        {{ $option->title ?? $option->name ?? $option->value ?? '' }}
                    </option>
                @endforeach
            @endif
        @endisset
        {{ $slot }}
    </select>
</fieldset>
@push('js')
    <script>
        $(function () {
            $("#{{ $id ?? '' }}").select2({
                dropdownAutoWidth: true,
                width: '100%',
                language: "fa",
                ajax: {
                    url: "{{route('admin.user-list')}}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                        };
                    },
                    cache: true
                },
                placeholder: '',
                // escapeMarkup: function (markup) {
                //     return markup;
                // }, // let our custom formatter work
                minimumInputLength: 3,
                // templateResult: formatRepo,
                // templateSelection: formatRepoSelection
            });

        })


    </script>

@endpush
