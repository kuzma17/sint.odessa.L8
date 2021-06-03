<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

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

    public function act_repair(){
        return $this->hasOne(ActRepair::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function routeNotificationForMail(){
        return $this->user->email;
    }

    public function history(){
        return $this->hasMany(History::class);
    }
}
