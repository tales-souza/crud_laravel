<?php

/*use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
*/

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(array('prefix' => 'v1', 'middleware' => 'apiJwt'), function () { 

  Route::get('/', function () {
    return response()->json(['message' => 'Jobs API', 'status' => 'Connected']);
  });

  Route::get('/jobs', 'App\Http\Controllers\JobsController@index');
  Route::get('/job/{id}', 'App\Http\Controllers\JobsController@show');
  Route::get('/companys', 'App\Http\Controllers\CompaniesController@index');
  Route::get('/company/{id}', 'App\Http\Controllers\CompaniesController@show');
  Route::post('/companys', 'App\Http\Controllers\CompaniesController@store');
  Route::post('/jobs', 'App\Http\Controllers\JobsController@store');



  
  Route::put('/jobs/{id}', 'App\Http\Controllers\JobsController@update');
  Route::put('/companies/{id}', 'App\Http\Controllers\CompaniesController@update');


  Route::delete('/jobs/{id}', 'App\Http\Controllers\JobsController@destroy');
  Route::delete('/companies/{id}', 'App\Http\Controllers\CompaniesController@destroy');
  
  


  //logout 
  Route::post('logout', 'App\Http\Controllers\AuthController@logout');
});

/*Route::resource('jobs', 'JobsController');
  Route::resource('companies', 'CompaniesController');
  */
//});

Route::get('/', function () {
  return response()->json(['message' => 'Jobs API', 'status' => 'Conectado']);
});



Route::group([

  'middleware' => 'api',
  'prefix' => 'auth'

], function ($router) {

  Route::post('login', 'App\Http\Controllers\AuthController@login');
  /* Route::post('logout', 'AuthCosntroller@logout');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');*/
});
