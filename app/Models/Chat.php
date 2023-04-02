<?php

namespace App\Models;

use App\User;
use App\UserTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class Chat extends Model
{

    use SoftDeletes; 
    public $table = 'chats';
    protected $hidden   = ['updated_at','deleted_at','userobject2','userobject1'];
   protected $appends = ['last_message','total_unread', 'user'];



    public function messages(){
        return $this->hasMany(ChatMessage::class, 'chat_id');
    }


    public function userobject1(){
        return $this->belongsTo(User::class, 'user1');
    }


    public function userobject2(){
        return $this->belongsTo(User::class, 'user2');
    }
    

   public function getTotalUnreadAttribute()
   {
    return (string)$this->messages()->where('read_at',0)->count();
   }
   

    public function getLastMessageAttribute()
    {
        if($this->messages->count() > 0){
            if($this->messages()->orderByDesc('id')->first()->type == 1){
            return __('website.sent_image');
        }
            return $this->messages()->orderByDesc('id')->first()->message;   
        }
    }


    public function getUserAttribute(){
        if(auth('api')->id() == $this->user1){
            // return auth('api')->id();
            return $this->userobject2;
        }
        if(auth('api')->id() == $this->user2){
            // return auth('api')->id();
            return $this->userobject1;
        }
        return NULL;
    }

    
    
}
