<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class PageTranslation extends Model

{

    use SoftDeletes;
//    protected $fillable = ['locale', 'page_id', 'title', 'slug', 'description', 'key_words'];
    public $fillable = ['locale', 'page_id','title', 'description', 'header_title', 'header_description','header_image',
        'first_goal_title', 'first_goal_description','second_goal_title', 'second_goal_description',
        'third_goal_title', 'third_goal_description', 'first_reason_title', 'first_reason_description',
        'second_reason_title', 'second_reason_description', 'third_reason_title', 'third_reason_description',
        'certificates_sub_description','reasons_sub_description','first_certificate_image', 'second_certificate_image',
        'third_certificate_image'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];


}

