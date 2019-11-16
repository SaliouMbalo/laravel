<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToComptesTable extends Migration
{
    public function up()
    {
        Schema::table('comptes', function (Blueprint $table) {
            $table->unsignedInteger('code_id');

            $table->foreign('code_id', 'code_fk_561509')->references('id')->on('agences');
        });
    }
}
