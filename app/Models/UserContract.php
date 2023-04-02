<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserContract extends Model
{
    
    use SoftDeletes;
    protected $table = 'users_contracts';
    protected $fillable = ['user_id', 'points'];
    protected $hidden = ['updated_at', 'deleted_at'];


    public function getFileAttribute($value)
    {
        return url('uploads/users_contracts/' . $value);
    }

}