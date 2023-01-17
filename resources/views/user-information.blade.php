@extends('main')
@section('content')
    <style>
        div.scroll {
            /* background-color: #fed9ff; */
            /* width: 600px; */
            max-height: 300px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: center;
            padding: 20px;
        }
    </style>

    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-4">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle text-inter pb-0 pl-0">
                            <a href="{{ url()->previous() }}">
                                <img src="{{ asset('assets/images/arrow-left.svg') }}" alt="" />
                            </a>
                            User Information
                        </p>
                    </div>
                    <a href="" class="addBtn">SHARE PROFILE</a>
                </div>

                <div class="row mt-3 g-2">
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="mainBox">

                            <div class="top-mainBox">
                                <p class="sub1 text-inter">Driver Details</p>
                                <img src="{{ asset('assets/images/dots.svg') }}" height="20" width="20"
                                    alt="" />
                            </div>
                            <div class="top-secondBox">
                                <div class="imageUser">
                                    <img src="https://test.mygarage.africa/user.png" alt="" />
                                </div>
                            </div>

                            @isset($data['driverDetail'])
                                <div class="top-thirdBox pl-2 pr-2">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-6 side1">NAME:</div>
                                            <div class="col-6 side2">
                                                {{ $data['driverDetail']->firstname ?? '-' }}
                                                {{ $data['driverDetail']->lastname ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">PHONE NO.:</div>
                                            <div class="col-6 side2">
                                                {{ $data['driverDetail']->phone ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">EMAIL:</div>
                                            <div class="col-6 side2">
                                                {{ $data['driverDetail']->email ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">START DATE:</div>
                                            <div class="col-6 side2">{{ $data['allVehicle']->createtime ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">PAYMENT GOAL:</div>
                                            <div class="col-6 side2">-</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">TOTAL CONTRIBUTED:</div>
                                            <div class="col-6 side2">₦ {{ number_format($data['totalPayment'], 2) ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">NEXT PAYMENT:</div>
                                            <div class="col-6 side2">{{ $data['recentPayment']->lastUnpaid->duedate ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">Package:</div>
                                            <div class="col-6 side2"> {{ $data['driverDetail']->package ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="downloadSection">
                                <button class="download">Download Transaction History</button>
                            </div>
                        </div>

                        {{-- id": 535
    +"Driver_FIRST_NAME": "MOHAMMED"
    +"Driver_LAST_NAME": "AKAWU"
    +"Driver_DOB": "5/10/1973"
    +"Driver_ADDRESS": "SONE D MUKO VILLAGE ABUJA"
    +"Driver_PHONE": "8158560070"
    +"Driver_ALTERNATIVE_PHONE": null
    +"Driver_EMAIL": null
    +"RELATIVE_NAME": null
    +"RELATIVE_ADDRESS": null
    +"RELATIVE_PHONE": null
    +"RELATIVE_ALTERNATIVE_PHONE": null
    +"RELATIVE_EMAIL": null

    +"REFRENCES_NAME": "OLOCHE OTENE GABRIEL"
    +"REFRENCES_RELATIONSHIP": "COUSIN"
    +"REFRENCES_COMPANY": "NIGERIA POLICE FORCE"
    +"REFRENCES_ADDRESS": "FCT COMMAND ABUUJA"
    +"REFRENCES_PHONE": "8072359611"

    +"REFRENCES2_NAME": "OGBA EGAJE"
    +"REFRENCES2_RELATIONSHIP": "BROTHER"
    +"REFRENCES2_COMPANY": "NIGERIA POLICE FORCE"
    +"REFRENCES2_ADDRESS": "AREA COMMAND NEW NYANYA"
    +"REFRENCES2_PHONE": "8036525923"

    +"GUARANTOR_NAME": "MR OGBA EGAJI"
    +"GUARANTOR_PHONE": "8036525923"
    +"GUARANTOR_ADDRESS": "TUDUN WADA MASAKA"
    +"GUARANTOR_COMPANY": "NIGERIA POLICE FORCE"
    +"GUARANTOR_COMPANY_ADDRESS": "AREA COMMAND HEADQUARTERS KARU"

    +"GUARANTOR_LEVEL": "7"

    +"GUARANTOR2_NAME": "MR OLOCHE OTENE GARIEL"
    +"GUARANTOR2_PHONE": "8072359611"
    +"GUARANTOR2_ADDRESS": "KARMO VILLAGE FCT"
    +"GUARANTOR2_COMPANY": "NIGERIA POLICE FORCE"
    +"GUARANTOR2_COMPANY_ADDRESS": "FCT COMMAND ABUJA"
    +"GUARANTOR2_LEVEL": "7" --}}

                        {{-- {{dd($data['garantor'])}} --}}
                        @if ($data['garantor'] != 'null')
                            <div class="mainBox mt-3">
                                <div class="top-mainBox">
                                    <p class="sub1 text-inter">Gurantors Information</p>
                                </div>
                                <div class="top-thirdBox pl-2 pr-2">
                                    <div class="container-fluid scroll">
                                        <div class="row mb-2">
                                            <div class="col-6 side1">NAME:</div>
                                            <div class="col-6 side2">
                                                {{ $data['garantor']->GUARANTOR_NAME ?? ('-' ?? '-') }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">PHONE NO.:</div>
                                            <div class="col-6 side2">
                                                {{ $data['garantor']->GUARANTOR_PHONE ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">OCCUPATION:</div>
                                            <div class="col-6 side2">
                                                {{ $data['garantor']->GUARANTOR_COMPANY ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">LEVEL:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR_LEVEL ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">ADDRESS:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR_ADDRESS ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">Company Address:</div>
                                            <div class="col-6 side2">
                                                {{ $data['garantor']->GUARANTOR_COMPANY_ADDRESS ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-mainBox">
                                    <p class="sub1 text-inter">Documents</p>
                                </div>
                                <div class="top-thirdBox pl-2 pr-2">
                                    <div class="container-fluid">
                                        <div class="attachements"></div>
                                    </div>
                                </div>

                                <div class="top-thirdBox pl-2 pr-2">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-6 side1">NAME:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_NAME ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">PHONE NO.:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_PHONE ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">OCCUPATION:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_PHONE ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">LEVEL:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_LEVEL ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">ADDRESS:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_ADDRESS ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">Company Address:</div>
                                            <div class="col-6 side2">
                                                {{ $data['garantor']->GUARANTOR2_COMPANY_ADDRESS ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-mainBox">
                                    <p class="sub1 text-inter">Documents</p>
                                </div>
                                <div class="top-thirdBox pl-2 pr-2">
                                    <div class="container-fluid">
                                        <div class="attachements"></div>
                                    </div>
                                </div>
                                {{-- REferrer --}}
                                @isset($data['garantor']->REFRENCES_NAME)
                                    <div class="top-mainBox">
                                        <p class="sub1 text-inter">Referrer Information</p>
                                    </div>
                                    <div class="top-thirdBox pl-2 pr-2">
                                        <div class="container-fluid">
                                            <div class="row mb-2">
                                                <div class="col-6 side1">NAME:</div>
                                                <div class="col-6 side2">{{ $data['garantor']->REFRENCES_NAME ?? '-' }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 side1">RELATIONSHIP.:</div>
                                                <div class="col-6 side2">
                                                    {{ $data['garantor']->REFRENCES_RELATIONSHIP ?? '-' }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 side1">COMPANY:</div>
                                                <div class="col-6 side2">{{ $data['garantor']->REFRENCES_COMPANY ?? '-' }}
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 side1">PHONE:</div>
                                                <div class="col-6 side2">{{ $data['garantor']->REFRENCES_PHONE ?? '-' }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 side1">ADDRESS:</div>
                                                <div class="col-6 side2">{{ $data['garantor']->REFRENCES_ADDRESS ?? '-' }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="top-mainBox">
                                        <p class="sub1 text-inter">Documents</p>
                                    </div>
                                    <div class="top-thirdBox pl-2 pr-2">
                                        <div class="container-fluid">
                                            <div class="attachements"></div>
                                        </div>
                                    </div>
                                @endisset

                                <div class="top-thirdBox pl-2 pr-2">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-6 side1">NAME:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_NAME ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">PHONE NO.:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_PHONE ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">OCCUPATION:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_PHONE ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">LEVEL:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_LEVEL ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">ADDRESS:</div>
                                            <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_ADDRESS ?? '-' }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">Company Address:</div>
                                            <div class="col-6 side2">
                                                {{ $data['garantor']->GUARANTOR2_COMPANY_ADDRESS ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-mainBox">
                                    <p class="sub1 text-inter">Documents</p>
                                </div>
                                @isset($data['garantor']->REFRENCES2_NAME)
                                    <div class="top-thirdBox pl-2 pr-2">
                                        <div class="container-fluid">
                                            <div class="row mb-2">
                                                <div class="col-6 side1">NAME:</div>
                                                <div class="col-6 side2">{{ $data['garantor']->REFRENCES2_NAME ?? '-' }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 side1">RELATIONSHIP.:</div>
                                                <div class="col-6 side2">
                                                    {{ $data['garantor']->REFRENCES2_RELATIONSHIP ?? '-' }}
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 side1">COMPANY:</div>
                                                <div class="col-6 side2">{{ $data['garantor']->REFRENCES2_COMPANY ?? '-' }}
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 side1">PHONE:</div>
                                                <div class="col-6 side2">{{ $data['garantor']->REFRENCES2_PHONE ?? '-' }}
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 side1">ADDRESS:</div>
                                                <div class="col-6 side2">{{ $data['garantor']->REFRENCES2_ADDRESS ?? '-' }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endisset

                            </div>
                        @else
                            <div class="mainBox mt-3">
                                <div class="top-mainBox">
                                    <p class="sub1 text-inter">Gurantor Information</p>
                                </div>
                                <hr>
                                <div class="top-thirdBox pl-2 pr-2">
                                    <div class="container-fluid p-3">
                                        <div class="text-center text-warning"> No Record Found Yet </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    {{-- {{dd($data['vehicleDetails'])}} --}}

                    {{-- +"vehid": "202012012017174226371c66672b856"
+"vehno": "RSH807XD"
+"systemno": "13312015077"
+"simid": "09088357831"
+"imei": ""
+"enginecapacityid": "20200314232828580587521e7d42460"
+"enginecapacityname": "4cyL"
+"fueltypeid": "20200314232707625512192686f026b"
+"fueltypename": "PMS"
+"bodytypeid": "2020091718240504768621673735611"
+"bodytypename": "Brekete Premium"
+"brandid": "20201011125552891477572dc677174"
+"brandname": "MAZDA 626"
+"colorid": "2020040723403044031885d93252040"
+"colorname": "GREEN"
+"price": "0.00"
+"status": null
+"createtime": "2022-01-24 09:10:14"
+"expirdate": "12/1/2022 12:00:00 AM"
+"investorid": null
+"investorname": null
+"investorphonenumber": null
+"investoremail": null
+"driverid": null
+"drivername": null
+"driverphone": null
+"driveremail": null --}}


                    {{-- Vehicle DEtails --}}
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="mainBox">
                            <div class="top-mainBox">
                                <p class="sub1 text-inter">Vehicle Details</p>
                            </div>
                            <div class="top-thirdBox pl-2 pr-2">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">LICENSE PLATE:</div>
                                        <div class="col-6 side2">
                                            {{ $data['vehicleDetails']->vehno }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TYPE:</div>
                                        <div class="col-6 side2">
                                            {{ $data['vehicleDetails']->brandname ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">MODEL:</div>
                                        <div class="col-6 side2">
                                            {{ $data['vehicleDetails']->brandname ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">YEAR:</div>
                                        <div class="col-6 side2">{{ $data['carFleet']->year ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">CHASIS:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">BODY:</div>
                                        <div class="col-6 side2">
                                            -
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">ENGINE:</div>
                                        <div class="col-6 side2">
                                            {{ $data['vehicleDetails']->enginecapacityname }}
                                        </div>
                                    </div>
                                    {{-- {{dd($data['carFleet'])}} --}}
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TRANSMISSION:</div>
                                        <div class="col-6 side2">{{ $data['carFleet']->transmission ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">COLOR:</div>
                                        <div class="col-6 side2">
                                            {{ $data['vehicleDetails']->colorname }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">DATE ADDED:</div>
                                        <div class="col-6 side2">
                                            {{ $data['vehicleDetails']->createtime }}
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-2">
                                        <div class="col-6 side1">Fleet</div>
                                        <div class="col-6 side2">
                                            {{ $data['vehicleDetails']->bodytypename }}
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="carImage">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/images/car-red.png') }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/images/car-red.png') }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/images/car-red.png') }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Grantors informations --}}
                        <div class="mainBox mt-3">
                            <div class="top-mainBox">
                                <p class="sub1 text-inter">Investors Information</p>
                            </div>


                            @if ($data['investorInfo'])
                                <div class="top-thirdBox pl-2 pr-2">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-6 side1">NAME:</div>
                                            <div class="col-6 side2">

                                                {{ $data['investorInfo']->firstname ?? ('-' . ' ' . $data['investorInfo']->lastname ?? '-') }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">PHONE NO.:</div>
                                            <div class="col-6 side2">{{ $data['investorInfo']->phone ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">EMAIL:</div>
                                            <div class="col-6 side2">{{ $data['investorInfo']->email ?? '-' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">OCCUPATION:</div>
                                            <div class="col-6 side2">-</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 side1">START DATE:</div>
                                            <div class="col-6 side2">-</div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="top-mainBox">
                                <p class="sub1 text-inter">Documents</p>
                            </div>
                            <div class="top-thirdBox pl-2 pr-2">
                                <div class="container-fluid">
                                    <div class="attachements"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- {{dd($data)}} --}}
                    {{-- "vehicleLocation" => {#313 ▼
    +"SystemNo": "13312015077"
    +"Time": "2022-07-16 22:53:36"
    +"Longitude": 7.37905
    +"Latitude": 9.1438
    +"Velocity": 0
    +"Angle": 60
    +"DtStatus": 0
    +"Locate": 1
    +"Miles": 108346300.0
    +"LevelNum": 13.0
  }
  "investorInfo" => {#315 ▼
    +"investorid": "2021012112170099916578147313ef2"
    +"nickname": "MPCSAL-IKHLAS(B)"
    +"firstname": "AL-IKHLAS(B)"
    +"lastname": "MPCS"
    +"email": "ikhilas2015@gmail.com"
    +"phone": "08055903947"
    +"accountnumber": "0001599161"
    +"sortcode": "301" --}}
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="mainBox">

                            <div class="mapUser">
                                <div id="map" style="width:100%; height:100%"></div>
                            </div>

                            <div class="top-mainBox">
                                <p class="sub1 text-inter">GPS Data</p>
                            </div>
                            <div class="top-thirdBox pl-2 pr-2">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TIME:</div>
                                        <div class="col-6 side2">
                                            {{ $data['vehicleLocation']->Time }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">IGNITION:</div>
                                        <div class="col-6 side2">
                                            @if ($data['vehicleLocation']->DtStatus == 1)
                                                <span class="text-success"> ON </span>
                                            @else
                                                <span class="text-warning"> OFF </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TOTAL MILEAGE (KM):</div>
                                        <div class="col-6 side2">{{ $data['vehicleLocation']->Miles / 1000 }} KM</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">LONGITUDE:</div>
                                        <div class="col-6 side2">{{ $data['vehicleLocation']->Longitude }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">LATITUDE:</div>
                                        <div class="col-6 side2">{{ $data['vehicleLocation']->Latitude }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">ADDRESS:</div>
                                        <div class="col-6 side2">{{ $data['location'] ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mainBox mt-3">
                            <div class="top-mainBox">
                                <p class="sub1 text-inter">All Payments</p>
                                <p class="sub1 text-inter"> ₦  {{ number_format($data['payments']->sum('needpayment') , 2)  }}
                                    ({{ count($data['payments']) }})</p>
                            </div>
                            <div class="top-thirdBox pl-2 pr-2 scroll">
                                <div class="container-fluid">
                                    @foreach ($data['payments'] as $item)
                                        <div class="row mb-2">
                                            <div class="col-4 side1">
                                                {{ $item->orderid }}
                                            </div>
                                            <div class="col-4 side1">
                                                {{ \Carbon\Carbon::parse($item->createtime)->format('d-m-Y : hi') }}</div>
                                            <div class="col-4 side2"> ₦ {{ number_format($item->needpayment, 2) }}</div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>


                            {{-- <div class="top-thirdBox pl-2 pr-2">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">Subcription Value:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">Installment Fee:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PACKAGE:</div>
                                        <div class="col-6 side2">{{ $data['driverDetail']->package ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PAYMENT START DATE:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PAYMENT MODE:</div>
                                        <div class="col-6 side2">WEEKLY</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PLATFORM COMMISSION:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">OWNER COMMISSION:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">VEHICLE COST:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">AGENT COMMISSION:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PAYMENT END DATE:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">SECURITY DEPOSIT:</div>
                                        <div class="col-6 side2">-</div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div class="boxInfo bg-blk text-light mt-3">
                            <div class="topInfo">
                                <div class="vectorBox2">
                                    <img src="{{ asset('assets/images/white-vector.svg') }}" alt="" />
                                </div>
                            </div>
                            <div class="bottomInfo">
                                <div class="leftBottom">
                                    <span class="lft1 text-light">WALLET BALANCE</span><br />
                                    <span class="lft2 text-inter text-light">₦
                                        {{ number_format($data['mangament']->acctBal ?? 0) }}</span>
                                </div>
                                <span
                                    class="
                    rightBottom
                    bg-light-dark
                    text-light
                    font-weight-bold
                  ">
                                    <span>PENDING PAYMENT: $540.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection
