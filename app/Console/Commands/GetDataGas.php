<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Demand;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetDataGas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:gas';

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
        try {
            $this->setGas();
            // Log::info('sukses');
            return Command::SUCCESS;
        } catch (\Exception $ex) {
            $this->error($ex->getMessage());

            return Command::FAILURE;
        }
    }

    public function setGas()
    {
        $gases = Demand::whereBetween('created_at', [Carbon::today(), Carbon::now()->addDay()])
            ->where('status', 'Progress')
            ->where('status', '<>', 'Done')
            ->whereNotNull('received_gas')
            ->whereNotNull('gas_id')->get();

        foreach ($gases as $gas) {
            if ($gas->gas <= $gas->received_gas) {
                $subtraction = (int) $gas->received_gas ?? 0 - $gas->gas ?? 0;
                $randNumber = random_int(0, $subtraction);
                $gasValue = $randNumber + $gas->gas;
                if ($gasValue >= $gas->received_gas) {
                    $gas->gas = $gas->received_gas;
                    $gas->status = 'Done';
                } else {
                    $gas->gas = $gasValue;
                }
                $gas->save();
            }
        }
    }
}
