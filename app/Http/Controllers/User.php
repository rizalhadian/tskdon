<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class User extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'kotkabid' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);
    }

    public function create(){

    }

    public function read(){

    }

    public function readById(Request $request){
      $dataPosted = $request->all();
      $user = \App\ModelProduk::find($dataPosted['id']);
      $user->get();


    }

    public function readAsUser(){
      return view('profile');
    }

    public function update(Request $request){
      $data = $request->all();

      if ($request->hasFile('imagefile')) {

        $photoName = time().'.'.$request->imagefile->getClientOriginalExtension();
        $user = \App\User::find($data['id']);
        $user->name = $data['name'];
        $user->kotkabid = $data['kotkabid'];
        $user->address = $data['address'];
        $user->phone = $data['phone'];
        $user->photo = $photoName;
        $user->save();
        $request->imagefile->move(public_path('pict-profile/hd'), $photoName);
        // $image = Image::make($imagefile->getRealPath())->resize(200, 200)->save('pict-profile/200', $photoname);

      }else{

        $user = \App\User::find($data['id']);
        $user->name = $data['name'];
        $user->kotkabid = $data['kotkabid'];
        $user->address = $data['address'];
        $user->phone = $data['phone'];
        $user->photo = $photoName;
        $user->save();
      }
      return redirect('profile');
    }

    public function delete(){

    }


}
