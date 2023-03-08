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


Route::get('/due-email', [App\Http\Controllers\ScheduleController::class, 'sendDuePayment']);
Route::get('/overdue-email', [App\Http\Controllers\ScheduleController::class, 'sendOverDuePayment']);

Route::get('/due-sms', [App\Http\Controllers\ScheduleController::class, 'sendsms']);



// Route::get('/overdue-email', [App\Http\Controllers\MailerController::class, 'OverDuePayment']);
// Route::get('/payment-receipt', [App\Http\Controllers\MailerController::class, 'DriverPaymentReceipt']);


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
Route::get('/supportManager', [App\Http\Controllers\ScheduleController::class, 'supportManager']);

Route::get('/get-address/{lat}/{long}', [App\Http\Controllers\ExternalController::class, 'getAddress']);





Route::group(['prefix' => 'workforce'], function () {
    Route::post('/login', [App\Http\Controllers\WorkForceController::class, 'login']);
    Route::post('/getuserdetails', [App\Http\Controllers\WorkForceController::class, 'getuserDetails']);
    Route::post('/update-password', [App\Http\Controllers\WorkForceController::class, 'updatePassword']);
    Route::post('/update-bank', [App\Http\Controllers\WorkForceController::class, 'updateBank']);
    
    Route::post('/update-profile', [App\Http\Controllers\WorkForceController::class, 'updateProfile']);
    
    Route::Post('/get-register-account', [App\Http\Controllers\WorkForceController::class, 'getRegisteredAccount']);
    Route::Post('/get-account-users', [App\Http\Controllers\WorkForceController::class, 'getAccountUsers']);
    
    Route::post('/register-account', [App\Http\Controllers\WorkForceController::class, 'registerAccount']);
    Route::post('/register-account2', [App\Http\Controllers\WorkForceController::class, 'registerAccount2']);
    Route::post('/register-account3', [App\Http\Controllers\WorkForceController::class, 'registerAccount3']);
    Route::post('/register-account4', [App\Http\Controllers\WorkForceController::class, 'registerAccount4']);
    
    
    Route::post('/step1-profile', [App\Http\Controllers\WorkForceController::class, 'step1profile']);
    Route::post('/step2-profile', [App\Http\Controllers\WorkForceController::class, 'step2profile']);
    Route::post('/step3-relative', [App\Http\Controllers\WorkForceController::class, 'step3relative']);
    Route::post('/step4-work', [App\Http\Controllers\WorkForceController::class, 'step4work']);
    Route::post('/step5-reference', [App\Http\Controllers\WorkForceController::class, 'step5reference']);
    Route::post('/step6-bank', [App\Http\Controllers\WorkForceController::class, 'step6bank']);
    Route::post('/step7-skills', [App\Http\Controllers\WorkForceController::class, 'step7skills']); 
    
    Route::post('/image_upload', [App\Http\Controllers\WorkForceController::class, 'uploadImage']);
    
    Route::get('/get-config/{city}', [App\Http\Controllers\WorkForceController::class, 'getConfig']);
    Route::get('/get-receipt/{id}', [App\Http\Controllers\WorkForceController::class, 'getReceipt']);
    Route::get('/get-account/{city}', [App\Http\Controllers\WorkForceController::class, 'getEnvioAccount']);

});


