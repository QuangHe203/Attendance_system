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
        Schema::create('student_attendance_results', function (Blueprint $table) {
            $table->id('attendance_result_id');
            $table->string('student_id');
            $table->integer('period_id');
            $table->dateTime('time_attend');
            $table->string('status');
<<<<<<< HEAD
=======
            $table->timestamps();
>>>>>>> 9f007ce (update)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_attendance_results');
    }
};
