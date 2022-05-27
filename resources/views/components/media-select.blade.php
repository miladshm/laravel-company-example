@props(['label','placeholder', 'name', 'id', 'size', 'value', 'type', 'model'])
<fieldset class="form-group">
    @if(isset($type) && $type != 'photo')
        <div class="form-group">
            <div class="input-group">
                <input type="text" id="{{$id ?? ''}}-input" class="form-control" name="{{ $name ?? '' }}"
                       aria-label="Image" aria-describedby="button-{{$id ?? ''}}"
                       data-preview="{{$name ?? ''}}-preview" value="{{$value ?? ''}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary fm-btn"
                            type="button" id="{{$id ?? ''}}-button"
                            data-input="{{$id ?? ''}}-input">
                        {{ $label ?? '' }}
                    </button>
                    <img id="{{$name ?? ''}}-preview" src="" class="d-none">
                </div>
            </div>
        </div>
    @else
        <div class="media">
            <a href="javascript:void(0);">
                <img
                    src="{{ $value ?? $placeholder ?? config('settings.logo') }}"
                    class="rounded mr-75" alt="profile image"
                    height="{{$size ?? '64'}}"
                    width="{{$size ?? '64'}}" id="{{$name ?? ''}}-preview">
            </a>
            <div class="media-body mt-25">
                <div
                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                    <label for="{{$id ?? ''}}-input" data-input="{{$id ?? ''}}-input"
                           class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0 fm-btn">
                        <span>{{$label ?? ''}}</span>

                    </label>
                    <input id="{{$id ?? ''}}-input" type="hidden"
                           aria-label="Image" name="{{$name ?? ''}}"
                           aria-describedby="fm-btn"
                           value="{{ $value ?? '' }}"
                           data-preview="{{$name ?? ''}}-preview">

                </div>
                <p class="text-muted ml-1 mt-50">
                    <x-photo-size :type="$model??null" />
                </p>
            </div>
        </div>

    @endif
</fieldset>
