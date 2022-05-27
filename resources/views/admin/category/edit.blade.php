@extends('admin.layouts.app')
@push('vendor-styles')
@endpush
@section('content')
    @include('admin.partials.breadcrumb', ['items' => [['url' => 'category', 'title' => 'دسته بندی بلاگ']]])
    <div class="content-body"><!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="category" class="ajax-update" novalidate method="post">
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                    @method('put')
                                    <div class="row">
                                        <aside class="col-12 col-md-6">
                                            <x-text-input name="title" label="عنوان" :value="$category->title"
                                                          placeholder="عنوان مطلب را وارد کنید"/>
                                            <x-text-input name="slug" label="نامک" :value="$category->slug"
                                                          placeholder="آدرس را وارد کنید"/>
                                            <x-switch name="is_active" label="فعال بودن" type="success"
                                                      :value="$category->is_active" id="active" />
                                        </aside>
                                        <aside class="col-12 col-md-6">
                                            <x-select-input label="گروه والد" :options="$categories" :value="$category->parent_id" name="parent_id"
                                                                     placeholder="یک گروه انتخاب کنید">
                                            </x-select-input>
                                            <x-media-select name="photo" id="photo" :value="$category->photo" label="انتخاب کاور" size="128" placeholder="{{asset('images/logoplaceholder.png')}}" />

                                        </aside>
{{--                                        <aside class="col-12">--}}
{{--                                            <x-summernote  name="body" id="summernote-body" label="متن">--}}
{{--                                                {!! $category->body !!}--}}
{{--                                            </x-summernote>--}}
{{--                                        </aside>--}}
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
