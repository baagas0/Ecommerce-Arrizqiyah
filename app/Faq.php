<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'id_faq';
    public $timestamps = false;
    protected $fillable = array('id_faq','title','answer','status');
}
