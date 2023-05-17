<?php

namespace App\Http\Controllers\RSCM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginRSCMController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('rscm')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('rscm.demand.request');
        } else {
            return back()->with([
                'gagal' => 'Terjadi kesalahan pada login, email atau password salah',
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('rscm')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
