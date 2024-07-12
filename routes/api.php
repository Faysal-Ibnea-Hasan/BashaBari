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
use App\Http\Controllers\Api\NoticeLogController;
use App\Http\Controllers\Api\RentLogController;
use App\Http\Controllers\Api\ProblemController;
use App\Http\Controllers\Api\CommonController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\CreateSearchAgentController;
use App\Http\Controllers\Api\ShopController;

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
    Route::get('Api/Building/TableWithFlat', 'GetBuildingListWithFlat');
    Route::post('Api/Building/Owner', 'GetBuildingOwner');
    Route::post('Api/Building/OwnerProblem', 'GetBuildingOwnerProblem');
    Route::post('Api/Building/ByArea', 'GetBuildingByArea');
    Route::post('Api/Building/ByBuilding_Id', 'GetBuildingByBuilding_Id');
    Route::post('Api/Building/Create_Form_Post', 'CreateBuilding');
    Route::post('Api/Building/Updated', 'UpdateBuilding');
    Route::delete('Api/DeleteBuilding/{id}', 'DeleteBuilding');
});
    // =============================Owner API========================================
Route::controller(OwnerController::class)->group(function () {
    Route::get('Api/Owner/Table/{id?}', 'GetOwnerList');
    Route::get('Api/Owner/Image/{image}', 'GetOwnerImage');
    Route::post('Api/Owner/Check', 'CheckOwner');
     Route::post('Api/Owner/ProfileMobile', 'profile_update_owner_mobile');
    Route::post('Api/Owner/Create_Form_Post', 'CreateOwner');
    Route::post('Api/Owner/Updated', 'UpdateOwner');
    Route::delete('Api/DeleteOwner/{id}', 'DeleteOwner');
});
    // =============================Flat API========================================
Route::controller(FlatController::class)->group(function () {
    Route::get('Api/Flat/Table/{id?}', 'GetFlatList');
    Route::post('Api/Flat/TableByFlatID', 'GetFlatListByFlatID');
    Route::get('Api/Flat/Available', 'GetAvailableFlat');
    Route::post('Api/Flat/TableByBuildingID', 'GetFlatListByBuildingID');
    Route::post('Api/Flat/TableByBuilding', 'GetFlatListByBuilding');
    Route::post('Api/Flat/Create_Form_Post', 'CreateFlat');
    Route::post('Api/Flat/Updated', 'UpdateFlat');
    Route::post('Api/Flat/Status/Updated', 'UpdateFlatStatus');
    Route::delete('Api/DeleteFlat/{id}', 'DeleteFlat');
});
    // =============================Own API========================================
Route::controller(OwnController::class)->group(function () {
    Route::get('Api/Own/Table/{id?}', 'GetOwnList');
    Route::post('Api/Own/Assign', 'GetAssign');
    Route::post('Api/Own/Create_Form_Post', 'CreateOwn');
    Route::post('Api/Own/Updated', 'UpdateOwn');
    Route::delete('Api/DeleteOwn/{id}', 'DeleteOwn');
});
    // =============================Rent API========================================
