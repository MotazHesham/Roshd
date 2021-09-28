<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('reservation_date');
            $table->string('statuse');
            $table->date('delay_date')->nullable();
            $table->longText('cancel_reason')->nullable();
            $table->decimal('cost', 15, 2);
            $table->longText('condation')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
