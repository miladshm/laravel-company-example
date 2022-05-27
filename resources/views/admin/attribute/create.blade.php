@extends('admin.layouts.app')
@push('vendor-styles')
@endpush
@section('content')
    @include('admin.partials.breadcrumb', ['items' => [['url' => 'attribute', 'title' => 'ویژگی ها']]])
    <div class="content-body"><!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="attribute" class="ajax-create" novalidate method="post">
                                    <div class="row">
                                        <aside class="col-12 col-md-6">
                                            <x-text-input name="title" label="عنوان"
                                                          placeholder="عنوان مطلب را وارد کنید"/>
                                            <x-switch name="use_as_filter" label="استفاده به عنوان فیلتر" type="success" id="use_as_filter"/>
                                            <x-switch label="فعال کردن پالت رنگی" type="success"
                                                      id="is_color" :value="0" />
                                        </aside>
                                        <div class="col-12 col-md-7">
                                        <x-card title="گزینه ها">
                                        <div class="repeater-default">
                                            <div data-repeater-list="options">
                                                <div data-repeater-item>
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-7 col-sm-12 form-group">
                                                            <x-text-input label="عنوان گزینه" name="options[][title]" placeholder="عنوان گزینه را وارد کنید" />
                                                        </div>
                                                        <div class="col-md-3 col-sm-12 form-group">
                                                            <label for="code">رنگ گزینه</label>
                                                            <input type="color" class="form-control color" name="options[][code]"  placeholder="رنگ گرینه را انتخاب کنید کنید">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                                                            <button class="btn btn-danger text-nowrap px-1" data-repeater-delete type="button"> <i class="bx bx-x"></i>
                                                                حذف
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col p-0">
                                                    <button class="btn btn-primary" data-repeater-create type="button"><i class="bx bx-plus"></i>
                                                        افزودن
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        </x-card>
                                        </div>
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
    <script src="{{ asset('assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>

@endpush

@push('inline-scripts')
    <script src="{{ asset('js/attribute-repeater.js') }}"></script>
@endpush
