<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('gas_id')->nullable();
            $table->foreignId('customer_id');
            $table->float('request_gas');
            $table->float('received_gas')->nullable()->default(0);
            $table->float('gas')->nullable()->default(0);
            $table->enum('status', ['Request', 'Terima (RSCM)', 'Progress', 'Done']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }
}
