<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

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
//call to a file name in views
// Route::get('/try', function () {
//     return view('try');
// });

Route::get('/', function () {
    return view('welcome');
    // return view('header');
});

//call to a function and class name using controller 
Route::get('/phpfirebase_sdk','FirebaseController@index');

//Display map 
Route::view('/map', 'maps');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN
Route::get('/admin','AdminController@index');
Route::get('/admin/add','AdminController@add');
Route::get('/admin/list','AdminController@list');

//EMPLOYEE
Route::get('/employee','EmployeeController@index');
Route::get('/employee/add','EmployeeController@add');
Route::get('/employee/list','EmployeeController@list');

//CUSTOMER
Route::get('/customer','CustomerController@index');
Route::get('/customer/add','CustomerController@add');
Route::get('/customer/list','CustomerController@list');

//BOOKING
Route::get('/booking','BookingController@index');
Route::get('/booking/add','BookingController@add');
Route::get('/booking/list','BookingController@list');

//CAR
Route::get('/car','CarController@index');
Route::get('/car/add','CarController@add');
Route::get('/car/list','CarController@list');


