<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
}
