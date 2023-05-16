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
        Schema::create('rakibs', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("des")->nullable();
            $table->integer("quantity");
            $table->float("price");
            $table->string("status")->default("1")->comment("1 for active 2 for inactive");
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
        Schema::dropIfExists('rakibs');
    }
};
