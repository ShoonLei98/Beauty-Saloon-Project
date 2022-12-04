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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id('promo_id');
            $table->string('promo_name');
            $table->string('item');
            $table->date('from_date');
            $table->date('to_date');
            $table->boolean('promo_type');
            $table->boolean('discount_value');
            $table->string('discount');
            $table->integer('counter_discount')->nullable();
            $table->integer('shop_discount')->nullable();
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
        Schema::dropIfExists('promotions');
    }
};
