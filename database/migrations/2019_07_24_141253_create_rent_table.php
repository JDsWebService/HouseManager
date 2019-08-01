<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('occupant_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount');
            $table->integer('check_number')->nullable();
            $table->date('received_at');
            $table->timestamps();
        });

        Schema::table('rent', function (Blueprint $table) {
            $table->foreign('occupant_id')->references('id')->on('occupants')
                                    ->onUpdate('cascade')
                                    ->odDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                                    ->onUpdate('cascade')
                                    ->odDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent');
    }
}
