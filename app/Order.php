<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
