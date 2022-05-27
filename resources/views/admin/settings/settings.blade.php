@extends('admin.layouts.app')
@push('title','تنظیمات سایت')
@push('page-styles')
    <link rel="stylesheet" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endpush
@section('content')

    @include('admin.partials.breadcrumb')
    <div class="content-body"><!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-pill-general"
                                       data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="bx bx-cog"></i>
                                        <span>عمومی</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="account-pill-social"
                                       data-toggle="pill" href="#socials" aria-expanded="false">
                                        <i class="bx bxl-twitch"></i>
                                        <span>شبکه های اجتماعی</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="account-pill-connections"
                                       data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                        <i class="bx bx-link"></i>
                                        <span>راه های ارتباطی</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                 aria-labelledby="account-pill-general" aria-expanded="true">
                                                <form novalidate action="setting" method="post"
                                                      enctype="multipart/form-data" class="ajax">
                                                    {{--                                                    @csrf--}}
                                                    <div class="row">
                                                        <div class="media col-6 col-xs-12">
                                                            <a href="javascript:void(0);">
                                                                <img
                                                                    src="{{asset('images/logoplaceholder.png')}}"
                                                                    class="rounded mr-75" alt="profile image"
                                                                    height="64"
                                                                    width="64" id="logo-preview">
                                                            </a>
                                                            <div class="media-body mt-25">
                                                                <div
                                                                    class="col-12 col-md-6 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                    <label for="fm-input" data-input="fm-input"
                                                                           class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0 fm-btn">
                                                                        <span>انتخاب لوگو</span>

                                                                    </label>
                                                                    <input id="fm-input" type="hidden"
                                                                           aria-label="Image" name="logo"
                                                                           aria-describedby="fm-btn"
                                                                           value="{{config('settings.logo')}}"
                                                                           data-preview="logo-preview">

                                                                </div>
                                                                <p class="text-muted ml-1 mt-50"><small>فایل های مجاز:
                                                                        JPG،
                                                                        PNG
                                                                        و GIF. حداکثر اندازه مجاز: 800KB</small></p>
                                                            </div>
                                                        </div>
                                                        <div class="media col-6 col-xs-12">
                                                            <a href="javascript:void(0);">
                                                                <img
                                                                    src="{{asset('images/logoplaceholder.png')}}"
                                                                    class="rounded mr-75" alt="profile image"
                                                                    height="64"
                                                                    width="64" id="favicon-preview">
                                                            </a>
                                                            <div class="media-body mt-25">
                                                                <div
                                                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                    <label for="fm-input" data-input="fm-input-favicon"
                                                                           class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0 fm-btn">
                                                                        <span>انتخاب فاوآیکون</span>

                                                                    </label>
                                                                    <input id="fm-input-favicon" type="hidden"
                                                                           aria-label="Image" name="favicon"
                                                                           aria-describedby="fm-btn"
                                                                           value="{{config('settings.favicon')}}"
                                                                           data-preview="favicon-preview">

                                                                </div>
                                                                <p class="text-muted ml-1 mt-50"><small>فایل های مجاز:
                                                                        JPG،
                                                                        PNG
                                                                        و GIF. حداکثر اندازه مجاز: 800KB</small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>عنوان سایت</label>
                                                                    <input type="text" class="form-control text-left"
                                                                           placeholder="عنوان سایت" name="site_title"
                                                                           required
                                                                           value="{{config('settings.site_title')}}"
                                                                           data-validation-required-message="وارد کردن عنوان سایت الزامی است"
                                                                           dir="ltr">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>توضیحات کوتاه</label>
                                                                    <textarea class="form-control text-left"
                                                                              placeholder="توضیحات کوتاه"
                                                                              name="site_description"
                                                                              required
                                                                              data-validation-required-message="وارد کردن توضیحات کوتاه الزامی است"
                                                                              dir="ltr">{{config('settings.site_description')}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--                                                        <div class="col-12">--}}
                                                        {{--                                                            <div class="alert bg-rgba-warning alert-dismissible mb-2"--}}
                                                        {{--                                                                 role="alert">--}}
                                                        {{--                                                                <button type="button" class="close" data-dismiss="alert"--}}
                                                        {{--                                                                        aria-label="بستن">--}}
                                                        {{--                                                                    <span aria-hidden="true">×</span>--}}
                                                        {{--                                                                </button>--}}
                                                        {{--                                                                <p class="mb-0">--}}
                                                        {{--                                                                    ایمیل شما تایید نشده است. لطفا صندوق ورودی خود را--}}
                                                        {{--                                                                    بررسی نمایید.--}}
                                                        {{--                                                                </p>--}}
                                                        {{--                                                                <a href="javascript:%20void(0);">ارسال دوباره ایمیل--}}
                                                        {{--                                                                    تایید</a>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div>--}}
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>ایمیل مدیریت</label>
                                                                    <input type="email" class="form-control"
                                                                           name="email"
                                                                           value="{{config('settings.email')}}"
                                                                           data-validation-email-message="ایمیلی با فرمت معتبر وارد کنید"
                                                                           placeholder="ایمیل مدیریت">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>موبایل مدیریت</label>
                                                                <input type="tel" class="form-control" name="mobile"
                                                                       placeholder="شماره موبایل مدیریت"
                                                                       value="{{config('settings.mobile')}}">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit"
                                                                    class="btn btn-primary glow mr-sm-1 mb-1">ذخیره
                                                                تغییرات
                                                            </button>
                                                            <button type="reset" class="btn btn-light mb-1">انصراف
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="socials" role="tabpanel"
                                                 aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form action="{{route('admin.social.store')}}" method="post"
                                                      class="ajax" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>توییتر</label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left">
                                                                    <input type="url" class="form-control text-left"
                                                                           placeholder="افزودن لینک" name="twitter"
                                                                           dir="ltr"
                                                                           value="{{$socials['twitter']??''}}">
                                                                    <div class="form-control-position"><i
                                                                            class="bx bxl-twitter"></i></div>

                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>فیسبوک</label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left">
                                                                    <input type="url" class="form-control text-left"
                                                                           placeholder="افزودن لینک" name="facebook"
                                                                           dir="ltr"
                                                                           value="{{$socials['facebook']??''}}">
                                                                    <div class="form-control-position"><i
                                                                            class="bx bxl-facebook"></i></div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>تلگرام</label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left">
                                                                    <input type="url" class="form-control text-left"
                                                                           placeholder="افزودن لینک" dir="ltr"
                                                                           name="telegram"
                                                                           value="{{$socials['telegram']??''}}">
                                                                    <div class="form-control-position"><i
                                                                            class="bx bxl-telegram"></i></div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>واتساپ</label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left">
                                                                    <input type="url" class="form-control text-left"
                                                                           placeholder="افزودن لینک" dir="ltr"
                                                                           name="whatsapp"
                                                                           value="{{$socials['whatsapp']??''}}">
                                                                    <div class="form-control-position"><i
                                                                            class="bx bxl-whatsapp"></i></div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>اینستاگرام</label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left">
                                                                    <input type="url" class="form-control text-left"
                                                                           placeholder="افزودن لینک" dir="ltr"
                                                                           name="instagram"
                                                                           value="{{$socials['instagram']??''}}">
                                                                    <div class="form-control-position"><i
                                                                            class="bx bxl-instagram"></i></div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>یوتیوب</label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left">
                                                                    <input type="url" class="form-control text-left"
                                                                           placeholder="افزودن لینک" dir="ltr"
                                                                           name="youtube"
                                                                           value="{{$socials['youtube']??''}}">
                                                                    <div class="form-control-position"><i
                                                                            class="bx bxl-youtube"></i></div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit"
                                                                    class="btn btn-primary glow mr-sm-1 mb-1">ذخیره
                                                                تغییرات
                                                            </button>
                                                            <button type="reset" class="btn btn-light mb-1">انصراف
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                                                 aria-labelledby="account-pill-connections" aria-expanded="false">
                                                <form action="{{route('admin.contact-info.store')}}" method="post" data-table="#contactTable" class="ajax-create" novalidate>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <x-text-input name="title" label="عنوان" id="title" placeholder="عنوان راه ارتباطی را وارد کنید" />
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <x-select-input name="group" label="نوع" id="title" placeholder="عنوان راه ارتباطی را وارد کنید" :options="$contact_groups" />
                                                        </div>
                                                            <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>نوع</label>
                                                                <select class="select2-icons form-control" required
                                                                        data-validation-required-message="نوع را مشخص کنید"
                                                                        id="select2-icons" name="type"
                                                                        onchange="$('[name=\'icon\']').val($(this).find(':selected').data('icon'))">
                                                                    <option value="">یک نوع انتخاب کنید ...</option>
                                                                    <option value="address" data-icon="bx bx-map">
                                                                        آدرس
                                                                    </option>
                                                                    <option value="phone" data-icon="bx bx-phone">
                                                                        تلفن
                                                                    </option>
                                                                    <option value="mobile" data-icon="bx bx-mobile">
                                                                        موبایل
                                                                    </option>
                                                                    <option value="email" data-icon="bx bx-envelope">
                                                                        ایمیل
                                                                    </option>
                                                                    <option value="" data-icon="bx bx-printer">
                                                                        فاکس
                                                                    </option>
                                                                </select>
                                                                <input name="icon" type="hidden">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>مقدار</label>
                                                                    <input type="text"
                                                                           class="form-control text-left"
                                                                           placeholder="" name="value"
                                                                           required
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
                                                <hr>
                                                {{$dataTable->table()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- account setting page ends -->
    </div>

@endsection
@push('page-scripts')
    @include('admin.partials.datatable-scripts')
    {{$dataTable->scripts()}}

@endpush
