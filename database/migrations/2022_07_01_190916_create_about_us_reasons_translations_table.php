<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsReasonsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_reasons_translations', function (Blueprint $table) {
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
        Schema::dropIfExists('about_us_reasons_translations');
    }
}
//CREATE TABLE `about_us_reasons_translations` (
//`id` int(11) UNSIGNED NOT NULL,
//  `about_us_reasons_id` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `reason_title` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `reason_description` text CHARACTER SET utf8mb4 DEFAULT NULL,
//  `locale` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `created_at` timestamp NULL DEFAULT current_timestamp(),
//  `updated_at` timestamp NULL DEFAULT NULL,
//  `deleted_at` timestamp NULL DEFAULT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
//
//ALTER TABLE `about_us_reasons_translations`
//  ADD PRIMARY KEY (`id`);
//
//ALTER TABLE `about_us_reasons_translations`
//  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


