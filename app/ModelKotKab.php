<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelKotKab extends Model
{
    protected $table = "kotkab";
    protected $id = "id";
    protected $fillable = array(
      "provinsiid",
      "nama"
    );
}
