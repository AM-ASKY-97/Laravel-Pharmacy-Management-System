<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $title = "Pharmacy Login";
        $class = 'active';
        return view('Auth.Login', compact('title', 'class'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'min:8', 'string'],
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();

            Auth::login($user);

            if(Auth()->user()->role == '1')
            {
                return redirect('admin-dashboard');
            }

            else
            {
                return redirect('user-dashboard');
            }

        }

        else
        {
            return back()->with('error', 'Invalid credentials!');
        }
    }

    public function messages()
    {
        return [
            'email.exists:users' => 'A title is required',
        ];
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
