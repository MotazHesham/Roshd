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
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
