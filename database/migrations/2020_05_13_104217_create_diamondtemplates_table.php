<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiamondtemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diamond_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 191)->nullable();
            $table->string('vat_from_gbp', 191)->nullable();
            $table->string('vat_to_gbp', 191)->nullable();
            $table->string('multiplier_gbp', 191)->nullable();
            $table->string('vat_from_usd', 191)->nullable();
            $table->string('vat_to_usd', 191)->nullable();
            $table->string('multiplier_usd', 191)->nullable();
            $table->boolean('is_term_accept')->default(1)->comment(' 0 = not active,1 = active');
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
        Schema::dropIfExists('diamond_templates');
    }
}
