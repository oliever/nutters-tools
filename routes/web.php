<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Email\AddEmailController;
use App\Http\Controllers\Email\GetEmailStoresController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/emailAddresses/ajaxAdd.json', AddEmailController::class);
Route::post('/stores/getStores.json', GetEmailStoresController::class);
