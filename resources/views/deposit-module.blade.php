@extends('main')
@section('content')
    <title>Zeus | Deposit Module</title>
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid m15">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle text-inter pb-0 pl-0">Finance Office</p>
                    </div>
                </div>
                <div class="links-filter">
                    <ul class="sub-tab-finance">
                        <li class="list_finance_transaction bbd">
                            <a href="finance-office">Deposit Module</a>
                        </li>
                        <li class="list_finance_remittance">
                            <a href="payout-manager">
                                Payout Manager
                            </a>
                        </li>
                    </ul>

                    <div class="filter-calender">
                        <div class="filterIcon">
                            <svg width="15" height="14" viewBox="0 0 17 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.65252 0.779297H15.668C15.7944 0.779297 15.9181 0.816017 16.0241 0.884993C16.13 0.95397 16.2136 1.05223 16.2648 1.16784C16.3159 1.28345 16.3324 1.41142 16.3121 1.53621C16.2919 1.66099 16.2359 1.77722 16.1509 1.87076L10.7875 7.7704C10.6783 7.89051 10.6178 8.04701 10.6178 8.20933V12.828C10.6178 12.9355 10.5913 13.0412 10.5406 13.1359C10.4899 13.2306 10.4167 13.3114 10.3273 13.371L7.71718 15.111C7.61891 15.1765 7.5047 15.2142 7.38673 15.2199C7.26876 15.2256 7.15146 15.1991 7.04733 15.1434C6.9432 15.0877 6.85614 15.0047 6.79545 14.9034C6.73476 14.8021 6.7027 14.6862 6.7027 14.5681V8.20933C6.7027 8.04701 6.6422 7.89051 6.53301 7.7704L1.1697 1.87076C1.08466 1.77722 1.02863 1.66099 1.0084 1.53621C0.988181 1.41142 1.00464 1.28345 1.05578 1.16784C1.10692 1.05223 1.19054 0.95397 1.29648 0.884993C1.40242 0.816017 1.52611 0.779297 1.65252 0.779297V0.779297Z"
                                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="filterCalender">
                            <span>FILTER:<span class="font-weight-bold">CUSTOM RANGE</span></span>
                            <img src="{{ asset('assets/images/calender.png') }}" alt="" />
                        </div>

                        <div class="filter-section">
                            <div class="top-filter-section">
                                <span>SUPER FILTER</span>
                                <span class="close-filter-section">
                                    <i class='bx bx-x'></i>
                                </span>
                            </div>

                            <div>
                                <div class="form-group mb-1">
                                    <label for="">By Fleet</label>
                                    <select name="">
                                        <option value="">Default / All</option>
                                    </select>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">Stakeholders</label>
                                    <select name="">
                                        <option value="">Investors</option>
                                    </select>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">Specify Period</label>
                                    <select name="">
                                        <option value="">--Please select--</option>
                                    </select>
                                </div>

                                <div class="date-range">Date range</div>
                                <div class="form-group mb-1">
                                    <label for="">Start Date</label>
                                    <input type="date" name="">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">End Date</label>
                                    <input type="date" name="">
                                </div>

                                <button class="submit-modal">
                                    submit
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- fleet -->
                <div class="finance_transaction_table">
                    {{-- first section --}}
                    <div class="index_finance_transaction_section">
                        <div class="finance_section">
                            <span class="top-text">Deposit by category</span>
                            <div class="chart_total_deposit mb-2 mt-1">
                                <div class="canvas-chart">
                                    <canvas id="myChart" style="max-width:180px"></canvas>
                                    <div class="count-chart">
                                        <span>total deposit</span>
                                        <span>₦500M</span>
                                    </div>
                                </div>
                            </div>
                            <span class="top-text mt-2">
                                Deposit Details
                            </span>
                            <div class="notice_section">
                                <div class="deposit_details_info">
                                    <a href="/general-remittance">
                                        <div class="single_deposit_detail">
                                            <span class="notice notice_pink"></span>
                                            <div class="notice_desc">
                                                <span>General Remittance</span>
                                                <span class="notice_amount">₦ 0</span>
                                            </div>
                                            <span class="small_arrow">
                                                <img src="{{ asset('assets/images/arrow-small-right.svg') }}"
                                                    alt="">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="deposit_details_info">
                                    <div class="single_deposit_detail sd2">
                                        <span class="notice notice_pink_200"></span>
                                        <div class="notice_desc">
                                            <span>Maintenance Contr.</span>
                                            <span class="notice_amount">₦ 0</span>
                                        </div>
                                        <span class="small_arrow">
                                            <img src="{{ asset('assets/images/arrow-small-right.svg') }}" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="deposit_details_info">
                                    <div class="single_deposit_detail sd3">
                                        <span class="notice notice_purple"></span>
                                        <div class="notice_desc">
                                            <span>quick cash repayment</span>
                                            <span class="notice_amount">₦ 0</span>
                                        </div>
                                        <span class="small_arrow">
                                            <img src="{{ asset('assets/images/arrow-small-right.svg') }}" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="deposit_details_info">
                                    <div class="single_deposit_detail sd4">
                                        <span class="notice notice_purple_200"></span>
                                        <div class="notice_desc">
                                            <span>Union Due/Fees</span>
                                            <span class="notice_amount">₦ 0</span>
                                        </div>
                                        <span class="small_arrow">
                                            <img src="{{ asset('assets/images/arrow-small-right.svg') }}" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="deposit_details_info">
                                    <div class="single_deposit_detail border-none sd5">
                                        <span class="notice notice_blue"></span>
                                        <div class="notice_desc">
                                            <span>Softpurse Repayment</span>
                                            <span class="notice_amount">₦ 0</span>
                                        </div>
                                        <span class="small_arrow">
                                            <img src="{{ asset('assets/images/arrow-small-right.svg') }}" alt="">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-index-finance">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <div class="table-finance-section">
                                        <div class="table-responsive">
                                            @include('components.payoutManager.table')

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- general remittance --}}
                    <div class="row general_remittance_section">
                        <div class="col-sm-6 col-md-12 col-lg-3 mb-2">
                            <div class="finance_section">
                                <span class="top-text"> <img class="mr-1" onclick="returnIndex()"
                                        src="{{ asset('assets/images/arrow-left.svg') }}" class=""
                                        alt="" />General
                                    Remmittance</span>
                                <div class="chart_total_deposit mb-3 mt-3">
                                    {{-- <div id="donut_single" style="width: 180px; height: 180px;"></div> --}}
                                </div>
                                <span class="top-text mt-3">
                                    Deposit by Trend
                                </span>
                                {{-- <span class="filter_date_remittance"></span> --}}
                                <div class="notice_section">
                                    <img src="{{ asset('assets/images/side_bar.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-9">
                            <div class="finance_section">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Project Payment(s)</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦ 0
                                            </span>
                                            <span class="total_info">
                                                Total from 0 entries
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Paid Users</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦ 0
                                            </span>
                                            <span class="total_info">
                                                Total from 0 entries
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Pending User(s)</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-down.svg') }}"
                                                        alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦ 0
                                            </span>
                                            <span class="total_info">
                                                Total from 0 entries
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-12 mt-2">
                                    <div class="finance_section">
                                        <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-bordered nowrap"
                                                style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                                <thead class="text-inter">
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" class="check" />
                                                        </th>
                                                        <th>PLATE NO.</th>
                                                        <th>DRIVER NAME</th>
                                                        <th>FLEET</th>
                                                        <th>AMOUNT</th>
                                                        <th>REFERENCE</th>
                                                        <th>DATE</th>
                                                        <th>REASON </th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- maintenance commission --}}
                    <div class="row maintenance_contribution_section">
                        <div class="col-sm-6 col-md-12 col-lg-3 mb-2">
                            <div class="finance_section">
                                <span class="top-text"> <img class="mr-1" onclick="returnIndex()"
                                        src="{{ asset('assets/images/arrow-left.svg') }}" class=""
                                        alt="" />Maintenance
                                    Contr.</span>
                                <div class="chart_total_deposit mb-3 mt-3">

                                </div>
                                <span class="top-text mt-3">
                                    Deposit by Trend
                                </span>
                                {{-- <span class="filter_date_remittance"></span> --}}
                                <div class="notice_section">
                                    <img src="{{ asset('assets/images/side_bar.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-9">
                            <div class="finance_section">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Project Payment(s)</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦345,000,000.00
                                            </span>
                                            <span class="total_info">
                                                Total from 345 entries
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Paid Users</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-down.svg') }}"
                                                        alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦345,000,000.00
                                            </span>
                                            <span class="total_info">
                                                Total from 300 entries
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Pending User(s)</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-down.svg') }}"
                                                        alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦45,000,000.00
                                            </span>
                                            <span class="total_info">
                                                Total from 45 entries
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-12 mt-2">
                                    <div class="finance_section">
                                        <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-bordered nowrap"
                                                style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                                <thead class="text-inter">
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" class="check" />
                                                        </th>
                                                        <th>PLATE NO.</th>
                                                        <th>DRIVER NAME</th>
                                                        <th>FLEET</th>
                                                        <th>AMOUNT</th>
                                                        <th>REFERENCE</th>
                                                        <th>DATE</th>
                                                        <th>REASON </th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- platform commission --}}
                    <div class="row platform_contribution_section">
                        <div class="col-sm-6 col-md-12 col-lg-3 mb-2">
                            <div class="finance_section">
                                <span class="top-text"> <img class="mr-1" onclick="returnIndex()"
                                        src="{{ asset('assets/images/arrow-left.svg') }}" class=""
                                        alt="" />Platform
                                    Commission.</span>
                                <div class="chart_total_deposit mb-3 mt-3">

                                </div>
                                <span class="top-text mt-3">
                                    Deposit by Trend
                                </span>
                                {{-- <span class="filter_date_remittance"></span> --}}
                                <div class="notice_section">
                                    <img src="{{ asset('assets/images/side_bar.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-12 mt-2">
                                    <div class="finance_section">
                                        <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-bordered nowrap"
                                                style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                                <thead class="text-inter">
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" class="check" />
                                                        </th>
                                                        <th>PLATE NO.</th>
                                                        <th>DRIVER NAME</th>
                                                        <th>FLEET</th>
                                                        <th>AMOUNT</th>
                                                        <th>REFERENCE</th>
                                                        <th>DATE</th>
                                                        <th>REASON </th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- union due fees --}}
                    <div class="row union_contribution_section">
                        <div class="col-sm-6 col-md-12 col-lg-3 mb-2">
                            <div class="finance_section">
                                <span class="top-text"> <img class="mr-1" onclick="returnIndex()"
                                        src="{{ asset('assets/images/arrow-left.svg') }}" class=""
                                        alt="" />Union
                                    Due/Fees.</span>
                                <div class="chart_total_deposit mb-3 mt-3">

                                </div>
                                <span class="top-text mt-3">
                                    Deposit by Trend
                                </span>
                                {{-- <span class="filter_date_remittance"></span> --}}
                                <div class="notice_section">
                                    <img src="{{ asset('assets/images/side_bar.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-12 mt-2">
                                    <div class="finance_section">
                                        <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-bordered nowrap"
                                                style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                                <thead class="text-inter">
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" class="check" />
                                                        </th>
                                                        <th>PLATE NO.</th>
                                                        <th>DRIVER NAME</th>
                                                        <th>FLEET</th>
                                                        <th>AMOUNT</th>
                                                        <th>REFERENCE</th>
                                                        <th>DATE</th>
                                                        <th>REASON </th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- softpurse repayment --}}
                    <div class="row softpurse_contribution_section">
                        <div class="col-sm-6 col-md-12 col-lg-3 mb-2">
                            <div class="finance_section">
                                <span class="top-text"> <img class="mr-1" onclick="returnIndex()"
                                        src="{{ asset('assets/images/arrow-left.svg') }}" class=""
                                        alt="" />Softpurse
                                    Repayment</span>
                                <div class="chart_total_deposit mb-3 mt-3">

                                </div>
                                <span class="top-text mt-3">
                                    Deposit by Trend
                                </span>
                                <div class="notice_section">
                                    <div class="deposit_details_info">
                                        <div class="single_deposit_detail">
                                            <span class="notice notice_pink"></span>
                                            <span class="notice_desc">Total Softpurse Credit</span>
                                            <span class="notice_amount">₦ 0</span>
                                        </div>
                                    </div>
                                    <div class="deposit_details_info">
                                        <div class="single_deposit_detail sd2">
                                            <span class="notice notice_pink_200"></span>
                                            <span class="notice_desc">Softpurse Repaid</span>
                                            <span class="notice_amount">₦ 0</span>
                                        </div>
                                    </div>
                                    <div class="deposit_details_info">
                                        <div class="single_deposit_detail sd3">
                                            <span class="notice notice_purple"></span>
                                            <span class="notice_desc">Pending Softpurse</span>
                                            <span class="notice_amount">₦ 0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-12 mt-2">
                                    <div class="finance_section">
                                        <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-bordered nowrap"
                                                style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                                <thead class="text-inter">
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" class="check" />
                                                        </th>
                                                        <th>PLATE NO.</th>
                                                        <th>DRIVER NAME</th>
                                                        <th>FLEET</th>
                                                        <th>AMOUNT</th>
                                                        <th>REFERENCE</th>
                                                        <th>DATE</th>
                                                        <th>REASON </th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- agent commission --}}
                    <div class="row agent_commission_section">
                        <div class="col-sm-6 col-md-12 col-lg-3 mb-2">
                            <div class="finance_section">
                                <span class="top-text"> <img class="mr-1" onclick="returnIndex()"
                                        src="{{ asset('assets/images/arrow-left.svg') }}" alt="" />Agent
                                    Commission</span>
                                <div class="chart_total_deposit mb-3 mt-3">

                                </div>
                                <span class="top-text mt-3">
                                    Deposit by Trend
                                </span>
                                {{-- <span class="filter_date_remittance"></span> --}}
                                <div class="notice_section">
                                    <img src="{{ asset('assets/images/side_bar.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-12 mt-2">
                                    <div class="finance_section">
                                        <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-bordered nowrap"
                                                style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                                <thead class="text-inter">
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" class="check" />
                                                        </th>
                                                        <th>PLATE NO.</th>
                                                        <th>DRIVER NAME</th>
                                                        <th>FLEET</th>
                                                        <th>AMOUNT</th>
                                                        <th>REFERENCE</th>
                                                        <th>DATE</th>
                                                        <th>REASON </th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>dEMAJI BANKOLE</td>
                                                        <td>BREKETE, NG</td>
                                                        <td>₦35,000.00</td>
                                                        <td>DX23RM345</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>Remittance</td>
                                                        <td>SUCCESS</td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
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
        let index_finance_transaction_section = document.querySelector('.index_finance_transaction_section');
        let general_remittance_section = document.querySelector('.general_remittance_section');
        let maintenance_contribution_section = document.querySelector('.maintenance_contribution_section');
        let platform_contribution_section = document.querySelector('.platform_contribution_section');
        let union_contribution_section = document.querySelector('.union_contribution_section');
        let softpurse_contribution_section = document.querySelector('.softpurse_contribution_section');
        let agent_commission_section = document.querySelector('.agent_commission_section');
        // let loadIndex = document.querySelector('.returnIndex');

        let sd1 = document.querySelector('.sd1');
        let sd2 = document.querySelector('.sd2');
        let sd3 = document.querySelector('.sd3');
        let sd4 = document.querySelector('.sd4');
        let sd5 = document.querySelector('.sd5');
        let sd6 = document.querySelector('.sd6');

        function returnIndex() {
            general_remittance_section.style.display = 'none';
            maintenance_contribution_section.style.display = 'none';
            platform_contribution_section.style.display = 'none';
            union_contribution_section.style.display = 'none';
            softpurse_contribution_section.style.display = 'none';
            agent_commission_section.style.display = 'none';
            index_finance_transaction_section.style.display = 'flex';
        }

        sd1.addEventListener('click', () => {
            general_remittance_section.style.display = 'flex';
            maintenance_contribution_section.style.display = 'none';
            platform_contribution_section.style.display = 'none';
            union_contribution_section.style.display = 'none';
            softpurse_contribution_section.style.display = 'none';
            agent_commission_section.style.display = 'none';
            index_finance_transaction_section.style.display = 'none';
        });
        sd2.addEventListener('click', () => {
            general_remittance_section.style.display = 'none';
            maintenance_contribution_section.style.display = 'flex';
            platform_contribution_section.style.display = 'none';
            union_contribution_section.style.display = 'none';
            softpurse_contribution_section.style.display = 'none';
            agent_commission_section.style.display = 'none';
            index_finance_transaction_section.style.display = 'none';
        });
        sd3.addEventListener('click', () => {
            general_remittance_section.style.display = 'none';
            maintenance_contribution_section.style.display = 'none';
            platform_contribution_section.style.display = 'flex';
            union_contribution_section.style.display = 'none';
            softpurse_contribution_section.style.display = 'none';
            agent_commission_section.style.display = 'none';
            index_finance_transaction_section.style.display = 'none';
        });
        sd4.addEventListener('click', () => {
            general_remittance_section.style.display = 'none';
            maintenance_contribution_section.style.display = 'none';
            platform_contribution_section.style.display = 'none';
            union_contribution_section.style.display = 'flex';
            softpurse_contribution_section.style.display = 'none';
            agent_commission_section.style.display = 'none';
            index_finance_transaction_section.style.display = 'none';
        });
        sd5.addEventListener('click', () => {
            general_remittance_section.style.display = 'none';
            maintenance_contribution_section.style.display = 'none';
            platform_contribution_section.style.display = 'none';
            union_contribution_section.style.display = 'none';
            softpurse_contribution_section.style.display = 'flex';
            agent_commission_section.style.display = 'none';
            index_finance_transaction_section.style.display = 'none';
        });
        sd6.addEventListener('click', () => {
            general_remittance_section.style.display = 'none';
            maintenance_contribution_section.style.display = 'none';
            platform_contribution_section.style.display = 'none';
            union_contribution_section.style.display = 'none';
            softpurse_contribution_section.style.display = 'none';
            agent_commission_section.style.display = 'flex';
            index_finance_transaction_section.style.display = 'none';
        });
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script src="{{ asset('assets/js/chart.js') }} "></script>
    <script>
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24];
        var barColors = [
            "#ade89e",
            "#7fd967",
            "#F4FF78",
            "#41c65f"
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
                    display: false,
                    text: "World Wide Wine Production 2018"
                }
            }
        });
    </script>


    <script>
        const ctx = document.getElementById('top_x_div').getContext('2d');
        var datas = <?php echo json_encode($data); ?>

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

                datasets: [{
                    label: '# of traansactions',
                    data: datas,
                    barPercentage: 0.5,
                    barThickness: 70,
                    maxBarThickness: 44,
                    minBarLength: 10,
                    highlightFill: "green",
                    highlightStroke: "red",
                    backgroundColor: 'rgba(4, 4, 255, 0.406)'

                    // borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        gridLines: {
                            drawOnChartArea: false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            drawOnChartArea: false
                        }
                    }]
                }
            }
        });
    </script>








    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Effort', 'Amount given'],
                ['My all', 100],
            ]);

            var options = {
                pieHole: 0.8,
                pieSliceTextStyle: {
                    color: 'black',
                },
                legend: 'none'
            };

            var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        var datas = <?php echo json_encode($data); ?>

        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Month', 'total'],
                ["JAN", datas[1]],
                ["FEB", datas[2]],
                ["MAR", datas[3]],
                ["APR", datas[4]],
                ['MAY', datas[5]],
                ['JUN', datas[6]],
                ['JUL', datas[7]],
                ['AUG', datas[8]],
                ['SEP', datas[9]],
                ['OCT', datas[10]],
                ['NOV', datas[11]],
                ['DEC', datas[12]],
            ]);
            var options = {
                // width: 1024,
                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'Deposit Statistics',
                    subtitle: 'by Total'
                },
                axes: {
                    x: {
                        0: {
                            side: 'bottom',
                            label: 'All Transaction'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "60%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>
@endsection
