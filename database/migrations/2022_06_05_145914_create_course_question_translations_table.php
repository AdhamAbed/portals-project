<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseQuestionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_question_translations', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('course_question_translations');
    }
}
//CREATE TABLE `course_question_translations` (
//`id` int(11) UNSIGNED NOT NULL,
//  `course_question_id` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `locale` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `created_at` timestamp NULL DEFAULT current_timestamp(),
//  `updated_at` timestamp NULL DEFAULT NULL,
//  `deleted_at` timestamp NULL DEFAULT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
//
//ALTER TABLE `course_question_translations`
//  ADD PRIMARY KEY (`id`);
//
//ALTER TABLE `course_question_translations`
//  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
//
