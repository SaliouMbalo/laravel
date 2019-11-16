<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDepotPivotTable extends Migration
{
    public function up()
    {
        Schema::create('client_depot', function (Blueprint $table) {
            $table->unsignedInteger('depot_id');

            $table->foreign('depot_id', 'depot_id_fk_561535')->references('id')->on('depots')->onDelete('cascade');

            $table->unsignedInteger('client_id');

            $table->foreign('client_id', 'client_id_fk_561535')->references('id')->on('clients')->onDelete('cascade');
        });
    }
}
