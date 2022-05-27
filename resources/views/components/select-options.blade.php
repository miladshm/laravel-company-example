@props(['label','placeholder', 'name', 'id', 'options' , 'value', 'values'])
@isset( $options )
    @if(is_array($options) && \Illuminate\Support\Arr::isAssoc($options))
        @foreach($options as $id => $option)
            <option value="{{ $id }}"
                    @if(isset($value) && $id == $value )
                    selected
                    @endif
                    @if(isset($values) && (($values instanceof \Illuminate\Database\Eloquent\Collection && $values->contains($id)) ||
                                            (is_array($values) && in_array($id,$values)))) selected @endif>
                {{ $option }}
            </option>
        @endforeach
    @elseif($options instanceof \Illuminate\Database\Eloquent\Collection)
        @foreach($options as $option)
            <option value="{{ $option->id ?? '' }}"
                    @if(isset($value) && $option->id == $value)
                    selected
                    @endif
                    @if(isset($values) && (($values instanceof \Illuminate\Database\Eloquent\Collection && $values->contains($option->id)) ||
                                            (is_array($values) && in_array($option->id,$values)))) selected @endif>
            @for($i=0;$i<$option->depth;$i++) {{' - '}} @endfor{{ $option->title ?? $option->name ?? $option->value ?? '' }}
        </option>
        @if(count($option['children']))
            <x-select-options :options="$option['children']" :values="$values ?? []" :value="$value ?? null" />
        @endif
    @endforeach
@endif
@endisset

