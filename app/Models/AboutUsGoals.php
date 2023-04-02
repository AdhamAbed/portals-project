<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUsGoals extends Model
{
    public $translatedAttributes = ['goal_title','goal_description'];

    use SoftDeletes,Translatable;
    protected $table = 'about_us_goals';
    protected $hidden = ['updated_at', 'deleted_at','translations'];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id')->withTrashed();
    }
}
