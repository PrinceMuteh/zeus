<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Zeususer;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class WorkforceController extends Controller
{


    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);
        $user = DB::table('zeususers')->where('email', $request->email)->first();
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
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'newPassword' => 'required|string|min:6',
            'currentPassword' => 'required|string|min:6'
        ]);
        $user = DB::table('zeususers')->where('email', $request->email)->first();
        
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
        $user = DB::table('zeususers')->update(['password' => $password]);
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
        $user = DB::table('zeususers')->where('email', $request->email)->first();
        if (!$user) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        DB::table('zeususers')->where('email', $request->email)->update([
            'bank_name' => $request->bankName,
            'account_name' => $request->accountName,
            'account_number' => $request->accountNumber,
            'sort_code' => $request->sortCode ?? "",
        ]);

        $response = [
            'status' => 'success',
            'user' => $user->email,
        ];
        return response($response, 200);
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = DB::table('zeususers')->where('email', $request->email)->first();
        if (!$user) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        DB::table('zeususers')->where('email', $request->email)->update([
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

    public function registerAccount(Request $request)
    {
   
        $request->validate([
            'email' => 'required|unique:users|max:255',
            'officerEmail' => 'required|unique:users|max:255',
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
            'password2' => Hahsh::make("0000"),
            'created_at' => now(),
            'updated_at' => now(),
            'category' => "Driver",
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
            'tranmission' => 'required',
            'color' => 'required',
            'id' => 'required',
        ]);
        
           $car = DB::table('car_fleet')->insertGetId([
            'vehiclePlateNo' => $request->plate,
            'type' => $request->type,
            'model' => $request->model,
            'chasis' => $request->chasis,
            'year' => $request->year,
            'body' => $request->body,
            'engine' => $request->engine,
            'colour' => $request->color,
            'transmission' => $request->tranmission,
           ]);
        
        $response = [
            'status' => 'success',
            'car' => $car,
        ];

        return response($response, 200);
    }
    public function registerAccount3(Request $request)
    {
        $request->validate([
            'fornt' => 'required',
            'interior' => 'required',
            'back' => 'required|numeric',
            'diagonal' => 'required',
        ]);

        $lo = 'DriverUpload/';
        $filename = (new ApiController)->upload($request, 'file', $lo);
        $utilityImage =  url('') . "/" . $lo . strtolower($filename);

        $user = User::find($request->id);

        $user->bankName = $request->bankName;
        $user->accountName = $request->accountName;
        $user->accountNumber = $request->accountNumber;
        $user->save();

        $response = [
            'status' => 'success',
            'useriD' => $user,
        ];

        return response($response, 200);
    }
    public function registerAccount4(Request $request)
    {
        $request->validate([
            'fornt' => 'required',
            'interior' => 'required',
            'back' => 'required|numeric',
            'diagonal' => 'required',
        ]);

        $lo = 'DriverUpload/';
        $filename = (new ApiController)->upload($request, 'file', $lo);
        $utilityImage =  url('') . "/" . $lo . strtolower($filename);

        $user = User::find($request->id);

        $user->bankName = $request->bankName;
        $user->accountName = $request->accountName;
        $user->accountNumber = $request->accountNumber;
        $user->save();

        $response = [
            'status' => 'success',
            'useriD' => $user,
        ];

        return response($response, 200);
    }
    
    
    
    
    public function step1profile(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'dob' => 'required',
            'city' => 'required|min:3',
            'address' => 'required|min:3',
            
        ]);

        $user = DB::table("zeususers")->insertGetId([
            'email' => $request->email,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'address' => $request->address,
            'country' => $request->country,
            'dob' => $request->dob,
            'user_type' => "workforce"
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
        $request->validate([
            'email' => 'required|min:3',
            'AccountName' => 'required|min:3',
            'BankName' => 'required|min:3',
            'AccountNumber' => 'required|numeric',
            'myjson' => 'required|email|unique:users'
        ]);

        $user = DB::table("zeususers")->where('email',$request->email)->update([
            'AccountName' => $request->AccountName,
            'BankName' => $request->BankName,
            'AccountNumber' => $request->AccountNumber,
            'otherDetails' => $request->myjson
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
    
      public function uploadImage(Request $request)
    {

        if (isset($request->image)) {
            $base64_string = $request->image;
            $outputfile = "uploads/image.jpg";
            //save as image.jpg in uploads/ folder
            $filehandler = fopen($outputfile, 'wb');
            //file open with "w" mode treat as text file
            //file open with "wb" mode treat as binary file

            fwrite($filehandler, base64_decode($base64_string));
            // we could add validation here with ensuring count($data)>1

            // clean up the file resource
            fclose($filehandler);
        } else {
            $return["error"] = true;
            $return["msg"] =  "No image is submited.";
        }
    }
}
