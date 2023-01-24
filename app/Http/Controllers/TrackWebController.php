<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Alert;

class TrackWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function maptiller()
    {
        $result = DB::table('api_details')
            ->where('name', 'maptiller')
            ->select('api_key')
            ->first();
        return  $result->api_key;
    }
    // private function gogleApi() {
    //         $result = DB::table( 'api_details' )
    //         ->where( 'name', 'gogle' )
    //         ->select( 'api_key' )
    //         ->first();
    //         return  $result->api_key;
    //     }

    public function index()
    {
        if (Auth()->user()->user_type == 'SUPER') {
            $cars = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get();
            $cars3 = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();
            if ($cars[0]->latitude != 0.0) {
                $response =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $cars[0]->longitude . ',' . $cars[0]->latitude . '.json?key=' . $this->maptiller());
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

            $plate = $cars[0]->vehno;
            $investorphone = $cars[0]->investorphonenumber;
            $driverphone = $cars[0]->driverphone;
            $vehicleDetails = (new VMSAPI)->getVehicleRecord($plate);
            if (!empty($vehicleDetails)) {
                $vehicleLocation = (new VMSAPI)->getVehiclePosition($vehicleDetails->Data->systemno);
            }
            // dd($vehicleLocation);

            $driverDetails = (new VMSAPI)->getDriverInfo($driverphone);
            $investorInfo = (new VMSAPI)->getInvestorInfo($investorphone);
            //    $cars3 =  $cars->toArray();
            $data = array(
                'cars' => $cars,
                // 'otherDetails'=> $otherDetails,
                'driverDetail' => (!empty($driverDetails)) ? $driverDetails->Data : 'null',
                'vehicleDetails' => (!empty($vehicleDetails)) ? $vehicleDetails->Data : 'null',
                'vehicleLocation' => (!empty($vehicleLocation->Data)) ? $vehicleLocation->Data[0] : 'null',
                'investorInfo' => (!empty($investorInfo)) ? $investorInfo->Data : 'null',
            );
        } else if (Auth()->user()->user_type == 'accountOfficer') {
            // dd(Auth()->user()->email);
            $vehno = DB::table('vehicle_details_vms')->where('accountOfficer', Auth()->user()->email)->select('vehno')->get();

            if (count($vehno) < 1) {
                Auth::logout();
                return redirect()->route('login')->with('Emessage', 'You have not been assign to a fleet, Please Contact Admin');
            }

            foreach ($vehno as $key => $value) {
                $fleet[] = $value->vehno;
            }
            // $cars = DB::table( 'vehicle_details_vms' )->orderBy( 'vehno', 'DESC' )->get();
            $cars = DB::table('vehicle_status')->whereIn('vehicle_status.vehno', $fleet)->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get();
            //   dd( $cars );

            $cars3 = DB::table('vehicle_status')->whereIn('vehicle_status.vehno', $fleet)->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();
            if ($cars[0]->latitude != 0.0) {
                $response =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $cars[0]->longitude . ',' . $cars[0]->latitude . '.json?key=' . $this->maptiller());
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
            // $placeAddress = $response->results[ 0 ]->formatted_address;
            //details from mygarage
            // $otherDetails = ( new ApiController )->get( 'https://test.mygarage.africa/api/other-details/bwr749fd' );
            // $otherDetails->remittanceAmount;
            $plate = $cars[0]->vehno;
            $investorphone = $cars[0]->investorphonenumber;
            $driverphone = $cars[0]->driverphone;
            $vehicleDetails = (new VMSAPI)->getVehicleRecord($plate);
            if (!empty($vehicleDetails)) {
                $vehicleLocation = (new VMSAPI)->getVehiclePosition($vehicleDetails->Data->systemno);
            }
            $driverDetails = (new VMSAPI)->getDriverInfo($driverphone);
            $investorInfo = (new VMSAPI)->getInvestorInfo($investorphone);
            //    $cars3 =  $cars->toArray();
            $data = array(
                'cars' => $cars,
                //  'otherDetails'=> $otherDetails,
                'driverDetail' => (!empty($driverDetails)) ? $driverDetails->Data : 'null',
                'vehicleDetails' => (!empty($vehicleDetails)) ? $vehicleDetails->Data : 'null',
                'vehicleLocation' => (!empty($vehicleLocation->Data)) ? $vehicleLocation->Data[0] : 'null',
                'investorInfo' => (!empty($investorInfo)) ? $investorInfo->Data : 'null',
            );
        } else {
            $fle = DB::table('fleet')->where('assigned_to', Auth()->user()->id)->select('fleet_name')->get();
            foreach ($fle as $key => $value) {
                $fleet[] = $value->fleet_name;
            }
            // $cars = DB::table( 'vehicle_details_vms' )->orderBy( 'vehno', 'DESC' )->get();
            $cars = DB::table('vehicle_status')->whereIn('fleet', $fleet)->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get();
            //   dd( $cars );

            $cars3 = DB::table('vehicle_status')->whereIn('fleet', $fleet)->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();
            if ($cars[0]->latitude != 0.0) {
                $response =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $cars[0]->longitude . ',' . $cars[0]->latitude . '.json?key=' . $this->maptiller());
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
            // $placeAddress = $response->results[ 0 ]->formatted_address;
            //details from mygarage
            // $otherDetails = ( new ApiController )->get( 'https://test.mygarage.africa/api/other-details/bwr749fd' );
            // $otherDetails->remittanceAmount;
            $plate = $cars[0]->vehno;
            $investorphone = $cars[0]->investorphonenumber;
            $driverphone = $cars[0]->driverphone;
            $vehicleDetails = (new VMSAPI)->getVehicleRecord($plate);
            if (!empty($vehicleDetails)) {
                $vehicleLocation = (new VMSAPI)->getVehiclePosition($vehicleDetails->Data->systemno);
            }
            $driverDetails = (new VMSAPI)->getDriverInfo($driverphone);
            $investorInfo = (new VMSAPI)->getInvestorInfo($investorphone);
            //    $cars3 =  $cars->toArray();
            $data = array(
                'cars' => $cars,
                //  'otherDetails'=> $otherDetails,
                'driverDetail' => (!empty($driverDetails)) ? $driverDetails->Data : 'null',
                'vehicleDetails' => (!empty($vehicleDetails)) ? $vehicleDetails->Data : 'null',
                'vehicleLocation' => (!empty($vehicleLocation->Data)) ? $vehicleLocation->Data[0] : 'null',
                'investorInfo' => (!empty($investorInfo)) ? $investorInfo->Data : 'null',
            );
        }
        // return view( 'track-web', [ 'data' => $data ] );
        $single = 'all';

        // $api_key = $this->gogleApi();
        return view('track-web', compact('cars', 'data', 'cars3', 'placeAddress', 'single'));
    }

    public function index2($plateNo)
    {
        $cars = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->where('vehicle_status.vehno', $plateNo)->get();
        $cars3 = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();
        if ($cars[0]->latitude != 0.0) {
            $response =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $cars[0]->longitude . ',' . $cars[0]->latitude . '.json?key=' . $this->maptiller());
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
        //details from mygarage
        $otherDetails = (new ApiController)->get('https://test.mygarage.africa/api/other-details/' . $plateNo);

        $plate = $cars[0]->vehno;
        $investorphone = $cars[0]->investorphonenumber;
        $driverphone = $cars[0]->driverphone;
        $vehicleDetails = (new VMSAPI)->getVehicleRecord($plate);
        // dd($vehicleDetails);

        if (empty($vehicleDetails->Data->vehno)) {
            Alert::toast('Couldnt Fetch Record', 'failed');
            return back()->with("Emessage", "Couldnt Fetch Complete record");
        }

        if (!empty($vehicleDetails)) {
            $vehicleLocation = (new VMSAPI)->getVehiclePosition($vehicleDetails->Data->systemno ?? "00000000");
        }
        $driverDetails = (new VMSAPI)->getDriverInfo($driverphone);
        $investorInfo = (new VMSAPI)->getInvestorInfo($investorphone);
        $data = array(
            'cars' => $cars,
            'driverDetail' => (!empty($driverDetails)) ? $driverDetails->Data : 'null',
            'vehicleDetails' => (!empty($vehicleDetails)) ? $vehicleDetails->Data : 'null',
            'vehicleLocation' => (!empty($vehicleLocation->Data[0])) ? $vehicleLocation->Data[0] : 'null',
            'investorInfo' => (!empty($investorInfo)) ? $investorInfo->Data : 'null',

        );
        $single = 'single';
        return view('track-single', compact('cars', 'data', 'cars3', 'otherDetails', 'placeAddress', 'single'));
    }

    public function trackTest($plateNo)
    {
        $cars = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->where('vehicle_status.vehno', $plateNo)->get();
        $cars3 = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();
        if ($cars[0]->latitude != 0.0) {
            $response =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $cars[0]->longitude . ',' . $cars[0]->latitude . '.json?key=' . $this->maptiller());
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
        //details from mygarage
        $otherDetails = (new ApiController)->get('https://test.mygarage.africa/api/other-details/' . $plateNo);

        $plate = $cars[0]->vehno;
        $investorphone = $cars[0]->investorphonenumber;
        $driverphone = $cars[0]->driverphone;
        $vehicleDetails = (new VMSAPI)->getVehicleRecord($plate);
        // dd($vehicleDetails);

        if (empty($vehicleDetails->Data->vehno)) {
            Alert::toast('Couldnt Fetch Record', 'failed');
            return back()->with("Emessage", "Couldnt Fetch Complete record");
        }

        if (!empty($vehicleDetails)) {
            $vehicleLocation = (new VMSAPI)->getVehiclePosition($vehicleDetails->Data->systemno ?? "00000000");
        }
        $driverDetails = (new VMSAPI)->getDriverInfo($driverphone);
        $investorInfo = (new VMSAPI)->getInvestorInfo($investorphone);
        $data = array(
            'cars' => $cars,
            'driverDetail' => (!empty($driverDetails)) ? $driverDetails->Data : 'null',
            'vehicleDetails' => (!empty($vehicleDetails)) ? $vehicleDetails->Data : 'null',
            'vehicleLocation' => (!empty($vehicleLocation->Data[0])) ? $vehicleLocation->Data[0] : 'null',
            'investorInfo' => (!empty($investorInfo)) ? $investorInfo->Data : 'null',

        );

        $single = 'single';
        return view('track-test', compact('cars', 'data', 'cars3', 'otherDetails', 'placeAddress', 'single'));
    }

    public function search(Request $req)
    {
        $plateNo = $req->plateNo;
        // $mapKey = $this->gogleApi();
        // $cars = DB::table( 'vehicle_details_vms' )->orderBy( 'vehno', 'DESC' )->get();
        $cars = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->where('vehicle_status.vehno', $plateNo)->get();
        $cars3 = DB::table('vehicle_status')->join('vehicle_details_vms', 'vehicle_details_vms.vehno', 'vehicle_status.vehno')->get()->toArray();


        $response =  (new ApiController)->get('https://api.maptiler.com/geocoding/' . $cars[0]->longitude . ',' . $cars[0]->latitude . '.json?key=' . $this->maptiller());
        if ($response == null) {
            $placeAddress = 'not available';
            $label = '-';
            $single = 'singles';
        } else {
            $placeAddress = $response->features[0]->place_name . ", " . $response->features[1]->place_name;
            $label = $response->features[0]->place_name . ", " . $response->features[1]->place_name;
            $single = 'single';
        }


        //details from mygarage
        $otherDetails = (new ApiController)->get('https://test.mygarage.africa/api/other-details/' . $plateNo);
        // $otherDetails->remittanceAmount;
        $plate = $cars[0]->vehno;
        $investorphone = $cars[0]->investorphonenumber;
        $driverphone = $cars[0]->driverphone;
        $vehicleDetails = (new VMSAPI)->getVehicleRecord($plate);
        if (!empty($vehicleDetails)) {
            $vehicleLocation = (new VMSAPI)->getVehiclePosition($vehicleDetails->Data->systemno);
        }
        $driverDetails = (new VMSAPI)->getDriverInfo($driverphone);

        $investorInfo = (new VMSAPI)->getInvestorInfo($investorphone);
        //    $cars3 =  $cars->toArray();
        $data = array(
            'cars' => $cars,
            'driverDetail' => (!empty($driverDetails)) ? $driverDetails->Data : 'null',
            'vehicleDetails' => (!empty($vehicleDetails)) ? $vehicleDetails->Data : 'null',
            'vehicleLocation' => (!empty($vehicleLocation)) ? $vehicleLocation->Data[0] : 'null',
            'investorInfo' => (!empty($investorInfo)) ? $investorInfo->Data : 'null',
        );
        // return view( 'track-web', [ 'data' => $data ] );
        $single = 'single';
        return view('track-single', compact('cars', 'data', 'cars3', 'otherDetails', 'placeAddress', 'single'));
    }
}
