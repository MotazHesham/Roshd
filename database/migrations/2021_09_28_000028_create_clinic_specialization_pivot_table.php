<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicSpecializationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('clinic_specialization', function (Blueprint $table) {
            $table->unsignedBigInteger('clinic_id');
            $table->foreign('clinic_id', 'clinic_id_fk_4987704')->references('id')->on('clinics')->onDelete('cascade');
            $table->unsignedBigInteger('specialization_id');
            $table->foreign('specialization_id', 'specialization_id_fk_4987704')->references('id')->on('specializations')->onDelete('cascade');
        });
    }
}
