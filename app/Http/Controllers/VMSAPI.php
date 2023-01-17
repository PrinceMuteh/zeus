<?php
namespace App\Http\Controllers;

class VMSAPI {
    public $random_gen;
    public $startTime;
    public $endTime;
    public $tracking_id;
    public $f;
    public $utc;
    public $signature;
    public $plate_no;
    public $phone_no;
    public $vehId;
    public $orderid;
    public $email;
    public $amount;
    public $AccessKeyId;
    public $AccessKeyPassword;
    public $systemNo;

    function  __construct() {
        $v1 = $this->random_gen( 8 );
        $v2 = $this->random_gen( 4 );
        $v3 = $this->random_gen( 4 );
        $v4 = $this->random_gen( 4 );
        $v5 = $this->random_gen( 12 );

        date_default_timezone_set( 'Asia/Shanghai' );

        $this->utc = time();
        $this->f = $v1 . '-' . $v2 . '-' . $v3 . '-' . $v4 . '-' . $v5;

        $this->AccessKeyId = '20200629201354671525838fd04e2a2';
        $this->AccessKeyPassword = 'a355fd993194430a8bef8153eb6412b2';
    }

    public function random_gen( $length ) {
        $random = '';
        srand( ( float )microtime() * 1000000 );
        $char_list = 'abcdefghijklmnopqrstuvwxyz';
        $char_list .= '1234567890';
        // Add the special characters to $char_list if needed
        for ( $i = 0; $i < $length; $i++ ) {
            $random .= substr( $char_list, ( rand() % ( strlen( $char_list ) ) ), 1 );
        }
        $this->random_gen = $random;
    }

    public function genTime( $t ) {
        $time = date( 'Y-m-d', $t );
        return $time;
    }

    public function set_end( $val ) {
        $this->endTime = $this->genTime( $val );
    }

    public function set_systemNo( $val ) {
        $this->systemNo = $val;
    }

    public function set_start( $val ) {
        $this->startTime = $this->genTime( $val );
    }

    public function getTime() {
        return $this->startTime . ' </b> ' . $this->endTime;
    }

    public function plateNo( $val ) {
        $this->plate_no = $val;
    }

    private function fet( $sign ) {

        $privateKey = $this->AccessKeyPassword;
        //a355fd993194430a8bef8153eb6412b2
        $encr = urlencode( $sign );
        $url = "http://opendocs.farknowgps.com/signatureHandler.ashx?content=$encr&privateKey=$privateKey";
        // Initialize a CURL session.
        $ch = curl_init();
        // Return Page contents.v/
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        //grab URL and pass it to the variable.
        curl_setopt( $ch, CURLOPT_URL, $url );
        $response = curl_exec( $ch );
        $response = json_decode( $response );
        // return $response;
        $signature = $response->data->signedText;

        $url = 'https://connect.envio.com.ng/v1/api/sdk/gateway?Signature=' . $signature . '&' . $sign;
        // Initialize a CURL session.
        $ch = curl_init();
        // Return Page contents.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        //grab URL and pass it to the variable.
        curl_setopt( $ch, CURLOPT_URL, $url );
        $result = curl_exec( $ch );
        // return all api result
        return json_decode( $result );
    }

    public function All_record() {
        // fetch entire record
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetUserVehicle&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0';
        return $this->fet( $sign );
        // return $sign;
    }

    public function getVehicleRecord( $plate ) {
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetVehInfo&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0&vehno=' . $plate;
        return $this->fet( $sign );
    }

    public function getTrack() {
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetVehicleTrack&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&SystemNo=' . $this->systemNo . '&Timestamp=' . $this->utc . '&Version=1.0&endTime=' . $this->endTime . '&startTime=' . $this->startTime;
        return $this->fet( $sign );
    }

    public function getVehicleOverDue( $date, $page ) {
        // return $date;
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetOverdueVehicles&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0&date='.$date.'&page='.$page;
        // return  'AccessKeyId=' . $this->AccessKeyId . '&Action=GetOverdueVehicles&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0&date=2022-07-14&page=200';
        return $this->fet( $sign );
    }

    public function defaultOverDue() {
        // return $date;
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetOverdueVehicles&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0';
        // return  'AccessKeyId=' . $this->AccessKeyId . '&Action=GetOverdueVehicles&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0&date=2022-07-14&page=200';
        return $this->fet( $sign );
    }

    public function getDriverInfo( $phone ) {
        // get driver  info by there phone no
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetDriverInfo&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0&phone=' . $phone;
        return $this->fet( $sign );
    }

    public function getVehiclePosition( $plate ) {
        // get vehicle current postion                                                                                                                $sign = '&SignatureVersion=1.0&SystemNo=13304017475%2C13305015033&Timestamp=1641231328&Version=1.0';
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetVehiclePosition&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&SystemNo=' . $plate . '&Timestamp=' . $this->utc . '&Version=1.0';
        return $this->fet( $sign );
    }

    public function getInvestorInfo( $phone ) {
        // get inveestor info by there phone no
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetInvestorInfo&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0&phone=' . $phone;
        return $this->fet( $sign );
    }
  

    public function get_vehicle_recent_payment( $plate ) {
        // fetch due date
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetVehLastPaymentStatus&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0&vehno=' . $plate;
        return $this->fet( $sign );
    }

      public function get_pay_bill($vehno)
 {
        // show record of all payment
        $sign = 'AccessKeyId=' . $this->AccessKeyId . '&Action=GetDriverPaybill&Format=json&SignatureMethod=HMAC-SHA1&SignatureNonce=' . $this->f . '&SignatureVersion=1.0&Timestamp=' . $this->utc . '&Version=1.0&vehno=' . $vehno;
        return $this->fet( $sign );
    }

}

