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
                    <li class="bbd">
                        <a href="finance-report">FINANCE REPORT</a>
                    </li>
                    <li>FLEET</li>
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
                        <div class="col-sm-6 col-md-12 col-lg-3 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span style="color:#28BE5B;"> PAID USERS</span>
                                    <span class="box_green">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.15" cx="30" cy="30" r="30"
                                                fill="#28BE5B" />
                                            <path
                                                d="M38.7619 19.9786C38.6224 19.8658 38.4595 19.7857 38.285 19.7442C38.1105 19.7026 37.9289 19.7007 37.7536 19.7386C36.4709 20.0074 35.1468 20.0108 33.8627 19.7486C32.5787 19.4865 31.3619 18.9642 30.2872 18.2141C30.0863 18.0747 29.8476 18 29.603 18C29.3585 18 29.1197 18.0747 28.9188 18.2141C27.8442 18.9642 26.6274 19.4865 25.3433 19.7486C24.0593 20.0108 22.7351 20.0074 21.4525 19.7386C21.2771 19.7007 21.0955 19.7026 20.9211 19.7442C20.7466 19.7857 20.5836 19.8658 20.4441 19.9786C20.3049 20.0916 20.1927 20.2344 20.1158 20.3964C20.039 20.5584 19.9994 20.7356 20 20.9149V29.8577C19.9989 31.5788 20.4091 33.2752 21.1962 34.8056C21.9834 36.3361 23.1248 37.6564 24.5254 38.6565L28.9068 41.7775C29.1101 41.9222 29.3535 42 29.603 42C29.8526 42 30.0959 41.9222 30.2992 41.7775L34.6806 38.6565C36.0812 37.6564 37.2226 36.3361 38.0098 34.8056C38.797 33.2752 39.2071 31.5788 39.206 29.8577V20.9149C39.2066 20.7356 39.1671 20.5584 39.0902 20.3964C39.0133 20.2344 38.9011 20.0916 38.7619 19.9786ZM36.8053 29.8577C36.8062 31.1959 36.4875 32.5149 35.8758 33.705C35.264 34.8951 34.3769 35.9219 33.2882 36.6999L29.603 39.3287L25.9179 36.6999C24.8292 35.9219 23.942 34.8951 23.3303 33.705C22.7185 32.5149 22.3998 31.1959 22.4008 29.8577V22.2954C24.9173 22.5108 27.4376 21.9269 29.603 20.6268C31.7684 21.9269 34.2888 22.5108 36.8053 22.2954V29.8577ZM31.4516 27.1089L28.2226 30.3499L27.1542 29.2696C26.9282 29.0435 26.6216 28.9165 26.302 28.9165C25.9823 28.9165 25.6757 29.0435 25.4497 29.2696C25.2237 29.4956 25.0967 29.8022 25.0967 30.1218C25.0967 30.4415 25.2237 30.7481 25.4497 30.9741L27.3703 32.8947C27.4819 33.0072 27.6147 33.0965 27.7609 33.1574C27.9072 33.2184 28.0641 33.2498 28.2226 33.2498C28.381 33.2498 28.5379 33.2184 28.6842 33.1574C28.8305 33.0965 28.9633 33.0072 29.0748 32.8947L33.2041 28.8014C33.4302 28.5754 33.5572 28.2688 33.5572 27.9491C33.5572 27.6295 33.4302 27.3229 33.2041 27.0969C32.9781 26.8708 32.6715 26.7439 32.3519 26.7439C32.0322 26.7439 31.7256 26.8708 31.4996 27.0969L31.4516 27.1089Z"
                                                fill="#28BE5B" />
                                        </svg>
                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    $31,650.00
                                </span>
                                <span class="total_info grey_text">
                                    UPDATED:23 AUG, 2022
                                </span>
                                <div class="line-right-100"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-3 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span style="color: #FF4A4A;">UNPAID USERS</span>
                                    <span class="box_red">
                                        <svg width="61" height="60" viewBox="0 0 61 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.15" cx="30.7578" cy="30" r="30"
                                                fill="#FF4A4A" />
                                            <path
                                                d="M39.7751 27.0465C39.6756 26.8491 39.5235 26.6831 39.3354 26.5669C39.1474 26.4507 38.9308 26.3889 38.7098 26.3882H32.7248V19.2062C32.7376 18.9437 32.6637 18.6842 32.5144 18.4679C32.3652 18.2515 32.1488 18.0903 31.8988 18.0092C31.6585 17.9301 31.3993 17.9292 31.1584 18.0066C30.9176 18.0841 30.7074 18.2358 30.5582 18.4401L20.9822 31.6071C20.8622 31.7805 20.7902 31.9825 20.7733 32.1927C20.7565 32.4029 20.7955 32.6138 20.8864 32.8041C20.9701 33.0217 21.1155 33.2101 21.3048 33.3461C21.494 33.4822 21.7189 33.5601 21.9518 33.5702H27.9368V40.7522C27.937 41.0046 28.0169 41.2505 28.1653 41.4548C28.3136 41.659 28.5227 41.8111 28.7627 41.8894C28.883 41.9266 29.0079 41.9468 29.1338 41.9492C29.3226 41.9497 29.5089 41.9055 29.6775 41.8202C29.846 41.7349 29.9919 41.6109 30.1033 41.4584L39.6794 28.2914C39.8083 28.1128 39.8855 27.9021 39.9024 27.6825C39.9193 27.4628 39.8752 27.2428 39.7751 27.0465ZM30.3308 37.0654V32.3732C30.3308 32.0557 30.2047 31.7513 29.9802 31.5268C29.7557 31.3023 29.4512 31.1762 29.1338 31.1762H24.3458L30.3308 22.8929V27.5852C30.3308 27.9027 30.4569 28.2071 30.6814 28.4316C30.9058 28.6561 31.2103 28.7822 31.5278 28.7822H36.3158L30.3308 37.0654Z"
                                                fill="#FF4A4A" />
                                        </svg>


                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    $7,500.00
                                </span>
                                <span class="total_info grey_text">
                                    UPDATED:23 AUG, 2022
                                </span>
                                <div class="line-right-100"></div>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-3 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span style="color: #4A4AFF;"> PROJECTED INCOME</span>
                                    <span class="box_blue">
                                        <svg width="61" height="60" viewBox="0 0 61 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.15" cx="30.0391" cy="30" r="30"
                                                fill="#4A4AFF" />
                                            <path
                                                d="M25.5391 34C25.9369 34 26.3184 33.842 26.5997 33.5607C26.881 33.2794 27.0391 32.8978 27.0391 32.5C27.0439 32.4501 27.0439 32.3999 27.0391 32.35L29.8291 29.56H30.0591H30.2891L31.8991 31.17C31.8991 31.17 31.8991 31.22 31.8991 31.25C31.8991 31.6478 32.0571 32.0294 32.3384 32.3107C32.6197 32.592 33.0012 32.75 33.3991 32.75C33.7969 32.75 34.1784 32.592 34.4597 32.3107C34.741 32.0294 34.8991 31.6478 34.8991 31.25V31.17L38.5391 27.5C38.8357 27.5 39.1257 27.412 39.3724 27.2472C39.6191 27.0824 39.8113 26.8481 39.9249 26.574C40.0384 26.2999 40.0681 25.9983 40.0102 25.7074C39.9524 25.4164 39.8095 25.1491 39.5997 24.9393C39.3899 24.7296 39.1227 24.5867 38.8317 24.5288C38.5407 24.4709 38.2391 24.5006 37.965 24.6142C37.6909 24.7277 37.4567 24.92 37.2919 25.1666C37.127 25.4133 37.0391 25.7033 37.0391 26C37.0342 26.0499 37.0342 26.1001 37.0391 26.15L33.4291 29.76H33.2691L31.5391 28C31.5391 27.6022 31.381 27.2206 31.0997 26.9393C30.8184 26.658 30.4369 26.5 30.0391 26.5C29.6412 26.5 29.2597 26.658 28.9784 26.9393C28.6971 27.2206 28.5391 27.6022 28.5391 28L25.5391 31C25.1412 31 24.7597 31.158 24.4784 31.4393C24.1971 31.7206 24.0391 32.1022 24.0391 32.5C24.0391 32.8978 24.1971 33.2794 24.4784 33.5607C24.7597 33.842 25.1412 34 25.5391 34ZM39.0391 38H22.0391V21C22.0391 20.7348 21.9337 20.4804 21.7462 20.2929C21.5586 20.1054 21.3043 20 21.0391 20C20.7738 20 20.5195 20.1054 20.332 20.2929C20.1444 20.4804 20.0391 20.7348 20.0391 21V39C20.0391 39.2652 20.1444 39.5196 20.332 39.7071C20.5195 39.8946 20.7738 40 21.0391 40H39.0391C39.3043 40 39.5586 39.8946 39.7462 39.7071C39.9337 39.5196 40.0391 39.2652 40.0391 39C40.0391 38.7348 39.9337 38.4804 39.7462 38.2929C39.5586 38.1054 39.3043 38 39.0391 38Z"
                                                fill="#4A4AFF" />
                                        </svg>

                                    </span>
                                </div>
                                <span class="deposit_amount grey_text">
                                    0
                                </span>
                                <span class="total_info grey_text">
                                    LAST UPDATED:23 AUG, 2022
                                </span>
                                <div class="line-right-100"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-3 p-3">
                            <div class="row_top_info">
                                <div class="top3">
                                    <span style="color: #888888">PAYMENT DEFICIT</span>
                                    <span class="box_grey">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.15" cx="30" cy="30" r="30"
                                                fill="#888888" />
                                            <path
                                                d="M31.2065 26.4867C31.2065 27.153 30.6663 27.6932 30 27.6932C29.3337 27.6932 28.7936 27.153 28.7936 26.4867C28.7936 25.8204 29.3337 25.2803 30 25.2803C30.6663 25.2803 31.2065 25.8204 31.2065 26.4867Z"
                                                fill="#888888" />
                                            <path
                                                d="M30 29.8045C30.4998 29.8045 30.9049 30.2096 30.9049 30.7093V36.7415C30.9049 37.2413 30.4998 37.6464 30 37.6464C29.5003 37.6464 29.0952 37.2413 29.0952 36.7415V30.7093C29.0952 30.2096 29.5003 29.8045 30 29.8045Z"
                                                fill="#888888" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M32.7391 20.4456C31.4217 18.5181 28.5783 18.5181 27.2609 20.4456L26.7398 21.208C23.4751 25.9846 20.6702 31.0597 18.3626 36.3652L18.2538 36.6155C17.4405 38.4852 18.6691 40.6082 20.6954 40.8346C26.8792 41.5258 33.1208 41.5258 39.3046 40.8346C41.3309 40.6082 42.5595 38.4852 41.7462 36.6155L41.6374 36.3652C39.3298 31.0597 36.5249 25.9846 33.2602 21.208L32.7391 20.4456ZM28.755 21.4668C29.3538 20.5906 30.6462 20.5906 31.245 21.4668L31.7661 22.2292C34.9663 26.9114 37.7159 31.8862 39.9779 37.087L40.0867 37.3372C40.4142 38.0901 39.9195 38.945 39.1036 39.0362C33.0534 39.7124 26.9466 39.7124 20.8964 39.0362C20.0805 38.945 19.5858 38.0901 19.9133 37.3372L20.0221 37.087C22.2841 31.8862 25.0337 26.9114 28.2339 22.2292L28.755 21.4668Z"
                                                fill="#888888" />
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

                <ul class="sub-tabs-100 mt-2">
                    <li class="bbd">PAYMENTS RECIEVED</li>
                    <li>
                        DUE PAYEMENT (0)
                    </li>
                    <li>OVERDUE PAYMENT (0)</li>
                    <li>CRITICAL PAYMENT (0)</li>
                    <li>CODE RED (0)</li>
                </ul>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title mt-3 mb-3 pl-0">
                                Total Payments ( $0 ) / Payment Count ( 0 )
                            </h4>

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
                                        <th>DRIVER NAME</th>
                                        <th>PHONE NO.</th>
                                        <th>AMOUNT</th>
                                        <th>TRANS ID.</th>
                                        <th>PAYMENT DATE</th>
                                        <th>GPS STATUS</th>
                                        <th>LAST UPDATE</th>
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
