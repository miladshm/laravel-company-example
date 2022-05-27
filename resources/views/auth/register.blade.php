@extends('auth.layouts.app')

@push('title', 'ثبت نام')
@push('styles')
@endpush
@section('content')
    <!-- register section starts -->
    <section class="row flexbox-container">
        <div class="col-xl-8 col-10">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- register section left -->
                    <div class="col-md-6 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">ثبت نام</h4>
                                </div>
                            </div>
                            <div class="text-center">
                                <p><small class="line-height-2 d-inline-block"> لطفا جزئیات خود را برای ثبت نام وارد
                                        کرده و عضوی از جامعه عالی ما شوید.</small>
                                </p>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{route('register')}}" method="post" novalidate>
                                        @csrf
                                        <div class="form-group mb-50">
                                            <label for="inputfirstname4">نام</label>
                                            <input type="text" name="name" required class="form-control" id="inputfirstname4"
                                                   placeholder="نام" data-validation-required-message="وارد کردن نام الزامی است">
                                            <div class="help-block">@if ($errors->has('name'))
                                                    <ul role="alert">@foreach($errors->get('name') as $message)<li>{{$message}}</li>@endforeach</ul>
                                            @endif</div>
                                        </div>
                                        <div class="form-group mb-50">
                                            <label class="text-bold-700" for="exampleInputUsername1">موبایل</label>
                                            <input type="tel" name="mobile" class="form-control text-left"
                                                   id="exampleInputUsername1" required data-validation-required-message="وارد کردن موبایل الزامی است"
                                                   placeholder="شماره موبایل" dir="ltr">
                                            <div class="help-block">@if ($errors->has('mobile'))
                                                    <ul role="alert">@foreach($errors->get('mobile') as $message)<li>{{$message}}</li>@endforeach</ul>
                                                @endif</div>
                                        </div>
                                        <div class="form-group mb-50">
                                            <label class="text-bold-700" for="exampleInputEmail1">آدرس ایمیل</label>
                                            <input type="email" name="email" class="form-control text-left"
                                                   id="exampleInputEmail1" required data-validation-required-message="وارد کردن ایمیل الزامی است"
                                                   placeholder="آدرس ایمیل" dir="ltr" data-validation-email-message="ایمیل معتبر نیست">
                                            <div class="help-block">@if ($errors->has('email'))
                                                    <ul role="alert">@foreach($errors->get('email') as $message)<li>{{$message}}</li>@endforeach</ul>
                                                @endif</div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="text-bold-700" for="exampleInputPassword1">رمز عبور</label>
                                            <input type="password" name="password" class="form-control text-left" required data-validation-required-message="وارد کردن رمز عبور الزامی است"
                                                   id="exampleInputPassword1" placeholder="رمز عبور" dir="ltr">
                                            <div class="help-block">@if ($errors->has('password'))
                                                    <ul role="alert">@foreach($errors->get('password') as $message)<li>{{$message}}</li>@endforeach</ul>
                                                @endif</div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="text-bold-700" for="exampleInputPassword1">تکرار رمز عبور</label>
                                            <input type="password" name="password_confirmation" class="form-control text-left" required data-validation-required-message="وارد کردن تکرار رمز عبور الزامی است"
                                                   id="exampleInputPassword1" placeholder="تکرار رمز عبور" dir="ltr"
                                                   data-validation-match-match="password" data-validation-match-message="تکرار رمز عبور همخوانی ندارد">
                                            <div class="help-block"></div>
                                        </div>
                                        <button type="submit" class="btn btn-primary glow position-relative w-100">ثبت
                                            نام<i id="icon-arrow" class="bx bx-left-arrow-alt"></i></button>
                                    </form>
                                    <hr>
                                    <div class="text-center"><small class="mr-25">حساب کاربری دارید؟</small><a
                                            href="{{route('login')}}"><small>ورود</small> </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- image section right -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                        <img class="img-fluid" src="{{asset('assets/images/pages/register.png')}}" alt="branding logo">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register section end -->
@stop
@push('scripts')

@endpush
