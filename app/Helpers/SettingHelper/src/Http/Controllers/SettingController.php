<?php

namespace App\Helpers\SettingHelper\src\Http\Controllers;

use App\Helpers\SettingHelper\Models\Setting;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;

class SettingController extends \App\Http\Controllers\Controller
{
    /**
     * @param string $name
     * @return HigherOrderBuilderProxy|mixed
     */
    public function get(string $name)
    {
        $value = Setting::query()->where('name', $name)->first()->value ?? null;

        return response()->json($value);
    }
}
