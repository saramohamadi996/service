<?php

namespace Service\Master\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class MasterController extends Controller
{
    /**
     * @return View
     */
    public function master(): View
    {
        return view('Master::en.index');
    }
}
