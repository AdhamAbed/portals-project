<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

use App\Admin;
use App\Models\Service;
use App\Models\Order;


class Category extends Model
{

    public $translatedAttributes = ['name' ,'description'];

    use SoftDeletes,Translatable;
    protected $table = 'categories';
    protected $fillable = ['color' , 'image', 'status'];
    protected $hidden = ['updated_at', 'deleted_at','translations'];


    public function emps(){
        return $this->hasMany(Admin::class);
    }


    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }

    
    public function getImageAttribute($value)
    {
        if($value){
            return url('uploads/categories/' . $value);
        }
    }



}
