$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.fn.extend({
    ajaxSubmit: function (args) {
        let config =
                $.extend({
                    type: null,
                    table: null,
                    resetForm: false,
                    closeModal: true,
                    hasAlert: true,
                    showErrorMessages: true,
                    callback: function (data) {

                    }
                }, args),
            form = $(this);
        form.find('input,select,textarea').jqBootstrapValidation({
            submitSuccess: function ($form, event) {
                event.preventDefault();
                let submitBtn = $form.find('[type="submit"]'),
                    id, action, formData = new FormData($form[0]), data = $form.serialize();
                if ($form.find('input[name="id"]').length)
                    id = $form.find('input[name="id"]').val();
                else id = '';
                action = $form.attr('action');
                // if (!action.lastIndexOf('/', action.length - 1))
                if (id)
                    action += ('/' + id);
                submitBtn.prop('disabled', 'disabled');
                $.ajax({
                    url: action,
                    type: "post",
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: formData ?? data,
                    success: data => {
                        if (config.hasAlert) myAlert(data.status, true);
                        if (config.resetForm) {
                            form[0].reset();
                            $.each(form.find("select[data-select2-id]"), function (key, item) {
                                $(item).select2("val", "");
                            })
                        }
                        refreshDataTable()
                        if (form.parents(".modal").length > 0 && config.closeModal) form.parents(".modal").modal("hide");
                        config.callback(data);
                    },
                    error: data => {
                        data = data.responseJSON;
                        if (config.hasAlert) myAlert(data.message, false);
                        if (config.showErrorMessages) {
                            $('.help-block').hide().remove();
                            $.each(data.errors, function (name, value) {
                                let html
                                    = '<div class="help-block">'
                                    + '<ul role="alert">';
                                $.each(value, function (name, value) {
                                    html += '<li>' + value + '</li>';
                                });
                                html += '</ul></div>';
                                $('[name="' + name + '"],[name="' + name + '[]"]').after(html).parents('.form-group').addClass('issue');
                            })
                        }
                    },
                    complete: () => {
                        submitBtn.removeAttr('disabled');
                    }
                });
            }

        })
    },
    fmPreview: function () {
        let holder = $(this).data('preview'), val = $(this).val();
        if (val) document.getElementById(holder).src = val;
    },
    sweetEdit: function () {
        $(this).on('click', function () {
            let action = $(this).data('action');
            $.ajax({
                url: action,
                success: data => {
                    swal({
                        title: "ویرایش آیتم",
                        content: {
                            element: "div",
                            attributes: {
                                innerHTML: data
                            }
                        }
                    })
                }
            })
        })
    }
})

function logout() {
    $.ajax({
        url: '/logout',
        type: 'post',
        success: function () {
            location.reload();
        }
    })
}

$(function () {
    $('form.ajax').ajaxSubmit();
    $('form.ajax-update').ajaxSubmit({
        type: 'update', callback() {
            const event = new Event('update');
            document.dispatchEvent(event);
        }
    })
    $('form.ajax-create').ajaxSubmit({
        type: 'create', resetForm: true, callback() {
            const event = new Event('create');
            document.dispatchEvent(event);
        }
    })
    $('form.ajax-delete').ajaxSubmit({
        type: 'delete',

    })
    $.each($("input[data-preview]"), function () {
        $(this).fmPreview();
    });
    // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    //     checkboxClass: 'icheckbox_flat-green',
    //     radioClass   : 'iradio_flat-green'
    // })
    $(document).on('click', '.sweetEdit', function () {
        let action = $(this).data('action');
        $.ajax({
            url: action,
            success: data => {
                swal({
                    title: "ویرایش آیتم",
                    showConfirmButton: false,
                    html: data
                })
                $('.ajax-update').ajaxSubmit();
            }
        })
    })
    $(document).on('click', '.action', function () {
        let $this = $(this),
            action = $this.data('action');
        $.ajax({
            url: action,
            type: "post",
            success: data => {
                refreshDataTable()
                toastr.success(data.status);
            },
            error: data => toastr.error(data.responseJSON)
        })
    })

    $(document).on('click', '.sweetDelete', function () {
        let action = $(this).data('action'),
            table = $($(this).data('table'));
                swal({
                    title: "حذف آیتم",
                    text: "آیا از حذف این مورد اطمینان دارید؟",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonClass: "btn-danger",
                    showCancelButton: true,
                    confirmButtonText: "حذف",
                    cancelButtonText: "بیخیال",
                }).then((value) => {
                if (value.value) $.ajax({
                    type: "delete", url: action, success: data => {
                        myAlert(data.status)
                        refreshDataTable();
                        const event = new Event('delete');
                        document.dispatchEvent(event);
                    }
                });
            })
        })
        .on('click', '.sweetRestore', function () {
            let action = $(this).data('action');
            swal({
                title: "بازگردانی آیتم",
                text: "آیا از بازگردانی این مورد اطمینان دارید؟",
                type: "warning",
                showConfirmButton: true,
                confirmButtonClass: "btn-success",
                showCancelButton: true,
                confirmButtonText: "بازگردانی",
                cancelButtonText: "بیخیال",
            }).then((value) => {
                if (value.value) $.ajax({
                    type: "put", url: action, success: data => {
                        myAlert(data.status)
                        refreshDataTable();
                        const event = new Event('restore');
                        document.dispatchEvent(event);
                            }
                        });
                })
    })
        .on('click', '[data-edit-form]', function () {
        let $this = $(this),
            action = $this.data('action'),
            id = $this.data('id'),
            modal = $($this.data('target')),
            form = $($this.data('edit-form'));
        $.ajax({
            url: action,
            type: "get",
            data: "JSON",
            success: function (data) {
                modal.find(".title").text(data.title ?? data.name);
                $.each(data, function (name, value) {
                    let input = form.find("[name='"+name+"']");
                    if (input.tagName === 'textarea')
                        input.html(value);
                    else
                        input.val(value).trigger('change');
                })
            }
        })
    })
    $('.fm-btn').on('click', function (e) {
        e.preventDefault();
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        inputId = $(this).data('input')
        // console.log(this)
    })

    $(".select2").select2({
        width: "100%", allowClear: true,
    });
})
var inputId = '';

function fmSetLink($url) {
    let input = document.getElementById(inputId);
    if(inputId) {
        input.value = $url;
        let holder = input.dataset.preview;
        document.getElementById(holder.toString()).src = input.value;
    }

}

function refreshDataTable() {
    $.each(window.LaravelDataTables, function (id, datatable) {
        datatable?.draw(false);
    })
}

function myAlert(message, ok = true) {
    swal({
        text: message, type: ok ? "success" : "error", showConfirmButton: false, showCancelButton: false,
    })
}

function select2Init(id, url, placeholder = null) {
    $("#"+id).select2({
        // dropdownAutoWidth: true,
        width: '100%',
        allowClear: true,
        language: "fa",
        ajax: {
            url: url,
            dataType: 'json',
            delay: 250,
            data(params) {
                return {
                    q: params.term, // search term
                };
            },
            cache: true
        },
        placeholder: placeholder,
        // escapeMarkup: function (markup) {
        //     return markup;
        // }, // let our custom formatter work
        minimumInputLength: 3,
});
}

