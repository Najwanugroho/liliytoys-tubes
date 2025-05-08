<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login'); // Mengembalikan tampilan login admin
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $pass = $request->password;
        // Validasi input

        $user = Admin::where('username',$username)->first();
        // dd($user->password);
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if($user && Hash::check($pass, $user->password)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // Redirect ke halaman login
        return redirect('/landing');
    }
}
