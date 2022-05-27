<?php


namespace App\Helpers\MessageHelper\src\Facades;


use App\Helpers\MessageHelper\src\IMessenger;
use App\Helpers\MessageHelper\src\services\ItsaPayam;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Facade;

class Messenger extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return 'Messenger';
    }
}
