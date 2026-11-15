<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMethod;
use App\Models\Status;
use App\Models\User;
use App\Models\Review;

class Application extends Model
{
    public $timestamps = false;

    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function review() {
        return $this->hasOne(Review::class);
    }
}
