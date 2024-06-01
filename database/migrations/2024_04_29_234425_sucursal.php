<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class sucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('branches',function (Blueprint $table){
            $table->id(); 
            $table->string('name'); 
            $table->text('address');
            $table->boolean('status')->default(true);
            $table->text('email');
            $table->text('phoneNumber');
            $table->integer('numEmployed');
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
        //
    }
}
