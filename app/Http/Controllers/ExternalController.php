<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class ExternalController extends Controller
{
    public function getAddress($lat, $long)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $long . '&key=AIzaSyDXua-cpwWEOGI5sekYuVRS2qEPEwT_pCo',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $res = json_decode(curl_exec($curl), true);
        return $placeAddress = $res['results'][0]['formatted_address'];

        curl_close($curl);
    }

 
}
