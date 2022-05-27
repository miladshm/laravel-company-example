
<form action="post" class="ajax-create" novalidate method="post">
                                    <div class="row">
                                        <aside class="col-12 col-md-6">
                                            <x-text-input name="title" label="عنوان"
                                                          placeholder="عنوان مطلب را وارد کنید"/>
                                            <x-text-input name="slug" label="نامک"
                                                          placeholder="آدرس مطلب را وارد کنید"/>
                                            <x-select-input-multiple label="گروه" :options="$categories" name="category_id"
                                                                     placeholder="چند گروه انتخاب کنید">
                                            </x-select-input-multiple>
                                            <x-textarea name="summary" id="summary" label="خلاصه مطلب">
                                            </x-textarea>
                                        </aside>
                                        <aside class="col-12 col-md-6">
                                            <x-select-input label="نوع" :options="$types" name="type"
                                                            placeholder="یک نوع انتخاب کنید">
                                            </x-select-input>
                                            <x-select-tags label="برچسب ها" name="tags"
                                                           placeholder="چند برچسب انتخاب کنید">
                                            </x-select-tags>
                                            <x-media-select name="photo" id="photo" label="انتخاب کاور" size="128" placeholder="{{asset('images/logoplaceholder.png')}}" />
                                            <x-select-input name="file_source" :options="$file_sources" id="file_source" label="منبع فایل"/>
                                            <x-text-input name="file" id="file_external" label="کد embed" />
                                            <x-media-select name="file" id="file_upload" label="انتخاب فایل" placeholder="{{asset('images/logoplaceholder.png')}}" type="file"/>
                                            <x-switch name="is_active" id="is_active" label="فعال بودن" type="success" />
                                        </aside>
                                        <aside class="col-12">
                                            <x-summernote  name="body" id="summernote-body" label="متن"></x-summernote>
                                        </aside>
                                        <x-submit />
                                    </div>
                                </form>


@push('inline-scripts')
    <script>
        $(function () {
            $("#file_external").prop("disabled","disabled").parents(".form-group").hide();
            $("#file_upload-input").prop("disabled","disabled").parents(".form-group").hide();
            $("#file_source").on("change", function () {
                if ($(this).val() == 'upload') {
                    $("#file_upload-input").removeAttr("disabled").parents(".form-group").show();
                    $("#file_external").prop("disabled","disabled").parents(".form-group").hide();
                } else {
                    $("#file_upload-input").prop("disabled","disabled").parents(".form-group").hide();
                    $("#file_external").removeAttr("disabled").parents(".form-group").show();
                }
            })
        })
    </script>
@endpush
