<?php

namespace Service\State\Http\Controllers;

use App\Http\Controllers\Controller;
use Service\State\Http\Requests\Store;
use Service\State\Http\Requests\Update;
use Service\State\Models\State;
use Illuminate\Http\RedirectResponse;
use Service\Service\Models\Order;
use Illuminate\Contracts\View\View;

class StateController extends Controller
{
    /**
     * it shows all states.
     *
     * @return View
     */
    protected function index():View
    {
        $states = State::all();
        return view('States::en.index',
            compact('states'));
    }

    /**
     * it shows the create form.
     *
     * @return View
     */
    public function create():View
    {
        return view('States::en.create');
    }

    /**
     * it saves the created state.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function store(Store $store): RedirectResponse
    {
        State::create([
            'name' => $store['name'],
        ]);
        return redirect()->route('states.index')
            ->with('success', 'Region created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $state
     * @return View
     */
    public function show(State $state):View
    {
        //
    }

    /**
     * it shows the edit form.
     *
     * @param $state
     * @return View
     */
    public function edit( $state): View
    {
        $state = State::find($state);
        return view('States::en.edit', compact('state'));
    }

    /**
     * it saves changed state.
     *
     * @param Update $update
     * @param $id
     * @return RedirectResponse
     */

    public function update(Update $update, $id): RedirectResponse
    {
        $state = State::find($id);
        $state->name = $update['name'];
        $state->save();
        return redirect()->route('states.index');
    }

    /**
     * it delete state.
    /**
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        //
    }

}

