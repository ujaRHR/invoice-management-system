<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function customerLoginPage()
    {
        return view('pages.customer-login');
    }
}
