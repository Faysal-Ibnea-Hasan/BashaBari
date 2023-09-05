<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\OwnController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(DashboardController::class)->group(function () {

    Route::get('/','GetDashboard')->name('dashboard.get');
});

//===================================OWNER CONTROLLER================================================
Route::controller(OwnerController::class)->group(function () {
                             //===Create===
    Route::get('Owner/Create_Form','GetOwnerForm')->name('owner.form.create');
    Route::post('Owner/Create_Form_Post','CreateOwner')->name('owner.form.post');
                             //===View===
    Route::get('Owner/Table','GetOwnerList')->name('owner.table');
                             //===Delete===
    Route::get('DeleteOwner/{id}','DeleteOwner')->name('owner.delete');
                             //===Update===
    Route::get('Owner/Update/{id}','GetOwnerUpdateForm')->name('owner.form.update');
    Route::put('Owner/Updated/{id}','UpdateOwner')->name('owner.form.update.put');
});
//===================================BUILDING CONTROLLER================================================
Route::controller(BuildingController::class)->group(function () {
                             //===Create===
    Route::get('Building/Create_Form','GetBuildingForm')->name('building.form.create');
    Route::post('Building/Create_Form_Post','CreateBuilding')->name('building.form.post');
                             //===View===
    Route::get('Building/Table','GetBuildingList')->name('building.table');
                             //===Delete===
    Route::get('DeleteBuilding/{id}','DeleteBuilding')->name('building.delete');
                             //===Update===
    Route::get('Building/Update/{id}','GetBuildingUpdateForm')->name('building.form.update');
    Route::put('Building/Updated/{id}','UpdateBuilding')->name('building.form.update.put');
});
//===================================FLAT CONTROLLER================================================
Route::controller(FlatController::class)->group(function () {
                             //===Create===
    Route::get('Flat/Create_Form','GetFlatForm')->name('flat.form.create');
    Route::post('Flat/Create_Form_Post','CreateFlat')->name('flat.form.post');
                             //===View===
    Route::get('Flat/Table','GetFlatList')->name('flat.table');
                             //===Delete===
    Route::get('DeleteFlat/{id}','DeleteFlat')->name('flat.delete');
                             //===Update===
    Route::get('Flat/Update/{id}','GetFlatUpdateForm')->name('flat.form.update');
    Route::put('Flat/Updated/{id}','UpdateFlat')->name('flat.form.update.put');
});
//===================================TENANT CONTROLLER================================================
Route::controller(TenantController::class)->group(function () {
                             //===Create===
    Route::get('Tenant/Create_Form','GetTenantForm')->name('tenant.form.create');
    Route::post('Tenant/Create_Form_Post','CreateTenant')->name('tenant.form.post');
                             //===View===
    Route::get('Tenant/Table','GetTenantList')->name('tenant.table');
                             //===Delete===
    Route::get('DeleteTenant/{id}','DeleteTenant')->name('tenant.delete');
                             //===Update===
    Route::get('Tenant/Update/{id}','GetTenantUpdateForm')->name('tenant.form.update');
    Route::put('Tenant/Updated/{id}','UpdateTenant')->name('tenant.form.update.put');
});
//===================================OWN CONTROLLER================================================
Route::controller(OwnController::class)->group(function () {
                             //===Create===
    Route::get('Own/Create_Form','GetOwnForm')->name('own.form.create');
    Route::post('Own/Create_Form_Post','CreateOwn')->name('own.form.post');
                             //===View===
    Route::get('Own/Table','GetOwnList')->name('own.table');
                             //===Delete===
    Route::get('DeleteOwn/{id}','DeleteOwn')->name('own.delete');
                             //===Update===
    Route::get('Own/Update/{id}','GetOwnUpdateForm')->name('own.form.update');
    Route::put('Own/Updated/{id}','UpdateOwn')->name('own.form.update.put');
});




