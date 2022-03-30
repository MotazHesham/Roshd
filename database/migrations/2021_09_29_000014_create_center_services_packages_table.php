<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterServicesPackagesTable extends Migration
{
    public function up()
    {
        Schema::create('center_services_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('attend_type');
            $table->string('doctor_type');
            $table->longText('package_content')->nullable();
            $table->integer('sessions');
            $table->integer('free_sessions');
            $table->decimal('package_value', 15, 2);
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
