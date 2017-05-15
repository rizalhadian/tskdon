<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelToko extends Model
{
    protected $table = "toko";
    protected $primarykey = "id";
    protected $fillable = array(
      "userid",
      "kotkabid",
      "postalcode",
      "address",
      "phone",
      "lat",
      "lng"
    );
}
