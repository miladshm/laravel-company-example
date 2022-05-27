<div class="modal fade" tabindex="-1" role="dialog" id="seoModal">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="    background-color: gainsboro;">
                <h4 class="modal-title">سئوی <span class="title"> </span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="seoForm" class="form-horizontal ajax-update" action="seo{{isset($module)? '/'.$module: ''}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input type="hidden" name="id">
                    <input type="hidden" name="type">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">عنوان سئو :</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">توضیحات سئو :</label>
                                <textarea name="description" class="form-control m-description" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">کلمات کلیدی :</label>
                                <input type="text" name="tags" class="form-control ">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2"> متاتگ ها :</label>

                                <textarea name="meta" class="form-control " style="direction: ltr;"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-control-inline mb-1">
                                    <input type="checkbox" class="custom-control-input"
                                           name="indexing" value="1" checked
                                           id="indexing">
                                    <label class="custom-control-label mr-1" for="indexing">
                                    </label>
                                    <span>نمایش به موتورهای جستجو</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="language_code" value="fa">
                    <div class="row clearfix">
                        <div class="form-group">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success float-right">ذخیره</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
