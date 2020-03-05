<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //everything below is optional laravel assumes that primary key is id by default and the table name used is the snakecase plural form of the class
    protected $primaryKey = 'id';
    protected $table = 'posts';
    protected $fillable = ['title', 'body'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function comment(){
      return $this->hasMany(Comment::class);
    }


}
