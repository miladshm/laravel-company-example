<?php

namespace App\Http\Traits;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait HasViewShow
{
    use HasShow;

    abstract private function showView(): View;

    /**
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        $item = $this->getModel($id);

        return $this->showView()->with(compact('item'));
    }
}
