<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{

    use SoftDeletes,Translatable;
    protected $table = 'faqs';
    public $translatedAttributes = ['question' , 'answer'];

    protected $hidden = ['updated_at', 'deleted_at'];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


//    public function course()
//    {
//        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
//    }
}
