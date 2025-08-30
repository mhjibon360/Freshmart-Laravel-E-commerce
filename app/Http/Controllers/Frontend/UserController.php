<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the user dashboard.
     */
    public function index()
    {
        return view('frontend.pages.dashboard.index');
    }

    /**
     * Show the user orders.
     */
    public function order()
    {
        return view('frontend.pages.dashboard.order');
    }

    /**
     * Show the user settings.
     */
    public function setting()
    {
        return view('frontend.pages.dashboard.setting');
    }
}
