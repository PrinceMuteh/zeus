<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\FinanceOfficeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ReportModuleController;
use App\Http\Controllers\TaskMgtController;
use App\Http\Controllers\TrackWebController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\VehicleMgtController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TechincalDeskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

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

Route::get('/assign-password/{id}', [PasswordController::class, 'index']);
Route::post('/change_passwordz', [PasswordController::class, 'changePasswordz'])->name('changePasswordz');
Route::get('/change_password', [PasswordController::class, 'changePassword'])->name('changePassword');
Route::get('/rest', [PasswordController::class, 'reset'])->name('reset');
Route::post('/rest', [PasswordController::class, 'ConfirmReset'])->name('password.updates');

Route::post('UpdateOperatorsPermission', [ControlPanelController::class, 'UpdateOperatorsPermission'])->name('UpdateOperatorsPermissionss');

Route::get('/settings', [SettingsController::class, 'setting'])->name('settings');
Route::post('/updateApi', [SettingsController::class, 'apikey'])->name('updateApi');

Route::get('/vehicleManager', [SettingsController::class, 'vehicleManager'])->name('vehicleManager');
Route::Post('/vehicle_manager', [SettingsController::class, 'vehicle_manager'])->name('vehicle_manager');
Route::Post('/categoryName', [SettingsController::class, 'categoryName'])->name('categoryName');

