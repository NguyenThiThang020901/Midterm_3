<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TravelController;
/*
|------------------------------------------------------ --------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/homepage', [PageController::class, 'getIndex']);
Route::get('/about', [PageController::class, 'getAbout']);
Route::get('/contact', [PageController::class, 'getContact']);
Route::get('loaisanpham/{type}', [PageController::class, 'getLoaisp']);
Route::get('chitietsp/{id}', [PageController::class, 'getChitietsp']);


Route::get('/adminIndex', [PageController::class, 'getIndexAdmin']);
Route::get('/getadminAdd', [PageController::class, 'getAdminAdd']);
Route::post('/postadminAdd', [PageController::class, 'postAdminAdd']);

Route::get('/getadminEdit/{id}', [PageController::class, 'getAdminEdit']);
Route::post('/adminEdit', [PageController::class, 'postAdminEdit']);
Route::post('/adminDelete/{id}', [PageController::class, 'postAdminDelete']);
// Route::get('/loai-san-pham/{type}',[
//     'as'=>'loaisanpham',
//     'user'=> 'PageController@getLoaisp'
// ]
// );
// Route::post('/postAdmin', [TravelController::class, 'addtravel']);
Route::get('/index', [TravelController::class, 'getIndex']);
Route::get('/formtravel', [TravelController::class, 'addTravel']);

Route::post('/postravel', [TravelController::class, 'postTravel']);