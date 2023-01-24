@extends('main')
@section('content')
    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="">
                <!-- text-inter -->
                <div class="row userInfo-row">
                    <div class="col-sm-6 col-md-6">
                        <div class="container-dm">
                            <div class="top-row m-25">
                                <div class="fixed-section">
                                    <p class="sectionTitle text-inter pb-0 pl-0">
                                        Create Administrators
                                    </p>
                                    <p class="subTitle">
                                        This entire process takes less than 1 mins to fillout the
                                        information required to create a new user account.
                                    </p>
                                </div>
                            </div>
                            @include('components.message')
                            <form action="{{ route('addAdmin') }}" method="post">
                                @csrf
                                <div class="form-area">
                                    <div class="form-group">
                                        <label for="">User Account Type <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <select class="form-select users" name="usertype">
                                            @foreach ($usertype as $item)
                                                <option value="{{ $item->user_type_id }}">{{ $item->user_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <small style="font-size: 9px; font-weight:bold">These account types are present to
                                        support each user type (e.g Host, Agent, Fleet Operator, Workshops etc).</small>

                                    <div class="form-group">
                                        <label for="">First Name <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="fname" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="lname" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone Number<span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="number" name="phone" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="email" name="email" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Location</label>
                                        <input type="text" name="location" class="form-control" required />
                                    </div>

                                    <button type="submit" class="addBtn largeBtn mt-2" data-bs-target="#success">
                                        <i class="bx bx-shopping-bag"></i>
                                        <span class="ml-1">SAVE AND CREATE</span>
                                    </button>

                                    {{-- successs modal --}}
                                    <div class="modal fade" id="success" tabindex="-1" aria-labelledby="success"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="width: 400px">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="success-info">
                                                        <div class="cover-circle">
                                                            <div class="circle-success">
                                                                <svg width="32" height="20" viewBox="0 0 51 35"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M47.8215 3L17.9403 31.5228L3 17.2614"
                                                                        stroke="#4A4AFF" stroke-width="6"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <span class="success-info"
                                                            style="font-size: 15px; margin:15px 0; padding:0;">OPERATION
                                                            SUCCESSFUL</span>
                                                        <a href="user-management" class="btn addBtn">CLOSE</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="col-sm-3 mt-5 pt-5 col-md-2">

                        @php
                            $menu = json_decode(auth()->user()->menu_permission);
                        @endphp
                        <div class="row">
                            <h4>Meun Allocations</h4>
                        </div>
                        <div class="permissions-main-sub">
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="dashboard" type="checkbox" for=""
                                    @if ($menu->dashboard == 1) checked @endif>
                                <label class="form-check-label">
                                    Dashboard
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="userManagement" type="checkbox"
                                    id="flexCheckChecked" @if ($menu->userManagement == 1) checked @endif>
                                <label class="form-check-label" for="flexCheckChecked">
                                    User Mangement
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="accountOfficer" type="checkbox"
                                    @if ($menu->accountOfficer ?? 0 == 1) checked @endif>
                                <label class="form-check-label" for="">
                                    Account Officer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="technicalDesk" type="checkbox"
                                    @if ($menu->technicalDesk == 1) checked @endif>
                                <label class="form-check-label" for="">
                                    Technicle Desk
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="vehicleManagement" type="checkbox"
                                    @if ($menu->vehicleManagement == 1) checked @endif>
                                <label class="form-check-label" for="">
                                    Vehicle Management
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="financeOffice" type="checkbox"
                                    @if ($menu->financeOffice == 1) checked @endif id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Finance Office
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="activityLog" type="checkbox"
                                    @if ($menu->activityLog == 1) checked @endif id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Activity Log
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="taskManagement" type="checkbox"
                                    @if ($menu->taskManagement == 1) checked @endif id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Task Management
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="taskManagement" type="checkbox"
                                    @if ($menu->workShop == 1) checked @endif id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Work Shop
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="reportModule" type="checkbox"
                                    @if ($menu->reportModule == 1) checked @endif id="">
                                <label class="form-check-label" for="">
                                    Report Module
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="adminOffice" type="checkbox"
                                    @if ($menu->adminOffice == 1) checked @endif id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Admin Office
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input checkInput" name="controlPanel" type="checkbox"
                                    @if ($menu->controlPanel == 1) checked @endif>
                                <label class="form-check-label" for="">
                                    Control Panel
                                </label>
                            </div>
                        </div>

                    </div>
                    </form>


                    <div class="col-sm-6 col-md-4">
                        <div class="side-ribbon">
                            <div class="ribbon-area">
                                <div class="ribbon-one">
                                    <img src="{{ asset('assets/images/zeus.svg') }}" class="zeusLogo" alt="" />
                                </div>
                                <div class="ribbon-two">
                                    <p class="ribbon-text">
                                        A tool designed to help you automate the mobility
                                        experience
                                    </p>
                                    <p class="ribbon-name">- Team Zeus</p>
                                </div>
                                <div class="ribbon-three">
                                    <img src="{{ asset('assets/images/ribbon.png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end container-fluid -->
            </div>
        </div>
        <!-- end content -->
    </div>
@endsection
