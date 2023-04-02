<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_contents', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_contents');
    }
}

//CREATE TABLE `courses_contents` (
//`id` int(11) UNSIGNED NOT NULL,
//  `course_id` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `created_at` timestamp NULL DEFAULT current_timestamp(),
//  `updated_at` timestamp NULL DEFAULT NULL,
//  `deleted_at` timestamp NULL DEFAULT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
//
//ALTER TABLE `courses_contents`
//  ADD PRIMARY KEY (`id`);
//
//ALTER TABLE `courses_contents`
//  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