Route::group(['middleware' => ['auth']], function () {
    Route::get("/", [HomepageController::class, 'index']);
    Route::get('/users', [HomepageController::class, 'users']);
    Route::get('/user/{phone}', [HomepageController::class, 'user'])->name("user");

    Route::post('/user', [HomepageController::class, 'editUserAccount'])->name("editUserAccount");
    Route::get('track-web', [TrackWebController::class, 'index']);
    Route::get('track-web/{plateNo}', [TrackWebController::class, 'index2']);
    Route::get('track-search', [TrackWebController::class, 'search']);
    Route::view('track-single', 'track-single')->name('track-single');
    Route::get('track-test/{plateNo}', [TrackWebController::class, 'trackTest'])->name("track-test");

    Route::controller(UserManagementController::class)->group(function () {
        Route::get("user-management",  'userMgt');
        Route::get("add-user",  'addUser');
        Route::get("user-profile",  'userProfile');
        Route::get("account-permissions",  'accountPermissions');

        Route::post("update-Profile",  'updateProfile')->name("updateProfile");
        Route::post("update-user-Profile",  'updateUserProfile')->name("updateUserProfile");
        Route::get("admin-information/{id}",  'adminInfo')->name("adminInfo");

        Route::post('create-users', 'createuser')->name('createUser');
        Route::post('gurantor-upload', 'uploadGurantor')->name('uploadGurantor');
        Route::get('gurantors', 'gurantors')->name('gurantors');
        Route::get('gurantor/{plate}', 'getGurantor')->name('getGurantor');

        Route::get('editGurantor/{id}', 'editGurantor')->name('editGurantor');
        Route::Post('updateGurantor', 'updateGurantor')->name('updateGurantor');
        Route::Post('updateConfiguration', 'updateConfiguration')->name('updateConfiguration');
    });

    Route::post('maintenance-fee', [ControlPanelController::class, 'maintenanceFee']);
    Route::post('maintenance-cost', [ControlPanelController::class, 'maintenance'])->name("maintenance");
    Route::post('maintenance-edit', [ControlPanelController::class, 'maintenanceEdit']);
    Route::get('delete-maintenance/{id}', [ControlPanelController::class, 'deleteMaintence']);

    Route::get('vehicle-management', [VehicleMgtController::class, 'index']);
    Route::get('getFleet', [VehicleMgtController::class, 'getFleet'])->name('getFleet');
    Route::post('add-vehicles', [VehicleMgtController::class, 'addVehicle2'])->name("add-vehicle");

    Route::get('add-vehicle', [VehicleMgtController::class, 'addVehicle']);
    Route::get('vehicle-information', [VehicleMgtController::class, 'vehicleInfomation']);

    Route::get('finance-office', [FinanceOfficeController::class, 'depositModule']);
    Route::get('payout-manager', [FinanceOfficeController::class, 'payoutManager']);
    Route::get('payout-status/{status}/{id}', [FinanceOfficeController::class, 'changeStatus'])->name("payout-status");
    Route::get('payout-views/{id}', [FinanceOfficeController::class, 'payoutView'])->name("payout-view");
    // Route::get('payout-views', [FinanceOfficeController::class, 'payoutView']);
    Route::Post('payout-manager-filter', [FinanceOfficeController::class, 'payoutManagerFilter'])->name("filterPayoutManeger");
    Route::Post('payout-manager-filter2', [FinanceOfficeController::class, 'payoutManagerFilter2'])->name("filterPayoutManeger2");

    Route::Post('generate-payout', [FinanceOfficeController::class, 'generatePayoutManager'])->name("generatePayoutManager");

    Route::post('csv-form', [FinanceOfficeController::class, 'downloadCsv'])->name("downloadCsv");
    Route::post('csv-form', [FinanceOfficeController::class, 'downloadCsv'])->name("downloadCsv");


    Route::get('task-management', [TaskMgtController::class, 'index']);

    Route::get('activity-log', [ActivityLogController::class, 'index']);
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('add-admin', [AdminController::class, 'addAdmin'])->name('add.admin');

    Route::post('create-admin', [AdminController::class, 'store'])->name("addAdmin");
    Route::get('control-panel', [ControlPanelController::class, 'index'])->name('control-panel');

    Route::get('new-account-permissions', [ControlPanelController::class, 'newAcctPermission']);
    Route::post('update-account-permissions', [ControlPanelController::class, 'UpdateNewAcctPermission'])->name("UpdateNewAcctPermission");
    Route::get('vehicle-profile', [VehicleMgtController::class, 'VehicleProfile']);
    Route::get('fleet-operator-permission/{id}', [VehicleMgtController::class, 'fleetOperatorPermission'])->name('fleet-operator-permission');
    Route::get('operational-data/{plate}}', [VehicleMgtController::class, 'operational'])->name('operational');

    Route::post('updatefleet', [VehicleMgtController::class, 'updatefleet'])->name('updatefleet');
    Route::post('create-fleet', [VehicleMgtController::class, 'createFleet'])->name('createFleet');
    Route::post('assignFleet', [VehicleMgtController::class, 'assignFleet'])->name('assignFleet');
    Route::get('UnAssignFleet/{id}', [VehicleMgtController::class, 'UnAssignFleet'])->name('UnAssignFleet');


    Route::get('/motor-card', [VehicleMgtController::class, 'motorCard'])->name('motorCard');
    Route::get('/motor-card-user/{plate}/{phone}/{reference}', [VehicleMgtController::class, 'motorCardUser'])->name('motorCardUser');




    // Route::get('/motor-card', function(){
    //     return view('motor-card');
    // });



    Route::get('technical-desk', [TechincalDeskController::class, 'technicalDesk']);
    Route::get('task-logs', [TechincalDeskController::class, 'taskLogs']);
    Route::get('task-new-entry/{id}', [TechincalDeskController::class, 'newEntry'])->name('task-new-entry');
    Route::get('technical-desk-offline-cars', [TechincalDeskController::class, 'techincalDeskOffline']);
    Route::post('create-task', [TechincalDeskController::class, 'taskCreate'])->name('taskCreate');



    Route::controller(ReportModuleController::class)->group(function () {
        Route::get('report-module',  'index')->name("report-module");
        // Route::get('reportModule',  'reportModule')->name("reportModule");
        Route::post('reportModuleFilter',  'reportModuleFilter')->name("reportModuleFilter");
        Route::get('reportModuleFilter/{date}',  'reportModuleFilter2')->name("reportModuleFilter2");

        Route::get('all-payments',  'allPayments')->name("all-payments");
        Route::post('all-payments-filter',  'allPaymentFilter')->name('allPaymentFilter');
        Route::get('all-payments-filter/{date}',  'allPaymentFilter2')->name('allPaymentFilter2');

        Route::get('due-payments',  'duePayments')->name("due-payments");
        Route::get('overdue-payments',  'overduePayments')->name("overdue-payments");
        Route::get('critical-payments',  'criticalPayments')->name("critical-payments");
        Route::get('code-reds',  'codeRed')->name("code-red");
        Route::post('code-red-filter',  'codeRedFilter')->name('codeRedFilter');
        Route::get('code-red-filter/{date}',  'codeRedFilter2')->name('codeRedFilter2');

        Route::get("user-info/{phone}/{plate}/{investorphone}",  'userInformation')->name("userInfo");
    });

    Route::controller(WorkshopController::class)->group(function () {
        Route::get('workshop',  'index')->name("workshop");
        Route::get('workshop-vehicle-profile',  'vehicleProfile')->name("vehicleProfile");
    });
});

