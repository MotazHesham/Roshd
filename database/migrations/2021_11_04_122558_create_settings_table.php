<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('you_tube')->nullable();
            $table->longText('about_rosd');
            $table->longText('familly_advice');
            $table->longText('individual_advice');
            $table->longText('el_gadaly_elsloky');
            $table->longText('el_maarefe_elsloky');
            $table->longText('art_therapy');
            $table->longText('play_therapy');
            $table->longText('message');
            $table->longText('vision');
            $table->longText('services');
            $table->longText('why');
            $table->unsignedBigInteger('income_category_reservation_id')->nullable();
            $table->foreign('income_category_reservation_id', 'income_category_reservation_fk_5252309')->references('id')->on('income_categories');
            $table->unsignedBigInteger('income_category_package_id')->nullable();
            $table->foreign('income_category_package_id', 'income_category_package_fk_5252309')->references('id')->on('income_categories');
            $table->unsignedBigInteger('income_category_group_id')->nullable();
            $table->foreign('income_category_group_id', 'income_category_group_fk_5252309')->references('id')->on('income_categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
