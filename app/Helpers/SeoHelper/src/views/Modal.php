<?php

namespace App\Helpers\SeoHelper\src\views;

use Illuminate\Support\Facades\View;

class Modal extends \Illuminate\View\Component
{


    /**
     * @inheritDoc
     */
    public function render()
    {
        return View::file(__DIR__.'/../../resources/views/components/modal.blade.php');
    }
}
