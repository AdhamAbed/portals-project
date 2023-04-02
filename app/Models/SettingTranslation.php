<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{

    protected $fillable = [
        'locale', 'setting_id', 'title', 'address', 'description', 'header_title', 'header_description',
        'training_features_subtitle', 'training_features_title','training_courses_subtitle','training_courses_title',
        'training_consultants_subtitle', 'training_consultants_title', 'trainees_subtitle', 'trainees_title',
        'blog_subtitle', 'blog_title', 'faqs_subtitle', 'faqs_title', 'footer_description',
    ];
    protected $hidden = ['created_at', 'updated_at'];

}