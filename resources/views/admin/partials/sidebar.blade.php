<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                    <div class="brand-logo"><img class="logo" src="{{asset(config('settings.logo'))}}"></div>
                    <h2 class="brand-text mb-0">{{config('settings.main_title')}}</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i
                        class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
            data-icon-style="lines">
            <li class=" nav-item">
                <a href="{{route('admin.dashboard')}}"><i
                        class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Dashboard">داشبورد</span>
                    {{--                    <span class="badge bg-rgba-danger text-danger badge-pill badge-round float-right mr-2">2</span></a>--}}
                </a>
                <ul class="menu-content">
                    <li class="@if(request()->routeIs('admin.dashboard')) active @endif"><a
                            href="{{route('admin.dashboard')}}">
                            <i class="bx bx-left-arrow-alt"></i><span class="menu-item"
                                                                      data-i18n="Home">خانه </span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>عمومی</span></li>
            <li class="nav-item @if(request()->routeIs('admin.slideshow.*')) active @endif"><a href="{{ route('admin.slideshow.index') }}"><i class="menu-livicon" data-icon="morph-stack"></i><span
                        class="menu-title" data-i18n="Slideshow">اسلایدشو</span> </a>
            <li class=" navigation-header"><span>بلاگ</span></li>
            <li class="nav-item"><a href="javascript:void(0)"><i class="menu-livicon" data-icon="pencil"></i><span
                        class="menu-title" data-i18n="Articles">مقالات</span> </a>
                <ul class="menu-content">
                    <li class="@if(request()->routeIs('admin.post.create')) active @endif"><a
                            href="{{route('admin.post.create')}}"><i class="bx bx-plus-circle"></i>
                            <span class="menu-item" data-i18n="Create">ایجاد</span></a>
                    </li>
                    <li class="@if(request()->routeIs('admin.post.index')) active @endif"><a
                            href="{{route('admin.post.index')}}"><i class="bx bx-list-ul"></i>
                            <span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href="javascript:void(0)"><i class="menu-livicon"
                                                                 data-icon="thumbnails-big"></i><span class="menu-title"
                                                                                                      data-i18n="Categories">دسته بندی ها</span>
                </a>
                <ul class="menu-content">
                    <li class="@if(request()->routeIs('admin.category.create')) active @endif"><a
                            href="{{route('admin.category.create')}}"><i class="bx bx-plus-circle"></i>
                            <span class="menu-item" data-i18n="Create">ایجاد</span></a>
                    </li>
                    <li class="@if(request()->routeIs('admin.category.index')) active @endif"><a
                            href="{{route('admin.category.index')}}"><i class="bx bx-list-ul"></i>
                            <span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>فروشگاه</span>
            <li class="nav-item">
                <a href="javascript:void(0)"><i class="menu-livicon" data-icon="shoppingcart"></i>
                    <span class="menu-title" data-i18n="Products">محصولات</span></a>
                <ul class="menu-content">
                    <li class="@if(request()->routeIs('admin.product.create')) active @endif"><a
                            href="{{route('admin.product.create')}}"><i class="bx bx-plus-circle"></i>
                            <span class="menu-item" data-i18n="Create">ایجاد</span></a>
                    </li>
                    <li class="@if(request()->routeIs('admin.product.index')) active @endif"><a
                            href="{{route('admin.product.index')}}"><i class="bx bx-list-ul"></i>
                            <span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href="javascript:void(0)"><i class="menu-livicon"
                                                                 data-icon="thumbnails-big"></i><span class="menu-title"
                                                                                                      data-i18n="Categories">دسته بندی ها</span>
                </a>
                <ul class="menu-content">
                    <li class="@if(request()->routeIs('admin.category.create')) active @endif"><a
                            href="{{route('admin.category.create')}}"><i class="bx bx-plus-circle"></i>
                            <span class="menu-item" data-i18n="Create">ایجاد</span></a>
                    </li>
                    <li class="@if(request()->routeIs('admin.category.index')) active @endif"><a
                            href="{{route('admin.category.index')}}"><i class="bx bx-list-ul"></i>
                            <span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href="javascript:void(0)"><i class="menu-livicon" data-icon="list"></i>
                    <span class="menu-title" data-i18n="Attributes">ویژگی ها</span> </a>
                <ul class="menu-content">
                    <li class="@if(request()->routeIs('admin.attribute.create')) active @endif"><a
                            href="{{route('admin.attribute.create')}}"><i class="bx bx-plus-circle"></i>
                            <span class="menu-item" data-i18n="Create">ایجاد</span></a>
                    </li>
                    <li class="@if(request()->routeIs('admin.attribute.index')) active @endif"><a
                            href="{{route('admin.attribute.index')}}"><i class="bx bx-list-ul"></i>
                            <span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>تنظیمات</span>
            <li class="nav-item"><a href="javascript:void(0)"><i class="menu-livicon" data-icon="settings"></i><span
                        class="menu-title" data-i18n="Settings">پیکربندی</span> </a>
                <ul class="menu-content">
                    <li class="@if(request()->routeIs('admin.setting.index')) active @endif">
                        <a href="{{route('admin.setting.index')}}"><i class="bx bx-left-arrow-alt"></i><span
                                class="menu-item" data-i18n="Invoice List">تنظیمات سایت</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
