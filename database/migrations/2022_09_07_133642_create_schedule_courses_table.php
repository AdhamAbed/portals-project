<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_category_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('trainer_id');
            $table->date('course_date');
            $table->double('course_duration');
            $table->double('course_cost');
            $table->string('image')->nullable();
            $table->enum('status' , ['active' , 'not_active'])->default('active');
            $table->enum('course_duration_type' , ['hour' , 'day', 'week', 'month'])->default('hour');
            $table->enum('course_cost_currency' , ['SR' , 'dollar'])->default('SR');


            $table->timestamp('updated_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();



            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_courses');
    }
}
