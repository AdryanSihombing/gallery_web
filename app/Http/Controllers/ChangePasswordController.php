<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('account.change-password');
    }

    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['password_wrong' => 'Password salah']);
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect('/u/' . $user->username)->with('password_changed');
    }
}
