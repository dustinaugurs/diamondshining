<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeleeDiamondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('melee_diamonds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shape', 191);
            $table->string('weight', 191)->unique();
            $table->string('size', 191)->unique();
            $table->string('EF_VS', 191)->nullable();
            $table->string('GH_VS', 191)->nullable();
            $table->string('EF_SI', 191)->nullable();
            $table->string('GH_SI', 191)->nullable();
            $table->string('EF_SI1', 191)->nullable();
            $table->string('GH_SI1', 191)->nullable();
            $table->string('EF_SI2', 191)->nullable();
            $table->string('GH_SI2', 191)->nullable();
            $table->string('IJ_SI1', 191)->nullable();
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
        Schema::dropIfExists('melee_diamonds');
    }
}
