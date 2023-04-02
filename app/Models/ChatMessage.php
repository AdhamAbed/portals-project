<?php

namespace App\Models;

use App\User;
use App\UserTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class ChatMessage extends Model
{
    use SoftDeletes;
    public $table = 'chat_message';
    protected $fillable  = ['read_at'];
    protected $hidden   = ['updated_at','deleted_at'];
//   protected $with = ['user'];


    public function getMessageAttribute($message)  {

        if($this->type==1){
            return url('uploads/chats/'.$message);
        }else{
            return $message;
        }
    }

    
    // public function user(){
    //     return $this->belongsTo(\App\User::class, 'sender_id');
    // }



}
