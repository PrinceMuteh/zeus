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

                <a href="/finance-office">
                    <div class="back">
                        <span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.56982 5.93031L3.49982 12.0003L9.56982 18.0703" stroke="#08102E" stroke-width="2"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20.5 12L3.67 12" stroke="#08102E" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>

                        <span>General Remittance</span>
                    </div>
                </a>

                <div class="summary-remite">
                    <div class="summary-remite-in">
                        <div class="summary-in align-items-center">
                            <div class="left-summary">
                                <canvas id="myChart" style="max-width:150px"></canvas>
                            </div>
                            <div class="figurechart">
                                <p>total deposit</p>
                                <p>₦0</p>
                            </div>
                        </div>
                    </div>
                    <div class="summary-remite-in">
                        <div class="summary-in">
                            <div class="left-summary">
                                <p class="lead-summary">Projected Payment(s)</p>
                                <p class="value-summary">
                                    ₦0
                                </p>
                                <p class="base-summary">Total from 345 entries</p>
                            </div>
                            <div class="arrow-summary">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.0702 14.4297L12.0002 20.4997L5.93018 14.4297" stroke="#FF4423"
                                        stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 3.5V20.33" stroke="#FF4423" stroke-width="2" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div class="summary-remite-in">
                        <div class="summary-in">
                            <div class="left-summary">
                                <p class="lead-summary">Paid Users</p>
                                <p class="value-summary">
                                    ₦0
                                </p>
                                <p class="base-summary">Total from 300 entries</p>
                            </div>
                            <div class="arrow-summary">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.0702 14.4297L12.0002 20.4997L5.93018 14.4297" stroke="#FF4423"
                                        stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 3.5V20.33" stroke="#FF4423" stroke-width="2" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div class="summary-remite-in">
                        <div class="summary-in">
                            <div class="left-summary">
                                <p class="lead-summary">Pending Users</p>
                                <p class="value-summary">
                                    ₦345,000,000.00
                                </p>
                                <p class="base-summary">Total from 45 entries</p>
                            </div>
                            <div class="arrow-summary">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.0702 14.4297L12.0002 20.4997L5.93018 14.4297" stroke="#FF4423"
                                        stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 3.5V20.33" stroke="#FF4423" stroke-width="2" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-index-finance">
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <div class="table-finance-section">
                                <div class="table-responsive">

                                    <table id="datatable-buttons" class="table table-bordered nowrap"
                                        style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                        <thead class="text-inter">
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="check" />
                                                </th>
                                                <th>Plate NO.</th>
                                                <th>DRIVER NAME</th>
                                                <th>FLEET</th>
                                                <th>AMOUNT</th>
                                                <th>REFERENCE</th>
                                                <th>DATE</th>
                                                <th>REASON</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="check" />
                                                </td>
                                                <td>
                                                    <span class="link-plate-no">RBC1234</span>
                                                </td>
                                                <td>DEMAJI BANKOLE</td>
                                                <td>BREKETE, NG</td>
                                                <td>₦35,000.00</td>
                                                <td>DX23RM345</td>
                                                <td>23 Feb, 2021</td>
                                                <td>Remittance</td>
                                                <td>SUCCESS</td>
                                            </tr>
                                        </tbody>
                                        <div class="modal-transaction-detail">
                                            <div class="in-transaction">
                                                <div class="top-row-transaction">
                                                    <div class="logo-text">
                                                        <div class="logo-img-text">
                                                            <span class="logo-svg">
                                                                <svg width="40" height="40" viewBox="0 0 43 44"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M0 15.4825L15.4161 0.0664062H3.56734C1.6053 0.0664062 3.51278e-05 1.67168 3.51278e-05 3.63371V15.4824L0 15.4825Z"
                                                                        fill="#FF6600" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M41.0564 2.00976C43.6478 4.60099 43.6476 8.8411 41.0564 11.4325L11.3662 41.1226C8.77494 43.7141 4.53483 43.7141 1.94359 41.1228H1.9434C-0.647833 38.5316 -0.647833 34.2913 1.94359 31.7001L31.6337 2.00983C34.2251 -0.581403 38.4652 -0.581403 41.0565 2.00983L41.0564 2.00976Z"
                                                                        fill="#FF6600" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M43 27.6504L27.584 43.0664H39.4327C41.3947 43.0664 43 41.4612 43 39.4991V27.6504L43 27.6504Z"
                                                                        fill="#FF6600" />
                                                                </svg>
                                                            </span>

                                                            <div class="logo-side-text">
                                                                <span>Zeus Systems</span>
                                                                <span>Transaction Details</span>
                                                            </div>
                                                        </div>

                                                        <span class="close-icon-bx">
                                                            <i class='bx bx-x'></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="details-transaction-modal">
                                                    <div class="detail-in">
                                                        <span>Trans ID:</span>
                                                        <span>-</span>
                                                    </div>
                                                    <div class="detail-in">
                                                        <span>Date:</span>
                                                        <span>-</span>
                                                    </div>
                                                    <div class="detail-in">
                                                        <span>Channel:</span>
                                                        <span>-</span>
                                                    </div>
                                                    <div class="detail-in">
                                                        <span>Amount:</span>
                                                        <span>-</span>
                                                    </div>
                                                    <div class="detail-in">
                                                        <span>Description</span>
                                                        <span>-</span>
                                                    </div>
                                                    <div class="detail-in">
                                                        <span>Platform Commission</span>
                                                        <span>-</span>
                                                    </div>
                                                    <div class="detail-in">
                                                        <span>Status</span>
                                                        <span class="success-box">
                                                            <div class="greenbox mr-1"></div>
                                                            Successful
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <div class="shade-bg-100"></div>
        <!-- end content -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="{{ asset('assets/js/chart.js') }} "></script>
    <script>
        var yValues = [55, 49, 10, 25];
        var barColors = [
            "#ade89e",
            "#7fd967",
            "#F4FF78",
            "#41c65f"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                // labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
        });
    </script>

    <script>
        let contentPage = document.querySelector('.content-page');
        let linkPlateNo = document.querySelector('.link-plate-no');
        let modalTransactionDetail = document.querySelector('.modal-transaction-detail');
        let closeBx = document.querySelector('.close-icon-bx');
        let filterCalender = document.querySelector('.filter-calender');
        let closeFilterSection = document.querySelector('.close-filter-section');
        let filterSec = document.querySelector('.filter-section');
        let shadeBg = document.querySelector('.shade-bg-100');

        filterCalender.addEventListener('click', () => {
            // contentPage.classList.add('bg-shade');
            shadeBg.style.display = "block";
            filterSec.style.display = "block";
        });
        closeFilterSection.addEventListener('click', () => {
            // contentPage.classList.remove("bg-shade");
            shadeBg.classList.add('d-none');    
            filterSec.classList.add('d-none');
        });

        linkPlateNo.addEventListener('click', () => {
            modalTransactionDetail.style.display = "flex";
        })
        closeBx.addEventListener('click', () => {
            modalTransactionDetail.style.display = "none";
        })
    </script>
@endsection
