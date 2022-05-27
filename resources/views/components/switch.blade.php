<div class="custom-control custom-switch {{ isset($type) ? 'custom-switch-'.$type :  '' }} custom-control-inline my-2">
    <input type="hidden" name="{{$name ?? ''}}" value="0">
    <input type="checkbox" class="custom-control-input" name="{{$name ?? ''}}" value="1"
           @if(isset($value) && $value) checked @endif id="{{$id ?? ''}}">
    <label class="custom-control-label mr-1" for="{{$id ?? ''}}">
    </label>
    <span>{{$label ?? ''}}</span>
</div>
