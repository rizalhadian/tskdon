<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelProduk extends Model
{

    protected $table = "produk";
    protected $primarykey = "id";
    protected $fillable = array(
      "userid",
      "jenisprodukid",
      "nama",
      "stock",
      "harga",
      "foto",
      "deskripsi"
    );
}
