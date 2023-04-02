<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{

    use SoftDeletes;
    protected $fillable = ['name', 'email','subject','message','mobile',
                           'views_count', 'read', 'answer', 'answer_by','status'];
    protected $hidden = ['updated_at'];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();
    }


}
