<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting_translations', function (Blueprint $table) {
            $table->string('training_features_subtitle')->nullable();
            $table->string('training_features_title')->nullable();
            $table->string('training_courses_subtitle')->nullable();
            $table->string('training_courses_title')->nullable();
            $table->string('training_consultants_subtitle')->nullable();
            $table->string('training_consultants_title')->nullable();
            $table->string('trainees_subtitle')->nullable();
            $table->string('trainees_title')->nullable();
            $table->string('blog_subtitle')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('faqs_subtitle')->nullable();
            $table->string('faqs_title')->nullable();
            $table->text('footer_description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_translations', function (Blueprint $table) {
            //
        });
    }
}
