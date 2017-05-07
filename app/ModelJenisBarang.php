<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelJenisBarang extends Model
{
    protected $table = "jenisbarang";
    protected $primarykey = "id";
    protected $fillable = array(
      "nama"
    );
}
