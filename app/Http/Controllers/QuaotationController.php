<?php

namespace App\Http\Controllers;

use App\Models\Quaotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuaotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
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
            'drug_name'=>'required',
            'quanity' => 'required',
        ]);

        $data = new Quaotation();

        $que = $request->input('quanity');
        $price = $request->input('drug_price');

        $data->drugs = $request->input('drug_name');
        $data->quanity = $request->input('quanity');

        $amount = $que * $price;
        $data->amount = $amount;

        $data->order_id = $request->input('prescription_id');

        $data->user_id = $request->input('user_id');

        DB::table('precription_models')->where('id', $request->id)->update(array('confirm' => $request->order));


        $data->save();

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quaotation  $quaotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quaotation $quaotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quaotation  $quaotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quaotation $quaotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quaotation  $quaotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quaotation $quaotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quaotation  $quaotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quaotation $quaotation)
    {
        //
    }
}
