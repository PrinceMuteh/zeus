@extends('main')
@section('content')
    <style>
        @media screen and (min-width: 900px) {
            .content-page {
                max-height: 90vh
            }
        }
    </style>
    <title>Zeus | Vehicle Profile</title>
    <div class="content-page" style="background: #E5E5E51C;">
        <div class="content card-bg">
            <div class="container-fluid">
                <div class="top-row">
                    <div>
                        <p class="sectionTitle text-inter pb-0 pl-0 ml-3">
                            <img src="{{ asset('assets/images/arrow-left.svg') }}" alt="" />
                            Vehicle Profile
                        </p>
                    </div>
                </div>
                <ul class="vehicle-top-list border-bottom-0">
                    <li class="active-top-list specBtn">VEHICLE OVERVIEW</li>
                    <li class="ownerBtn">WORKSHOP LOG</li>
                    <li class="driverBtn">FINANCIALS</li>
                </ul>

                {{-- @include('components.operational.gps-section') --}}
                <div class="gps-section">
                    <div class="row g-0 border-top-line">
                        <div class="col-sm-6 col-md-12 col-lg-5">
                            <div class="operation-data-section">
                                <div class="mt-2">
                                    <div class="image-car-sample-100">
                                        <div class="inner-100">
                                            <img src="{{ asset('assets/images/car_sample_1.png') }}" alt="">
                                        </div>
                                        <div class="inner-100">
                                            <img src="{{ asset('assets/images/car_sample_2.png') }}" alt="">
                                        </div>
                                        <div class="inner-100">
                                            <img src="{{ asset('assets/images/car_sample_1.png') }}" alt="">
                                        </div>
                                        <div class="inner-100">
                                            <img src="{{ asset('assets/images/car_sample_2.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="baseInfo">
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">LICENCE PLATE:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">ABC123YZ</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">TYPE:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">Toyota</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">MODEL:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">Corolla</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">YEAR:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">2014</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">CHASSIS:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">2T1BU40E49C179680</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">BODY:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">Sedan 4 door</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">ENGINE:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">4 Cyl</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">TRANSMISSION:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">Automatic</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">COLOR:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">Bull Red</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">DATE ADDED:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">21 AUG, 2021</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">FLEET:</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="lr-text">Not Availabel</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <span class="ll-text">SUPORT CENTRE:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="lr-text">Not available</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-5">
                            <div class="operation-data-section">
                                <div class="grey-bg-work">
                                    <p class="status-100 mb-4 ml-2 mt-2">OVERVIEW</p>
                                    <div class="baseInfo mb-0 pb-0">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <span class="ll-text">ANNUAL CONTRACT:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="lr-text">ACTIVE</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <span class="ll-text">START DATE:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="lr-text">21 AUG, 2021</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <span class="ll-text">COUNT:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="lr-text">4 / 12</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <span class="ll-text">STATUS:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="lr-text">ACTIVE</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <span class="ll-text">SERVICE THRESHOLD:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="lr-text">5,200 KM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="next-payment">
                                        <div class="circle-left-100">
                                            <div class="box-100">
                                                <svg width="23" height="23" viewBox="0 0 26 26" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.3687 7.28711V13.9538" stroke="#28BE5B"
                                                        stroke-width="2.17302" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M9.02892 1.57227H17.7077C17.8328 1.57227 17.9566 1.5969 18.0721 1.64476C18.1877 1.69262 18.2927 1.76278 18.3811 1.85121L24.5179 7.98802C24.6064 8.07646 24.6765 8.18145 24.7244 8.297C24.7722 8.41254 24.7969 8.53639 24.7969 8.66146V17.3402C24.7969 17.4653 24.7722 17.5891 24.7244 17.7047C24.6765 17.8202 24.6064 17.9252 24.5179 18.0137L18.3811 24.1505C18.2927 24.2389 18.1877 24.309 18.0721 24.3569C17.9566 24.4048 17.8328 24.4294 17.7077 24.4294H9.02892C8.90386 24.4294 8.78001 24.4048 8.66446 24.3569C8.54891 24.309 8.44393 24.2389 8.35549 24.1505L2.21868 18.0137C2.13024 17.9252 2.06009 17.8202 2.01223 17.7047C1.96437 17.5891 1.93973 17.4653 1.93973 17.3402V8.66146C1.93973 8.53639 1.96437 8.41254 2.01223 8.297C2.06009 8.18145 2.13024 8.07646 2.21868 7.98802L8.35549 1.85121C8.44393 1.76278 8.54891 1.69262 8.66446 1.64476C8.78001 1.5969 8.90386 1.57227 9.02892 1.57227Z"
                                                        stroke="#28BE5B" stroke-width="2.17302" stroke-miterlimit="10" />
                                                    <path
                                                        d="M13.3683 19.6677C12.5793 19.6677 11.9397 19.0281 11.9397 18.2391C11.9397 17.4501 12.5793 16.8105 13.3683 16.8105C14.1573 16.8105 14.7969 17.4501 14.7969 18.2391C14.7969 19.0281 14.1573 19.6677 13.3683 19.6677Z"
                                                        fill="#28BE5B" />
                                                </svg>

                                            </div>
                                        </div>
                                        <div class="mid-100">
                                            <span class="top-text-400">NEXT MAINTENANCE</span>
                                            <progress id="file" class="w-100" max="100" value="70"> 70%
                                            </progress>
                                            <span class="small-grey">DUE 02 DAYS FROM NOW</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="traffic-info">
                                    <div class="traffic-info1">
                                        <div class="top-circle tc1">
                                            <img src="{{ asset('assets/images/yellow_pin.svg') }}" alt="">
                                        </div>
                                        <span class="info-desc1">35.3km</span>
                                        <span class="info-desc2">AVG. MILEAGE</span>
                                    </div>
                                    <div class="traffic-info1">
                                        <div class="top-circle tc2">
                                            <img src="{{ asset('assets/images/blue_circle.svg') }}" alt="">
                                        </div>
                                        <span class="info-desc1">85.5km/h</span>
                                        <span class="info-desc2">AVG. SPEED</span>
                                    </div>
                                    <div class="traffic-info1">
                                        <div class="top-circle tc3">
                                            <img src="{{ asset('assets/images/blue_clock.svg') }}" alt="">
                                        </div>
                                        <span class="info-desc1">02h:27m</span>
                                        <span class="info-desc2">AVG. DRIVE TIME</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-2 pt-3">
                            <span class="status-100 mb-4 ml-2">OVERVIEW</span>
                            <div class="chart-health-score">
                                <div class="chart-health-1">
                                    <span class="mt-2">Health Score</span>
                                    <span>73 / 100</span>
                                </div>
                            </div>

                            <div class="baseInfo" style="padding-bottom: 10px;">
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <span class="ll-text">FLEET:</span>
                                    </div>
                                    <div class="col-md-5 offset-md-2">
                                        <span class="lr-text">nil</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <span class="ll-text">ALERTS:</span>
                                    </div>
                                    <div class="col-md-5 offset-md-2">
                                        <span class="lr-text">nil</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <span class="ll-text">DATA SIZE:</span>
                                    </div>
                                    <div class="col-md-5 offset-md-2">
                                        <span class="lr-text">nil</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <span class="ll-text">STATUS:</span>
                                    </div>
                                    <div class="col-md-5 offset-md-2">
                                        <span class="lr-text">nil</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <span class="ll-text">SUPPORT CENTER:</span>
                                    </div>
                                    <div class="col-md-5 offset-md-2">
                                        <span class="lr-text">nil</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="basic-info-section">
                    <div class="row-log mb-4">
                        <div class="left-col-log">
                            <div class="main-logs">
                                <div class="row log p-2 mb-4">
                                    <div class="col-sm-6 col-md-5 col-lg-2">
                                        <div class="log-left">
                                            <div class="capcha-log"></div>
                                            <span class="log-id">ID: 1234ZEUS</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-10">
                                        <div class="log-right">
                                            <div class="log-right-inner">
                                                <div class="inner-one">
                                                    <span>ACTIVITY TYPE</span>
                                                    <span>MANUAL</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>DATE</span>
                                                    <span>21 AUG, 2021</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>STATUS</span>
                                                    <span>CLOSED</span>
                                                </div>
                                            </div>
                                            <div class="log-right-inner border-none">
                                                <div class="inner-one">
                                                    <span>TITLE</span>
                                                    <span>PRE-PURCHASE INSPECTION</span>
                                                </div>
                                                <div class="inner-one">
                                                    <a href="" class="addBtn-200">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log p-2 mb-4">
                                    <div class="col-sm-6 col-md-5 col-lg-2">
                                        <div class="log-left">
                                            <div class="capcha-log"></div>
                                            <span class="log-id">ID: 1234ZEUS</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-10">
                                        <div class="log-right">
                                            <div class="log-right-inner">
                                                <div class="inner-one">
                                                    <span>ACTIVITY TYPE</span>
                                                    <span>MANUAL</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>DATE</span>
                                                    <span>21 AUG, 2021</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>STATUS</span>
                                                    <span>CLOSED</span>
                                                </div>
                                            </div>
                                            <div class="log-right-inner border-none">
                                                <div class="inner-one">
                                                    <span>TITLE</span>
                                                    <span>PRE-PURCHASE INSPECTION</span>
                                                </div>
                                                <div class="inner-one">
                                                    <a href="" class="addBtn-300">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log p-2 mb-4">
                                    <div class="col-sm-6 col-md-5 col-lg-2">
                                        <div class="log-left">
                                            <div class="capcha-log"></div>
                                            <span class="log-id">ID: 1234ZEUS</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-10">
                                        <div class="log-right">
                                            <div class="log-right-inner">
                                                <div class="inner-one">
                                                    <span>ACTIVITY TYPE</span>
                                                    <span>MANUAL</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>DATE</span>
                                                    <span>21 AUG, 2021</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>STATUS</span>
                                                    <span>CLOSED</span>
                                                </div>
                                            </div>
                                            <div class="log-right-inner border-none">
                                                <div class="inner-one">
                                                    <span>TITLE</span>
                                                    <span>PRE-PURCHASE INSPECTION</span>
                                                </div>
                                                <div class="inner-one">
                                                    <a href="" class="addBtn-200">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log p-2 mb-4">
                                    <div class="col-sm-6 col-md-5 col-lg-2">
                                        <div class="log-left">
                                            <div class="capcha-log"></div>
                                            <span class="log-id">ID: 1234ZEUS</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-10">
                                        <div class="log-right">
                                            <div class="log-right-inner">
                                                <div class="inner-one">
                                                    <span>ACTIVITY TYPE</span>
                                                    <span>MANUAL</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>DATE</span>
                                                    <span>21 AUG, 2021</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>STATUS</span>
                                                    <span>CLOSED</span>
                                                </div>
                                            </div>
                                            <div class="log-right-inner border-none">
                                                <div class="inner-one">
                                                    <span>TITLE</span>
                                                    <span>PRE-PURCHASE INSPECTION</span>
                                                </div>
                                                <div class="inner-one">
                                                    <a href="" class="addBtn-200">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log p-2 mb-4">
                                    <div class="col-sm-6 col-md-5 col-lg-2">
                                        <div class="log-left">
                                            <div class="capcha-log"></div>
                                            <span class="log-id">ID: 1234ZEUS</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-10">
                                        <div class="log-right">
                                            <div class="log-right-inner">
                                                <div class="inner-one">
                                                    <span>ACTIVITY TYPE</span>
                                                    <span>MANUAL</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>DATE</span>
                                                    <span>21 AUG, 2021</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>STATUS</span>
                                                    <span>CLOSED</span>
                                                </div>
                                            </div>
                                            <div class="log-right-inner border-none">
                                                <div class="inner-one">
                                                    <span>TITLE</span>
                                                    <span>PRE-PURCHASE INSPECTION</span>
                                                </div>
                                                <div class="inner-one">
                                                    <a href="" class="addBtn-200">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log p-2 mb-4">
                                    <div class="col-sm-6 col-md-5 col-lg-2">
                                        <div class="log-left">
                                            <div class="capcha-log"></div>
                                            <span class="log-id">ID: 1234ZEUS</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-10">
                                        <div class="log-right">
                                            <div class="log-right-inner">
                                                <div class="inner-one">
                                                    <span>ACTIVITY TYPE</span>
                                                    <span>MANUAL</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>DATE</span>
                                                    <span>21 AUG, 2021</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>STATUS</span>
                                                    <span>CLOSED</span>
                                                </div>
                                            </div>
                                            <div class="log-right-inner border-none">
                                                <div class="inner-one">
                                                    <span>TITLE</span>
                                                    <span>PRE-PURCHASE INSPECTION</span>
                                                </div>
                                                <div class="inner-one">
                                                    <a href="" class="addBtn-200">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log p-2 mb-4">
                                    <div class="col-sm-6 col-md-5 col-lg-2">
                                        <div class="log-left">
                                            <div class="capcha-log"></div>
                                            <span class="log-id">ID: 1234ZEUS</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-10">
                                        <div class="log-right">
                                            <div class="log-right-inner">
                                                <div class="inner-one">
                                                    <span>ACTIVITY TYPE</span>
                                                    <span>MANUAL</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>DATE</span>
                                                    <span>21 AUG, 2021</span>
                                                </div>
                                                <div class="inner-one">
                                                    <span>STATUS</span>
                                                    <span>CLOSED</span>
                                                </div>
                                            </div>
                                            <div class="log-right-inner border-none">
                                                <div class="inner-one">
                                                    <span>TITLE</span>
                                                    <span>PRE-PURCHASE INSPECTION</span>
                                                </div>
                                                <div class="inner-one">
                                                    <a href="" class="addBtn-200">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-col-log">
                            <div class="top-log-title">
                                <span>LOG ANALYSIS</span>
                                <span>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 5L11 1" stroke="#28303F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="analysis-main">
                                <div class="top-analysis">
                                    <span>TOTAL ACTIVITY</span>
                                    <span>36</span>
                                </div>
                                <div class="base-analysis">

                                    <div class="d-flex">
                                        <div class="base-analysis-inner">
                                            <div class="base100">
                                                <span>MANUAL:</span>
                                                <span>24</span>
                                            </div>
                                            <span>LAST: 25 Aug, 2021</span>
                                        </div>
                                        <div class="base-analysis-inne" style="margin-left: 35px">
                                            <div class="base100">
                                                <span>MANUAL:</span>
                                                <span>24</span>
                                            </div>
                                            <span>LAST: 25 Aug, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="top-log-title mt-2">
                                <span>REPAIR ANALYSIS</span>
                                <span>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 5L11 1" stroke="#28303F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-7 p-3 d-flex flex-column justify-content-center">
                                    <canvas id="myChart" style="max-width:100%"></canvas>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-5 d-flex justify-content-center align-items-center">
                                    <div>
                                        <div class="value-donut mb-1 mt-4">
                                            <div class="dot-100 mr-2 bg-deep-blue-100"></div>
                                            <div>
                                                <div class="t-100">Exterior</div>
                                                <div class="t-200">₦50,500.00</div>
                                                <div class="t-100">7 Logs</div>
                                            </div>
                                        </div>
                                        <span class="value-donut mb-1">
                                            <div class="dot-100 mr-2 bg-deep-blue-200"></div>
                                            <div>
                                                <div class="t-100">Engine Area</div>
                                                <div class="t-200">₦7,300.00</div>
                                                <div class="t-100">2 Logs</div>
                                            </div>
                                        </span>
                                        <span class="value-donut mb-1">
                                            <div class="dot-100 mr-2 bg-deep-blue-300"></div>
                                            <div>
                                                <div class="t-100">Interior</div>
                                                <div class="t-200">₦21,000.00</div>
                                                <div class="t-100">3 Logs</div>
                                            </div>
                                        </span>
                                        <span class="value-donut mb-4">
                                            <div class="dot-100 mr-2 bg-deep-blue-300"></div>
                                            <div>
                                                <div class="t-100">Suspension</div>
                                                <div class="t-200">₦3,700.00</div>
                                                <div class="t-100">1 Logs</div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <div class="top-log-title mt-2">
                                <span>RECENT ACTIVITY</span>
                                <span>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 5L11 1" stroke="#28303F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="baseInfo p-0 mt-2" style="padding-bottom: 10px;">
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <span class="ll-text">TASK ID:</span>
                                    </div>
                                    <div class="col-md-7 d-flex justify-content-end">
                                        <span class="lr-text">#45EDFG</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <span class="ll-text">DATE SUBMITTED:</span>
                                    </div>
                                    <div class="col-md-7 d-flex justify-content-end">
                                        <span class="lr-text">25 AUG, 2021 @ 07:43 PM</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <span class="ll-text">TASK TYPE:</span>
                                    </div>
                                    <div class="col-md-7 d-flex justify-content-end">
                                        <span class="lr-text">VEHICLE MAINTENANCE</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end content -->
        </div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script>
            // first section
            let specBtn = document.querySelector('.specBtn');
            let ownerBtn = document.querySelector('.ownerBtn');
            let driverBtn = document.querySelector('.driverBtn');
            let gpsSec = document.querySelector('.gps-section');
            let basicInfoSec = document.querySelector('.basic-info-section');
            let alertSec = document.querySelector('.alert-section');

            specBtn.addEventListener('click', () => {
                specBtn.classList.add('active-top-list');
                driverBtn.classList.remove('active-top-list');
                ownerBtn.classList.remove('active-top-list');
                gpsSec.style.display = 'block';
                basicInfoSec.style.display = 'none';
                alertSec.style.display = 'none';
            })
            ownerBtn.addEventListener('click', () => {
                specBtn.classList.remove('active-top-list');
                driverBtn.classList.remove('active-top-list');
                ownerBtn.classList.add('active-top-list');
                gpsSec.style.display = 'none';
                basicInfoSec.style.display = 'block';
                alertSec.style.display = 'none';
            })
            driverBtn.addEventListener('click', () => {
                specBtn.classList.remove('active-top-list');
                driverBtn.classList.add('active-top-list');
                ownerBtn.classList.remove('active-top-list');
                gpsSec.style.display = 'none';
                basicInfoSec.style.display = 'none';
                alertSec.style.display = 'block';
            })
        </script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Total Assigned', 11],
                    ['Un-Assigned', 3],
                    ['Other', 5],
                ]);

                var options = {
                    // title: 'Maintenance Summary',
                    pieHole: 0.6,
                    colors: ['#75E76B', '#79f99B', '#44953D']
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart-4'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawStuff);

            function drawStuff() {
                var data = new google.visualization.arrayToDataTable([
                    ['Move', 'Percentage', {
                        role: 'style'
                    }],
                    ["1", 300, 'color: gray'],
                    ["2", 400, 'color: gray'],
                    ["3", 760, 'color: gray'],
                    ["4", 500, 'color: gray'],
                    ["5", 400, 'color: gray'],
                    ["6", 490, 'color: gray'],
                    ["7", 300, 'color: gray'],
                    ["8", 320, 'color: gray'],
                    ["9", 450, 'color: gray'],
                    ['10', 550, 'color: gray'],
                    ["11", 100, 'color: gray'],
                    ["12", 110, 'color: gray'],
                ]);

                var options = {
                    width: 390,
                    legend: {
                        position: 'none'
                    },
                    chart: {
                        title: 'Fleet Trend',
                        subtitle: ''
                    },
                    axes: {
                        x: {
                            0: {
                                side: 'bottom',
                                label: ''
                            } // Top x-axis.
                        }
                    },
                    bar: {
                        groupWidth: "80%"
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                // Convert the Classic options to Material options.
                chart.draw(data, google.charts.Bar.convertOptions(options));
            };
        </script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="{{ asset('assets/js/chart.js') }} "></script>

        <script>
            var yValues = [70, 49, 44, 60];
            var barColors = [
                "#0D42A8F2",
                "#0d43a8b3",
                "#0d43a83e",
                "#032D80"
            ];

            new Chart("myChart", {
                type: "doughnut",
                data: {
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true
                    }
                }
            });
        </script>
    @endsection
