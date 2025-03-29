<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin_dashboard');
    }
    public function admin_logout()
    {
        session()->remove('admin');
        // session()->flash('success', "Logged out successfully");
        return redirect()->route('signin');
    }
}
