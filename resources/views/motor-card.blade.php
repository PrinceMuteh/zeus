@extends('main')
@section('content')
    <div class="content-page" style="background: #fff;">
        <div class="content">
            <style>
                th {
                    font-size: 8px !important;
                }
            </style>
            <!-- Start Content-->
            <div class="container-fluid m15">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle mb-1 text-inter pb-0 pl-0">
                            Vehicle Management
                        </p>
                    </div>
                    {{-- <a href="/add-vehicle" class="addBtn addNew">ADD NEW</a> --}}
                </div>
                <ul class="sub-tabs">
                    <li class="vehicle-list-overview">OVERVIEW</li>
                    <li class="vehicle-list-fleet">FLEET STATUS</li>
                    {{-- <li class="vehicle-list-fleet">
                        <a href="technical-desk">TECHNICAL</a>
                    </li> --}}
                    <li class="vehicle-list-track"> <a href="track-web">TRACK WEB</a> </li>
                    <li class="vehicle-list-fleet bbd">
                        <a href="motor-card">MOTOR CARD</a>
                    </li>
                </ul>

                <div class="row">
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
                                        <th>PLATE NO.</th>
                                        <th>TYPE</th>
                                        <th>FLEET OPS</th>
                                        <th>TOTAL LOAN DISBURSED</th>
                                        <th>TOTAL PAID</th>
                                        <th>Outstanding</th>
                                        <th>Payment Cycles</th>
                                        <th>ADDRESS</th>
                                        <th>STATUS</th>
                                        <th>Payment Status</th>
                                        <th>Vehicle UPDATE</th>
                                        <th>Date</th>
                                        {{-- <th>PACKAGE</th>
                                        <th>ADDRESS</th> --}}
                                        <th>
                                            <i class='bx bx-dots-vertical-rounded'></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  {{--  <tr>
                                        <td>
                                            <input type="checkbox" class="form-check">
                                        </td>
                                        <td>
                                            <a href="/motor-card-user">-</a>
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
                                    </tr> --}}

                                    @include('components.loanCredit')

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        @endsection
