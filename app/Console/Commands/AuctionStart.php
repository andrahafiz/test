<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Gas;
use App\Models\Demand;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Exception;

class AuctionStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gas:lelang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah untuk memulai lelang gas';

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

        try {
            $gas = Gas::whereDate('period', Carbon::today())->where('lelang', 0)->first();
            $demand = Demand::where('gas_id', $gas->id)->get();
            $total_gas = $demand->sum('gas');
            $gas_sisa = $gas->availability - $total_gas;
            $details = [
                'gas_sisa' => $gas_sisa,
                'link' => route('customer.lelang.gas')
            ];
            if ($gas->availability > $total_gas) {
                foreach ($demand as $item) {
                    Mail::to($item->customer->email)->send(new \App\Mail\AuctionMail($item->customer->name, $details));
                }
            }
            $gas->lelang = 1;
            $gas->save();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
