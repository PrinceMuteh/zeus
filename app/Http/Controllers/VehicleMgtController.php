<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Auth;


class VehicleMgtController extends Controller {


//   public function __construct() {
//         $this->middleware( 'auth' );
//     }



    private function maptiller() {
        $result = DB::table( 'api_details' )
        ->where( 'name', 'maptiller' )
        ->select( 'api_key' )
        ->first();
        return  $result->api_key;
    }

    public function index() {
        if ( Auth()->user()->user_type == 'SUPER' ) {
            $users = DB::table( 'all_vehicle' )->select( DB::raw( 'COUNT(*) as count' ) )
            ->whereYear( 'createtime', date( 'Y' ) )
            ->groupBy( DB::raw( 'Month(createtime)' ) )
            ->pluck( 'count' );
            $months =  DB::table( 'all_vehicle' )->select( DB::raw( 'Month(createtime) as month' ) )
            ->whereYear( 'createtime', date( 'Y' ) )
            ->groupBy( DB::raw( 'Month(createtime)' ) )
            ->pluck( 'month' );
            $datas = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 );
            foreach ( $months as $index => $month ) {
                $datas[ $month ] = $users[ $index ];
            }
            $datas = array_reverse( $datas );
            array_pop( $datas );
            $datas = array_reverse( $datas );

            // dd( $datas );

            $vehicle = DB::table( 'all_vehicle' )
            ->leftjoin( 'car_fleet', 'car_fleet.vehiclePlateNo', 'all_vehicle.vehno' )
            ->leftjoin( 'vehicle_status', 'vehicle_status.vehno', 'all_vehicle.vehno' )
            ->orderBy( 'all_vehicle.createtime', 'Desc' )
            ->select( 'all_vehicle.*', 'vehicle_status.offlineStatus', 'vehicle_status.Dtstatus',  'vehicle_status.time',  'vehicle_status.address', 'car_fleet.package' )
            ->get();

            // dd( $vehicle );
            // $status = DB::table( 'vehicle_status' )
            // ->leftjoin( 'car_fleet', 'car_fleet.vehiclePlateNo', 'vehicle_status.vehno' )->get();
            $nodriver = DB::table( 'all_vehicle' )->whereNull( 'drivername' )->count();
            $totalMiles = DB::table( 'vehicle_status' )->sum( 'miles' );
        } 
        else if (Auth()->user()->user_type == 'accountOfficer') {
            // dd(Auth()->user()->email);
            $vehno = DB::table('all_vehicle')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            if (count($vehno) < 1) {
                Auth::logout();
                return redirect()->route('login')->with('Emessage', 'You have not been assign to a fleet, Please Contact Admin');
            }

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            // dd($vehnos);

            $users = DB::table( 'all_vehicle' )->select( DB::raw( 'COUNT(*) as count' ) )
            ->whereIn( 'vehno', $fleet )
            ->whereYear( 'createtime', date( 'Y' ) )
            ->groupBy( DB::raw( 'Month(createtime)' ) )
            ->pluck( 'count' );
            $months =  DB::table( 'all_vehicle' )->select( DB::raw( 'Month(createtime) as month' ) )
            ->whereIn( 'vehno', $fleet )
            ->whereYear( 'createtime', date( 'Y' ) )
            ->groupBy( DB::raw( 'Month(createtime)' ) )
            ->pluck( 'month' );

            $datas = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 );
            foreach ( $months as $index => $month ) {
                $datas[ $month ] = $users[ $index ];
            }
            $datas = array_reverse( $datas );
            array_pop( $datas );
            $datas = array_reverse( $datas );
            $vehicle = DB::table( 'all_vehicle' )
            ->whereIn( 'all_vehicle.vehno', $fleet )
            ->leftjoin( 'car_fleet', 'car_fleet.vehiclePlateNo', 'all_vehicle.vehno' )
            ->leftjoin( 'vehicle_status', 'vehicle_status.vehno', 'all_vehicle.vehno' )
            ->orderBy( 'all_vehicle.createtime', 'Desc' )
            ->select( 'all_vehicle.*', 'vehicle_status.offlineStatus', 'vehicle_status.Dtstatus',  'vehicle_status.time',  'vehicle_status.address', 'car_fleet.package' )
            ->get();
            $nodriver = DB::table( 'all_vehicle' )->whereIn( 'vehno', $fleet )->whereNull( 'drivername' )->count();
            $totalMiles = DB::table( 'vehicle_status' )->whereIn( 'vehno', $fleet )->sum( 'miles' );
        } 
        
        
        
        
        else {
            $fle = DB::table( 'fleet' )->where( 'assigned_to', Auth()->user()->id )->select( 'fleet_name' )->get();
            if ( count( $fle ) < 1 ) {
                Auth::logout();
                return redirect()->route( 'login' )->with( 'Emessage', 'You have not been assign to a fleet, Please Contact Admin' );
            }
            foreach ( $fle as $key => $value ) {
                $fleet[] = $value->fleet_name;
            }

            $users = DB::table( 'all_vehicle' )->select( DB::raw( 'COUNT(*) as count' ) )
            ->whereIn( 'bodytypename', $fleet )
            ->whereYear( 'createtime', date( 'Y' ) )
            ->groupBy( DB::raw( 'Month(createtime)' ) )
            ->pluck( 'count' );
            $months =  DB::table( 'all_vehicle' )->select( DB::raw( 'Month(createtime) as month' ) )
            ->whereIn( 'bodytypename', $fleet )
            ->whereYear( 'createtime', date( 'Y' ) )
            ->groupBy( DB::raw( 'Month(createtime)' ) )
            ->pluck( 'month' );

            $datas = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 );
            foreach ( $months as $index => $month ) {
                $datas[ $month ] = $users[ $index ];
            }
            $datas = array_reverse( $datas );
            array_pop( $datas );
            $datas = array_reverse( $datas );
            $vehicle = DB::table( 'all_vehicle' )
            ->whereIn( 'bodytypename', $fleet )
            ->leftjoin( 'car_fleet', 'car_fleet.vehiclePlateNo', 'all_vehicle.vehno' )
            ->leftjoin( 'vehicle_status', 'vehicle_status.vehno', 'all_vehicle.vehno' )
            ->orderBy( 'all_vehicle.createtime', 'Desc' )
            ->select( 'all_vehicle.*', 'vehicle_status.offlineStatus', 'vehicle_status.Dtstatus',  'vehicle_status.time',  'vehicle_status.address', 'car_fleet.package' )
            ->get();
            $nodriver = DB::table( 'all_vehicle' )->whereIn( 'bodytypename', $fleet )->whereNull( 'drivername' )->count();
            $totalMiles = DB::table( 'vehicle_status' )->whereIn( 'fleet', $fleet )->sum( 'miles' );
        }

        // fetch vehicle types
        $vehicletype = DB::table( 'all_vehicle' )->distinct( 'bodytypename' )->select( 'bodytypename' )->get();
        // fetch users type
        $users = DB::table( 'users' )->where( 'user_type', 'Fleet Operator' )->get();
        return view( 'vehicle-management', [ 'data' => $datas, 'vehicletype' => $vehicletype, 'users' => $users, 'noDriver' => $nodriver,  'allVehicle' => $vehicle, 'totalMiles' => $totalMiles ] );
    }

    public function addVehicle() {
        // $students = json_decode( file_get_contents( storage_path() . 'public/assets//cars.json' ), true );

        if ( Auth()->user()->user_type == 'SUPER' ) {
            $vehicleOwner = DB::table( 'user_management' )->where( 'category', 'investor' )->get();
            $fleet = DB::table( 'fleet' )->get();
            $service = DB::table( 'service_center' )->get();
        } else {
            $vehicleOwner = DB::table( 'user_management' )->where( 'creator_id', Auth()->user()->id )->get();
            $fleet = DB::table( 'fleet' )->where( 'creator_id', Auth()->user()->id )->get();
            $service = DB::table( 'service_center' )->where( 'creator_id', Auth()->user()->id )->get();
        }

        return view( 'add-vehicle', [ 'vehicleOwner' => $vehicleOwner, 'fleet' => $fleet, 'service' => $service ] );
    }

    public function vehicleInfomation() {
        return view( 'vehicle-information' );
    }

    public function addVehicle2( Request $request ) {
        dd( $request->all() );

        // Alert::success( 'Congrats', 'You\'ve Successfully Registered');
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function vehicleProfile(){
        return view('vehicle-profile');
    }
    public function create() {
        //
    }

    public function fleetOperatorPermission($id){
        $userType = DB::table( 'user_type' )
        ->where("user_type_id", $id)
        ->first();
        $menu = json_decode($userType->menu);

        $fleet_management = json_decode($userType->fleet_management);
        $payment_commision = json_decode($userType->payment_commision);
        $finance_wallet = json_decode($userType->finance_wallet);
        $report_activity = json_decode($userType->report_activity);
        // dd($fleet_management);
        return view('fleet-operator-permissions',[ 'menu' => $menu, 'user' => $userType, 'payment_commision' => $payment_commision, 'fleet_management' => $fleet_management, 'finance_wallet' => $finance_wallet, 'report_activity' => $report_activity ] );
    }



    public function operational( $plate ) {
          
        $vehicle = DB::table( 'all_vehicle' )->where( 'vehno', $plate )->first();
        // dd($vehicle);
        $phone = $vehicle->driverphone;
        // if(!empty($phone)){
            // $phone = substr($phone, 1);
            $grantor = DB::table( 'gurantors_info' )->where( 'plate_number', $plate )
            // ->orWhere('Driver_PHONE', $phone)
            ->first();
        // }else{
        //     $grantor = "";
        // }
        // dd($grantor);
     
        // $driverInfo = DB::table( 'user_management' )->where( 'phone', $phone )->first();
        // $investorInfo = DB::table( 'user_management' )->where( 'phone', $vehicle->investorphonenumber )->first()
        $investorInfo = ( new VMSAPI )->getInvestorInfo( $vehicle->investorphonenumber );
        $driverDetails = ( new VMSAPI )->getDriverInfo( $phone );
        $vehicleDetails = ( new VMSAPI )->getVehicleRecord( $plate );
        
        // dd($vehicleDetails);
        
        if($vehicleDetails == null){
                                Alert::toast('Couldnt Fetch Vehicle Details', 'failed' );
                     return back()->with('Emessaage', "Couldnt Fetch Vehicle Details");
            
        }
        if($vehicleDetails->Data->systemno == null){
                    Alert::toast('Couldnt Fetch Vehicle Details', 'failed' );
                     return back()->with('Emessaage', "Couldnt Fetch Vehicle Details");
            }
        
         $getBill = ( new VMSAPI )->get_pay_bill( $plate );
        $recentPayment = ( new VMSAPI )->get_vehicle_recent_payment( $plate );

        $leasePay = 0;
        $installment = 0;
        $pay;
        if ( !empty( $getBill->Data->leasePay ) ) {
            $pay = $getBill->Data->leasePay;
            foreach ( $getBill->Data->leasePay as $value ) {
                $leasePay =  $value->needpayment + $leasePay;
            }
        }
        if ( !empty( $getBill->Data->installment ) ) {
            
            $pay = $getBill->Data->installment;

            foreach ( $getBill->Data->installment as $value ) {
                $installment =  $value->needpayment + $installment;
            }
        }
        // dd($vehicleDetails);
        if ( !empty( $vehicleDetails ) ) {
            $vehicleLocation = ( new VMSAPI )->getVehiclePosition( $vehicleDetails->Data->systemno );
        }
        
        $car_fleet = DB::table( 'car_fleet' )->where( 'vehiclePlateNo', $plate )->first();
        $allVehicle = DB::table( 'all_vehicle' )->where( 'vehno', $plate )->first();
        // $mangement = DB::table( 'user_management' )->where( 'phone', $phone )->first();
        $payments = DB::table( 'vms_payments' )->where( 'vehno', $plate )->orderBy( 'createtime', 'DESC' )->get();

// dd($vehicleLocation);
        $latitude = $vehicleLocation->Data[ 0 ]->Latitude ?? "";
        $longitude = $vehicleLocation->Data[ 0 ]->Longitude ?? "";
        
        
        if ( $latitude != 0.0 || $latitude != "" ) {
                $res =  ( new ApiController )->get( 'https://api.maptiler.com/geocoding/'.$longitude.','.$latitude.'.json?key='.$this->maptiller());
            if($res == null){
                $placeAddress = "not available";
                $label = "-";
            }else{
                // dd($res);
                if(!empty($res->features)){
                    $label = $res->features[ 0 ]->place_name;
                }else{
                    $label = "-";
                }
                     
                // $placeAddress = $response->results[ 0 ]->formatted_address;
                // $label = $response->results[ 0 ]->formatted_address;
            }
        } else {
            $placeAddress = '-';
            $label = '-';
        }
        
        // return $pay;
        $result = array(
            'allVehicle' => $allVehicle ?? 'null',
            'driverDetail' => ( !empty( $driverDetails ) ) ? $driverDetails->Data : 'null',
            'driverInfo' => ( !empty( $driverInfo ) ) ? $driverInfo : 'null',
            'vehicleDetails' => ( !empty( $vehicleDetails ) ) ? $vehicleDetails->Data : 'null',
            'vehicleLocation' =>   $vehicleLocation->Data[ 0 ] ?? 'null',
            'investorInfo' => ( !empty( $investorInfo ) ) ? $investorInfo->Data : 'null',
            'garantor' => ( !empty( $grantor ) ) ? $grantor : 'null',
            'location' => ( !empty( $label ) ) ? $label : 'null',
            'carFleet' => ( !empty( $car_fleet ) ) ? $car_fleet : 'null',
            'totalPayment' => $leasePay + $installment ?? 'null',
            'recentPayment' => ( !empty( $recentPayment ) ) ? $recentPayment->Data : 'null',
            'payments' =>   $payments  ?? 'null',
            'pay' =>   $pay  ?? [],
        );

        // dd($result);
    if ( Auth()->user()->user_type == 'SUPER' ) {
            $driver = DB::table( 'user_management' )->where( 'category', 'Driver' )->get();
            $fleet = DB::table( 'fleet' )->get();
            $service = DB::table( 'service_center' )->get();
        } else {
            $driver = DB::table( 'user_management' )->where( 'creator_id', Auth()->user()->id )->get();
            $fleet = DB::table( 'fleet' )->where( 'creator_id', Auth()->user()->id )->get();
            $service = DB::table( 'service_center' )->where( 'creator_id', Auth()->user()->id )->get();
        }

           $cars = DB::table( 'vehicle_status' )->join( 'all_vehicle', 'all_vehicle.vehno', 'vehicle_status.vehno' )->where( 'vehicle_status.vehno', $plate )->get();
           
        $cars3 = DB::table( 'vehicle_status' )->join( 'all_vehicle', 'all_vehicle.vehno', 'vehicle_status.vehno' )->get()->toArray();
        // dd($cars);
        
     $single = 'single';
        return view('operational-data',[ 'driver' => $driver, 'service' => $service ,'fleet' => $fleet, 'data' => $result , 'cars' => $cars, 'cars3' => $cars3,  'single' => $single ] );
    }

    public function createFleet(Request $request){
        // dd($request->all());

        $vehicle = DB::table( 'fleet' )
        ->where([ 'fleet_name'=> $request->name , 'assigned_to' => $request->fleet   ])
        ->exists();
        
        if(!$vehicle){
            try {
                DB::table('fleet' )->insert( [
                    'creator_id' => Auth()->user()->id,
                    'fleet_name' => $request->name,
                    'fleet_type' => $request->name,
                    'assigned_to' => $request->fleet,
                    'status' => '1',
                    'created_at' => now()
                
                ] );
                return back()->with('success', "Successful");
            } catch (\Throwable $th) {
                return back()->with('Emessaage', "Failed");
            }
        }else{
            return back()->with('Emessaage', "REcord Already exist");
        }
    }

    public function assignFleet(Request $request){
// dd($request->all())/;

    foreach ($request->name as  $value) {
        DB::table('fleet' )->insert( [
            'creator_id' => Auth()->user()->id,
            'fleet_name' => $value,
            'fleet_type' => $value,
            'assigned_to' => $request->fleet,
            'status' => '1',
            'created_at' => now()
        
        ] );
    }
    Alert::toast('You\'ve Successfully Updated ', 'success' );
        return back()->with( 'success', 'Successful' );
    }

    public function UnAssignFleet( $id ) {
        // dd( $id );
        if ( DB::table( 'fleet' )->where( 'fleet_id', $id )->delete() ) {
            Alert::toast( 'You\'ve Successfully Deleted ', 'success' );
            return back()->with( 'success', 'Successful' );
        }else{
            return back()->with('Emessaage', 'REcord Already exist' );
        }

    }

    public function updatefleet(Request $request){
        // dd($request->all());

        $arr = array(
            'model' =>  $request->model,
            'year' => $request->year,
            'body' => $request->body,
            'colour' => $request->color,
            'engine' => $request->engine,
            'transmission' => $request->transmission,
            'updated_at' => now(),                
        );

        if(isset($request->frontImage)){
        $lo = 'Cars/';
      
        $filename = $this->upload($request, 'frontImage', $lo);
      
        $frontImage =  url('') . "/" . $lo . strtolower($filename);
        $arr = $arr + array('front' => $frontImage);
        //   array_push($arr,'front', $frontImage);
        }


        if(isset($request->interiorImage)){
        $lo = 'Cars/';
        $filename = $this->upload($request, 'interiorImage', $lo);
        $interiorImage =  url('') . "/" . $lo . strtolower($filename);
        $arr = $arr + array( 'interior' => $interiorImage );

        }
        if(isset($request->backImage)){
        $lo = 'Cars/';
        $filename = $this->upload($request, 'backImage', $lo);
        $backImage =  url('') . "/" . $lo . strtolower($filename);
        $arr = $arr + array( 'back' => $backImage );

        }
        if(isset($request->diagonalImage)){
        $lo = 'Cars/';
        $filename = $this->upload($request, 'diagonalImage', $lo);
        $diagonalImage =  url('') . "/" . $lo .  strtolower($filename);
        $arr = $arr + array( 'diagonal' =>  $diagonalImage);
        }

        if(DB::table( 'car_fleet' )->where( 'vehiclePlateNo', $request->vehno )->exists()){
        // dd($diagonalImage);
            $sql  = DB::table( 'car_fleet' )  
            ->where( 'vehiclePlateNo', $request->vehno )
            ->update($arr );
        }else{
        $arr = $arr + array( 'vehiclePlateNo' => $request->vehno, 'created_at' => now(),);
            $sql  = DB::table( 'car_fleet' )->insert($arr);
        }
       


        if($sql){  
        Alert::toast( 'You\'ve Successfully Updated ', 'success' );
            return back()->with( 'success', 'Successful' );
        } else {
            return back()->with( 'Emessaage', 'REcord Already exist' );
        }

    }
    public static function upload( Request $request, $file, $location )
 {
        $file = $request->file( $file );
        $filename = time() . '_' . $file->getClientOriginalName();
        // File extension
        $extension = $file->getClientOriginalExtension();
        // File upload location
        $locate = $location;
        // Upload file
        $file->move( $location, strtolower( $filename ) );
        // File path
        $filepath = url( $location . $filename );
        return $filename;
    }
}
