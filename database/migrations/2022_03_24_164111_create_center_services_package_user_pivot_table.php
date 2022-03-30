<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterServicesPackageUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_services_package_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id','user_id_fk_4312594')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('center_services_package_id');
            $table->foreign('center_services_package_id', 'center_services_package_id_fk_4123594')->references('id')->on('center_services_packages')->onDelete('cascade');
            $table->integer('sessions');
            $table->integer('free_sessions');
            $table->integer('remaining_sessions');
            $table->integer('remaining_free_sessions');
            $table->decimal('package_value', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('center_services_package_user_pivot');
    }
}
