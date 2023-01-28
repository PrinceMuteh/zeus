<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/schudule', [App\Http\Controllers\ScheduleController::class, 'all']);
Route::get('/updateAllVehicle', [App\Http\Controllers\ScheduleController::class, 'updateAllVehicle']);
Route::get('/updateYesterdayMiles', [App\Http\Controllers\ScheduleController::class, 'updateYesterdayMiles']);
Route::get('/updateYesterdayMiles2', [App\Http\Controllers\ScheduleController::class, 'updateYesterdayMiles2']);
Route::get('/status', [App\Http\Controllers\ScheduleController::class, 'vehicleStatusTask']);
Route::get('/status2', [App\Http\Controllers\ScheduleController::class, 'vehicleStatusTask2']);
Route::get('/status3', [App\Http\Controllers\ScheduleController::class, 'vehicleStatusTask3']);
Route::get('/fetch-maintenance/{package}', [App\Http\Controllers\ControlPanelController::class, 'fetchMaintenance']);



Route::get('/tella-trans', [App\Http\Controllers\ScheduleController::class, 'fetchTellaTransaction']);
Route::get('/mygarage-trans', [App\Http\Controllers\ScheduleController::class, 'fetchMygarageTransaction']);
Route::get('/finance', [App\Http\Controllers\ScheduleController::class, 'finance']);
Route::get('/vms_payment', [App\Http\Controllers\ScheduleController::class, 'vms_payment']);

Route::get('/transaction', [App\Http\Controllers\ScheduleController::class, 'transaction']);
Route::get('/transaction2', [App\Http\Controllers\ScheduleController::class, 'transaction2']);
Route::get('/lastpaymentDate', [App\Http\Controllers\ScheduleController::class, 'lastpaymentDate']);
Route::get('/lastpaymentDate2', [App\Http\Controllers\ScheduleController::class, 'lastpaymentDate2']);
Route::get('/lastpaymentDate3', [App\Http\Controllers\ScheduleController::class, 'lastpaymentDate3']);
Route::get('/address', [App\Http\Controllers\ScheduleController::class, 'address']);


Route::get('/vms_fleet', [App\Http\Controllers\ScheduleController::class, 'vms_fleet']);
Route::get('/user_fleet', [App\Http\Controllers\ScheduleController::class, 'user_fleet']);
Route::get('/car_fleet', [App\Http\Controllers\ScheduleController::class, 'car_fleet']);
Route::get('/others', [App\Http\Controllers\ScheduleController::class, 'otherDetails']);

Route::get('/all_vehicle', [App\Http\Controllers\ScheduleController::class, 'allVehicleTask']);
Route::get('/nodriver', [App\Http\Controllers\ScheduleController::class, 'getVehiclewithnoDriver']);

Route::get('/secondary', [App\Http\Controllers\ScheduleController::class, 'secondary']);
Route::get('/officers', [App\Http\Controllers\ScheduleController::class, 'assignAccountOfficer']);

Route::get('/get-address/{lat}/{long}', [App\Http\Controllers\ExternalController::class, 'getAddress']);

Route::group(['prefix' => 'workforce'], function () {
    Route::get('/login', [App\Http\Controllers\WorkForceController::class, 'login']);
    Route::get('/update-password', [App\Http\Controllers\WorkForceController::class, 'updatePassword']);
});
