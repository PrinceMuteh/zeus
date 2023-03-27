@extends('main')
@section('content')
    <div class="content-page" style="background: #fff;">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid m15">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle mb-1 text-inter pb-0 pl-0">
                            Vehicle Management
                        </p>
                    </div>
                </div>
                <ul class="sub-tabs">
                    <li class="vehicle-list-overview"><a href="{{ route('vehicleManagement') }}"> OVERVIEW </a></li>
                    <li class="vehicle-list-fleet"><a href="{{ route('vehicleManagement') }}">FLEET STATUS </a></li>

                    <li class="vehicle-list-track"> <a href="track-web">TRACK WEB</a> </li>
                    <li class="vehicle-list-fleet">
                        <a href="motor-card">MOTOR CARD</a>
                    </li>
                    <li class="vehicle-list-card bbd">
                        <a href="high-way">HIGH WAY</a>
                    </li>
                </ul>

                <div class="summary-remite">
                    <div class="summary-remite-in">
                        <div class="summary-in">
                            <div class="left-summary">
                                <p class="lead-summary">Highway</p>
                                <p class="value-summary">
                                    All Uploads
                                </p>
                                <p class="base-summary">500 Vehicle(s)</p>
                            </div>
                            <div class="arrow-summary bg-light-orange200">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 9V17C21 19.2091 19.2091 21 17 21H5C2.79086 21 1 19.2091 1 17V9M21 9C21 6.79086 19.2091 5 17 5H5C2.79086 5 1 6.79086 1 9M21 9C21 9 17.8374 11.7647 11 11.5811C4.16262 11.3975 1 9 1 9M7 5V4C7 2.34315 8.34315 1 10 1H12C13.6569 1 15 2.34315 15 4V5M7 9.67673V12.6767M15 9.67673V12.6767"
                                        stroke="#FEB100" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="summary-remite-in">
                        <div class="summary-in">
                            <div class="left-summary">
                                <p class="lead-summary">New Listings</p>
                                <p class="value-summary">
                                    New Uploads
                                </p>
                                <p class="base-summary">300 Vehicle(s)</p>
                            </div>
                            <div class="arrow-summary bg-light-green">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 3.22301C3.99202 4.13247 1 7.71682 1 12C1 16.9706 5.02944 21 10 21C14.2832 21 17.8675 18.008 18.777 14M12.9872 1.19744C16.9158 1.98955 20.0104 5.08418 20.8025 9.01276C21.0209 10.0955 20.1046 11 19 11H13C11.8954 11 11 10.1046 11 8.99999V2.99999C11 1.89542 11.9045 0.979126 12.9872 1.19744Z"
                                        stroke="#14FE00" stroke-width="1.5" stroke-linecap="round" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div class="summary-remite-in">
                        <div class="summary-in">
                            <div class="left-summary">
                                <p class="lead-summary">Active Vehicles</p>
                                <p class="value-summary">
                                    Approved Uploads
                                </p>
                                <p class="base-summary">450 Vehicle(s)</p>
                            </div>
                            <div class="arrow-summary bg-light-blue">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.282 18.808C19.9021 20.6666 18.2806 22 16.4002 22H7.59978C5.71942 22 4.09787 20.6666 3.71804 18.808L2.08312 10.808C1.57594 8.32624 3.45403 6 5.96486 6L18.0351 6C20.546 6 22.4241 8.32624 21.9169 10.808L20.282 18.808Z"
                                        stroke="#0075FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M21 10H3" stroke="#0075FE" stroke-width="1.5" stroke-linecap="square" />
                                    <path d="M9 16L10.7528 17.4023C11.1707 17.7366 11.7777 17.6826 12.1301 17.2799L15 14"
                                        stroke="#0075FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M9 2L6 6" stroke="#0075FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15 2L18 6" stroke="#0075FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div class="summary-remite-in">
                        <div class="summary-in">
                            <div class="left-summary">
                                <p class="lead-summary">Disqualified Listings(s)</p>
                                <p class="value-summary">
                                    Archived Uploads
                                </p>
                                <p class="base-summary">20 Vehicles</p>
                            </div>
                            <div class="arrow-summary bg-light-blue">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.282 18.808C19.9021 20.6666 18.2806 22 16.4002 22H7.59978C5.71942 22 4.09787 20.6666 3.71804 18.808L2.08312 10.808C1.57594 8.32624 3.45403 6 5.96486 6L18.0351 6C20.546 6 22.4241 8.32624 21.9169 10.808L20.282 18.808Z"
                                        stroke="#0075FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M21 10H3" stroke="#0075FE" stroke-width="1.5" stroke-linecap="square" />
                                    <path d="M9 16L10.7528 17.4023C11.1707 17.7366 11.7777 17.6826 12.1301 17.2799L15 14"
                                        stroke="#0075FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M9 2L6 6" stroke="#0075FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15 2L18 6" stroke="#0075FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="table-finance-section">
                            <div class="table-responsive">

                                <table id="datatable-buttons" class="table table-bordered nowrap"
                                    style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                    <div class="d-flex justify-content-end mb-2">
                                        <button class="addBtn-100">ADD NEW</button>
                                    </div>
                                    <thead class="text-inter">
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="check" />
                                            </th>
                                            <th>LOCATION</th>
                                            <th>UPLOAD DATE</th>
                                            <th>CHANNEL</th>
                                            <th>HOST</th>
                                            <th>PHONE</th>
                                            <th>VEHICLE TYPE</th>
                                            <th>PACKAGE</th>
                                            <th>REMITTANCE</th>
                                            <th>STATUS</th>
                                            <th>LAST MODIFIED</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="showSide">
                                            <td>
                                                <input type="checkbox" class="check" />
                                            </td>
                                            <td>
                                                -
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-high-way">
                    <i class='bx bx-x closeHighWay'></i>

                    <div class="top-high-way">
                        <span class="top-title">Task Summary</span>

                        <div class="top-tops">
                            <button class="newListingBtn dropdown" data-bs-toggle="dropdown">
                                New Listing
                                <i class='bx bx-chevron-down ml-1'></i>

                                <div class="drop-down-list dropdown-menu">
                                    <a href="">New Listing</a>
                                    <a href="">Approve Upload</a>
                                    <hr class="dropdown-divider">
                                    <a href="" style="color: #FF4A4A;">Archiver Upload</a>
                                </div>
                            </button>
                            <a href="" class="saveBtn">Save</a>
                        </div>
                    </div>

                    <p class="side-high-info">
                        Lorem ipsum dolor sit amet consectetur. Consectetur sit et justo ultricies dictumst ut pharetra eget
                        congue. Egestas ut eget turpis
                    </p>

                    <ul class="high-way-links">
                        <li class="vehicleSpecBtn bbd">Vehicle Specification</li>
                        <li class="pricingBtn">Pricing & Configuration</li>
                        <li class="inspectionBtn">Inspection</li>
                    </ul>

                    <div class="vehicle-spec">
                        <div class="high-way-scroll">
                            <div class="high-way-lr">
                                <div class="lr-in">
                                    <span class="high-way-l">Location:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Upload Date:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Channel:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Status:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Last Modified:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                            </div>

                            <div class="high-way-car-img">
                                <div class="car-highway"></div>
                                <div class="car-highway"></div>
                                <div class="car-highway"></div>
                                <div class="car-highway"></div>
                            </div>

                            <div class="high-way-lr border-0">
                                <div class="lr-in">
                                    <span class="high-way-l">Licence:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Type:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Model:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Year:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Chassis:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Body:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Engine:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="price-config">
                        <div class="high-way-scroll">
                            <div class="high-way-lr">
                                <div class="lr-in">
                                    <span class="high-way-l">Remittance:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Deposit Price:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Package:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                                <div class="lr-in">
                                    <span class="high-way-l">Vehicle Value:</span>
                                    <span class="high-way-r">-</span>
                                </div>
                            </div>

                            <div class="protection">
                                <p class="protection-title">Protection</p>

                                <div class="protection-row">
                                    <div class="protection-l">
                                        <span class="lead">Insurance Policy</span>
                                        <span class="lead-base">
                                            Pro+ Comprehensive Motor Insurance <br>
                                            By envio insurance holdings inc.
                                        </span>
                                    </div>
                                    <div class="protection-r">
                                        <span class="lead">Satellite Tracking</span>
                                        <span class="lead-base">
                                            envioBOx GPS Sensor
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="protection">
                                <p class="protection-title">Vehicle Host</p>

                                <div class="protection-row">
                                    <div class="protection-l">
                                        <div class="d-flex align-items-center">
                                            <div class="vehicle-host-img mr-2">
                                            </div>
                                            <div>
                                                <span class="lead mb-0">Prince Bayo</span>
                                                <span class="lead-base mb-0">Joined 23 Feb, 2020</span>
                                                <div class="lead mb-0">5.3
                                                    <i class='bx bxs-star' style="color: #FEB100; font-size: 14px;"></i>
                                                    <span class="lead-base" style="display: inline">
                                                        38 ratings
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex align-items-center">
                                            <span class="lead mb-0 mr-2">
                                                Vehicle Lease Terms
                                            </span>
                                            <span>
                                                <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M21 11V17C21 19.2091 19.2091 21 17 21H5C2.79086 21 1 19.2091 1 17V5C1 2.79086 2.79086 1 5 1H11M14.6864 3.02275C14.6864 3.02275 14.6864 4.45305 16.1167 5.88334C17.547 7.31364 18.9773 7.31364 18.9773 7.31364M8.15467 14.9896L11.1583 14.5605C11.5916 14.4986 11.9931 14.2978 12.3025 13.9884L20.4076 5.88334C21.1975 5.09341 21.1975 3.81268 20.4076 3.02275L18.9773 1.59245C18.1873 0.802517 16.9066 0.802517 16.1167 1.59245L8.01164 9.69746C7.70217 10.0069 7.50142 10.4084 7.43952 10.8417L7.01044 13.8453C6.91508 14.5128 7.4872 15.0849 8.15467 14.9896Z"
                                                        stroke="#828282" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="protection-r">
                                        <div class="location">
                                            <span class="mr-3">
                                                <svg width="9" height="10" viewBox="0 0 9 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.53891 5.34736C5.30361 5.34736 5.92353 4.72744 5.92353 3.96274C5.92353 3.19804 5.30361 2.57812 4.53891 2.57812C3.77421 2.57812 3.1543 3.19804 3.1543 3.96274C3.1543 4.72744 3.77421 5.34736 4.53891 5.34736Z"
                                                        stroke="#888888" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M8.00022 3.96154C8.00022 7.07692 4.53869 9.5 4.53869 9.5C4.53869 9.5 1.07715 7.07692 1.07715 3.96154C1.07715 3.04348 1.44185 2.16303 2.09101 1.51386C2.74017 0.864697 3.62063 0.5 4.53869 0.5C5.45674 0.5 6.3372 0.864697 6.98636 1.51386C7.63553 2.16303 8.00022 3.04348 8.00022 3.96154V3.96154Z"
                                                        stroke="#888888" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span>
                                                    Abuja, Nigeria
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="random-text">
                                Random text like, Bolt & mygarage.africa is collaborating to change the experience in the
                                e-hailing
                                services in Nigeria. This collaboration is offering unlimited possibilities to Host leasing
                                out
                                vehicles to verified drivers one city at a time in Nigeria.
                            </div>
                        </div>
                    </div>

                    <div class="inspection-sec">
                        <div class="high-way-scroll">
                            <div class="protection" style="margin-top: -7px">
                                <p class="protection-title mb-0">Availability</p>
                                <span class="lead-base">
                                    This is the period when the host wil be available to conduct pre-inspections
                                </span>
                                <div class="buttons-days">
                                    <button class="active-btn-day">Weekdays</button>
                                    <button>Weekends</button>
                                    <button>Always Open</button>
                                </div>
                            </div>

                            <div class="protection">
                                <p class="protection-title mb-0">Inspection Center</p>
                                <span class="lead-base">
                                    This is the period when the host wil be available to conduct pre-inspections
                                </span>

                                <div class="focus-inspection">
                                    <span class="mr-2">
                                        <svg width="45" height="45" viewBox="0 0 49 49" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.232422" y="0.5" width="48" height="48"
                                                rx="24" fill="#FEB100" />
                                            <path
                                                d="M29.6773 19.8333H27.344V19.0556C27.344 18.643 27.1801 18.2473 26.8884 17.9556C26.5966 17.6639 26.201 17.5 25.7884 17.5H22.6773C22.2647 17.5 21.8691 17.6639 21.5774 17.9556C21.2856 18.2473 21.1217 18.643 21.1217 19.0556V19.8333H18.7884C18.1696 19.8333 17.5761 20.0792 17.1385 20.5168C16.7009 20.9543 16.4551 21.5478 16.4551 22.1667V29.1667C16.4551 29.7855 16.7009 30.379 17.1385 30.8166C17.5761 31.2542 18.1696 31.5 18.7884 31.5H29.6773C30.2961 31.5 30.8896 31.2542 31.3272 30.8166C31.7648 30.379 32.0106 29.7855 32.0106 29.1667V22.1667C32.0106 21.5478 31.7648 20.9543 31.3272 20.5168C30.8896 20.0792 30.2961 19.8333 29.6773 19.8333ZM22.6773 19.0556H25.7884V19.8333H22.6773V19.0556ZM30.4551 29.1667C30.4551 29.3729 30.3731 29.5708 30.2273 29.7166C30.0814 29.8625 29.8836 29.9444 29.6773 29.9444H18.7884C18.5821 29.9444 18.3843 29.8625 18.2384 29.7166C18.0926 29.5708 18.0106 29.3729 18.0106 29.1667V25.2778H21.1217V26.0556C21.1217 26.2618 21.2037 26.4597 21.3496 26.6055C21.4954 26.7514 21.6932 26.8333 21.8995 26.8333C22.1058 26.8333 22.3036 26.7514 22.4495 26.6055C22.5954 26.4597 22.6773 26.2618 22.6773 26.0556V25.2778H25.7884V26.0556C25.7884 26.2618 25.8704 26.4597 26.0162 26.6055C26.1621 26.7514 26.3599 26.8333 26.5662 26.8333C26.7725 26.8333 26.9703 26.7514 27.1162 26.6055C27.262 26.4597 27.344 26.2618 27.344 26.0556V25.2778H30.4551V29.1667ZM30.4551 23.7222H18.0106V22.1667C18.0106 21.9604 18.0926 21.7626 18.2384 21.6167C18.3843 21.4708 18.5821 21.3889 18.7884 21.3889H29.6773C29.8836 21.3889 30.0814 21.4708 30.2273 21.6167C30.3731 21.7626 30.4551 21.9604 30.4551 22.1667V23.7222Z"
                                                fill="#333333" />
                                        </svg>
                                    </span>
                                    <div>
                                        <span class="protection-title mb-0">Super Automobile Center</span>
                                        <span class="lead-base">No 26, 6th Avenue Gwarinpa - Abuja</span>
                                    </div>
                                </div>
                            </div>

                            <div class="protection border-0">
                                <p class="protection-title mb-0">Reviews</p>
                                <div class="reviews">
                                    <div class="review">
                                        <div class="vehicle-host-img mr-2">
                                        </div>
                                        <div>
                                            <div class="star-reviews">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                            </div>
                                            <p class="reviewer mb-1">
                                                Sharafadeen Mubarak <span class="date-review">23 Feb, 2020</span>
                                            </p>
                                            <p class="review-text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit voluptas.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="vehicle-host-img mr-2">
                                        </div>
                                        <div>
                                            <div class="star-reviews">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                            </div>
                                            <p class="reviewer mb-1">
                                                Sharafadeen Mubarak <span class="date-review">23 Feb, 2020</span>
                                            </p>
                                            <p class="review-text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit voluptas.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="vehicle-host-img mr-2">
                                        </div>
                                        <div>
                                            <div class="star-reviews">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                            </div>
                                            <p class="reviewer mb-1">
                                                Sharafadeen Mubarak <span class="date-review">23 Feb, 2020</span>
                                            </p>
                                            <p class="review-text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit voluptas.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="shade-bg-100"></div>
            </div>

            <script>
                let sideHightWay = document.querySelector('.side-high-way');
                let showSide = document.querySelector('.showSide');
                let closeHighWay = document.querySelector('.closeHighWay');
                let shadeBg = document.querySelector('.shade-bg-100');

                let vehicleSpecBtn = document.querySelector('.vehicleSpecBtn');
                let pricingBtn = document.querySelector('.pricingBtn');
                let inspectionBtn = document.querySelector('.inspectionBtn');

                let vehicleSec = document.querySelector('.vehicle-spec');
                let priceConfigSec = document.querySelector('.price-config');
                let inspectionSec = document.querySelector('.inspection-sec');

                // let dropDownList = document.querySelector('.drop-down-list');
                // let newListingBtn = document.querySelector('.newListingBtn');
                // let closeList = document.querySelector('.close-list');

                // closeList.addEventListener('click', () => {
                //     dropDownList.style.display = "none";
                // });
                // newListingBtn.addEventListener('click', () => {
                //     dropDownList.style.display = "flex";
                // });

                showSide.addEventListener('click', () => {
                    shadeBg.style.display = "block";
                    sideHightWay.style.display = "block";
                })
                closeHighWay.addEventListener('click', () => {
                    shadeBg.style.display = "none";
                    sideHightWay.style.display = "none";
                    // dropDownList.style.display = "none";
                })

                vehicleSpecBtn.addEventListener('click', () => {
                    vehicleSpecBtn.classList.add('bbd');
                    pricingBtn.classList.remove('bbd');
                    inspectionBtn.classList.remove('bbd');
                    vehicleSec.style.display = "block";
                    priceConfigSec.style.display = "none";
                    inspectionSec.style.display = "none";
                })
                pricingBtn.addEventListener('click', () => {
                    pricingBtn.classList.add('bbd');
                    vehicleSpecBtn.classList.remove('bbd');
                    inspectionBtn.classList.remove('bbd');
                    vehicleSec.style.display = "none";
                    priceConfigSec.style.display = "block";
                    inspectionSec.style.display = "none";
                })
                inspectionBtn.addEventListener('click', () => {
                    inspectionBtn.classList.add('bbd');
                    pricingBtn.classList.remove('bbd');
                    vehicleSpecBtn.classList.remove('bbd');
                    vehicleSec.style.display = "none";
                    priceConfigSec.style.display = "none";
                    inspectionSec.style.display = "block";
                })
            </script>
        @endsection
