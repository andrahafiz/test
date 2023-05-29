<?php

namespace App\Http\Controllers\MCS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class   LoginMCSController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('mcs')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('mcs.demand.index');
        } else {
            return back()->with([
                'gagal' => 'Terjadi kesalahan pada login, email atau password salah',
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('mcs')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
