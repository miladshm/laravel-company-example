@extends('auth.layouts.app')
@push('title', 'ورود')

@section('content')
    <!-- login page start -->
    <section id="auth-login" class="row flexbox-container">
        <div class="col-xl-8 col-11">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-login -->
                    <div class="col-md-6 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">خوش آمدید</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex flex-md-row flex-column justify-content-around">
                                        <a href="#"
                                           class="btn btn-social btn-google btn-block font-small-3 mr-md-1 mb-md-0 mb-1">
                                            <i class="bx bxl-google font-medium-3"></i><span
                                                class="pl-50 d-block text-center">گوگل</span></a>
                                        <a href="#"
                                           class="btn btn-social btn-block mt-0 btn-facebook font-small-3">
                                            <i class="bx bxl-facebook-square font-medium-3"></i><span
                                                class="pl-50 d-block text-center">فیسبوک</span></a>
                                    </div>
                                    <div class="divider">
                                        <div class="divider-text text-uppercase text-muted"><small>یا توسط ایمیل
                                                وارد شوید</small>
                                        </div>
                                    </div>
                                    <form action="{{route('login')}}" method="post" novalidate>
                                        @csrf
                                        <div class="form-group mb-50">
                                            <label class="text-bold-700" for="exampleInputEmail1">موبایل</label>
                                            <input type="tel" name="mobile" required class="form-control text-left"
                                                   id="exampleInputEmail1" placeholder="شماره موبایل" dir="ltr"
                                                   data-validation-required-message="شماره موبایل را وارد نکرده اید!">
                                            <div class="help-block">@if ($errors->has('mobile'))
                                                    <ul role="alert">@foreach($errors->get('mobile') as $message)<li>{{$message}}</li>@endforeach</ul>
                                                @endif</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-bold-700" for="exampleInputPassword1">رمز
                                                عبور</label>
                                            <input type="password" name="password" required class="form-control text-left"
                                                   id="exampleInputPassword1" placeholder="رمز عبور" dir="ltr"
                                                   data-validation-required-message="رمز عبور را وارد نکرده اید!">
                                            <div class="help-block">@if ($errors->has('password'))
                                                    <ul role="alert">@foreach($errors->get('password') as $message)<li>{{$message}}</li>@endforeach</ul>
                                                @endif</div>
                                        </div>
                                        <div
                                            class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                            <div class="text-left">
                                                <div class="checkbox checkbox-sm">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="exampleCheck1" name="remember">
                                                    <label class="checkboxsmall" for="exampleCheck1"><small>مرا
                                                            به خاطر بسپار</small></label>
                                                </div>
                                            </div>
                                            <div class="text-right line-height-2"><a
                                                    href="{{route('password.request')}}" class="card-link"><small>رمز
                                                        عبورتان را فراموش کرده اید؟</small></a></div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-primary glow w-100 position-relative">ورود<i
                                                id="icon-arrow" class="bx bx-left-arrow-alt"></i></button>
                                    </form>
                                    <hr>
                                    <div class="text-center"><small class="mr-25">حسابی ندارید؟</small><a
                                            href="{{route('register')}}"><small>ثبت نام</small></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                        <div class="card-content">
                            <img class="img-fluid" src="{{asset('assets/images/pages/login.png')}}"
                                 alt="branding logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login page ends -->
@endsection
