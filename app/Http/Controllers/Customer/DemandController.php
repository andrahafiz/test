<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\DemandStoreRequest;
use App\Models\Demand;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    //
    public function index()
    {
        $gas = Demand::where('customer_id', auth()->user()->id)->get();
        return view('Customer.Gas.index-gas', compact('gas'));
    }

    public function create()
    {
        return view('Customer.Gas.create-gas');
    }

    public function store(DemandStoreRequest $request)
    {
        $create = Demand::create([
            'name' => "Pengajuan Gas " . auth()->user()->name,
            'customer_id' => auth()->user()->id,
            'request_gas' => (float) $request->input('inp_requestgas')
        ]);

        return redirect()->route('customer.demand.index');
    }

    public function destory(Demand $demand)
    {
        $demand->delete();
        return redirect()->route('customer.demand.index')->with('success', "Data kendaraan berhasil dihapus");       # code...
    }
}
