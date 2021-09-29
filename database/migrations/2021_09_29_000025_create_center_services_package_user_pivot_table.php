<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterServicesPackageUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('center_services_package_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4987594')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('center_services_package_id');
            $table->foreign('center_services_package_id', 'center_services_package_id_fk_4987594')->references('id')->on('center_services_packages')->onDelete('cascade');
            $table->float('remaining');
            $table->string('payment_status')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('transfer_name')->nullable();
            $table->string('reference_number')->nullable();
        });
    }
}
