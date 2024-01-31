<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signin(Request $request)
    {
        //validation
        $data = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        
        if (Auth::attempt($data)) {
            
            $request->session()->regenerate();

            if (Auth::check()) {
                if (Auth::user()->role == 'admin') {
                    return redirect(route('dashboard'));
                }
                elseif (Auth::user()->role == 'user') {
                    return redirect(route('user'));
                }
            }
            else {
                return redirect(route('login'));
            }
        }

        return redirect(route('login'))->with('norecord','The provided credentials do not match our records.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
