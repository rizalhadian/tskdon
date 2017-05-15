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
    public function create(Request $request){

      if ($request->isMethod('get')){
        if(Auth::user()->flagtoko == 1){
          return view('addproduk');
        }else{
          return redirect()->route('profile');
        }
      }elseif($request->isMethod('post')){
        $data =  $request->all();
        // $produk = \App\ModelProduk::create(array(
        //   "userid" => \Auth::user()->id,
        //   "nama" => $data->nama,
        //   "harga" => $data->harga,
        //   "deskripsi" => $data->deskripsi
        // ));

        // print_r($data);
        if ($request->hasFile('imagefile')) {
          $photoname = time().'.'.$request->imagefile->getClientOriginalExtension();

          $produk = \App\ModelProduk::create(array(
            "userid" => \Auth::user()->id,
            "nama" => $data['nama'],
            "harga" => $data['harga'],
            "foto" => $photoname,
            "deskripsi" => $data['deskripsi']
          ));
          $request->imagefile->move(public_path('pict-product/hd'), $photoname);
          // print_r($data);
        }else{

          $produk = \App\ModelProduk::create(array(
            "userid" => \Auth::user()->id,
            "nama" => $data['nama'],
            "harga" => $data['harga'],
            "deskripsi" => $data['deskripsi']
          ));
          // echo "no foto";
        }
        // return redirect('/');
      }
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

      $produk = \App\ModelProduk::find($produkid);
      $produk->get();

      //Data Barang
      $data['id'] = $produk['id'];
      // $data['userid'] = $produk['userid'];
      $data['jenisprodukid'] = $produk['jenisprodukid'];
      $data['nama'] = $produk['nama'];
      $data['stock'] = $produk['stock'];
      $data['harga'] = $produk['harga'];
      $data['foto'] = $produk['foto'];
      $data['deskripsi'] = $produk['deskripsi'];

      //Data Toko
      $user = \App\User::find($produk['userid']);
      $user->get();
      $data['userfoto'] = $user['photo'];
      $data['username'] = $user['name'];

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
