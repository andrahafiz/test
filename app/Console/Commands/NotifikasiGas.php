<?php

namespace App\Console\Commands;

use Exception;
use Carbon\Carbon;
use App\Models\Gas;
use App\Models\Demand;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifikasiGas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gas:notifikasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $gas = Gas::whereDate('period', Carbon::today())->where('lelang', 0)->first();
        $demand = Demand::where('gas_id', $gas->id)->get();
        foreach ($demand as $item) {
            Mail::to($item->customer->email)->send(new \App\Mail\NotifikasiGas($item));
            $item->status = 'Done';
            $item->save();
        }
    }
}
