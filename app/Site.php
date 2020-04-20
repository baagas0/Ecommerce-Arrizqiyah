<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'id_site';
    public $timestamps = false;
    protected $fillable = array('id_site','site_name','logo','vaficon');
}
