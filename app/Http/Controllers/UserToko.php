<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserToko extends Controller
{
    public function index(){

    }


    public function addProduk(Request $request){
      // $produk = \App\ModelProduk::create(array(
      //   "petshopid" => 1,
      //   "jenisprodukid" => 1,
      //   "nama" => "ujicobatambahproduk1",
      //   "stock" => 1,
      //   "harga" => 1,
      //   "deskripsi" => "ujicobatambahproduk1"
      // ));
      if ($request->isMethod('get'))
      {
        return view('addproduk');
      }elseif($request->isMethod('post')){

      }

    }
}
