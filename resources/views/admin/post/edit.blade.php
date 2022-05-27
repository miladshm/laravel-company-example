@extends('admin.layouts.app')
@push('vendor-styles')
@endpush
@section('content')
    @include('admin.partials.breadcrumb', ['items' => [['url' => 'post', 'title' => 'بلاگ']]])
    <div class="content-body"><!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="post" class="ajax-update" novalidate method="post">
                                    <input type="hidden" name="id" value="{{$post->id}}">
                                    @method('put')
                                    <div class="row">
                                        <aside class="col-12 col-md-6">
                                            <x-text-input name="title" label="عنوان" :value="$post->title"
                                                          placeholder="عنوان مطلب را وارد کنید"/>
                                            <x-text-input name="slug" label="نامک" :value="$post->slug"
                                                          placeholder="آدرس مطلب را وارد کنید"/>
                                            <x-select-input-multiple label="گروه" :options="$categories" :values="$post->categories" name="category_id"
                                                                     placeholder="چند گروه انتخاب کنید">
                                            </x-select-input-multiple>
                                            <x-textarea name="summary" id="summary" label="خلاصه مطلب">
                                                {{ $post->summary }}
                                            </x-textarea>
                                        </aside>
                                        <aside class="col-12 col-md-6">
                                            <x-select-input label="نوع" :options="$types" name="type" :value="$post->type"
                                                            placeholder="یک نوع انتخاب کنید">
                                            </x-select-input>
                                            <x-select-tags label="برچسب ها" name="tags" :options="$tags" :values="$post->tags"
                                                           placeholder="چند برچسب انتخاب کنید">
                                            </x-select-tags>
                                            <x-media-select name="photo" id="photo" :value="$post->photo" label="انتخاب کاور" size="128" placeholder="{{asset('images/logoplaceholder.png')}}" />
                                            <x-select-input name="file_source" :options="$file_sources" :value="$post->file_source" id="file_source" label="منبع فایل"/>
                                            <x-text-input name="file" id="file_external" label="کد embed" :value="$post->file" />
                                            <x-media-select name="file" id="file_upload" size="128" :value="$post->file" label="انتخاب فایل" placeholder="{{asset('images/logoplaceholder.png')}}" type="file"/>
                                            <x-switch name="is_active" id="is_active" label="فعال بودن" type="success" :value="$post->is_active" />

                                        </aside>
                                        <aside class="col-12">
                                            <x-summernote  name="body" id="summernote-body" label="متن">
                                                {!! $post->body !!}
                                            </x-summernote>
                                        </aside>
                                        <x-submit />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('page-scripts')
    <script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/forms/select/form-select2.js') }}"></script>
@endpush

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
            });
            if ($("#file_source").val() == 'upload') {
                $("#file_upload-input").removeAttr("disabled").parents(".form-group").show();
                $("#file_external").prop("disabled","disabled").parents(".form-group").hide();
            } else {
                $("#file_upload-input").prop("disabled","disabled").parents(".form-group").hide();
                $("#file_external").removeAttr("disabled").parents(".form-group").show();
            }
        })
    </script>
@endpush

