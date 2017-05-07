<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelProduk extends Model
{

    protected $table = "produk";
    protected $primarykey = "id";
    protected $fillable = array(
      "petshopid",
      "jenisprodukid",
      "nama",
      "stock",
      "harga",
      "deskripsi"
    );
}
