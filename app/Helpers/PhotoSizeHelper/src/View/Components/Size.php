<?php

namespace App\Helpers\PhotoSizeHelper\src\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Size extends Component
{
    public string|null $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type = null)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return View::file(__DIR__ . '/../../../resources/views/components/size.blade.php');
    }
}
