<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonorTranslation extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'summary', 'details'];
}
