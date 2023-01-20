@extends('main')
@section('content')
    <style>
        div.scroll {
            /* background-color: #fed9ff; */
            /* width: 600px; */
            max-height: 600px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: center;
            padding: 20px;
        }
    </style>

    <title>Zeus | Motor Card</title>
    <div class="content-page" style="background: #fff; height: auto">
        <div class="content card-bg">
            <div class="container-fluid main-operations">
                <div class="top-row d-flex justify-content-between" style="overflow: visible">

                    <a href="/motor-card" class="sectionTitle text-inter pb-0 pl-0 mb-3">
                        <span class="mr-2"><svg width="26" height="16" viewBox="0 0 26 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.04659 14.9813L1 7.99066M1 7.99066L8.04659 1M1 7.99066L24.2527 7.99072"
                                    stroke="#08102E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span> ABC123YZ / Mazda 323F
                    </a>
                </div>
                <div class="row justify-content-center g-0 border-top-line">
                    <div class="col-sm-6 col-md-8 col-lg-4">
                        <div class="operation-data-section">
                            <div class="operation-data-balance mt-2"
                                style="background: #FFD466;
                            ">
                                <div class="shape-circle-100 ml-2 mr-3"
                                    style="background: #ffd;
                                ">
                                    <svg width="20" height="25" viewBox="0 0 20 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.4353 9.69889C19.3358 9.50148 19.1836 9.33548 18.9956 9.21928C18.8075 9.10307 18.591 9.04121 18.3699 9.04053H12.3849V1.85852C12.3978 1.596 12.3239 1.33655 12.1746 1.12021C12.0253 0.903878 11.809 0.742688 11.559 0.661523C11.3187 0.582452 11.0595 0.581564 10.8186 0.658984C10.5777 0.736405 10.3676 0.888153 10.2184 1.09244L0.64234 14.2595C0.52236 14.4329 0.450316 14.6349 0.4335 14.8451C0.416684 15.0553 0.455694 15.2662 0.54658 15.4565C0.630277 15.674 0.775672 15.8624 0.96492 15.9985C1.15417 16.1346 1.37903 16.2125 1.61191 16.2225H7.59692V23.4046C7.59711 23.657 7.67708 23.9029 7.82542 24.1071C7.97376 24.3113 8.18287 24.4635 8.42285 24.5417C8.54312 24.579 8.66804 24.5991 8.79392 24.6016C8.98279 24.6021 9.1691 24.5578 9.33761 24.4725C9.50612 24.3872 9.65206 24.2633 9.76349 24.1108L19.3395 10.9438C19.4685 10.7652 19.5457 10.5544 19.5626 10.3348C19.5795 10.1152 19.5354 9.89511 19.4353 9.69889ZM9.99092 19.7178V15.0255C9.99092 14.7081 9.86481 14.4036 9.64033 14.1791C9.41585 13.9547 9.11139 13.8285 8.79392 13.8285H4.00592L9.99092 5.54529V10.2375C9.99092 10.555 10.117 10.8595 10.3415 11.0839C10.566 11.3084 10.8705 11.4345 11.1879 11.4345H15.9759L9.99092 19.7178Z"
                                            fill="#08102E" />
                                    </svg>

                                </div>
                                <div class="operation-item-100 mb-1" style="color: #08102E;">
                                    <span style="font-size: 12px">TOTAL CREDIT</span>
                                    <span style="font-size: 18px; font-weight:bold;">
                                        ₦ 0</span>
                                    <span style="font-size: 10px;">COMPLIANCE SCORE: 0%</span>
                                </div>
                            </div>
                            <div class="baseInfo p-0">
                                <div class="topSectionBox">
                                    <span class="sub1 text-inter">ACTIVE LOAN COMPONENT</span>
                                    <span>
                                        <svg width="13" height="7" viewBox="0 0 18 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L9 7L17 1" stroke="#888888" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">LOAN AMOUNT</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">INTEREST RATE</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">LOAN TENURE</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">REPAYMENT FREQUENCY</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">OUTSTANDING</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">START DATE</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">TOTAL PAID</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">DATE DUE</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">NUMBER OF PAYMENT</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">TOTAL PAYMENT</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <span class="ll-text">TOTAL INTEREST</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="lr-text">-</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-8 col-lg-4">
                        <div class="operation-data-section">
                            <div class="topSectionBox mb-2 pb-0">
                                <span class="sub1 text-inter">VEHICLE SPECIFICATION</span>
                                <span>
                                    <svg width="13" height="7" viewBox="0 0 18 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L9 7L17 1" stroke="#888888" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </span>
                            </div>
                            <div>
                                <div class="image-car-sample-100 mb-3">
                                    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade"
                                        data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('images/front.jpg') }}" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="{{ asset('images/side_1.jpg') }}" class="d-block w-100"
                                                    alt="...">
                                            </div>

                                            <div class="carousel-item active">
                                                <img src="{{ asset('images/back.jpg') }}" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="{{ asset('images/rear.jpg') }}" class="d-block w-100"
                                                    alt="...">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">LICENSE PLATE</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">TYPE</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">MODEL</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">YEAR</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">CHASIS</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">BODY</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">ENGINE</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">TRANSMISSION</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">DATE ADDED</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">FLEET</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">SUPPORT CENTER</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-8 col-lg-4">
                        <div class="operation-data-section">
                            <div class="topSectionBox">
                                <span class="sub1 text-inter">BASIC USER DETAILS</span>
                                <span>
                                    <svg width="13" height="7" viewBox="0 0 18 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L9 7L17 1" stroke="#888888" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="basic-user-photo">

                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">ORDER ID</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">CUSTOMER NAME</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">DATE OF BIRTH</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">GENDER</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">PHONE NUMBER</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">EMAIL ADDRESS</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <span class="ll-text">LOCATION</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="lr-text">-</span>
                                </div>
                            </div>

                            <div class="topSectionBox mb-0 pb-0">
                                <span class="sub1 text-inter">CREDIT HISTORY</span>
                                <span>
                                    <svg width="13" height="7" viewBox="0 0 18 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L9 7L17 1" stroke="#888888" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="transaction-history text-left">
                                <div class="shape-arrow-down">
                                    <div class="arrow-green-down bg-light-green200">
                                        <svg width="30" height="30" viewBox="0 0 54 55" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.871094" width="53.5312" height="53.5312" rx="8.92187"
                                                fill="#E6FFCC" />
                                            <path d="M19.1953 28.9863L26.7657 36.5568L34.3362 28.9863" stroke="#27B235"
                                                stroke-width="3.56875" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M26.7656 18.7148V36.5586" stroke="#27B235" stroke-width="3.56875"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="credit-detail">
                                    <span class="credit-info-200">ABC123XYZ/REPAIR</span>
                                    <span class="credit-info-100">21 AUG 2021</span>
                                </div>
                                <div class="credit-value">
                                    <span class="credit-info-200">₦ 0</span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    @endsection
