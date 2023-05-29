<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginSupervisorController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('supervisor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('supervisor.sending.index');
        } else {
            return back()->with([
                'gagal' => 'Terjadi kesalahan pada login, email atau password salah',
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('supervisor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('supervisor.login');
    }
}
