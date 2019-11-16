<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteDepotPivotTable extends Migration
{
    public function up()
    {
        Schema::create('compte_depot', function (Blueprint $table) {
            $table->unsignedInteger('depot_id');

            $table->foreign('depot_id', 'depot_id_fk_561536')->references('id')->on('depots')->onDelete('cascade');

            $table->unsignedInteger('compte_id');

            $table->foreign('compte_id', 'compte_id_fk_561536')->references('id')->on('comptes')->onDelete('cascade');
        });
    }
}
