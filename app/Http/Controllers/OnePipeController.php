<?php

namespace App\Http\Controllers;

use App\Models\OnePipe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\CarFleet;

class OnePipeController extends Controller
{

    public function post($content, $sign)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env("ONEPIPE_URL"),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $content,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer ' . env("ONEPIPE_KEY"),
                'Signature: ' . $sign . '',
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
    public function get($url)
    {
        $url = "https://api.onepipe.io/v2/transact";
        //  env('ONEPIPE_API');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }



    public function getBalance($userId)
    {

        $user = User::where('id', $userId)->first();

        if ($user == null) {
            return ["respone" => "There was error while fetching account balance", "statusCode" => 402];
        }
        // return $userId;
        $acct = DB::table('onepipeaccounts')->where('userId', $user->id)->first();

        if ($acct == null) {
            $this->createOnePipe($user);
        }

        $secureEncc = $acct->acctNumber . ';' . $acct->bankCode;
        //  return dd($user->name);
        $pos = stripos(trim($user->name), " ");
        if ($pos != 0) {
            $name = str_split($user->name, $pos);
            $fname = $name[1];
            $lname = $name[0];
        } else {

            $fname = $user->name;
            $lname = $user->name;
        }
        $phone = substr($user->phone, 1);

        $id = $user->id;
        $phone = "234" . $phone;

        $secure = $this->encrypt($secureEncc, env("ONEPIPE_SECRET"));
        $reqref = rand(111111, 999999);
        $enc = $reqref . ";" . env("ONEPIPE_SECRET");
        $sign = md5($enc);

        $content =
            '{
            "request_ref":"' . $reqref . '",
            "request_type":"get_balance",
            "auth": {
            "type": "bank.account",
            "secure": "' . $secure . '",
            "auth_provider": "CheddaAccount",
            "route_mode": null
            },
            "transaction": {
            "mock_mode": "live",
            "transaction_ref": "' . $reqref . '",
            "transaction_desc": "Checking account balance",
            "transaction_ref_parent": null,
            "amount": 0,
            "customer":{
                "customer_ref": "' . $phone . '",
                "firstname": "' . $fname . '",
                "surname": "' . $lname . '",
                "email": "",
                "mobile_no": "' . $phone . '"
            },
            "meta":{
                "a_key":"a_meta_value_1",
                "another_key":"a_meta_value_2"
            },
            "details": {

            }
           }
        }';
        $response =  $this->post($content, $sign);
        $de = $response;

        if ($de->status == "Failed") {
            $availableBalance = 0;
        }

        $acctDetails = $de->data->provider_response;
        $availableBalance = $acctDetails->available_balance;
        $ledgerBalance = $acctDetails->ledger_balance;

        $user->acctBal = $availableBalance / 100;

        $user->save();
        $bank = DB::table('onepipeaccounts')->where('userId', $userId)->get();
        if ($availableBalance > 0) {
            $balance = $availableBalance / 100;


            return ['user' => $user, 'balance' => $balance, 'bank' => $bank];
        } else {
            return ['user' => $user, 'balance' => $availableBalance, 'bank' => $bank];
        }

        // echo $availableBalance;

    }


