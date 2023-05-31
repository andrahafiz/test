<?php

namespace App\Http\Controllers\Medco;

use App\Models\Gas;
use App\Models\Demand;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class GasController extends Controller
{
    public function approv(Gas $gas, Request $request)
    {
        $check = $gas->update([
            'approval' => true, 'status' => true
        ]);
        if (!$check) {
            return redirect()->route('medco.approv.index')->with('error', "Terjadi kesalahan");
        }
        return redirect()->route('medco.approv.index')->with('success', "Data telah di approve");
    }

    public function index()
    {
        $gas = Gas::get();
        return view('Medco.Gas.index-gas', compact('gas'));
    }
}
