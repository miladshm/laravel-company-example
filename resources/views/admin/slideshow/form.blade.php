<div class="row">
    <aside class="col-12 col-md-6">
        <x-text-input name="title" label="عنوان" :value="$item->title ?? null"
                      placeholder="عنوان اسلاید را وارد کنید"/>
        <x-text-input name="subtitle" label="زیرعنوان" :value="$item->subtitle ?? null"
                      placeholder="زیر عنوان را وارد کنید"/>
        <x-text-input name="link" label="لینک" :value="$item->link ?? null"
                      placeholder="لینک را وارد کنید"/>
        <x-switch name="is_active" label="فعال بودن" type="success"
                  :value="$item->is_active ?? 1" id="active" />
    </aside>
    <aside class="col-12 col-md-6">
        <x-media-select name="photo" id="photo" model="slideshow.desktop" :value="$item->photo ?? null" label="انتخاب تصویر اصلی" size="128" placeholder="{{asset('images/logoplaceholder.png')}}" />

    </aside>
    <x-submit />
</div>
