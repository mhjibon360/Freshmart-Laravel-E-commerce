<?php

namespace App\Http\Controllers\Backnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index()
    {
        return ('admin dashboard');
    }
}
