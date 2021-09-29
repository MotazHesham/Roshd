<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceSalaryContractPivotTable extends Migration
{
    public function up()
    {
        Schema::create('allowance_salary_contract', function (Blueprint $table) {
            $table->unsignedBigInteger('salary_contract_id');
            $table->foreign('salary_contract_id', 'salary_contract_id_fk_4987496')->references('id')->on('salary_contracts')->onDelete('cascade');
            $table->unsignedBigInteger('allowance_id');
            $table->foreign('allowance_id', 'allowance_id_fk_4987496')->references('id')->on('allowances')->onDelete('cascade');
            $table->float('extra_salary')->nullable;
        });
    }
}
