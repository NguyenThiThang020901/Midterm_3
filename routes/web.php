<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\pdfController;
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
// ======================================================TRang route chính ============================
Route::get('/homepage', [PageController::class, 'getIndex'])->name('home');
Route::get('/about', [PageController::class, 'getAbout']);
Route::get('/contact', [PageController::class, 'getContact']);
Route::get('loaisanpham/{type}', [PageController::class, 'getLoaisp']);
Route::get('chitietsp/{id}', [PageController::class, 'getChitietsp']);
Route::get('/signup', [PageController::class, 'getSignUp']);
Route::post('/signup', [PageController::class, 'postSignUp']);
Route::get('/signin', [PageController::class, 'getSignIn']);
Route::post('/login', [PageController::class, 'postSignIn']);
Route::get('/logout', [PageController::class, 'postlogout']);
Route::get('/search', [PageController::class, 'getsearch']);



//=================================================== Giỏ hàng=============================
Route::get('/checkout', [PageController::class, 'getcheckout']);
Route::post('/checkout', [PageController::class, 'postCheckout']);
Route::get('/add-to-cart/{id}', [PageController::class, 'getAddToCart']);
Route::get('/delete-cart/{id}', [PageController::class, 'getDelItemCart']);

// =============================================CRUD admin============================= 
Route::get('/adminIndex', [PageController::class, 'getIndexAdmin'])->name('admin');
Route::get('/getadminAdd', [PageController::class, 'getAdminAdd']);
Route::post('/postadminAdd', [PageController::class, 'postAdminAdd']);

Route::get('/getadminEdit/{id}', [PageController::class, 'getAdminEdit']);
Route::post('/adminEdit', [PageController::class, 'postAdminEdit']);

Route::post('/adminDelete/{id}', [PageController::class, 'postAdminDelete']);


// =========================================TRAVEL =================================
// Phầm route Của travel
Route::get('/index', [TravelController::class, 'show'])->name('index_travel');
// Route::get('/formtravel', [TravelController::class, 'formTravel']);

Route::post('addTravel', 'App\Http\Controllers\TravelController@postTravel');
Route::get('editTravel/{id}', 'App\Http\Controllers\TravelController@getEditTravel');
Route::post('editTravel', 'App\Http\Controllers\TravelController@postEditTravel');
Route::post('deleteTravel/{id}', 'App\Http\Controllers\TravelController@postDeleteTravel');


// ==============================import, export ===========================
Route::get('/export-form', [pdfController::class, 'index']);
Route::get('/export', [pdfController::class, 'pdf'])->name('export');
Route::get('/importForm', [pdfController::class, 'importForm']);
Route::post('import', [pdfController::class, 'import'])->name('import');

//===========================CỔNG THANH TOÁN===========================
// Route::get('payment', 'PayPalController@payment')->name('payment');
// Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
// Route::get('payment/success', 'PayPalController@success')->name('payment.success');

Route::get('paywithpaypal', 'App\Http\Controllers\PayPalController@paywithpaypal')->name('paywithpaypal');
 Route::post('paypal',  'App\Http\Controllers\PayPalController@postPaymentWithpaypal');
Route::get('paypal','App\Http\Controllers\PayPalController@getPaymentStatus')->name('status');