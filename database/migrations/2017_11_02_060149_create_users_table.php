<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 191);
            $table->string('last_name', 191);
            $table->string('email', 191)->unique();
            $table->string('password', 191)->nullable();
            $table->string('company', 191)->nullable();
            $table->string('designation', 191)->nullable();
            $table->string('phone_no', 191)->nullable();
            $table->string('website', 191)->nullable();
            $table->string('address_line1', 191)->nullable(); 
            $table->string('address_line2', 191)->nullable();
            $table->string('address_line3', 191)->nullable(); 
            $table->string('city', 191)->nullable(); 
            $table->string('state', 191)->nullable(); 
            $table->string('country', 191)->nullable(); 
            $table->string('zip', 191)->nullable();
            $table->string('markup_template',10)->nullable();
            $table->boolean('status')->default(0);
            $table->string('enquiry', 191)->nullable(); 
            $table->string('find_us', 191)->nullable(); 
            $table->string('confirmation_code', 191)->nullable();
            $table->boolean('confirmed')->default(0);
            $table->boolean('is_term_accept')->default(0)->comment(' 0 = not accepted,1 = accepted');
            $table->string('remember_token', 100)->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::drop('users');
    }
}
