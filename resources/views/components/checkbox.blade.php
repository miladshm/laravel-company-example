<div class="custom-control custom-checkbox mb-2">
    <input type="hidden" name="{{$name ?? ''}}" value="0">
    <input type="checkbox" class="custom-control-input" name="{{$name ?? ''}}" value="1"
           @if(isset($value) && $value) checked @endif  id="{{$id ?? ''}}">
    <label class="custom-control-label" for="{{$id ?? ''}}">{{$label ?? ''}}</label>
</div>
