@extends('admin.layouts.app')
@push('vendor-styles')
@endpush
@section('content')
    @include('admin.partials.breadcrumb', ['items' => [['url' => 'product', 'title' => 'محصولات']]])
    <div class="content-body"><!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="product" class="product-create" novalidate method="post">
                                    <div class="row">
                                        <aside class="col-12 col-md-6">
                                            <x-text-input name="title" label="عنوان"
                                                          placeholder="عنوان مطلب را وارد کنید"/>
                                            <x-text-input name="slug" label="نامک"
                                                          placeholder="آدرس را وارد کنید"/>
                                            <x-textarea name="summary" id="summary" label="توضیح کوتاه محصول" />
                                            <x-select-input label="نوع" :options="$types" name="type"
                                                            placeholder="یک نوع انتخاب کنید">
                                            </x-select-input>

                                        </aside>
                                        <aside class="col-12 col-md-6">
                                            <x-select-input-multiple label="گروه" :options="$categories" name="categories"
                                                                     placeholder="یک یا چند گروه انتخاب کنید" />
                                            <x-select-tags label="برچسب ها" name="tags"
                                                           placeholder="چند برچسب انتخاب کنید" />
                                            <x-media-select name="photo" id="photo" label="انتخاب کاور" size="128"
                                                            placeholder="{{asset('images/logoplaceholder.png')}}" />
                                            <x-switch name="is_active" label="فعال بودن" type="success"
                                                      id="active" />
                                            <x-switch name="is_available" label="موجود بودن" type="success"
                                                      id="avialable" />
                                        </aside>
                                        <aside class="col-12">
                                            <x-summernote name="body" id="body" label="متن"/>
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

@push('vendor-scripts')
    <script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/forms/select/form-select2.js') }}"></script>

@endpush

@push('inline-scripts')
    <script>
        $(function (){
            $(".product-create").ajaxSubmit({
                callback(data){
                    location.href = data.url;
                }
            });
        });
    </script>
@endpush
