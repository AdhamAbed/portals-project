<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Coupon extends Model
{
  use SoftDeletes;
  protected $table = 'coupons';
  protected $fillable = ['store_id', 'name', 'type', 'start', 'end', 'description', 'discount', 'discount'];
  protected $hidden = ['updated_at', 'deleted_at'];
}
