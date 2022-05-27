@extends('admin.layouts.app')
@push('vendor-styles')
    <link rel="stylesheet" href="{{asset('assets/vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
@endpush
@section('content')
    @include('admin.partials.breadcrumb')
    <div class="content-body"><!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12">
                    <x-card :title="$title">
                        <x-icon-btn light="true" type="primary" link="{{route('admin.attribute.create')}}" icon="plus" text="ایجاد" />
                        {{  $dataTable->table() }}
                    </x-card>
                </div>
            </div>
        </section>
    </div>
    <x-seo::modal module="blog" />
@endsection

@push('page-scripts')
    <script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
{{--    <script src="{{asset('assets/js/scripts/datatables/datatable.js')}}"></script>--}}
    {!! $dataTable->scripts() !!}
@endpush