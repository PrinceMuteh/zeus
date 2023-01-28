<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;




class WorkforceController extends Controller
{


    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user || $request->password != $user->password) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'status' => 'success',
            'user' => $user,
            'token' => $token
        ];
        return response($response, 200);

        return "login";
    }
    public function updatePassword(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        $response = [
            'status' => 'success',
            'user' => $user,
        ];
        return response($response, 200);
    }

    public function updateBank(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        $user->bankName = $request->bankName;
        $user->accountName = $request->accountName;
        $user->accountNumber = $request->accountNumber;
        $user->save();
        $response = [
            'status' => 'success',
            'user' => $user,
        ];
        return response($response, 200);
    }
    public function updateProfile(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        $user->bankName = $request->bankName;
        $user->accountName = $request->accountName;
        $user->accountNumber = $request->accountNumber;
        $user->save();
        $response = [
            'status' => 'success',
            'user' => $user,
        ];
        return response($response, 200);
    }

    public function registerAccount(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|max:255',
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|numeric',
            'city' => 'required',
        ]);
        $user = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'phone' => $request->phone,
            'city' => $request->city,
        ]);
        $response = [
            'status' => 'success',
            'useriD' => $user,
        ];
        return response($response, 200);
    }
    public function registerAccount2(Request $request)
    {
        $request->validate([
            'plate' => 'required',
            'type' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'engine' => 'required',
            'tranmission' => 'required',
            'color' => 'required',
            'id' => 'required',
        ]);
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
}
