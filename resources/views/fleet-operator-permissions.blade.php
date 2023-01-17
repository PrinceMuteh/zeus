@extends('main')
@section('content')
    <div class="content-page">
        <div class="content" style="">
            <!-- Start Content-->
            <div class="container-fluid mt-10">
                <div class="paymentRecieved">
                    <div class="top-row">
                        <div>
                            <a href="{{ route('control-panel') }}">
                                <p class="sectionTitle text-inter pl-3 pb-0 pl-0">
                                    <img src="{{ asset('assets/images/arrow-left.svg') }}" class="mr-1" alt="">
                                    Control Panel
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div id="sidebar-menu">
                                <ul class="metismenu" id="side-menu">
                                    <li>
                                        <a href="{{ route('control-panel') }}"
                                            class="sideLink subSideLink maintenanceCostLink ">
                                            <span>Maintenance Cost </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="sideLink subSideLink accountConfigLink activeSubLink">
                                            <span>Account Configuration</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="sideLink subSideLink" href="/">
                                            <span>System Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class=" subSideLink" href="/">
                                            <span>Other Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sideLink subSideLink" href="/">
                                            <span>Notification</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 account-section-2 ty-40">

                            <div class="top-dd">
                                <p class="title-permissions">{{ $user->user_type }}(s) Permissions</p>
                                {{-- <p class="lead-permissions">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                    Explicabo optio voluptate vero similique quibusdam id molestias facilis</p> --}}
                                <div class="form-search mb-3">
                                    <input type="text" placeholder="Search" class="searchInput2">
                                    <button class="searchBtn2">
                                        <i class='bx bx-search'></i>
                                    </button>
                                </div>
                            </div>

                            <form action="{{ route('UpdateOperatorsPermissionss') }}" method="post">
                                @csrf
                                <input type="hidden" name='usertypeId' value="{{ $user->user_type_id }}">
                                <div class="permissions-main">
                                    <p class="overviewTitle" id="fleet">Fleet / Vehicle Management</p>
                                    {{-- <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Vel hacconvallis vestibulum eget quam vestibulum amet, sed.</span> --}}

                                    <div class="permissions-main-sub">
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="addVehicle" type="checkbox">
                                            <label class="form-check-label" for="">
                                                Add Vehicle to Fleet
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="assignVehicleDriver"
                                                type="checkbox" id="flexCheckChecked"
                                                @if ($fleet_management->assignVehicleDriver == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Assign Vehicle to Driver
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="addWorkshop" type="checkbox"
                                                id="" @if ($fleet_management->addWorkshopFleet == 1) checked @endif>
                                            <label class="form-check-label" for="">
                                                Add Workshop to Fleet
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="editDeleteWorkshop"
                                                type="checkbox" id="flexCheckChecked"
                                                @if ($fleet_management->EditDeleteWorkshop == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Edit / Delete Workshop
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="assignVehicleWorkshop"
                                                type="checkbox" id=""
                                                @if ($fleet_management->assignVehicleWorkshop == 1) checked @endif>
                                            <label class="form-check-label" for="">
                                                Assign Vehicle to Workshop
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="createUser" type="checkbox"
                                                @if ($fleet_management->createUserAccount == 1) checked @endif id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Create User Account
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="editDeleteUser" type="checkbox"
                                                id="" @if ($fleet_management->EditDeleteUserAccount == 1) checked @endif>
                                            <label class="form-check-label" for="">
                                                Edit / Delete User Account
                                            </label>
                                        </div>
                                    </div>

                                    {{-- payments and commission --}}
                                    <p class="overviewTitle" id="payment">Payments & Commission</p>
                                    {{-- <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Vel hac convallis vestibulum eget quam vestibulum amet, sed.</span> --}}
                                    <div class="permissions-main-sub">

                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="enableShareCommission"
                                                type="checkbox" data-toggle="collapse" data-target="#share"
                                                aria-expanded="true" aria-controls="share"
                                                @if ($payment_commision->shareCommission->percentage != null) checked @endif>
                                            <label class="form-check-label" for="">
                                                Share Commision
                                            </label>
                                        </div>
                                        <div class="collapse @if ($payment_commision->shareCommission->percentage != null) show @endif " id="share">
                                            {{-- @foreach ($payment_commision->shareCommission as $item) --}}
                                            <div class="value-number mb-2">
                                                <span class="valueText">Value or Percentage</span>
                                                <input type="number"
                                                    value="{{ $payment_commision->shareCommission->percentage }}"
                                                    name="shareCommissionValue" class="value2">
                                            </div>
                                            {{-- @endforeach --}}
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="enableActivateRemittance"
                                                type="checkbox" value="@if ($payment_commision->remittanceDeposite != null) on @endif"
                                                id="" data-toggle="collapse" data-target="#activateRemittance"
                                                aria-expanded="false" aria-controls="activateRemittance"
                                                @if ($payment_commision->remittanceDeposite != null) checked @endif>
                                            <label class="form-check-label" for="">
                                                Remittance Deposit Configuration
                                            </label>
                                        </div>
                                        <div class="collapse  @if ($payment_commision->remittanceDeposite != null) show @endif"
                                            id="activateRemittance">
                                            <div class="value-number mb-2">
                                                <span class="valueText">General Remittance</span>
                                                <input type="number" name="generalRemittance"
                                                    value="{{ $payment_commision->remittanceDeposite->generalRemittance }}"
                                                    class="value2">
                                            </div>
                                            <div class="value-number mb-2">
                                                <span class="valueText">Maintenance Contribution</span>
                                                <input type="number" value="2" name="maintenaceContribution"
                                                    value="{{ $payment_commision->remittanceDeposite->maintenanceContribution }}"
                                                    class="value2">
                                            </div>
                                            <div class="value-number mb-2">
                                                <span class="valueText">Account Commission</span>
                                                <input type="number" value="15" name="accountCommission"
                                                    value="{{ $payment_commision->remittanceDeposite->AccountCommission }}"
                                                    class="value2">
                                            </div>
                                            <div class="value-number mb-2">
                                                <span class="valueText">Union Due / Fees</span>
                                                <input type="number" value="15" name="unionfee"
                                                    value="
                                                    {{ $payment_commision->remittanceDeposite->unionFee }}"
                                                    class="value2">
                                            </div>
                                        </div>
                                        {{-- {
                                                "shareCommission": {"percentage": 15},
                                                "remittanceDeposite": {
                                                  "generalRemittance" : 75,
                                                  "maintenanceContribution" : 2,
                                                  "AccountCommission" : 15,
                                                  "unionFee" : 3
                                                },
                                                "enableSoftPurse": {
                                                  "purseCount" : 1
                                                },
                                                "allowUserAccountAddEditAgentCommsion": {
                                                  "agentCommission": 4
                                                }
    
                                              } --}}



                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                value="@if ($payment_commision->enableSoftPurse != null) on @endif"
                                                data-toggle="collapse" data-target="#soft" name="enableSoftpurse"
                                                aria-expanded="false" aria-controls="soft" id=""
                                                @if ($payment_commision->enableSoftPurse != null) checked @endif>
                                            <label class="form-check-label" for="">
                                                Enable SoftPurse Contribution
                                            </label>
                                        </div>
                                        <div class="collapse @if ($payment_commision->enableSoftPurse != null) show @endif"
                                            id="soft">

                                            <div class="value-number mb-2">
                                                <span class="valueText">Softpurse Count/measure</span>
                                                <input type="number"
                                                    value="{{ $payment_commision->enableSoftPurse->purseCount }}"
                                                    name="softpurseCount" class="value2">
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="enableUserAddEditAgentCommission"
                                                value=" @if ($payment_commision->allowUserAccountAddEditAgentCommsion != null) on @endif"
                                                data-toggle="collapse" data-target="#agent" aria-expanded="false"
                                                aria-controls="agent" @if ($payment_commision->allowUserAccountAddEditAgentCommsion != null) checked @endif
                                                id="">
                                            <label class="form-check-label" for="">
                                                Allow User Account Add/Edit Agent Commssion
                                            </label>
                                        </div>
                                        <div class="collapse @if ($payment_commision->allowUserAccountAddEditAgentCommsion != null) show @endif"
                                            id="agent">
                                            <div class="value-number mb-2">
                                                <span class="valueText">Agent Commission</span>
                                                <input type="number"
                                                    value="{{ $payment_commision->allowUserAccountAddEditAgentCommsion->agentCommission }}"
                                                    name="userAddEditAgentCommission" class="value2">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- finance and wallet --}}
                                    <p class="overviewTitle" id="finance">Finance & Wallet</p>
                                    {{-- <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Vel hac convallis vestibulum eget quam vestibulum amet, sed.</span> --}}
                                    <div class="permissions-main-sub">
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="makeWalletTop" id="flexCheckDefault"
                                                @if ($finance_wallet->makeWalletTop == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Make Wallet Top
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="requestWalletWithdrawal" id="flexCheckChecked"
                                                @if ($finance_wallet->requestWalletWithdrawal == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Request wallet withdrawal
                                            </label>
                                        </div>
                                        {{-- <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Another wallet related activity
                                            </label>
                                        </div> --}}
                                    </div>

                                    {{-- reporting and activity log --}}
                                    <p class="overviewTitle" id="reporting">Reporting & Activity Log</p>
                                    {{-- <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Vel hacconvallis vestibulum eget quam vestibulum amet, sed.</span> --}}

                                    <div class="permissions-main-sub">
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="allowUserDownload" id="flexCheckDefault"
                                                @if ($report_activity->allowUserDownload == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Allow User Account Download Report(s)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="allowUserWithdrawal"
                                                @if ($report_activity->allowUserWithdrawal == 1) checked @endif id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Request wallet withdrawal
                                            </label>
                                        </div>
                                        {{-- <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Another wallet related activity
                                            </label>
                                        </div> --}}
                                    </div>
                                </div>


                        </div>
                        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Authorization Access</label>
                                            <input type="text" name="password" class="form-control authorizationInput"
                                                placeholder="* * * * *" required>

                                            <svg width="15" height="19" class="iconLock" viewBox="0 0 18 22"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.25 15C8.25 15.4142 8.58579 15.75 9 15.75C9.41421 15.75 9.75 15.4142 9.75 15H8.25ZM9.75 13C9.75 12.5858 9.41421 12.25 9 12.25C8.58579 12.25 8.25 12.5858 8.25 13H9.75ZM5 7.75H13V6.25H5V7.75ZM16.25 11V17H17.75V11H16.25ZM13 20.25H5V21.75H13V20.25ZM1.75 17V11H0.25V17H1.75ZM5 20.25C3.20508 20.25 1.75 18.7949 1.75 17H0.25C0.25 19.6234 2.37665 21.75 5 21.75V20.25ZM16.25 17C16.25 18.7949 14.7949 20.25 13 20.25V21.75C15.6234 21.75 17.75 19.6234 17.75 17H16.25ZM13 7.75C14.7949 7.75 16.25 9.20507 16.25 11H17.75C17.75 8.37665 15.6234 6.25 13 6.25V7.75ZM5 6.25C2.37665 6.25 0.25 8.37665 0.25 11H1.75C1.75 9.20507 3.20507 7.75 5 7.75V6.25ZM5.75 7V5H4.25V7H5.75ZM12.25 5V7H13.75V5H12.25ZM9 1.75C10.7949 1.75 12.25 3.20507 12.25 5H13.75C13.75 2.37665 11.6234 0.25 9 0.25V1.75ZM5.75 5C5.75 3.20507 7.20507 1.75 9 1.75V0.25C6.37665 0.25 4.25 2.37665 4.25 5H5.75ZM9.75 15V13H8.25V15H9.75Z"
                                                    fill="#888888" />
                                            </svg>

                                        </div>
                                        <button type="submit" class="btn addBtn sizeBtn" style="width: 100%">
                                            {{-- <button type="submit" class="btn addBtn sizeBtn" data-bs-dismiss="modal"
                                                data-bs-toggle="modal" data-bs-target="#success"> --}}
                                            <svg width="15" height="19" class="mr-2" viewBox="0 0 18 22"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.25 15C8.25 15.4142 8.58579 15.75 9 15.75C9.41421 15.75 9.75 15.4142 9.75 15H8.25ZM9.75 13C9.75 12.5858 9.41421 12.25 9 12.25C8.58579 12.25 8.25 12.5858 8.25 13H9.75ZM5 7.75H13V6.25H5V7.75ZM16.25 11V17H17.75V11H16.25ZM13 20.25H5V21.75H13V20.25ZM1.75 17V11H0.25V17H1.75ZM5 20.25C3.20508 20.25 1.75 18.7949 1.75 17H0.25C0.25 19.6234 2.37665 21.75 5 21.75V20.25ZM16.25 17C16.25 18.7949 14.7949 20.25 13 20.25V21.75C15.6234 21.75 17.75 19.6234 17.75 17H16.25ZM13 7.75C14.7949 7.75 16.25 9.20507 16.25 11H17.75C17.75 8.37665 15.6234 6.25 13 6.25V7.75ZM5 6.25C2.37665 6.25 0.25 8.37665 0.25 11H1.75C1.75 9.20507 3.20507 7.75 5 7.75V6.25ZM5.75 7V5H4.25V7H5.75ZM12.25 5V7H13.75V5H12.25ZM9 1.75C10.7949 1.75 12.25 3.20507 12.25 5H13.75C13.75 2.37665 11.6234 0.25 9 0.25V1.75ZM5.75 5C5.75 3.20507 7.20507 1.75 9 1.75V0.25C6.37665 0.25 4.25 2.37665 4.25 5H5.75ZM9.75 15V13H8.25V15H9.75Z"
                                                    fill="white" />
                                            </svg>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-6 col-md-5 account-section-3 mt-4 pt-3 ty-40">
                            @include('components.message')
{{-- 
                            <div class="row">
                                <h4>Meun Allocations</h4>
                            </div>
                            <div class="permissions-main-sub">
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="dashboard" type="checkbox" for="" @if ($menu->dashboard == 1) checked @endif>
                                    <label class="form-check-label"  >
                                        Dashboard
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="userManagement" type="checkbox"
                                        id="flexCheckChecked"   @if ($menu->userManagement == 1) checked @endif >
                                    <label class="form-check-label" for="flexCheckChecked">
                                        User Mangement
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="vehicleManagement" type="checkbox"  @if ($menu->vehicleManagement == 1) checked @endif >
                                    <label class="form-check-label" for="">
                                        Vehicle Management
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="financeOffice" type="checkbox"  @if ($menu->financeOffice == 1) checked @endif 
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Finance Office
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="activityLog" type="checkbox"  @if ($menu->activityLog == 1) checked @endif 
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Activity Log
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="taskManagement" type="checkbox"  @if ($menu->taskManagement == 1) checked @endif 
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Task Management
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="reportModule" type="checkbox"  @if ($menu->reportModule == 1) checked @endif 
                                        id="">
                                    <label class="form-check-label" for="">
                                        Report Module
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="adminOffice" type="checkbox"  @if ($menu->adminOffice == 1) checked @endif 
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Admin Office
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkInput" name="controlPanel" type="checkbox"  @if ($menu->controlPanel == 1) checked @endif >
                                    <label class="form-check-label" for="">
                                        Control Panel
                                    </label>
                                </div>
                            </div> --}}

                            <div class="top-btn">
                                <button class="saveUpdateBtn" data-bs-toggle="modal" data-bs-target="#update">SAVE
                                    & UPDATE</button>
                                <button class="resetBtn">RESET</button>
                            </div>

                            <p class="overviewTitle">Overview</p>
                            <ul class="links-permissions">
                                <li>
                                    <a href="#fleet">Fleet / Vehicle Management</a>
                                </li>
                                <li>
                                    <a href="#payment">Payments & Commission</a>
                                </li>
                                <li>
                                    <a href="#finance">Finance & Wallet</a>
                                </li>
                                <li>
                                    <a href="#reporting">Reporting & Activity Log</a>
                                </li>
                                {{-- <li>
                                    <a href="">Other Affairs</a>
                                </li> --}}
                            </ul>
                        </div>

                        </form>

                    </div>
                </div>
            </div>




            {{-- successs modal --}}
            <div class="modal fade" id="success" tabindex="-1" aria-labelledby="success" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 400px">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="success-info">
                                <div class="cover-circle">
                                    <div class="circle-success">
                                        <svg width="32" height="20" viewBox="0 0 51 35" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M47.8215 3L17.9403 31.5228L3 17.2614" stroke="#4A4AFF"
                                                stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>

                                <span class="success-info">Successful</span>
                                <span class="success-desc">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum sunt numquam non
                                    vero, officiis earum dolorum itaque explicabo, soluta debitis illo dolorem saepe rem
                                    vel?
                                </span>
                                <button class="btn addBtn">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection
