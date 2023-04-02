<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultant extends Model
{
    use SoftDeletes,Translatable;
    public $table = 'consultants';
    public $translatedAttributes = ['name' , 'description'];

    protected $fillable = [
        'image','status'
    ];

    protected $hidden = ['updated_at', 'deleted_at', 'translations'];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getImageAttribute($value)
    {
        if ($value == 'user_avatar.png'){
            return url('uploads/' . $value);
        }else{
            return url('uploads/consultants/' . $value);

        }
    }

}
