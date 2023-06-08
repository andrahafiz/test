<?php

namespace App\Http\Controllers\MCS;

use App\Models\Gas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestGasController extends Controller
{
    public function index()
    {
        $gas = Gas::get();
        return view('MCS.RequestGas.index-gas', compact('gas'));
    }

    public function create()
    {
        return view('MCS.RequestGas.create-gas');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'periode' => 'required|unique:gases,period|date',
            'request_gas' => 'required',
        ]);
        $create = Gas::create([
            'period' => $validated['periode'],
            'name' => 'MCS Bojonegara [' . now()->format('d M Y') . ']',
            'availability' => str_replace(['MMSCFD', '.'], '',  $validated['request_gas']),
        ]);
        return redirect()->route('mcs.request-gas.index')->with('success', "Permintaan gas berhasil diajukan, mohon menunggu!");
    }
}
