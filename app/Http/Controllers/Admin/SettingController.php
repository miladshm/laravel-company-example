<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactInfoDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Helpers\SettingHelper\Models\Setting;
use App\Models\SocialNetwork;
use App\Repositories\concretes\SettingRepository;
use DB;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class SettingController extends Controller
{

    /**
     * @var string
     */
    private string $modelName;

    /**
     * @var Setting
     */
    private Setting $model;
    private SettingRepository $repo;

    public function __construct()
    {
        $this->model = new Setting();
        $this->modelName = get_class($this->model);
        $this->repo = new SettingRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(ContactInfoDataTable $dataTable)
    {
        $settings = Setting::query()->get();
        $socials = SocialNetwork::query()->get()->pluck('url','title');
        $contact_groups = ['company' => 'کارخانه','office' => 'دفتر مرکزی'];
        $title = 'تنظیمات سایت';
        return $dataTable->render('admin.settings.settings',compact('settings','contact_groups', 'title','socials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SettingRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(SettingRequest $request)
    {
//        dd($request->all());
        DB::beginTransaction();
        try {
            foreach ($request->except('_token') as $name => $value) {
                $item = $this->model->query()->updateOrCreate(compact('name'), compact('value'));
            }
        } catch (Exception $e) {
            DB::rollBack();
            $this->repo->error['message'] = $e->getMessage();
            return \response()->json($this->repo->error,500);
        }
        DB::commit();
        $settings = $this->model->query()->get();
        $this->repo->success['item'] = $settings;
        return \response()->json($this->repo->success);
    }

}
