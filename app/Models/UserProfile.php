<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
       'user_id', 'fio', 'avatar',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type_order(){
        return $this->belongsTo(TypeOrder::class);
    }

    public function type_client(){
        return $this->belongsTo(TypeClient::class);
    }

    public function type_payment(){
        return $this->belongsTo(TypePayment::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    //public function avatar(){
       // return $this->hasManyThrough('App\UserAvatar', 'App\User', 'id', 'user_id');
        //return $this->user()->avatar();
   // }

    public function avatar1(){
        return $this->user->avatar();
     }
}
