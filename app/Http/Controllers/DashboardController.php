<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardPage(Request $request){
        
        return view('dashboard');
    }
}
