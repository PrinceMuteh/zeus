@extends('main')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-10">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle text-inter pb-0 pl-0">Task Management</p>
                    </div>
                </div>
                <div class="row g-2 mt-4">
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="boxInfo bg-blk text-light">
                            <div class="topInfo">
                                <div class="vectorBox2">
                                    <img src="{{ asset('assets/images/white-vector.svg') }}" alt="" />
                                </div>
                                <div class="dropstart m-0 p-0">
                                    <i class="bx bx-dots-vertical-rounded" data-bs-toggle="dropdown"
                                        aria-expanded="false"></i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Default/Live</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">Last 90 days</a></li>
                                        <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bottomInfo">
                                <div class="leftBottom">
                                    <span class="lft1 text-light">ACCOUNT BALANCE</span><br />
                                    <span class="lft2 text-inter text-light">0</span>
                                </div>
                                <span class="rightBottom bg-light-dark text-light font-weight-bold">
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
                                    <img src="{{ asset('assets/images/deep-vector.svg') }}" alt="" />
                                </div>
                                <div class="dropstart m-0 p-0">
                                    <i class="bx bx-dots-vertical-rounded" data-bs-toggle="dropdown"
                                        aria-expanded="false"></i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Default/Live</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">Last 90 days</a></li>
                                        <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bottomInfo">
                                <div class="leftBottom">
                                    <span class="lft1">TOTAL TICKET</span><br />
                                    <span class="lft2 text-inter">0</span>
                                </div>
                                <span class="rightBottom bg-light-green green-text font-weight-bold">
                                    <i class="bx bx-up-arrow-alt"></i>
                                    <span>22.5%</span> <span>APRIL</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2">
                        <div class="boxInfo">
                            <div class="topInfo">
                                <div class="vectorBox">
                                    <img src="{{ asset('assets/images/deep-vector.svg') }}" alt="" />
                                </div>
                            </div>
                            <div class="bottomInfo">
                                <div class="leftBottom">
                                    <span class="lft1">PENDING TICKET</span><br />
                                    <span class="lft2 text-inter">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2">
                        <div class="boxInfo">
                            <div class="topInfo">
                                <div class="vectorBox">
                                    <img src="{{ asset('assets/images/deep-vector.svg') }}" alt="" />
                                </div>
                            </div>
                            <div class="bottomInfo">
                                <div class="leftBottom">
                                    <span class="lft1">CLOSED TICKET</span><br />
                                    <span class="lft2 text-inter">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-bordered nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="text-inter">
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="check" />
                                        </th>
                                        <th>PLATE NO.</th>
                                        <th>TYPE</th>
                                        <th>MAKE</th>
                                        <th>MODEL</th>
                                        <th>YEAR</th>
                                        <th>STATUS</th>
                                        <th>CREATED</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="check" />
                                        </td>
                                        <td>DATA</td>
                                        <td>DATA</td>
                                        <td>DATA</td>
                                        <td>DATA</td>
                                        <td>DATA</td>
                                        <td>DATA</td>
                                        <td>DATA</td>
                                    </tr>
                                    
                                    --}}
                                   
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
