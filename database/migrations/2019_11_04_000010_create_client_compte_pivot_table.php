<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientComptePivotTable extends Migration
{
    public function up()
    {
        Schema::create('client_compte', function (Blueprint $table) {
            $table->unsignedInteger('compte_id');

            $table->foreign('compte_id', 'compte_id_fk_561510')->references('id')->on('comptes')->onDelete('cascade');

            $table->unsignedInteger('client_id');

            $table->foreign('client_id', 'client_id_fk_561510')->references('id')->on('clients')->onDelete('cascade');
        });
    }
}
