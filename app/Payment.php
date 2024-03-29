<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'id_payment';
    public $timestamps = false;
    protected $fillable = array('id_payment','image','name','status');
}
