<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Alert;

class PasswordController extends Controller {
    public function index( $id ) {
        $ID = Crypt::decrypt( $id );
        // $ID = 16;
        // dd( 'hello' );
        $pass = DB::table( 'zeususers' )->where( [ 'id' => $ID, 'status' => '1', 'verify' => '0' ] )->first();
        // dd( $pass );
        if ( $pass ) {
            $user_id =  Crypt::encrypt( $ID );
            return view( '/change_password', [ 'user' => $pass, 'id' => $user_id ] );
        } else {
            // return route( 'login' );
            return redirect( '/login' )->with( 'success', 'You have no access to that page! Please Login' );
        }
    }

    public function changePasswordz( Request $request ) {
        // dd( $request->all() );
        $this->validate( $request, [
            'password' => [ 'required', 'string', 'min:8', 'confirmed' ],
            'pin' => [ 'required', 'string', 'min:4', 'confirmed' ],
            'bank' => [ 'required' ],
            'account_number' => [ 'required', 'numeric', 'min:9', ],
            'phone' => [ 'required' ],
            'nin' => [ 'required' ],
        ] );
        //    return ( new MailerController )->body();
        // dd( $request->bank );
        $bank = explode( ',', $request->bank );
        $code = $bank[ 0 ];
        $bank_name = $bank[ 1 ];
        // dd( $code );
        $result =  ( new PaystackController )->checkAccountNumber( $request->account_number,  $code );
        // dd( $result );
        if ( $result->status == 'true' ) {
            // dd( $result );
            $ID = Crypt::decrypt( $request->tok );
            // dd( $request->all() );
            $app = DB::table( 'zeususers' )
            ->where( 'id', $ID )
            ->update( [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'address' => $request->address,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'dob' => $request->dob,
                'address' => $request->address,
                'company_name' => $request->company_name,
                'company_phone' => $request->company_phone,
                'company_email' => $request->company_email,
                'website' => $request->url,
                'bank_name' => $bank_name,
                'account_name' => $result->data->account_name,
                'account_number' => $request->account_number,
                'sort_code' => $code,
                'status' => '1',
                'verify' => '1',
                'password' => Hash::make( $request->password ),
                'pin' => $request->pin,
                'updated_at' =>  now(),
                'email_verified_at' =>  now(),
            ] );
            if ( $app ) {
                return redirect( '/login' )->with( 'success', 'Profile updated! Please Login' );
            } else {
                return back()->with( 'Emessage', 'Error Updating Profile' );
            }
        } else {
            return back()->with( 'Emessage', 'Account Details is not valid' );

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

    public function reset() {
        // dd( Auth()->user()->email );
$token = Str::random( 60 );
        DB::table( 'password_resets' )->insert( [
            'email' => Auth()->user()->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ] );

        $tokenData = DB::table( 'password_resets' )
        ->where( 'email', Auth()->user()->email )->first();

        if ( $this->sendResetEmail( Auth()->user()->email, $token ) ) {
            Alert::toast( 'Email sent', 'success' );

            return redirect()->back()->with( 'status', trans( 'A reset link has been sent to your email address.' ) );
        } else {
            Alert::toast( 'Failed! Please contact Admin', 'failed' );

            return redirect()->back()->withErrors( [ 'error' => trans( 'A Network Error occurred. Please try again.' ) ] );
        }
    }

    private function sendResetEmail( $email, $token ) {
        //Retrieve the user from the database
        $user = DB::table( 'zeususers' )->where( 'email', $email )->select( 'first_name', 'email' )->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = config( 'base_url' ) . 'password/reset/' . $token . '?email=' . urlencode( $user->email );

        try {
            //Here send the link with CURL with an external email API
            ( new MailerController )->passwordReset( $email, $link, $user->first_name );
            return true;
        } catch ( \Exception $e ) {
            return false;
        }
    }


     public function ConfirmReset(Request $request)
    {
    

        $tokenData = DB::table( 'password_resets' )
        ->where( 'email', Auth()->user()->email )->orderBy('id', 'desc')->first();


        if($request->token === $tokenData->token ){

    $sql =   DB::table( 'zeususers' )
            ->where( 'email', $request->email )
            ->update( [
                'password' => Hash::make( $request->password ),
                    'updated_at' =>  now(),
            ] );
                    if($sql){
                                Alert::toast( 'Password Updated', 'success' );
            return redirect( '/home' );


                    }else{
                                return back()->with("Emessage", "An error Occured");
                            }
        }else{
                                return back()->with("Emessage", "Invalid Token");
                            }


        

    }
}