Route::controller(RentController::class)->group(function () {
    Route::get('Api/Rent/Table/{id?}', 'GetRentList');
    Route::post('Api/Rent/Owner', 'GetRentListByOwner');
    Route::post('Api/Rent/Tenant', 'GetRentListByTenant');
    Route::post('Api/Rent/Create_Form_Post', 'CreateRent');
    Route::post('Api/Rent/Updated', 'UpdateRent');
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
    Route::post('Api/Tenant/CheckMobile/{id}', 'check_tenant_mobile');
    Route::post('Api/Tenant/ProfileMobile/{id}', 'profile_update_tenant_mobile');
    Route::post('Api/Tenant/Create_Form_Post', 'CreateTenant');
    Route::post('Api/Tenant/Create_Form_Post_Mobile', 'create_tenant_mobile');
    Route::post('Api/Tenant/Updated', 'UpdateTenant');
    Route::post('Api/Tenant/UpdatedStatus', 'UpdateAssignStatus');
    Route::delete('Api/DeleteTenant/{id}', 'DeleteTenant');
});
// =============================NOTICE API========================================
Route::controller(NoticeController::class)->group(function () {
    Route::get('Api/Notice/Table/{id?}', 'GetNoticeList');
    Route::post('Api/Notice/TableByOwnerID', 'GetNoticeListByOwnerID');
    Route::post('Api/Notice/TableByBuildingID', 'GetNoticeListByBuildingID');
    Route::post('Api/Notice/Create_Form_Post', 'CreateNotice');
    Route::post('Api/Notice/Updated', 'UpdateNotice');
    Route::delete('Api/DeleteNotice/{id}', 'DeleteNotice');
    Route::delete('Api/DeleteNoticeAfterTime/{owner_Id}', 'DeleteNoticeAfterTime');
});
// =============================NOTICE LOG API========================================
Route::controller(NoticeLogController::class)->group(function () {
    Route::get('Api/NoticeLog/Table/{id?}', 'GetNoticeList');
    Route::get('Api/NoticeLog/TableByOwnerID/{owner_Id}', 'GetNoticeListByOwnerID');
    Route::get('Api/NoticeLog/TableByBuildingID/{building_Id}', 'GetNoticeListByBuildingID');
    Route::post('Api/NoticeLog/Create_Form_Post', 'CreateNotice');
    Route::put('Api/NoticeLog/Updated/{id}', 'UpdateNotice');
    Route::delete('Api/DeleteNoticeLog/{id}', 'DeleteNotice');
    Route::delete('Api/DeleteNoticeLogAfterTime/{owner_Id}', 'DeleteNoticeAfterTime');
});
// =============================RENT LOG API========================================

Route::controller(RentLogController::class)->group(function () {
    Route::get('Api/RentLog/Table/{id?}', 'GetRentLogList');
    Route::get('Api/RentLog/Owner/{owner_Id}', 'GetRentLogListByOwner');
    Route::get('Api/RentLog/Tenant/{tenant_Id}', 'GetRentLogListByTenant');
    Route::post('Api/RentLog/Create_Form_Post', 'CreateRentLog');
    Route::put('Api/RentLog/Updated/{id}', 'UpdateRentLog');
    Route::post('Api/RentLog/UpdatedDate/{tenant_Id}', 'UpdateRentLogLeftDate');
    Route::delete('Api/DeleteRentLog/{id}', 'DeleteRentLog');
});
// =============================PROBLEM API========================================
Route::controller(ProblemController::class)->group(function () {
    Route::get('Api/Problem/Table/{id?}', 'GetProblem');
    Route::post('Api/Problem/TableByTenantId', 'GetProblemByTenantId');
    Route::post('Api/Problem/Create_Form_Post', 'CreateProblem');
    Route::post('Api/Problem/Updated', 'UpdateProblem');
    Route::post('Api/Problem/UpdatedStatus', 'UpdateProblemStatus');
    Route::delete('Api/DeleteProblem/{id}', 'DeleteProblem');

});
// =============================COMMON API========================================
Route::controller(CommonController::class)->group(function () {
    Route::post('Api/Login/Mobile','mobile_login');
});
// =============================DASHBOARD API========================================
Route::controller(DashboardController::class)->group(function () {
    Route::get('Api/Dashboard','GetDashboard');
});
// =============================CREATE SEARCH AGENT API========================================
Route::controller(CreateSearchAgentController::class)->group(function () {
    Route::post('Api/Create-Search-Agent','CreateSearchAgent');
    Route::get('Api/Get-Create-Search-Agent/{id?}','GetCreateSearchAgent');
});
// =============================SHOP API========================================
Route::controller(ShopController::class)->group(function () {
    Route::post('Api/Create_Shop','CreateShop');
    Route::get('Api/Get-Create-Search-Agent/{id?}','GetCreateSearchAgent');
});
