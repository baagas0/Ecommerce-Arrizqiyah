<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    public $timestamps = false;
    protected $fillable = array('id_product','id_category','thumbnail','image','name','description','price','feature','file','status','create_at');
}
