<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1">{{$title}}</h5>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        @isset($items)
                            @foreach ($items as $item)
                                <li class="breadcrumb-item"><a href="{{$item['url']}}">{{$item['title']}}</a>
                                </li>
                            @endforeach
                        @endisset
                        <li class="breadcrumb-item active">{{$title}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
