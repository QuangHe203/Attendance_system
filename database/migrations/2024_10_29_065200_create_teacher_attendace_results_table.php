<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_attendace_results', function (Blueprint $table) {
            $table->id('attendance_result_id');
            $table->string('teacher_id');
            $table->integer('period_id');
            $table->time('time_attend');
            $table->date('date_attend');
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
        Schema::dropIfExists('teacher_attendace_results');
    }
};
