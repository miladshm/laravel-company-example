@extends('admin.layouts.app')
@push('vendor-styles')
@endpush
@section('content')
    @include('admin.partials.breadcrumb', ['items' => [['url' => 'product', 'title' => 'محصولات']]])
    <div class="content-body"><!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12">
                    @method('put')
                    <input hidden name="id" value="{{$product->id}}">
                    <x-card title="مشخصات اصلی">
                        <form action="product" class="ajax-update" novalidate method="post">
                            <div class="row">
                                <aside class="col-12 col-md-6">
                                    <x-text-input name="title" label="عنوان" :value="$product->title"
                                                  placeholder="عنوان مطلب را وارد کنید"/>
                                    <x-text-input name="slug" label="نامک" :value="$product->slug"
                                                  placeholder="آدرس را وارد کنید"/>
                                    <x-textarea name="summary" id="summary" label="توضیح کوتاه محصول">
                                        {{ $product->summary }}
                                    </x-textarea>
                                    <x-select-input label="نوع" :options="$types" name="type"
                                                    placeholder="یک نوع انتخاب کنید"  :value="$product->type">
                                    </x-select-input>

                                </aside>
                                <aside class="col-12 col-md-6">
                                    <x-select-input-multiple label="گروه" :options="$categories" name="categories"
                                                             placeholder="یک یا چند گروه انتخاب کنید" :values="$product->categories" />
                                    <x-select-tags label="برچسب ها" name="tags" :options="$tags" :values="$product->tags"
                                                   placeholder="چند برچسب انتخاب کنید" />
                                    <x-media-select name="photo" id="photo" label="انتخاب کاور" size="128"
                                                    placeholder="{{asset('images/logoplaceholder.png')}}" :value="$product->photo" />
                                    <x-switch name="is_active" label="فعال بودن" type="success"
                                              id="active" :value="$product->is_active" />
                                    <x-switch name="is_available" label="موجود بودن" type="success"
                                              id="avialable" :value="$product->is_available" />
                                </aside>
                                <aside class="col-12">
                                    <x-summernote name="body" id="body" label="متن">{{$product->body}}</x-summernote>
                                </aside>

                            </div>
                            <x-submit />
                        </form>
                    </x-card>
                    <x-card title="ویژگی ها">
                        <form action="attribute-product" method="post"></form>
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="row">
                            <div class="col-6">
                                <x-select-input name="attribute_id" id="attribute_id" label="ویژگی" :options="$attributes" />
                            </div>
                            <div class="col-6">
                                <x-select-input name="option_id" id="option_id" label="گزینه" />
                            </div>
                        </div>
                    </x-card>
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
        $(function (){
            $('#attribute_id').on('change', function () {
                let id = $(this).val();
                $("#option_id").select2({
                    ajax: {
                        url: "get-options/"+id,
                    }
                });
            })
        });
    </script>
@endpush
