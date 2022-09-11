<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CostomerController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('Admin.customers', compact('user'));
    }
}
