<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Auth;


class VehicleMgtController extends Controller
{
    public function sql2()
    {
        return  DB::connection('mysql_2');
    }


    //   public function __construct() {
    //         $this->middleware( 'auth' );
    //     }



    private function maptiller()
    {
        $result = DB::table('api_details')
            ->where('name', 'maptiller')
            ->select('api_key')
            ->first();
        return  $result->api_key;
    }
    public function getFleet()
    {
        if (Auth()->user()->user_type == 'SUPER') {
            $vehicle = DB::table('vehicle_details_vms')
                ->leftjoin('car_fleet', 'car_fleet.vehiclePlateNo', 'vehicle_details_vms.vehno')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'vehicle_details_vms.vehno')
                ->orderBy('vehicle_details_vms.createtime', 'Desc')
                ->select('vehicle_details_vms.*', 'vehicle_status.offlineStatus', 'vehicle_status.Dtstatus',  'vehicle_status.time',  'vehicle_status.address', 'car_fleet.package')
                ->get();

            foreach ($vehicle  as  $item) {
                echo "  
                    <tr>
                        <td> <input type='checkbox' class='check' /></td>
                        <td>
                            <a
                                href=\"route('operational', ['plate' => $item->vehno ?? 'unknow']) \"> $item->vehno</a>
                        </td>

                        <td> $item->brandname </td>

                        <td>" . $item->bodytypename ?? 'unknow' . "</td>";

                echo "<td>" . number_format($item->todayMiles ?? 0 / 1000);
                echo " KM</td>";

                if ($item->offlineStatus == 'Offline') {
                    echo "<td> <div class='text text-danger'>Offline</div> </td>";
                } else {
                    echo "<td> <div class='text text-success'>Online</div> </td>";
                }

                if ($item->Dtstatus == '0') {
                    echo "<td> <div class='text text-danger'>off</div> </td>";
                } else {
                    echo "<td> <div class='text text-success'>On</div> </td>";
                }


                echo "<td>" . \Carbon\Carbon::parse($item->time)->format('d-m-Y h:i a');
                "</td>";

                if ($item->status == '0') {
                    echo "<td> Available </td>";
                } elseif ($item->status == '1') {
                    echo "<td> Disabled </td>";
                } elseif ($item->status == '2') {
                    echo "<td> Rental </td>";
                } else {
                    echo "<td> Hire Purchase </td>";
                }

                echo "<td>" . $item->address . "</td>";
                echo "</tr>";
            }
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            if (count($fle) < 1) {
                Auth::logout();
                return redirect()->route('login')->with('Emessage', 'You have not been assign to a fleet, Please Contact Admin');
            }
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }

