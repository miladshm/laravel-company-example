<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Models\SocialNetwork;
use App\Repositories\concretes\SocialNetworkRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
    private SocialNetwork $model;
    private string $modelName;
    private SocialNetworkRepository $repo;

    public function __construct()
    {
        $this->model = new SocialNetwork();
        $this->modelName = get_class($this->model);
        $this->repo = new SocialNetworkRepository();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SocialRequest $request
     * @return JsonResponse
     */
    public function store(SocialRequest $request)
    {
        $data = array_filter($request->all(),'strlen');

        foreach ($data as $title => $url) {
            SocialNetwork::query()->updateOrCreate(compact('title'),[
                'url' => $url,
                'icon' => $title
            ]);
        }
        return response()->json($this->repo->success);
    }
}
