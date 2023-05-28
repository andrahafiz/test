<?php

namespace App\Http\Controllers\Medco;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class   LoginMedcoController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('medco')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('medco.approv.index');
        } else {
            return back()->with([
                'gagal' => 'Terjadi kesalahan pada login, email atau password salah',
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('medco')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('medco.login');
    }
}