            $vehicle = DB::table('vehicle_details_vms')
                ->whereIn('vehicle_details_vms.vehno', $fleet)
                ->leftjoin('car_fleet', 'car_fleet.vehiclePlateNo', 'vehicle_details_vms.vehno')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'vehicle_details_vms.vehno')
                ->orderBy('vehicle_details_vms.createtime', 'Desc')
                ->select('vehicle_details_vms.*', 'vehicle_status.offlineStatus', 'vehicle_status.Dtstatus',  'vehicle_status.time',  'vehicle_status.address', 'car_fleet.package')
                ->get();
        }
    }
    public function index()
    {
        if (Auth()->user()->user_type == 'SUPER') {
            $users = DB::table('vehicle_details_vms')->select(DB::raw('COUNT(*) as count'))
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vehicle_details_vms')->select(DB::raw('Month(createtime) as month'))
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');
            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] = $users[$index];
            }
            $datas = array_reverse($datas);
            array_pop($datas);
            $datas = array_reverse($datas);

            // dd( $datas );

            $vehicle = DB::table('vehicle_details_vms')
                ->leftjoin('car_fleet', 'car_fleet.vehiclePlateNo', 'vehicle_details_vms.vehno')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'vehicle_details_vms.vehno')
                ->orderBy('vehicle_details_vms.createtime', 'Desc')
                ->select('vehicle_details_vms.*', 'vehicle_status.offlineStatus', 'vehicle_status.Dtstatus',  'vehicle_status.time',  'vehicle_status.address', 'car_fleet.package')
                ->get();

            // dd( $vehicle );
            // $status = DB::table( 'vehicle_status' )
            // ->leftjoin( 'car_fleet', 'car_fleet.vehiclePlateNo', 'vehicle_status.vehno' )->get();
            $nodriver = DB::table('vehicle_details_vms')->whereNull('drivername')->count();
            $totalMiles = DB::table('vehicle_status')->sum('miles');
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            // dd(Auth()->user()->email);
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            if (count($vehno) < 1) {
                Auth::logout();
                return redirect()->route('login')->with('Emessage', 'You have not been assign to a fleet, Please Contact Admin');
            }

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            // dd($vehnos);

            $users = DB::table('vehicle_details_vms')->select(DB::raw('COUNT(*) as count'))
                ->whereIn('vehno', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vehicle_details_vms')->select(DB::raw('Month(createtime) as month'))
                ->whereIn('vehno', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] = $users[$index];
            }
            $datas = array_reverse($datas);
            array_pop($datas);
            $datas = array_reverse($datas);
            $vehicle = DB::table('vehicle_details_vms')
                ->whereIn('vehicle_details_vms.vehno', $fleet)
                ->leftjoin('car_fleet', 'car_fleet.vehiclePlateNo', 'vehicle_details_vms.vehno')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'vehicle_details_vms.vehno')
                ->orderBy('vehicle_details_vms.createtime', 'Desc')
                ->select('vehicle_details_vms.*', 'vehicle_status.offlineStatus', 'vehicle_status.Dtstatus',  'vehicle_status.time',  'vehicle_status.address', 'car_fleet.package')
                ->get();
            $nodriver = DB::table('vehicle_details_vms')->whereIn('vehno', $fleet)->whereNull('drivername')->count();
            $totalMiles = DB::table('vehicle_status')->whereIn('vehno', $fleet)->sum('miles');
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            if (count($fle) < 1) {
                Auth::logout();
                return redirect()->route('login')->with('Emessage', 'You have not been assign to a fleet, Please Contact Admin');
            }
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            $users = DB::table('vehicle_details_vms')->select(DB::raw('COUNT(*) as count'))
                ->whereIn('bodytypename', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vehicle_details_vms')->select(DB::raw('Month(createtime) as month'))
                ->whereIn('bodytypename', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] = $users[$index];
            }
            $datas = array_reverse($datas);
            array_pop($datas);
            $datas = array_reverse($datas);
            $vehicle = DB::table('vehicle_details_vms')
                ->whereIn('bodytypename', $fleet)
                ->leftjoin('car_fleet', 'car_fleet.vehiclePlateNo', 'vehicle_details_vms.vehno')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'vehicle_details_vms.vehno')
                ->orderBy('vehicle_details_vms.createtime', 'Desc')
                ->select('vehicle_details_vms.*', 'vehicle_status.offlineStatus', 'vehicle_status.Dtstatus',  'vehicle_status.time',  'vehicle_status.address', 'car_fleet.package')
                ->get();
            $nodriver = DB::table('vehicle_details_vms')->whereIn('bodytypename', $fleet)->whereNull('drivername')->count();
            $totalMiles = DB::table('vehicle_status')->whereIn('fleet', $fleet)->sum('miles');
        }
        // fetch vehicle types
        $vehicletype = DB::table('vehicle_details_vms')->distinct('bodytypename')->select('bodytypename')->get();
        // fetch users type
        $users = DB::table('zeususers')->where('user_type', 'Fleet Operator')->get();
        // dd($vehicle);
        return view('vehicle-management', ['data' => $datas, 'vehicletype' => $vehicletype, 'users' => $users, 'noDriver' => $nodriver,  'allVehicle' => $vehicle, 'totalMiles' => $totalMiles]);
    }

    public function addVehicle()
    {
        $sql2 = DB::connection('mysql_2');

        // $students = json_decode( file_get_contents( storage_path() . 'public/assets//cars.json' ), true );

        if (Auth()->user()->user_type == 'SUPER') {
            $vehicleOwner = DB::table('users')->where('category', 'investor')->get();
            $fleet = DB::table('vehicle_details_vms')->distinct('bodytypename')->select('bodytypename')->get();
            $service = DB::table('service_center')->get();
        } else {
            // $vehicleOwner = DB::table('users')->where('creator_id', Auth()->user()->id)->get();
            $vehicleOwner = DB::table('users')->where('creator_id', Auth()->user()->id)->get();
            // $fleet = DB::table('fleet')->where('creator_id', Auth()->user()->id)->get();
            $fleet = DB::table('vehicle_details_vms')->distinct('bodytypename')->select('bodytypename')->get();
            $service = DB::table('service_center')->where('creator_id', Auth()->user()->id)->get();
        }

        return view('add-vehicle', ['vehicleOwner' => $vehicleOwner, 'fleet' => $fleet, 'service' => $service]);
    }

    public function vehicleInfomation()
    {
        return view('vehicle-information');
    }

    public function addVehicle2(Request $request)
    {
        $sql2 = DB::connection('mysql_2');
        // dd($request->all());
        if (DB::table('car_fleet')->where('vehiclePlateNo', $request->plate)->exists()) {
            toast('Plate Number already exist', 'error');
            return back()->with("Emessage", "Plate Number already exist");
        }

        $arr = array(
            'userId' =>  $request->vehicleOwner,
            'model' =>  $request->model,
            'vehiclePlateNo' =>  $request->plate,
            'chasis' =>  $request->chasis,
            'year' => $request->year,
            'body' => $request->body,
            'colour' => $request->color,
            'engine' => $request->capacity,
            'transmission' => $request->transmission,
            'type' => $request->fleet,
            'body' => $request->type,
            'package' => $request->package,
            'location' => $request->location,
            'created_at' => now(),
        );

        // dd($arr);

        if (isset($request->frontImage)) {
            // dd("HEll");
            $lo = 'Cars/';
            $filename = $this->upload($request, 'frontImage', $lo);
            $frontImage =  url('') . "/" . $lo . strtolower($filename);
            $arr = $arr + array('front' => $frontImage);
            //   array_push($arr,'front', $frontImage);
        } else {
            $arr = $arr + array('front' => "https://test.mygarage.africa/car2.png");
        }
        if (isset($request->interiorImage)) {
            $lo = 'Cars/';
            $filename = $this->upload($request, 'interiorImage', $lo);
            $interiorImage =  url('') . "/" . $lo . strtolower($filename);
            $arr = $arr + array('interior' => $interiorImage);
        } else {
            $arr = $arr + array('interior' => "https://test.mygarage.africa/car2.png");
        }
        if (isset($request->backImage)) {
            $lo = 'Cars/';
            $filename = $this->upload($request, 'backImage', $lo);
            $backImage =  url('') . "/" . $lo . strtolower($filename);
            $arr = $arr + array('back' => $backImage);
        } else {
            $arr = $arr + array('back' => "https://test.mygarage.africa/car2.png");
        }
        if (isset($request->diagonalImage)) {
            $lo = 'Cars/';
            $filename = $this->upload($request, 'diagonalImage', $lo);
            $diagonalImage =  url('') . "/" . $lo .  strtolower($filename);
            $arr = $arr + array('diagonal' =>  $diagonalImage);
        } else {
            $arr = $arr + array('diagonal' => "https://test.mygarage.africa/car2.png");
        }
        // dd($arr);
        if (DB::table('car_fleet')->where('vehiclePlateNo', $request->vehno)->exists()) {
            // dd($diagonalImage);
            $sql  = DB::table('car_fleet')
                ->where('vehiclePlateNo', $request->vehno)
                ->update($arr);
            toast('Successful Added', 'success');

            return back()->with("success", "successful added");
        } else {
            $arr = $arr + array('vehiclePlateNo' => $request->vehno, 'created_at' => now(),);
            $sql  = DB::table('car_fleet')->insert($arr);
            toast('Successful Added', 'success');

            return back()->with("success", "successful updated");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vehicleProfile()
    {
        return view('vehicle-profile');
    }
    public function create()
    {
        //
    }

    public function fleetOperatorPermission($id)
    {
        $userType = DB::table('user_type')
            ->where("user_type_id", $id)
            ->first();
        $menu = json_decode($userType->menu);

        $fleet_management = json_decode($userType->fleet_management);
        $payment_commision = json_decode($userType->payment_commision);
        $finance_wallet = json_decode($userType->finance_wallet);
        $report_activity = json_decode($userType->report_activity);
        // dd($fleet_management);
        return view('fleet-operator-permissions', ['menu' => $menu, 'user' => $userType, 'payment_commision' => $payment_commision, 'fleet_management' => $fleet_management, 'finance_wallet' => $finance_wallet, 'report_activity' => $report_activity]);
    }



    public function operational($plate)
    {

        $vehicle = DB::table('vehicle_details_vms')->where('vehno', $plate)->first();
        // dd($vehicle);
        $phone = $vehicle->driverphone;
        // if(!empty($phone)){
        // $phone = substr($phone, 1);
        $grantor = DB::table('gurantors_info')->where('plate_number', $plate)
            // ->orWhere('Driver_PHONE', $phone)
            ->first();
        // }else{
        //     $grantor = "";
        // }
        // dd($grantor);

        // $driverInfo = $this->sql2()->table( 'users' )->where( 'phone', $phone )->first();
        // $investorInfo = $this->sql2()->table( 'users' )->where( 'phone', $vehicle->investorphonenumber )->first()
        $investorInfo = (new VMSAPI)->getInvestorInfo($vehicle->investorphonenumber);
        $driverDetails = (new VMSAPI)->getDriverInfo($phone);
        $vehicleDetails = (new VMSAPI)->getVehicleRecord($plate);

        // dd($vehicleDetails);

        if ($vehicleDetails == null) {
            toast('Couldnt Fetch Vehicle Details', 'error');
            return back()->with('error', "Couldnt Fetch Vehicle Details");
        }
        if ($vehicleDetails->Data->systemno == null) {
            toast('Couldnt Fetch Vehicle Details', 'error');

            return back()->with('error', "Couldnt Fetch Vehicle Details");
        }

        $getBill = (new VMSAPI)->get_pay_bill($plate);
        $recentPayment = (new VMSAPI)->get_vehicle_recent_payment($plate);

        $leasePay = 0;
        $installment = 0;
        $pay;
        if (!empty($getBill->Data->leasePay)) {
            $pay = $getBill->Data->leasePay;
            foreach ($getBill->Data->leasePay as $value) {
                $leasePay =  $value->needpayment + $leasePay;
            }
        }
        if (!empty($getBill->Data->installment)) {

            $pay = $getBill->Data->installment;

            foreach ($getBill->Data->installment as $value) {
                $installment =  $value->needpayment + $installment;
            }
        }
        // dd($vehicleDetails);
        if (!empty($vehicleDetails)) {
            $vehicleLocation = (new VMSAPI)->getVehiclePosition($vehicleDetails->Data->systemno);
        }

        $car_fleet = $this->sql2()->table('car_fleet')->where('vehiclePlateNo', $plate)->first();
        $allVehicle = DB::table('vehicle_details_vms')->where('vehno', $plate)->first();
        // $mangement = $this->sql2()->table( 'users' )->where( 'phone', $phone )->first();
        $payments = DB::table('vms_payments')->where('vehno', $plate)->orderBy('createtime', 'DESC')->get();



        $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
            ->where('vehno', $plate)
            ->whereYear('createtime', date('Y'))
            ->groupBy(DB::raw('Month(createtime)'))
            ->pluck('count');
        $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
            ->where('vehno', $plate)
            ->whereYear('createtime', date('Y'))
            ->groupBy(DB::raw('Month(createtime)'))
            ->pluck('month');
        $transactionChart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $transactionChart[$month] = $users[$index];
        }

        $transactionChart = array_reverse($transactionChart);
        array_pop($transactionChart);
        $transactionChart = array_reverse($transactionChart);

        // dd($transactionChart);

        // dd($vehicleLocation);
        $latitude = $vehicleLocation->Data[0]->Latitude ?? "";
        $longitude = $vehicleLocation->Data[0]->Longitude ?? "";


        if ($latitude != 0.0 || $latitude != "") {
            $res =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $longitude . ',' . $latitude . '.json?key=' . $this->maptiller());
            if ($res == null) {
                $placeAddress = "not available";
                $label = "-";
            } else {
                // dd($res);
                if (!empty($res->features)) {
                    $label = $res->features[0]->place_name;
                } else {
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
            'driverDetail' => (!empty($driverDetails)) ? $driverDetails->Data : 'null',
            'driverInfo' => (!empty($driverInfo)) ? $driverInfo : 'null',
            'vehicleDetails' => (!empty($vehicleDetails)) ? $vehicleDetails->Data : 'null',
            'vehicleLocation' =>   $vehicleLocation->Data[0] ?? 'null',
            'investorInfo' => (!empty($investorInfo)) ? $investorInfo->Data : 'null',
            'garantor' => (!empty($grantor)) ? $grantor : 'null',
            'location' => (!empty($label)) ? $label : 'null',
            'carFleet' => (!empty($car_fleet)) ? $car_fleet : 'null',
            'totalPayment' => $leasePay + $installment ?? 'null',
            'recentPayment' => (!empty($recentPayment)) ? $recentPayment->Data : 'null',
            'payments' =>   $payments  ?? 'null',
            'pay' =>   $pay  ?? [],
        );

        // dd($result);
        if (Auth()->user()->user_type == 'SUPER') {
            $driver = DB::table('users')->where('category', 'Driver')->get();
            // $fleet = DB::table('fleet')->get();
            $fleet = DB::table('vehicle_details_vms')->distinct('bodytypename')->select('bodytypename')->get();
            $service = DB::table('service_center')->get();
        } else {
            $driver = DB::table('users')->where('creator_id', Auth()->user()->id)->get();
            // $fleet = DB::table('fleet')->where('creator_id', Auth()->user()->id)->get();
            $fleet = DB::table('vehicle_details_vms')->distinct('bodytypename')->select('bodytypename')->get();

            $service = DB::table('service_center')->where('creator_id', Auth()->user()->id)->get();
        }

        $cars = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->where('vehicle_status.vehno', $plate)->get();

        $cars3 = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();
        // $cars3 = DB::table('vms_payments')join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();
        // dd($cars);

        $single = 'single';
        return view('operational-data', ['chart' => $transactionChart, 'driver' => $driver, 'service' => $service, 'fleet' => $fleet, 'data' => $result, 'cars' => $cars, 'cars3' => $cars3,  'single' => $single]);
    }

    public function createFleet(Request $request)
    {
        // dd($request->all());

        $vehicle = DB::table('fleet')
            ->where(['fleet_name' => $request->name, 'assigned_to' => $request->fleet])
            ->exists();

        if (!$vehicle) {
            try {
                DB::table('fleet')->insert([
                    'creator_id' => Auth()->user()->id,
                    'fleet_name' => $request->name,
                    'fleet_type' => $request->name,
                    'assigned_to' => $request->fleet,
                    'status' => '1',
                    'created_at' => now()

                ]);
                return back()->with('success', "Successful");
            } catch (\Throwable $th) {
                return back()->with('Emessaage', "Failed");
            }
        } else {
            return back()->with('Emessaage', "REcord Already exist");
        }
    }

    public function assignFleet(Request $request)
    {
        // dd($request->all())/;

        foreach ($request->name as  $value) {
            DB::table('fleet')->insert([
                'creator_id' => Auth()->user()->id,
                'fleet_name' => $value,
                'fleet_type' => $value,
                'assigned_to' => $request->fleet,
                'status' => '1',
                'created_at' => now()

            ]);
        }
        toast('You\'ve Successfully Updated ', 'success');

        return back()->with('success', 'Successful');
    }

    public function UnAssignFleet($id)
    {
        // dd( $id );
        if (DB::table('fleet')->where('fleet_id', $id)->delete()) {
            toast('You\'ve Successfully Deleted', 'success');
            return back()->with('success', 'Successful');
        } else {
            return back()->with('Emessaage', 'REcord Already exist');
        }
    }

    public function updatefleet(Request $request)
    {
        // dd($request->all());
        $sql2 = DB::connection('mysql_2');
        $arr = array(
            'model' =>  $request->model,
            'year' => $request->year,
            'body' => $request->body,
            'colour' => $request->color,
            'engine' => $request->engine,
            'transmission' => $request->transmission,
            // 'updated_at' => now(),
        );

        if (isset($request->frontImage)) {
            $lo = 'Cars/';
            $filename = $this->upload($request, 'frontImage', $lo);
            $frontImage =  url('') . "/" . $lo . strtolower($filename);
            $arr = $arr + array('front' => $frontImage);
            //   array_push($arr,'front', $frontImage);
        }
        if (isset($request->interiorImage)) {
            $lo = 'Cars/';
            $filename = $this->upload($request, 'interiorImage', $lo);
            $interiorImage =  url('') . "/" . $lo . strtolower($filename);
            $arr = $arr + array('interior' => $interiorImage);
        }
        if (isset($request->backImage)) {
            $lo = 'Cars/';
            $filename = $this->upload($request, 'backImage', $lo);
            $backImage =  url('') . "/" . $lo . strtolower($filename);
            $arr = $arr + array('back' => $backImage);
        }
        if (isset($request->diagonalImage)) {
            $lo = 'Cars/';
            $filename = $this->upload($request, 'diagonalImage', $lo);
            $diagonalImage =  url('') . "/" . $lo .  strtolower($filename);
            $arr = $arr + array('diagonal' =>  $diagonalImage);
        }
        // dd($arr);
        if (DB::table('car_fleet')->where('vehiclePlateNo', $request->vehno)->exists()) {
            // dd($arr);
            $sql  = DB::table('car_fleet')
                ->where('vehiclePlateNo', $request->vehno)
                ->update($arr);
        } else {
            // dd($arr);

            $arr = $arr + array('vehiclePlateNo' => $request->vehno, 'created_at' => now());
            $sql  = DB::table('car_fleet')->insert($arr);
        }



        if ($sql) {
            toast('You\'ve Successfully Deleted', 'success');

            return back()->with('success', 'Successful');
        } else {
            return back()->with('Emessaage', 'REcord Already exist');
        }
    }
    public static function upload(Request $request, $file, $location)
    {
        $file = $request->file($file);
        $filename = time() . '_' . $file->getClientOriginalName();
        // File extension
        $extension = $file->getClientOriginalExtension();
        // File upload location
        $locate = $location;
        // Upload file
        $file->move($location, strtolower($filename));
        // File path
        $filepath = url($location . $filename);
        return $filename;
    }

    public function motorCard()
    {
        $sql  = DB::table('vehicle_status')->get();

        return view('motor-card', ['car' => $sql]);
    }

    public function motorCardUser($plate, $phone, $reference)
    {
        $user = DB::table('users')->where('phone', $phone)->first();
        $vehicle = DB::table('vehicle_details_vms')
            ->join('car_fleet', 'car_fleet.vehiclePlateNo', "vehicle_details_vms.vehno")
            ->where('vehno', $plate)->first();
        $loan = DB::table('loan_history')->where('vehiclePlateNo', $plate)->get();
        $lastloan = $loan->last();
        if (!$loan) {
            $loan = "Null";
            // toast("Cannot Locate Loan", "error");
            // return back()->with('failed', "Cannot Locate Loan");
        }
        return view('motor-card-user', ['user' => $user, 'vehicle' => $vehicle, 'loan' => $loan, 'lastLoan' => $lastloan]);
    }
}
