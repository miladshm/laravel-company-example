<small>
    تصاویر باید دارای
    عرض {{config('photo_sizes.'.($type ?? '').'.width')}} و
    طول {{config('photo_sizes.'.($type ?? '').'.height')}} پیکسل باشند.
    فرمت های مجاز آپلود تصویر عبارتند از :
    {{config('photo_sizes.formats')}}
</small>
