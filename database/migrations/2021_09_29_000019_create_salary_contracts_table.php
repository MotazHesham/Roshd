<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryContractsTable extends Migration
{
    public function up()
    {
        Schema::create('salary_contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contract_number');
            $table->date('date');
            $table->integer('duration');
            $table->integer('work_hours');
            $table->string('mechanism');
            $table->float('salary', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
