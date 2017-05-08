<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'customer_id';

    protected $fillable = ['name', 'address', 'date_of_birth', 'phone', 'email'];
}
