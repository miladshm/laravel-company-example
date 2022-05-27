<a class="btn @if(isset($light) && $light) @isset($type) btn-light-{{$type}} @else btn-light @endisset @else btn-{{$type ?? ''}} @endif" href="{{$link ?? ''}}">
    <i class="bx bx-{{$icon ?? ''}}"></i>
    <span class="align-middle ml-25">{{ $text ?? '' }}</span>
</a>
