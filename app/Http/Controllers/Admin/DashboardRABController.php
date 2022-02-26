<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardRABController extends Controller
{
    public function index()
    {
        $title = 'Dashboard RAB | Admin';

        return view('Admin.dashboard-rab',compact('title'));
    }
}
