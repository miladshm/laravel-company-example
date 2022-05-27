<?php

namespace App\Helpers\SeoHelper\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\SeoHelper\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Nwidart\Modules\Facades\Module;

class SeoController extends Controller
{
    private $models_namespace = "App\\Models\\";

    public function seo($type,$id,$module = null)
    {
        if ($module)
            $model = "Modules\\".ucfirst($module)."\\Entities\\".ucfirst($type);
        else
            $model =$this->models_namespace.ucfirst($type);
        $seo = Seo::query()->firstOrCreate([
            "seo_type" => $model,
            "seo_id" => $id
        ]);
//        $seo = app($model)->find($id);
        $seo['id'] = $id;
        $seo['type'] = $type;
        $seo['title'] = $seo['title'] ?? $seo->seo->title;
        return response()->json($seo);
    }

    public function storeSeo(Request $request, $module = null, $id)
    {
        $data = $request->all();
        $type = $request->input('type');
        if ($module)
            $model = "Modules\\".ucfirst($module)."\\Entities\\".ucfirst($type);
        else
            $model =$this->models_namespace.ucfirst($type);
        $seo = Seo::firstOrNew([
            "seo_type"=> $model,
            "seo_id"=>$id
        ]);
        if ($request->description || $request->title || $request->meta || $request->tags) {
            $seo->updateOrCreate(['seo_id' => $data['id'],
                'seo_type' => $model,
            ], $data);
        } else {
            $seo->delete();
        }

        return response(['status' => 'عملیات با موفقیت انجام گردید.']);
    }

}
