<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FinanceOfficeController extends Controller
{

    public function index()
    {
        return view('finance-office');
    }



    private function trans()
    {
        return   DB::table('transactions')
            ->leftjoin('investors', 'investors.vehiclePlateNo',  'transactions.vehiclePlateNo')
            ->leftJoin('brekete', 'brekete.vehicle', 'transactions.vehiclePlateNo')
            ->whereIn('paymentMethod', ['Tella Agent', 'platform', 'Online Payment'])
            ->select('transactions.*', 'brekete.percentage',  'investors.investorName', 'investors.acctNumber', 'investors.sortCode', 'investors.debitAccount');
    }
    public function payoutManagerFilter(Request $request)
    {
        // dd($request->all());
        if ($request->date == null) {
            if ($request->startdate == null && $request->endDate == null) {
                return back()->with("Emessage", "Please Select a Field");
                abort(404);
            } else {
                $transaction =   DB::table('vms_payments')
                    // ->whereDate('createtime', $request->date)
                    ->whereBetween('createtime', [$request->startDate, $request->endDate])
                    ->leftjoin('investors', 'investors.vehiclePlateNo',  'vms_payments.vehno')
                    ->leftJoin('brekete', 'brekete.vehicle', 'vms_payments.vehno')
                    ->leftJoin('car_fleet', 'car_fleet.vehiclePlateNo', 'vms_payments.vehno')
                    ->orderby('vms_payments.createtime', 'desc')
                    ->get();

                // $transaction = $this->trans()
                // ->whereBetween( 'created_at', [ $request->startDate, $request->endDate ] )
                // ->latest()->get();
            }
        } else {
            // $date->format( 'Y-m-d' )
            $transaction =   DB::table('vms_payments')
                ->whereDate('createtime', $request->date)
                ->leftjoin('investors', 'investors.vehiclePlateNo',  'vms_payments.vehno')
                ->leftJoin('brekete', 'brekete.vehicle', 'vms_payments.vehno')
                ->leftJoin('car_fleet', 'car_fleet.vehiclePlateNo', 'vms_payments.vehno')
                ->orderby('vms_payments.createtime', 'desc')
                ->get();

            // $transaction = $this->trans()
            // ->whereDate( 'created_at',  $request->date )
            // ->latest()->get();

        }
        $payout = DB::table('payout_manager')->latest()->get();

        // dd($transaction);
        // $dates = json_encode( array(
        //     "startDate" => $request->startdate,
        //     "endDate" => $request->endDate,
        //     "specDate" => $request->date,
        // ));
        return view('payout-manager', ['payout' => $payout, 'transaction' => $transaction, 'modal' => "true", "dates" => json_encode($request->all())]);
    }

    public function generatePayoutManager(Request $request)
    {
        // dd($request->all());
        // dd($data);

        $data = json_decode($request->date);
        if (empty($data->date)) {
            if (empty($data->startDate)  && empty($data->endDate)) {
                return back()->with("Emessage", "Please Select a Field");
                abort(404);
            } else {
                $transaction =   DB::table('vms_payments')
                    ->whereBetween('createtime', [$data->startDate, $data->endDate])
                    ->get();
            }
        } else {
            $transaction =   DB::table('vms_payments')
                ->whereDate('createtime',  $data->date)
                ->get();
        }

        foreach ($transaction as $value) {
            $arr[] =  $value->id;
        }


        $json = json_encode($arr);
        $rand = rand(000000, 999999);
        $reference = date("Ymdmhi") . $rand;

        DB::table('payout_manager')->insert([
            'reference' => $reference,
            'fleet' => $data->fleet,
            'stakeholders' => $data->stakeholder,
            'total_amount' => $request->totalAmount,
            'amount_disbursed' => $request->disbursedAmount,
            'agent' => Auth()->user()->first_name . " " . Auth()->user()->last_name,
            'status' => "pending",
            'data' => $json,
            'created_at' => now(),
        ]);

        $payout = DB::table('payout_manager')->latest()->get();

        // dd($transaction);
        // $dates = json_encode( array(
        //     "startDate" => $request->startdate,
        //     "endDate" => $request->endDate,
        //     "specDate" => $request->date,
        // ));

        return view('payout-manager', ['payout' => $payout, 'transaction' => $transaction, 'modal' => "false"]);
    }
    public function changeStatus($status, $id)
    {
        // dd($status);

        $ins = DB::table('payout_manager')->where('id', $id)
            ->update([
                "status" => $status,
                "updated_at" => now(),
            ],);

        return back()->with("success", "success");

        //    $payout = DB::table( 'payout_manager' )->latest()->get();
        // return view( 'payout-manager', [ 'payout' => $payout, 'modal' => "false" ] );
    }

    public function payoutView($id)
    {
        // dd($status);
        $ins = DB::table('payout_manager')->where('id', $id)->first();
        $data = json_decode($ins->data);
        $record = DB::table('transactions')->whereIn('id', $data)->get();
        // dd($record);
        if ($ins) {
            return view('payout-viewss', ['data' => $ins, 'record' => $record]);
        } else {
            return back()->with("Emessage", "Record not found");
        }
    }


    private function transaction()
    {
        return DB::table('transactions')
            ->where('paymentMethod', 'Tella Agent')
            ->orWhere('paymentMethod', 'Platform')
            ->leftjoin('investors', 'investors.vehiclePlateNo',  'transactions.vehiclePlateNo')
            ->leftJoin('brekete', 'brekete.vehicle', 'transactions.vehiclePlateNo')
            ->leftJoin('car_fleet', 'car_fleet.vehiclePlateNo', 'transactions.vehiclePlateNo')
            ->select('transactions.*', 'brekete.percentage', 'car_fleet.type', 'investors.investorName', 'investors.acctNumber', 'investors.sortCode', 'investors.debitAccount')
            ->latest()->get()->take(50);
    }

    public function payoutManager()
    {
        if (Auth()->user()->user_type == 'SUPER') {

            $payout = DB::table('payout_manager')->latest()->get();
        } else {
            $payout = DB::table('payout_manager')->where('creator_id', Auth()->user()->id)->latest()->get();
        }
        // dd( $payout );
        return view('payout-manager', ['payout' => $payout, 'modal' => "false"]);
    }


    public function depositModule()
    {
        if (Auth()->user()->user_type == 'SUPER') {

            $users = DB::table('vms_payments')
                ->select(DB::raw('COUNT(*) as count'))
                // ->where( 'paymentMethod', 'Tella Agent' )
                // ->orWhere( 'paymentMethod', 'Platform' )
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');

            //   dd($users);

            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                // ->where( 'paymentMethod', 'Tella Agent' )
                // ->orWhere( 'paymentMethod', 'Platform' )
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');

            // dd($months);

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            // dd($datas);
            foreach ($months as $index => $month) {
                $datas[$month] = $users[$index];
            }

            // dd($datas);

            $transaction =   DB::table('vms_payments')
                ->leftjoin('investors', 'investors.vehiclePlateNo',  'vms_payments.vehno')
                ->leftJoin('brekete', 'brekete.vehicle', 'vms_payments.vehno')
                ->leftJoin('car_fleet', 'car_fleet.vehiclePlateNo', 'vms_payments.vehno')
                ->orderby('vms_payments.createtime', 'desc')
                ->select('vms_payments.*', 'brekete.percentage', 'car_fleet.type', 'investors.investorName', 'investors.acctNumber', 'investors.sortCode', 'investors.debitAccount')
                // ->latest()

                ->get()->take(50);
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            // dd(Auth()->user()->email);
            $vehno = DB::table('all_vehicle')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereIn('vehno', $fleet)
                // ->where( 'paymentMethod', 'Tella Agent' )
                // ->orWhere( 'paymentMethod', 'Platform' )
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw('Month(created_at)'))
                ->pluck('count');
            // dd($users);
            $months =  DB::table('vms_payments')->select(DB::raw('Month(created_at) as month'))
                ->whereIn('vehno', $fleet)
                // ->where( 'paymentMethod', 'Tella Agent' )
                // ->orWhere( 'paymentMethod', 'Platform' )
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw('Month(created_at)'))
                ->pluck('month');

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] = $users[$index];
            }


            // dd($datas);
            $transaction = "";
            // $datas = "";

        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }

            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereIn('fleet', $fleet)
                // ->where( 'paymentMethod', 'Tella Agent' )
                // ->orWhere( 'paymentMethod', 'Platform' )
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw('Month(created_at)'))
                ->pluck('count');
            // dd($users);
            $months =  DB::table('vms_payments')->select(DB::raw('Month(created_at) as month'))
                ->whereIn('fleet', $fleet)
                // ->where( 'paymentMethod', 'Tella Agent' )
                // ->orWhere( 'paymentMethod', 'Platform' )
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw('Month(created_at)'))
                ->pluck('month');

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] = $users[$index];
            }


            // dd($datas);
            $transaction = "";
            // $datas = "";
        }
        Array_shift($datas);


        return view('deposit-module', ['transaction' => $transaction, 'data' => $datas]);
    }

    public function downloadCsv(Request $request)
    {

        // dd($request->all());

        if ($request->date == null) {
            if ($request->startDate == null && $request->endDate == null) {
                return back()->with("Emessage", "Please Select a Field");
                abort(404);
            } else {
                $data = DB::table("transactions")
                    // ->where( 'paymentMethod', 'Tella Agent' )
                    // ->orWhere( 'paymentMethod', 'Platform' )
                    ->whereBetween('created_at', [$request->startDate, $request->endDate])
                    ->leftjoin('investors', 'investors.vehiclePlateNo',  'transactions.vehiclePlateNo')
                    ->leftJoin('brekete', 'brekete.vehicle', 'transactions.vehiclePlateNo')
                    ->select('transactions.*', 'brekete.percentage', 'investors.investorName', 'investors.acctNumber', 'investors.sortCode', 'investors.debitAccount')
                    ->get()->take(500);
            }
        } else {
            $data = DB::table("transactions")
                // ->where( 'paymentMethod', 'Tella Agent' )
                // ->orWhere( 'paymentMethod', 'Platform' )
                ->whereDate('created_at', '=', $request->date)
                ->leftjoin('investors', 'investors.vehiclePlateNo',  'transactions.vehiclePlateNo')
                ->leftJoin('brekete', 'brekete.vehicle', 'transactions.vehiclePlateNo')
                ->select('transactions.*', 'brekete.percentage', 'investors.investorName', 'investors.acctNumber', 'investors.sortCode', 'investors.debitAccount')
                ->get()->take(500);
        }

        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=abc.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        );

        // dd($data);

        $filename = "download.csv";
        $handle = fopen($filename, 'w');
        fputcsv($handle, [
            "TRANSACTION REFERENCE NUMBER",
            "BENEFICIARY NAME",
            "PAYMENT AMOUNT",
            "PAYMENT DUE DATE",
            "BENEFICIARY CODE",
            "BENEFICIARY ACCOUNT NUMBER",
            "BENEFICIARY BANK SORT CODE",
            "DEBIT ACCOUNT NUMBER"
        ]);


        // ->chunk(100, function ($data) use ($handle) {
        // dd( $data);

        $x = 1;
        foreach ($data as $row) {
            if ($row->paymentMethod == "Tella Agent"  || $row->paymentMethod == "Platform") {
                $acctNumber =  str_pad($row->acctNumber, 10, '0', STR_PAD_LEFT);
                $sortCode =  str_pad($row->sortCode, 10, '0', STR_PAD_LEFT);

                $x++;
                // Add a new row with data
                fputcsv($handle, [
                    strtoupper($row->vehiclePlateNo) . Carbon::parse($row->created_at)->format('d/m/Y') . "-" .  $x,
                    $row->investorName,
                    ($row->percentage == '0') ? $row->amount  : ((100 - 14.5) / 100) * $row->amount,
                    Carbon::parse($row->created_at)->addDay(1)->format('d/m/Y'),
                    strtok($row->investorName, ' ') . strtoupper($row->vehiclePlateNo) . Carbon::parse($row->created_at)->format('d/m/Y') . "-" . $x,
                    $acctNumber,
                    $sortCode,
                    $row->debitAccount,
                ]);
            }
        }
        // });
        fclose($handle);

        return Response::download($filename, "download.xlsx", $headers);
    }
}
