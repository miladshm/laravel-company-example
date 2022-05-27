<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Repository
{

    public array $success = ['status' => 'عملیات با موفقیت انجام شد'];
    public array $error = ['status' => 'انجام عملیات با خطا مواجه شد!'];
    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = $this->model();
    }

    abstract function model(): Model;

    public function storeDetails(Model $item)
    {
        $request = new Request();
        if (in_array('HasDetails',class_uses($this)))
            foreach ($request->only($this->model->detailAttributes()) as $name => $value)
                $item->details()->updateOrCreate(compact('name'), compact('value'));
    }

}
