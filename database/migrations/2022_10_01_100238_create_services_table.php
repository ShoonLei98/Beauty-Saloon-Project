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
        Schema::create('services', function (Blueprint $table) {
            $table->id("service_id");
            $table->string("service_name");
            $table->string("price");
            $table->string("discount")->nullable();
            $table->date("from_date")->nullable()->default(null);
            $table->date("to_date")->nullable()->default(null);
            $table->string("percentage")->nullable();
            $table->string("name_percentage")->nullable();
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
        Schema::dropIfExists('services');
    }
};
