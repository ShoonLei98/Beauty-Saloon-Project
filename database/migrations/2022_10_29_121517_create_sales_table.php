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
        Schema::create('sales', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("voucher_id");
            $table->string("item");
            $table->string("price");
            $table->string("quantity");
            $table->string("discount")->nullable();
            $table->string("cash_percent")->nullable();
            $table->string("sub_total");
            $table->boolean("remove_status");
            $table->timestamps();
            $table->foreign("voucher_id")->references("id")->on("sale_vouchers")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
