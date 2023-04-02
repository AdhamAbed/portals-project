<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
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
        Schema::dropIfExists('apply_jobs');
    }
}

//CREATE TABLE `apply_jobs` (
//`id` int(11) UNSIGNED NOT NULL,
//  `name` varchar(300) CHARACTER SET utf8mb4 DEFAULT NULL,
//  `email` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//  `cv` varchar(300) CHARACTER SET utf8mb4 DEFAULT NULL,
//  `specialization` varchar(300) CHARACTER SET utf8mb4 DEFAULT NULL,
//  `question` varchar(300) CHARACTER SET utf8mb4 DEFAULT NULL,
//  `details` text CHARACTER SET utf8mb4 DEFAULT NULL,
//  `answer` text CHARACTER SET utf8mb4 DEFAULT NULL,
//  `answer_by` varchar(300) CHARACTER SET utf8mb4 DEFAULT NULL,
//  `views_count` int(11) DEFAULT 0,
//  `read` int(11) DEFAULT 0,
//  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_active',
//  `created_at` timestamp NULL DEFAULT current_timestamp(),
//  `updated_at` timestamp NULL DEFAULT NULL,
//  `deleted_at` timestamp NULL DEFAULT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
