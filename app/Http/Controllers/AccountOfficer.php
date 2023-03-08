<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AccountOfficer extends Controller
{
    public function fleet()
    {
        $fleet = DB::table('vehicle_details_vms')->get();
        $officers = DB::table('vehicle_details_vms')
            ->where('accountOfficer', '!=', "")
            ->select('accountOfficer')->distinct()->get();
            
        $users = DB::table('zeususers')
            ->where('user_type', "supportManager")->get();

        return view('/account-officer/fleet', ['fleet' => $fleet, 'officerz' => $officers, 'users' => $users ]);
    }

    public function updateFleet(Request $request)
    {
        // dd($request->all());
        $officers = DB::table('vehicle_details_vms')->where('id', $request->id)->update([
            'accountOfficer' => $request->accountOfficer,
            'updated_at' => now()
        ]);

        if ($officers) {
            toast('You\'ve Successfully Updated ', 'success');
            return back()->with('success', 'Profile updated');
        }
        toast('An Errow Occured', 'error');
        return back()->with('Emessage', 'An Error Occured');
    }
    public function updateMangers(Request $request)
    {
        // dd($request->all());
        $officers = DB::table('vehicle_details_vms')->where('id', $request->id)->update([
            'supportManager' => $request->accountOfficer,
            'updated_at' => now()
        ]);

        if ($officers) {
            toast('You\'ve Successfully Updated ', 'success');
            return back()->with('success', 'Profile updated');
        }
        toast('An Errow Occured', 'error');
        return back()->with('Emessage', 'An Error Occured');
    }
}
