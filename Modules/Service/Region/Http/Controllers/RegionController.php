<?php

namespace Service\Region\Http\Controllers;

use App\Http\Controllers\Controller;
use Service\Region\Http\Requests\Store;
use Service\Region\Http\Requests\Update;
use Service\Region\Models\Region;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Service\City\Models\City;

class RegionController extends Controller
{
    /**
     * it shows all regions.
     *
     * @return View
     */
    protected function index():View
    {
       //
    }

    protected function view($city_id):View
    {
        $regions = Region::where('city_id', $city_id)->get();
        return view('Regions::en.view', compact('regions', 'city_id'));
    }

    /**
     * it shows the add form.
     *
     * @param $city_id
     * @return View
     */
    public function add($city_id):View
    {
        return view('Regions::en.add', compact( 'city_id'));
    }

    /**
     * it saves the create region.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function store(Store $store): RedirectResponse
    {
        Region::create([
            'name' => $store['name'],
            'city_id' => $store['city_id'],
        ]);
        return redirect()->route('regions.view', $store['city_id'])
            ->with('success', 'Region create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $region
     * @return View
     */
    public function show(Region $region):View
    {
        //
    }

    /**
     * it shows the edit form.
     *
     * @param $region
     * @return View
     */
    public function edit( $region): View
    {
        $cities = City::all();
        $region = Region::find($region);
        return view('Regions::en.edit',
            compact('region', 'cities'));
    }

    /**
     * it saves changed region.
     *
     * @param Update $update
     * @param $id
     * @return RedirectResponse
     */
    public function update(Update $update, $id): RedirectResponse
    {
        $region = Region::find($id);
        $region->name = $update['name'];
        $region->city_id = $update['city_id'];
        $region->save();
        return redirect()->route('regions.view', $update['city_id']);
    }

    /**
     * it delete region.
    /**
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        //
    }

}

