<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(!session()->has('LoggedUser')){
            return redirect('login');
        }
        return view('admin/dashboard');
    }
}
