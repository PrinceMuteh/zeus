<?php

namespace App\Http\Controllers\Task;

// use App\Http\Controllers\Controller;
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Jobs\ScheduleJobs;
use App\Jobs\LastPaymentJobs;

class ScheduleController extends Controller
{

    public function __construct()
    {
        set_time_limit(800);
    }

    public function sql2()
    {
        return  DB::connection('mysql_2');
    }

    // public  $maptiller_key;


    private function maptiller()
    {
        $result = DB::table('api_details')
            ->where('name', 'maptiller')
            ->select('api_key')
            ->first();
        return  $result->api_key;
    }

    public function all()
    {
        // $this->diff( $time );userManagement
        $now = Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString();
        //    $this->();
       $this->reportTask();
        $this->allVehicleTask();
        $this->TellaPayment();
        //  $this->vehicleStatusTask();
        // $this->userManagement();
        //  $sql = DB::table('users')->where('id', '>=' ,"1500")->delete();
    }

    public function reportTask()
    {
        // $sql = DB::table('duepayments')->truncate();
        // $date = Carbon::tomorrow()->startOfDay();
        $date = Carbon::now()->endOfWeek(Carbon::SATURDAY);
        $page = 10000;
       $result = (new VMSAPI)->getVehicleOverDue($date->format('Y-m-d'), $page);
        foreach ($result->Data as $value) {
            if ($value->Vehicle->investorname != '' || $value->Vehicle->investorname != null) {
                if ($value->Vehicle->drivername != '' || $value->Vehicle->investorname != '0000000000') {
                    if ($value->Vehicle->driverphone != '' || $value->Vehicle->driverphone != null) {
                        DB::table('duepayments')->insert(
                            [
                                'investorname' => $value->Vehicle->investorname,
                                'investoremail' => (!empty($value->Vehicle->investoremail)) ? $value->Vehicle->investoremail : 'empty',
                                'investorphone' => (!empty($value->Vehicle->investorphone)) ? $value->Vehicle->investorphone : 'empty',
                                'drivername' => $value->Vehicle->drivername,
                                'driveremail' => $value->Vehicle->driveremail,
                                'driverphone' => $value->Vehicle->driverphone,
                                'vehid' => $value->Vehicle->vehid,
                                'vehno' => (!empty($value->Vehicle->vehno)) ? $value->Vehicle->vehno : 'empty',
                                'systemno' => $value->Vehicle->systemno,
                                'simid' => $value->Vehicle->simid,
                                'imei' => $value->Vehicle->imei,
                                'enginecapacityid' => $value->Vehicle->enginecapacityid,
                                'enginecapacityname' => $value->Vehicle->enginecapacityname,
                                'fueltypeid' => $value->Vehicle->fueltypeid,
                                'fueltypename' => $value->Vehicle->fueltypename,
                                'bodytypeid' => $value->Vehicle->bodytypeid,
                                'bodytypename' => $value->Vehicle->bodytypename,
                                'brandid' => $value->Vehicle->brandid,
                                'brandname' => $value->Vehicle->brandname,
                                'colorid' => $value->Vehicle->colorid,
                                'colorname' => $value->Vehicle->colorname,
                                'price' => $value->Vehicle->price,
                                'status' => $value->Vehicle->status,
                                'v_createtime' => $value->Vehicle->createtime,
                                'expirdate' => $value->Vehicle->expirdate,
                                'investorid' => $value->Vehicle->investorid,
                                'orderid' => $value->orderid,
                                'needpayment' => $value->needpayment,
                                'rentalprice' => $value->rentalprice,
                                'outstanding' => $value->outstanding,
                                'duetime' => $value->duetime,
                                'createtime' => $value->createtime,
                                'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]
                        );
                        // $totalAmount +=  $value->needpayment;
                    }
                }
            }
        }
    }
    public function getVehiclewithnoDriver()
    {
        return $sql = DB::table('vehicle_details_vms')->whereNull('driverid')->get();
    }

    public function allVehicleTask()
    {
        // $sql = DB::table( 'vehicle_details_vms' )->truncate();

        $result = (new VMSAPI)->All_record();
        return $result;

        foreach ($result->Data as $value) {
            if ($value->investorname != '' || $value->investorname != null) {
                if ($value->drivername != '' || $value->investorname != '0000000000') {
                    // if ( $value->driverphone != '' || $value->driverphone != null ) {
                    if ($value->systemno != '0000000000') {
                        DB::table('vehicle_details_vms')->upsert(
                            [
                                'vehno' => $value->vehno,
                                'systemno' => $value->systemno,
                                'simid' => $value->simid,
                                'bodytypename' => $value->bodytypename,
                                'colorname' => $value->colorname,
                                'price' => $value->price,
                                'status' => $value->status,
                                'brandname' => $value->brandname,
                                'createtime' => $value->createtime,
                                'expirdate' => $value->expirdate,
                                'investorid' => $value->investorid,
                                'investorname' => $value->investorname,
                                'investorphonenumber' => $value->investorphonenumber,
                                'investoremail' => $value->investoremail,
                                'driverid' => $value->driverid,
                                'drivername' => $value->drivername,
                                'driverphone' => $value->driverphone,
                                'driveremail' => $value->driveremail,
                                'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ],
                            'vehno',
                            [
                                // 
                                // You have no right to uncommet this section
                                //  Do not uncomment except u know what you are doing 
                                // driver details that have been entered manual will be overidden
                                // which is bad for bussineess..

                                // last warning....


                                // if u are having dificulit with updating a record delete that record and run this code without uncommenting it 
                                // thank u

                                // 'bodytypename' => $value->bodytypename,
                                // 'colorname' => $value->colorname,
                                // 'price' => $value->price,
                                // 'status' => $value->status,
                                // 'brandname' => $value->brandname,
                                'createtime' => $value->createtime,
                                'expirdate' => $value->expirdate,
                                // 'investorid' => $value->investorid,
                                // 'investorname' => $value->investorname,
                                // 'investorphonenumber' => $value->investorphonenumber,
                                // 'investoremail' => $value->investoremail,
                                // 'driverid' => $value->driverid,
                                // 'drivername' => $value->drivername,
                                // 'driverphone' => $value->driverphone,
                                // 'driveremail' => $value->driveremail,
                                'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]
                        );
                    }
                    // }
                }
            }
        }
    }

    public function vehicleStatusTask()
    {
        // $sql = DB::table( 'vehicle_status' )->truncate();
        // $result = DB::table( 'vehicle_details_vms' )->get();
        // $result = DB::table( 'vehicle_details_vms' )->where( 'id', '<=', '500' )->get();

        DB::table('vehicle_details_vms')->where('id', '<=', '300')->orderBy('created_at')->chunk(50, function ($result) {
            foreach ($result as $value) {
                $vehicleLocation = (new VMSAPI)->getVehiclePosition($value->systemno);
                if ($vehicleLocation != '' || $vehicleLocation != null) {
                    if ($vehicleLocation->Data != '' || $vehicleLocation->Data != null) {
                        if ($vehicleLocation->Data) {

                            $result = $vehicleLocation->Data[0];
                            //getting yesterday miles
                            $dst = DB::table('vehicle_status')->where('systemno', $value->systemno)->first();
                            if ($dst) {
                                $todayMiles = $result->Miles - $dst->yesterdayMiles;
                            } else {
                                $todayMiles = 0;
                            }
                            // $result = $vehicleLocation->Data[ 0 ];
                            $time = $result->Time;
                            $time = Carbon::parse($time)->format('Y-m-d H:i:s');
                            $new = $this->diff($time);
                            if ($new['response'] == true && $new['time'] > 0 && $new['time'] < 6) {
                                // return [ 'response' => true ];
                                $stat = 'Online';
                            } else {
                                $stat = 'Offline';
                            }
                            // return $value->systemno . $stat;
                            // DB::table( 'vehicle_status' )->updateOrInsert(
                            // if ( $dst->yesterdayMiles < 1 ) {
                            $sql =  DB::table('vehicle_status')->upsert(
                                [
                                    'systemno' => $value->systemno,
                                    'vehno' => $value->vehno,
                                    'fleet' => $value->bodytypename,
                                    'createtime' => $value->createtime,
                                    'time' => $result->Time,
                                    'longitude' => $result->Longitude,
                                    'latitude' => $result->Latitude,
                                    'velocity' => $result->Velocity,
                                    'Dtstatus' => $result->DtStatus,
                                    'locate' => $result->Locate,
                                    'miles' => $result->Miles,
                                    'todayMiles' => $todayMiles,
                                    'yesterdayMiles' => $result->Miles,
                                    'offlineStatus' => $stat,
                                    'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                ],
                                'systemno',
                                [
                                    'time' => $result->Time,
                                    'longitude' => $result->Longitude,
                                    'latitude' => $result->Latitude,
                                    'velocity' => $result->Velocity,
                                    'Dtstatus' => $result->DtStatus,
                                    'locate' => $result->Locate,
                                    'todayMiles' => $todayMiles,
                                    // 'yesterdayMiles' => $result->Miles,
                                    'miles' => $result->Miles,
                                    'offlineStatus' => $stat,
                                    'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                ]
                            );

                            // if($sql){
                            //      $mapKey = 'AIzaSyDU4Y93R7fYLIWL1y96D5n7zCDZ94rMcus';
                            //         $response =  ( new ApiController )->get( 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$result->Latitude.','.$result->Longitude.'&key='.$mapKey.'' );
                            //         // $placeAddress = $response->results[ 0 ]->formatted_address;
                            // if($response){

                            //         $label = $response->results[ 0 ]->formatted_address;

                            //     // $res =  ( new ApiController )->get( 'https://api.maptiler.com/geocoding/' . $value->longitude . ', ' . $value->latitude . '.json?key = y42GKPcp1uzNrN1f0T7N' );
                            //     // dd($res);
                            //     // $label = $res->features[ 0 ]->place_name;

                            //         DB::table( 'vehicle_status' )
                            //         ->where(  'systemno' , $value->systemno )
                            //         ->update( [
                            //             'address' => $label,
                            //         ] );
                            // }
                            // }
                        }
                    } else {
                        DB::table('error_table')->insert(
                            [
                                'systemno' => $value->systemno,
                                'error_details' => $vehicleLocation->Data,
                                'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]
                        );
                    }
                }
            }
        });
    }



    public function vehicleStatusTask2()
    {
        //   return  DB::table('vehicle_details_vms')->where( 'id', '=', '928' )->orderBy('created_at', "desc")->get();
        DB::table('vehicle_details_vms')->where('id', '>=', '300')->orderBy('created_at', 'desc')->chunk(50, function ($result) {
            foreach ($result as $value) {
                $vehicleLocation = (new VMSAPI)->getVehiclePosition($value->systemno);
                if ($vehicleLocation != '' || $vehicleLocation != null) {
                    if ($vehicleLocation->Data != '' || $vehicleLocation->Data != null) {
                        if ($vehicleLocation->Data) {
                            $result = $vehicleLocation->Data[0];
                            //getting yesterday miles
                            $dst = DB::table('vehicle_status')->where('systemno', $value->systemno)->first();
                            if ($dst) {
                                $todayMiles = $result->Miles - $dst->yesterdayMiles;
                            } else {
                                $todayMiles = 0;
                            }
                            // $result = $vehicleLocation->Data[ 0 ];
                            $time = $result->Time;
                            $time = Carbon::parse($time)->format('Y-m-d H:i:s');
                            $new = $this->diff($time);
                            if ($new['response'] == true && $new['time'] > 0 && $new['time'] < 6) {
                                // return [ 'response' => true ];
                                $stat = 'Online';
                            } else {
                                $stat = 'Offline';
                            }
                            // return $value->systemno . $stat;
                            // DB::table( 'vehicle_status' )->updateOrInsert(
                            // if ( $dst->yesterdayMiles < 1 ) {
                            $sql =    DB::table('vehicle_status')->upsert(
                                [
                                    'systemno' => $value->systemno,
                                    'vehno' => $value->vehno,
                                    'fleet' => $value->bodytypename,
                                    'createtime' => $value->createtime,
                                    'time' => $result->Time,
                                    'longitude' => $result->Longitude,
                                    'latitude' => $result->Latitude,
                                    'velocity' => $result->Velocity,
                                    'Dtstatus' => $result->DtStatus,
                                    'locate' => $result->Locate,
                                    'miles' => $result->Miles,
                                    'todayMiles' => $todayMiles,
                                    'yesterdayMiles' => $result->Miles,
                                    'offlineStatus' => $stat,
                                    'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                ],
                                'systemno',
                                [
                                    'time' => $result->Time,
                                    'longitude' => $result->Longitude,
                                    'latitude' => $result->Latitude,
                                    'velocity' => $result->Velocity,
                                    'Dtstatus' => $result->DtStatus,
                                    'locate' => $result->Locate,
                                    'todayMiles' => $todayMiles,
                                    // 'yesterdayMiles' => $result->Miles,
                                    'miles' => $result->Miles,
                                    'offlineStatus' => $stat,
                                    'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                ]
                            );
                        }


                        //   if($sql){
                        //       $mapKey = 'AIzaSyDU4Y93R7fYLIWL1y96D5n7zCDZ94rMcus';
                        //       $response =  ( new ApiController )->get( 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$result->Latitude.','.$result->Longitude.'&key='.$mapKey.'' );
                        //       // $placeAddress = $response->results[ 0 ]->formatted_address;
                        //       if($response){
                        //       $label = $response->results[ 0 ]->formatted_address;

                        //   // $res =  ( new ApiController )->get( 'https://api.maptiler.com/geocoding/' . $value->longitude . ', ' . $value->latitude . '.json?key = y42GKPcp1uzNrN1f0T7N' );
                        //   // dd($res);
                        //   // $label = $res->features[ 0 ]->place_name;

                        //       DB::table( 'vehicle_status' )
                        //       ->where(  'systemno' , $value->systemno )
                        //       ->update( [
                        //           'address' => $label,
                        //       ] );
                        //  }
                        //  }
                    } else {
                        DB::table('error_table')->insert(
                            [
                                'systemno' => $value->systemno,
                                'error_details' => $vehicleLocation->Data,
                                'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]
                        );
                    }
                }
            }
        });
    }



    public function vehicleStatusTask3()
    {
        //   return  DB::table('vehicle_details_vms')->where( 'id', '>=', '800' )->orderBy('created_at', "desc")->get();

        DB::table('vehicle_details_vms')->where('id', '>=', '900')->orderBy('created_at', 'desc')->chunk(100, function ($result) {
            foreach ($result as $value) {
                $vehicleLocation = (new VMSAPI)->getVehiclePosition($value->systemno);
                if ($vehicleLocation != '' || $vehicleLocation != null) {
                    if ($vehicleLocation->Data != '' || $vehicleLocation->Data != null) {
                        if ($vehicleLocation->Data) {
                            $result = $vehicleLocation->Data[0];
                            //getting yesterday miles
                            $dst = DB::table('vehicle_status')->where('systemno', $value->systemno)->first();
                            if ($dst) {
                                $todayMiles = $result->Miles - $dst->yesterdayMiles;
                            } else {
                                $todayMiles = 0;
                            }
                            // $result = $vehicleLocation->Data[ 0 ];
                            $time = $result->Time;
                            $time = Carbon::parse($time)->format('Y-m-d H:i:s');
                            $new = $this->diff($time);
                            if ($new['response'] == true && $new['time'] > 0 && $new['time'] < 6) {
                                // return [ 'response' => true ];
                                $stat = 'Online';
                            } else {
                                $stat = 'Offline';
                            }

                            $sql =    DB::table('vehicle_status')->upsert(
                                [
                                    'systemno' => $value->systemno,
                                    'vehno' => $value->vehno,
                                    'fleet' => $value->bodytypename,
                                    'createtime' => $value->createtime,
                                    'time' => $result->Time,
                                    'longitude' => $result->Longitude,
                                    'latitude' => $result->Latitude,
                                    'velocity' => $result->Velocity,
                                    'Dtstatus' => $result->DtStatus,
                                    'locate' => $result->Locate,
                                    'miles' => $result->Miles,
                                    'todayMiles' => $todayMiles,
                                    'yesterdayMiles' => $result->Miles,
                                    'offlineStatus' => $stat,
                                    'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                ],
                                'systemno',
                                [
                                    'time' => $result->Time,
                                    'longitude' => $result->Longitude,
                                    'latitude' => $result->Latitude,
                                    'velocity' => $result->Velocity,
                                    'Dtstatus' => $result->DtStatus,
                                    'locate' => $result->Locate,
                                    'todayMiles' => $todayMiles,
                                    // 'yesterdayMiles' => $result->Miles,
                                    'miles' => $result->Miles,
                                    'offlineStatus' => $stat,
                                    'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                ]
                            );
                        }
                    } else {
                        DB::table('error_table')->insert(
                            [
                                'systemno' => $value->systemno,
                                'error_details' => $vehicleLocation,
                                'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]
                        );
                    }
                }
            }
        });
    }



    public function updateYesterdayMiles()
    {
        $result = DB::table('vehicle_status')->where('id', '<=', '600')->get();
        foreach ($result as $value) {
            $vehicleLocation = (new VMSAPI)->getVehiclePosition($value->systemno);
            DB::table('vehicle_status')
                ->where('id', $value->id)
                ->update([
                    'miles' => $result = $vehicleLocation->Data[0]->Miles,
                    'yesterdayMiles' => $value->miles,
                    'todayMiles' => 0,
                    'yesterday_update' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                ]);
        }
    }
    public function updateYesterdayMiles2()
    {
        $result = DB::table('vehicle_status')->where('id', '>=', '600')->get();
        foreach ($result as $value) {
            $vehicleLocation = (new VMSAPI)->getVehiclePosition($value->systemno);
            DB::table('vehicle_status')
                ->where('id', $value->id)
                ->update([
                    'miles' => $result = $vehicleLocation->Data[0]->Miles,
                    'yesterdayMiles' => $value->miles,
                    'todayMiles' => 0,
                    'yesterday_update' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                ]);
        }
    }

    public function address()
    {
        $maptiller_key =  $this->maptiller();
        $result = DB::table('vehicle_status')->where('latitude', '<>', '0')->get();
        foreach ($result as $key => $value) {
            // $mapKey = 'AIzaSyDU4Y93R7fYLIWL1y96D5n7zCDZ94rMcus';
            // $response =  ( new ApiController )->get( 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$value->latitude.','.$value->longitude.'&key='.$mapKey.'' );

            // $placeAddress = $response->results[ 0 ]->formatted_address;
            // $label = $response->results[ 0 ]->formatted_address;

            // return 'https://api.maptiler.com/geocoding/' . $value->longitude . ', ' . $value->latitude . '.json?key =' . $maptiller_key ;

            $res =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $value->longitude . ',' . $value->latitude . '.json?key=' . $maptiller_key);
            //    return $res;
            if ($res) {


                $label = $res->features[0]->place_name;

                DB::table('vehicle_status')
                    ->where('id', $value->id)
                    ->update([
                        'address' => $label,
                    ]);
            }
        }
    }

    public function check($no)
    {
        return $vehicleLocation = (new VMSAPI)->getVehiclePosition($no);
    }

    public function userManagement()
    {
        return "hello";
        // DB::table('users')->truncate();
        $users = (new ApiController)->get('http://test.mygarage.africa/api/user-record');
        foreach ($users as $value) {
            DB::table('users')->insert(
                [
                    'user_id' => $value->id,
                    'name' => $value->name,
                    'email' => $value->email,
                    'phone' => (!empty($value->phone)) ? $value->phone : 'empty',
                    'password' => $value->password,
                    'password2' => $value->password2,
                    'account' => $value->account,
                    'address' => $value->address,
                    'town' => $value->town,
                    'gender' => $value->gender,
                    'package' => $value->package,
                    'acctBal' => $value->acctBal,
                    'image' => $value->image,
                    'category' => $value->category,
                    'accountNumber' => $value->accountNumber,
                    'sortCode' => $value->sortCode,
                    'driverId' => $value->driverId,
                    'transactionPin' => $value->transactionPin,
                    'nin' => $value->nin,
                    'dob' => $value->dob,
                    'refferral' => $value->referral,
                    'defaultCar' => $value->defaultCar,
                    'tracking' => $value->tracking,
                    'repairFinancing' => $value->repairFinancing,
                    'bolt' => $value->bolt,
                    'insurance' => $value->insurance,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                ]
            );
        }
    }

    public function TellaPayment()
    {
        DB::table('tella_payment')->truncate();
        $users = (new ApiController)->get('https://tella.envio.africa/api/all-payment');
        foreach ($users as $value) {
            DB::table('tella_payment')->insert(
                [
                    'user_id' => $value->user_id,
                    'agentId' => $value->agentId,
                    'agentName' => $value->agentName,
                    'agentEmail' => $value->agentEmail,
                    'agentPhone' => $value->agentPhone,
                    'driverName' => $value->driverName,
                    'driverPhone' => $value->driverPhone,
                    'driverEmail' => $value->driverEmail,
                    'ownerName' => $value->ownerName,
                    'ownerEmail' => $value->ownerEmail,
                    'ownerPhone' => $value->ownerPhone,
                    'vehiclePlateNo' => $value->vehiclePlateNo,
                    'amount' => $value->amount,
                    'status' => $value->status,
                    'note' => $value->note,
                    'receiptImage' => $value->receiptImage,
                    'paymentMethod' => $value->paymentMethod,
                    'reference' => $value->reference,
                    'year' => $value->year,
                    'month' => $value->month,
                    'week' => $value->week,
                    'day' => $value->day,
                    'investorName' => $value->investorName,
                    'acctNumber' => $value->acctNumber,
                    'sortCode' => $value->sortCode,
                    'debitAccount' => $value->debitAccount,
                    'vehicle' => $value->vehicle,
                    'percentage' => $value->percentage,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                ]
            );
        }
    }

    public static function diff($time)
    {
        $now = Carbon::now();
        $now = Carbon::parse($now)->timezone('Africa/Lagos')->toDateTimeString();
        $todayMonth = Carbon::parse($now)->format('F');
        $todayDay = Carbon::parse($now)->format('l');
        $todayYear = Carbon::parse($now)->format('Y');
        $todayHour = Carbon::parse($now)->format('H');
        $todayMinutes = Carbon::parse($now)->format('i');

        $vmsMonth = Carbon::parse($time)->format('F');
        $vmsDay = Carbon::parse($time)->format('l');
        $vmsYear = Carbon::parse($time)->format('Y');
        $vmsHour = Carbon::parse($time)->format('H');
        $vmsMinutes = Carbon::parse($time)->format('i');

        if ($todayYear == $vmsYear) {
            if ($todayMonth == $vmsMonth) {
                if ($todayDay == $vmsDay) {
                    if ($todayHour == $vmsHour) {

                        $diff = $todayMinutes - $vmsMinutes;
                        return ['response' => true, 'time' => $diff];
                    }
                }
            }
        }

        return ['response' => false, 'time' => -30];
    }

    public function fetchTellaTransaction()
    {
        $result = DB::table('transaction_number')
            ->where('api', 'Tella')
            ->select('lastnumber')
            ->first();
        // return $result;
        $content = array(
            'id' => $result->lastnumber,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://tella.envio.africa/api/transactions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>  $content,
        ));
        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);
        foreach ($response as $key => $value) {
            DB::table('transactions')->upsert(
                [
                    'user_id' => $value->user_id,
                    'agentId' => $value->agentId,
                    'agentName' => $value->agentName,
                    'agentEmail' => $value->agentEmail,
                    'agentPhone' => $value->agentPhone,
                    'driverName' => $value->driverName,
                    'driverPhone' => $value->driverPhone,
                    'driverEmail' => $value->driverEmail,
                    'ownerName' => $value->ownerName,
                    'ownerEmail' => $value->ownerEmail,
                    'ownerPhone' => $value->ownerPhone,
                    'vehiclePlateNo' => $value->vehiclePlateNo,
                    'amount' => $value->amount,
                    'status' => $value->status,
                    'note' => $value->note,
                    'receiptImage' => $value->receiptImage,
                    'paymentMethod' => $value->paymentMethod,
                    'reference' => $value->reference,
                    'year' => $value->year,
                    'month' => $value->month,
                    'week' => $value->week,
                    'day' => $value->day,
                    'created_at' => $value->created_at,
                ],
                'reference',
                [
                    'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                ]
            );
            $result = DB::table('transaction_number')
                ->where('api', 'Tella')
                ->select('lastnumber')
                ->first();
            DB::table('transaction_number')
                ->where('api', 'Tella')
                ->update([
                    'lastnumber' => $result->lastnumber + 1,
                ]);
        }
    }

    public function fetchMygarageTransaction()
    {
        $result = DB::table('transaction_number')
            ->where('api', 'Mygarage')
            ->select('lastnumber')
            ->first();
        $content = array(
            'id' => $result->lastnumber,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://test.mygarage.africa/api/transactions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>  $content,
        ));
        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);
        return $response;
        foreach ($response as $key => $value) {
            DB::table('transactions')->upsert(
                [
                    'user_id' => $value->userId,
                    'agentId' => $value->agentId,
                    'agentName' => $value->agentName,
                    'agentEmail' => $value->agentEmail,
                    'agentPhone' => $value->agentPhone,
                    'driverName' => $value->driverName,
                    'driverPhone' => $value->driverPhone,
                    'driverEmail' => $value->driverEmail,
                    'ownerName' => $value->ownerName,
                    'ownerEmail' => $value->ownerEmail,
                    'ownerPhone' => $value->ownerPhone,
                    'vehiclePlateNo' => $value->vehiclePlateNo,
                    'amount' => $value->amount,
                    'status' => $value->status,
                    'note' => $value->note,
                    'receiptImage' => $value->receiptImage,
                    'paymentMethod' => $value->paymentMethod,
                    'reference' => $value->reference,
                    'year' => $value->year,
                    'month' => $value->month,
                    'week' => $value->week,
                    'day' => $value->day,
                    'created_at' => $value->created_at,
                ],
                'reference',
                [
                    'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                ]
            );
            $result = DB::table('transaction_number')
                ->where('api', 'Mygarage')
                ->select('lastnumber')
                ->first();
            DB::table('transaction_number')
                ->where('api', 'Mygarage')
                ->update([
                    'lastnumber' => $result->lastnumber + 1,
                ]);
        }
    }

    public function finance()
    {
        return   $this->fetchMygarageTransaction();
        // $this->fetchTellaTransaction();
    }

    public function vms_payment()
    {

        $result = DB::table('transaction_number')
            ->where('api', 'vms')
            ->select('lastnumber')
            ->first();
        $result = DB::table('vehicle_details_vms')->where('id', '>=', $result->lastnumber)->select('vehno')->get();
        foreach ($result as $item) {
            $results = (new VMSAPI)->get_pay_bill($item->vehno);

            // $results = ( new VMSAPI )->get_pay_bill( 'EFR882SN' );
            // $results = json_decode( $results );
            // return $results;
            // $arr[] = $results;

            if ($results) {
                if ($results->Data != null) {
                    foreach ($results->Data->leasePay as $value) {
                        DB::table('vms_payments')->upsert(
                            [
                                'userid' => $results->Data->userid,
                                'vehno' => $results->Data->vehno,
                                'nickname' => $results->Data->nickname,
                                'vehid' => $results->Data->vehid,
                                'systemno' => $results->Data->systemno,
                                'type' => 'leasepay',
                                'orderid' => $value->orderid,
                                'needpayment' => $value->needpayment,
                                'createtime' => $value->createtime,
                                'created_at' => now(),
                            ],
                            'orderid',
                            [
                                'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]
                        );
                    }
                }
            }
            $result = DB::table('transaction_number')
                ->where('api', 'vms')
                ->select('lastnumber')
                ->first();
            DB::table('transaction_number')
                ->where('api', 'vms')
                ->update([
                    'lastnumber' => $result->lastnumber + 1,
                ]);
        }
        // return $arr;
    }

    public function transaction()
    {
        // dispatch( new ScheduleJobs() );
        $todayDay = Carbon::parse(now())->format('Y-m-d H:i:s');
        // $date = Carbon::now()->subDays( 2 )->startOfDay()->format( 'Y-m-d H:i:s' );
        // DB::table( 'vehicle_details_vms' )
        // ->update( [
        //     'updated_at' => $date,
        // ] );

        //   return ( new VMSAPI )->get_pay_bill( "MUS73FX" );
        //  $result = DB::table( 'vehicle_details_vms' ) 
        // ->whereDate( 'updated_at', '<', $todayDay )
        // ->select( 'id', 'vehno' )
        // // ->inRandomOrder()
        // // ->limit( 5 )
        // ->get();
        // // dd( $result );

        DB::table('vehicle_details_vms')
            ->whereDate('updated_at', '<', $todayDay)
            // ->select( 'id', 'vehno' )
            ->where('id', '<=', '500')->orderBy('created_at')->chunk(50, function ($result) {
                foreach ($result as $item) {
                    $results = (new VMSAPI)->get_pay_bill($item->vehno);
                    if ($results) {
                        if ($results->Data != null) {
                            foreach ($results->Data->leasePay as $value) {
                                DB::table('vms_payments')->upsert(
                                    [
                                        'fleet' => $item->bodytypename,
                                        'userid' => $results->Data->userid,
                                        'vehno' => $results->Data->vehno,
                                        'nickname' => $results->Data->nickname,
                                        'vehid' => $results->Data->vehid,
                                        'systemno' => $results->Data->systemno,
                                        'type' => 'leasepay',
                                        'orderid' => $value->orderid,
                                        'needpayment' => $value->needpayment,
                                        'createtime' => $value->createtime,
                                        'created_at' => now(),
                                    ],
                                    'orderid',
                                    [
                                        'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                    ]
                                );
                            }
                            foreach ($results->Data->installment as $value) {
                                DB::table('vms_payments')->upsert(
                                    [
                                        'fleet' => $item->bodytypename,
                                        'userid' => $results->Data->userid,
                                        'vehno' => $results->Data->vehno,
                                        'nickname' => $results->Data->nickname,
                                        'vehid' => $results->Data->vehid,
                                        'systemno' => $results->Data->systemno,
                                        'type' => 'installment',
                                        'orderid' => $value->orderid,
                                        'needpayment' => $value->needpayment,
                                        'createtime' => $value->createtime,
                                        'created_at' => now(),
                                    ],
                                    'orderid',
                                    [
                                        'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                    ]
                                );
                            }
                        }

                        DB::table('vehicle_details_vms')
                            ->where('id', $item->id)
                            ->update([
                                'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]);
                    }
                }
            });
    }


    public function transaction2()
    {

        $todayDay = Carbon::parse(now())->format('Y-m-d H:i:s');

        // $date = Carbon::now()->subDays( 2 )->startOfDay()->format( 'Y-m-d H:i:s' );
        // DB::table( 'vehicle_details_vms' )
        // ->update( [
        //     'updated_at' => $date,
        // ] );

        // $result = DB::table( 'vehicle_details_vms' )
        // ->whereDate( 'updated_at', '<', $todayDay )
        // ->select( 'id', 'vehno' )
        // // ->inRandomOrder()
        // // ->limit( 5 )
        // ->get();

        // // dd( $result );
        DB::table('vehicle_details_vms')
            ->whereDate('updated_at', '<', $todayDay)
            // ->select( 'id', 'vehno' )
            ->where('id', '>=', '500')->orderBy('created_at')->chunk(50, function ($result) {
                foreach ($result as $item) {
                    $results = (new VMSAPI)->get_pay_bill($item->vehno);
                    if ($results) {
                        if ($results->Data != null) {
                            foreach ($results->Data->leasePay as $value) {
                                DB::table('vms_payments')->upsert(
                                    [
                                        'fleet' => $item->bodytypename,
                                        'userid' => $results->Data->userid,
                                        'vehno' => $results->Data->vehno,
                                        'nickname' => $results->Data->nickname,
                                        'vehid' => $results->Data->vehid,
                                        'systemno' => $results->Data->systemno,
                                        'type' => 'leasepay',
                                        'orderid' => $value->orderid,
                                        'needpayment' => $value->needpayment,
                                        'createtime' => $value->createtime,
                                        'created_at' => now(),
                                    ],
                                    'orderid',
                                    [
                                        'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                    ]
                                );
                            }
                            foreach ($results->Data->installment as $value) {
                                DB::table('vms_payments')->upsert(
                                    [
                                        'fleet' => $item->bodytypename,
                                        'userid' => $results->Data->userid,
                                        'vehno' => $results->Data->vehno,
                                        'nickname' => $results->Data->nickname,
                                        'vehid' => $results->Data->vehid,
                                        'systemno' => $results->Data->systemno,
                                        'type' => 'installment',
                                        'orderid' => $value->orderid,
                                        'needpayment' => $value->needpayment,
                                        'createtime' => $value->createtime,
                                        'created_at' => now(),
                                    ],
                                    'orderid',
                                    [
                                        'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                    ]
                                );
                            }
                        }

                        DB::table('vehicle_details_vms')
                            ->where('id', $item->id)
                            ->update([
                                'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]);
                    }
                }
            });
    }

    public function lastpaymentDate()
    {
        // dispatch( new LastPaymentJobs() );

        $todayDay = Carbon::parse(now())->format('Y-m-d H:i:s');
        //     $date = Carbon::now()->subDays( 2 )->startOfDay()->format( 'Y-m-d H:i:s' );
        //  return   DB::table( 'vehicle_details_vms' )
        //     ->update( [
        //         'updated_at' => $date,
        // ] );
        // return 'done';
        // $result = DB::table( 'vehicle_details_vms' )
        // ->whereDate( 'updated_at', '<', $todayDay )
        // ->select( 'id', 'vehno' ,'bodytypename')
        // // ->inRandomOrder()
        // // ->limit( 5 )
        // ->get();
        DB::table('vehicle_details_vms')
            // ->whereDate( 'updated_at', '<', $todayDay )
            ->where('id', '<=', '400')
            ->select('id', 'vehno', 'bodytypename')
            ->orderBy('created_at')->chunk(50, function ($result) {
                foreach ($result as $item) {
                    $results = (new VMSAPI)->get_vehicle_recent_payment($item->vehno);
                    if ($results) {
                        if ($results->Data != null) {
                            // foreach ( $results->Data->lastPaid as $value ) {
                            if (!empty($results->Data->lastPaid)) {

                                if ($results->Data->lastPaid->orderid) {

                                    DB::table('vms_payments')->upsert(
                                        [
                                            'fleet' => $item->bodytypename,
                                            'vehno' => $results->Data->vehno,
                                            'nickname' => $results->Data->name,
                                            // 'vehid' => $results->Data->vehid,
                                            'systemno' => $results->Data->systemno,
                                            'type' => 'leasepay',
                                            'orderid' =>  $results->Data->lastPaid->orderid,
                                            'needpayment' =>  $results->Data->lastPaid->amount,
                                            'createtime' =>  $results->Data->lastPaid->paydate,
                                            'created_at' => now(),
                                        ],
                                        'orderid',
                                        [
                                            'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                        ]
                                    );
                                }
                            }
                        }

                        DB::table('vehicle_details_vms')
                            ->where('id', $item->id)
                            ->update([
                                'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]);
                    }
                }
            });
    }
    public function lastpaymentDate2()
    {
        $todayDay = Carbon::parse(now())->format('Y-m-d H:i:s');
        //     $date = Carbon::now()->subDays( 2 )->startOfDay()->format( 'Y-m-d H:i:s' );
        //  return   DB::table( 'vehicle_details_vms' )
        //     ->update( [
        //         'updated_at' => $date,
        // ] );
        // return 'done';
        // $result = DB::table( 'vehicle_details_vms' )
        // ->whereDate( 'updated_at', '<', $todayDay )
        // ->select( 'id', 'vehno' ,'bodytypename')
        // // ->inRandomOrder()
        // // ->limit( 5 )
        // ->get();
        DB::table('vehicle_details_vms')
            // ->whereDate( 'updated_at', '<', $todayDay )
            ->where('id', '>=', '400')
            ->select('id', 'vehno', 'bodytypename')
            ->orderBy('created_at')->chunk(50, function ($result) {
                foreach ($result as $item) {
                    $results = (new VMSAPI)->get_vehicle_recent_payment($item->vehno);
                    if ($results) {
                        if ($results->Data != null) {
                            // foreach ( $results->Data->lastPaid as $value ) {
                            if (!empty($results->Data->lastPaid)) {

                                if ($results->Data->lastPaid->orderid) {

                                    DB::table('vms_payments')->upsert(
                                        [
                                            'fleet' => $item->bodytypename,
                                            'vehno' => $results->Data->vehno,
                                            'nickname' => $results->Data->name,
                                            // 'vehid' => $results->Data->vehid,
                                            'systemno' => $results->Data->systemno,
                                            'type' => 'leasepay',
                                            'orderid' =>  $results->Data->lastPaid->orderid,
                                            'needpayment' =>  $results->Data->lastPaid->amount,
                                            'createtime' =>  $results->Data->lastPaid->paydate,
                                            'created_at' => now(),
                                        ],
                                        'orderid',
                                        [
                                            'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                        ]
                                    );
                                }
                            }
                        }

                        DB::table('vehicle_details_vms')
                            ->where('id', $item->id)
                            ->update([
                                'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]);
                    }
                }
            });
    }
    public function lastpaymentDate3()
    {
        $todayDay = Carbon::parse(now())->format('Y-m-d H:i:s');
        //     $date = Carbon::now()->subDays( 2 )->startOfDay()->format( 'Y-m-d H:i:s' );
        //  return   DB::table( 'vehicle_details_vms' )
        //     ->update( [
        //         'updated_at' => $date,
        // ] );
        // return 'done';
        // $result = DB::table( 'vehicle_details_vms' )
        // ->whereDate( 'updated_at', '<', $todayDay )
        // ->select( 'id', 'vehno' ,'bodytypename')
        // // ->inRandomOrder()
        // // ->limit( 5 )
        // ->get();
        DB::table('vehicle_details_vms')
            // ->whereDate( 'updated_at', '<', $todayDay )
            ->where('id', '>=', '800')
            ->select('id', 'vehno', 'bodytypename')
            ->orderBy('created_at')->chunk(50, function ($result) {
                foreach ($result as $item) {
                    $results = (new VMSAPI)->get_vehicle_recent_payment($item->vehno);
                    if ($results) {
                        if ($results->Data != null) {
                            // foreach ( $results->Data->lastPaid as $value ) {
                            if (!empty($results->Data->lastPaid)) {

                                if ($results->Data->lastPaid->orderid) {

                                    DB::table('vms_payments')->upsert(
                                        [
                                            'fleet' => $item->bodytypename,
                                            'vehno' => $results->Data->vehno,
                                            'nickname' => $results->Data->name,
                                            // 'vehid' => $results->Data->vehid,
                                            'systemno' => $results->Data->systemno,
                                            'type' => 'leasepay',
                                            'orderid' =>  $results->Data->lastPaid->orderid,
                                            'needpayment' =>  $results->Data->lastPaid->amount,
                                            'createtime' =>  $results->Data->lastPaid->paydate,
                                            'created_at' => now(),
                                        ],
                                        'orderid',
                                        [
                                            'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                                        ]
                                    );
                                }
                            }
                        }

                        DB::table('vehicle_details_vms')
                            ->where('id', $item->id)
                            ->update([
                                'updated_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
                            ]);
                    }
                }
            });
    }

    public function vms_fleet()
    {

        // DB::table( 'vehicle_details_vms' )
        //     ->update( [
        //         'updated_at' =>  null,
        //     ] );
        //     die();
        $result = DB::table('vms_payments')
            ->join('vehicle_details_vms', 'vms_payments.vehno', 'vehicle_details_vms.vehno')
            ->whereNull("fleet")
            ->get();
        // dd($result);
        foreach ($result as $results) {
            // $result = DB::table( 'vehicle_details_vms' )->where('vehno', $results->vehno)->first();
            DB::table('vms_payments')
                ->where('vehno', $results->vehno)
                ->update([
                    'fleet' =>  $results->bodytypename,
                ]);
        }
    }

    public function user_fleet()
    {
        $result = DB::table('users')
            ->join('vehicle_details_vms', 'users.phone', 'vehicle_details_vms.investorphonenumber')
            // ->join('vehicle_details_vms', 'user_management.phone', 'vehicle_details_vms.driverphone')
            // ->WhereNotNull ("vehicle_details_vms.accountOfficer")
            ->get();
        // dd($result);
        // foreach ($result as $results) {
        //     $result = DB::table('vehicle_details_vms')->where('vehno', $results->vehno)->first();
        //     DB::table('users')
        //         ->where('phone', $results->phone)
        //         ->update([
        //             'fleet' =>  $results->bodytypename,
        //         ]);
        // }
        foreach ($result as $results) {
            $result = DB::table('vehicle_details_vms')->where('vehno', $results->vehno)->first();
            DB::table('users')
                ->where('phone', $results->phone)
                ->update([
                    'accountOfficer' =>  $results->accountOfficer,
                ]);
        }
    }

    public function update_allVehicle()
    {
        $result = DB::table('vehicle_details_vms')
            ->join('vehicle_details_vms', 'user_management.vehno', 'vehicle_details_vms.vehno')
            ->whereNull("user_management.fleet")
            ->get();
        // dd($result);
        foreach ($result as $results) {
            $result = DB::table('vehicle_details_vms')->where('vehno', $results->vehno)->first();
            DB::table('users')
                ->where('phone', $results->phone)
                ->update([
                    'fleet' =>  $results->bodytypename,
                ]);
        }
    }


    public function gurantor()
    {
        $result = DB::table('gurantors_info')
            ->whereNull("Driver_PHONE")->delete();
        return $result;
    }

    public function car_fleet()
    {
        $sql = DB::table('vehicle_details_vms')->get();

        foreach ($sql as $value) {
            if ($value->status == 0) {
                $pacakge = "Available";
            } else if ($value->status == 1) {
                $pacakge = "Disabled";
            } else if ($value->status == 2) {
                $pacakge = "Rental";
            } else if ($value->status == 2) {
                $pacakge = "Hire Purchase";
            }


            DB::table('car_fleet')->insertOrIgnore(
                [
                    'vehiclePlateNo' => $value->vehno,
                    'type' => $value->bodytypename,
                    'body' => $value->brandname,
                    'colour' => $value->colorname,
                    'package' => $pacakge ??  "",
                    'created_at' => now(),
                ]
            );
        }
    }

    public function otherDetails()
    {
        $date = Carbon::now()->endOfWeek(Carbon::SATURDAY);
        $page = 10000;
        $result = (new VMSAPI)->getVehicleOverDue($date->format('Y-m-d'), $page);
        foreach ($result->Data as $value) {
            if ($value->Vehicle->investorname != '' || $value->Vehicle->investorname != null) {
                if ($value->Vehicle->drivername != '' || $value->Vehicle->investorname != '0000000000') {
                    if ($value->Vehicle->driverphone != '' || $value->Vehicle->driverphone != null) {

                        $db = DB::table('car_fleet')->where('vehiclePlateNo', $value->Vehicle->vehno)->first();
                        if ($db == null) {
                            $orderid = $value->orderid;
                            $needpayment = $value->needpayment;
                            $rentalprice = $value->rentalprice;
                            $outstanding = $value->outstanding;
                            $CreateTime = $value->createtime;
                            $dueTime = $value->duetime;
                            $db = DB::table('car_fleet')->insert([
                                "order_id" => $orderid,
                                "needPayment" => $needpayment,
                                "rentalPrice" => $rentalprice,
                                "outstanding" => $outstanding,
                                "lastPaymentDate" => $CreateTime,
                                "nextPaymentDate" => $dueTime,
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function otherDetails2()
    {

        $date = Carbon::now()->endOfWeek(Carbon::SATURDAY);
        $page = 10000;
        $res = (new VMSAPI)->getVehicleOverDue($date->format('Y-m-d'), $page);
        $res = $res->Data;

        dd($res);

        $plate_no = "RBC530XD";
        $d2 = DB::table('vehicle_details_vms')->where('vehno', $plate_no)->first();
        $bills = (new VMSAPI)->get_pay_bill($plate_no);
        $totalContributed = 0;
        $recentBills = (new VMSAPI)->get_vehicle_recent_payment($plate_no);
        dd($recentBills);
        if ($recentBills->Data == '') {
            return ['response' => 'Failed'];
        }

        $recentPay = $recentBills->Data;

        if ($recentPay->lastUnpaid == null) {
            $nextPaymentDate = "2019-05-12 23:59:59";
            $amountDue = 0;
        } else {
            $nextPaymentDate = $recentPay->lastUnpaid->duedate;
            $amountDue = $recentPay->lastUnpaid->amount;
        }

        if ($bills->Data->leasePay != null) {
            $startDate = $bills->Data->leasePay[0]->createtime;
            foreach ($bills->Data->leasePay as $key => $value) {
                $totalContributed += $value->needpayment;
            }
        } elseif ($bills->Data->leasePay != null) {
            $startDate = $bills->Data->installment[0]->createtime;
            foreach ($bills->Data->installment as $key => $value) {
                $totalContributed += $value->needpayment;
            }
        } else {
            $totalContributed = 0;
            $startDate = "nil";
        }

        if ($d2 == null) {
            // $res = $new->getVehicleOverDue("2022-09-26");
            $date = Carbon::now()->endOfWeek(Carbon::SATURDAY);
            $page = 10000;
            $res = (new VMSAPI)->getVehicleOverDue($date->format('Y-m-d'), $page);
            $res = $res->Data;
            foreach ($res as $key => $value) {
                //    return $value;
                if ($value->Vehicle->vehno) {
                    $orderid = $value->orderid;
                    $needpayment = $value->needpayment;
                    $rentalprice = $value->rentalprice;
                    $outstanding = $value->outstanding;

                    $CreateTime = $value->createtime;
                    $dueTime = $value->duetime;
                    $driverName = $value->Vehicle->drivername;
                    $driverEmail = $value->Vehicle->driveremail;
                    $driverPhone = $value->Vehicle->driverphone;
                    $investorPhone = $value->Vehicle->investorphonenumber;
                    $investorName = $value->Vehicle->investorname;
                    $investorEmail = $value->Vehicle->investoremail;

                    $db = DB::table('vehicle_details')->where('plateNo', $value->Vehicle->vehno)->first();
                    if ($db == null) {
                        $db = DB::table('vehicle_details')->insert([
                            "order_id" => $orderid,
                            "needPayment" => $needpayment,
                            "rentalPrice" => $rentalprice,
                            "outstanding" => $outstanding,
                            "plateNo" => $value->Vehicle->vehno,
                            "dueTime" => $dueTime,
                            "CreateTime" => $CreateTime,

                            "driverName" => $driverName,
                            "driverEmail" => $driverEmail,
                            "driverPhone" => $driverPhone,
                            "investorName" => $investorName,
                            "investorPhone" => $investorPhone,
                            "investorEmail" => $investorEmail,
                        ]);
                    }
                }
            }
        }

        // if ($d2 != null) {
        //     $d2->rentalPrice;

        //     $hirePurchaseValue = $d2->rentalPrice;
        //     $remittanceAmount = $d2->needPayment;

        // } else {
        //     $hirePurchaseValue = 0;
        //     $remittanceAmount = 0;
        // }

        $totalContributed;
        $nextPayment = $amountDue;
        $avgSpeed = "Not Available";
        $driveTime = "Not Available";
        $driverRating = "Not Available";
        $maintenanceScore = "Not Avaialbe";

        return compact(
            'nextPayment',
            'nextPaymentDate',
            'startDate',
            'totalContributed',
            'maintenanceScore',
            'driveTime',
            'driverRating',
            'avgSpeed',
            "hirePurchaseValue"
        );
    }

    public function secondary()
    {
        return $products = DB::connection('mysql_2')->table("users")->get();

        print_r($products);
    }

    public function assignAccountOfficer()
    {
        // Group A
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                "vehno",
                ["BWR47XE", "ABC07ZY", "KUJ784XC", "KUJ319XC", "ABC802XD", "ABC803XD", "ABC804XD", "RBC758XD", "KWL386XB", "BWR261XB", "BWR945XB", "KUJ746XC", "KUJ749XC", "KUJ507XC", "KWL832XB", "BWR280XB", "ABC22XD", "ABC23XD", "BWR615XE", "KUJ221XC", "BWR668XB", "KWL660XB", "BWR143XB", "RSH562XD", "RSH480XD", "KUJ451XC", "KUJ452XC", "KUJ831XC", "RSH854XD", "RSH425XD", "BWR768YL", "RBC229YL", "RBC530XE", "RBC531XE", "BWR710YL", "ABC457XD", "KUJ915XC", "RSH992XD", "KWL892XB", "RBC451YL", "ABC454XD", "BWR816XE", "BWR817XE", "BWR819XE", "RSH989XD", "RSH862XD", "RSH654XD", "KWL385XB", "BWR858YL", "BWR859YL", "BWR696YL", "BWR697YL", "BWR698YL", "BWR767YL", "ABC79ZY", "KUJ780XC", "RBC703XD", "RSH807XD", "RSH806XD", "BWR145XB", "KUJ501XC", "KUJ990XC", "RBC305XD", "BWR48XB", "RSH397XC", "KWL783XB", "RBC369XD", "RBC370XD", "BWR150XB", "BWR18XB", "KUJ459XC", "KWL389XB", "KWL390XB", "ABJ988XB", "KUJ744XC", "KWL387XB", "KWL802XB", "RBC982XD", "ABC816XD", "RSH233XD", "ABJ332XV", "RSH235XD", "RSH236XD", "RBC529XD", "RSH552XD", "RBC530XD", "KUJ750XC", "RSH553XD", "RBC866XD", "RBC867XD", "ABC669ZW", "ABC670ZW", "RSH940XC", "KWL581XB", "KWL52XB", "ABJ239XV", "KUJ798XC", "BWR609XB", "KWL376XB", "BWR657XE", "RBC225YD", "ABC671XF", "ABC738ZY", "BWR441XB", "BWR380XB", "BWR423XE", "BWR424XE", "BWR422XE", "KUJ287XC", "RSH551XD", "RBC688XC", "RBC690XC", "BWR702YL", "KWL779XB", "ABJ131XB", "ABJ537XB", "ABJ942XB", "RBC518XD", "ABC361XD", "RBC452YL", "RBC865XD", "BWR20XB", "RSH994XD", "RSH141XD", "RSH557XD", "RSH559XD", "RSH558XD", "BWR265XB", "KUJ454XC", "KUJ460XC", "RSH477XD", "BWR620XE", "RBC313YL", "RSH983XC", "RSH561XD", "KUJ115XC", "BWR655XE", "KWL422ZY", "RSH861XD", "ABC303ZY", "KUJ461XC", "BWR881XE", "RBC902XD", "KUJ224XC", "BWR703YL", "KWL831XB", "RBC101YL", "RBC448YL", "ABJ243XV", "ABC810XD", "ABJ835XV", "RBC870XD", "RBC871XD", "RSH234XD", "RBC868XD", "KUJ360XC", "RSH76XD", "BWR239XB", "RSH109XD", "RSH110XD", "BWR861YL", "RBC880YL", "KUJ219XC", "ABC783XD", "KWL995XB", "RBC565XD", "KUJ315XC", "KUJ464XC", "BWR704YL", "BWR856YL", "BWR857YL", "KWL373XB", "KUJ502XC", "GWA376YL", "BWR288XB", "RBC307XD", "ABC384XF"]
            )->select('vehno', 'id')
            ->get();
        foreach ($account as  $value) {
            $sql =   DB::table('vehicle_details_vms')
                ->where('vehno', $value->vehno)
                ->update([
                    'accountOfficer' => "Alpha@teamenvio.com",
                ]);
        }
        // Group B
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                "vehno",
                ["ABC567ZW", "BWR974XE", "BWR294XB", "KUJ745XC", "ABC819XD", "RBC787YD", "ABJ237XV", "ABJ240XV", "GWA238YL", "ABC672XF", "RSH656XD", "ABC83ZW", "BWR373XB", "BWR474XB", "RBC983XD", "BWR442XB", "RBC533XD", "BWR473XB", "KWL834XB", "RBC561XD", "RBC562XD", "RBC91YD", "ABC365XD", "KWL785XB", "KUJ509XC", "BWR435YL", "ABC429ZY", "KUJ620XC", "RBC984XD", "ABC818XD", "ABC314XD", "ABC313XD", "BWR403YL", "BWR404YL", "BRW650XE", "BWR658XE", "BWR282XE", "ABJ134XB", "ABC536XD", "KUJ950XC", "RSH898XC", "RSH899XC", "RSH750XD", "KWL787XB", "BWR148XB", "RBC344YL", "RSH139XD", "RSH963XD", "KUJ120XC", "BWR501XE", "ABC72ZW", "BWR480XB", "RBC565YD", "ABC312XD", "ABJ492XV", "RBC217YL", "KWL833XB", "KUJ465XC", "KUJ552XC", "KUJ556XC", "BWR757XE", "KUJ550XC", "KUJ551XC", "RBC693YD", "ABJ857XV", "RBC614XD", "RBC12YL", "KUJ08XC", "ABC814XD", "ABC317XD", "RBC115XD", "KUJ285XC", "RBC704XD", "RBC705XD", "ABC315XD", "BWR776XB", "RBC96XD", "ABJ859XV", "RBC563XD", "ABC452XD", "BWR295XB", "BWR296XB", "KWL121ZY", "RBC445XD", "KWL601ZY", "RSH264XD", "KUJ504XC", "RBC879YL", "KUJ316XC", "KUJ317XC", "ABC901XD", "ABC902XD", "BWR149XB", "BWR436YL", "ABC307ZW", "ABC321ZW", "RBC532XD", "RBC707XD", "RBC709XD", "RBC711XD", "RBC712XD", "RBC710XD", "BWR262XB", "BWR263XB", "RBC872XD", "ABC820XD", "BWR651XE", "BWR99YL", "RSH810XD", "RBC121XD", "BWR279XB", "RBC759XD", "KWL835XB", "BWR402YL", "BWR135YL", "RBC802XE", "RBC218YL", "RBC176XE", "ABC720XF", "ABC721XF", "ABC722XF", "RBC173XE", "RBC527XE", "RBC174XE", "BWR405YL", "ABJ856XV", "ABJ132XB", "KWL116ZY", "KUJ288XC", "ABC849ZW", "ABC304ZY", "ABC305ZY", "BWR289XB", "BWR622XE", "ABC302ZY", "BWR860YL", "ABC417XF", "ABC384XF", "RBC535XD", "BWR144XB", "ABC364XD", "RBC246XC", "RSH653XC", "RBC497XD", "KUJ783XC", "RBC364YL", "BWR240XB", "BWR19XB", "KUJ218XC", "KUJ216XC", "KUJ217XC", "RSH947XD", "RSH948XD", "ABC458XD", "KWL661XB", "RBC368XD", "ABC181XF", "BWR139XE", "ABC67XF", "RBC897XC", "ABC61XD", "ABC665XF", "BWR971XE", "BWR701YL", "BWR699YL", "KWL781XB", "ABC357XD", "ABC359XD", "ABC360XD", "KUJ453XC", "KUJ455XC", "ABC453XD", "KUJ145XC"]
            )->select('vehno', 'id')
            ->get();
        foreach ($account as  $value) {
            $sql =   DB::table('vehicle_details_vms')
                ->where('vehno', $value->vehno)
                ->update([
                    'accountOfficer' => "Beta@teamenvio.com",
                ]);
        }
        // Group C
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                "vehno",
                ["ABC579ZW", "BWR818XE", "ABJ538XB", "BWR972XE", "ABJ855XV", "RBC411XD", "RBC412XD", "RBC383XF", "ABC418XF", "RSH439XD", "KUJ618XC", "KUJ619XC", "KUJ621XC", "KUJ622XC", "KWL388XB", "RBC85YL", "RBC498XD", "BWR544XE", "RSH991XD", "BWR829XE", "ABJ856XE", "RSH995XD", "RSH996XD", "RSH997XD", "RSH998XD", "ABC884ZY", "ABJ977XV", "KUJ503XC", "GWA211YL", "RBC570XD", "KWL382XB", "BWR232XB", "KUJ225XC", "RBC443XD", "RSH746XD", "ABC93ZW", "RBC309XD", "KUJ785XC", "BWR931XE", "RSH267XD", "RBC904YD", "KUJ508XC", "BWR406YL", "RSH934XC", "ABC354XD", "BWR649XE", "RSH613XC", "ABJ869XV", "RSH554XD", "RSH556XD", "ABC455XD", "ABJ57XB", "RBC728XD", "ABC356XD", "BWR370XB", "KUJ782XC", "RBC878YL", "RSH238XD", "RSH801XD", "KUJ10XC", "RSH479XD", "ABC460ZW", "ABC351XD", "RBC336YD", "RBC977YD", "RBC123XD", "BWR104XB", "KUJ223XC", "RSH481XD", "BWR147XB", "ABJ83XB", "ABJ84XB", "ABJ81XB", "ABJ82XB", "ABC746ZW", "ABC811XD", "BWR475XB", "RBC390YD", "MNA475ZY", "KWL379XB", "ABJ943XB", "BWR399XB", "ABJ133XB", "RBC981XD", "BWR616XE", "RBC495XD", "RBC499XD", "RBC757XD", "KWL450ZY", "KWL452ZY", "BWR48XE", "BWR49XE", "KWL780XB", "ABJ838XV", "GWA583YL", "KUJ510XC", "BWR973XE", "KUJ781XC", "RSH172XD", "BWR168XB", "RBC312XC", "GWA229YL", "GWA787YL", "KUJ06XC", "KUJ09XC", "BWR440XB", "BWR821XE", "RSH805XD", "RSH156XD", "BWR427XE", "ABJ858XV", "RSH159XD", "RSH748XD", "RSH749XD", "KUJ830XC", "BWR408YL", "RBC252YD", "ABC739ZY", "RSH232XD", "ABC506ZY", "BWR705YL", "GWA19YL", "RBC706XD", "RBC92YL", "RBC93YL", "KUJ625XC", "KUJ320XC", "KWL384XB", "KUJ284XC", "RSH142XD", "RBC580XD", "KWL391XB", "RSH738XD", "BWR822XE", "KWL786XB", "BWR655XB", "BWR656XB", "BWR657XB", "BWR660XB", "BWR661XB", "BWR659XB", "ABJ854XV", "KUJ862XC", "RSH863XD", "KUJ286XC", "KUJ821XC", "KUJ820XC", "RBC566XD", "RBC567XD", "RBC568XD", "BWR731XE", "ABC310ZW", "BWR943XB", "RSH564XD", "RSH563XD", "RBC901XD", "BWR46XB", "RBC346XD", "ABC956XB", "ABC745ZY", "BWR425XE", "BWR264XB", "KWL993XB", "RSH803XD", "RSH804XD", "BWR942XB", "RBC496XD", "RBC528XD", "RSH40XD", "BWR472XB", "BWR941XB", "BWR590XB", "BWR237XB", "BWR238XB"]
            )->select('vehno', 'id')
            ->get();
        foreach ($account as  $value) {
            $sql =   DB::table('vehicle_details_vms')
                ->where('vehno', $value->vehno)
                ->update([
                    'accountOfficer' => "Omega@teamenvio.com",
                ]);
        }
    }



    public function assignAccountOfficer2()
    {
        // FRAnk
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                "vehno",
                ["RBC867XD", "ABC669ZW", "ABC670ZW", "RSH940XC", "KWL581XB", "KWL52XB", "ABJ239XV", "KUJ798XC", "BWR609XB", "KWL376XB", "BWR657XE", "RBC225YD", "ABC671XF", "ABC738ZY", "BWR441XB", "BWR380XB", "BWR423XE", "BWR424XE", "BWR422XE", "KUJ287XC", "RSH551XD", "RBC688XC", "RBC690XC", "BWR702YL", "KWL779XB", "ABJ131XB", "ABJ537XB", "ABJ942XB", "RBC518XD", "ABC361XD", "RBC452YL", "RBC865XD", "BWR20XB", "RSH994XD", "RSH141XD", "RSH557XD", "RSH559XD", "RSH558XD", "BWR265XB", "KUJ454XC", "KUJ460XC", "RSH477XD", "BWR620XE", "RBC313YL", "RSH983XC", "RSH561XD", "KUJ115XC", "BWR655XE", "KWL422ZY", "RSH861XD", "ABC303ZY", "KUJ461XC", "BWR881XE", "RBC902XD", "KUJ224XC", "BWR703YL", "KWL831XB", "RBC101YL", "RBC448YL", "ABJ243XV", "ABC810XD", "ABJ835XV", "RBC870XD", "RBC871XD", "RSH234XD", "RBC868XD", "KUJ360XC", "RSH76XD", "BWR239XB", "RSH109XD", "RSH110XD", "BWR861YL", "RBC880YL", "KUJ219XC", "ABC783XD", "KWL995XB", "RBC565XD", "KUJ315XC", "KUJ464XC", "BWR704YL", "BWR856YL", "BWR857YL", "KWL373XB", "KUJ502XC", "GWA376YL", "BWR288XB", "RBC307XD", "ABC384XF"]
            )->select('vehno', 'id')
            ->get();

        foreach ($account as  $value) {
            $sql =   DB::table('vehicle_details_vms')
                ->where('vehno', $value->vehno)
                ->update([
                    'accountOfficer' => "frank@teamenvio.com",
                ]);
        }

        // solomon
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                'vehno',
                [
                    "KWL450ZY", "KWL452ZY", "BWR48XE", "BWR49XE", "KWL780XB", "ABJ838XV", "GWA583YL", "KUJ510XC", "BWR973XE", "KUJ781XC", "RSH172XD", "BWR168XB", "RBC312XC", "GWA229YL", "GWA787YL", "KUJ06XC", "KUJ09XC", "BWR440XB", "BWR821XE", "RSH805XD", "RSH156XD", "BWR427XE", "ABJ858XV", "RSH159XD", "RSH748XD", "RSH749XD", "KUJ830XC", "BWR408YL", "RBC252YD", "ABC739ZY", "RSH232XD", "ABC506ZY", "BWR705YL", "GWA19YL", "RBC706XD", "RBC92YL", "RBC93YL", "KUJ625XC", "KUJ320XC", "KWL384XB", "KUJ284XC", "RSH142XD", "RBC580XD", "KWL391XB", "RSH738XD", "BWR822XE", "KWL786XB", "BWR655XB", "BWR656XB", "BWR657XB", "BWR660XB", "BWR661XB", "BWR659XB", "ABJ854XV", "KUJ862XC", "RSH863XD", "KUJ286XC", "KUJ821XC", "KUJ820XC", "RBC566XD", "RBC567XD", "RBC568XD", "BWR731XE", "ABC310ZW", "BWR943XB", "RSH564XD", "RSH563XD", "RBC901XD", "BWR46XB", "RBC346XD", "ABC956XB", "ABC745ZY", "BWR425XE", "BWR264XB", "KWL993XB", "RSH803XD", "RSH804XD", "BWR942XB", "RBC496XD", "RBC528XD", "RSH40XD", "BWR472XB", "BWR941XB", "BWR590XB", "BWR237XB", "BWR238XB"
                ]
            )->select('vehno', 'id')
            ->get();

        foreach ($account as  $value) {
            DB::table('vehicle_details_vms')
                ->where('id', $value->id)
                ->update([
                    'accountOfficer' => "solomonstevens8@gmail.com",
                ]);
        }

        // Joshua
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                'vehno',
                [
                    "BWR818XE", "ABJ538XB", "BWR972XE", "ABJ855XV", "RBC411XD", "RBC412XD", "RBC383XF", "ABC418XF", "RSH439XD", "KUJ618XC", "KUJ619XC", "KUJ621XC", "KUJ622XC", "KWL388XB", "RBC85YL", "RBC498XD", "BWR544XE", "RSH991XD", "BWR829XE", "ABJ856XE", "RSH995XD", "RSH996XD", "RSH997XD", "RSH998XD", "ABC884ZY", "ABJ977XV", "KUJ503XC", "GWA211YL", "RBC570XD", "KWL382XB", "BWR232XB", "KUJ225XC", "RBC443XD", "RSH746XD", "ABC93ZW", "RBC309XD", "KUJ785XC", "BWR931XE", "RSH267XD", "RBC904YD", "KUJ508XC", "BWR406YL", "RSH934XC", "ABC354XD", "BWR649XE", "RSH613XC", "ABJ869XV", "RSH554XD", "RSH556XD", "ABC455XD", "ABJ57XB", "RBC728XD", "ABC356XD", "BWR370XB", "KUJ782XC", "RBC878YL", "RSH238XD", "RSH801XD", "KUJ10XC", "RSH479XD", "ABC460ZW", "ABC351XD", "RBC336YD", "RBC977YD", "RBC123XD", "BWR104XB", "KUJ223XC", "RSH481XD", "BWR147XB", "ABJ83XB", "ABJ84XB", "ABJ81XB", "ABJ82XB", "ABC746ZW", "ABC811XD", "BWR475XB", "RBC390YD", "MNA475ZY", "KWL379XB", "ABJ943XB", "BWR399XB", "ABJ133XB", "RBC981XD", "BWR616XE", "RBC495XD", "RBC499XD"
                ]
            )->select('vehno', 'id')
            ->get();

        foreach ($account as  $value) {
            DB::table('vehicle_details_vms')
                ->where('id', $value->id)
                ->update([
                    'accountOfficer' => "Joshua@teamenvio.com",
                ]);
        }

        // Kelly
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                'vehno',
                [
                    "RBC879YL", "KUJ316XC", "KUJ317XC", "ABC901XD", "ABC902XD", "BWR149XB", "BWR436YL", "ABC307ZW", "ABC321ZW", "RBC532XD", "RBC707XD", "RBC709XD", "RBC711XD", "RBC712XD", "RBC710XD", "BWR262XB", "BWR263XB", "RBC872XD", "ABC820XD", "BWR651XE", "BWR99YL", "RSH810XD", "RBC121XD", "BWR279XB", "RBC759XD", "KWL835XB", "BWR402YL", "BWR135YL", "RBC802XE", "RBC218YL", "RBC176XE", "ABC720XF", "ABC721XF", "ABC722XF", "RBC173XE", "RBC527XE", "RBC174XE", "BWR405YL", "ABJ856XV", "ABJ132XB", "KWL116ZY", "KUJ288XC", "ABC849ZW", "ABC304ZY", "ABC305ZY", "BWR289XB", "BWR622XE", "ABC302ZY", "BWR860YL", "ABC417XF", "ABC384XF", "RBC535XD", "BWR144XB", "ABC364XD", "RBC246XC", "RSH653XC", "RBC497XD", "KUJ783XC", "RBC364YL", "BWR240XB", "BWR19XB", "KUJ218XC", "KUJ216XC", "KUJ217XC", "RSH947XD", "RSH948XD", "ABC458XD", "KWL661XB", "RBC368XD", "ABC181XF", "BWR139XE", "ABC67XF", "RBC897XC", "ABC61XD", "ABC665XF", "BWR971XE", "BWR701YL", "BWR699YL", "KWL781XB", "ABC357XD", "ABC359XD", "ABC360XD", "KUJ453XC", "KUJ455XC", "ABC453XD", "KUJ145XC"
                ]
            )->select('vehno', 'id')
            ->get();

        foreach ($account as  $value) {
            DB::table('vehicle_details_vms')
                ->where('id', $value->id)
                ->update([
                    'accountOfficer' => "Knwabundo@gmail.com",
                ]);
        }

        // Ayomide
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                'vehno',
                ["ABC567ZW", "BWR974XE", "BWR294XB", "KUJ745XC", "ABC819XD", "RBC787YD", "ABJ237XV", "ABJ240XV", "GWA238YL", "ABC672XF", "RSH656XD", "ABC83ZW", "BWR373XB", "BWR474XB", "RBC983XD", "BWR442XB", "RBC533XD", "BWR473XB", "KWL834XB", "RBC561XD", "RBC562XD", "RBC91YD", "ABC365XD", "KWL785XB", "KUJ509XC", "BWR435YL", "ABC429ZY", "KUJ620XC", "RBC984XD", "ABC818XD", "ABC314XD", "ABC313XD", "BWR403YL", "BWR404YL", "BRW650XE", "BWR658XE", "BWR282XE", "ABJ134XB", "ABC536XD", "KUJ950XC", "RSH898XC", "RSH899XC", "RSH750XD", "KWL787XB", "BWR148XB", "RBC344YL", "RSH139XD", "RSH963XD", "KUJ120XC", "BWR501XE", "ABC72ZW", "BWR480XB", "RBC565YD", "ABC312XD", "ABJ492XV", "RBC217YL", "KWL833XB", "KUJ465XC", "KUJ552XC", "KUJ556XC", "BWR757XE", "KUJ550XC", "KUJ551XC", "RBC693YD", "ABJ857XV", "RBC614XD", "RBC12YL", "KUJ08XC", "ABC814XD", "ABC317XD", "RBC115XD", "KUJ285XC", "RBC704XD", "RBC705XD", "ABC315XD", "BWR776XB", "RBC96XD", "ABJ859XV", "RBC563XD", "ABC452XD", "BWR295XB", "BWR296XB", "KWL121ZY", "RBC445XD", "KWL601ZY", "RSH264XD"]
            )->select('vehno', 'id')
            ->get();

        foreach ($account as  $value) {
            DB::table('vehicle_details_vms')
                ->where('id', $value->id)
                ->update([
                    'accountOfficer' => "ayomideolaoluwa19@gmail.com",
                ]);
        }

        // Jemila
        $account = DB::table('vehicle_details_vms')
            ->whereIn(
                'vehno',
                ["BWR47XE", "ABC07ZY", "KUJ784XC", "KUJ319XC", "ABC802XD", "ABC803XD", "ABC804XD", "RBC758XD", "KWL386XB", "BWR261XB", "BWR945XB", "KUJ746XC", "KUJ749XC", "KUJ507XC", "KWL832XB", "BWR280XB", "ABC22XD", "ABC23XD", "BWR615XE", "KUJ221XC", "BWR668XB", "KWL660XB", "BWR143XB", "RSH562XD", "RSH480XD", "KUJ451XC", "KUJ452XC", "KUJ831XC", "RSH854XD", "RSH425XD", "BWR768YL", "RBC229YL", "RBC530XE", "RBC531XE", "BWR710YL", "ABC457XD", "KUJ915XC", "RSH992XD", "KWL892XB", "RBC451YL", "ABC454XD", "BWR816XE", "BWR817XE", "BWR819XE", "RSH989XD", "RSH862XD", "RSH654XD", "KWL385XB", "BWR858YL", "BWR859YL", "BWR696YL", "BWR697YL", "BWR698YL", "BWR767YL", "ABC79ZY", "KUJ780XC", "RBC703XD", "RSH807XD", "RSH806XD", "BWR145XB", "KUJ501XC", "KUJ990XC", "RBC305XD", "BWR48XB", "RSH397XC", "KWL783XB", "RBC369XD", "RBC370XD", "BWR150XB", "BWR18XB", "KUJ459XC", "KWL389XB", "KWL390XB", "ABJ988XB", "KUJ744XC", "KWL387XB", "KWL802XB", "RBC982XD", "ABC816XD", "RSH233XD", "ABJ332XV", "RSH235XD", "RSH236XD", "RBC529XD", "RSH552XD", "RBC530XD", "KUJ750XC", "RSH553XD"]
            )->select('vehno', 'id')
            ->get();

        foreach ($account as  $value) {
            DB::table('vehicle_details_vms')
                ->where('id', $value->id)
                ->update([
                    'accountOfficer' => "jemilatu25@gmail.com",
                ]);
        }
    }
}
