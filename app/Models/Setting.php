<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    use Translatable;
    public $translatedAttributes = [
        'title', 'address', 'description', 'header_title', 'header_description',
        'training_features_subtitle', 'training_features_title','training_courses_subtitle',
        'training_courses_title', 'training_consultants_subtitle', 'training_consultants_title',
        'trainees_subtitle', 'trainees_title', 'blog_subtitle' , 'blog_title', 'faqs_subtitle',
        'faqs_title', 'footer_description',
    ];
    protected $fillable = [
        'url', 'colorful_logo', 'white_logo', 'second_logo', 'app_store_url', 'play_store_url', 'info_email',
        'mobile', 'phone', 'whatsapp', 'facebook', 'twitter', 'linked_in', 'instagram', 'latitude', 'longitude', 'header_background',
        'students_count' , 'course_count', 'contract_count' , 'partner_count',
        'clients_count' , 'users_count', 'projects_count' , 'courses_count',

    ];

    protected $hidden = ['created_at', 'updated_at', 'translations'];


    public function getColorfulLogoAttribute($colorful_logo)
    {
        return !is_null($colorful_logo)?url('uploads/settings/'.$colorful_logo):null;
    }


    public function getWhiteLogoAttribute($white_logo)
    {
        return !is_null($white_logo)?url('uploads/settings/'.$white_logo):null;
    }
    public function getSecondLogoAttribute($second_logo)
    {
        return !is_null($second_logo)?url('uploads/settings/'.$second_logo):null;
    }
    public function getHeaderBackgroundAttribute($header_background)
    {
        return !is_null($header_background)?url('uploads/settings/'.$header_background):null;
    }


}
