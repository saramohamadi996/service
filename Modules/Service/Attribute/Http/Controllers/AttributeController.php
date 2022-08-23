<?php

namespace Service\Attribute\Http\Controllers;

use App\Http\Controllers\Controller;
use Service\Attribute\Http\Requests\Store;
use Service\Attribute\Http\Requests\Update;
use Service\Attribute\Models\Attribute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Service\Service\Models\Service;

class AttributeController extends Controller
{
    /**
     * it shows all attributes.
     *
     * @return View
     */
    protected function index():View
    {
        $attributes = Attribute::all();
        return view('Attributes::en.index',
            compact('attributes'));
    }

    /**
     * it shows the create form.
     *
     * @return View
     */
    public function create():View
    {
        $services = Service::all();
        return view('Attributes::en.create',
            compact('services'));
    }

    /**
     * it saves the created attribute.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function store(Store $store): RedirectResponse
    {
        Attribute::create([
            'type' => $store['type'],
            'title' => $store['title'],
            'service_id' => $store['service_id'],
        ]);
        return redirect()->route('attributes.index')
            ->with('success', 'Attribute created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $attribute
     * @return View
     */
    public function show(Attribute $attribute):View
    {
        //
    }

    /**
     * it shows the edit form.
     *
     * @param $attribute
     * @return View
     */
    public function edit( $attribute): View
    {
        $services = Service::all();
        $attribute = Attribute::find($attribute);
        return view('Attributes::en.edit',
            compact('attribute', 'services'));
    }

    /**
     * it saves changed attribute.
     *
     * @param Update $update
     * @param $id
     * @return RedirectResponse
     */

    public function update(Update $update, $id): RedirectResponse
    {
        $attribute = Attribute::find($id);
        $attribute->title = $update['title'];
        $attribute->type = $update['type'];
        $attribute->service_id = $update['service_id'];
        $attribute->save();
        return redirect()->route('attributes.index');
    }

    /**
     * it delete attribute.
    /**
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        //
    }

}

