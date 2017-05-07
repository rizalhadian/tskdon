<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class Home extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::user()){
          $data['userid'] = Auth::user()->id;
          $data['privilege'] = Auth::user()->privilege;
          $data['nama'] = Auth::user()->name;
          $data['email'] = Auth::user()->email;
        }else{
          $data['privilege'] = 0;
        }

        $data['products'] = \App\ModelProduk::paginate(15);


        return view('home')->with($data);
    }

    public function teskerja(){

    }


}
