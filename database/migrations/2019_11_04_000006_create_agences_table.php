<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencesTable extends Migration
{
    public function up()
    {
        Schema::create('agences', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nom');

            $table->string('code')->unique();

            $table->string('region');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
