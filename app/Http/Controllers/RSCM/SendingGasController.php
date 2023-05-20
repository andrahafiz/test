<?php

namespace App\Http\Controllers\RSCM;

use Carbon\Carbon;
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
    public function __invoke(Request $request)
    {
        $gas = Demand::whereDate('created_at', Carbon::today())->where('status', 'Progress')->orWhere('status', 'Done')->whereNotNull('gas_id')->get();
        return view('RSCM.Gas.sending-gas', compact('gas'));
    }
}
