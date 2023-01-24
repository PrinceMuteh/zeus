@extends('main')
@section('content')
    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="">
                <!-- text-inter -->
                <div class="row userInfo-row">
                    <div class="col-sm-6 col-md-8">
                        <div class="container-dm">
                            <div class="top-row m-25">
                                <div class="fixed-section">
                                    <p class="sectionTitle text-inter pb-0 pl-0">
                                        Create User Account
                                    </p>
                                    <p class="subTitle">
                                        This entire process takes less than 10 mins to fillout the
                                        information required to create a new user account.
                                    </p>
                                </div>
                            </div>
                            @include('components.message')
                            <form action="{{ route('createUser') }}" method="post">
                                @csrf
                                <div class="form-area">
                                    <div class="form-group">
                                        <label for="">User Account Type <span
                                                class="text-danger font-weight-bold">*</span></label>

                                        <select name="usertype" id="" class="form-control">
                                            <option value="Driver">Driver</option>
                                            <option value="Vehicle Owner">Vehicle Owner / Investor</option>
                                        </select>
                                        <small style="font-size: 9px; font-weight:bold">These account types are present to
                                            support each user type (e.g Host, Agent, Fleet Operator, Workshops etc).</small>
                                    </div>
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
                                        <label for="">Phone Number <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="tel" name="phone"
                                            class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="email" name="email" class="form-control" required />
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="">Gender <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <select name="gender" class = "form-control" id="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Femail</option>
                                        </select>
                                    </div> --}}
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
                            </form>


                        </div>
                    </div>
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
