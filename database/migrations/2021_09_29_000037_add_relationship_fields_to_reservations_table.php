<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4987479')->references('id')->on('users');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id', 'doctor_fk_4987480')->references('id')->on('doctors');
            $table->unsignedBigInteger('clinic_id');
            $table->foreign('clinic_id', 'clinic_fk_4987481')->references('id')->on('clinics');
        });
    }
}
