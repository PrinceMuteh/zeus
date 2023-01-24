<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;


class DriverController extends Controller
{

    public function sql2(){
        return  DB::connection('mysql_2');
    }

    public function loginz(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        $user = DB::table('users')->where(['email' => $request->email, 'password' => $request->password])->first();
        if ($user) {
            session(['email' => $user->email]);
            session(['name' => $user->name]);
            session(['DriverId' => $user->name]);
            return redirect()->route($user->last_link);
        } else {
            return redirect()->route('driverRegistration')->with('Emessage', 'Login Details not correct');
        }
    }



    public function driverRegistration()
    {
        // Step 1
        return view('driver/driver-registration');
    }
    public function driverRegistration2(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|max:255',
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'dob' => 'required',
            'city' => 'required',
            'address' => 'required',
            'country' => 'required',
        ]);
        $user = DB::table('users')->where('email', $request->email)->first();
        // dd($user);
        if ($user) {
            session(['email' => $user->email]);
            return redirect()->route($user->last_link);
        }
        $body = array(
            'name'    =>  $request->fname . " " . $request->lname,
            'email'   =>  $request->email,
            'phone'   =>  $request->phone,
            'address'   =>  $request->address,
            'town' => $request->city,
            'dob' => $request->dob,
            'country' => $request->country,
            'password' => $request->phone,
            'last_link' => "driverEducation",
            'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
        );
        // dd($body);
        if (isset($request->bills)) {
            $lo = 'DriverUpload/';
            $filename = $this->upload($request, 'bills', $lo);
            $utilityImage =  url('') . "/" . $lo . strtolower($filename);
            $body = $body + array('utilityBill' => $utilityImage);
        }
        if (isset($request->tenancyAgreement)) {
            $lo = 'DriverUpload/';
            $filename = $this->upload($request, 'tenancyAgreement', $lo);
            $tenancy =  url('') . "/" . $lo . strtolower($filename);
            $body = $body + array('tenancyAgree' => $tenancy);
        }
        // dd($body);

        // insert in database
        $users =   DB::table('users')->insertGetId($body);
        DB::table('gurantors_info')->insertGetId([
            'Driver_FIRST_NAME'    =>  $request->fname,
            'Driver_LAST_NAME'   =>  $request->lname,
            'Driver_EMAIL'   =>  $request->email,
            'Driver_phone'   =>  $request->phone,
            'Driver_ADDRESS'   =>  $request->address,
            'Driver_DOB' => $request->dob,
            'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
        ]);
        // Auth::loginUsingId($result);
        session(['email' => $request->email]);
        $name = $request->fname . " " . $request->lname;
        session(['name' => $name]);
        session(['DriverId' => $users]);

        // redirect to step 2
        return redirect()->route('driverEducation');
    }

    public function driverEducation()
    {
        // Step 2
        return view('driver/driver-education');
    }
    public function driverEducation2(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'primary' => 'required|max:255',
            'primaryCity' => 'required',
            'secondary' => 'required',
            'secondaryCity' => 'required',
            'university' => 'required',
            'universityCity' => 'required',
        ]);
        $body = array(
            'primaryname' => $request->primary,
            'primaryCity' => $request->primaryCity,
            'secondaryname' => $request->secondary,
            'secondaryCity' => $request->secondaryCity,
            'universityname' => $request->university,
            'universityCity' => $request->universityCity,
            'last_link' => "relativeData",
            'updated_at' =>  Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
        );

        if (isset($request->uploadPrimary)) {
            $lo = 'DriverUpload/';
            $filename = $this->upload($request, 'uploadPrimary', $lo);
            $imageName =  url('') . "/" . $lo . strtolower($filename);
            $body = $body + array('primayCert' => $imageName);
        }
        if (isset($request->uploadSecondary)) {
            $lo = 'DriverUpload/';
            $filename = $this->upload($request, 'uploadSecondary', $lo);
            $imageName =  url('') . "/" . $lo . strtolower($filename);
            $body = $body + array('secondaryCert' => $imageName);
        }
        if (isset($request->uploadUniversity)) {
            $lo = 'DriverUpload/';
            $filename = $this->upload($request, 'uploadUniversity', $lo);
            $imageName =  url('') . "/" . $lo . strtolower($filename);
            $body = $body + array('UniversityCert' => $imageName);
        }
        // dd($body);
        $app = DB::table('users')
            ->where('id', session('DriverId'))
            ->update($body);
        // proceed to step 3
        return redirect()->route('relativeData');
    }



    public function relativeData()
    {
        return view('driver/driver-relative-data');
    }
    public function relativeData2(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'relative' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'country' => 'required',
        ]);

        $app = DB::table('gurantors_info')
            ->where('Driver_EMAIL', session('email'))
            ->update([
                'RELATIVE_TYPE' => $request->relative,
                'RELATIVE_NAME' => $request->fname . " " . $request->lname,
                'RELATIVE_ADDRESS' => $request->address,
                'RELATIVE_PHONE' => $request->phone,
                'RELATIVE_EMAIL' => $request->email,
                'RELATIVE_DOB' => $request->dob,
                'RELATIVE_COUNTRY' => $request->country,
                'updated_at' =>  Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
            ]);

        $app = DB::table('users')
            ->where('id', session('DriverId'))
            ->update([
                'last_link' => "workExperience",
            ]);

        return redirect()->route('workExperience');
        // return view('driver/driver-relative-data');
    }





    public function workExperience()
    {
        return view('driver/driver-work-experience');
    }
    public function workExperience2(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'company' => 'required',
            'jobTitle' => 'required',
            'duration' => 'required',
            'city' => 'required',
            'address' => 'required',
            'referenceNumber' => 'required',
            'supervisor' => 'required',
        ]);

        $app = DB::table('gurantors_info')
            ->where('Driver_EMAIL', session('email'))
            ->update([
                'company' => $request->company,
                'jobTitle' => $request->jobTitle,
                'workDuration' => $request->duration,
                'workCity' => $request->city,
                'workAddress' => $request->address,
                'supervisorName' => $request->supervisor,
                'supervisorPhone' => $request->referenceNumber,
                'updated_at' =>  Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
            ]);
        $app = DB::table('users')
            ->where('id', session('DriverId'))
            ->update([
                'last_link' => "driverReferences",
            ]);

        return redirect()->route('driverReferences');
    }

    public function driverReferences()
    {
        return view('driver/driver-references');
    }

    public function driverReferences2(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'lname' => 'required',
            'fname' => 'required',
            'phone' => 'required',
            'relationship' => 'required',
            'address' => 'required',
            'city' => 'required',
            'company' => 'required',
        ]);
        $app = DB::table('gurantors_info')
            ->where('Driver_EMAIL', session('email'))
            ->update([
                'REFRENCES_NAME' =>  $request->fname . " " . $request->lname,
                'REFRENCES_ADDRESS' => $request->address,
                'REFRENCES_PHONE' => $request->phone,
                'REFRENCES_RELATIONSHIP' => $request->relationship,
                'REFRENCES_COMPANY' => $request->company,
                'REFRENCES_CITY' => $request->city,
                'updated_at' =>  Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
            ]);
        $app = DB::table('users')
            ->where('id', session('DriverId'))
            ->update([
                'last_link' => "bankDetails",
            ]);

        return redirect()->route('bankDetails');
    }


    public function bankDetails()
    {
        return view('driver/driver-bank-details');
    }
    public function bankDetails2(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'accountName' => 'required',
            'accountNumber' => 'required|min:10',
            'bank' => 'required',
        ]);
        $bank = explode(",", $request->bank);
        $sortCode = $bank[0];
        $bankName = $bank[1];

        // dd($sortCode);

        $app = DB::table('users')
            ->where('id', session('DriverId'))
            ->update([
                "bankName" => $bankName,
                "accountNumber" => $request->accountNumber,
                "sortCode" => $sortCode,
                'last_link' => "additionalInfo",
            ]);
        return redirect()->route('additionalInfo');
    }


    public function additionalInfo()
    {
        return view('driver/driver-additional-info');
    }
    public function additionalInfo2(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'additionalSkill' => 'required',
            'hobby' => 'required',
        ]);

        $app = DB::table('users')
            ->where('id', session('DriverId'))
            ->update([
                "hobby" => $request->hobby,
                "skills" => $request->additionalSkill,
                'last_link' => "guarnatorOneBio",
            ]);

        return redirect()->route('guarnatorOneBio');
        // return view('driver/driver-additional-info');
    }

    public function guarnatorOneBio()
    {
        return view('driver/driver-guarantor-one-bio');
    }
    public function guarnatorOneBio2(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job' => 'required',
        ]);

        $app = DB::table('gurantors_info')
            ->where('Driver_EMAIL', session('email'))
            ->update([
                "GUARANTOR_NAME" => $request->fname . " " . $request->lname,
                "GUARANTOR_PHONE" => $request->phone,
                "GUARANTOR_EMAIL" => $request->email,
                "GUARANTOR_JOB_DESC" => $request->job,
                "GUARANTOR_ADDRESS" => $request->address,
                "GUARANTOR_COMPANY" => $request->organisation,
                "GUARANTOR_COMPANY_ADDRESS" => $request->orgAddress,
                "GUARANTOR_LEVEL" => $request->level,
            ]);


        $Dname = session('name');
        $Gname = $request->fname . " " . $request->lname;
        $ID = Crypt::encrypt(session('DriverId'));
        $link = url('') . "/driver" . "/". "guarantor-registration/" . $ID . "/" . $request->email;
        if ((new MailerController)->sendGurantorEmail($Gname, $Dname, $link, $request->email)) {
            $app = DB::table('users')
                ->where('id', session('DriverId'))
                ->update([
                    'last_link' => "guarnatorTwoBio",
                ]);
            DB::table('gurantors')->insert([
                'driver_id'    =>  session('DriverId'),
                'first_name'    =>  $request->fname,
                'last_name'   =>  $request->lname,
                'email'   =>  $request->email,
                'phone_no'   =>  $request->phone,
                'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
            ]);
            return redirect()->route('guarnatorTwoBio');
        } else {
            return back()->with("Emessage", "Failed to send Email to Gurantor");
        }
        // guarnatorTwoBio
    }

    public function guarnatorTwoBio()
    {
        return view('driver/driver-guarantor-two-bio');
    }
    public function guarnatorTwoBio2(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job' => 'required',
        ]);
        $app = DB::table('gurantors_info')
            ->where('Driver_EMAIL', session('email'))
            ->update([
                "GUARANTOR2_NAME" => $request->fname . " " . $request->lname,
                "GUARANTOR2_PHONE" => $request->phone,
                "GUARANTOR2_EMAIL" => $request->email,
                "GUARANTOR2_JOB_DESC" => $request->job,
                "GUARANTOR2_ADDRESS" => $request->address,
                "GUARANTOR2_COMPANY" => $request->organisation,
                "GUARANTOR2_COMPANY_ADDRESS" => $request->orgAddress,
                "GUARANTOR2_LEVEL" => $request->level,
            ]);
        $Dname = session('name');
        $Gname = $request->fname . " " . $request->lname;
        $ID = Crypt::encrypt(session('DriverId'));
        $link = url('')  . "/driver" . "/".  "guarantor-registration/" . $ID . "/" . $request->email;
        if ((new MailerController)->sendGurantorEmail($Gname, $Dname, $link, $request->email)) {
            (new MailerController)->sendDriverEmail($Dname,  session('email'));
            $app = DB::table('users')
                ->where('id', session('DriverId'))
                ->update([
                    'last_link' => "driverConfirm",
                ]);
            DB::table('gurantors')->insert([
                'driver_id'    =>  session('DriverId'),
                'first_name'    =>  $request->fname,
                'last_name'   =>  $request->lname,
                'email'   =>  $request->email,
                'phone_no'   =>  $request->phone,
                'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),
            ]);
            return redirect()->route('driverConfirm');
        } else {
            return back()->with('Emessage', 'Failed to send Email to Gurantor');
        }
        // return view('driver/driver-guarantor-two-bio');
    }





    public function confirm()
    {
        return view('driver/driver-confirm');
    }




    public function driverIdentification()
    {
        return view('driver/driver-identification');
    }
    public function driverSubmit()
    {
        return view('driver/driver-submit');
    }



    public function guarnatorOneReg($id, $email)
    {
        $ID = Crypt::decrypt($id);
        // $user = DB::table('users')->where('id', $ID)->first();
        $Ginfo = DB::table('gurantors')->where(['driver_id' => $ID, 'email' => $email])->first();
        // dd($Ginfo);
        session(['driverID' => $ID]);
        session(['gurantorsID' => $Ginfo->id]);
        return view('driver/guarantor-one-registration', ['user' => $Ginfo]);
    }

    public function guarnatorOneReg2(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            "dob" => 'required',
            "phone" => 'required',
            "state" => 'required',
            "address" => 'required',
            "landmark" => 'required',
            "nin" => 'required',
            "driverLicense" => 'required',
            "bvn" => 'required',
            "criminalRecord" => 'required',
            "country" => 'required',
            "authorise" => 'required',
            "educationLevel" => 'required',
            "qualification" => 'required',
            "file" => 'required',
        ]);

        // dd($request->all());

        $data = array(
            "dob" => $request->dob,
            "phone_no" => $request->phone,
            "state" => $request->state,
            "address" => $request->address,
            "landmark" => $request->landmark,
            "nin" => $request->nin,
            "driver_license" => $request->driverLicense,
            "bvn" => $request->bvn,
            "criminal_record" => $request->criminalRecord,
            "nationality" => $request->country,
            "authorize_nigeria" => $request->authorise,
            "education_level" => $request->educationLevel,
            "proff_qualification" => $request->qualification,
            'created_at' => Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString(),

        );
        if (isset($request->file)) {
            $lo = 'DriverUpload/';
            $filename = $this->upload($request, 'file', $lo);
            $utilityImage =  url('') . "/" . $lo . strtolower($filename);
            $data = $data + array('identification' => $utilityImage);
        }

        $app = DB::table('gurantors')
            ->where('id', session('gurantorsID'))
            ->update($data);

        if ($app) {
            return redirect()->route('driverConfirm');
        } else {
            return back()->with("Emessage", "An Error Occured");
        }
    }


    public function guarnatorTwoReg()
    {
        return view('driver/guarantor-two-registration');
    }






    public static function upload(Request $request, $file, $location)
    {
        $file = $request->file($file);
        $filename = time() . '_' . $file->getClientOriginalName();
        // File extension
        $extension = $file->getClientOriginalExtension();
        // File upload location
        $locate = $location;
        // Upload file
        $file->move($location, strtolower($filename));
        // File path
        $filepath = url($location . $filename);
        return $filename;
    }
}
