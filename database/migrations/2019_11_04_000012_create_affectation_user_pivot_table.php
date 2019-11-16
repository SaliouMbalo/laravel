<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('affectation_user', function (Blueprint $table) {
            $table->unsignedInteger('affectation_id');

            $table->foreign('affectation_id', 'affectation_id_fk_561579')->references('id')->on('affectations')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_561579')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
