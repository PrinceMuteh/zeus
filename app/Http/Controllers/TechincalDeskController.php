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
        $sql2 = DB::connection('mysql_2');
        $now = Carbon::parse(now())->format("Y-m-d");
        $from =  Carbon::now()->subDays(14)->format("Y-m-d");

        $newInstallation = DB::table("users")
            ->whereBetween('created_at', [$from, now()])->get();

        if (count($newInstallation) > 1) {
            foreach ($newInstallation as  $value) {
                if ($value->taskId == "") {
                    $str = substr($value->phone, -4) . "-" . substr($value->email, 1, 4);
                    DB::table("users")
                        ->where('id', $value->id)->update([
                            'taskId' =>  $str,
                            'taskStatus' => 0,
                        ]);
                    $newInstallation = DB::table("users")
                        ->whereBetween('users.created_at', [$from, now()])
                        ->where('category', "Investor")
                        // ->where('taskStatus', '!=', 'processing')
                        ->orderBy('users.created_at', 'desc')
                        // ->join('car_fleet', 'users.id', 'car_fleet.userId')
                        ->get();
                }
            }
        }

        $processing =  DB::table("users")
            ->whereBetween('users.created_at', [$from, now()])
            ->where(['category' => "Investor", 'taskStatus' => 'processing'])
            ->orderBy('users.created_at', 'desc')
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

        $newInstallation = DB::table("users")
            ->where('users.id', $id)
            ->join('car_fleet', 'users.id', 'car_fleet.userId')
            ->first();

        $installer = DB::table('zeususers')
            ->where('user_type', "Workshop Administrator")
            ->get();

        // dd($installer);

        return view('task-new-entry', ['data' => $newInstallation, 'installer' => $installer]);
    }
    public function taskCreate(Request $request)
    {
        // dd($request->all());
        $sql2 = DB::connection('mysql_2');
        $newInstallation = DB::table("users")
            ->where(['taskId' =>  $request->id, 'category' => "Investor"])
            ->update([
                'taskStatus' => $request->status,
                'installer' => $request->installer,
                'installationAddress' => $request->address,
                'installationDate' => $request->date,
            ]);
        // dd($newInstallation);

        if ($newInstallation) {
            Alert::toast('Successful', 'success');
            return back()->with('success', "Successful");
        } else {
            Alert::toast('Couldnt assign task', 'failed');
            return back()->with('Emessaage', "Couldnt assign task");
        }


        // $sql2 = DB::connection('mysql_2');
        // return view('task-new-entry', ['data' => $newInstallation, 'installer' => $installer]);
    }
}
