<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Administrator';
        return view('backend.index', compact('title'));
    }
}
