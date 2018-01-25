<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  public function user(){
    return $this->belongsTo(User::class);
  }

  public function book(){
    return $this->hasMany('App\Book');
  }

  public function author(){
    return $this->hasMany('App\Author');
  }
}
