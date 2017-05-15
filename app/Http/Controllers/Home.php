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
        $products = \App\ModelProduk::orderBy('id', 'DESC')
                ->paginate(12);
        $data['products'] = $products;
        return view('home')->with($data);

    }

    public function teskerja(){

    }


}
