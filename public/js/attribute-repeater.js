function toggleColor() {
    let color = $(document).find(".color");
    if ($(document).find("#is_color").is(":checked"))
        color.removeAttr('disabled').parent().show();
    else
        color.attr('disabled', 'disabled').parent().hide();
}
$(function () {
    $('.repeater-default').repeater({
        show: function () {
            $(this).slideDown();
            toggleColor();
        },
        hide: function (deleteElement) {
            if (confirm('آیا از حذف این آیتم مطمئن هستید؟')) {
                $(this).slideUp(deleteElement);
            }
        }
    });
    toggleColor();
    $(document).on('change',"#is_color", function () {
        toggleColor();
    })
})
