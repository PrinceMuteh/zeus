@extends('main')
@section('content')
    <title>Zeus | Vehicle Profile</title>
    <div class="content-page" style="background: #E5E5E51C; height: 90vh">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row row-vehicle-profile">
                    <div class="col-md-3">
                        <div class="sideVehicle">
                            <div class="top-row">
                                <p class="sectionTitle text-inter pl-3 pb-0 pl-0">
                                    <img src="{{ asset('assets/images/arrow-left.svg') }}" class="mr-1" alt="">
                                    Vehicle Profile
                                </p>
                            </div>
                            <ul class="vehicle-side-list">
                                <li class="active-vehicle-list">BASIC INFORMATION</li>
                                <li>OPERATIONAL DATA</li>
                                <li>FILES AND DOCUMENTS</li>
                                <li>CONFIGURATION & WALLET</li>
                                <li>MAINTENANCE LOG</li>
                                <li>FAQs</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="sideVehicle h-auto">
                            <div class="top-row">
                                <p class="sectionTitle text-inter pl-3 pb-0 pl-0">
                                    Basic Information
                                </p>
                            </div>
                            <ul class="vehicle-top-list">
                                <li class="active-top-list">SPECIFICATION</li>
                                <li>OWNERS DETAILS</li>
                                <li>DRIVER INFORMATION</li>
                            </ul>
                            {{-- <div class="specification-sec">
                                <div>
                                    <div class="car-img-gallery">
                                        <div class="car-img-1">
                                            <img src="{{ asset('assets/images/car_sample_1.png') }}" alt="">
                                        </div>
                                        <div class="car-img-1">
                                            <img src="{{ asset('assets/images/car_sample_2.png') }}" alt="">
                                        </div>
                                        <div class="car-img-1">
                                            <img src="{{ asset('assets/images/car_sample_1.png') }}" alt="">
                                        </div>
                                        <div class="top-top-img-slide">
                                            <div class="iconImg-1">
                                                <svg width="11" height="11" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.956299 11.0445H11.0438M7.00006 2.25255C7.00006 2.25255 7.00006 3.16862 7.91613 4.0847C8.8322 5.00077 9.74828 5.00077 9.74828 5.00077M3.37709 9.3566L5.30084 9.08178C5.57833 9.04213 5.83549 8.91356 6.0337 8.71535L10.6643 4.08469C11.1703 3.57876 11.1703 2.75848 10.6643 2.25255L9.74828 1.33648C9.24235 0.830548 8.42207 0.830548 7.91614 1.33648L3.28548 5.96713C3.08727 6.16534 2.9587 6.4225 2.91905 6.69999L2.64423 8.62374C2.58316 9.05124 2.94959 9.41767 3.37709 9.3566Z"
                                                        stroke="#08102E" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                            <div class="iconImg-1">
                                                <svg width="11" height="13" viewBox="0 0 12 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.82713 4.75898C2.82713 4.34477 2.49135 4.00898 2.07713 4.00898C1.66292 4.00898 1.32713 4.34477 1.32713 4.75898H2.82713ZM10.673 4.75898C10.673 4.34477 10.3372 4.00898 9.92297 4.00898C9.50875 4.00898 9.17297 4.34477 9.17297 4.75898H10.673ZM7.87088 6.44023C7.87088 6.02602 7.5351 5.69023 7.12088 5.69023C6.70667 5.69023 6.37088 6.02602 6.37088 6.44023H7.87088ZM6.37088 9.80273C6.37088 10.2169 6.70667 10.5527 7.12088 10.5527C7.5351 10.5527 7.87088 10.2169 7.87088 9.80273H6.37088ZM5.62922 6.44023C5.62922 6.02602 5.29343 5.69023 4.87922 5.69023C4.465 5.69023 4.12922 6.02602 4.12922 6.44023H5.62922ZM4.12922 9.80273C4.12922 10.2169 4.465 10.5527 4.87922 10.5527C5.29343 10.5527 5.62922 10.2169 5.62922 9.80273H4.12922ZM11.0438 3.82773C11.458 3.82773 11.7938 3.49195 11.7938 3.07773C11.7938 2.66352 11.458 2.32773 11.0438 2.32773V3.82773ZM0.956299 2.32773C0.542085 2.32773 0.206299 2.66352 0.206299 3.07773C0.206299 3.49195 0.542085 3.82773 0.956299 3.82773V2.32773ZM7.45362 1.89559L6.82958 2.31162V2.31162L7.45362 1.89559ZM4.54648 1.89559L3.92244 1.47957V1.47957L4.54648 1.89559ZM4.3188 13.3548H7.6813V11.8548H4.3188V13.3548ZM1.32713 4.75898V10.3632H2.82713V4.75898H1.32713ZM10.673 10.3632V4.75898H9.17297V10.3632H10.673ZM7.6813 13.3548C9.33355 13.3548 10.673 12.0154 10.673 10.3632H9.17297C9.17297 11.187 8.50512 11.8548 7.6813 11.8548V13.3548ZM4.3188 11.8548C3.49497 11.8548 2.82713 11.187 2.82713 10.3632H1.32713C1.32713 12.0154 2.66655 13.3548 4.3188 13.3548V11.8548ZM6.37088 6.44023V9.80273H7.87088V6.44023H6.37088ZM4.12922 6.44023L4.12922 9.80273H5.62922L5.62922 6.44023H4.12922ZM5.47907 2.14648H6.52103V0.646484H5.47907V2.14648ZM6.82958 2.31162L7.61768 3.49376L8.86575 2.66171L8.07766 1.47957L6.82958 2.31162ZM8.24171 2.32773H3.75838V3.82773H8.24171V2.32773ZM4.38242 3.49376L5.17052 2.31162L3.92244 1.47957L3.13434 2.66171L4.38242 3.49376ZM8.24171 3.82773H11.0438V2.32773H8.24171V3.82773ZM3.75838 2.32773H0.956299V3.82773H3.75838V2.32773ZM6.52103 2.14648C6.64502 2.14648 6.76081 2.20845 6.82958 2.31162L8.07766 1.47957C7.73068 0.959103 7.14655 0.646484 6.52103 0.646484V2.14648ZM5.47907 0.646484C4.85355 0.646484 4.26942 0.959102 3.92244 1.47957L5.17052 2.31162C5.23929 2.20845 5.35508 2.14648 5.47907 2.14648V0.646484Z"
                                                        fill="#08102E" />
                                                </svg>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="baseInfo">
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">LICENCE PLATE:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">ABC123XY</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">TYPE:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">TOYOTA</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">MODEL:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">COROLLA</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">YEAR:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">2014</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">CHASSIS:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">2T1BU40E49C179680</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">BODY:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">SEDAN 4 DOOR</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">ENGINE:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">4 CYL</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">TRANSMISSION:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">AUTOMATIC</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">COLOR:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">BULL RED</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">DATE ADDED:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">21 AUG, 2021</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">FLEET:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">7 CENTRAL</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <span class="ll-text">SUPORT CENTRE:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="lr-text">SEGUN ALAKA LUGBE CENTRE</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="owner-details">
                                <div class="owner-avatar">
                                    <img src="{{ asset('assets/images/deen.png') }}" alt="">
                                </div>
                                <div class="baseInfo">
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">NAME:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">MASUD OZOVEHE</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">PHONE NO:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">+23490 9904 8059</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">EMAIL:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">MASUD@ENVIO.TEC</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">USER ID:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">MGA/234-LGS/NGA</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">START DATE:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">21 AUG, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="driver-details">
                                <div class="owner-avatar">
                                    <img src="{{ asset('assets/images/deen.png') }}" alt="">
                                </div>
                                <div class="baseInfo pb-2">
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">NAME:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">MASUD OZOVEHE</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">PHONE NO:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">+23490 9904 8059</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">EMAIL:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">MASUD@ENVIO.TEC</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">START DATE:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">21 AUG, 2021</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">PAYMENT GOAL:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">$2,300.00</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">TOTAL CONTRIBUTER:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">$700.00</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">NEXT PAYMENT:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">21 AUG, 2021</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <span class="ll-text">FLEET:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="lr-text">SEGUN MANAGERS</span>
                                        </div>
                                    </div>
                                </div>

                                <button class="downloadBtn">Download Transaction History</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->
    </div>
@endsection
