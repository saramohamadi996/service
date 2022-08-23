<?php

namespace Service\City\Http\Controllers;

use App\Http\Controllers\Controller;
use Service\Attribute\Models\Attribute;
use Service\City\Http\Requests\Store;
use Service\City\Http\Requests\Update;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Service\City\Models\City;

class CityController extends Controller
{
//    /**
//     * it shows all cities.
//     *
//     * @return View
//     */
//    protected function index(): View
//    {
//        //
//    }

    /**
     * it shows all cities.
     *
     * @param $state_id
     * @return View
     */
    protected function view($state_id):View
    {
        $cities = City::where('state_id', $state_id)->get();
        return view('Cities::en.view',
            compact('cities', 'state_id'));
    }

    /**
     * it shows the add form.
     *
     * @param $state_id
     * @return View
     */
    public function add($state_id):View
    {
        return view('Cities::en.add',
            compact( 'state_id'));
    }

    /**
     * it saves the create city.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function store(Store $store): RedirectResponse
    {
        City::create([
            'name' => $store['name'],
            'state_id' => $store['state_id'],
        ]);
        return redirect()->route('cities.view', $store['state_id'])
            ->with('success', 'City create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $city
     * @return View
     */
    public function show(City $city):View
    {
        //
    }

    /**
     * it shows the edit form.
     *
     * @param $city
     * @return View
     */
    public function edit( $city): View
    {
        $states = Attribute::all();
        $city = City::find($city);
        return view('Cities::en.edit',
            compact('city', 'states'));
    }

    /**
     * it saves changed city.
     *
     * @param Update $update
     * @param $id
     * @return RedirectResponse
     */
    public function update(Update $update, $id): RedirectResponse
    {
        $city = City::find($id);
        $city->name = $update['name'];
        $city->amount = $update['amount'] ?? '0';
        $city->state_id = $update['state_id'];
        $city->save();
        return redirect()->route('cities.view', $update['state_id']);
    }

    /**
     * it delete city.
    /**
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        //
    }

}