// driver
Route::group(['prefix' => 'driver'], function () {
    Route::Post('/driverlogin', [DriverController::class, 'loginz'])->name('driverlogin');

    Route::get('/home', [DriverController::class, 'driverRegistration'])->name("driverRegistration");
    Route::get('/', [DriverController::class, 'driverRegistration'])->name("driverRegistration");
    Route::Post('/', [DriverController::class, 'driverRegistration2'])->name('driverRegistration2');

    Route::get('/driver-education', [DriverController::class, 'driverEducation'])->name('driverEducation');
    Route::post('/driver-education', [DriverController::class, 'driverEducation2'])->name('driverEducation2');

    Route::get('/driver-relative-data', [DriverController::class, 'relativeData'])->name('relativeData');
    Route::post('/driver-relative-data', [DriverController::class, 'relativeData2'])->name('relativeData2');

    Route::get('/driver-work-experience', [DriverController::class, 'workExperience'])->name('workExperience');
    Route::post('/driver-work-experience', [DriverController::class, 'workExperience2'])->name('workExperience2');

    Route::get('/driver-references', [DriverController::class, 'driverReferences'])->name('driverReferences');
    Route::post('/driver-references', [DriverController::class, 'driverReferences2'])->name('driverReferences2');


    Route::get('/driver-bank-details', [DriverController::class, 'bankDetails'])->name('bankDetails');
    Route::post('/driver-bank-details', [DriverController::class, 'bankDetails2'])->name('bankDetails2');

    Route::get('/driver-additional-info', [DriverController::class, 'additionalInfo'])->name('additionalInfo');
    Route::post('/driver-additional-info', [DriverController::class, 'additionalInfo2'])->name('additionalInfo2');

    Route::get('/norminate-guarantor-1', [DriverController::class, 'guarnatorOneBio'])->name('guarnatorOneBio');
    Route::post('/norminate-guarantor-1', [DriverController::class, 'guarnatorOneBio2'])->name('guarnatorOneBio2');

    Route::get('/norminate-guarantor-2', [DriverController::class, 'guarnatorTwoBio'])->name('guarnatorTwoBio');
    Route::post('/norminate-guarantor-2', [DriverController::class, 'guarnatorTwoBio2'])->name('guarnatorTwoBio2');

    Route::get('/completed', [DriverController::class, 'confirm'])->name('driverConfirm');


    Route::get('/guarantor-registration/{id}/{email}', [DriverController::class, 'guarnatorOneReg'])->name('guarnatorOneReg');
    Route::Post('/guarantor-registration', [DriverController::class, 'guarnatorOneReg2'])->name('guarnatorOneReg2');

    Route::get('/guarantor-registration2', [DriverController::class, 'guarnatorTwoReg'])->name('guarnatorTwoReg');
});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomepageController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\ScheduleController::class, 'all']);
Route::get('/check/{no}', [App\Http\Controllers\ScheduleController::class, 'check']);
Route::get('/userManagement', [App\Http\Controllers\ScheduleController::class, 'userManagement']);

Route::get('/allvehicle', [App\Http\Controllers\ScheduleController::class, 'allVehicleTask']);



Route::get('/account-officer', function () {
    return view('account-officer');
});
Route::get('/host', function () {
    return view('host');
});
Route::get('/officers', function () {
    return view('officers');
});
Route::get('/finance-report', function () {
    return view('finance-report');
});
Route::get('/fleet', function () {
    return view('fleet');
});



Route::view('map', 'map');
