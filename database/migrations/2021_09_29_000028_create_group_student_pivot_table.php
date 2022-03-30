<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupStudentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('group_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id', 'group_id_fk_4987800')->references('id')->on('groups')->onDelete('cascade');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_id_fk_4987800')->references('id')->on('students')->onDelete('cascade');
            $table->string('status')->nullable();
            $table->decimal('course_cost', 15, 2);
            $table->timestamps();
        });
    }
}
