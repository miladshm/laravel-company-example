
<div {{ $attributes->merge(["class" => "card"]) }} >
    @isset($title)
        <div class="card-header">
            <div class="card-title">{{$title ?? ''}}</div>
            <div class="float-left"> {{ $btn ?? '' }}</div>
        </div>
    @endisset
    <div class="card-content">
        <div class="card-body">
            {{ $slot }}
        </div>
        @isset($footer)
            <div class="card-footer">
                {{ $footer }}
            </div>
        @endisset
    </div>
</div>
