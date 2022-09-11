<?php

namespace App\Http\Controllers;

use App\Models\PrecriptionModel;
use App\Models\Quaotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function index()
    {
        $totalPrecription = PrecriptionModel::where('user_id', Auth::id())->count();
        $accept = DB::table('quaotations')->where('status', '1')->where('user_id', Auth::id())->distinct('order_id')->count('status');
        $reject = DB::table('quaotations')->where('status', '2')->where('user_id', Auth::id())->distinct('order_id')->count('status');
        $pending = DB::table('quaotations')->where('status', '0')->where('user_id', Auth::id())->distinct('order_id')->count('status');
        return view('user.dashboard', compact('totalPrecription', 'accept', 'reject', 'pending'));
    }
}
