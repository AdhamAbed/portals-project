<?php

namespace App\Models;

use App\Admin;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{

    use SoftDeletes;
    protected $table = 'reviews';
    protected $hidden = ['updated_at','deleted_at'];
    protected $with = ['user'];                       


    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }




}

