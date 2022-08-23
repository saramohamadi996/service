<?php

namespace Service\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Service\Service\Http\Requests\Update;
use Service\Service\Http\Requests\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Service\Order\Models\Order;

class OrderController extends Controller
{
    /**
     * it shows all orders.
     *
     * @return View
     */
    protected function index():View
    {
        $orders = Order::all();
        return view('Orders::en.index', compact('orders'));
    }

    /**
     * it shows all orders.
     *
     * @param $id
     * @return View
     */
    protected function view($id):View
    {
        $order = Order::find($id);
        return view('Orders::en.view', compact('order'));
    }

    /**
     * it shows the create form.
     *
     * @return View
     */
    public function create():View
    {
        //
    }

    /**
     * it saves the created order.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function store(Store $store): RedirectResponse
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @param $order
     * @return View
     */
    public function show(Order $order):View
    {
        //
    }

    /**
     * it shows the edit form.
     *
     * @param $order
     * @return View
     */
    public function edit($order): View
    {
        //
    }

    /**
     * it saves changed order.
     *
     * @param Update $update
     * @param $id
     * @return RedirectResponse
     */
    public function update(Update $update, $id): RedirectResponse
    {

    }

    /**
     * it delete order.
     *
     * @return RedirectResponse
     */
    public function destroy(Order $order)
    {
        //
   }
}

