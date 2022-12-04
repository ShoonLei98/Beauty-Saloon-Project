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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id("purchase_id");
            $table->string("voucher");
            $table->date("date");
            $table->string("item");
            $table->string("price");
            $table->boolean("counter")->nullable();
            $table->string("counter_name")->nullable();
            $table->string("quantity");
            $table->string("discount")->nullable();
            $table->string("tax")->nullable();
            $table->string("sub_total");
            $table->string("total");
            $table->boolean("remove_status");
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
        Schema::dropIfExists('purchases');
    }
};
