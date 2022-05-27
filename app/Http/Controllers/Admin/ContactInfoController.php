<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactInfoRequest;
use App\Models\ContactInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactInfoRequest $request
     * @return JsonResponse
     */
    public function store(ContactInfoRequest $request)
    {
        $item = ContactInfo::query()->create($request->all());

        return \response()->json(trans('messages.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param ContactInfo $contactInfo
     * @return JsonResponse
     */
    public function show(ContactInfo $contactInfo)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContactInfo $contactInfo
     * @return JsonResponse
     */
    public function edit(ContactInfo $contactInfo)
    {
        $contact_groups = ['company' => 'کارخانه','office' => 'دفتر مرکزی'];
        $form = view('admin.settings.contactInfoEdit',compact('contactInfo','contact_groups'))->render();
        return \response()->json($form);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactInfoRequest $request
     * @param ContactInfo $contactInfo
     * @return JsonResponse
     */
    public function update(ContactInfoRequest $request, ContactInfo $contactInfo)
    {
        try {
            $contactInfo->update($request->all());
        } catch (\Exception $exception){
            return \response()->json(trans('messages.error_status'));
        }
        return \response()->json(trans('messages.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ContactInfo $contactInfo
     * @return JsonResponse
     */
    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();
        return \response()->json(trans('messages.success_delete'));
    }
}
