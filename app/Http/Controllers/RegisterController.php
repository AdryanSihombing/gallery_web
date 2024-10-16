<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    function index() {
        return view('auth.register');
    }

    function store(Request $request) {
        $user_data = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'address' => 'nullable|max:255',
            'password' => 'required|min:8|max:255|confirmed'
        ]);

        $user_data['email'] = strtolower($user_data['email']);
        // Meng-enskripsi password
        $user_data['password'] = bcrypt($user_data['password']);
        // Menambahkan data user
        User::create($user_data);
        return redirect('/login');
    }
}
