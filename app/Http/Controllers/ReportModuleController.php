<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ReportModuleController extends Controller
{
    public function sql2()
    {
        return  DB::connection('mysql_2');
    }

    private function maptiller()
    {
        $result = DB::table('api_details')
            ->where('name', 'maptiller')
            ->select('api_key')
            ->first();
        return  $result->api_key;
    }
    public function index()
    {
        $weekstart = Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d');
        $weekend =  Carbon::now()->endOfWeek(Carbon::SATURDAY)->format('Y-m-d');

        if (Auth()->user()->user_type == 'SUPER') {
            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                // ->whereBetween( 'createtime', [ $weekstart, $weekend ] )
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                // ->whereBetween( 'createtime', [ $weekstart, $weekend ] )
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');
            $paidUserChart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $paidUserChart[$month] = $users[$index];
            }
            // dd($paidUserChart);
            $paidUsers = DB::table('vms_payments')
                ->whereBetween('createtime', [$weekstart, $weekend])
                ->sum('needpayment');

            // $paidUsers = DB::table( 'tella_payment' )->sum( 'amount' );
            $weekstart = Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d');
            $weekend =  Carbon::now()->endOfWeek(Carbon::SATURDAY)->format('Y-m-d');
            // dd($weekstart);

            $projectIncome = DB::table('duepayments')->whereBetween('duetime', [$weekstart, $weekend])->sum('needpayment');
            // $projectIncome = DB::table('duepayments')->whereBetween('duetime', [$weekstart, $weekend])->get();

            // dd($projectIncome);


            $date = Carbon::now()->subDays(2)->startOfDay()->format('Y-m-d H:i:s');
            $depot = DB::table('duepayments')->where('duetime', '<=', $date)->sum('needpayment');

            $unpaid  = $projectIncome - $paidUsers;
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereIn('vehno', $fleet)
                // ->whereBetween( 'createtime', [ $weekstart, $weekend ] )
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereIn('vehno', $fleet)
                // ->whereBetween( 'createtime', [ $weekstart, $weekend ] )
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');
            $paidUserChart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $paidUserChart[$month] = $users[$index];
            }
            $paidUsers = DB::table('vms_payments')
                ->whereIn('vehno', $fleet)
                ->whereBetween('createtime', [$weekstart, $weekend])
                ->sum('needpayment');
            $projectIncome = DB::table('duepayments')
                ->whereIn('vehno', $fleet)
                ->whereBetween('duetime', [$weekstart, $weekend])->sum('needpayment');

            $date = Carbon::now()->subDays(2)->startOfDay()->format('Y-m-d H:i:s');
            $depot = DB::table('duepayments')
                ->whereIn('vehno', $fleet)
                ->where('duetime', '<=', $date)->sum('needpayment');

            $unpaid  = $projectIncome - $paidUsers;
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereIn('fleet', $fleet)
                // ->whereBetween( 'createtime', [ $weekstart, $weekend ] )
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereIn('fleet', $fleet)
                // ->whereBetween( 'createtime', [ $weekstart, $weekend ] )
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');
            $paidUserChart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $paidUserChart[$month] = $users[$index];
            }
            $paidUsers = DB::table('vms_payments')
                ->whereIn('fleet', $fleet)
                ->whereBetween('createtime', [$weekstart, $weekend])
                ->sum('needpayment');
            $projectIncome = DB::table('duepayments')
                ->whereIn('bodytypename', $fleet)
                ->whereBetween('duetime', [$weekstart, $weekend])->sum('needpayment');

            $date = Carbon::now()->subDays(2)->startOfDay()->format('Y-m-d H:i:s');
            $depot = DB::table('duepayments')
                ->whereIn('bodytypename', $fleet)
                ->where('duetime', '<=', $date)->sum('needpayment');

            $unpaid  = $projectIncome - $paidUsers;
        }
        Array_shift($paidUserChart);
        // dd($projectIncome);

        return view('report-module', ['paidUserChart' => $paidUserChart ?? 0, 'paid' => $paidUsers ?? 0, 'unpaid' => $unpaid ?? 0, 'income' => $projectIncome ?? 0, 'depot' => $depot ?? 0]);
    }

    public function allPayments()
    {
        $weekstart = Carbon::now()->startOfWeek()->format('Y-m-d H:i:s');
        $date = Carbon::now()->endOfDay()->format('Y-m-d H:i:s');
        if (Auth()->user()->user_type == 'SUPER') {

            $result = DB::table('vms_payments')
                // ->whereBetween( 'vms_payments.createtime', [ $weekstart, $weekend ] )
                ->whereBetween('vms_payments.createtime', [$weekstart, $date])
                ->leftjoin('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vms_payments.vehno')
                ->select('vms_payments.*',  'vehicle_details_vms.drivername', 'vehicle_details_vms.driverphone', 'vehicle_details_vms.driveremail')
                ->orderBy('created_At', 'DESC')
                ->get();

            $totalAmount = $result->sum('needpayment');
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            $result = DB::table('vms_payments')
                ->whereIn('vms_payments.vehno', $fleet)
                ->whereBetween('vms_payments.createtime', [$weekstart, $date])
                ->leftjoin('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vms_payments.vehno')
                ->select('vms_payments.*',  'vehicle_details_vms.drivername', 'vehicle_details_vms.driverphone', 'vehicle_details_vms.driveremail')
                ->orderBy('created_At', 'DESC')
                ->get();
            $totalAmount = $result->sum('needpayment');
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            $result = DB::table('vms_payments')
                ->whereIn('fleet', $fleet)
                ->whereBetween('vms_payments.createtime', [$weekstart, $date])
                ->leftjoin('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vms_payments.vehno')
                ->select('vms_payments.*',  'vehicle_details_vms.drivername', 'vehicle_details_vms.driverphone', 'vehicle_details_vms.driveremail')
                ->orderBy('created_At', 'DESC')
                ->get();
            $totalAmount = $result->sum('needpayment');
        }
        // dd( $totalAmount );
        return view('all-payments', ['totalAmount' => $totalAmount ?? 0, 'data' => $result ?? 0]);
    }

    public function allPaymentFilter(Request $request)
    {

        if (Auth()->user()->user_type == 'SUPER') {

            $result = DB::table('vms_payments')
                ->whereBetween('vms_payments.createtime', [$request->startDate, $request->endDate])
                ->leftjoin('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vms_payments.vehno')
                ->select('vms_payments.*',  'vehicle_details_vms.drivername', 'vehicle_details_vms.driverphone', 'vehicle_details_vms.driveremail')
                ->orderBy('created_At', 'DESC')
                ->get();
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }


            $result = DB::table('vms_payments')
                ->whereIn('fleet', $fleet)
                ->whereBetween('vms_payments.createtime', [$request->startDate, $request->endDate])
                ->leftjoin('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vms_payments.vehno')
                ->select('vms_payments.*',  'vehicle_details_vms.drivername', 'vehicle_details_vms.driverphone', 'vehicle_details_vms.driveremail')
                ->orderBy('created_At', 'DESC')
                ->get();
        }
        $totalAmount = $result->sum('needpayment');

        return view('all-payments', ['totalAmount' => $totalAmount, 'data' => $result]);
    }

    public function allPaymentFilter2($date)
    {
        $endDate = Carbon::now()->subDays($date)->format('Y-m-d');
        $startDate =  Carbon::now()->format('Y-m-d');

        if (Auth()->user()->user_type == 'SUPER') {

            $result = DB::table('vms_payments')
                ->whereBetween('vms_payments.createtime', [$endDate, $startDate])
                ->leftjoin('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vms_payments.vehno')
                ->select('vms_payments.*',  'vehicle_details_vms.drivername', 'vehicle_details_vms.driverphone', 'vehicle_details_vms.driveremail')
                ->orderBy('created_At', 'DESC')
                ->get();
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }

            $result = DB::table('vms_payments')
                ->whereIn('fleet', $fleet)
                ->whereBetween('vms_payments.createtime', [$endDate, $startDate])
                ->leftjoin('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vms_payments.vehno')
                ->select('vms_payments.*',  'vehicle_details_vms.drivername', 'vehicle_details_vms.driverphone', 'vehicle_details_vms.driveremail')
                ->orderBy('created_At', 'DESC')
                ->get();
        }
        $totalAmount = $result->sum('needpayment');

        // dd( $totalAmount );

        return view('all-payments', ['totalAmount' => $totalAmount, 'data' => $result]);
    }

    public function duePayments()
    {
        $date = Carbon::now()->subDays(1)->endOfDay()->format('Y-m-d H:i:s');

        if (Auth()->user()->user_type == 'SUPER') {
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->where('duepayments.duetime', '>', $date)
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('duepayments.vehno', $fleet)
                ->where('duepayments.duetime', '>', $date)
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('bodytypename', $fleet)
                ->where('duepayments.duetime', '>', $date)
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        }
        $totalAmount = $result->sum('needpayment');

        return view('due-payments', ['totalAmount' => $totalAmount ?? 0, 'data' => $result  ?? 0]);
    }

    public function overduePayments()
    {
        // $date = Carbon::yesterday()->startOfDay()->format( 'Y-m-d H:i:s' );
        $date = Carbon::now()->subDays(1)->endOfDay()->format('Y-m-d H:i:s');
        $date2 = Carbon::now()->subDays(2)->startOfDay()->format('Y-m-d H:i:s');

        if (Auth()->user()->user_type == 'SUPER') {
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereBetween('duepayments.duetime', [$date2, $date])
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('duepayments.vehno', $fleet)
                ->whereBetween('duepayments.duetime', [$date2, $date])
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('bodytypename', $fleet)
                ->whereBetween('duepayments.duetime', [$date2, $date])
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        }
        $totalAmount = $result->sum('needpayment');
        return view('overdue-payments', ['totalAmount' => $totalAmount ?? 0, 'data' => $result ?? 0]);
    }

    public function criticalPayments()
    {
        $date = Carbon::now()->subDays(3)->startOfDay()->format('Y-m-d H:i:s');
        $date2 = Carbon::now()->subDays(5)->endOfDay()->format('Y-m-d H:i:s');
        if (Auth()->user()->user_type == 'SUPER') {
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereBetween('duepayments.duetime', [$date2, $date])
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('duepayments.vehno', $fleet)
                ->whereBetween('duepayments.duetime', [$date2, $date])
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('bodytypename', $fleet)
                ->whereBetween('duepayments.duetime', [$date2, $date])
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        }
        $totalAmount = $result->sum('needpayment');
        return view('critical-payments', ['totalAmount' => $totalAmount ?? 0, 'data' => $result ?? 0]);
    }

    public function codeRed()
    {
        $date = Carbon::now()->subDays(5)->endOfDay()->format('Y-m-d H:i:s');
        if (Auth()->user()->user_type == 'SUPER') {
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->where('duepayments.duetime', '<', $date)
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('duepayments.vehno', $fleet)
                ->where('duetime', '<', $date)
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('bodytypename', $fleet)
                ->where('duetime', '<', $date)
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        }
        $totalAmount = $result->sum('needpayment');
        return view('code-red', ['totalAmount' => $totalAmount ?? 0, 'data' => $result ?? 0]);
    }

    public function codeRedFilter(Request $request)
    {
        $startDate = Carbon::parse($request->startDate, 'UTC')->format('Y-m-d');
        $endDate = Carbon::parse($request->endDate, 'UTC')->format('Y-m-d');

        if (Auth()->user()->user_type == 'SUPER') {
            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereBetween('duetime', [$startDate, $endDate])
                ->select('duepayments.*', 'vehicle_status.time')
                ->get();
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }

            $result = DB::table('duepayments')
                ->leftjoin('vehicle_status', 'vehicle_status.vehno', 'duepayments.vehno')
                ->whereIn('bodytypename', $fleet)
                ->select('duepayments.*', 'vehicle_status.time')
                ->whereBetween('duetime', [$startDate, $endDate])->get();
        }
        // $date = Carbon::now()->subDays( 2 )->endOfDay()->format( 'Y-m-d H:i:s' );
        // $date2 = Carbon::now()->subDays( 5 )->startOfDay()->format( 'Y-m-d H:i:s' );

        // dd( $result );

        $totalAmount = $result->sum('needpayment');

        return view('code-red', ['totalAmount' => $totalAmount, 'data' => $result]);
    }

    public function codeRedFilter2($date)
    {
        // return $date;
        $date2 = Carbon::now()->subDays($date)->endOfDay()->format('Y-m-d H:i:s');
        // $result = DB::table( 'duepayments' )->where( 'duetime', '<', $date )->get();
        $date = Carbon::now()->subDays(5)->startOfDay()->format('Y-m-d H:i:s');
        $result = DB::table('duepayments')->whereBetween('duetime', [$date2, $date])->get();
        $totalAmount = $result->sum('needpayment');
        return view('code-red', ['totalAmount' => $totalAmount, 'data' => $result]);
    }

    public function DuePayment()
    {
        $result = (new VMSAPI)->defaultOverDue();
        $result = $result->Data;
        $totalAmount = 0;
        foreach ($result as  $value) {
            $totalAmount +=  $value->needpayment;
        }
        return  array(
            'data' => $result,
            'totalAmount' => $totalAmount
        );
        // return view( 'test', [ 'data' => $data ] );
    }

    public function critical(Request $request)
    {
        $date = Carbon::now()->subDays(2)->format('Y-m-d');
        $page = 1000;
        $totalAmount = 0;
        $result = (new VMSAPI)->getVehicleOverDue($date, $page);
        foreach ($result->Data as $value) {
            if ($value->Vehicle->investorname != '' || $value->Vehicle->investorname != null) {
                $resultz[] = $value;
                $totalAmount +=  $value->needpayment;
            }
        }
        return array(
            'data' => $resultz,
            'totalAmount' => $totalAmount
        );
    }

    public function reportModule()
    {
        $date = Carbon::today()->format('Y-m-d');
        $weekstart = Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d');
        $weekend =  Carbon::now()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        // // aLlpayment
        $result =  (new ApiController)->post('https://tella.envio.africa/api/all-payment-date', array(
            'startDate' => Carbon::now()->subDays(7)->startOfDay()->format('Y-m-d H:i:s'),
            'endDate' => Carbon::today()->format('Y-m-d H:i:s'),
        ));
        $paidUsers = 0;
        foreach ($result as $item) {
            $paidUsers += $item->amount;
        }
        // return $paidUsers;
        $depotx = (new VMSAPI)->getVehicleOverDue(Carbon::yesterday()->startOfDay()->format('Y-m-d'), 1000);
        $depot = 0;
        $overdueOneWeek = Carbon::now()->subDays(9)->startOfDay()->format('Y-m-d');
        foreach ($depotx->Data as $value) {
            if ($value->Vehicle->investorname != '' || $value->Vehicle->investorname != null) {
                if ($value->duetime >= $overdueOneWeek) {
                    // from sunday till today
                    $depot += $value->needpayment;
                    $arr[] = $value->duetime;
                }
            }
        }
        // return $arr;
        // get due payment

        $unpaid = $this->DuePayment();
        $unpaidAmount = $unpaid['totalAmount'];
        return array(
            'paid' => number_format($paidUsers, 2),
            'unpaid' => number_format($unpaidAmount, 2),
            'income' => number_format($paidUsers + $unpaidAmount, 2),
            'depot' => number_format($depot + $unpaidAmount, 2),
        );
    }

    public function reportModuleFilter(Request $request)
    {
        // dd( $request->all() );

        $startDate = Carbon::parse($request->startDate, 'UTC')->format('Y-m-d');
        $endDate = Carbon::parse($request->endDate, 'UTC')->format('Y-m-d');

        if (Auth()->user()->user_type == 'SUPER') {
            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereBetween('createtime', [$startDate, $endDate])
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereBetween('createtime', [$startDate, $endDate])
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');
            $paidUserChart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $paidUserChart[$month] = $users[$index];
            }
            $result = DB::table('vms_payments')
                ->whereBetween('createtime', [$startDate, $endDate])
                ->get();
            $paidUsers = $result->sum('needpayment');
            $depotx = (new VMSAPI)->getVehicleOverDue($endDate, 300);
            $depot = 0;
            foreach ($depotx->Data as $value) {
                if ($value->Vehicle->investorname != '' || $value->Vehicle->investorname != null) {
                    if ($value->duetime >= $startDate) {
                        $arr[] = $value->duetime;
                        $depot += $value->needpayment;
                    }
                }
            }
            $unpaid = $this->DuePayment();
            $unpaidAmount = $depot;
            $income  = $paidUsers + $unpaidAmount;
            $depot =  $depot + $unpaidAmount;
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }

            // dd($fleet);

            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereBetween('createtime', [$startDate, $endDate])
                ->whereIn('fleet', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereBetween('createtime', [$startDate, $endDate])
                ->whereIn('fleet', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');
            $paidUserChart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $paidUserChart[$month] = $users[$index];
            }
            $result = DB::table('vms_payments')
                ->whereIn('fleet', $fleet)
                ->whereBetween('createtime', [$startDate, $endDate])
                ->get();
            $paidUsers = $result->sum('needpayment');


            $depotx = (new VMSAPI)->getVehicleOverDue($endDate, 300);
            $depot = 0;

            // dd($depotx);

            foreach ($depotx->Data as $value) {
                if ($value->Vehicle->investorname != '' || $value->Vehicle->investorname != null) {
                    if ($value->Vehicle->bodytypename == $fleet) {
                        if ($value->duetime >= $startDate) {
                            if ($value->duetime <= $endDate) {
                                // $arr[] = $value->duetime ;
                                $depot += $value->needpayment;
                            }
                        }
                    }
                }
            }
            // dd($arr);

            $unpaid = $this->DuePayment();
            // $unpaid = 0;
            $unpaidAmount = $depot;
            $income  = $paidUsers + $unpaidAmount;
            $depot =  $depot + $unpaidAmount;
        }
        
                $paidUserChart = array_reverse($paidUserChart);
        array_pop($paidUserChart);
        $paidUserChart = array_reverse($paidUserChart);
        
        
        return view('report-module', ['paid' => $paidUsers, 'paidUserChart' => $paidUserChart, 'unpaid' => $unpaidAmount, 'income' => $income, 'depot' => $depot]);
    }

    public function reportModuleFilter2($date)
    {
        // $date = $request->date;
        // dd( $request->all() );

        $endDate = Carbon::now()->subDays($date)->format('Y-m-d');
        $startDate =  Carbon::now()->format('Y-m-d');

        if (Auth()->user()->user_type == 'SUPER') {
            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereBetween('createtime', [$endDate, $startDate])
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');

            // dd( $users );
            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereBetween('createtime', [$endDate, $startDate])
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');
            $paidUserChart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $paidUserChart[$month] = $users[$index];
            }

            $result = DB::table('vms_payments')
                ->whereBetween('createtime', [$endDate, $startDate])
                ->get();
            // dd($result);
            $paidUsers = $result->sum('needpayment');


            // return $totalAmount;
            $depotx = (new VMSAPI)->getVehicleOverDue($startDate, 300);
            // return $depotx;
            $depot = 0;
            foreach ($depotx->Data as $value) {
                if ($value->Vehicle->investorname != '' || $value->Vehicle->investorname != null) {
                    if ($value->duetime >= $endDate) {
                        $arr[] = $value->duetime;
                        $depot += $value->needpayment;
                    }
                }
            }
            // dd( $depot );
            $unpaid = $this->DuePayment();
            $unpaidAmount = $depot;
            $income  = $paidUsers + $unpaidAmount;
            $depot =  $depot + $unpaidAmount;
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }

            $users = DB::table('vms_payments')->select(DB::raw('COUNT(*) as count'))
                ->whereBetween('createtime', [$startDate, $endDate])
                ->whereIn('fleet', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('count');
            $months =  DB::table('vms_payments')->select(DB::raw('Month(createtime) as month'))
                ->whereBetween('createtime', [$startDate, $endDate])
                ->whereIn('fleet', $fleet)
                ->whereYear('createtime', date('Y'))
                ->groupBy(DB::raw('Month(createtime)'))
                ->pluck('month');
            $paidUserChart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $paidUserChart[$month] = $users[$index];
            }
            $result = DB::table('vms_payments')
                ->whereIn('fleet', $fleet)
                ->whereBetween('createtime', [$startDate, $endDate])
                ->get();
            $paidUsers = $result->sum('needpayment');

            // return $totalAmount;
            $depotx = (new VMSAPI)->getVehicleOverDue($startDate, 300);
            // return $depotx;
            $depot = 0;

            foreach ($depotx->Data as $value) {
                if ($value->Vehicle->investorname != '' || $value->Vehicle->investorname != null) {
                    // if ( $value->Vehicle->bodytypename == $fleet ) {
                    if ($value->duetime >= $startDate) {
                        if ($value->duetime <= $endDate) {
                            // $arr[] = $value->duetime ;
                            $depot += $value->needpayment;
                        }
                    }
                    // }
                }
            }

            // dd( $depot );
            $unpaid = $this->DuePayment();
            $unpaidAmount = $depot;
            $income  = $paidUsers + $unpaidAmount;
            $depot =  $depot + $unpaidAmount;
        }

        $paidUserChart = array_reverse($paidUserChart);
        array_pop($paidUserChart);
        $paidUserChart = array_reverse($paidUserChart);

        // dd( $result );

        return view('report-module', ['paidUserChart' => $paidUserChart, 'paid' => $paidUsers, 'unpaid' => $unpaidAmount, 'income' => $income, 'depot' => $depot]);
    }

    public function userInformation($phone, $plate, $investorphone)
    {
        // $phone = $request->phone;
        // $plate = $request->plate;
        // $investorphone = $request->investorphone;
        // $phone = '08134988013';
        // $plate = 'BWR971XE';
        // dd( $plate );

        $str = ltrim($phone, '0');
        $grantor = DB::table('gurantors_info')->where('plate_number', $plate)->first();
        $driverInfo = DB::table('users')->where('phone', $phone)->first();

        // dd( $driverInfo );
        $driverDetails = (new VMSAPI)->getDriverInfo($phone);
        $vehicleDetails = (new VMSAPI)->getVehicleRecord($plate);
        $getBill = (new VMSAPI)->get_pay_bill($plate);

        $recentPayment = (new VMSAPI)->get_vehicle_recent_payment($plate);

        // dd( $vehicleDetails );

        $leasePay = 0;
        $installment = 0;

        if (!empty($getBill->Data->leasePay)) {
            foreach ($getBill->Data->leasePay as $value) {
                $leasePay =  $value->needpayment + $leasePay;
            }
        }
        if (!empty($getBill->Data->installment)) {
            foreach ($getBill->Data->installment as $value) {
                $installment =  $value->needpayment + $installment;
            }
        }
        // $getBill = array(
        //     'leasePay' => $leasePay,
        //     'installment' => $installment,
        // );

        if (!empty($vehicleDetails)) {
            $vehicleLocation = (new VMSAPI)->getVehiclePosition($vehicleDetails->Data->systemno);
        }

        // dd( $vehicleLocation );

        $car_fleet = DB::table('car_fleet')->where('vehiclePlateNo', $plate)->first();

        $allVehicle = DB::table('vehicle_details_vms')->where('vehno', $plate)->first();

        $mangement = DB::table('users')->where('phone', $phone)->first();
        $payments = DB::table('vms_payments')->where('vehno', $plate)->orderBy('createtime', 'DESC')->get();

        $latitude = $vehicleLocation->Data[0]->Latitude;
        $longitude = $vehicleLocation->Data[0]->Longitude;

        if ($latitude != 0.0) {
            $response =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $longitude . ',' . $latitude . '.json?key=' . $this->maptiller());

            if ($response == null) {
                $placeAddress = 'not available';
                $label = '-';
                $single = 'singles';
            } else {
                $placeAddress = $response->features[0]->place_name . ", " . $response->features[1]->place_name;
                $label = $response->features[0]->place_name . ", " . $response->features[1]->place_name;
                $single = 'single';
            }
        } else {
            $placeAddress = '-';
            $label = '-';
            $single = 'singles';
        }
        $investorInfo = (new VMSAPI)->getInvestorInfo($investorphone);
        $data = array(
            'allVehicle' => $allVehicle ?? 'null',
            'driverDetail' => (!empty($driverDetails)) ? $driverDetails->Data : 'null',
            'driverInfo' => (!empty($driverInfo)) ? $driverInfo : 'null',
            'vehicleDetails' => (!empty($vehicleDetails)) ? $vehicleDetails->Data : 'null',
            'vehicleLocation' => (!empty($vehicleLocation)) ? $vehicleLocation->Data[0] : 'null',
            'investorInfo' => (!empty($investorInfo)) ? $investorInfo->Data : 'null',
            'garantor' => (!empty($grantor)) ? $grantor : 'null',
            'location' => (!empty($label)) ? $label : 'null',
            'carFleet' => (!empty($car_fleet)) ? $car_fleet : 'null',
            'totalPayment' => $leasePay + $installment ?? 'null',
            'recentPayment' => (!empty($recentPayment)) ? $recentPayment->Data : 'null',
            'payments' =>   $payments  ?? 'null',
        );
        $cars = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->where('vehicle_status.vehno', $plate)->get();

        $cars3 = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();

        // dd( $data );
        $single = 'single';

        return view('user-information', compact('data', 'cars', 'cars3', 'placeAddress', 'single'));
    }
}
