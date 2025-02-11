<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view(
            'global.pages.home.index',
            [
                'pageTitle' => 'Home',
            ]
        );
    }
}
