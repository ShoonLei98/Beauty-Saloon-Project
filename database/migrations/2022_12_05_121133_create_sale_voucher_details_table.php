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
        Schema::create('sale_voucher_details', function (Blueprint $table) {
            $table->id('v_detail_id');
            $table->string('voucher_code');
            $table->date('date');
            $table->string('item');
            $table->string('price');
            $table->string('quantity');
            $table->string('promotion');
            $table->string('sub_total');
            $table->boolean('remove_status');
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
        Schema::dropIfExists('sale_voucher_details');
    }
};
