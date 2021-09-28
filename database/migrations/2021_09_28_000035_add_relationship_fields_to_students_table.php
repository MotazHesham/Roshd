<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('specialization_id');
            $table->foreign('specialization_id', 'specialization_fk_4987471')->references('id')->on('specializations');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4987473')->references('id')->on('users');
        });
    }
}
