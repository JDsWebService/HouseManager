<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('source_ip');
            $table->string('source_browser');
            $table->string('source_os');
            $table->string('action');
            $table->string('route');
            $table->string('target_name')->nullable();
            $table->string('target_type')->nullable();
            $table->timestamps();
        });

        Schema::table('user_logs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                                    ->onUpdate('cascade')
                                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_logs');
    }
}
