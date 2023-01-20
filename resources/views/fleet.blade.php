@extends('main')
@section('content')
    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-2">
                <!-- text-inter -->
                <div class="top-row">
                    <span class="sectionTitle text-inter pb-0 pl-0">
                        ACCOUNT OFFICER
                    </span>
                </div>

                <ul class="sub-tabs">
                    <li>DASHBOARD</li>
                    <li>
                        <a href="finance-report">FINANCE REPORT</a>
                    </li>
                    <li class="bbd">
                        <a href="fleet">
                            FLEET
                        </a>
                    </li>
                    <li>DISCUSSIONS</li>
                    <li>
                        <a href="officers">OFFICERS</a>
                    </li>
                    <li>
                        <a href="host">HOSTS</a>
                    </li>
                </ul>


                <div class="container-fluid">
                    <div class="row technical-inner">
                        <div class="col-sm-6 col-md-12 col-lg-2 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span> ALL VEHICLE(S)</span>
                                    <span class="arrow_box-100">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.082 5.9312L18.2849 11.1341L13.082 16.3369" stroke="#08102E"
                                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M3.71289 11.1338L18.1386 11.1338" stroke="#08102E" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    0
                                </span>
                                <span class="total_info grey_text">
                                    UPDATED:23 AUG, 2022
                                </span>
                                <div class="line-right-200"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-2 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span>NEW VEHICLE(S)</span>
                                    <span class="arrow_box-100">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.082 5.9312L18.2849 11.1341L13.082 16.3369" stroke="#08102E"
                                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M3.71289 11.1338L18.1386 11.1338" stroke="#08102E" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    0
                                </span>
                                <span class="total_info grey_text">
                                    UPDATED:23 AUG, 2022
                                </span>
                                <div class="line-right-200"></div>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-2 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span> ASSIGNED VEHICLE(S)</span>
                                    <span class="arrow_box-100">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.082 5.9312L18.2849 11.1341L13.082 16.3369" stroke="#08102E"
                                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M3.71289 11.1338L18.1386 11.1338" stroke="#08102E" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    0
                                </span>
                                <span class="total_info grey_text">
                                    LAST UPDATED:23 AUG, 2022
                                </span>
                                <div class="line-right-200"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-2 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span> PENDING VEHICLE(S)</span>
                                    <span class="arrow_box-100">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.082 5.9312L18.2849 11.1341L13.082 16.3369" stroke="#08102E"
                                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M3.71289 11.1338L18.1386 11.1338" stroke="#08102E" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    0
                                </span>
                                <span class="total_info grey_text">
                                    LAST UPDATED:23 AUG, 2022
                                </span>
                                <div class="line-right-200"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-2 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span> OTHER</span>
                                    <span class="arrow_box-100">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.082 5.9312L18.2849 11.1341L13.082 16.3369" stroke="#08102E"
                                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M3.71289 11.1338L18.1386 11.1338" stroke="#08102E" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    0
                                </span>
                                <span class="total_info grey_text">
                                    LAST UPDATED:23 AUG, 2022
                                </span>
                                <div class="line-right-200"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-2 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span> RECALL REQUEST</span>
                                    <span class="arrow_box-100">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.082 5.9312L18.2849 11.1341L13.082 16.3369" stroke="#08102E"
                                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M3.71289 11.1338L18.1386 11.1338" stroke="#08102E" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    0
                                </span>
                                <span class="total_info grey_text">
                                    LAST UPDATED:23 AUG, 2022
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-borderless"
                                style="
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 100%;
                        padding-top: 10px;
                      ">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="form-check">
                                        </th>
                                        <th>PLATE NO</th>
                                        <th>TYPE</th>
                                        <th>FLEET OPS</th>
                                        <th>TODAY MILEAGE</th>
                                        <th>STATUS</th>
                                        <th>IGNITION</th>
                                        <th>LAST UPDATE</th>
                                        <th>PACKAGE</th>
                                        <th>ADDRESS</th>
                                        <th>
                                            <i class='bx bx-dots-vertical-rounded'></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check">
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
                                        <td>
                                            <div class="dropdown">
                                                <i class='bx bx-dots-vertical-rounded' data-bs-toggle="dropdown"></i>
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
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check">
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
                                        <td>
                                            <div class="dropdown">
                                                <i class='bx bx-dots-vertical-rounded' data-bs-toggle="dropdown"></i>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection
