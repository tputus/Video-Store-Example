<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'dvd_id';

    protected $fillable = ['name', 'rating', 'price'];

    public function getAvailableAttribute(){
      $results = Order::where(['dvd_id' => $this->dvd_id, 'returned'=>0])->get();

      if($results->count() > 0){
        $available = 0;
      }
      else{
        $available = 1;
      }
      return $available;
    }
}
