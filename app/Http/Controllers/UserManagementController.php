<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Auth;
use Alert;
use Exception;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('user-management');
    }

    public function getGurantor($plate)
    {
        // dd( $plate );
        return view('getGurantor', ['plate' =>  $plate]);
    }

    public function uploadGurantor(Request $request)
    {
        // dd( $request->all() );
        $gurantor = DB::table('gurantors_info')
            // ->where( 'id', $request->id )
            ->insert([
                'plate_number' =>  $request->plate,
                'Driver_FIRST_NAME' =>  $request->Driver_FIRST_NAME,
                'Driver_LAST_NAME' =>  $request->Driver_LAST_NAME,
                'Driver_ALTERNATIVE_PHONE' =>  $request->Driver_ALTERNATIVE_PHONE,
                'Driver_ADDRESS' =>  $request->Driver_ADDRESS,
                'Driver_PHONE' =>  $request->Driver_PHONE,
                'Driver_EMAIL' =>  $request->Driver_EMAIL,
                'RELATIVE_PHONE' =>  $request->RELATIVE_PHONE,
                'RELATIVE_NAME' =>  $request->RELATIVE_NAME,
                'RELATIVE_ALTERNATIVE_PHONE' =>  $request->RELATIVE_ALTERNATIVE_PHONE,
                'RELATIVE_ADDRESS' =>  $request->RELATIVE_ADDRESS,
                'REFRENCES_PHONE' =>  $request->REFRENCES_PHONE,
                'REFRENCES_NAME' =>  $request->REFRENCES_NAME,
                'REFRENCES_RELATIONSHIP' =>  $request->REFRENCES_RELATIONSHIP,
                'REFRENCES_COMPANY' =>  $request->REFRENCES_COMPANY,
                'REFRENCES2_PHONE' =>  $request->REFRENCES2_PHONE,
                'REFRENCES2_NAME' =>  $request->REFRENCES2_NAME,
                'REFRENCES2_RELATIONSHIP' =>  $request->REFRENCES2_RELATIONSHIP,
                'REFRENCES2_ADDRESS' =>  $request->REFRENCES2_ADDRESS,
                'GUARANTOR_PHONE' =>  $request->GUARANTOR_PHONE,
                'GUARANTOR_NAME' =>  $request->GUARANTOR_NAME,
                'GUARANTOR_EMAIL' =>  $request->GUARANTOR_EMAIL,
                'GUARANTOR_COMPANY' =>  $request->GUARANTOR_COMPANY,
                'GUARANTOR_LEVEL' =>  $request->GUARANTOR_LEVEL,
                'GUARANTOR_ADDRESS' =>  $request->GUARANTOR_ADDRESS,
                'GUARANTOR_COMPANY_ADDRESS' =>  $request->GUARANTOR_COMPANY_ADDRESS,
                'GUARANTOR2_PHONE' =>  $request->GUARANTOR2_PHONE,
                'GUARANTOR2_NAME' =>  $request->GUARANTOR2_NAME,
                'GUARANTOR2_EMAIL' =>  $request->GUARANTOR2_EMAIL,
                'GUARANTOR2_COMPANY' =>  $request->GUARANTOR2_COMPANY,
                'GUARANTOR2_LEVEL' =>  $request->GUARANTOR2_LEVEL,
                'GUARANTOR2_ADDRESS' =>  $request->GUARANTOR2_ADDRESS,
                'GUARANTOR2_COMPANY_ADDRESS' =>  $request->GUARANTOR2_COMPANY_ADDRESS,
            ]);
        if ($gurantor) {
            Alert::toast('You\'ve Successfully Created ', 'success');
            return back()->with('success', 'Successful');
        } else {
            Alert::toast('An Error occured', 'failed');
            return back()->with('Emessage', 'Successful');
        }
    }



    public function updateConfiguration(Request $request)
    {
        // dd($request->all());
        $check = DB::table('car_fleet')
            ->where('vehiclePlateNo', $request->plate)->exists();
        if ($check) {
            $gurantor = DB::table('car_fleet')
                ->where('vehiclePlateNo', $request->plate)
                ->update([
                    'owner_comm' =>  $request->owner_comm,
                    'platform_comm' =>  $request->plat_comm,
                    'fleet_op_comm' =>  $request->fleet_comm,
                    'maintenace_comm' =>  $request->maintenance_comm,
                    'paymentMode' =>  $request->repayment,
                    'initial_deposite' =>  $request->deposite,
                    // 'start_date' =>  $request->start_date,
                    'coupon' =>  $request->coupon,
                ]);

            $driver = DB::table('user_management')->where('id', $request->driver)->first();
            $gurantor = DB::table('all_vehicle')
                ->where('vehno', $request->plate)
                ->update([
                    'drivername' =>  $driver->name,
                    'driverphone' =>  $driver->phone,
                    'driveremail' =>  $driver->email,
                ]);
            Alert::toast('You\'ve Successfully Updated ', 'success');
            return back()->with('success', 'Successful');
        } else {
            dd('none');
            // if ( $gurantor ) {
            //     Alert::toast( 'You\'ve Successfully Updated ', 'success' );
            //     return back()->with( 'success', 'Successful' );
            // } else {
            Alert::toast('An Error occured', 'failed');
            return back()->with('Emessage', 'Successful');
            // }

        }

        // dd( $driver );

    }

    public function addUser()
    {
        if (Auth()->user()->user_type == 'SUPER') {
            $type = DB::table('user_type')->get();
        } else {
            $type = DB::table('user_type')->whereIn('user_type', ['Vehicle Owner', 'Driver', 'Workshop Administrator'])
                ->get();
        }
        return view('add-user', ['type' => $type]);
    }

    public function userInfo()
    {
        return view('user-information');
    }

    public function userProfile()
    {
        return view('user-profile');
    }

    public function accountPermissions()
    {
        return view('account-permissions');
    }

    public function gurantors()
    {
        $gurantors = DB::table('gurantors_info')->get();
        return view('gurantors', compact('gurantors'));
    }

    public function editGurantor($id)
    {
        $gurantor = DB::table('gurantors_info')->where('id', $id)->first();
        // dd($gurantor);

        return view('editGurantor', compact('gurantor'));
    }

    public function updateGurantor(Request $request)
    {
        // dd( $request->all() );



        if ($request->id == 0) {

            $gurantor = DB::table('gurantors_info')
                // ->where( 'id', $request->id )
                ->insert([
                    'plate_number' =>  $request->plate_number,
                    'Driver_FIRST_NAME' =>  $request->Driver_FIRST_NAME,
                    'Driver_LAST_NAME' =>  $request->Driver_LAST_NAME,
                    'Driver_ALTERNATIVE_PHONE' =>  $request->Driver_ALTERNATIVE_PHONE,
                    'Driver_ADDRESS' =>  $request->Driver_ADDRESS,
                    'Driver_PHONE' =>  $request->Driver_PHONE,
                    'Driver_EMAIL' =>  $request->Driver_EMAIL,
                    'RELATIVE_PHONE' =>  $request->RELATIVE_PHONE,
                    'RELATIVE_NAME' =>  $request->RELATIVE_NAME,
                    'RELATIVE_ALTERNATIVE_PHONE' =>  $request->RELATIVE_ALTERNATIVE_PHONE,
                    'RELATIVE_ADDRESS' =>  $request->RELATIVE_ADDRESS,
                    'REFRENCES_PHONE' =>  $request->REFRENCES_PHONE,
                    'REFRENCES_NAME' =>  $request->REFRENCES_NAME,
                    'REFRENCES_RELATIONSHIP' =>  $request->REFRENCES_RELATIONSHIP,
                    'REFRENCES_COMPANY' =>  $request->REFRENCES_COMPANY,
                    'REFRENCES2_PHONE' =>  $request->REFRENCES2_PHONE,
                    'REFRENCES2_NAME' =>  $request->REFRENCES2_NAME,
                    'REFRENCES2_RELATIONSHIP' =>  $request->REFRENCES2_RELATIONSHIP,
                    'REFRENCES2_ADDRESS' =>  $request->REFRENCES2_ADDRESS,
                    'GUARANTOR_PHONE' =>  $request->GUARANTOR_PHONE,
                    'GUARANTOR_NAME' =>  $request->GUARANTOR_NAME,
                    'GUARANTOR_COMPANY' =>  $request->GUARANTOR_COMPANY,
                    'GUARANTOR_LEVEL' =>  $request->GUARANTOR_LEVEL,
                    'GUARANTOR_ADDRESS' =>  $request->GUARANTOR_ADDRESS,
                    'GUARANTOR_COMPANY_ADDRESS' =>  $request->GUARANTOR_COMPANY_ADDRESS,
                    'GUARANTOR2_PHONE' =>  $request->GUARANTOR2_PHONE,
                    'GUARANTOR2_NAME' =>  $request->GUARANTOR2_NAME,
                    'GUARANTOR2_COMPANY' =>  $request->GUARANTOR2_COMPANY,
                    'GUARANTOR2_LEVEL' =>  $request->GUARANTOR2_LEVEL,
                    'GUARANTOR2_ADDRESS' =>  $request->GUARANTOR2_ADDRESS,
                    'GUARANTOR2_COMPANY_ADDRESS' =>  $request->GUARANTOR2_COMPANY_ADDRESS,
                ]);

            $gurantor = DB::table('all_vehicle')
                ->where('vehno', $request->plate_number)
                ->update([
                    // 'driverid' => $request->driverid,
                    'drivername' => $request->Driver_FIRST_NAME . ' ' .  $request->Driver_LAST_NAME,
                    'driverphone' => $request->Driver_PHONE,
                    'driveremail' => $request->Driver_EMAIL,
                ]);
        } else {
            // dd( $request->id );
            // try {
            //write your codes here
            // ->get();
            // dd( $gurantor );

            $gurantor = DB::table('gurantors_info')
                ->where('id', $request->id)
                ->update([
                    'Driver_PHONE' =>  $request->Driver_PHONE,
                    'Driver_FIRST_NAME' =>  $request->Driver_FIRST_NAME,
                    'Driver_LAST_NAME' =>  $request->Driver_LAST_NAME,
                    'Driver_ALTERNATIVE_PHONE' =>  $request->Driver_ALTERNATIVE_PHONE,
                    'Driver_ADDRESS' =>  $request->Driver_ADDRESS,
                    'Driver_PHONE' =>  $request->Driver_PHONE,
                    'Driver_EMAIL' =>  $request->Driver_EMAIL,
                    'RELATIVE_PHONE' =>  $request->RELATIVE_PHONE,
                    'RELATIVE_NAME' =>  $request->RELATIVE_NAME,
                    'RELATIVE_ALTERNATIVE_PHONE' =>  $request->RELATIVE_ALTERNATIVE_PHONE,
                    'RELATIVE_ADDRESS' =>  $request->RELATIVE_ADDRESS,
                    'REFRENCES_PHONE' =>  $request->REFRENCES_PHONE,
                    'REFRENCES_NAME' =>  $request->REFRENCES_NAME,
                    'REFRENCES_RELATIONSHIP' =>  $request->REFRENCES_RELATIONSHIP,
                    'REFRENCES_COMPANY' =>  $request->REFRENCES_COMPANY,
                    'REFRENCES2_PHONE' =>  $request->REFRENCES2_PHONE,
                    'REFRENCES2_NAME' =>  $request->REFRENCES2_NAME,
                    'REFRENCES2_RELATIONSHIP' =>  $request->REFRENCES2_RELATIONSHIP,
                    'REFRENCES2_ADDRESS' =>  $request->REFRENCES2_ADDRESS,
                    'GUARANTOR_PHONE' =>  $request->GUARANTOR_PHONE,
                    'GUARANTOR_NAME' =>  $request->GUARANTOR_NAME,
                    'GUARANTOR_COMPANY' =>  $request->GUARANTOR_COMPANY,
                    'GUARANTOR_LEVEL' =>  $request->GUARANTOR_LEVEL,
                    'GUARANTOR_ADDRESS' =>  $request->GUARANTOR_ADDRESS,
                    'GUARANTOR_COMPANY_ADDRESS' =>  $request->GUARANTOR_COMPANY_ADDRESS,
                    'GUARANTOR2_PHONE' =>  $request->GUARANTOR2_PHONE,
                    'GUARANTOR2_NAME' =>  $request->GUARANTOR2_NAME,
                    'GUARANTOR2_COMPANY' =>  $request->GUARANTOR2_COMPANY,
                    'GUARANTOR2_LEVEL' =>  $request->GUARANTOR2_LEVEL,
                    'GUARANTOR2_ADDRESS' =>  $request->GUARANTOR2_ADDRESS,
                    'GUARANTOR2_COMPANY_ADDRESS' =>  $request->GUARANTOR2_COMPANY_ADDRESS
                ]);

            // } catch( Exception $e ) {
            //     dd( $e->getMessage() );
            // }

            // dd( $gurantor );
        }
        if ($gurantor) {
            Alert::toast('You\'ve Successfully Updated ', 'success');
            return back()->with('success', 'Successful');
        } else {
            Alert::toast('An Error occured', 'failed');
            return back()->with('Emessage', 'Successful');
        }

        // return view( 'editGurantor', compact( 'gurantor' ) );
    }

    public function adminInfo($id)
    {
        $users = DB::table('users')->where('id', $id)->first();
        $vehicletype = DB::table('fleet')->where('assigned_to', $id)->get();
        $fleet = DB::table('all_vehicle')->distinct('bodytypename')->select('bodytypename')->get();

        return view('admin-information', ['fleet' => $fleet, 'user' => $users, 'vehicletype' => $vehicletype]);
    }

    public function userMgt()
    {
        if (Auth()->user()->user_type == 'SUPER') {
            $users = DB::table('user_management')->get();
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            // $vehno = DB::table('all_vehicle')->where('accountOfficer', Auth()->user()->user_type)->select('vehno')->get();

            // foreach ($vehno as $key => $value) {
            //     $fleet[] = $value->vehno;
            // }
            // dd( Auth()->user()->email );
            $users = DB::table('user_management')
                ->where('accountOfficer', Auth()->user()->email)
                ->get();
                // dd($users);

        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            // dd( $fleet );
            $users = DB::table('user_management')
                ->whereIn('fleet', $fleet)
                // ->where( 'creator_id', Auth()->user()->id )
                ->get();
        }

        return view('user-management', ['users' => $users]);
    }

    public function updateProfile(Request $request)
    {
        // dd( $request->all() );
        DB::table('users')
            ->where('id', Auth()->user()->id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'address' => $request->address,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'company_name' => $request->company_name,
                'company_phone' => $request->company_phone,
                'company_email' => $request->company_email,
                'website' => $request->url,
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'sort_code' => $request->sort_code,
                'updated_at' =>  now(),
            ]);
        // Alert::success( 'Congrats', 'You\'ve Successfully Registered' );
        Alert::toast('You\'ve Successfully Updated ', 'success');
        return back()->with('success', 'Updated');
    }


    public function updateUserProfile(Request $request)
    {

        // dd( $request->all() );
        $menu =  array(
            'dashboard' => ($request->dashboard) ? 1 : 0,
            'userManagement' => ($request->userManagement) ? 1 : 0,
            'vehicleManagement' => ($request->vehicleManagement) ? 1 : 0,
            'technicalDesk' => ($request->technicalDesk) ? 1 : 0,
            'financeOffice' => ($request->financeOffice) ? 1 : 0,
            'activityLog' => ($request->activityLog) ? 1 : 0,
            'taskManagement' => ($request->taskManagement) ? 1 : 0,
            'workShop' => ($request->workShop) ? 1 : 0,
            'reportModule' => ($request->reportModule) ? 1 : 0,
            'adminOffice' => ($request->adminOffice) ? 1 : 0,
            'controlPanel' => ($request->controlPanel) ? 1 : 0,
        );

        $body = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // 'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->location,
            // 'user_type' => $result->user_type,
            // 'user_type_id' => $request->usertype,
            'menu_permission' => json_encode($menu),
            // 'password' =>Hash::make( 0000 ),
            'updated_at' =>  Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
        );

        if (isset($request->password)) {
            $password = Hash::make($request->password);
            $body = $body + array('password' => $password);
        }


        $id = DB::table('users')->where('id', $request->id)->update(
            $body
        );
        if ($id) {
            // Alert::success( 'Congrats', 'You\'ve Successfully Registered' );
            Alert::toast('You\'ve Successfully Updated ', 'success');
            return back()->with('success', 'Updated');
        } else {
            Alert::toast('You\'ve Failed to  Updat ', 'failed');
            return back()->with('success', 'Updated');
        }
    }

    public function createuser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phone' => 'required',
            'location' => 'required|string',
        ]);
        // dd( $request->all() );
        $exists = DB::table('user_management')
            ->where(['category' => $request->usertype, 'email' => $request->email])
            ->exists();

        if (!$exists) {
            $result = DB::table('user_type')->where('user_type', $request->usertype)
                ->select('user_type', 'total_users')->first();

            $id =   DB::table('user_management')
                ->where('id', Auth()->user()->id)
                ->insertGetId([
                    'creator_id' => Auth()->user()->id,
                    'name' => $request->fname . ' ' .  $request->lname,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->location,
                    'category' => ($result->user_type == 'Driver') ? 'Driver' : 'Investor',
                    'created_at' =>  now(),
                ]);

            DB::table('user_type')
                ->where('user_type', $request->usertype)
                ->update([
                    'total_users' => $result->total_users + 1,
                    'updated_at' => now(),
                ]);

            // ( new MailerController )->body();
            (new MailerController)->userEmail($result->user_type,  $request->email, $id, $request->usertype);

            // dispatch( new SendEmailJob( $request->email, $result->user_type, $request->usertype, $id ) );
            Alert::toast('You\'ve Successfully Created ', 'success');

            return back()->with('success', 'Success');
        } else {
            Alert::toast('User Already Exist ', 'Failed');

            return back()->with('Emessage', 'Email Already Exist');
        }
    }

    public function changePasswordz(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'pin' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        $ID = Crypt::decrypt($request->tok);
        // dd( $request->all() );
        $app = DB::table('users')
            ->where('user_id', $ID)
            ->update([
                'status' => '1',
                'password' => Hash::make($request->password),
                'pin' => $request->pin,
            ]);
        if ($app) {
            return redirect('/login')->with('message', 'Profile updated! Please Login');
        } else {
            return back()->with('Emessage', 'Error Updating Profile');
        }
    }
    // public function changePassword( Request $request )
    // {
    //     $id = '6434819';
    //     $pass = DB::table( 'users' )->where( [ 'user_id' => $id, 'status' => '0' ] )->first();
    //     // dd( $pass );
    //     $user_id =  Crypt::encrypt( $id );

    //     return view( '/change_password', [ 'pass' => $pass, 'id' => $user_id ] );
    // }

    public function assignPassword($id)
    {
        // $ID = Crypt::decrypt( $id );
        $ID = 4;

        dd('hello');
        $pass = DB::table('users')->where(['user_id' => $ID, 'status' => '1', 'verify' => '0'])->first();
        if ($pass) {
            $user_id =  Crypt::encrypt($ID);
            return view('/change_password', ['pass' => $pass, 'id' => $user_id]);
        } else {
            // return route( 'login' );
            return redirect('/login')->with('status', 'Profile updated! Please Login');
        }
    }
}
