<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'order_id';

    protected $fillable = ['customer_id', 'dvd_id', 'start_date', 'due_date', 'returned'];
}
