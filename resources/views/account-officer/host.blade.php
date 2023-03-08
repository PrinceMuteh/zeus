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

                @include('account-officer.menu')

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
                                        <th>USER ID</th>
                                        <th>TYPE</th>
                                        <th>FULL NAME</th>
                                        <th>PHONE NO.</th>
                                        <th>EMAIL</th>
                                        <th>STATUS</th>
                                        <th>FLEET SIZE</th>
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
