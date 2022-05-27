<label class="col-form-label" for="{{$id ?? ''}}-thumbnail">{{ $label ?? '' }}</label>
<div class="input-group">
    <input id="{{$id ?? ''}}-thumbnail" class="form-control input-group-text" type="text" name="{{ $name ?? '' }}" value="{{$value ?? ''}}">
    <span class="input-group-btn input-group-append">
     <button type="button" id="{{$id ?? ''}}" data-input="{{$id ?? ''}}-thumbnail" data-preview="{{$id ?? ''}}-holder" class="btn btn-outline-primary">
        انتخاب تصویر
         <i class="fa fa-image"></i>
     </button>
   </span>
</div>
<div class="my-2" id="{{$id ?? ''}}-holder">
    <img class="border p-1" src="{{$value ?? ''}}" style="max-height:100px;">
</div>

@push('js')
    <script>
        $('#{{$id ?? ''}}').filemanager('image');
    </script>
@endpush
