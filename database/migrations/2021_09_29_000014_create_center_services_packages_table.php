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
            $table->longText('package_content');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('package_value', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
