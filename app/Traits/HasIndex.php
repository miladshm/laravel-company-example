<?php

namespace App\Traits;

use App\Http\Requests\ListRequest;
use Illuminate\Database\Eloquent\Builder;

trait HasIndex
{
    public $model;
    private $pageLength = 10;


    /**
     * @param $pageLength
     * @return $this
     */
    public function paginate($pageLength = null)
    {
//        $skip = \request('skip') ?? 0;
//        $take = request('take') ?? $pageLength;
//        $page = floor($skip / $take) + 1;
        $this->model = $this->model->simplePaginate(request('pageLength') ?? $pageLength);

        return $this;
        //        $paginator['total'] = $model->total();
//        $data = fractal()->collection($paginator, $this->transformer)->serializeWith(new ArraySerializer)
//            ->toArray();
//        dd($model);
    }

    /**
     * @param ListRequest $request
     * @param Builder $model
     * @param null $pageLength
     * @return Builder
     */
    public function grid(ListRequest $request ,Builder $model, $pageLength = null)
    {
        $this->model = $model;
        $this->search()->sortResult()->paginate($pageLength ?? $this->pageLength);
        return $this->model;
    }


    /**
     * @return $this
     */
    private function search()
    {
        if (\request()->filled('q')) {
            $q = \request('q');
            $searchable = request('searchable') ?? ['title', 'name', 'body', 'description'];
            $this->model = $this->model->where(function ($s) use ( $q, $searchable) {
                foreach ($searchable as $item) {
                    if (\Schema::hasColumn($this->model->getModel()->getTable(), $item))
                        $s->orwhere($item, 'LIKE', '%' . $q . '%');
                }
            });
        }

        return $this;

    }

    /**
     * @return $this
     */
    public function sortResult()
    {
        if (request()->filled('sort') && count(\request('sort'))) {
            $sort = request('sort');
            $this->model = $this->model->orderBy($sort['column'] ?? "created_at", $sort['order'] ?? "desc");
        } elseif (\Schema::hasColumn($this->model->getModel()->getTable(),'position')) {
            $this->model = $this->model->orderBy('position');
        } else
            $this->model = $this->model->latest();

        return $this;
    }
}
