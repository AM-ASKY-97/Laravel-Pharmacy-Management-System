<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine = Medicine::paginate(5);

        return view('Admin.medicine-list', compact('medicine'));
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
            'drugName' => 'required',
            'price' => 'required',
        ]);

        $medicine = new Medicine();

        $medicine->drugs = $request->input('drugName');
        $medicine->amount = $request->input('price');
        $medicine->discount = $request->input('discount');

        $medicine->save();

        return redirect('medicine-list')->with('message', 'New Medicine Successfully Addedd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function findPrice(Request $request)
    {
        $data = Medicine::select('amount')->where('id', $request->id)->first();

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $medicineDelete = Medicine::find($id);
        $medicineDelete->delete();

        return redirect()->back()->with('message', 'Medicine Successfully deleted');
    }
}
