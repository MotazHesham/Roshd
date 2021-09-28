<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterServicesTable extends Migration
{
    public function up()
    {
        Schema::create('center_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('price', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
