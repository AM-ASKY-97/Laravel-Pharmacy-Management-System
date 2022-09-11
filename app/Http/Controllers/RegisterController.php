<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$title = "Pharmacy Register";
        return view('Auth.Register')->with('message', 'Pharmacy Register');
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
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'mobile' => ['required', 'min:10'],
            'address' => 'required',
            'dob' => 'required',
            'password' => ['required', 'min:8', 'string', 'confirmed']
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile_no = $request->input('mobile');
        $user->address = $request->input('address');
        $user->password = Hash::make($request->input('password'));
        $user->dob = $request->input('dob');

        $user->save();

        Auth::login($user);

        return redirect('user-dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([
            'name' => 'required',
            'mobile' => ['required', 'min:10'],
            'address' => 'required',
            'dob' => 'required',
            'logo' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $user = User::find($id);

        if($request->file('logo'))
        {
            $logo = time() . rand(1, 1000) . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $logo);
            $user->logo = "images/" .$logo;
        }

        $user->name = $request->input('name');
        $user->mobile_no = $request->input('mobile');
        $user->address = $request->input('address');
        $user->dob = $request->input('dob');

        $user->save();

        return redirect()->back();
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
