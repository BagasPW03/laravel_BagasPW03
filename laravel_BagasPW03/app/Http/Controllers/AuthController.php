<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function showLogin() { return view('/login'); }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/rumahsakit');
        }

        return back()->withErrors(['username' => 'Username atau password salah'])->onlyInput('username');
    }

    public function showRegister() { return view('/register'); }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        User::create([
            'name' => $data['name'] ?? null,
            'username' => $data['username'],
            'email' => $data['email'] ?? null,
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('login')->with('success','Account created');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
