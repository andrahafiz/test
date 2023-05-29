<?php

namespace App\Http\Controllers\Supervisor;

use Carbon\Carbon;
use App\Models\Gas;
use App\Models\Demand;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class GasController extends Controller
{
    public function index()
    {
        $gas = Demand::whereDate('created_at', Carbon::today())->where(function ($query) {
            $query->where('status', 'Progress')
                ->orWhere('status', 'Done');
        })->whereNotNull('gas_id')->get();
        return view('Supervisor.sending-gas', compact('gas'));
    }

    public function pengajuan()
    {
        $gas = Demand::get();
        return view('Supervisor.index-gas', compact('gas'));
    }

    public function gas()
    {
        $gas = Gas::get();
        return view('Supervisor.gas', compact('gas'));
    }
}
