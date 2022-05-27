<fieldset class="form-group">
    <div class="radio">
        <input type="radio" name="{{$name ?? ''}}" id="{{$id ?? ''}}" @isset($checked) checked @endisset
               @if(isset($value) && $value) value="{{$value}}" @endif>
        <label for="{{$id ?? ''}}">{{$label ?? ''}}</label>
    </div>
</fieldset>