    public function collect($id, $paymentAmount)
    {
        // return $id;

        $user = User::where('id', $id)->first();
        if ($user == null) {

            //the id can be a loan details
            $loanDetails = $id;

            $phone = substr($loanDetails['phone'], 1);
            $phone = "234" . $phone;
            $nameArr = explode(" ", $loanDetails['name'], 2);

            $fname = $nameArr[0];
            $lname =  $nameArr[1];
            $phone = substr($loanDetails['phone'], 1);

            $phone = "234" . $phone;
            $sk = env("ONEPIPE_SECRET");

            $secureEncc = $loanDetails['accountNumber'] . ';' . $loanDetails['sortCode'];

            $secure = $this->encrypt($secureEncc, env("ONEPIPE_SECRET"));
            $reqref = date_create()->format('Uv') . rand(1151, 999);

            $enc = $reqref . ";" . $sk;
            $sign = md5($enc);
        } else {

            $onePipe = OnePipe::where('userId', $id)->first();

            $pos = strpos($user->name, " ");
            $id = $user->id;
            if ($pos != 0) {
                $name = str_split($user->name, $pos);
                $fname = $name[1];
                $lname = $name[0];
            } else {

                $fname = $user->name;
                $lname = $user->name;
            }
            $phone = substr($user->phone, 1);

            $phone = "234" . $user->phone;
            $sk = env("ONEPIPE_SECRET");

            $secureEncc = $onePipe->acctNumber . ';' . $onePipe->bankCode;

            $secure = $this->encrypt($secureEncc, env("ONEPIPE_SECRET"));
            $reqref = date_create()->format('Uv') . rand(1151, 999);

            $enc = $reqref . ";" . $sk;
            $sign = md5($enc);
        }

        $content = '{
            "request_ref":"' . $reqref . '",
            "request_type":"collect",
            "auth": {
                "type": "bank.account",
                "secure": "' . $secure . '",
                "auth_provider": "CheddaAccount",
                "route_mode":null
            },
            "transaction": {
                "mock_mode": "live",
                "transaction_ref": "' . $reqref . '",
                "transaction_desc": "Payment collection",
                "transaction_ref_parent": "",
                "amount": ' . $paymentAmount * 100 . ',
                "customer": {
                    "customer_ref": "' . $phone . '",
                    "firstname": "' . $fname . '",
                    "surname": "' . $lname . '",
                    "email": "",
                    "mobile_no": "' . $phone . '"
                },
                "meta":{
                    "a_key":"a_meta_value_1",
                    "another_key":"a_meta_value_2"
                },
                "details":null
            }
            }';

