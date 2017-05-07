<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelFotoProduk extends Model
{
    protected $table = "fotoproduk";
    protected $primarykey = "id";
    protected $fillable = array(
      "produkid",
      "foto"
    );
}
