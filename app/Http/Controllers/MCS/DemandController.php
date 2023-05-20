<?php

namespace App\Http\Controllers\MCS;

use App\Models\Gas;
use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApproveGasMcsRequest;
use Illuminate\Validation\ValidationException;

use function PHPSTORM_META\map;

class DemandController extends Controller
{
    //
    public function indexRequest()
    {
        $gas = Gas::whereDate('period', Carbon::today())->first();
        $demand = Demand::whereDate('created_at', Carbon::today())->where('status', 'Terima (RSCM)')->get();
        return view('MCS.Gas.index-request', compact('demand', 'gas'));
    }


    public function approv(ApproveGasMcsRequest $request)
    {
        $a = collect($request->inp_availabily);
        dd($a);
        dd($a->sum('recei'));
        throw ValidationException::withMessages(['user' => 'NOT_IN_GROUP_MEMBER']);
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
            return redirect()->route('msc.demand.request')->with('success', "Data diterima");       # code...
        } catch (\Throwable $th) {
            throw $th;
        };
    }

    public function index()
    {
        $gas = Demand::paginate(5);
        return view('MCS.Gas.index-gas', compact('gas'));
    }

    public function create()
    {
        return view('MCS.Gas.create-gas');
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
