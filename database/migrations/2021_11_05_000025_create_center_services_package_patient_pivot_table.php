<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterServicesPackagePatientPivotTable extends Migration
{
    public function up()
    {
        Schema::create('center_services_package_patient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->unsignedBigInteger('center_services_package_id');
            $table->foreign('center_services_package_id', 'center_services_package_id_fk_4987594')->references('id')->on('center_services_packages')->onDelete('cascade'); 
            $table->decimal('remaining', 15, 2);
            $table->string('payment_status')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('transfer_name')->nullable();
            $table->string('reference_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
