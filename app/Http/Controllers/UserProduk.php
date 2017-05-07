<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use Auth;

class UserProduk extends Controller
{
    public function index(){

    }

    //Ambil data produk di ModelProduk
    public function create(){
      $produk = \App\ModelProduk::create(array(
        "petshopid" => 1,
        "jenisprodukid" => 1,
        "nama" => "ujicobatambahproduk1",
        "stock" => 1,
        "harga" => 1,
        "deskripsi" => "ujicobatambahproduk1"
      ));
    }


    public function read(Request $request){
      // $produk = \App\ModelProduk::all();
      // return $produk;
      if(Auth::check()){
        print_r(Auth::user());
      }else{
        print_r('nothing');
      }
    }

    public function readProduk($produkid){
      if(Auth::user()){
        // $data['userid'] = Auth::user()->id;
        // $data['privilege'] = Auth::user()->privilege;
        // $data['nama'] = Auth::user()->name;
        // $data['email'] = Auth::user()->email;
      }else{
        $data['privilege'] = 0;
      }

      $produk = \App\ModelProduk::find($produkid);
      $produk->get();

      $data['id'] = $produk['id'];
      $data['petshopid'] = $produk['petshopid'];
      $data['jenisprodukid'] = $produk['jenisprodukid'];
      $data['nama'] = $produk['nama'];
      $data['stock'] = $produk['stock'];
      $data['harga'] = $produk['harga'];
      $data['foto'] = $produk['foto'];
      $data['deskripsi'] = $produk['deskripsi'];

      // print_r($produk);
      // return view('produk');
      return view('produk')->with($data);
    }


    public function readHomePaginated(){
      $produk = \App\ModelProduk::paginate(10);
      return $produk;
    }

    public function update(Request $request){
      $data = $request->all();
      $produk = \App\ModelProduk::find($data['id']);
      $produk->jenisprodukid = $data['jenisprodukid'];
      $produk->nama = $data['nama'];
      $produk->stock = $data['stock'];
      $produk->harga = $data['harga'];
      $produk->deskripsi = $data['deskripsi'];
      $produk->save();
    }

    public function delete(Request $request){
      $data = $request->all();
      $produk = \App\ModelProduk::find($data['id']);
      $produk->delete();
    }

}
