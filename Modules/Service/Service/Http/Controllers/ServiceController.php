<?php

namespace Service\Service\Http\Controllers;

use App\Http\Controllers\Controller;
use Service\Master\Responses\AjaxResponses;
use Service\Service\Http\Traits\uploadFileTrait;
use Service\Service\Http\Requests\Update;
use Service\Service\Http\Requests\Store;
use Service\Service\Http\Traits\getAll;
use Service\Category\Models\Category;
use Illuminate\Http\RedirectResponse;
use Service\Service\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    use uploadFileTrait;
    use getAll;

    /**
     * it shows all services.
     *
     * @return View
     */
    protected function index():View
    {
        $services = Service::all();
//            ->latest()->pagination();
        return view('Services::en.index',
            compact('services'));
    }

    /**
     * it shows the create form.
     *
     * @return View
     */
    public function create():View
    {
        $parent_id = $this->getAll();
        $categories = Category::whereIn('id', $parent_id)->get();
        return view('Services::en.create',
            compact('categories', 'parent_id'));
    }

    /**
     * it saves the created service.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function store(Store $store): RedirectResponse
    {
        if ($store->hasFile('image')) {
            $image = $this->uploadFile($store->file('image'),
                'public/upload/service/image');
        }
        Service::create([
            'title' => $store['title'],
            'priority' => $store['priority'],
            'slug' => Str::slug($store['slug']),
            'base_price' => $store['base_price'],
            'commission' => $store['commission'],
            'category_id' => $store['category_id'],
            'description' => $store['description'],
            'approved_price' => $store['approved_price'],
            'meta_description' => $store['meta_description'],
            'image'=>$image,
        ]);
        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $service
     * @return View
     */
    public function show(Service $service):View
    {
        //
    }

    /**
     * it shows the edit form.
     *
     * @param $service
     * @return View
     */
    public function edit($service): View
    {
        $service = Service::find($service);
        return view('Services::en.edit',
            compact('service'));
    }

    /**
     * it saves changed service.
     *
     * @param Update $update
     * @param $services
     * @return RedirectResponse
     */
    public function update(Update $update, $services): RedirectResponse
    {
        $service = Service::find($services);
        $image = $service->image;
        if ($update->hasFile('image')) {
            $image = $this->uploadFile($update->file('image'),
                'public/upload/service/image');
        }
        $service->update([
            'title' => $update['title'],
            'priority' => $update['priority'],
            'slug' => Str::slug($update['slug']),
            'commission' => $update['commission'],
            'base_price' => $update['base_price'],
            'description' => $update['description'],
            'approved_price' => $update['approved_price'],
            'meta_description' => $update['meta_description'],
            'image'=>$image,
        ]);
        return redirect()->route('services.index');
    }

//    /**
//     * it delete service.
//     *
//     * @return RedirectResponse
//     */
    public function destroy(Service $service)
    {
        $service->delete();
//        return response()->json(['massage'=> 'successfully'], status:Response::HTTP_OK);
    }

    /**
     * @param $id
     * @param Service $service
     * @return JsonResponse
     */
    public function waiting($id, Service $service): JsonResponse
    {
        if ($service->status($id, Service::STATUS_WAITING)){
            return AjaxResponses::SuccessResponse();
        }
        return AjaxResponses::FailedResponse();
    }

    /**
     * @param $id
     * @param Service $service
     * @return JsonResponse
     */
    public function accept($id, Service $service): JsonResponse
    {
        if ($service->status($id, Service::STATUS_ACCEPTED)){
            return AjaxResponses::SuccessResponse();
        }
        return AjaxResponses::FailedResponse();
    }

    /**
     * @param $id
     * @param Service $service
     * @return JsonResponse
     */
    public function reject($id, Service $service): JsonResponse
    {
        if ($service->status($id, Service::STATUS_REJECTED)){
            return AjaxResponses::SuccessResponse();
        }
        return AjaxResponses::FailedResponse();
    }
}

