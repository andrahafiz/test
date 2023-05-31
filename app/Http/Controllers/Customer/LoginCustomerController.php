<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerStoreRequest;

class LoginCustomerController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('customer.demand.index');
        } else {
            return back()->with([
                'gagal' => 'Terjadi kesalahan pada login, email atau password salah',
            ]);
        }
    }

    public function formRegister()
    {
        return view('register');
    }

    public function register(CustomerStoreRequest $request)
    {
        Customer::create([
            'name' => $request->name,
            'username' => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);
        return redirect()->route('customer.login')->with('success', 'Anda telah berhasil mendaftar, silahkan login dengan username dan password anda');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
