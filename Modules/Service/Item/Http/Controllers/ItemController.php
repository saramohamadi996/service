<?php

namespace Service\Item\Http\Controllers;

use App\Http\Controllers\Controller;
use Service\Attribute\Models\Attribute;
use Service\Item\Http\Requests\Store;
use Service\Item\Http\Requests\Update;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Service\Item\Models\Item;

class ItemController extends Controller
{
    /**
     * it shows all items.
     *
     * @return View
     */
    protected function index(): View
    {
        //
    }

    /**
     * it shows all items.
     *
     * @param $attribute_id
     * @return View
     */
    protected function view($attribute_id):View
    {
        $items = Item::where('attribute_id', $attribute_id)->latest()->paginate(6);
        return view('Items::en.view', compact('items', 'attribute_id'));
    }

    /**
     * it shows the add form.
     *
     * @param $attribute_id
     * @return View
     */
    public function add($attribute_id):View
    {
        return view('Items::en.add', compact( 'attribute_id'));
    }

    /**
     * it saves the create item.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function store(Store $store): RedirectResponse
    {
        Item::create([
            'title' => $store['title'],
            'amount' => $store['amount'] ?? '0',
            'attribute_id' => $store['attribute_id'],
        ]);
        return redirect()->route('items.view', $store['attribute_id'])
            ->with('success', 'Item create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $item
     * @return View
     */
    public function show(Item $item):View
    {
        //
    }

    /**
     * it shows the edit form.
     *
     * @param $item
     * @return View
     */
    public function edit( $item): View
    {
        $attributes = Attribute::all();
        $item = Item::find($item);
        return view('Items::en.edit',
            compact('item', 'attributes'));
    }

    /**
     * it saves changed item.
     *
     * @param Update $update
     * @param $id
     * @return RedirectResponse
     */
    public function update(Update $update, $id): RedirectResponse
    {
        $item = Item::find($id);
        $item->title = $update['title'];
        $item->amount = $update['amount'] ?? '0';
        $item->attribute_id = $update['attribute_id'];
        $item->save();
        return redirect()->route('items.view', $update['attribute_id']);
    }

    /**
     * it delete item.
    /**
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        //
    }

}

