<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\FlatController;
use App\Http\Controllers\Api\OwnController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\RentalController;
use App\Http\Controllers\Api\RentController;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\NoticeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    // =============================BUILDING API========================================
Route::controller(BuildingController::class)->group(function () {
    Route::get('Api/Building/Table/{id?}', 'GetBuildingList');
    Route::get('Api/Building/Owner/{owner_Id}', 'GetBuildingOwner');
    Route::post('Api/Building/ByArea', 'GetBuildingByArea');
    Route::get('Api/Building/ByBuilding_Id/{building_Id}', 'GetBuildingByBuilding_Id');
    Route::post('Api/Building/Create_Form_Post', 'CreateBuilding');
    Route::put('Api/Building/Updated/{id}', 'UpdateBuilding');
    Route::delete('Api/DeleteBuilding/{id}', 'DeleteBuilding');
});
    // =============================Owner API========================================
Route::controller(OwnerController::class)->group(function () {
    Route::get('Api/Owner/Table/{id?}', 'GetOwnerList');
    Route::get('Api/Owner/Image/{image}', 'GetOwnerImage');
    Route::post('Api/Owner/Check', 'CheckOwner');
    Route::post('Api/Owner/Create_Form_Post', 'CreateOwner');
    Route::put('Api/Owner/Updated/{id}', 'UpdateOwner');
    Route::delete('Api/DeleteOwner/{id}', 'DeleteOwner');
});
    // =============================Flat API========================================
Route::controller(FlatController::class)->group(function () {
    Route::get('Api/Flat/Table/{id?}', 'GetFlatList');
    Route::get('Api/Flat/TableByFlatID/{flat_Id}', 'GetFlatListByFlatID');
    Route::post('Api/Flat/TableByBuilding/{building_Id}', 'GetFlatListByBuilding');
    Route::post('Api/Flat/Create_Form_Post', 'CreateFlat');

    Route::put('Api/Flat/Updated/{id}', 'UpdateFlat');
    Route::delete('Api/DeleteFlat/{id}', 'DeleteFlat');
});
    // =============================Own API========================================
Route::controller(OwnController::class)->group(function () {
    Route::get('Api/Own/Table/{id?}', 'GetOwnList');
    Route::get('Api/Own/Assign/{owner_id?}', 'GetAssign');
    Route::post('Api/Own/Create_Form_Post', 'CreateOwn');
    Route::put('Api/Own/Updated/{id}', 'UpdateOwn');
    Route::delete('Api/DeleteOwn/{id}', 'DeleteOwn');
});
    // =============================Rent API========================================
Route::controller(RentController::class)->group(function () {
    Route::get('Api/Rent/Table/{id?}', 'GetRentList');
    Route::get('Api/Rent/Owner/{owner_Id}', 'GetRentListByOwner');
    Route::get('Api/Rent/Tenant/{tenant_Id}', 'GetRentListByTenant');
    Route::post('Api/Rent/Create_Form_Post', 'CreateRent');
    Route::put('Api/Rent/Updated/{id}', 'UpdateRent');
    Route::delete('Api/DeleteRent/{id}', 'DeleteRent');
});
    // =============================Rental API========================================
Route::controller(RentalController::class)->group(function () {
    Route::get('Api/Rental/Table/{id?}', 'GetRentalList');
    Route::post('Api/Rental/Create_Form_Post', 'CreateRental');
    Route::put('Api/Rental/Updated/{id}', 'UpdateRental');
    Route::delete('Api/DeleteRental/{id}', 'DeleteRental');
});
    // =============================Tenant API========================================
Route::controller(TenantController::class)->group(function () {
    Route::get('Api/Tenant/Table/{id?}', 'GetTenantList');
    Route::get('Api/Tenant/Image/{image}', 'GetTenantImage');
    Route::get('Api/Tenant/TableById/{tenant_Id}', 'GetTenantListByTenantId');
    Route::post('Api/Tenant/Check', 'CheckTenant');
    Route::post('Api/Tenant/Create_Form_Post', 'CreateTenant');
    Route::put('Api/Tenant/Updated/{id}', 'UpdateTenant');
    Route::delete('Api/DeleteTenant/{id}', 'DeleteTenant');
});
Route::controller(NoticeController::class)->group(function () {
    Route::get('Api/Notice/Table/{id?}', 'GetNoticeList');
    Route::get('Api/Notice/TableByOwnerID/{owner_Id}', 'GetNoticeListByOwnerID');
    Route::get('Api/Notice/TableByBuildingID/{building_Id}', 'GetNoticeListByBuildingID');
    Route::post('Api/Notice/Create_Form_Post', 'CreateNotice');
    Route::put('Api/Notice/Updated/{id}', 'UpdateNotice');
    Route::delete('Api/DeleteNotice/{id}', 'DeleteNotice');
});

