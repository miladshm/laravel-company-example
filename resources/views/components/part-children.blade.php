<ul class="list-unstyled line-height-p">
    @foreach($part->childs as $child)
        <li>
            <a href="{{ route('parts.show', $child->id) }}">{{ $child->name }}</a>
            <small>
                &nbsp;قیمت: {{number_format($child->price)}}
                &nbsp;تعداد: {{$child->pivot->count}}
                &nbsp;زمان تولید: {{$child->production_time}}
            </small>
            @if ($child->childs->first())
                <x-part-children :part="$child" />
            @endif
        </li>
    @endforeach
</ul>
