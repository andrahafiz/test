<?php

namespace App\Http\Controllers\MCS;

use Carbon\Carbon;
use App\Models\Gas;
use App\Models\Demand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendingGasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gas = Demand::whereDate('created_at', Carbon::today())->where(function ($query) {
            $query->where('status', 'Progress')
                ->orWhere('status', 'Done');
        })->whereNotNull('gas_id')->get();
        return view('MCS.Gas.sending-gas', compact('gas'));
    }

    public function show(Demand $demand)
    {
        $gas = Gas::whereDate('period', Carbon::today())->first();
        return view('MCS.Gas.form-create-sending', compact('gas', 'demand'));
    }

    public function send(Demand $demand, Request $request)
    {
        $validatedData = $request->validate([
            'inp_gas' => ['required', 'lte:inp_availabily'],
        ]);
        $total = $demand->gas + $request->inp_gas;
        if ($total >= $demand->received_gas) {
            $demand->gas = $demand->received_gas;
            $demand->status = 'Done';
            $demand->save();
            return redirect()->route('mcs.sending.gas')->with('success', "Gas telah dikirim, angka yang anda masukan melebih nominasi. Gas yang dikirim disesuaikan dengan nominasi");
        } else {
            $demand->gas = $request->inp_gas;
            $demand->save();
            return redirect()->route('mcs.sending.gas')->with('success', "Gas telah dikirim sebanyak " . $request->inp_gas);
        }
    }
}
