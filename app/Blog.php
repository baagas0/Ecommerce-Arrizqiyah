<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    public $timestamps = false;
    protected $fillable = array('id_blog','create_by','thumbnail','create_at','title','content');
}
