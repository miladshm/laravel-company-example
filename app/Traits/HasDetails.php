<?php


namespace App\Traits;


use App\Models\Detail;
use Illuminate\Support\Arr;

trait HasDetails
{
    abstract function detailAttributes() :array;

    public function details()
    {
        return $this->morphMany(Detail::class,'item');
    }
    public function getDetail($name)
    {
        return $this->details()->where('name',$name)->value;
    }

    public function create(array $attributes = [])
    {
        foreach (Arr::only($attributes, $this->detailAttributes()) as $name => $value)
            $this->details()->updateOrCreate(compact('name'), compact('value'));
        return parent::query()->create(Arr::except($attributes,$this->detailAttributes()));
    }
    public function update(array $attributes = [], array $options = [])
    {
        foreach (Arr::only($attributes, $this->detailAttributes()) as $name => $value)
            $this->details()->updateOrCreate(compact('name'), compact('value'));
        return parent::update(Arr::except($attributes,$this->detailAttributes()),Arr::except($options,$this->detailAttributes()));
    }
}
