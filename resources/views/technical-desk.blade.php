@extends('main')
@section('content')
    <title>Zeus | Techincal Desk</title>
    <style>
        tr:nth-last-child() {
            border-bottom: none;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-item {
            font-size: 10px;
        }
    </style>
    <div class="content-page" style="background: #fff;">
        <div class="content">
            <div class="container-fluid m15">
                <div class="top-row">
                    <div>
                        <p class="sectionTitle text-inter pb-0 pl-0">Technical Desk</p>
                    </div>
                </div>
                <ul class="sub-tabs border-none mb-0" style="margin-left: 5px;">
                    <li class="list_finance_transaction bbd border-none">
                        <a class="fw-bold">Dashboard</a>
                    </li>
                    <li class="list_finance_remittance border-none">
                        <a href="task-logs">
                            Task(S) LOG
                        </a>
                    </li>
                </ul>

                <div class="row mt-2 techinal-dashboard">
                    <div class="col-lg-6">
                        <div class="technical-inner">
                            <div class="p-1">
                                <canvas id="myChart" height="40vh" width="80vw"></canvas>
                            </div>
                        </div>
                        <div class="border-work-100 mt-2">
                            <div class="row pr-4">
                                <div class="col-sm-6 col-md-12 col-lg-6 p-3">
                                    <div class="row_top_info">
                                        <div class="top3">
                                            <span> ALL TASK(S)</span>
                                            <span class="arrow_box">
                                                <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.79692 8.91797L10.9998 3.71511L16.2026 8.91797"
                                                        stroke="#08102E" stroke-width="2" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11 18.2852V3.85944" stroke="#08102E" stroke-width="2"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                        <span class="deposit_amount">
                                            0
                                        </span>
                                        <span class="total_info">
                                            LAST UPDATED:23 AUG, 2022
                                        </span>
                                        <div class="line-right-100"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 col-lg-6 p-3">
                                    <div class="row_top_info">
                                        <div class="top3">
                                            <span>PENDING TASK(S)</span>
                                            <span class="arrow_box">
                                                <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.79692 8.91797L10.9998 3.71511L16.2026 8.91797"
                                                        stroke="#08102E" stroke-width="2" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11 18.2852V3.85944" stroke="#08102E" stroke-width="2"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                        <span class="deposit_amount">
                                            0
                                        </span>
                                        <span class="total_info">
                                            LAST UPDATED:23 AUG, 2022
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 col-lg-6 p-3">
                                    <div class="row_top_info">
                                        <div class="top3">
                                            <span> NEW TASK(S)</span>
                                            <span class="arrow_box">
                                                <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.79692 8.91797L10.9998 3.71511L16.2026 8.91797"
                                                        stroke="#08102E" stroke-width="2" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11 18.2852V3.85944" stroke="#08102E" stroke-width="2"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                        <span class="deposit_amount">
                                            0
                                        </span>
                                        <span class="total_info">
                                            LAST UPDATED:23 AUG, 2022
                                        </span>
                                        <div class="line-right-100"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 col-lg-6 p-3">
                                    <div class="row_top_info">
                                        <div class="top3">
                                            <span>COMPLETED TASK(S)</span>
                                            <span class="arrow_box">
                                                <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.79692 8.91797L10.9998 3.71511L16.2026 8.91797"
                                                        stroke="#08102E" stroke-width="2" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11 18.2852V3.85944" stroke="#08102E" stroke-width="2"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                        <span class="deposit_amount">
                                            0
                                        </span>
                                        <span class="total_info">
                                            LAST UPDATED:23 AUG, 2022
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="card-box pl-0 pr-0 pt-2 pb-2">
                                    <div class="table-title">
                                        <span class="tableHead">
                                            RECENT TASK
                                        </span>
                                        <a href="task-logs" class="seeMore">
                                            see more
                                        </a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" class="form-check">
                                                    </th>
                                                    <th>TASK ID</th>
                                                    <th>CATEGORY</th>
                                                    <th>STATUS</th>
                                                    <th>DATE</th>
                                                    <th>STATUS</th>
                                                    <th>LOCATION</th>
                                                    <th>
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <th scope="row">
                                                        <input type="checkbox" class="form-check">
                                                    </th>
                                                    <td>45678-EWS</td>
                                                    <td>NEW INSTALLATION</td>
                                                    <td>PENDING</td>
                                                    <td>23 FEB, 2021</td>
                                                    <td>PENDING</td>
                                                    <td>LAGOS, NIG</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <i class='bx bx-dots-vertical-rounded dropdown-toggle'
                                                                data-bs-toggle="dropdown"></i>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">ASSIGN</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">UPDATE
                                                                        STATUS</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">EDIT</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">DELETE</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </td>
                                                </tr>
                                                --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="technical-inner border-none">
                            <div class="row g-2">
                                <div class="col-lg-7">
                                    <div class="people-manager">
                                        <span class="lead-people">
                                            people manager
                                        </span>
                                        <div class="supervisor-main">
                                            <div class="supervisor-info">
                                                <span class="circle-supervisor"></span>
                                                <span class="supervisors-desc">supervisors</span>
                                                <span class="supervisor-count">0</span>
                                            </div>
                                            <div class="supervisor-info">
                                                <span class="circle-supervisor"></span>
                                                <span class="supervisors-desc">supervisors</span>
                                                <span class="supervisor-count">0</span>
                                            </div>
                                            <div class="supervisor-info">
                                                <span class="circle-supervisor"></span>
                                                <span class="supervisors-desc">supervisors</span>
                                                <span class="supervisor-count">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="est-earning">
                                        <div class="lead-est">
                                            <span class="est-desc">my est earning(s)</span>
                                            <span class="arrow-est">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.79741 8.91797L11.0003 3.71511L16.2031 8.91797"
                                                        stroke="white" stroke-width="2" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11 18.2861V3.86042" stroke="white" stroke-width="2"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="est-value">
                                            <span class="est-1">
                                                ₦ 0
                                            </span>
                                            <span class="est-2">
                                                LAST UPDATED:23 AUG, 2022
                                            </span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="technical-inner taskCategory mt-2">
                            <span class="lead-people">
                                task category
                            </span>


                            <div class="row g-2 mt-4 mb-2">
                                <div class="col-lg-4">
                                    <canvas id="myChart-doughnut" style="max-width:100%"></canvas>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <span class="value-donut">
                                            <div class="dot-100 mr-1" style="background:#032D80;">
                                            </div>
                                            <div>
                                                <div class="t-100">NEW INSTALLATION</div>
                                                <div class="t-200">0</div>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="value-donut">
                                            <div class="dot-100 mr-1" style="background: #2958B2;">
                                            </div>
                                            <div>
                                                <div class="t-100">OFFLINE CARS</div>
                                                <div class="t-200">0</div>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="value-donut">
                                            <div class="dot-100 mr-1" style="background: #7E9BD1;">
                                            </div>
                                            <div>
                                                <div class="t-100">WITHDRAWALS</div>
                                                <div class="t-200">0</div>
                                            </div>
                                        </span>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <span class="value-donut">
                                            <div class="dot-100 mr-1" style="background: #DBE3F2;">
                                            </div>
                                            <div>
                                                <div class="t-100">RESET</div>
                                                <div class="t-200">0</div>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="value-donut">
                                            <div class="dot-100 mr-1" style="background: rgba(13, 66, 168, 0.45);">
                                            </div>
                                            <div>
                                                <div class="t-100">SUPPORT</div>
                                                <div class="t-200">0</div>
                                            </div>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="card-box pl-0 pr-0 pt-2 pb-2">
                                    <div class="table-title">
                                        <span class="tableHead">
                                            ACTIVITY LOG
                                        </span>
                                        <a href="" class="seeMore">
                                            see more
                                        </a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" class="form-check">
                                                    </th>
                                                    <th>LOG ID</th>
                                                    <th>ACTIVITY</th>
                                                    <th>TIME</th>
                                                    <th>DATE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <input type="checkbox" class="form-check">
                                                    </th>
                                                    <td>45678-EWS</td>
                                                    <td>NEW INSTALLATION</td>
                                                    <td>12:34 PM</td>
                                                    <td>23 FEB, 2021</td>
                                                </tr>
                                              
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
        <!-- end content -->
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="{{ asset('assets/js/chart.js') }} "></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                datasets: [{
                    label: 'TASK TREND',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    borderWidth: 1,
                    minBarLength: 10,
                    highlightFill: "green",
                    highlightStroke: "red",
                    backgroundColor: 'rgba(4, 4, 255, 0.406)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var yValues = [1, 1, 1];
        var barColors = [
            "#0D42A8F2",
            "#0d43a8b3",
            "#0d43a83e"
        ];

        new Chart("myChart-doughnut", {
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
