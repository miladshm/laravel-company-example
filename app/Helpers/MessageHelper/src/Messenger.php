<?php

namespace App\Helpers\MessageHelper\src;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

class Messenger
{
    /**
     * @return IMessenger
     */
    public function service(): IMessenger
    {
        return app(config('messenger.panel'));
    }

    /**
     * @param string $key
     * @return Repository|Application|mixed
     */
    public function config(string $key)
    {
        return config('messenger.'.$key);
    }
}
