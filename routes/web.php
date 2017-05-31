<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Home@index');
Auth::routes();

Route::get('/profile', 'User@readAsUser')->name('profile');
Route::post('/profile/update', 'User@update');
Route::post('/profile/updatetoko', 'User@updatetoko');

Route::get('/toko/{tokoid}', 'User@readAsCust')->name('toko');




// Route::get('/produk', 'Produk@read');/]
Route::get('/produk/{produkid}', 'UserProduk@readProduk');

//
// Route::get('/shop', 'UserToko@index');
// Route::get('/shop/{shopid}', 'UserToko@index');

Route::get('/shop/addproduk', 'UserProduk@create');
Route::post('/shop/addproduk', 'UserProduk@create');




Route::get('/home', 'Home@index');


Route::get('/api/getcitiesbyprovince/{province}', function($province){
  $cities = App\ModelKotkab::where('provinsiid', $province)->get();
  return response()->json($cities);
});

// Route::get('user/{post}/{comment}', function($post, $comment){
//   return 'Post '.$post.' Comment '.$comment;
// });

// Route::get('user/{id}/{name}', function ($id, $name) {
//     return 'Post '.$id.' Comment '.$name;
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+[0-9]']);

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/', function ()    {
//         // Uses Auth Middleware
//     });
//
//     Route::get('user/profile', function () {
//         // Uses Auth Middleware
//     });
// });

Route::group(['prefix' => 'admin'], function () {
    Route::get('/admin', function ()    {
        // Uses Auth Middleware
    });

});
