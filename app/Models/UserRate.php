<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRate extends Model
{
    
    use SoftDeletes;
    protected $table = 'users_rates';
    protected $fillable = ['from_user', 'to_user', 'rate'];
    protected $hidden = ['updated_at', 'deleted_at'];

}