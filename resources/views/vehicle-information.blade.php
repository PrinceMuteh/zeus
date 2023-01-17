@extends('main')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid m15">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle text-inter">
                            Vehicle Information
                        </p>
                    </div>
                    <ul class="sub-tabs3">
                        <li class="" id="show2">Overview</li>
                        <li class="bbd" id="show1">Drive-Traffic Metric</li>
                    </ul>
                </div>

                <div class="row label2">
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="top2">
                            <p class="top-text">Drive-train Analytic</p>
                            <div class="traffic-info">
                                <div class="traffic-info1">
                                    <div class="top-circle tc1">
                                        <img src="{{ asset('assets/images/yellow_pin.svg') }}" alt="">
                                    </div>
                                    <span class="info-desc1">35.3km</span>
                                    <span class="info-desc2">Mileage</span>
                                </div>
                                <div class="traffic-info1">
                                    <div class="top-circle tc2">
                                        <img src="{{ asset('assets/images/blue_circle.svg') }}" alt="">
                                    </div>
                                    <span class="info-desc1">85.5km/h</span>
                                    <span class="info-desc2">Avg. Speed</span>
                                </div>
                                <div class="traffic-info1">
                                    <div class="top-circle tc3">
                                        <img src="{{ asset('assets/images/blue_clock.svg') }}" alt="">
                                    </div>
                                    <span class="info-desc1">02h:27m</span>
                                    <span class="info-desc2">Drive Time</span>
                                </div>
                            </div>

                            <div class="mini-graph">
                                <img src="{{ asset('assets/images/mini_graph.svg') }}" alt="">
                            </div>
                        </div>

                        <div class="boxInfo">
                            <div class="topInfo">
                                <div class="vectorBox">
                                    <img src="{{ asset('assets/images/vector.png') }}" alt="" />
                                </div>
                                <i class="bx bx-dots-vertical-rounded adjust"></i>
                            </div>
                            <div class="bottomInfo">
                                <div class="leftBottom">
                                    <span class="lft1">MAINTENANCE BALANCE</span><br />
                                    <span class="lft2 text-inter">₦3,500.00</span>
                                </div>
                                <span class="rightBottom bg-light-red red-text font-weight-bold">
                                    <i class="bx bx-down-arrow-alt"></i>
                                    <span>22.5%</span> <span>APRIL</span>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="boxInfo bg-blk text-light mb-4">
                            <div class="topInfo">
                                <div class="vectorBox2">
                                    <img src="{{ asset('assets/images/vector.png') }}" alt="" />
                                </div>
                                <i class="bx bx-dots-vertical-rounded adjust"></i>
                            </div>
                            <div class="bottomInfo">
                                <div class="leftBottom">
                                    <span class="lft1 text-light">Total User(s)</span><br />
                                    <span class="lft2 text-inter text-light">000</span>
                                </div>
                                <span class="rightBottom bg-light-dark text-light font-weight-bold">
                                    <i class="bx bx-down-arrow-alt"></i>
                                    <span>22.5%</span> <span>APRIL</span>
                                </span>
                            </div>
                        </div>

                        <div class="mainBox">
                            <div class="top-mainBox">
                                <span class="top-text text-inter">Vehicle Details</span>
                                <span class="rightBottom pl-3 pr-3 bg-light-green green-text font-weight-bold">
                                    Offline
                                </span>
                            </div>
                            <div class="top-thirdBox mt-3 pl-1 pr-1">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">LICIENCE PLATE:</div>
                                        <div class="col-6 side2">ABC123</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TYPE:</div>
                                        <div class="col-6 side2">TOYOTA</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">MODEL:</div>
                                        <div class="col-6 side2">CORROLLA</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">YEAR:</div>
                                        <div class="col-6 side2">2019</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">CHASIS:</div>
                                        <div class="col-6 side2">22322312121212</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">BODY:</div>
                                        <div class="col-6 side2">SEDAN 4 DOOR</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">ENGINE:</div>
                                        <div class="col-6 side2">4 CYL</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TRANSMISSION:</div>
                                        <div class="col-6 side2">AUTOMATIC</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">COLOR:</div>
                                        <div class="col-6 side2">BULL RED</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PACKAGE:</div>
                                        <div class="col-6 side2">HIRE PURCHASE</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">DATE ADDED:</div>
                                        <div class="col-6 side2">21 AUG, 2022</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="bottom-row  d-block">
                            <p class="top-text pl-3 pr-3 pt-3 text-inter">Activity Log</p>
                            <div class="info-activity border-none">
                                <div class="info-info border-none">
                                    <div class="info-icon">
                                        <div class="icon-notice bg-light-blue">
                                            <img src="{{ asset('assets/images/notice.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="info-desc">
                                        <span class="infoTop">
                                            GPS device connection lost for RBC123XC
                                        </span>
                                        <span class="infoButtom">16 May, 2022 @ 04:35</span>
                                    </div>
                                </div>
                                <div class="info-info border-none">
                                    <div class="info-icon">
                                        <div class="icon-notice bg-light-blue">
                                            <img src="{{ asset('assets/images/notice.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="info-desc">
                                        <span class="infoTop">
                                            GPS device connection lost for RBC123XC
                                        </span>
                                        <span class="infoButtom">16 May, 2022 @ 04:35</span>
                                    </div>
                                </div>
                                <div class="info-info border-none">
                                    <div class="info-icon">
                                        <div class="icon-notice bg-light-blue">
                                            <img src="{{ asset('assets/images/notice.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="info-desc">
                                        <span class="infoTop">
                                            GPS device connection lost for RBC123XC
                                        </span>
                                        <span class="infoButtom">16 May, 2022 @ 04:35</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bottom-row border-none mt-3">
                            <div class="boxInfo h-50">
                                <img class="wide-map" src="{{ asset('assets/images/small-wide.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                </div>


                {{-- vehicle info 2 --}}

                <div class="row g-2 label1">
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="mainBox">
                            <div class="top-mainBox">
                                <span class="top-text text-inter">Driver Details</span>
                                <img src="{{ asset('assets/images/dots.svg') }}" height="20" width="20"
                                    alt="" />
                            </div>
                            <div class="top-secondBox">
                                <div class="imageUser">
                                    <img src="{{ asset('assets/images/deen.png') }}" alt="" />
                                </div>
                            </div>
                            <div class="top-thirdBox mt-3 pl-2 pr-2">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">NAME:</div>
                                        <div class="col-6 side2">UNSET</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1"> PHONE NO:</div>
                                        <div class="col-6 side2">UNSET</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">EMAIL:</div>
                                        <div class="col-6 side2">UNSET</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">START DATE:</div>
                                        <div class="col-6 side2">UNSET</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PAYMENT GOAL:</div>
                                        <div class="col-6 side2">UNSET</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TOTAL CONTRIBUTED:</div>
                                        <div class="col-6 side2">UNSET</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">NEXT PAYMENT:</div>
                                        <div class="col-6 side2">UNSET</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">FLEET:</div>
                                        <div class="col-6 side2">UNSET</div>
                                    </div>
                                </div>
                            </div>
                            <div class="downloadSection">
                                <button class="download">Download Transaction History</button>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-12 col-lg-4">

                        <div class="boxInfo mb-4">
                            <div class="topInfo">
                                <div class="vectorBox">
                                    <img :src="'../assets/images/vector.png'" alt="" />
                                </div>
                                <i class="bx bx-dots-vertical-rounded adjust"></i>
                            </div>
                            <div class="bottomInfo">
                                <div class="leftBottom">
                                    <span class="lft1">WALLET BALANCE</span><br />
                                    <span class="lft2 text-inter">$2, 505</span>
                                </div>
                                <span class="rightBottom bg-light-green green-text font-weight-bold">
                                    <i class="bx bx-down-arrow-alt"></i>
                                    <span>22.5%</span> <span>APRIL</span>
                                </span>
                            </div>
                        </div>

                        <div class="mainBox pb-2">
                            <div class="top-mainBox">
                                <span class="top-text text-inter">Vehicle Details</span>
                                <span class="rightBottom pl-3 pr-3 bg-light-green green-text font-weight-bold">
                                    Offline
                                </span>
                            </div>
                            <div class="top-thirdBox mt-3 pl-1 pr-1">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">LICIENCE PLATE:</div>
                                        <div class="col-6 side2">ABC123</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TYPE:</div>
                                        <div class="col-6 side2">TOYOTA</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">MODEL:</div>
                                        <div class="col-6 side2">CORROLLA</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">YEAR:</div>
                                        <div class="col-6 side2">2019</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">CHASIS:</div>
                                        <div class="col-6 side2">22322312121212</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">BODY:</div>
                                        <div class="col-6 side2">SEDAN 4 DOOR</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">ENGINE:</div>
                                        <div class="col-6 side2">4 CYL</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">TRANSMISSION:</div>
                                        <div class="col-6 side2">AUTOMATIC</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">COLOR:</div>
                                        <div class="col-6 side2">BULL RED</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PACKAGE:</div>
                                        <div class="col-6 side2">HIRE PURCHASE</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">DATE ADDED:</div>
                                        <div class="col-6 side2">21 AUG, 2022</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="mainBox mb-3">
                            <div class="top-mainBox">
                                <span class="top-text text-inter">Configuration</span>
                            </div>
                            <div class="top-thirdBox pl-2 pr-2">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">RENTAL VALUE:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PACKAGE:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PAYMENT START DATE:</div>
                                        <div class="col-6 side2">
                                            UNSET
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PACKAGE MODE:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PLATFORM COMMISSION:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">OWNER COMMISSION:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">VEHICLE COST:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">AGENT COMMISSION:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PAYMENT END DATE:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">SECURITY DEPOSIT:</div>
                                        <div class="col-6 side2">UNKNOW</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carImage p-0 m-0 ">
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
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end content -->
    </div>

    <script>
        let show2 = document.querySelector('#show2');
        let show1 = document.querySelector('#show1');

        let label1 = document.querySelector('.label1');
        let label2 = document.querySelector('.label2');

        show1.addEventListener('click', () => {
            label2.style.display = 'flex';
            label1.style.display = 'none';
            show1.classList.add('bbd');
            show2.classList.remove('bbd');
        });

        show2.addEventListener('click', () => {
            label1.style.display = 'flex';
            label2.style.display = 'none';
            show2.classList.add('bbd');
            show1.classList.remove('bbd');
        });
    </script>
@endsection
