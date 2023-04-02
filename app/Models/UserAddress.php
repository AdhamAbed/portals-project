<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{

    use SoftDeletes;
    protected $table = 'users_addresses';
    protected $fillable = ['user_id', 'first_name', 'last_name', 'address', 'mobile', 'latitude', 'longitude'];
    protected $hidden = ['updated_at', 'deleted_at'];

}
