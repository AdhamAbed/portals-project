<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesContentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_content_translations', function (Blueprint $table) {
            $table->id();
            $table->string('courses_content_id');
            $table->string('locale');
            $table->string('content_title');
            $table->text('content_description');
            $table->softDeletes();
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
        Schema::dropIfExists('courses_content_translations');
    }
}
//
//CREATE TABLE `courses_content_translations` (
//`id` int(11) UNSIGNED NOT NULL,
//  `courses_content_id` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `content_title` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `locale` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `content_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `created_at` timestamp NULL DEFAULT current_timestamp(),
//  `updated_at` timestamp NULL DEFAULT NULL,
//  `deleted_at` timestamp NULL DEFAULT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
//
//ALTER TABLE `courses_content_translations`
//  ADD PRIMARY KEY (`id`);
//
//ALTER TABLE `courses_content_translations`
//  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

