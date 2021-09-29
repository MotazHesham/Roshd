<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecentageContractsTable extends Migration
{
    public function up()
    {
        Schema::create('precentage_contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('percentage');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
