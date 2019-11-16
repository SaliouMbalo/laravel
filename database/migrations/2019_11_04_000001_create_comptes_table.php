<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('numero')->unique();

            $table->string('cle_rib')->unique();

            $table->string('type_compte');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
