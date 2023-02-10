<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendEmailJob;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd( 'hello' );
        if (Auth()->user()->user_type == 'SUPER') {
            $admin = DB::table('zeususers')->get();
            $department = DB::table('departments')->get();
            $usertype = DB::table('user_type')->get();
        } else {
            $admin = DB::table('zeususers')->where('creator_id', Auth()->user()->id)->get();
            $department = DB::table('departments')->where('user_id', Auth()->user()->id)->get();
            $usertype = DB::table('user_type')
                ->whereIn('user_type_id', ['3', '4', '5', '6', '7', '8'])
                ->get();
        }
        // dd( $usertype );
        return view('admin', ['admin' => $admin, 'depart' => $department, 'usertype' => $usertype]);
    }

    public function addAdmin()
    {
        if (Auth()->user()->user_type == 'SUPER') {

            $usertype = DB::table('user_type')
                ->where('user_type', '<>', 'Driver')
                ->where('user_type', '<>', 'Vehicle Owner')
                ->get();
        } else {
            $usertype = DB::table('user_type')
                ->whereIn('user_type_id', ['3', '4', '5', '6', '7', '8'])
                ->get();
        }

        return view('add-admin', ['usertype' => $usertype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd( $request->all() );
        $validatedData = $request->validate([
            'email' => 'required|unique:users|max:255',
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|numeric',
            'location' => 'required',
        ]);
        $result = DB::table('zeususers')->where('phone', $request->phone)->first();

        if ($result) {
            return back()->with('Emessage', 'Phone number already exist');
        }
        $menu =  array(
            'dashboard' => ($request->dashboard) ? 1 : 0,
            'userManagement' => ($request->userManagement) ? 1 : 0,
            'vehicleManagement' => ($request->vehicleManagement) ? 1 : 0,
            'technicalDesk' => ($request->technicalDesk) ? 1 : 0,
            'financeOffice' => ($request->financeOffice) ? 1 : 0,
            'accountfficer' => ($request->accountfficer) ? 1 : 0,
            'activityLog' => ($request->activityLog) ? 1 : 0,
            'taskManagement' => ($request->taskManagement) ? 1 : 0,
            'workShop' => ($request->workShop) ? 1 : 0,
            'reportModule' => ($request->reportModule) ? 1 : 0,
            'adminOffice' => ($request->adminOffice) ? 1 : 0,
            'controlPanel' => ($request->controlPanel) ? 1 : 0,
        );

        // dd( $menu );
        $result = DB::table('user_type')->where('user_type_id', $request->usertype)
            ->select('user_type', 'total_users')->first();
        // dd( $result );
        $id = DB::table('zeususers')->insertGetId([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->location,
            'user_type' => $result->user_type,
            'user_type_id' => $request->usertype,
            'menu_permission' => json_encode($menu),
            'password' => Hash::make(0000),
            'created_at' => now(),
        ]);
        if ($id) {
             DB::table('user_type')
                                ->where('user_type_id', $request->usertype)
                                ->update([
                                    'total_users' => $result->total_users + 1,
                                    'updated_at' => now(),
                                ]);
              $mail =   ( new MailerController )->userEmail( $request->email,  $request->usertype , $id, $result->user_type);
                if($mail){
                            // dispatch(new SendEmailJob($request->email, $result->user_type, $request->usertype, $id));
                           return back()->with('Emessage', 'User Added success and Email Sent'); 
                }
            
        
            return back()->with('success', 'User Added success But email is not sent');
        } else {
            return back()->with('Emessage', 'An Error Occured While Adding User');
        }
    }
}
