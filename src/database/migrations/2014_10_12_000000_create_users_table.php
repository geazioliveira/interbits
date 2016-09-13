<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if(Schema::hasTable('users')) {
			Schema::drop('users');
		}		
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
			$table->integer('function_id');
            $table->string('email', 100)->unique();
            $table->integer('ddd');
            $table->integer('phone');
            $table->string('password', 15);            
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
        Schema::drop('users');
    }
}
