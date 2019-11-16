<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationsTable extends Migration
{
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date_affectation');

            $table->date('date_depart');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
