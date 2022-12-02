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
        Schema::create('customers', function (Blueprint $table) {
            $table->id("customer_id");
            $table->string("customer_name");
            $table->string("phone");
            $table->string("address");
            $table->string("card")->nullable();
            // $table->date("from_date")->nullable();
            // $table->date("to_date")->nullable();
            // $table->string("service")->nullable();
            // $table->string("discount")->nullable();
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
        Schema::dropIfExists('customers');
    }
};
