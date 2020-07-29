<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiamondfeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diamond_feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_id', 191)->unique();
            $table->string('ReportNo', 191)->nullable();
            $table->string('shape', 191)->nullable();
            $table->string('carats', 191)->nullable();
            $table->string('col', 191)->nullable();
            $table->string('clar', 191)->nullable();
            $table->string('cut', 191)->nullable();
            $table->string('pol', 191)->nullable();
            $table->string('symm', 191)->nullable();
            $table->string('flo', 191)->nullable();
            $table->string('floCol', 191)->nullable();
            $table->string('length', 191)->nullable();
            $table->string('width', 191)->nullable();
            $table->string('height', 191)->nullable();
            $table->string('depth', 191)->nullable();
            $table->string('table', 191)->nullable();
            $table->string('culet', 191)->nullable();
            $table->string('lab', 191)->nullable();
            $table->string('girdle', 191)->nullable();
            $table->string('eyeclean', 191)->nullable();
            $table->string('brown', 191)->nullable();
            $table->string('green', 191)->nullable();
            $table->string('milky', 191)->nullable();
            $table->string('actual_supplier', 191)->nullable();
            $table->string('discount', 191)->nullable();
            $table->string('price', 191)->nullable();
            $table->string('price_per_carat', 191)->nullable();
            $table->string('video', 191)->nullable();
            $table->string('video_frames', 191)->nullable();
            $table->string('image', 191)->nullable();
            $table->string('pdf', 191)->nullable();
            $table->string('mine_of_origin', 191)->nullable();
            $table->string('canada_mark_eligble', 191)->nullable();
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
        Schema::dropIfExists('diamond_feeds');
    }
}
