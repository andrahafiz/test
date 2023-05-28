<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gases', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->float('availability');
            $table->date('period')->unique();
            $table->boolean('status')->default(0);
            $table->boolean('lelang')->default(0)->comment('1->lelang on, 0->lelang off');
            $table->boolean('approval')->default(0)->comment('1->sudah di approve, 0->belum di approve');
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
        Schema::dropIfExists('gases');
    }
}
