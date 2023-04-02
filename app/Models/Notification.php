<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{

    use SoftDeletes ;
    public $table = 'notifications';
    protected $fillable = ['type', 'notifiable_type ', 'notifiable_id ', 'data', 'read_at'];
    protected $hidden = ['updated_at','deleted_at'];

  



}
