<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Gas;
use App\Models\Demand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuctionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gas = Gas::whereDate('period', Carbon::today())->where('lelang', 1)->first();
        $demand = Demand::where('gas_id', $gas->id)->get();
        $total_gas = $demand->sum('gas');
        $gas_sisa = $gas->availability - $total_gas;
        return view('Customer.lelang-gas', compact('gas', 'gas_sisa', 'total_gas'));
    }

    public function claim(Request $request)
    {
        $gas = Gas::find($request->gas_id);
        $demand = Demand::where('gas_id', $gas->id)->where('customer_id', auth()->user()->id)->first();
        $demand->gas = (float) $demand->gas + (float) $request->inp_sisagas;
        $demand->status = 'Done';
        $demand->save();
        return redirect()->route('customer.lelang.gas')->with('success', 'Selamat, anda berhasil memenangkan lelang ini');
    }
}
