<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    protected $table = 'carts';
    protected $fillable = ['course_id', 'user_id', 'price'];
    protected $hidden = ['updated_at', 'deleted_at', 'translations'];


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

}
