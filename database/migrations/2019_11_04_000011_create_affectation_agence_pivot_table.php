<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationAgencePivotTable extends Migration
{
    public function up()
    {
        Schema::create('affectation_agence', function (Blueprint $table) {
            $table->unsignedInteger('affectation_id');

            $table->foreign('affectation_id', 'affectation_id_fk_559775')->references('id')->on('affectations')->onDelete('cascade');

            $table->unsignedInteger('agence_id');

            $table->foreign('agence_id', 'agence_id_fk_559775')->references('id')->on('agences')->onDelete('cascade');
        });
    }
}
