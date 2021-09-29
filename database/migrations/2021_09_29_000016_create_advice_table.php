<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdviceTable extends Migration
{
    public function up()
    {
        Schema::create('advice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('advice_type');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
