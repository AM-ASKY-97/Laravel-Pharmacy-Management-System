<?php

namespace App\Http\Controllers;

use App\Models\PrecriptionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrecriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = PrecriptionModel::where('user_id', Auth::id())->get();

        return view('user.precribtion-history', compact('user'));
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
            'note' => 'required',
            'address' => 'required',
            'image1' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'image4' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'image5' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $image1 = time() . rand(1, 1000) . '.' . $request->image1->extension();
        $request->image1->move(public_path('images'), $image1);

        $image2 = time() . rand(1, 1000) . '.' . $request->image2->extension();
        $request->image2->move(public_path('images'), $image2);

        $image3 = time() . rand(1, 1000) . '.' . $request->image3->extension();
        $request->image3->move(public_path('images'), $image3);

        $image4 = time() . rand(1, 1000) . '.' . $request->image4->extension();
        $request->image4->move(public_path('images'), $image4);

        $image5 = time() . rand(1, 1000) . '.' . $request->image5->extension();
        $request->image5->move(public_path('images'), $image5);

        $user = new PrecriptionModel();

        $user->note = $request->input('note');
        $user->address = $request->input('address');
        $user->user_id = $request->input('user_id');
        $user->image1 = "images/" . $image1;
        $user->image2 = "images/" . $image2;
        $user->image3 = "images/" . $image3;
        $user->image4 = "images/" . $image4;
        $user->image5 = "images/" . $image5;

        $user->save();

        return redirect('precribtion-history');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $precription = PrecriptionModel::all();

        return view('Admin.prescription-list', compact('precription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
