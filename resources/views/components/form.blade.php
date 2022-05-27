<div class="card">
    <div class="card-body">
        <form action="{{ $path }}" method="post" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-xl-12">
                <input type="file" class="form-control-file input-image" id="formImage"
                       name="FORM_IMAGE[]" multiple>
                <label for="formImage" class="input-image-label" id="image-text">
                                    <span class="buttonImage">
                                        <i class="mdi mdi-camera"></i>
                                        <span>تصاویر خود را بارگذاری کنید</span>
                                    </span>
                </label>
                @error("FORM_IMAGE")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-xl-12">
                {!! Form::label("form-name", "نام ".$title, ["class"=>"col-form-label"]) !!}
                {!! Form::text("FORM_NAME", old("FORM_NAME"), ["class"=>"form-control","id"=>"form-name","placeholder"=>"حداقل 8 کاراکتر", "autocomplete"=>"off"]) !!}
                @error("FORM_NAME")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-xl-12">
                {!! Form::label("form-unit", "واحد", ["class"=>"col-form-label"]) !!}
                {!! Form::text("FORM_UNIT", old("FORM_UNIT"), ["class"=>"form-control","id"=>"form-unit", "autocomplete"=>"off"]) !!}
                @error("FORM_UNIT")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-xl-12">
                {!! Form::label("form-unit", "ابعاد", ["class"=>"col-form-label"]) !!}
                <div class="row">
                    {!! Form::text("FORM_DIME[LENGTH]", old("FORM_DIME.LENGTH"), ["class"=>"form-control col-xl-4","id"=>"form-length", "placeholder"=>"طول", "autocomplete"=>"off"]) !!}
                    {!! Form::text("FORM_DIME[WIDTH]", old("FORM_DIME.WIDTH"), ["class"=>"form-control col-xl-4","id"=>"form-width", "placeholder"=>"عرض", "autocomplete"=>"off"]) !!}
                    {!! Form::text("FORM_DIME[HEIGHT]", old("FORM_DIME.HEIGHT"), ["class"=>"form-control col-xl-4","id"=>"form-height", "placeholder"=>"ارتفاع", "autocomplete"=>"off"]) !!}
                </div>
                @error("FORM_DIME.*")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-xl-12">
                {!! Form::label("form-weight", "وزن", ["class"=>"col-form-label"]) !!}
                {!! Form::text("FORM_WEIGHT", old("FORM_WEIGHT"), ["class"=>"form-control","id"=>"form-weight", "placeholder"=>"مقدار وزن را وارد کنید", "autocomplete"=>"off"]) !!}
                <small class="text-info" id="weight-text">شامل عدد بدون وارد کردن واحد شمارش</small>
                @error("FORM_WEIGHT")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-xl-12">
                {!! Form::label("form-time", "زمان تولید", ["class"=>"col-form-label"]) !!}
                {!! Form::text("PRODUCTION_TIME", old("PRODUCTION_TIME"), ["class"=>"form-control","id"=>"form-time", "autocomplete"=>"off"]) !!}
                @error("PRODUCTION_TIME")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-xl-6">
                {!! Form::label("form-rial-price", "قیمت ریالی", ["class"=>"col-form-label"]) !!}
                <div class="input-group">
                    {!! Form::text("RIAL_PRICE", old("RIAL_PRICE"), ["class"=>"form-control", "id"=>"form-rial-price", "placeholder"=>"مقدار قیمت را وارد کنید", "autocomplete"=>"off"]) !!}
                    <span class="input-group-text">ریال</span>
                </div>
                @error("RIAL_PRICE")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-xl-6">
                {!! Form::label("form-dollar-price", "قیمت دلاری", ["class"=>"col-form-label"]) !!}
                <div class="input-group">
                    {!! Form::text("DOLLAR_PRICE", old("DOLLAR_PRICE"), ["class"=>"form-control", "id"=>"form-dollar-price", "placeholder"=>"مقدار قیمت را وارد کنید", "autocomplete"=>"off"]) !!}
                    <span class="input-group-text">دلار</span>
                </div>
                @error("DOLLAR_PRICE")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-3 col-xl-12">
                <a href="{{ $customize }}" class="btn btn-link">
                    <i class="mdi mdi-plus-circle-outline"></i>
                    <span>افزودن فیلد سفارشی</span>
                </a>
                {!! Form::submit('ثبت', ["class"=>"btn btn-primary w-100"]) !!}
            </div>
        </form>
    </div>
</div>
