<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelProvinsi extends Model
{
    protected $table = 'provinsi';
    protected $primarykey = 'id';
    protected $fillable = array(
      'nama'
    );
}
