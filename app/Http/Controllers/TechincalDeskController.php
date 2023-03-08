<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Alert;

class TechincalDeskController extends Controller
{
    public function technicalDesk()
    {
        return view('technical-desk');
    }
    public function taskLogs()
    {
        if(Auth()->user()->user_type == 'SUPER'){
                $newInstallation = DB::table('car_fleet')
                ->where('car_fleet.status','Pending')
                ->orWhereNull('car_fleet.status')
                ->join("users","car_fleet.userId","users.id")
                ->select('car_fleet.*','users.phone','users.email')
                ->get();

                if (count($newInstallation) > 1) {
                    foreach ($newInstallation as  $value) {
                        if ($value->taskId == "") {
                            $str = substr($value->phone, -4) . "-" . substr($value->email, 1, 4). "-". Rand(000,999);
                            DB::table("car_fleet")
                                ->where('id', $value->id)->update([
                                    'status' =>  "Pending",
                                    'taskId' =>  $str,
                                    'taskStatus' => 0,
                                ]);                    

                        }
                    }
                }
                
        }else{
             $newInstallation = DB::table('car_fleet')
            ->where(['car_fleet.status' => 'Processing', 'car_fleet.installer' => Auth()->user()->id])
            ->join("users","car_fleet.userId","users.id")
            ->select('car_fleet.*','users.phone','users.email')
            ->get();
        }
            $processing = DB::table('car_fleet')->where('car_fleet.status','Processing')
                ->join("users","car_fleet.userId","users.id")
                    ->get();
        // dd($newInstallation);

        return view('task-logs', ['newInstallation' => $newInstallation, 'processing' => $processing]);
    }
    public function techincalDeskOffline()
    {
        return view('technical-desk-offline-cars');
    }
    public function newEntry($id)
    {

        $newInstallation = DB::table("car_fleet")
            ->where('car_fleet.id', $id)
            ->join('users','car_fleet.userId','users.id')
            ->select('car_fleet.*','users.phone','users.email')
            ->first();
        $installer = DB::table('zeususers')
            ->where('user_type', "Workshop Administrator")
            ->get();
        // dd($newInstallation);
        return view('task-new-entry', ['data' => $newInstallation, 'installer' => $installer]);
    }
    public function taskCreate(Request $request)
    {
 
      
        $newInstallation = DB::table("car_fleet")
            ->where('taskId',  $request->id)
            ->update([
                'status' => "Processing",
                'taskStatus' => $request->status,
                'installer' => $request->installer,
                'installationAddress' => $request->address,
                'installationDate' => $request->date,
                'updated_at' => now(),
            ]);
            
        // dd($newInstallation);

        if ($newInstallation) {
            Alert::toast('Successful', 'success');
             return redirect()->route('task-logs')->with('success', 'Successful');
        } else {
            Alert::toast('Couldnt assign task', 'failed');
            return back()->with('Emessaage', "Couldnt assign task");
        }


        // $sql2 = DB::connection('mysql_2');
        // return view('task-new-entry', ['data' => $newInstallation, 'installer' => $installer]);
    }
}
