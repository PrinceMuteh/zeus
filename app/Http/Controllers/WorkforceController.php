<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Zeususer;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




class WorkforceController extends Controller
{


    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);
        $user = DB::table('workforce_users')->where('email', $request->email)->first();
        // return Hash::check($request->password, $user->password);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        // Auth::loginUsingId( $user->id );
        // $token = auth()->user()->createToken('my-app-token')->plainTextToken;
        $response = [
            'status' => 'success',
            'user' => $user,
            // 'token' => $token
        ];
        return response($response, 200);
    }
    public function getuserDetails(Request $request)
    {  
          $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = DB::table('workforce_users')->where('email', $request->email)->first();
        $fleets =  DB::table('car_fleet')->where('userid', $user->id)->get();
        $result = DB::table('users')->where('accountOfficer', $request->email)->get();
        $pendingVehicle = $result->where('status' != 'Completed')->count();
          $response = [
            'status' => 'success',
            'totalAccount' => count($result),
            'pendingVehicle' => $pendingVehicle,
            'fleet' => count($fleets),
            'user' => $user,
        ];
        return response($response, 200);
    }
    public function getReceipt($id)
    {
        $result = DB::table('workforce_receipt')->where('agentId', $id)->get();
          $response = [
            'status' => 'success',
            'data' => $result,
        ];
        return response($response, 200);
    }
    
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'newPassword' => 'required|string|min:6',
            'currentPassword' => 'required|string|min:6'
        ]);
        $user = DB::table('workforce_users')->where('email', $request->email)->first();
        
        if (!$user) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        if (!Hash::check($request->currentPassword, $user->password)) {
            $response = [
            'message' => 'Current password is not correct.'
            ];
            return response($response, 422);
        }
        
        $password = Hash::make($request->newPassword);
        $user = DB::table('workforce_users')->update(['password' => $password]);
        $response = [
            'status' => 'success',
            'user' => $user,
        ];
        return response($response, 200);
    }

    public function updateBank(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'bankName' => 'required|string|min:6',
            'accountName' => 'required|string',
            'accountNumber' => 'required|numeric',
        ]);
        $user = DB::table('workforce_users')->where('email', $request->email)->first();
        if (!$user) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
      $result =  DB::table('workforce_users')->where('email', $request->email)->update([
            'bankName' => $request->bankName,
            'accountName' => $request->accountName,
            'accountNumber' => $request->accountNumber,
            'sortCode' => $request->sortCode ?? "",
        ]);

        $response = [
            'status' => 'success',
            'message' => $result,
        ];
        return response($response, 200);
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = DB::table('workforce_users')->where('email', $request->email)->first();
        if (!$user) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        DB::table('workforce_users')->where('email', $request->email)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
        ]);
        $response = [
            'status' => 'success',
            'user' => $user->email,
        ];
        return response($response, 200);
    }
    
    
    public function getRegisteredAccount(Request $request){
        $result = DB::table('users')->where('accountOfficer', $request->email)->get();
        return response([
            'status' => 'success',
            'body' => $result,
            'total' => count($result),
            
        ], 200);
        // ->join("car_fleet", "users.id", "car_fleet.userId")

    }
    
    public function getAccountUsers(Request $request){
        return DB::table('car_fleet')->where('userId', $request->id)->get();
    }
    
    
    public function registerAccount(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|max:255',
            'officerEmail' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|numeric',
            'city' => 'required',
        ]);
        
       $user = DB::table('users')->insertGetId([
            'name' =>  $request->firstName. ' ' . $request->lastName,
            'phone' => $request->phone,
            'accountOfficer' => $request->officerEmail,
            'email' => $request->email,
            'gender' => $request->gender ?? "",
            'town' => $request->city,
            'password' => "0000",
            'password2' => Hash::make("0000"),
            'created_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),
            'updated_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),
            'category' => "Investor",
            'username' => strtolower($request->firstName. $request->lastName)
             ]);
        $response = [
            'status' => 'success',
            'userId' => $user,
        ];
        return response($response, 200);
    }
    
    public function registerAccount2(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'plate' => 'required',
            'type' => 'required',
            'model' => 'required',
            'year' => 'required',
            'engine' => 'required',
            'trasmission' => 'required',
            'color' => 'required',
            'id' => 'required',
        ]);
        
           $car = DB::table('car_fleet')->insertGetId([
            'userId' => $request->id,
            'vehiclePlateNo' => $request->plate,
            'type' => $request->type,
            'responsiblity' => "Driver",
            'model' => $request->model,
            'chasis' => $request->chasis,
            'year' => $request->year,
            'body' => $request->body,
            'engine' => $request->engine,
            'colour' => $request->color,
            'transmission' => $request->trasmission,
            'status' => "Pending",
            'created_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),
            'updated_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),
           ]);
        
        $response = [
            'status' => 'success',
            'car' => $car,
        ];

        return response($response, 200);
    }
    public function registerAccount3(Request $request)
    {
        $email = $request->email;
        
        if(isset($request->Front)){
            $file = $request->file("Front");
            $table = "front";
        }
        if(isset($request->Back)){
            $file = $request->file("Back");
            $table = "back";
        }
        if(isset($request->Interior)){
            $file = $request->file("Interior");
            $table = "interior";
        }
        if(isset($request->Diagonal)){
            $file = $request->file("Diagonal");
            $table = "diagonal";
        }
       
        
        //   $utilityImage =  $this->uploadImage($file);
        $location = 'DriverUpload/';
        // $file = $request->file($file);
        $filename = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move($location, strtolower($filename));
        $filepath = url($location . $filename);
        $utilityImage =  url('') . "/" . $location . strtolower($filename);
        
        $result =     DB::table('car_fleet')->where('vehiclePlateNo', $request->plate)->update([
            strtolower($table) => $utilityImage,
            ]);
        if($result){
                 return response( [
                'status' => 'success',
                'message' => "File Upload Success",
                ], 200);
        }
       
        return response( [
             'status' => 'failed',
             'message' => "An Error Occured",
            ], 422);
    }
    public function registerAccount4(Request $request)
    {
        $request->validate([
            'agentEmail' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'plate' => 'required',
            'vehicleValue' => 'required',
            'package' => 'required',
            'remittanceAmount' => 'required',
            'securityDeposite' => 'required',
            'serviceCenter' => 'required',
            'paymentCycle' => 'required',
            'leaseTerm' => 'required',
            'inspectionDatePeriod' => 'required',
            'inspectionDateTime' => 'required',
        ]);
        
        // $serviceCenter = DB::table("service_center")->where('center_id', $request->serviceCenter)->first();
        $serviceCenter = DB::table("service_center")->where('center_id', 1)->first();
        
          $car = DB::table('car_fleet')->where('vehiclePlateNo', $request->plate)->update([
            'vehicle_value' => $request->vehicleValue,
            'paymentMode' => $request->paymentCycle,
            'remittanceAmount' => $request->remittanceAmount,
            'package' => $request->package,
            'serviceCentreId' => $request->serviceCenter,
            'serviceCentreName' => $serviceCenter->center_name,
            'serviceCentreAddress' => $serviceCenter->center_location
          ]);
           
          $ref = Rand(000000000,9999999999);
          $veh = DB::table("car_fleet")->where('vehiclePlateNo', $request->plate)->first();
          $agent = DB::table("workforce_users")->where('email', $request->agentEmail)->first();
        
          $comm = ($agent->commission / 100) * $request->amount;
           
          $receipt = DB::table('workforce_receipt')->insertGetId([
            'ticketId' => 'tk/'.Rand(0000,9999),
            'plate' => $request->plate,
            'creator' => $agent->name,
            'agentId' => $agent->id,
            'amount' => $request->amount,
            'paymentStatus' => "pending",
            'agentCommission' => $agent->commission,
            'carfleetId' => $veh->id,
            'userId' => $veh->userId,
            'bonusEarned' => "0",
            'activation' => $request->amount,
            'commissedEarned' => $comm,
            'description' => $request->description,
            'reference' => $ref,
            'created_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),
            'updated_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),      
          ]);
          
           $receipt = DB::table('workforce_receipt')->where('id', $receipt)->first();

        $response = [
            'status' => 'success',
            // 'useriD' => $user,
            'receipt' => $receipt,
        ];

        return response($response, 200);
    }
    
    
    
    
    public function step1profile(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'dob' => 'required',
            'city' => 'required|min:3',
            'address' => 'required|min:3',
            
        ]);
           $time = Carbon::parse($request->dob)->format('Y-m-d');

        $user = DB::table("workforce_users")->where('email',$request->email)->update([
            'name' => $request->firstName . " " . $request->lastName,
            'address' => $request->address,
            'phone' => $request->phone,
            'town' => $request->city,
            'country' => $request->country,
            'dob' => $time,
            'updated_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),
            ]);
            
            if($user){
                    $response = [
                        'status' => 'success',
                    ];
                    return response($response, 200);
            }else{
                $response = [
                        'status' => 'success',
                    ];
                    return response($response, 200);
                
            }
    }
    public function step2profile(Request $request)
    {
        
        if(isset($request->primaryCert)){
           $primary =  $this->uploadImage($request->primaryCert);
        }
        if(isset($request->secondaryCert)){
           $secondary =  $this->uploadImage($request->secondaryCert);
        }
        if(isset($request->universityCert)){
           $university =  $this->uploadImage($request->universityCert);
        }
            $user = DB::table("workforce_users")->where('email',$request->email)->update([
                'primaryname' => $request->primaryname ?? "",
                'secondaryname' => $request->secondaryname ?? "",
                'universityname' => $request->universityname ?? "",
                'primaryCity' => $request->primaryCity ?? "",
                'secondaryCity' => $request->secondaryCity ?? "",
                'universityCity' => $request->universityCity ?? "",
                'primaryCert' => $primary ?? "",
                'secondaryCert' => $secondary ?? "",
                'universityCert' => $university ?? "",
                'updated_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),
            ]);
            if($user){
                    $response = [
                        'status' => 'success',
                        'useriD' => $user,
                    ];
                    return response($response, 200);
            }else{
                $response = [
                        'status' => 'success',
                        'message' => $user,
                    ];
                    return response($response, 200);
                
            }
    }
    
    public function step7skills(Request $request)
    {

            $user = DB::table("workforce_users")->where('email', $request->email)->update([
                'accountName' => $request->AccountName,
                'bankName' => $request->BankName,
                'accountNumber' => $request->AccountNumber,
                'otherDetails' => $request->myjson,
                'hobby' => $request->hobby,
                'skills' => $request->skills,
                'updated_at' =>  Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString(),
            ]);
            
            if($user){
                    $response = [
                        'status' => 'success',
                    ];
                    return response($response, 200);
            }else{
                $response = [
                        'status' => 'success',
                        'message' => $user,
                    ];
                    return response($response, 200);
                
            }
    }
    
      public function uploadImage($file)
    {
        $location = 'uploads/';
        $filename = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move($location, strtolower($filename));
        $filepath = url($location . $filename);
        return $utilityImage =  url('') . "/" . $location . strtolower($filename);
        
        // if (isset($image)) {
        //     $base64_string = $image;
        //     $outputfile =  'https://' . $_SERVER[ 'SERVER_NAME' ] . $_SERVER[ 'REQUEST_URI' ]. "uploads/".rand(00000000,99999999).".jpg";
        //     //save as image.jpg in uploads/ folder
        //     $filehandler = fopen($outputfile, 'wb');
        //     fwrite($filehandler, base64_decode($base64_string));
        //     fclose($filehandler);
        //     return $outputfile;
        // } else {
        //     $return["error"] = true;
        //     $return["msg"] =  "No image is submited.";
        // }
    }
    
    
    public function getConfig($city){
        $plan =  DB::table('workforce_plan')->get();
        $account =  DB::table('workforce_account_details')->where('city',$city)->first();
        
        $response = [
            'status' => 'success',
            'plan' => $plan,
            'account' => $account,
        ];
        return response($response, 200);
        
    }
    
    public function getEnvioAccount($city){
        return DB::table('workforce_account_details')->where('city',$city)->first();
    }
}
