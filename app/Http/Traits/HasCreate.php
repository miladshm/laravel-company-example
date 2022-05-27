<?php

namespace App\Http\Traits;

use Illuminate\Contracts\View\View;

trait HasCreate
{
    abstract private function createView(): View;
    abstract private function extraData(): ?array;


    public function create(): View
    {
        return $this->createView()->with($this->extraData());
    }

}
