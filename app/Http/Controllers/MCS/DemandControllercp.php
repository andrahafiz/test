<?php

namespace App\Http\Controllers\MCS;

use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RSCM\DemandStoreRequest;

class DemandControllerCp extends Controller
{
    //
    public function indexRequest()
    {
        $gas = Demand::whereDate('created_at', Carbon::today())->where('status', 'Request')->get();
        return view('RSCM.Gas.index-request', compact('gas'));
    }

    public function approv()
    {
        try {
            DB::transaction(function () {
                $gas = Demand::whereDate('created_at', Carbon::today())->where('status', 'Request')->get();
                foreach ($gas as $item) {
                    $item->update([
                        'status' => 'Terima (RSCM)'
                    ]);
                }
            });
            return redirect()->route('mcs.demand.request')->with('success', "Data berhasil diajukan ke RSCM");       # code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function index()
    {
        $gas = Demand::paginate(5);
        return view('RSCM.Gas.index-gas', compact('gas'));
    }

    public function create()
    {
        return view('RSCM.Gas.create-gas');
    }

    public function store(Request $request)
    {
        $create = Demand::create([
            'name' => "Pengajuan " . auth()->user()->name,
            'customer_id' => auth()->user()->id,
            'request_gas' => (float) $request->input('inp_requestgas')
        ]);

        return redirect()->route('customer.demand.index');
    }
}
