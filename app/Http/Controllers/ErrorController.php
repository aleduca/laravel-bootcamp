<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    public function error404(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('errors.404');
    }
}
