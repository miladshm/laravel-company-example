@extends('admin.layouts.app')
@push('vendor-styles')
@endpush
@section('content')
    @include('admin.partials.breadcrumb', ['items' => [['url' => 'slideshow', 'title' => 'اسلایدشو']]])
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
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    @method('put')
                                    @include('admin.slideshow.form')
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
