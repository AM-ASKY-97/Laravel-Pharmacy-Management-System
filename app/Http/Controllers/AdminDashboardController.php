<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\PrecriptionModel;
use App\Models\Quaotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $customers = User::where('role', '0')->count();
        $medicines = Medicine::all()->count();
        $newMedicines = PrecriptionModel::where('confirm', '0')->count();
        $accept = DB::table('quaotations')->where('status', '1')->distinct('order_id')->count('status');
        $reject = DB::table('quaotations')->where('status', '2')->distinct('order_id')->count('status');
        $pending = DB::table('quaotations')->where('status', '0')->distinct('order_id')->count('status');
        return view('Admin.admin-dashboard', compact('customers', 'medicines', 'newMedicines', 'accept', 'reject', 'pending'));
    }

    public function accept()
    {
        $data =  DB::select('select order_id, status, precription_models.note, SUM(amount) AS amount FROM quaotations INNER JOIN precription_models ON precription_models.id = quaotations.order_id where status=1 GROUP by(order_id);');
        return view('Admin.accept', compact('data'));
    }

    public function reject()
    {
        $data =  DB::select('select order_id, status, precription_models.note, SUM(amount) AS amount FROM quaotations INNER JOIN precription_models ON precription_models.id = quaotations.order_id where status=2 GROUP by(order_id);');
        return view('Admin.reject', compact('data'));
    }

    public function pending()
    {
        $data =  DB::select('select order_id, status, precription_models.note, SUM(amount) AS amount FROM quaotations INNER JOIN precription_models ON precription_models.id = quaotations.order_id where status=0 GROUP by(order_id);');
        return view('Admin.pending', compact('data'));
    }
}
