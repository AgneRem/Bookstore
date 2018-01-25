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

  public function scopeSearch($query, $s){
    return $query->join('authors', 'author_id', '=', 'authors.id')->where('title', 'like', '%' .$s. '%')
      ->orWhere('first_name', 'like', '%'.$s.'%')
      ->orWhere('last_name', 'like', '%'.$s.'%');
  }
}
