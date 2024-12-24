<?php

use App\Http\Controllers\Backcontroller;
use App\Http\Controllers\Category_Controller;
use App\Http\Controllers\City_Controller;
use App\Http\Controllers\Contact_Controller;
use App\Http\Controllers\Frontcontroller;
use App\Http\Controllers\Group_Controller;
use App\Http\Controllers\Tax_Controller;
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
//admin crud
Route::get('/admin-1', function () {
    return view('admin\master');
});

//category CRUD (Admin)
Route::get('/admin/category/create', [Category_Controller::class, 'Create']);
Route::get('/admin/category/list', [Category_Controller::class, 'List']);
Route::post('/admin/category/store', [Category_Controller::class, 'Store']);
Route::get('/admin/category/delete/{id}', [Category_Controller::class, 'Destroy']);
Route::get('/admin/category/view/{id}', [Category_Controller::class, 'View']);
Route::get('/admin/category/edit/{id}', [Category_Controller::class, 'Edit']);
Route::post('/admin/category/update', [Category_Controller::class, 'Update']);

//city CRUD (Admin)
Route::get('/admin/city/create',[City_Controller::class,'Create']);
Route::get('/admin/city/list',[City_Controller::class,'List']);
Route::post('/admin/city/store',[City_Controller::class,'Store']);
Route::get('/admin/city/delete/{id}', [City_Controller::class, 'Destroy']);
Route::get('/admin/city/view/{id}', [City_Controller::class, 'View']);
Route::get('/admin/city/edit/{id}', [City_Controller::class, 'Edit']);
Route::post('/admin/city/update', [City_Controller::class, 'Update']);

//group CRUD (Admin)
Route::get('/admin/group/create',[Group_Controller::class,'Create']);
Route::get('/admin/group/list',[Group_Controller::class,'List']);
Route::post('/admin/group/store',[Group_Controller::class,'Store']);
Route::get('admin/group/delete/{id}',[Group_Controller::class,'Destroy']);
Route::get('admin/group/view/{id}',[Group_Controller::class,'View']);
Route::get('admin/group/edit/{id}',[Group_Controller::class,'Edit']);
Route::post('admin/group/update/',[Group_Controller::class,'Update']);

//tax CRUD (Admin)
Route::get('/admin/tax/create',[Tax_Controller::class,'Create']);
Route::get('/admin/tax/list',[Tax_Controller::class,'List']);
Route::post('/admin/tax/store',[Tax_Controller::class,'Store']);
Route::get('admin/tax/delete/{id}',[Tax_Controller::class,'Destroy']);
Route::get('admin/tax/view/{id}',[Tax_Controller::class,'View']);
Route::get('admin/tax/edit/{id}',[Tax_Controller::class,'Edit']);
Route::post('admin/tax/update/',[Tax_Controller::class,'Update']);
