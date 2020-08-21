<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigmentSubmitedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigment_submiteds', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->unsignedInteger('assigment_id');
            $table->unsignedInteger('user_id');
            $table->dateTime('submited_at');
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
        Schema::dropIfExists('assigment_submiteds');
    }
}
