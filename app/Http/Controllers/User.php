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
      // Get provinces
      $provinces = \App\ModelProvinsi::all(array('id', 'nama'));
      $data['provinces'] = $provinces;
      //Get Toko
      $toko = \App\ModelToko::where('userid', \Auth::user()->id)->get();
      $data['toko'] = $toko;

      // print_r($data['toko']);
      $data['flagtoko'] = 0;

      foreach ($data['toko'] as $province) {
        $data['flagtoko'] = 1;
      }

      return view('profile')->with($data);
    }

    public function readAsCust($tokoid){
      // Get provinces
      $provinces = \App\ModelProvinsi::all(array('id', 'nama'));
      $data['provinces'] = $provinces;
      //Get Toko
      $toko = \App\ModelToko::where('userid', $tokoid)->get();
      $data['toko'] = $toko;
      //Get User
      $data['user'] = \App\User::where('id', $data['toko'][0]['userid'])->get();
      // print_r($user);
      $data['flagtoko'] = 1;

      return view('toko')->with($data);
    }

    public function update(Request $request){
      $data = $request->all();

      if ($request->hasFile('imagefile')) {

        $photoName = time().'.'.$request->imagefile->getClientOriginalExtension();
        $user = \App\User::find($data['id']);
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->photo = $photoName;
        $user->save();
        $request->imagefile->move(public_path('pict-profile/hd'), $photoName);
        // $image = Image::make($imagefile->getRealPath())->resize(200, 200)->save('pict-profile/200', $photoname);

      }else{

        $user = \App\User::find($data['id']);
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->save();
      }
      return redirect('profile');
    }

    public function updatetoko(Request $request){
      $data = $request->all();
      $userid = \Auth::user()->id;
      $user = \App\ModelToko::create(array(
        'userid'=>$userid,
        'kotkabid'=>$data['kotkabid'],
        'postalcode'=>$data['postalcode'],
        'address'=>$data['address'],
        'phone'=>$data['phone'],
        'lat'=>$data['lat'],
        'lng'=>$data['lng']
      ));

      $user = \App\User::find(\Auth::user()->id);
      $user->flagtoko = 1;
      $user->save();
    }

    public function delete(){

    }


}
