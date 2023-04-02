<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultationCategoryTranslation extends Model
{

    use SoftDeletes;
    protected $fillable = ['name' , 'description'];
}
