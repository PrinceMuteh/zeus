@extends('main')
@section('content')
    <title>Zeus | Finance Office</title>
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
                <ul class="sub-tabs">
                    <li class="list_finance_transaction bbd">
                        <a href="finance-office">Deposit Module</a>
                    </li>
                    <li class="list_finance_remittance">
                        <a href="payout-manager">
                            Payout Manager
                        </a>
                    </li>
                </ul>
                <!-- overview -->
                <div class="finance_general_overview">
                    <div class="row g-2">
                        <div class="col-sm-6 col-md-12 col-lg-4">
                            <div class="boxInfo">
                                <div class="topInfo">
                                    <div class="vectorBox">
                                        <img src="{{ asset('assets/images/vector.png') }}" alt="" />
                                    </div>
                                    <i class="bx bx-dots-vertical-rounded adjust"></i>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1">ACCOUNT BALANCE</span><br />
                                        <span class="lft2 text-inter">$5,600.00</span>
                                    </div>
                                    <span class="rightBottom bg-light-red red-text font-weight-bold">
                                        <i class="bx bx-down-arrow-alt"></i>
                                        <span>22.5%</span> <span>APRIL</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-4">
                            <div class="boxInfo">
                                <div class="topInfo">
                                    <div class="vectorBox">
                                        <img src="{{ asset('assets/images/vector.png') }}" alt="" />
                                    </div>
                                    <i class="bx bx-dots-vertical-rounded adjust"></i>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1">TOTAL WITHDRAWN</span><br />
                                        <span class="lft2 text-inter">$2,505</span>
                                    </div>
                                    <span class="rightBottom bg-light-green green-text font-weight-bold">
                                        <i class="bx bx-down-arrow-alt"></i>
                                        <span>22.5%</span> <span>APRIL</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-4">
                            <div class="boxInfo">
                                <div class="topInfo">
                                    <div class="vectorBox">
                                        <img src="{{ asset('assets/images/vector.png') }}" alt="" />
                                    </div>
                                    <i class="bx bx-dots-vertical-rounded adjust"></i>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1">TRANSACTION COUNT</span><br />
                                        <span class="lft2 text-inter">350</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-sm-6 col-md-12 col-lg-8">
                            <div class="graph-section">
                                <div id="chart_div" style="width: 100%; height: 100%;"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-4">
                            <div class="map-sec">
                                <span class="top-text">
                                    WITHDRAW TO BANK
                                </span>
                                <div class="form-group mb-4 mt-3">
                                    <label for="">AMOUNT</label>
                                    <input type="text" class="form-control" placeholder="$2,000">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">DESCRIPTION</label>
                                    <input type="text" class="form-control" placeholder="1st Quatar Withdrawal">
                                </div>
                                <div class="form-group mb-3">
                                    <button class="btn submitBtn" data-bs-toggle="modal"
                                        data-bs-target="#requestPayment">REQUEST PAYMENT</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="requestPayment" tabindex="-1"
                                    aria-labelledby="requestPaymentLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="requestPaymentLabel">CONFIRM WITHDRAWAL</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="everyInfo">
                                                    <p class="info-text-top">
                                                        Summary
                                                    </p>
                                                    <div class="formSec container-fluid"
                                                        style="background: #fafafa; border-radius: 6px; height: auto">
                                                        <div>
                                                            <div class="row mb-3">
                                                                <div class="col-6 side1">Amount</div>
                                                                <div class="col-6 side2">$2,000</div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-6 side1">Description</div>
                                                                <div class="col-6 side2">!st Quatar Withdrawal</div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-6 side1">Bank</div>
                                                                <div class="col-6 side2">envio Bank Inc.</div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-6 side1">Account Number</div>
                                                                <div class="col-6 side2">2129306328</div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-6 side1">Beneficiary Name</div>
                                                                <div class="col-6 side2">envio Radio FM</div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-6 side1">Platform Commission</div>
                                                                <div class="col-6 side2">$2,500</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="main2">
                                                    <div class="form-group mt-2">
                                                        <small>Authenticate withdrawl</small>
                                                        <input type="password" class="form-control"
                                                            placeholder="Password">
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <button class="submitBtn btn">SUMBIT</button>
                                                    </div>
                                                </div>
                                            </div>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Balance', 'Withdrawal'],
                ['JAN', 165, 938],
                ['FEB', 135, 1120],
                ['MAR', 157, 1167],
                ['APR', 139, 1110],
                ['MAY', 136, 691],
                ['JUN', 136, 691],
                ['JLY', 136, 691],
                ['AUG', 136, 691],
                ['SEP', 136, 691],
                ['OCT', 136, 691],
                ['NOV', 136, 691],
                ['DEC', 136, 691],
            ]);

            var options = {
                title: 'TRANSACTION CHART',
                hAxis: {
                    title: 'Month'
                },
                seriesType: 'bars',
                series: {
                    5: {
                        type: 'line'
                    }
                },
                // background: '#8DBFDB'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection
