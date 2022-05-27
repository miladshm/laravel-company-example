<form action="{{route('admin.contact-info.update', $contactInfo->id)}}" method="post" class="ajax-update" data-table="#contactTable">
    @method('put')
    <div class="row">
        <div class="col-12 col-md-6">
            <x-text-input name="title" label="عنوان" :value="$contactInfo->title" id="title" placeholder="عنوان راه ارتباطی را وارد کنید" />
        </div>
        <div class="col-12 col-md-6">
            <x-select-input name="group" label="نوع" id="title" :value="$contactInfo->group" placeholder="عنوان راه ارتباطی را وارد کنید" :options="$contact_groups" />
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label>نوع</label>
                <select class="select2-icons form-control"
                        id="select2-icons" name="type"
                        onchange="$('[name=\'icon\']').val($(this).find(':selected').data('icon'))"
                        onload="$('[name=\'icon\']').val($(this).find(':selected').data('icon')); $(this).val('{{$contactInfo->type}}')">
                    <option value="">یک نوع انتخاب کنید ...</option>
                    <option value="address" data-icon="bx bx-map"
                    @if($contactInfo->type == 'address') selected @endif>
                        آدرس
                    </option>
                    <option value="phone" data-icon="bx bx-phone"
                            @if($contactInfo->type == 'phone') selected @endif>
                        تلفن
                    </option>
                    <option value="mobile" data-icon="bx bx-mobile"
                            @if($contactInfo->type == 'mobile') selected @endif>
                        موبایل
                    </option>
                    <option value="email" data-icon="bx bx-envelope"
                            @if($contactInfo->type == 'email') selected @endif>
                        ایمیل
                    </option>
                    <option value="fax" data-icon="bx bx-printer"
                            @if($contactInfo->type == 'fax') selected @endif>
                        فاکس
                    </option>
                </select>
                <input name="icon" type="hidden" value="{{$contactInfo->icon}}">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <div class="controls">
                    <label>مقدار</label>
                    <input type="text"
                           class="form-control text-left"
                           placeholder="عنوان سایت" name="value"
                           required value="{{$contactInfo->value}}"
                           data-validation-required-message="وارد کردن مقدار الزامی است"
                           dir="ltr">
                </div>
            </div>
        </div>
        <div
            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
            <button type="submit"
                    class="btn btn-primary glow mb-1">ذخیره
            </button>
        </div>
    </div>

</form>
