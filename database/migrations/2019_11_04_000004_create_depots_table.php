<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotsTable extends Migration
{
    public function up()
    {
        Schema::create('depots', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal('montant', 15, 2);

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
