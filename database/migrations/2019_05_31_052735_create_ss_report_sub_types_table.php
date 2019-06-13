<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSsReportSubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ss_report_sub_type', function (Blueprint $table) {
            $table->increments('ReportSubTypeID');
            $table->integer('ReportTypeID');
            $table->foreign('ReportTypeID')->references('ReportTypeID')->on('ss_report_type');         
            $table->string('ReportSubTypeDescription')->length(50);
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
        Schema::dropIfExists('ss_report_sub_types');
    }
}
