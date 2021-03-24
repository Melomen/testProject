<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('auth.login');
//});

Auth::routes();


Route::middleware('auth')->group(function () {

//    Route::get('/', 'CompanyController@index')->name('companies');
    Route::get('/', function () {
        return redirect('companies');
    });
//    Route::resource('companies', 'CompanyController');

    Route::resources([
        'companies' => 'CompanyController',
        'clients' => 'ClientController',
    ]);


});



