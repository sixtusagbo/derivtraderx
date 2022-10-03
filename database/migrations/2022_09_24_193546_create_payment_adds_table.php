<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_adds', function (Blueprint $table) {
            $table->id();
            $table->string('coin_name');
            $table->string('coin_address');
            $table->string('symbole');
            $table->string('network');
            $table->string('exchange_platform');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_adds');
    }
};
