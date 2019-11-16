<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('prenoms');

            $table->string('nom');

            $table->string('adresse');

            $table->string('email')->nullable();

            $table->string('telephone')->unique();

            $table->decimal('salaire_actuel', 15, 2)->nullable();

            $table->string('profession')->nullable();

            $table->string('employeur')->nullable();

            $table->string('numero_identification')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
