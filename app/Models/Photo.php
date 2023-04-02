<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Photo extends Model
{
    
  use SoftDeletes;
  protected $table = 'photos';
  protected $hidden = ['updated_at', 'deleted_at'];
  
    public function getFileAttribute($value)
    {
        return url('uploads/photos/' . $value);
    }
    
  
}
