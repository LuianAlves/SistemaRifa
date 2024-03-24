<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Rifa;

class IndexController extends Controller
{
    public function index ()
    {
        $rifas = Rifa::get();

        return view('app.index', compact('rifas'));
    }
}
