<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'home_banner';
    protected $primaryKey = 'id_home_banner';
    public $timestamps = false;
    protected $fillable = array('id_home_banner','title','description','image');
}
