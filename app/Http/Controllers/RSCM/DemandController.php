<?php

namespace App\Http\Controllers\RSCM;

use App\Models\Gas;
use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RSCM\DemandStoreRequest;

class DemandController extends Controller
{
    //
    public function indexRequest()
    {
        $gas = Demand::whereDate('created_at', Carbon::today())->where('status', 'Request')->get();
        return view('RSCM.Gas.index-request', compact('gas'));
    }

    public function approv()
    {
        $gas = Gas::whereDate('period', Carbon::today())->first();
        $current = Demand::where('gas_id', $gas->id)->sum('received_gas');
        $current = $gas->availability - $current;

        try {
            DB::transaction(function () use ($current) {
                $gas = Demand::whereDate('created_at', Carbon::today())->where('status', 'Request')->get();
                foreach ($gas as $item) {
                    if ($current <= 0.0) {
                        $item->update([
                            'status' => 'Tolak (Habis)'
                        ]);
                    } else {
                        $item->update([
                            'status' => 'Terima (RSCM)'
                        ]);
                    }
                }
            });
            if ($current <= 0.0) {
                return redirect()->route('rscm.demand.request')->with('success', "Data gagal diajukan, Gas telah habis");       # code...
            }
            return redirect()->route('rscm.demand.request')->with('success', "Data berhasil diajukan ke MCS");       # code...
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
