<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        $username = Cookie::get('login_username');
        $password = Cookie::get('login_password');
        $remember = $username && $password;

        return view('auth.login', compact('username', 'password', 'remember'));
    }

    // Mengautentikasi pengguna
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Debug: Lihat data yang diterima
        Log::info('Login attempt:', $credentials);

        $remember = $request->has('remember');

        // Cek apakah kredensial valid
        if (Auth::attempt($credentials, $remember)) {
            // Simpan cookie jika remember me diaktifkan
            if ($remember) {
                Cookie::queue('login_username', $request->username, 10080); // 7 hari
                Cookie::queue('login_password', $request->password, 10080); // 7 hari
            } else {
                Cookie::queue(Cookie::forget('login_username'));
                Cookie::queue(Cookie::forget('login_password'));
            }

            $request->session()->regenerate();

            // Cek jika user adalah admin
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
            }

            return redirect()->intended('/'); // Redirect ke halaman yang diinginkan
        }

        // Cek apakah username ada di database
        $user_exist = User::where('username', $request->username)->exists();

        if (!$user_exist) {
            return back()->withInput()->withErrors(['username_not_found' => 'Username tidak ditemukan']);
        }

        // Password salah
        return back()->withInput()->withErrors(['password_wrong' => 'Password salah']);
    }

    // Mengeluarkan pengguna
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirect ke halaman login setelah logout
    }
}
