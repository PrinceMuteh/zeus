@extends('main')
@section('content')
    <style>
        .carousel-inner {
            width: 100%;
            height: 100%;
        }

        .carousel-inner img {
            width: 100%;
        }

        .guarantor-banner {
            padding: 30px;
        }

        .form-main-guarantor {
            margin-top: 50px;
            padding-bottom: 70px;
        }

        .guarantorSubmit {
            display: flex;
            /* justify-content: flex-end; */
        }

        .guarantorSubmit button {
            padding: 10px 20px;
            /* height: 15px; */
            background: #4A4AFF;
            border: none;
            /* border-radius: 9px; */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            /* margin-left: 400px; */
        }

        .main-100 {
            margin-top: 50px;
        }

        .driver-info {
            font-weight: bold;
            font-size: 14px;
            color: #08102E;
        }

        .info-150 {
            color: #08102E;
            font-weight: bold;
            font-size: 12px;
        }

        .info-250 {
            font-size: 14px;
            color: rgba(128, 128, 128, 0.577);
        }

        .main-driver-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif
        }

        .op-data {
            display: none;
        }

        .guarantor-communication {
            display: none;
        }
    </style>
    <div class="content-page" style="background: #fff">
        <div class="content">
            <div class="container-fluid mt-2">
                <p class="sectionTitle text-inter pb-0 pl-0">
                    Guarantor Back Office
                </p>
                <div class="row guarantor-banner bg-light-banner">
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <div class="box-col">
                            <div class="avatar">
                                <img src="https://test.mygarage.africa/user.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-5 ">
                        <div class="box-col align-items-start">
                            <span class="staff-name">John Doe</span>
                            <span class="staff-id">Date created: 2022-09-23 23:42 PM</span>
                        </div>
                    </div>
                </div>

                <ul class="sub-tabs mt-3">
                    <li class="basicInfoBtn bbd">Basic Info</li>
                    <li class="opDataBtn">Operational Data</li>
                    <li class="guarantorCom">Communication </li>
                </ul>


                <div class="container-fluid">
                    <div class="form-main-guarantor">

                        <div class="row">
                            <div class="col-md-7 col-lg-8">
                                {{-- basic info --}}
                                <p class="infoForm">Basic Information</p>
                                <div class="pl-4 ml-4 mt-3">
                                    <div class="container">
                                        <form action="" method="">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Profile Picture</label>
                                                        <input type="file" name="avatar" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">First Name</label>
                                                        <input type="text" name="first_name"
                                                            class="form-control infoInput">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Last Name</label>
                                                        <input type="text" name="last_name"
                                                            class="form-control infoInput">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Gender</label>
                                                        <input type="text" name="gender" class="form-control infoInput">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">D.O.B</label>
                                                        <input type="date" name="dob" class="form-control infoInput">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guarantorSubmit">
                                                <button>UPDATE</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                {{-- contact info --}}
                                <div class="main-100">
                                    <p class="infoForm">Contact Information</p>
                                    <div class="pl-4 ml-4 mt-3">
                                        <div class="container">
                                            <form action="" method="">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="text" name="phone"
                                                                class="form-control infoInput">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" name="email"
                                                                class="form-control infoInput">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Address</label>
                                                            <input type="text" name="address"
                                                                class="form-control infoInput">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <input type="text" placeholder="City" name="city"
                                                                    class="form-control infoInput">
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" placeholder="Nearest Landmark"
                                                                    name="landmark" class="form-control infoInput">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="guarantorSubmit">
                                                    <button>UPDATE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                {{-- identification info --}}
                                <div class="main-100">
                                    <p class="infoForm">Identification</p>
                                    <div class="pl-4 ml-4 mt-3">
                                        <div class="container">
                                            <form action="" method="">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">National Identity Number</label>
                                                            <input type="text" name="nin"
                                                                class="form-control infoInput">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Organization ID</label>
                                                            <input type="file" name="org_id" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="guarantorSubmit">
                                                    <button>UPDATE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- other info --}}
                                <div class="main-100">
                                    <p class="infoForm">Others</p>
                                    <div class="pl-4 ml-4 mt-3">
                                        <div class="container">
                                            <form action="" method="">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Nationality</label>
                                                            <input type="text" name="nationality"
                                                                class="form-control infoInput">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Authorized to work in Nigeria?</label>
                                                            <input type="text" name="authorization"
                                                                class="form-control infoInput">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Education Level</label>
                                                            <input type="text" name="education_level"
                                                                class="form-control infoInput">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Professional Qualification</label>
                                                            <input type="text" name="education_level"
                                                                class="form-control infoInput">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="guarantorSubmit">
                                                    <button>UPDATE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-3">
                                <div class="card-bg w-100 p-4">
                                    <p class="driver-info">Driver Info</p>
                                    <div class="main-driver-info">
                                        <div class="box-col">
                                            <div class="avatar-sm">
                                                <img src="https://test.mygarage.africa/user.png" alt="">
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <div class="col-12 info-150">Name:</div>
                                            <div class="col-12 info-250">Masud Ifeanyi</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-12 info-150">Email:</div>
                                            <div class="col-12 info-250">Masud Ifeanyi</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-12 info-150">Phone:</div>
                                            <div class="col-12 info-250">08022118899</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="op-data">
                        <div class="row justify-content-center g-0">

                            <div class="col-sm-6 col-md-8 col-lg-4">
                                <div class="operation-data-section">
                                    <div class="mt-2">
                                        <div class="image-car-sample-100">
                                            <div id="carouselExampleSlidesOnly" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('assets/images/car_sample_1.png') }}"
                                                            class="d-block" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ asset('assets/images/car_sample_2.png') }}"
                                                            class="d-block" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ asset('assets/images/car-red.png') }}"
                                                            class="d-block" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="baseInfo">
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">LICENCE PLATE:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">TYPE:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">MODEL:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">YEAR:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">CHASSIS:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">BODY:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">ENGINE:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">TRANSMISSION:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">COLOR:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">DATE ADDED:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">FLEET:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <span class="ll-text">SUPPORT CENTRE:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-8 col-lg-4">
                                <div class="operation-data-section Pt-4">
                                    <p class="status-100 mb-4 ml-2" style="transform: translateY(10px)">PAYMENT
                                        ANALYSS</p>
                                    <div class="row mb-3">
                                        <div
                                            class="col-sm-6 col-md-6 col-lg-6 p-3 d-flex flex-column justify-content-center">
                                            <canvas id="myChart4" style="max-width:100%"></canvas>
                                        </div>

                                        <div
                                            class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
                                            <div>
                                                <span class="value-donut mb-2 mt-4">
                                                    <div class="dot-100 mr-2" style="background: #DDF9DB;"></div>
                                                    <div>
                                                        <div class="t-100">PAYMENT GOAL</div>
                                                        <div class="t-200">₦ 0</div>
                                                    </div>
                                                </span>
                                                <span class="value-donut mb-2">
                                                    <div class="dot-100 mr-2" style="background: #75E76B"></div>
                                                    <div>
                                                        <div class="t-100">SECURITY DEPOSIT:</div>
                                                        <div class="t-200">₦ 0</div>
                                                    </div>
                                                </span>
                                                <span class="value-donut mb-4">
                                                    <div class="dot-100 mr-2" style="background: #44953D"></div>
                                                    <div>
                                                        <div class="t-100">Contribution</div>
                                                        <div class="t-200">₦ 0
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="status-100 mb-4 mt-4 ml-2">INTEGRATION SUMMARY</span>
                                    <div class="baseInfo" style="padding-bottom: 10px;">
                                        <div class="row mb-2 mt-2">
                                            <div class="col-6">
                                                <span class="ll-text">PAYMENT START DATE:</span>
                                            </div>
                                            <div class="col-6">
                                                {{-- <span class="lr-text">{{ $data['carFleet']->start_date ?? '-' }}</span> --}}
                                                <span class="lr-text">-</span>

                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <span class="ll-text">SUBCRIBTION VALUE:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <span class="ll-text">NEXT PAYMENT:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <span class="ll-text">PACKAGE:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="lr-text">-
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <span class="ll-text">PAYMENT CIRCLE:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <span class="ll-text">PLATFORM COMMISSION:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="lr-text">
                                                    -</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <span class="ll-text">OWNER COMMISSION:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <span class="ll-text">VEHICLE COST:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="lr-text">-</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-sm-6 col-md-8 col-lg-4">
                                <div class="operation-data-section">
                                    <div class="mb-3 pt-2 d-flex align-items-center justify-content-between">
                                        <span class="top-text-300">TRANSACTION HISTORY</span>
                                        <span class="assign-info">
                                            DOWNLOAD ALL</span>
                                    </div>

                                    <div class="main-transaction-history scroll">
                                        <div class="transaction-history text-left">
                                            <div class="shape-arrow-down">
                                                <div class="arrow-green-down bg-light-green200">
                                                    <svg width="54" height="55" viewBox="0 0 54 55"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.871094" width="53.5312" height="53.5312"
                                                            rx="8.92187" fill="#E6FFCC" />
                                                        <path d="M19.1953 28.9863L26.7657 36.5568L34.3362 28.9863"
                                                            stroke="#27B235" stroke-width="3.56875"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M26.7656 18.7148V36.5586" stroke="#27B235"
                                                            stroke-width="3.56875" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="credit-detail">
                                                <span class="credit-info-100">CREDIT</span>
                                                <span class="credit-info-200"> ABC123XYZ</span>
                                                <span class="credit-info-100">21 AUG 2021</span>
                                            </div>
                                            <div class="credit-value">
                                                <span class="credit-info-100">CLEARED</span>
                                                <span class="credit-info-200">₦ 0
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="guarantor-communication">
                        <div class="row justify-content-center g-0">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="operation-data-section">
                                    <ul class="message-links">
                                        <li class="active-message-link">NOTIFICATIONS</li>
                                        <div class="dropdown dropstart">
                                            <i class='bx bx-dots-vertical-rounded user-cat' data-bs-toggle="dropdown"
                                                aria-expanded="false"></i>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Driver</a></li>
                                                <li><a class="dropdown-item" href="#">Investor</a></li>
                                                <li><a class="dropdown-item" href="#">Sponsor</a></li>
                                            </ul>
                                        </div>
                                    </ul>
                                    <div class="searchMsg">
                                        <input type="text" class="message-search-input">
                                        <svg class="search-message-icon" width="19" height="19"
                                            viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.85039 9.00039C1.85039 5.05155 5.05155 1.85039 9.00039 1.85039C12.9492 1.85039 16.1504 5.05155 16.1504 9.00039C16.1504 12.9492 12.9492 16.1504 9.00039 16.1504C5.05155 16.1504 1.85039 12.9492 1.85039 9.00039ZM9.00039 0.150391C4.11267 0.150391 0.150391 4.11267 0.150391 9.00039C0.150391 13.8881 4.11267 17.8504 9.00039 17.8504C11.1382 17.8504 13.0989 17.0924 14.6285 15.8306L17.3994 18.6014C17.7313 18.9334 18.2695 18.9334 18.6014 18.6014C18.9334 18.2695 18.9334 17.7313 18.6014 17.3994L15.8306 14.6285C17.0924 13.0989 17.8504 11.1382 17.8504 9.00039C17.8504 4.11267 13.8881 0.150391 9.00039 0.150391Z"
                                                fill="#1F2937" />
                                        </svg>
                                    </div>
                                    <div class="message-day">Today</div>
                                    <div class="main-main-user">
                                        <div class="main-user active-main-user">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="user-message-image">
                                                        <img src="{{ asset('assets/images/message-user-avatar.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <span class="user-message-info">John Doe / FCT Abuja</span>
                                                    <span class="user-message-mail">user@gmail.com</span>
                                                    <span class="message-title-100">Message Title</span>
                                                    <span class="message-text">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam,
                                                        accusamus.
                                                    </span>
                                                </div>
                                                <div class="col-2">
                                                    <span class="time-message">
                                                        now
                                                    </span>
                                                    <span class="message-count">2</span>
                                                </div>
                                            </div>
                                            <div class="divider-msg"></div>
                                        </div>
                                        <div class="main-user">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="user-message-image">
                                                        <img src="{{ asset('assets/images/message-user-avatar.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <span class="user-message-info">John Doe / FCT Abuja</span>
                                                    <span class="user-message-mail">user@gmail.com</span>
                                                    <span class="message-title-100">Message Title</span>
                                                    <span class="message-text">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam,
                                                        accusamus.
                                                    </span>
                                                </div>
                                                <div class="col-2">
                                                    <span class="time-message">
                                                        now
                                                    </span>
                                                    <span class="message-count">2</span>
                                                </div>
                                            </div>
                                            <div class="divider-msg"></div>
                                        </div>
                                        <div class="main-user">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="user-message-image">
                                                        <img src="{{ asset('assets/images/message-user-avatar.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <span class="user-message-info">John Doe / FCT Abuja</span>
                                                    <span class="user-message-mail">user@gmail.com</span>
                                                    <span class="message-title-100">Message Title</span>
                                                    <span class="message-text">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam,
                                                        accusamus.
                                                    </span>
                                                </div>
                                                <div class="col-2">
                                                    <span class="time-message">
                                                        now
                                                    </span>
                                                    <span class="message-count">2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-8">
                                <div class="operation-data-section">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6 mb-3">
                                            <div class="row p-3">
                                                <div class="col-3">
                                                    <div class="user-message-image">
                                                        <img src="{{ asset('assets/images/message-user-avatar.png') }}"
                                                            style="width: 70px; height: 70px;" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-7 offset-1">
                                                    <span class="user-message-info">John Doe / FCT Abuja</span>
                                                    <span class="user-message-mail">user@gmail.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6 p-3">
                                            <div class="searchMsg">
                                                <input type="text" class="message-search-input">
                                                <svg class="search-message-icon" width="19" height="19"
                                                    viewBox="0 0 19 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.85039 9.00039C1.85039 5.05155 5.05155 1.85039 9.00039 1.85039C12.9492 1.85039 16.1504 5.05155 16.1504 9.00039C16.1504 12.9492 12.9492 16.1504 9.00039 16.1504C5.05155 16.1504 1.85039 12.9492 1.85039 9.00039ZM9.00039 0.150391C4.11267 0.150391 0.150391 4.11267 0.150391 9.00039C0.150391 13.8881 4.11267 17.8504 9.00039 17.8504C11.1382 17.8504 13.0989 17.0924 14.6285 15.8306L17.3994 18.6014C17.7313 18.9334 18.2695 18.9334 18.6014 18.6014C18.9334 18.2695 18.9334 17.7313 18.6014 17.3994L15.8306 14.6285C17.0924 13.0989 17.8504 11.1382 17.8504 9.00039C17.8504 4.11267 13.8881 0.150391 9.00039 0.150391Z"
                                                        fill="#1F2937" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="message-region">
                                        <div class="message-date-sent">Today Sept 23</div>
                                        <div class="message-box-left">
                                            <span class="name-date-msg">deen 12:30 PM</span>
                                            <div class="message-left-100">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad
                                                eos
                                                minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                                            </div>
                                        </div>
                                        <div class="message-box-right">
                                            <span class="name-date-msg">deen 12:30 PM</span>
                                            <div class="message-right-100">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad
                                                eos
                                                minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                                            </div>
                                        </div>

                                        <div class="message-date-sent">Today Sept 23</div>
                                        <div class="message-box-left">
                                            <span class="name-date-msg">deen 12:30 PM</span>
                                            <div class="message-left-100">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad
                                                eos
                                                minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                                            </div>
                                        </div>
                                        <div class="message-box-left">
                                            <span class="name-date-msg">deen 12:30 PM</span>
                                            <div class="message-left-100">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad
                                                eos
                                                minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                                            </div>
                                        </div>
                                        <div class="message-box-right">
                                            <span class="name-date-msg">deen 12:30 PM</span>
                                            <div class="message-right-100">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad
                                                eos
                                                minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-send">
                                        <input type="text" class="sendMsg">
                                        <i class='bx bxs-right-arrow-circle sendIcon'></i>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>


                </div>
            </div>

            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>

    <script>
        let basicInfoLink = document.querySelector('.basicInfoBtn');
        let opDataLink = document.querySelector('.opDataBtn');
        let guarantorComLink = document.querySelector('.guarantorCom');

        let basicInfoSec = document.querySelector('.form-main-guarantor');
        let opDataSec = document.querySelector('.op-data');
        let guarantorComSec = document.querySelector('.guarantor-communication')

        basicInfoLink.addEventListener('click', () => {
            basicInfoLink.classList.add('bbd');
            opDataLink.classList.remove('bbd');
            guarantorComLink.classList.remove('bbd');
            basicInfoSec.style.display = 'block';
            opDataSec.style.display = 'none';
            guarantorComSec.display = 'none';
        });

        opDataLink.addEventListener('click', () => {
            basicInfoLink.classList.remove('bbd');
            opDataLink.classList.add('bbd');
            guarantorComLink.classList.remove('bbd');
            basicInfoSec.style.display = 'none';
            opDataSec.style.display = 'block';
            guarantorComSec.style.display = 'none';
        });
        guarantorComLink.addEventListener('click', () => {
            basicInfoLink.classList.remove('bbd');
            opDataLink.classList.remove('bbd');
            guarantorComLink.classList.add('bbd');
            basicInfoSec.style.display = 'none';
            opDataSec.style.display = 'none';
            guarantorComSec.style.display = 'block';
        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('assets/js/chart.js') }} "></script>
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
        });
    </script>
    <script>
        var yValues = [80, 49, 120];
        var barColors = [
            "#DDF9DB",
            "#75E76B",
            "#44953D"
        ];

        new Chart("myChart4", {
            type: "doughnut",
            data: {
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true
                },
            }
        });
    </script>
@endsection
