<?php

use Illuminate\Database\Eloquent\Model;

if (! function_exists('deleteBtn')) {
    /**
     * Generate an asset path for the application.
     *
     * @param Model $item
     * @return string
     */
    function deleteBtn(Model $item, string $baseUrl)
    {
        if ($item->deleted_at) {
            $button = '<button class=" btn text-success" data-toggle="tooltip" data-placement="top" title="بازگرداندن"
                    data-edit-form="#restoreForm" data-edit-id="' . $item->id . '"><i
                        class="bx bx-sm bx-undo"></i></button>
                        <button class=" text-danger btn sweetDelete" data-toggle="tooltip" data-placement="top" title="حذف کامل"
                    data-edit-form="#delForm" data-action="' . $baseUrl . '/' . $item->id . '"" data-edit-id="' . $item->id . '"><i
                        class="bx bx-sm bx-trash"></i></button>
                        ';
        } else {
            $button = '<button class=" text-danger btn sweetDelete" data-toggle="tooltip" data-placement="top" title="حذف"
                    data-edit-form="#delForm" data-action="' . $baseUrl . '/' . $item->id . '"" data-edit-id="' . $item->id . '"><i
                        class="bx bx-sm bx-trash"></i></button>';
        }

        return $button;
    }
}
if (! function_exists('editBtn')) {
    /**
     * @param $item
     * @param string $baseUrl
     * @return string
     */
    function editBtn($item, string $baseUrl): string
    {
        return '<a class="btn text-primary" data-toggle="tooltip" data-placement="top" title="ویرایش"
                    href="' . $baseUrl . '/' . $item->id . '/edit" target="_blank"><i
                    class="bx bx-sm bx-edit"></i>
                    </a>';
    }
}

if (! function_exists('seoBtn')) {

    function seoBtn($item, $baseUrl,$module = null): string
    {
        return '<button class="btn text-warning" title="سئو"
                    data-toggle="modal"
                    data-target="#seoModal"
                    data-edit-form="#seoForm"
                    data-id="'. $item->id .'"
                    data-action="seo/'.$baseUrl.'/'. $item->id .'/'.$module.'">
                <i class="bx bx-sm bx-line-chart"></i>
            </button>';
    }
}


if (! function_exists('moveBtn')) {

    function moveBtn($item, $baseUrl,$module = null): string
    {
        return
            '<button class="btn text-success action" title="افزایش اولویت"
                    data-id="'. $item->id .'"
                    data-action="'.$baseUrl.'/'. $item->id .'/move?action=up">
                <i class="bx bx-sm bx-up-arrow-alt"></i>
            </button>'.
            '<button class="btn text-danger action" title="کاهش اولویت"
                    data-id="'. $item->id .'"
                    data-action="'.$baseUrl.'/'. $item->id .'/move?action=down">
                <i class="bx bx-sm bx-down-arrow-alt"></i>
            </button>';
    }
}
