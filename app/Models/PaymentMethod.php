<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

class PaymentMethod extends Model
{

    public $translatedAttributes = ['name'];
    use SoftDeletes,Translatable;
    protected $table = 'payments_methods';
    protected $hidden = ['updated_at', 'deleted_at','translations'];
    
    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }


    public function getImageAttribute($value)
    {
        if($value){
            return url('uploads/payments_methods/' . $value);
        }
    }
    

}
