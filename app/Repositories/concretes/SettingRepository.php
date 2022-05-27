<?php


namespace App\Repositories\concretes;


use App\Helpers\SettingHelper\Models\Setting;
use Illuminate\Database\Eloquent\Model;

class SettingRepository extends \App\Repositories\Repository
{

    function model(): Model
    {
        return new Setting();
    }
}
