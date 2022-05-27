<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">حذف {{ $title ?? '' }}</h4>
            </div>
            <form id="delForm" class="form-horizontal ajax-delete" action="{{ $action ?? '' }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label class="col-lg-12">
                            <strong style="color:#ec6459">هشدار!</strong>
                            آیا از حذف این مورد اطمینان دارید؟
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">بازگرداندن {{ $title ?? '' }}</h4>
            </div>
            <form id="restoreForm" class="form-horizontal" action="{{ $action }}/restore" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label class="col-lg-12">

                            آیا از بازگرداندن و فعال کردن این مورد اطمینان دارید؟
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-success">تأیید</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('page-scripts')
{{--    <script>--}}
{{--        var delForm = $('#delForm'),--}}
{{--            restoreForm = $('#restoreForm');--}}
{{--        let id = $(document).find('table').attr('id');--}}
{{--        console.log(id);--}}
{{--        $(function () {--}}

{{--            delForm.ajaxSubmit({--}}
{{--                // progressBar: 'danger',--}}
{{--                // re: true,--}}
{{--                callback: function () {--}}
{{--                    window.LaravelDataTables[id].draw(false);--}}
{{--                }--}}
{{--            });--}}
{{--            restoreForm.ajaxForm({--}}
{{--                // progressBar: 'success',--}}
{{--                closeModal: true,--}}
{{--                callback: function () {--}}
{{--                    window.LaravelDataTables[id].draw(false);--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}

{{--    </script>--}}
@endpush
