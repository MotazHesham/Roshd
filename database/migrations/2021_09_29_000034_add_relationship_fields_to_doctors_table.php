<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDoctorsTable extends Migration
{
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4987469')->references('id')->on('users');
            $table->unsignedBigInteger('specialization_id');
            $table->foreign('specialization_id', 'specialization_fk_4987478')->references('id')->on('specializations');
        });
    }
}
