<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use app\User;

class Donor extends Model
{
    
    use SoftDeletes,Translatable;
    public $table = 'donors';
    public $translatedAttributes = ['title', 'summary', 'details'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];
    
    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }
    
    public function getLogoAttribute($value)
    {
        return url('uploads/donors/' . $value);
    }
    
    


}
