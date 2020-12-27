<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emp_model extends Model
{
    protected $table = 'employee';
    public $primaryKey = 'id';
     public $timestamps = true;
      protected $fillable = array('name','email','image','created_at', 'updated_at');
       protected $guarded = array();
}

