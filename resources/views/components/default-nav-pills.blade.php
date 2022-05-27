<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="add-tab" data-toggle="pill" href="#add" aria-expanded="true">
            <i class="bx bx-plus align-middle"></i>
            <span class="align-middle">افزودن</span>
        </a>
    </li>
    <li class="nav-item current">
        <a class="nav-link active" id="list-tab" data-toggle="pill" href="#list" aria-expanded="false">
            <i class="bx bx-list-ul align-middle"></i>
            <span class="align-middle">لیست</span>
        </a>
    </li>
</ul>

@push('page-scripts')
    <script src="{{ asset('assets/js/scripts/navs/navs.js') }}"></script>
@endpush