       return $this->post($content, $sign);
        // return json_decode($response);
    }

    public static function encrypt($data, $key, $encode = true)
    {

        $key = $key;

        $method = "des-ede3-cbc";
        $source = mb_convert_encoding($key, 'UTF-16LE', 'UTF-8');
        $key = md5($source, true);
        $key .= substr($key, 0, 16);
        $iv = "\0\0\0\0\0\0\0\0"; //Pad for PKCS7
        $encData = openssl_encrypt($data, $method, $key, $options = OPENSSL_RAW_DATA, $iv);
        return base64_encode($encData);
    }

    public function onePipeAccount($user, $json)
    {

        $onePipe = $json;
        $firstAcct = $onePipe->data->provider_response;
        $bankCode = $firstAcct->bank_code;
        $bank_name = $firstAcct->bank_name;
        $reference = $firstAcct->reference;
        $created_on = $firstAcct->created_on;
        $account_name = $firstAcct->account_name;
        $account_number = $firstAcct->account_number;
        $account_reference = $firstAcct->account_reference;
        $alt = $onePipe->data->provider_response->meta->alt_accounts;
        $insert = new OnePipe();
        $insert->userId = $user->id;
        $insert->bankName = $bank_name;
        $insert->bankCode = $bankCode;
        $insert->acctName = $account_name;
        $insert->acctNumber = $account_number;
        $insert->reference = $reference;
        $insert->customerReference = $account_reference;
        $insert->save();
        foreach ($alt as $key => $value) {
            DB::table('onepipeaccounts')->insert([
                "userId" => $user->id,
                "bankName" => $value->bank_name,
                "bankCode" => $value->bank_code,
                "acctName" => $value->account_name,
                "acctNumber" => $value->account_number,
                "reference" => $value->reference,
                "customerReference" => $value->account_reference,
                "created_at" => $value->created_on,
            ]);
            // $insert->save();
        }
    }


    public function getStatement($id)
    {
        $user = User::find($id);

        $onePipe = Onepipe::where('userId', $id)->first();

        $sk = "Te3QgCXAmcskBPL0";

        $secureEncc = $onePipe->acctNumber . ';' . $onePipe->bankCode;

        $secure = $this->encrypt($secureEncc, $sk);
        // $secure ="7tQoiW02EWUbtrD3wl2itWUwiW36s9Fck/oByd/V4bY=";
        $pos = strpos($user->name, " ");
        $phone = substr($user->phone, 1);
        $name = str_split($user->name, $pos);
        $fname = $name[1];
        $lname = $name[0];
        $id = $user->id;
        $phone = "234" . $phone;
        $reqref = rand(111111, 999999);
        $enc = $reqref . ";" . $sk;
        $sign = md5($enc);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.onepipe.io/v2/transact',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "request_ref":"' . $reqref . '",
            "request_type":"get_statement",
            "auth": {
                "type": "bank.account",
                "secure": "' . $secure . '",
                "auth_provider": "CheddaAccount",
                "route_mode": null
            },
            "transaction": {
                "mock_mode": "live",
                "transaction_ref": "' . $reqref . '",
                "transaction_desc": "Get user statement of account",
                "transaction_ref_parent": null,
                "amount": 0,
                "customer":{
                    "customer_ref": "' . $phone . '",

                    "firstname": "' . $fname . '",
                    "surname": "' . $lname . '",
                    "email": "",
                    "mobile_no": "' . $phone . '"
                },
                "meta":{
                    "a_key":"a_meta_value_1",
                    "another_key":"a_meta_value_2"
                },
                "details": {
                    "start_date": "2022-09-01",
                    "end_date": "2022-11-11"
                }
            }
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer S3zxStJDPeQfq4YYkEIH_ff97cb76dc0745b8affe2b8da2766b3c',
                'Signature: ' . $sign . '',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $res = json_decode($response);

        return $res->data->provider_response->statement_list;
    }



    public function createOnePipe($user)
    {
        $nameArr = explode(" ", trim($user->name), 2);
        $phone = substr($user->phone, 1);
        $fname = $nameArr[0];
        $lname =  $nameArr[1];
        $id = $user->id;
        $phone = "234" . $phone;
        $reqref = rand(111111, 999999);
        $sk = env('ONEPIPE_SECRET');
        $enc = $reqref . ";" . $sk;
        $sign = md5($enc);
        $content = '{
            "request_ref":"' . $reqref . '",
                "request_type": "open_account",
                "auth": {
                    "type": null,
                    "secure": null,
                    "auth_provider": "CheddaAccount",
                    "route_mode": null
                },
                    "transaction": {
                        "mock_mode": "live",
                        "transaction_ref": "' . $reqref . '",
                        "transaction_desc": "Create account",
                        "transaction_ref_parent": null,
                        "amount": 0,
                        "customer": {
                            "customer_ref": "' . $phone . '",
                            "firstname": "' . $fname . '",
                            "surname": "' . $lname . '",
                            "email": "",
                            "mobile_no": "' . $phone . '"
                        },
                        "meta": {
                         "grb_status": "pwt-active"
                        },
                        "details": {
                            "name_on_account": "' . $user->name . '",
                            "middlename": "string",
                            "dob": "2020-09-20-11-30-30",
                            "gender": "M",
                            "title": "Mr",
                            "address_line_1": "23, Okon street, Ikeja",
                            "address_line_2": "Ikeja",
                            "city": "lagos",
                            "state": "lagos",
                            "country": "NG"
                        }
                    }
                }';
        $json =  $this->post($content, $sign);
        return $this->onePipeAccount($user, $json);
    }

    public function createOnePipeAccount(Request $request)
    {
        $phone = substr($request->phone, 1);
        $fname = $request->fname;
        $lname =  $request->lname;
        $fullName = $fname . " " . $lname;

        $phone = "234" . $phone;
        $reqref = rand(111111, 999999);
        $sk = env('ONEPIPE_SECRET');
        $enc = $reqref . ";" . $sk;
        $sign = md5($enc);
        $content = '{
            "request_ref":"' . $reqref . '",
                "request_type": "open_account",
                "auth": {
                    "type": null,
                    "secure": null,
                    "auth_provider": "CheddaAccount",
                    "route_mode": null
                },
                    "transaction": {
                        "mock_mode": "live",
                        "transaction_ref": "' . $reqref . '",
                        "transaction_desc": "Create account",
                        "transaction_ref_parent": null,
                        "amount": 0,
                        "customer": {
                            "customer_ref": "' . $phone . '",
                            "firstname": "' . $fname . '",
                            "surname": "' . $lname . '",
                            "email": "",
                            "mobile_no": "' . $phone . '"
                        },
                        "meta": {
                         "grb_status": "pwt-active"
                        },
                        "details": {
                            "name_on_account": "' . $fullName . '",
                            "middlename": "string",
                            "dob": "2020-09-20-11-30-30",
                            "gender": "M",
                            "title": "Mr",
                            "address_line_1": "23, Okon street, Ikeja",
                            "address_line_2": "Ikeja",
                            "city": "lagos",
                            "state": "lagos",
                            "country": "NG"
                        }
                    }
                }';
        return  $json =  $this->post($content, $sign);
        // return $this->onePipeAccount($user, $json);
    }
    
    public function collectMoney($id)
    {

        $user = User::where('id', $id)->first();
        
            $paymentAmount = $user->acctBal;
            
            // $paymentAmount = 20;
            $onePipe = DB::table('onepipeaccounts')->where('userId', $id)->first();

            $pos = strpos($user->name, " ");
            $id = $user->id;
            if ($pos != 0) {
                $name = str_split($user->name, $pos);
                $fname = $name[1];
                $lname = $name[0];
            } else {

                $fname = $user->name;
                $lname = $user->name;
            }
            $phone = substr($user->phone, 1);

            $phone = "234" . $user->phone;
            $sk = env("ONEPIPE_SECRET");

            $secureEncc = $onePipe->acctNumber . ';' . $onePipe->bankCode;

            $secure = $this->encrypt($secureEncc, env("ONEPIPE_SECRET"));
            $reqref = date_create()->format('Uv') . rand(1151, 999);

            $enc = $reqref . ";" . $sk;
            $sign = md5($enc);
        

        $content = '{
            "request_ref":"' . $reqref . '",
            "request_type":"collect",
            "auth": {
                "type": "bank.account",
                "secure": "' . $secure . '",
                "auth_provider": "CheddaAccount",
                "route_mode":null
            },
            "transaction": {
                "mock_mode": "live",
                "transaction_ref": "' . $reqref . '",
                "transaction_desc": "Payment collection",
                "transaction_ref_parent": "",
                "amount": ' . $paymentAmount * 100 . ',
                "customer": {
                    "customer_ref": "' . $phone . '",
                    "firstname": "' . $fname . '",
                    "surname": "' . $lname . '",
                    "email": "",
                    "mobile_no": "' . $phone . '"
                },
                "meta":{
                    "a_key":"a_meta_value_1",
                    "another_key":"a_meta_value_2"
                },
                "details":null
            }
            }';

        $res = $this->post($content, $sign);
        if($res->status == "Successful"){
            toast('Money has been collected','success');
                   return redirect()->back();
            
        }
            toast('Sorry an error occured','error');
                   return redirect()->back();
        // return json_decode($response);
    }
    
        public function payOwner($userInfo, $paymentInfo)
    {

        $pos = strpos($userInfo['name'], " ");
        $phone = substr($userInfo['phone'], 1);

        if ($pos != 0) {
            $name = str_split($userInfo['name'], $pos);
            $fname = $name[1];
            $lname = $name[0];
        } else {

            $fname = $userInfo['name'];
            $lname = $userInfo['name'];
        }
        $phone = "234" . $phone;
        $sk = env("ONEPIPE_SECRET");

        $reqref = date_create()->format('Uv') . rand(1151, 999) . "_" . $paymentInfo['vehiclePlateNo'];
        $enc = $reqref . ";" . $sk;
        $sign = md5($enc);
        $content = '{
        "request_ref":"' . $reqref . '",
        "request_type": "disburse",
        "auth": {
            "type": null,
            "secure": null,
            "auth_provider": "CheddaAccount",
            "route_mode": null
        },
      "transaction": {
        "mock_mode": "live",
        "transaction_ref": "' . $reqref . '",
        "transaction_desc": "' . $paymentInfo['description'] . '",
        "transaction_ref_parent": null,
        "amount": ' . $paymentInfo['amount'] * 100 . ',
        "customer": {
          "customer_ref": "' . $phone . '",

          "firstname": "' . $fname . '",
          "surname": "' . $lname . '",
          "email": "",
          "mobile_no": "' . $phone . '"
        },
        "meta": {
            "a_key": "a_meta_value_1",
            "another_key": "a_meta_value_2"
        },
        "details": {
            "destination_account": "' . $userInfo['accountNumber'] . '",
            "destination_bank_code": "' . $userInfo['sortCode'] . '"
                }
            }
        }';

        $res = $this->post($content, $sign);
        // $res = json_decode($response);

        // if ($res->status == "Successful") {
        //insert intodisburse hitory
        DB::table('disburse_history')->insert([
            "name" => $userInfo['name'],
            "email" => $userInfo['email'],
            "phone" => $userInfo['phone'],
            "accountNumber" => $userInfo['accountNumber'],
            "sortCode" => $userInfo['sortCode'],
            "amount" => $paymentInfo['amount'],
            "created_at" => Carbon::now(),
            "vehiclePlateNo" => $paymentInfo['vehiclePlateNo'],
            "status" => $res->status

        ]);
        // }
        return $res;
    }

}
