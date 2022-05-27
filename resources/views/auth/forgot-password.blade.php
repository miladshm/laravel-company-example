@extends('auth.layouts.app')

@push('title', 'فراموشی رمز عبور')
@push('styles')
@endpush
@section('content')
    <section class="row flexbox-container">
        <div class="col-xl-7 col-md-9 col-10  px-0">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-forgot password -->
                    <div class="col-md-6 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">رمز عبورتان را فراموش کرده اید؟</h4>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center mb-2">
                                <div class="text-left">
                                    <div class="ml-3 ml-md-2 mr-1"><a href="{{ route('login') }}"
                                                                      class="card-link btn btn-outline-primary text-nowrap">ورود</a>
                                    </div>
                                </div>
                                <div class="mr-3"><a href="{{route('register')}}"
                                                     class="card-link btn btn-outline-primary text-nowrap">ثبت نام</a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="text-muted text-center mb-2"><small class="line-height-2">ایمیل و یا
                                            شماره تماسی که برای ثبت نام استفاده کرده اید را وارد کنید تا رمز عبور موقت
                                            برای شما ارسال شود</small></div>
                                    <form class="mb-2" action="{{route('password.email')}}" method="post" novalidate>
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label class="text-bold-700" for="exampleInputEmailPhone1">ایمیل یا
                                                تلفن</label>
                                            <input type="text" class="form-control text-left"
                                                   id="exampleInputEmailPhone1" required
                                                   data-validation-required-message="ایمیل را وارد نکرده اید!"
                                                   name="email" placeholder="ایمیل یا تلفن" dir="ltr">
                                            @error('email')
                                            <div class="help-block">
                                                <ul role="alert">
                                                    <li>{{$message}}</li>
                                                </ul>
                                            </div> @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary glow position-relative w-100">ارسال
                                            رمز عبور<i id="icon-arrow" class="bx bx-left-arrow-alt"></i></button>
                                    </form>
                                    <div class="text-center mb-2"><a href="{{ route('login') }}"><small
                                                class="text-muted">رمز عبورم را به خاطر آوردم</small></a></div>
                                    <div class="divider mb-2">
                                        <div class="divider-text">یا توسط گزینه های زیر وارد شوید</div>
                                    </div>
                                    <div class="d-flex flex-md-row flex-column">
                                        <a href="#"
                                           class="btn btn-social btn-google btn-block font-small-3 mb-1 mb-sm-1 mb-md-0 mr-md-1 text-center">
                                            <i class="bx bxl-google font-medium-3"></i><span
                                                class="pl-1">گوگل</span></a>
                                        <a href="#"
                                           class="btn btn-social btn-facebook btn-block font-small-3 text-center mt-0">
                                            <i class="bx bxl-facebook-square font-medium-3"></i><span class="pl-1">فیسبوک</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center">
                        <img class="img-fluid" src="{{asset('assets/images/pages/forgot-password.png')}}"
                             alt="branding logo" width="300">
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@push('scripts')
@endpush
