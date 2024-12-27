<?php

use App\Http\Controllers\Backcontroller;
use App\Http\Controllers\Brand_Controller;
use App\Http\Controllers\Category_Controller;
use App\Http\Controllers\City_Controller;
use App\Http\Controllers\Contact_Controller;
use App\Http\Controllers\Customer_Controller;
use App\Http\Controllers\Frontcontroller;
use App\Http\Controllers\Group_Controller;
use App\Http\Controllers\Product_Controller;
use App\Http\Controllers\Tax_Controller;
use App\Http\Controllers\Unit_Controller;
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

Route::get('/', function () {
    return view('admin\dashboard');
});


//category CRUD (Admin)
Route::get('/admin/category/create', [Category_Controller::class, 'Create']);
Route::get('/admin/category/list', [Category_Controller::class, 'List']);
Route::post('/admin/category/store', [Category_Controller::class, 'Store']);
Route::get('/admin/category/delete/{id}', [Category_Controller::class, 'Destroy']);
Route::get('/admin/category/view/{id}', [Category_Controller::class, 'View']);
Route::get('/admin/category/edit/{id}', [Category_Controller::class, 'Edit']);
Route::post('/admin/category/update', [Category_Controller::class, 'Update']);

//brand CRUD (Admin)
Route::get('/admin/brand/create', [Brand_Controller::class, 'Create']);
Route::get('/admin/brand/list', [Brand_Controller::class, 'List']);
Route::post('/admin/brand/store', [Brand_Controller::class, 'Store']);
Route::get('/admin/brand/delete/{id}', [Brand_Controller::class, 'Destroy']);
Route::get('/admin/brand/view/{id}', [Brand_Controller::class, 'View']);
Route::get('/admin/brand/edit/{id}', [Brand_Controller::class, 'Edit']);
Route::post('/admin/brand/update', [Brand_Controller::class, 'Update']);

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

//unit CRUD (Admin)
Route::get('/admin/unit/create',[Unit_Controller::class,'Create']);
Route::get('/admin/unit/list',[Unit_Controller::class,'List']);
Route::post('/admin/unit/store',[Unit_Controller::class,'Store']);
Route::get('admin/unit/delete/{id}',[Unit_Controller::class,'Destroy']);
Route::get('admin/unit/view/{id}',[Unit_Controller::class,'View']);
Route::get('admin/unit/edit/{id}',[Unit_Controller::class,'Edit']);
Route::post('admin/unit/update',[Unit_Controller::class,'Update']);

//customer CRUD (Admin)
Route::get('/admin/customer/create',[Customer_Controller::class,'Create']);
Route::get('/admin/customer/list',[Customer_Controller::class,'List']);
Route::post('/admin/customer/store',[Customer_Controller::class,'Store']);
Route::get('admin/customer/delete/{id}',[Customer_Controller::class,'Destroy']);
Route::get('admin/customer/view/{id}',[Customer_Controller::class,'View']);
Route::get('admin/customer/edit/{id}',[Customer_Controller::class,'Edit']);
Route::post('admin/customer/update',[Customer_Controller::class,'Update']);

//product CRUD (Admin)
Route::get('/admin/product/create',[Product_Controller::class,'Create']);
Route::get('/admin/product/list',[Product_Controller::class,'List']);
Route::post('/admin/product/store',[Product_Controller::class,'Store']);
Route::get('admin/product/delete/{id}',[Product_Controller::class,'Destroy']);
Route::get('admin/product/view/{id}',[Product_Controller::class,'View']);
Route::get('admin/product/edit/{id}',[Product_Controller::class,'Edit']);
Route::post('admin/product/update',[Product_Controller::class,'Update']);