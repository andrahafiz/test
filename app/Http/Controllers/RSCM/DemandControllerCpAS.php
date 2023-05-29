<?php

namespace App\Http\Controllers\RSCM;

use App\Models\Gas;
use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RSCM\DemandStoreRequest;

class DemandControllerCpAS extends Controller
{
    //
    public function indexRequest()
    {
        $gas = Gas::whereDate('period', Carbon::today())->first();
        $demand = Demand::whereDate('created_at', Carbon::today())->where('status', 'Terima (MCS)')->get();
        return view('RSCM.Gas.index-request', compact('demand', 'gas'));
    }


    public function approv(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                foreach ($request->inp_demand as $key => $item) {
                    $deman = Demand::find($item);
                    $deman->received_gas = $request->inp_availabily[$key];
                    $deman->status = 'Progress';
                    $deman->gas_id = $request->inp_period;
                    $deman->save();
                }
            });
            return redirect()->route('rscm.demand.request')->with('success', "Data diterima");       # code...
        } catch (\Throwable $th) {
            throw $th;
        };
    }

    public function index()
    {
        $gas = Demand::get();
        return view('RSCM.Gas.index-gas', compact('gas'));
    }

    public function create()
    {
        return view('RSCM.Gas.create-gas');
    }

    public function store(Request $request)
    {

        // $create = Demand::create([
        //     'name' => "Pengajuan " . auth()->user()->name,
        //     'customer_id' => auth()->user()->id,
        //     'request_gas' => (float) $request->input('inp_requestgas')
        // ]);

        // return redirect()->route('customer.demand.index');
    }
}
