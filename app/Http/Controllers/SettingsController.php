<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Jobs\ScheduleJobs;
use App\Jobs\LastPaymentJobs;

use Illuminate\Http\Request;
use Alert;

class SettingsController extends Controller {
    public function setting() {
        $maptiller = DB::table( 'api_details' )->where( 'name', 'maptiller', )->first();
        $gogle = DB::table( 'api_details' )->where( 'name', 'gogle', )->first();

        return view( 'settings', compact( 'maptiller', 'gogle' ) );
    }

    public function apikey( Request $request ) {
        // dd( $request->all() );

        $id = DB::table( 'api_details' )->where( 'name', $request->name )->update( [
            'api_key' => $request->apikey,
            'updated_at' => now(),
        ] );

        if ( $id ) {
            Alert::toast( 'You\'ve Successfully Updated ', 'success' );
            return back()->with('successs', "Updated");
        }else{
            Alert::toast( 'You\'ve Failed Updated ', 'failed' );
            return back()->with( 'failed', 'Failed' );

        }
    }

    public function vehicleManager() {
        $manager = DB::table( 'vehicle_manager' )->get();
        $category = DB::table( 'workshop_category' )->get();
        $vehicletype = DB::table( 'all_vehicle' )->distinct( 'bodytypename' )->select( 'bodytypename' )->get();
        // dd( $vehicletype );

        return view( 'vehicleManager', compact( 'manager', 'vehicletype', 'category' ) );

    }

    public function categoryName( Request $request ) {
        // dd( $request->all() );

        $result =   DB::table( 'workshop_category' )->insert( [
            'name' => $request->name,
            'created_at' => now()
        ] );

        if ( $result ) {
            Alert::toast( 'Successful ', 'success' );
            return back()->with( 'successs', 'Updated' );
        } else {
            Alert::toast( ' Failed  ', 'failed' );
            return back()->with( 'failed', 'Failed' );

        }

        // return view( 'vehicleManager', compact( 'manager', 'vehicletype', 'category' ) );
    }

    public function vehicle_manager( Request $request ) {
        // dd( $request->all() );
        $manager = DB::table( 'vehicle_manager' )
        ->where( [ 'fleet' => $request->fleet, 'category' => $request->category, 'user' => $request->payee ] )
        ->exists();
        if ( !$manager ) {
            $result =   DB::table( 'vehicle_manager' )->insert( [
                'fleet' => $request->fleet,
                'category' => $request->category,
                'user' => $request->payee,
                'amount' => $request->amount,
                'created_at' => now()
            ] );
            if ( $result ) {
                Alert::toast( 'Successful ', 'success' );
                return back()->with( 'successs', 'Updated' );
            } else {
                Alert::toast( ' Failed  ', 'failed' );
                return back()->with( 'failed', 'Failed' );
            }
        }else{
            Alert::toast( 'Fleet And Category Already Exist Proceed to Update', 'failed' );
            return back()->with( 'failed', 'Failed' );
        }

        // return view( 'vehicleManager', compact( 'manager', 'vehicletype', 'category' ) );
    }
}
