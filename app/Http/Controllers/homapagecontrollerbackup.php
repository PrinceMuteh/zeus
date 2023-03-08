<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function sql2()
    {
        return  DB::connection('mysql_2');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct() {
    //     $this->middleware( 'guest' )->except( 'logout' );
    //     dd( Auth::user() );
    //     $userType = DB::table( 'user_type' )
    //     ->where( 'user_type_id', auth()->user()->user_type_id )
    //     ->first();
    //     // dd( $userType );
    //     $menu = json_decode( $userType->menu );
    //     Auth::user()->setAttribute( 'menu', $menu );
    // }

    public function index()
    {

        if (Auth()->user()->user_type == 'SUPER' || Auth()->user()->user_type == 'Workshop Administrator' ) {
            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');

            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] = $users[$index];
            }
            $datas = array_reverse($datas);
            array_pop($datas);
            $datas = array_reverse($datas);

            // dd( $datas );
            // echo array_pop( $datas );

            $totalvehicle = DB::table('vehicle_details_vms')->get();
            $nodriver = $totalvehicle->whereNull('drivername');
            // dd( $nodriver );
            $totalusers = DB::table('users')->get();
            $transaction = DB::table('vms_payments')->get();

            $totalTransaction = DB::table('vms_payments')->get();

            // dd( $totalTransaction );

        } else if (Auth()->user()->user_type == 'accountOfficer') {
            // dd(Auth()->user()->email);
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            if (count($vehno) < 1) {
                Auth::logout();
                return redirect()->route('login')->with('Emessage', 'You have not been assign to a fleet, Please Contact Admin');
            }

            foreach ($vehno as $key => $value) {
                $vehnos[] = $value->vehno;
            }
            
            // dd($vehnos);

            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereIn('vehno', $vehnos)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');

            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereIn('vehno', $vehnos)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] =  $users[$index];
            }

            $datas = array_reverse($datas);
            array_pop($datas);
            $datas = array_reverse($datas);

            // dd( $datas );
            // $totalvehicle = DB::table('vehicle_details_vms')->whereIn('veho', $fleet)->get();
            $totalvehicle =  $vehno;
            $nodriver = $totalvehicle->whereNull('drivername');

            // $totalusers = 0;
            $totalusers = DB::table('users')->where('accountOfficer', Auth()->user()->user_type)->get();

            // $totalusers = DB::table('vms_payments')->whereIn('vehno', $vehnos)->get();
            $transaction = DB::table('vms_payments')->whereIn('vehno', $vehnos)->get();
            $totalTransaction =    $transaction;
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();

            if (count($fle) < 1) {
                Auth::logout();
                return redirect()->route('login')->with('Emessage', 'You have not been assign to a fleet, Please Contact Admin');
            }

            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }

            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereIn('fleet', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');

            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereIn('fleet', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] =  $users[$index];
            }

            $datas = array_reverse($datas);
            array_pop($datas);
            $datas = array_reverse($datas);

            // dd( $datas );
            $totalvehicle = DB::table('vehicle_details_vms')->whereIn('bodytypename', $fleet)->get();
            $nodriver = $totalvehicle->whereNull('drivername');
            $totalusers = DB::table('users')->whereIn('fleet', $fleet)->get();
            $transaction = DB::table('vms_payments')
                ->whereIn('fleet', $fleet)
                ->get();
            $totalTransaction = DB::table('vms_payments')
                ->whereIn('fleet', $fleet)
                ->get();
        }

        // dd( auth()->user()->menu_permission );
        return view('home', ['totalTransaction' => $totalTransaction, 'transaction' => $transaction, 'datas' => $datas, 'totalVehicle' => $totalvehicle, 'totalUsers' => $totalusers, 'nodriver' => $nodriver]);
    }

    public function user($phone)
    {
        // dd( $phone );

        $user = DB::table('users')->where('phone', $phone)->first();
        // dd($user);
        if($user ==  null){
            toast('Driver not found','error');
           return redirect()->back();
        }
        
        $acctDetails =  (new OnePipeController)->getBalance($user->id);
        
        // dd($user);
        // if ( $user->category == 'Driver' ) {
        $record = DB::table('vehicle_details_vms')->where('driverPhone', $phone)->first();
        if ($record) {
            $gurantor = DB::table('gurantors_info')->where('plate_number', $record->vehno)->first();
        } else {
            $record = DB::table('vehicle_details_vms')->where('investorphonenumber', $phone)->first();
            if ($record) {
                $gurantor = DB::table('gurantors_info')->where('plate_number', $record->vehno)->first();
            } else {
                $gurantor = DB::table('gurantors_info')->where('Driver_PHONE', $user->phone)->first();
                if (!$gurantor) {
                    $gurantor = DB::table('gurantors_info')->where('Driver_PHONE', $user->phone)->first();
                }
            }
        }
        // }

        // if ( $user->category == 'Driver' ) {
        //     $record = DB::table( 'vehicle_details_vms' )->where( 'driverPhone', $phone )->first();
        //     dd( $record );
        //     if ( $record ) {
        //         $gurantor = DB::table( 'gurantors_info' )->where( 'plate_number', $record->vehno )->first();
        //     } else {
        //         $gurantor = DB::table( 'gurantors_info' )->where( 'Driver_PHONE', $user->phone )->first();
        //     }
        //     // dd( $gurantor );
        // } else {
        //     $record = DB::table( 'vehicle_details_vms' )->where( 'investorphonenumber', $phone )->first();
        //     if ( $record ) {
        //         $gurantor = DB::table( 'gurantors_info' )->where( 'plate_number', $record->vehno )->first();
        //     } else {
        //         $gurantor = DB::table( 'gurantors_info' )->where( 'Driver_PHONE', $user->phone )->first();
        //     }
        // }
        // dd( $gurantor );
        $allVehicle = DB::table('vehicle_details_vms')->whereNull('drivername')->get();
        // dd( $gurantor );
        return view('user', ['phone' => $phone, 'user' =>  $acctDetails['user'], 'acctBal' =>  $acctDetails['balance'], 'bank'=>$acctDetails['bank'], 'gurantor' => $gurantor, 'allVehicle' => $allVehicle]);
    }

    public function editUserAccount(Request $request)
    {
        // dd( $request->all() );
        // DB::table('users')
        //     ->where('email', $request->email)->delete();


        $content = array(
            'email' =>  $request->email,
            'name' =>  $request->name,
            'phone' =>  $request->phone,
            'category' => $request->category,
            'town' =>  $request->town,
            'address' =>  $request->address,
            'nin' =>  $request->nin,
            'dob' =>  $request->dob
        );
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://test.mygarage.africa/api/edit-user-record',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS =>  $content,
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);
        // if ($ == 1) {
        $response =  DB::table('users')
            ->where('email', $request->email)
            ->update([
                // 'name' => $request->name,
                // 'phone' => $request->phone,
                // 'town' => $request->town,
                // 'gender' => $request->gender,
                // 'category' => $request->category,
                // 'address' => $request->address,
                // 'nin' => $request->nin,
                // 'dob' => $request->dob,
                'updated_at' =>  now(),
            ]);
        if ($response) {
            return back()->with('success', 'Profile updated');
        } else {
            return back()->with('Emessage', 'An Error Occured');
        }
    }

    // public function users() {
    //     $response = Http::get( 'http://test.mygarage.africa/api/user-record' );

    //     $users = json_decode( $response->body() );

    //     return response()->json( $users );
    // }

}


