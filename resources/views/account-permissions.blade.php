@extends('main')
@section('content')
    <title>Zeus | User Account Permission</title>
    <div class="content-page">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-10 col-lg-3 account-section-1">
                    <div class="account-profile-info">
                        <a href="{{ URL::previous() }}">
                        <img src="{{ asset('assets/images/arrow-left.svg') }}" class="image-padding" alt="" />
                        </a>
                        <div class="avatar">
                            <img src="{{ asset('assets/images/deen.png') }}" alt="" />
                        </div>
                        <span class="account-profile-name">Sharafadeen Mubarak</span>
                        <span class="account-created">Date created: 12 Sept, 2022</span>
                        <span class="designation">Fleet Operator</span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-10 col-lg-4 account-section-2">
                    <div class="top-dd">
                        <p class="title-permissions">Account Permissions</p>
                        <p class="lead-permissions">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo
                            optio voluptate vero
                            similique quibusdam id molestias facilis</p>

                        <div class="form-search mb-3">
                            <input type="text" placeholder="Search" class="searchInput2">
                            <button class="searchBtn2">
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </div>

                    <div class="permissions-main">
                        <p class="overviewTitle" id="fleet">Fleet / Vehicle Management</p>
                        <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel hac
                            convallis vestibulum eget quam vestibulum amet, sed.</span>

                        <div class="permissions-main-sub">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Add Vehicle to Fleet
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Assign Vehicle to Driver
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Add Workshop to Fleet
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Edit / Delete Workshop
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Assign Vehicle to Workshop
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Create User Account
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Edit / Delete User Account
                                </label>
                            </div>
                        </div>

                        {{-- payments and commission --}}
                        <p class="overviewTitle" id="payment">Payments & Commission</p>
                        <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel hac
                            convallis vestibulum eget quam vestibulum amet, sed.</span>
                        <div class="permissions-main-sub">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Share Commision
                                </label>
                            </div>
                            <div class="value-number mb-2">
                                <span class="valueText">Value or Percentage</span>
                                <input type="number" value="15" class="value2">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Allow User Account Define Remittance Value
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remittance Deposit Configuration
                                </label>
                            </div>
                            <div class="value-number mb-2">
                                <span class="valueText">General Remittance</span>
                                <input type="number" value="75" class="value2">
                            </div>
                            <div class="value-number mb-2">
                                <span class="valueText">Maintenance Contribution</span>
                                <input type="number" value="2" class="value2">
                            </div>
                            <div class="value-number mb-2">
                                <span class="valueText">Account Commission</span>
                                <input type="number" value="15" class="value2">
                            </div>
                            <div class="value-number mb-2">
                                <span class="valueText">Union Due / Fees</span>
                                <input type="number" value="15" class="value2">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Enable SoftPurse Contribution
                                </label>
                            </div>
                            <div class="value-number mb-2">
                                <span class="valueText">Softpurse Count/measure</span>
                                <input type="number" value="1" class="value2">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Allow User Account Add/Edit Agent Commssion
                                </label>
                            </div>
                            <div class="value-number mb-2">
                                <span class="valueText">Agent Commission</span>
                                <input type="number" value="4" class="value2">
                            </div>
                        </div>

                        {{-- finance and wallet --}}
                        <p class="overviewTitle" id="finance">Finance & Wallet</p>
                        <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel hac
                            convallis vestibulum eget quam vestibulum amet, sed.</span>
                        <div class="permissions-main-sub">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Make Wallet Top
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Request wallet withdrawal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Another wallet related activity
                                </label>
                            </div>
                        </div>

                        {{-- reporting and activity log --}}
                        <p class="overviewTitle" id="reporting">Reporting & Activity Log</p>
                        <span class="lead-permissions">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel hac
                            convallis vestibulum eget quam vestibulum amet, sed.</span>

                        <div class="permissions-main-sub">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Allow User Account Download Report(s)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Request wallet withdrawal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Another wallet related activity
                                </label>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="col-sm-6 col-md-10 col-lg-5  account-section-3">
                    <div class="top-btn">
                        <button class="saveUpdateBtn">SAVE & UPDATE</button>
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
                        <li>
                            <a href="">Other Affairs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
