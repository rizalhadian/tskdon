<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProvinsi extends Controller
{
    public function __construct(){

    }

    public function index(){

    }

    public function create(Request $request){
      $data = $request->all();
      $query = \App\ModelProvinsi::create(
        "nama"=>$data['nama']
      );
    }

    public function read(){
      $query = \App\ModelProvinsi::all();
      return $query;
    }

    public function update(Request $request){
      $data = $request->all();
      $query = \App\ModelProvinsi::find($data['id']);
      $query->nama = $data['nama'];
      $query->save();
    }

    public function delete(){

    }
}
