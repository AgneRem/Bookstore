<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = [
    'author_id',
    'title',
    'year',
    'price',
    'photo',
    'description'
  ];


  public function author(){
    return $this->belongsTo('App\Author');
  }

  public function book(){
    return $this->belongsTo('App\Book');
  }

  public function scopeSearch($query, $s){
    return $query->where('title', 'like', '%' .$s. '%');
  }
}
