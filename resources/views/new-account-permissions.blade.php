@extends('main')
@section('content')
    <div class="content-page">
        <div class="content">
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
                                    <li class="maintenanceCostLink">
                                        <a class="sideLink subSideLink" href="control-panel">
                                            <span>Maintenance Cost </span>
                                        </a>
                                    </li>

                                    <li class="accountConfigLink">
                                        <a class="sideLink subSideLink activeSubLink">
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

                        <div class="col-sm-6 col-md-12 col-lg-5 account-section-2 ty-40">
                            <form action="{{ route('UpdateNewAcctPermission') }}" method="POST">
                                @csrf
                                <div class="top-dd">
                                    <p class="title-permissions"> Create New Account Permissions</p>
                                    <p class="lead-permissions">Create new Account Type and assign permissioni</p>
                                    {{-- <div class="form-search mb-3">
                                        <input type="text" placeholder="Search" class="searchInput2">
                                        <button class="searchBtn2">
                                            <i class='bx bx-search'></i>
                                        </button>
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control infoInput" placeholder="Enter Details">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="" class="form-control infoInput" rows="3"></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Configure Permissions</label>
                                </div>

                                <div class="permissions-main">
                                    <p class="overviewTitle" id="fleet">Fleet / Vehicle Management</p>
                                    {{-- <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel
                                    hac convallis vestibulum eget quam vestibulum amet, sed.</span> --}}
                                    {{-- {
                                        "addVehicleFleet": "1",
                                        "assignVehicleDriver": "1",
                                        "addWorkshopFleet": "1",
                                        "EditDeleteWorkshop": "1",
                                        "createUserAccount": "1",
                                        "EditDeleteUserAccount": "1"
                                      } --}}


                                    <div class="permissions-main-sub">
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="addVehicle" type="checkbox"
                                                value="@if ($fleet->addVehicleFleet == 1) on @endif" id=""
                                                @if ($fleet->addVehicleFleet == 1) checked @endif>
                                            <label class="form-check-label" for="">
                                                Add Vehicle to Fleet
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="assignVehicleDriver"
                                                type="checkbox" value="@if ($fleet->assignVehicleDriver == 1) on @endif"
                                                id="flexCheckChecked" @if ($fleet->assignVehicleDriver == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Assign Vehicle to Driver
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="addWorkshop" type="checkbox"
                                                value=" @if ($fleet->addWorkshopFleet == 1) on @endif" id=""
                                                @if ($fleet->addWorkshopFleet == 1) checked @endif>
                                            <label class="form-check-label" for="">
                                                Add Workshop to Fleet
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="editDeleteWorkshop"
                                                type="checkbox" value="@if ($fleet->EditDeleteWorkshop == 1) on @endif"
                                                id="flexCheckChecked" @if ($fleet->EditDeleteWorkshop == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Edit / Delete Workshop
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="assignVehicleWorkshop"
                                                type="checkbox" value="@if ($fleet->assignVehicleWorkshop == 1) on @endif"
                                                id="" @if ($fleet->assignVehicleWorkshop == 1) checked @endif>
                                            <label class="form-check-label" for="">
                                                Assign Vehicle to Workshop
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="createUser" type="checkbox"
                                                @if ($fleet->createUserAccount == 1) checked @endif
                                                value="@if ($fleet->createUserAccount == 1) on @endif" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Create User Account
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="editDeleteUser" type="checkbox"
                                                value=" @if ($fleet->EditDeleteUserAccount == 1) on @endif" id=""
                                                @if ($fleet->EditDeleteUserAccount == 1) checked @endif>
                                            <label class="form-check-label" for="">
                                                Edit / Delete User Account
                                            </label>
                                        </div>
                                    </div>


                                    {{-- payments and commission --}}
                                    <p class="overviewTitle" id="payment">Payments & Commission</p>
                                    {{-- <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel
                                    hac
                                    convallis vestibulum eget quam vestibulum amet, sed.</span> --}}
                                    <div class="permissions-main-sub">

                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="enableShareCommission"
                                                type="checkbox" data-toggle="collapse" data-target="#share"
                                                aria-expanded="true" aria-controls="share"
                                                @if ($payment->shareCommission->percentage != null) checked @endif>
                                            <label class="form-check-label" for="">
                                                Share Commision
                                            </label>
                                        </div>
                                        <div class="collapse @if ($payment->shareCommission->percentage != null) show @endif "
                                            id="share">
                                            {{-- @foreach ($payment->shareCommission as $item) --}}
                                            <div class="value-number mb-2">
                                                <span class="valueText">Value or Percentage</span>
                                                <input type="number" value="{{ $payment->shareCommission->percentage }}"
                                                    name="shareCommissionValue" class="value2">
                                            </div>
                                            {{-- @endforeach --}}
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input checkInput" name="enableActivateRemittance"
                                                type="checkbox" value="@if ($payment->remittanceDeposite != null) on @endif"
                                                id="" data-toggle="collapse" data-target="#activateRemittance"
                                                aria-expanded="false" aria-controls="activateRemittance"
                                                @if ($payment->remittanceDeposite != null) checked @endif>
                                            <label class="form-check-label" for="">
                                                Remittance Deposit Configuration
                                            </label>
                                        </div>
                                        <div class="collapse  @if ($payment->remittanceDeposite != null) show @endif"
                                            id="activateRemittance">
                                            <div class="value-number mb-2">
                                                <span class="valueText">General Remittance</span>
                                                <input type="number" name="generalRemittance"
                                                    value="{{ $payment->remittanceDeposite->generalRemittance }}"
                                                    class="value2">
                                            </div>
                                            <div class="value-number mb-2">
                                                <span class="valueText">Maintenance Contribution</span>
                                                <input type="number" value="2" name="maintenaceContribution"
                                                    value="{{ $payment->remittanceDeposite->maintenanceContribution }}"
                                                    class="value2">
                                            </div>
                                            <div class="value-number mb-2">
                                                <span class="valueText">Account Commission</span>
                                                <input type="number" value="15" name="accountCommission"
                                                    value="{{ $payment->remittanceDeposite->AccountCommission }}"
                                                    class="value2">
                                            </div>
                                            <div class="value-number mb-2">
                                                <span class="valueText">Union Due / Fees</span>
                                                <input type="number" value="15" name="unionfee"
                                                    value="
                                                {{ $payment->remittanceDeposite->unionFee }}"
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
                                                value="@if ($payment->enableSoftPurse != null) on @endif"
                                                data-toggle="collapse" data-target="#soft" name="enableSoftpurse"
                                                aria-expanded="false" aria-controls="soft" id=""
                                                @if ($payment->enableSoftPurse != null) checked @endif>
                                            <label class="form-check-label" for="">
                                                Enable SoftPurse Contribution
                                            </label>
                                        </div>
                                        <div class="collapse @if ($payment->enableSoftPurse != null) show @endif"
                                            id="soft">

                                            <div class="value-number mb-2">
                                                <span class="valueText">Softpurse Count/measure</span>
                                                <input type="number" value="{{ $payment->enableSoftPurse->purseCount }}"
                                                    name="softpurseCount" class="value2">
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="enableUserAddEditAgentCommission"
                                                value=" @if ($payment->allowUserAccountAddEditAgentCommsion != null) on @endif"
                                                data-toggle="collapse" data-target="#agent" aria-expanded="false"
                                                aria-controls="agent" @if ($payment->allowUserAccountAddEditAgentCommsion != null) checked @endif
                                                id="">
                                            <label class="form-check-label" for="">
                                                Allow User Account Add/Edit Agent Commssion
                                            </label>
                                        </div>
                                        <div class="collapse @if ($payment->allowUserAccountAddEditAgentCommsion != null) show @endif"
                                            id="agent">
                                            <div class="value-number mb-2">
                                                <span class="valueText">Agent Commission</span>
                                                <input type="number"
                                                    value="{{ $payment->allowUserAccountAddEditAgentCommsion->agentCommission }}"
                                                    name="userAddEditAgentCommission" class="value2">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- finance and wallet --}}
                                    {{-- {
                                    "makeWalletTop": 1,
                                    "requestWalletWithdrawal": 1
                                  } --}}
                                    <p class="overviewTitle" id="finance">Finance & Wallet</p>
                                    {{-- <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel --}}
                                    {{-- hac convallis vestibulum eget quam vestibulum amet, sed.</span> --}}
                                    <div class="permissions-main-sub">
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="makeWalletTop" id="flexCheckDefault"
                                                @if ($finance->makeWalletTop == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Make Wallet Top
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                value="@if ($finance->requestWalletWithdrawal == 1) on @endif"
                                                name="requestWalletWithdrawal" id="flexCheckChecked"
                                                @if ($finance->requestWalletWithdrawal == 1) checked @endif>
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
                                    {{-- {
                                    "allowUserDownload": 1,
                                    "allowUserWithdrawal": 1
                                  } --}}
                                    <p class="overviewTitle" id="reporting">Reporting & Activity Log</p>
                                    {{-- <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel
                                    hac convallis vestibulum eget quam vestibulum amet, sed.</span> --}}

                                    {{-- {{dd($reporting->allowUserDownload );}} --}}
                                    <div class="permissions-main-sub">
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="allowUserDownload"
                                                value=" @if ($reporting->allowUserDownload == 1) on @endif"
                                                id="flexCheckDefault" @if ($reporting->allowUserDownload == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Allow User Account Download Report(s)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkInput" type="checkbox"
                                                name="allowUserWithdrawal"
                                                value="@if ($reporting->allowUserWithdrawal == 1) on @endif"
                                                @if ($reporting->allowUserWithdrawal == 1) checked @endif id="flexCheckChecked">
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
                        <!-- Modal -->
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


                        <div class="col-sm-6 col-md-5 col-lg-3 account-section-3 ty-40">
                            <div class="top-btn">
                                <button type="button" class="saveUpdateBtn" data-bs-toggle="modal"
                                    data-bs-target="#update">CREATE NEW</button>
                                {{-- <button class="resetBtn">RESET</button> --}}
                            </div>
                            </form>

                            <p class="overviewTitle">Permissions Overview</p>
                            @foreach ($permission as $item)
                                <div class="permit mb-2 p-2">
                                    <div class="equal">
                                        <svg width="12" height="7" viewBox="0 0 14 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.00039 0.898438C0.530949 0.898438 0.150391 1.279 0.150391 1.74844C0.150391 2.21788 0.530949 2.59844 1.00039 2.59844H7.00039H13.0004C13.4698 2.59844 13.8504 2.21788 13.8504 1.74844C13.8504 1.279 13.4698 0.898438 13.0004 0.898438H7.00039H1.00039ZM1.00039 6.89844C0.530949 6.89844 0.150391 7.279 0.150391 7.74844C0.150391 8.21788 0.530949 8.59844 1.00039 8.59844H7.00039H13.0004C13.4698 8.59844 13.8504 8.21788 13.8504 7.74844C13.8504 7.279 13.4698 6.89844 13.0004 6.89844H7.00039H1.00039Z"
                                                fill="#6B7280" />
                                        </svg>
                                    </div>
                                    <div class="mid-permit">
                                        <span>{{ $item->name }}</span>
                                        <span></span>
                                        {{-- <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit magni
                                        reprehenderit ipsam, animi et fuga?
                                    </span> --}}
                                    </div>
                                    <div class="equal">
                                        <svg width="14" height="16" viewBox="0 0 20 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.75 7C3.75 6.58579 3.41421 6.25 3 6.25C2.58579 6.25 2.25 6.58579 2.25 7H3.75ZM17.75 7C17.75 6.58579 17.4142 6.25 17 6.25C16.5858 6.25 16.25 6.58579 16.25 7H17.75ZM12.75 10C12.75 9.58579 12.4142 9.25 12 9.25C11.5858 9.25 11.25 9.58579 11.25 10H12.75ZM11.25 16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16H11.25ZM8.75 10C8.75 9.58579 8.41421 9.25 8 9.25C7.58579 9.25 7.25 9.58579 7.25 10H8.75ZM7.25 16C7.25 16.4142 7.58579 16.75 8 16.75C8.41421 16.75 8.75 16.4142 8.75 16H7.25ZM19 4.75C19.4142 4.75 19.75 4.41421 19.75 4C19.75 3.58579 19.4142 3.25 19 3.25V4.75ZM1 3.25C0.585786 3.25 0.25 3.58579 0.25 4C0.25 4.41421 0.585786 4.75 1 4.75V3.25ZM12.5937 1.8906L11.9697 2.30662L12.5937 1.8906ZM7.40627 1.8906L6.78223 1.47457L7.40627 1.8906ZM7 21.75H13V20.25H7V21.75ZM2.25 7V17H3.75V7H2.25ZM17.75 17V7H16.25V17H17.75ZM13 21.75C15.6234 21.75 17.75 19.6234 17.75 17H16.25C16.25 18.7949 14.7949 20.25 13 20.25V21.75ZM7 20.25C5.20507 20.25 3.75 18.7949 3.75 17H2.25C2.25 19.6234 4.37665 21.75 7 21.75V20.25ZM11.25 10V16H12.75V10H11.25ZM7.25 10L7.25 16H8.75L8.75 10H7.25ZM9.07037 1.75H10.9296V0.25H9.07037V1.75ZM11.9697 2.30662L13.376 4.41603L14.624 3.58397L13.2178 1.47457L11.9697 2.30662ZM14 3.25H6V4.75H14V3.25ZM6.62404 4.41603L8.0303 2.30662L6.78223 1.47457L5.37596 3.58397L6.62404 4.41603ZM14 4.75H19V3.25H14V4.75ZM6 3.25H1V4.75H6V3.25ZM10.9296 1.75C11.3476 1.75 11.7379 1.95888 11.9697 2.30662L13.2178 1.47457C12.7077 0.709528 11.8491 0.25 10.9296 0.25V1.75ZM9.07037 0.25C8.1509 0.25 7.29226 0.709528 6.78223 1.47457L8.0303 2.30662C8.26214 1.95888 8.65243 1.75 9.07037 1.75V0.25Z"
                                                fill="#28303F" />
                                        </svg>

                                    </div>
                                </div>
                            @endforeach
                            {{-- <button class="addNewPermission" data-bs-toggle="modal"
                                data-bs-target="#addNewPermission">Add
                                New</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            @include('components.account-permission.modal')
        </div>
        <!-- end content -->
    </div>

    <script>
        let modalAddNewHeading = document.querySelector('.modalAddNewHeading');
        let modalPermControlHeading = document.querySelector('.modalPermControlHeading');
        let addNewSec = document.querySelector('.addNewSec');
        let permControlSec = document.querySelector('.permControlSec');
        let openPermSecBtn = document.querySelector('.openPermSecBtn');
        let list1 = document.querySelector('.list-1');


        openPermSecBtn.addEventListener('click', () => {
            modalAddNewHeading.classList.add('d-none');
            modalPermControlHeading.classList.add('d-flex');
            addNewSec.style.display = 'none';
            permControlSec.style.display = 'block';
        })
    </script>
@endsection
