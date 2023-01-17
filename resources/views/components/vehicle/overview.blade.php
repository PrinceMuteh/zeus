<div class="overview_section">
    <div class=" mt-2">
        <div class="row">
            <div class="col-sm-6 col-md-12 col-lg-8">
                <div class="top-banner-100">
                    <div class="top-row-banner">
                        <span class="title-100">Hello, {{ auth()->user()->name }} (Operator)</span>
                        {{-- <span class="title-200">Here is a summary of what your fleet currently looks
                            like...</span> --}}
                        <img src="{{ asset('assets/images/computer.png') }}"
                            style="width: 115px; height: 100px; transform: translateY(10px); translateX(10px);"
                            class="computer_img" alt="">
                    </div>
                    <div class="mt-4 graph-home p-3 w-100 d-flex justify-content-center align-items-center">

                        <canvas id="top_x_div" height="20vh" width="80vw"></canvas>

                        {{-- <div id="top_x_div" style="width: 800px; height: 306px;"></div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-md-12 col-lg-4">
                <div class="right-side-home-2 mt-0">
                    <div class="top-finance-heading pl-4 pr-2">
                        <span class="title-250">Fleet Status</span>
                        <a href="add-vehicle" class="addBtn-100">ADD NEW</a>
                    </div>
                    <div id="donutchart-4" style=" height: 420px;  padding-bottom:5px; ">
                    </div>
                    <div class="base-right-side">
                        <div class="base-22">
                            <span class="dot-1"></span>
                            <div class="base-inner-val">
                                <span class="base-inner-100">Offline Vehicles</span>
                                <span class="base-inner-200">500</span>
                            </div>
                        </div>
                        <div class="base-22">
                            <span class="dot-2"></span>
                            <div class="base-inner-val">
                                <span class="base-inner-100">Online Vehicles</span>
                                <span class="base-inner-200">30,500</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-6 col-md-12 col-lg-4">
                <div class="right-side-home-2 mt-0" style="padding-bottom: 440px;">
                    <div class="top-finance-heading pl-4 pr-2">
                        <span class="title-250">Fleet Status</span>
                        <a href="add-vehicle" class="addBtn-100">ADD NEW</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 p-3 d-flex flex-column justify-content-center">
                            <canvas id="myChart4" style="width: 350px; height: 350px"></canvas>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
                            <div>
                                <span class="value-donut mb-1 mt-4">
                                    <div class="dot-100 mr-2 bg-green-100"></div>
                                    <div>
                                        <div class="t-100">Total Assigned</div>
                                        <div class="t-200">{{ $allVehicle->count() - $noDriver }}</div>
                                    </div>
                                </span>
                                <span class="value-donut mb-1">
                                    <div class="dot-100 mr-2 bg-green-200"></div>
                                    <div>
                                        <div class="t-100">Un-Assigned</div>
                                        <div class="t-200">{{ $noDriver }}</div>
                                    </div>
                                </span>
                                <span class="value-donut mb-4">
                                    <div class="dot-100 mr-2 bg-green-300"></div>
                                    <div>
                                        <div class="t-100">Others</div>
                                        <div class="t-200">{{ $allVehicle->count() - $noDriver }}</div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="base-row">
            <span class="base-top-text">Analytics</span>
            <div class="row">
                <div class="col-sm-6 col-md-3 col-xl-3 float-left">
                    <div class="vehicle-page-info border-none">
                        <div class="inner-vehicle-100  row justify-content-between pr-5" style="padding-right:60px;">
                            <div class="col-4">
                                <div class="inner-shape light-red">
                                    <svg width="20" height="20" viewBox="0 0 16 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.2727 8.14933C10.6469 7.68163 10.8528 7.10159 10.8572 6.50263C10.8572 5.78421 10.5718 5.09521 10.0638 4.58721C9.55584 4.07921 8.86684 3.79382 8.14842 3.79382C7.43 3.79382 6.741 4.07921 6.233 4.58721C5.72499 5.09521 5.4396 5.78421 5.4396 6.50263C5.44407 7.10159 5.64998 7.68163 6.02418 8.14933C5.29027 8.59595 4.71448 9.26099 4.37748 10.0513C4.33032 10.1515 4.30387 10.2603 4.29974 10.371C4.29561 10.4818 4.31387 10.5922 4.35343 10.6957C4.39299 10.7992 4.45304 10.8936 4.52997 10.9734C4.60691 11.0531 4.69915 11.1165 4.80117 11.1598C4.90319 11.203 5.01289 11.2252 5.1237 11.2251C5.23451 11.2249 5.34414 11.2024 5.44604 11.1589C5.54793 11.1153 5.63999 11.0517 5.7167 10.9717C5.79341 10.8917 5.85318 10.7971 5.89244 10.6935C6.08168 10.2511 6.39598 9.87368 6.79675 9.60747C7.19752 9.34127 7.6673 9.1979 8.14842 9.19498C8.63094 9.1963 9.10251 9.33892 9.50489 9.60522C9.90727 9.87152 10.2228 10.2498 10.4126 10.6935C10.4757 10.8423 10.5811 10.9693 10.7158 11.0586C10.8505 11.1479 11.0085 11.1956 11.1701 11.1957C11.2803 11.1937 11.3891 11.1713 11.4912 11.1299C11.692 11.0446 11.8507 10.8831 11.9325 10.6808C12.0144 10.4786 12.0126 10.2522 11.9276 10.0513C11.5884 9.25982 11.0096 8.59464 10.2727 8.14933ZM8.14842 7.54829C7.938 7.54828 7.73233 7.48577 7.55749 7.3687C7.38265 7.25162 7.24653 7.08525 7.16639 6.8907C7.08624 6.69614 7.0657 6.48216 7.10735 6.27591C7.149 6.06966 7.25098 5.88042 7.40035 5.73222C7.54971 5.58401 7.73973 5.48351 7.9463 5.44346C8.15287 5.40341 8.36669 5.42562 8.56061 5.50728C8.75454 5.58893 8.91984 5.72635 9.03556 5.90209C9.15127 6.07784 9.21217 6.28399 9.21054 6.4944C9.20837 6.77466 9.09551 7.04271 8.89656 7.24011C8.6976 7.43752 8.42869 7.54829 8.14842 7.54829ZM13.0885 0.492188H3.20833C2.55323 0.492188 1.92496 0.752424 1.46174 1.21565C0.998518 1.67887 0.738281 2.30714 0.738281 2.96223V12.0191C0.738281 12.6742 0.998518 13.3024 1.46174 13.7657C1.92496 14.2289 2.55323 14.4891 3.20833 14.4891H5.3408L7.56384 16.7204C7.64078 16.7967 7.73202 16.8571 7.83233 16.898C7.93265 16.939 8.04006 16.9598 8.14842 16.9592C8.34466 16.9592 8.53445 16.8891 8.6836 16.7616L11.3348 14.4891H13.0885C13.7436 14.4891 14.3719 14.2289 14.8351 13.7657C15.2983 13.3024 15.5586 12.6742 15.5586 12.0191V2.96223C15.5586 2.30714 15.2983 1.67887 14.8351 1.21565C14.3719 0.752424 13.7436 0.492188 13.0885 0.492188ZM13.9119 12.0191C13.9119 12.2374 13.8251 12.4469 13.6707 12.6013C13.5163 12.7557 13.3069 12.8424 13.0885 12.8424H11.0301C10.8339 12.8424 10.6441 12.9125 10.495 13.04L8.18959 15.0161L6.26295 13.0812C6.18602 13.0049 6.09478 12.9445 5.99446 12.9035C5.89415 12.8626 5.78673 12.8418 5.67837 12.8424H3.20833C2.98996 12.8424 2.78054 12.7557 2.62613 12.6013C2.47172 12.4469 2.38498 12.2374 2.38498 12.0191V2.96223C2.38498 2.74387 2.47172 2.53445 2.62613 2.38004C2.78054 2.22563 2.98996 2.13888 3.20833 2.13888H13.0885C13.3069 2.13888 13.5163 2.22563 13.6707 2.38004C13.8251 2.53445 13.9119 2.74387 13.9119 2.96223V12.0191Z"
                                            fill="#DE7979" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-6 inner-info">
                                <span class="inner-text-100">
                                    Total Mileage
                                </span>
                                <span class="inner-text-value">
                                    <span class="counter">{{ number_format($totalMiles / 1000) }}</span>KM
                                </span>
                            </div>
                        </div>
                        <div class="inner-vehicle-100 row justify-content-between pr-5 mt-2">
                            <div class="col-3">
                                <div class="inner-shape bg-light-blue">
                                    <svg width="14" height="15" viewBox="0 0 16 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.0183 8.14933C10.3925 7.68163 10.5984 7.10159 10.6028 6.50263C10.6028 5.78421 10.3175 5.09521 9.80945 4.58721C9.30145 4.07921 8.61245 3.79382 7.89402 3.79382C7.1756 3.79382 6.4866 4.07921 5.9786 4.58721C5.4706 5.09521 5.18521 5.78421 5.18521 6.50263C5.18967 7.10159 5.39558 7.68163 5.76979 8.14933C5.03588 8.59595 4.46008 9.26099 4.12309 10.0513C4.07592 10.1515 4.04948 10.2603 4.04535 10.371C4.04121 10.4818 4.05948 10.5922 4.09904 10.6957C4.1386 10.7992 4.19864 10.8936 4.27558 10.9734C4.35252 11.0531 4.44476 11.1165 4.54678 11.1598C4.6488 11.203 4.7585 11.2252 4.8693 11.2251C4.98011 11.2249 5.08975 11.2024 5.19164 11.1589C5.29354 11.1153 5.3856 11.0517 5.4623 10.9717C5.53901 10.8917 5.59879 10.7971 5.63805 10.6935C5.82728 10.2511 6.14158 9.87368 6.54235 9.60747C6.94312 9.34127 7.41291 9.1979 7.89402 9.19498C8.37654 9.1963 8.84811 9.33892 9.25049 9.60522C9.65287 9.87152 9.96844 10.2498 10.1582 10.6935C10.2213 10.8423 10.3267 10.9693 10.4614 11.0586C10.5961 11.1479 10.7541 11.1956 10.9157 11.1957C11.0259 11.1937 11.1347 11.1713 11.2368 11.1299C11.4376 11.0446 11.5963 10.8831 11.6782 10.6808C11.76 10.4786 11.7582 10.2522 11.6732 10.0513C11.334 9.25982 10.7552 8.59464 10.0183 8.14933ZM7.89402 7.54829C7.68361 7.54828 7.47793 7.48577 7.3031 7.3687C7.12826 7.25162 6.99213 7.08525 6.91199 6.8907C6.83185 6.69614 6.8113 6.48216 6.85296 6.27591C6.89461 6.06966 6.99659 5.88042 7.14595 5.73222C7.29532 5.58401 7.48534 5.48351 7.69191 5.44346C7.89848 5.40341 8.11229 5.42562 8.30622 5.50728C8.50015 5.58893 8.66545 5.72635 8.78116 5.90209C8.89687 6.07784 8.95778 6.28399 8.95615 6.4944C8.95397 6.77466 8.84111 7.04271 8.64216 7.24011C8.44321 7.43752 8.1743 7.54829 7.89402 7.54829ZM12.8341 0.492188H2.95393C2.29884 0.492188 1.67057 0.752424 1.20735 1.21565C0.744123 1.67887 0.483887 2.30714 0.483887 2.96223V12.0191C0.483887 12.6742 0.744123 13.3024 1.20735 13.7657C1.67057 14.2289 2.29884 14.4891 2.95393 14.4891H5.08641L7.30945 16.7204C7.38638 16.7967 7.47762 16.8571 7.57794 16.898C7.67825 16.939 7.78567 16.9598 7.89402 16.9592C8.09027 16.9592 8.28006 16.8891 8.4292 16.7616L11.0804 14.4891H12.8341C13.4892 14.4891 14.1175 14.2289 14.5807 13.7657C15.0439 13.3024 15.3042 12.6742 15.3042 12.0191V2.96223C15.3042 2.30714 15.0439 1.67887 14.5807 1.21565C14.1175 0.752424 13.4892 0.492188 12.8341 0.492188ZM13.6575 12.0191C13.6575 12.2374 13.5707 12.4469 13.4163 12.6013C13.2619 12.7557 13.0525 12.8424 12.8341 12.8424H10.7757C10.5795 12.8424 10.3897 12.9125 10.2406 13.04L7.93519 15.0161L6.00856 13.0812C5.93162 13.0049 5.84038 12.9445 5.74007 12.9035C5.63975 12.8626 5.53234 12.8418 5.42398 12.8424H2.95393C2.73557 12.8424 2.52615 12.7557 2.37174 12.6013C2.21733 12.4469 2.13058 12.2374 2.13058 12.0191V2.96223C2.13058 2.74387 2.21733 2.53445 2.37174 2.38004C2.52615 2.22563 2.73557 2.13888 2.95393 2.13888H12.8341C13.0525 2.13888 13.2619 2.22563 13.4163 2.38004C13.5707 2.53445 13.6575 2.74387 13.6575 2.96223V12.0191Z"
                                            fill="#79A1DE" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-6 inner-info">
                                <span class="inner-text-100">
                                    Total Est Fuel Cost
                                </span>
                                <span class="inner-text-value">
                                    ₦ 0
                                </span>
                            </div>
                        </div>
                        <div class="base-thin-line"></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="vehicle-page-info border-none">
                        <div class="inner-vehicle-100">
                            <div class="inner-shape bg-light-blue">
                                <svg width="14" height="15" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.0183 8.14933C10.3925 7.68163 10.5984 7.10159 10.6028 6.50263C10.6028 5.78421 10.3175 5.09521 9.80945 4.58721C9.30145 4.07921 8.61245 3.79382 7.89402 3.79382C7.1756 3.79382 6.4866 4.07921 5.9786 4.58721C5.4706 5.09521 5.18521 5.78421 5.18521 6.50263C5.18967 7.10159 5.39558 7.68163 5.76979 8.14933C5.03588 8.59595 4.46008 9.26099 4.12309 10.0513C4.07592 10.1515 4.04948 10.2603 4.04535 10.371C4.04121 10.4818 4.05948 10.5922 4.09904 10.6957C4.1386 10.7992 4.19864 10.8936 4.27558 10.9734C4.35252 11.0531 4.44476 11.1165 4.54678 11.1598C4.6488 11.203 4.7585 11.2252 4.8693 11.2251C4.98011 11.2249 5.08975 11.2024 5.19164 11.1589C5.29354 11.1153 5.3856 11.0517 5.4623 10.9717C5.53901 10.8917 5.59879 10.7971 5.63805 10.6935C5.82728 10.2511 6.14158 9.87368 6.54235 9.60747C6.94312 9.34127 7.41291 9.1979 7.89402 9.19498C8.37654 9.1963 8.84811 9.33892 9.25049 9.60522C9.65287 9.87152 9.96844 10.2498 10.1582 10.6935C10.2213 10.8423 10.3267 10.9693 10.4614 11.0586C10.5961 11.1479 10.7541 11.1956 10.9157 11.1957C11.0259 11.1937 11.1347 11.1713 11.2368 11.1299C11.4376 11.0446 11.5963 10.8831 11.6782 10.6808C11.76 10.4786 11.7582 10.2522 11.6732 10.0513C11.334 9.25982 10.7552 8.59464 10.0183 8.14933ZM7.89402 7.54829C7.68361 7.54828 7.47793 7.48577 7.3031 7.3687C7.12826 7.25162 6.99213 7.08525 6.91199 6.8907C6.83185 6.69614 6.8113 6.48216 6.85296 6.27591C6.89461 6.06966 6.99659 5.88042 7.14595 5.73222C7.29532 5.58401 7.48534 5.48351 7.69191 5.44346C7.89848 5.40341 8.11229 5.42562 8.30622 5.50728C8.50015 5.58893 8.66545 5.72635 8.78116 5.90209C8.89687 6.07784 8.95778 6.28399 8.95615 6.4944C8.95397 6.77466 8.84111 7.04271 8.64216 7.24011C8.44321 7.43752 8.1743 7.54829 7.89402 7.54829ZM12.8341 0.492188H2.95393C2.29884 0.492188 1.67057 0.752424 1.20735 1.21565C0.744123 1.67887 0.483887 2.30714 0.483887 2.96223V12.0191C0.483887 12.6742 0.744123 13.3024 1.20735 13.7657C1.67057 14.2289 2.29884 14.4891 2.95393 14.4891H5.08641L7.30945 16.7204C7.38638 16.7967 7.47762 16.8571 7.57794 16.898C7.67825 16.939 7.78567 16.9598 7.89402 16.9592C8.09027 16.9592 8.28006 16.8891 8.4292 16.7616L11.0804 14.4891H12.8341C13.4892 14.4891 14.1175 14.2289 14.5807 13.7657C15.0439 13.3024 15.3042 12.6742 15.3042 12.0191V2.96223C15.3042 2.30714 15.0439 1.67887 14.5807 1.21565C14.1175 0.752424 13.4892 0.492188 12.8341 0.492188ZM13.6575 12.0191C13.6575 12.2374 13.5707 12.4469 13.4163 12.6013C13.2619 12.7557 13.0525 12.8424 12.8341 12.8424H10.7757C10.5795 12.8424 10.3897 12.9125 10.2406 13.04L7.93519 15.0161L6.00856 13.0812C5.93162 13.0049 5.84038 12.9445 5.74007 12.9035C5.63975 12.8626 5.53234 12.8418 5.42398 12.8424H2.95393C2.73557 12.8424 2.52615 12.7557 2.37174 12.6013C2.21733 12.4469 2.13058 12.2374 2.13058 12.0191V2.96223C2.13058 2.74387 2.21733 2.53445 2.37174 2.38004C2.52615 2.22563 2.73557 2.13888 2.95393 2.13888H12.8341C13.0525 2.13888 13.2619 2.22563 13.4163 2.38004C13.5707 2.53445 13.6575 2.74387 13.6575 2.96223V12.0191Z"
                                        fill="#79A1DE" />
                                </svg>
                            </div>
                            <div class="pl-2 inner-info">
                                <span class="inner-text-100">
                                    Combined Drive-time
                                </span>
                                <span class="inner-text-value">
                                    {{-- 6,561 HRS : 560 MNS --}}
                                    0
                                </span>
                            </div>
                        </div>
                        <div class="inner-vehicle-100 mt-2">
                            <div class="inner-shape bg-light-green">
                                <svg width="14" height="15" viewBox="0 0 15 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.64571 8.14933C10.0199 7.68163 10.2258 7.10159 10.2303 6.50263C10.2303 5.78421 9.94489 5.09521 9.43689 4.58721C8.92889 4.07921 8.23989 3.79382 7.52147 3.79382C6.80304 3.79382 6.11404 4.07921 5.60604 4.58721C5.09804 5.09521 4.81265 5.78421 4.81265 6.50263C4.81711 7.10159 5.02302 7.68163 5.39723 8.14933C4.66332 8.59595 4.08752 9.26099 3.75053 10.0513C3.70336 10.1515 3.67692 10.2603 3.67279 10.371C3.66866 10.4818 3.68692 10.5922 3.72648 10.6957C3.76604 10.7992 3.82609 10.8936 3.90302 10.9734C3.97996 11.0531 4.0722 11.1165 4.17422 11.1598C4.27624 11.203 4.38594 11.2252 4.49675 11.2251C4.60755 11.2249 4.71719 11.2024 4.81908 11.1589C4.92098 11.1153 5.01304 11.0517 5.08975 10.9717C5.16645 10.8917 5.22623 10.7971 5.26549 10.6935C5.45472 10.2511 5.76902 9.87368 6.16979 9.60747C6.57056 9.34127 7.04035 9.1979 7.52147 9.19498C8.00399 9.1963 8.47555 9.33892 8.87793 9.60522C9.28031 9.87152 9.59589 10.2498 9.78568 10.6935C9.84871 10.8423 9.95414 10.9693 10.0888 11.0586C10.2235 11.1479 10.3815 11.1956 10.5432 11.1957C10.6533 11.1937 10.7622 11.1713 10.8643 11.1299C11.065 11.0446 11.2238 10.8831 11.3056 10.6808C11.3874 10.4786 11.3856 10.2522 11.3006 10.0513C10.9615 9.25982 10.3827 8.59464 9.64571 8.14933ZM7.52147 7.54829C7.31105 7.54828 7.10538 7.48577 6.93054 7.3687C6.7557 7.25162 6.61957 7.08525 6.53943 6.8907C6.45929 6.69614 6.43874 6.48216 6.4804 6.27591C6.52205 6.06966 6.62403 5.88042 6.77339 5.73222C6.92276 5.58401 7.11278 5.48351 7.31935 5.44346C7.52592 5.40341 7.73973 5.42562 7.93366 5.50728C8.12759 5.58893 8.29289 5.72635 8.4086 5.90209C8.52431 6.07784 8.58522 6.28399 8.58359 6.4944C8.58141 6.77466 8.46855 7.04271 8.2696 7.24011C8.07065 7.43752 7.80174 7.54829 7.52147 7.54829ZM12.4616 0.492188H2.58137C1.92628 0.492188 1.29801 0.752424 0.834788 1.21565C0.371564 1.67887 0.111328 2.30714 0.111328 2.96223V12.0191C0.111328 12.6742 0.371564 13.3024 0.834788 13.7657C1.29801 14.2289 1.92628 14.4891 2.58137 14.4891H4.71385L6.93689 16.7204C7.01382 16.7967 7.10506 16.8571 7.20538 16.898C7.30569 16.939 7.41311 16.9598 7.52147 16.9592C7.71771 16.9592 7.9075 16.8891 8.05664 16.7616L10.7078 14.4891H12.4616C13.1167 14.4891 13.7449 14.2289 14.2081 13.7657C14.6714 13.3024 14.9316 12.6742 14.9316 12.0191V2.96223C14.9316 2.30714 14.6714 1.67887 14.2081 1.21565C13.7449 0.752424 13.1167 0.492188 12.4616 0.492188ZM13.2849 12.0191C13.2849 12.2374 13.1982 12.4469 13.0438 12.6013C12.8893 12.7557 12.6799 12.8424 12.4616 12.8424H10.4032C10.2069 12.8424 10.0172 12.9125 9.86801 13.04L7.56263 15.0161L5.636 13.0812C5.55906 13.0049 5.46782 12.9445 5.36751 12.9035C5.26719 12.8626 5.15978 12.8418 5.05142 12.8424H2.58137C2.36301 12.8424 2.15359 12.7557 1.99918 12.6013C1.84477 12.4469 1.75803 12.2374 1.75803 12.0191V2.96223C1.75803 2.74387 1.84477 2.53445 1.99918 2.38004C2.15359 2.22563 2.36301 2.13888 2.58137 2.13888H12.4616C12.6799 2.13888 12.8893 2.22563 13.0438 2.38004C13.1982 2.53445 13.2849 2.74387 13.2849 2.96223V12.0191Z"
                                        fill="#1FC105" />
                                </svg>
                            </div>
                            <div class="pl-3 inner-info">
                                <span class="inner-text-100">
                                    Total Assets Value
                                </span>
                                <span class="inner-text-value">₦
                                    <span class="counter">0</span>
                                </span>
                            </div>
                        </div>
                        <div class="base-thin-line"></div>

                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="right-side-home-2 border-none mt-2 h-auto ">
                        <div class="top-finance-heading pl-4 pr-2">
                            <span class="title-250 adjust-title">Maintenance Summary</span>
                        </div>
                        <div class="row">
                            <div
                                class="col-sm-6 col-md-6 col-lg-6 p-2 d-flex align-items-center justify-content-center">
                                <canvas id="myChart2" class="myChart-adjust"
                                    style="height:100%; width: 100%;"></canvas>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 d-flex flex-column justify-content-center">
                                <div>
                                    <span class="value-donut mb-3 mt-3">
                                        <div class="dot-100 mr-2 bg-green-400"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Active:</div>
                                            <div class="t-200">0</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-3">
                                        <div class="dot-100 mr-2 bg-gold-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Due Soon</div>
                                            <div class="t-200">0</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-3">
                                        <div class="dot-100 mr-2 bg-red-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Overdue</div>
                                            <div class="t-200">0</div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="base-thin-line-2"></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="right-side-home-2 border-none mt-2 h-auto ">
                        <div class="top-finance-heading pl-4 pr-2">
                            <span class="title-250 adjust-title">Document Status</span>
                        </div>
                        <div class="row">
                            <div
                                class="col-sm-6 col-md-6 col-lg-6 p-2 d-flex align-items-center justify-content-center">
                                <canvas id="myChart" class="myChart-adjust"
                                    style="height:100%; width: 100%;"></canvas>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 d-flex flex-column justify-content-center">
                                <div>
                                    <span class="value-donut mb-3 mt-3">
                                        <div class="dot-100 mr-2 bg-blue-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Active:</div>
                                            <div class="t-200">0</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-3">
                                        <div class="dot-100 mr-2 bg-gold-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Due Soon</div>
                                            <div class="t-200">0</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-3">
                                        <div class="dot-100 mr-2 bg-red-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Expired</div>
                                            <div class="t-200">0</div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
