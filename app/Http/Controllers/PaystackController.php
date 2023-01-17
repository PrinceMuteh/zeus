<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PaystackController extends Controller {

    public $livekey =  'sk_live_12e6c31bcde127cf59c5d5cb0a340c47c217d4c6';

    public function checkAccountNumber( $accountNumber, $bankCode ) {
        $url = "https://api.paystack.co/bank/resolve?account_number=$accountNumber&bank_code=$bankCode";
        return $this->payget( $url );
    }

    public function getTransferReceipt() {
        $url = 'https://api.paystack.co/transferrecipient';
        return $this->payget( $url );
    }

    public function getTransferList() {
        $url = 'https://api.paystack.co/transfer';
        return $this->payget( $url );
    }

    public function createTransferReceipt( $name, $account, $bankCode ) {
        $url = 'https://api.paystack.co/transferrecipient';
        $content = array(
            'type' => 'nuban',
            'name' => $name,
            'account_number'=> $account ,
            'bank_code' => $bankCode,
            'currency' => 'NGN'
        );
        return $this->postget( $url, $content );
    }

    public function init_transfer( Request $request ) {
        $accountNumber = $request->accountNumber;
        $bankCode =  $request->bankCode;
        $amount = abs( $request->amount );
        $desc = $request->desc;
        $name = $request->name;

        $result = $this->checkAccountNumber( $accountNumber,  $bankCode );
        if ( $result ) {
            $result =  $this->createTransferReceipt( $name, $accountNumber, $bankCode );
            if ( $result ) {
                $recipientCode = $result->data->recipient_code;
                return $this->transfer( $amount, $recipientCode, $desc );
            } else {
                return response()->json( $result );
            }
        } else {
            return response()->json( $result );
        }
    }

    public function transfer( $amount, $rep, $desc ) {
        $curl = curl_init();
        curl_setopt_array( $curl, array(
            CURLOPT_URL => 'https://api.paystack.co/transfer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS =>'{
            "source": "balance",
            "amount" : '.$amount.',
            "recipient" : '.$rep.',
            "reason": '.$desc.'
        }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '. $this->livekey,
                'Content-Type: application/json',
            ),
        ) );
        $response = curl_exec( $curl );
        curl_close( $curl );
        return json_encode( $response );
    }

    public function payget( $url ) {
        $curl = curl_init();
        curl_setopt_array( $curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '. $this->livekey,
            ),
        ) );

        $response = curl_exec( $curl );

        curl_close( $curl );

        return json_decode( $response );
    }

    public function paypost( $url, $content ) {

        $curl = curl_init();

        curl_setopt_array( $curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode( $content ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '. $this->livekey,
                'Content-Type: application/json',
            ),
        ) );

        $response = curl_exec( $curl );

        curl_close( $curl );
        return json_decode( $response );

    }
}
