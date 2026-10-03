<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();

        return view('admin.dashboard', compact('totalUsuarios'));
    }
}