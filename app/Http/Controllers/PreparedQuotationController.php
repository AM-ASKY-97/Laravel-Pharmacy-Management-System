<?php

namespace App\Http\Controllers;

use App\Models\PreparedQuotation;
use App\Models\Quaotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PreparedQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data =  DB::select('select order_id, status, precription_models.note, SUM(amount) AS amount FROM quaotations INNER JOIN precription_models ON precription_models.id = quaotations.order_id WHERE quaotations.user_id='.Auth::id().'  GROUP by(order_id);');
        //$data = Quaotation::select('order_id')->where('user_id', Auth::id())->groupBy('order_id')->SUM('amount')->get();
        return view('user.prepared-quotation', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $data = DB::table('quaotations')->where('order_id', $request->id)->update(array('status' => $request->status));

        return redirect('prepared-quotation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreparedQuotation  $preparedQuotation
     * @return \Illuminate\Http\Response
     */
    public function show(PreparedQuotation $preparedQuotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreparedQuotation  $preparedQuotation
     * @return \Illuminate\Http\Response
     */
    public function edit(PreparedQuotation $preparedQuotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PreparedQuotation  $preparedQuotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreparedQuotation $preparedQuotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreparedQuotation  $preparedQuotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreparedQuotation $preparedQuotation)
    {
        //
    }
}
