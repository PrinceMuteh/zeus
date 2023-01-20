<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            @php
                $menu = json_decode(auth()->user()->menu_permission);
            @endphp

            <ul class="metismenu" id="side-menu">
                @if ($menu->dashboard == 1)
                    <li>
                        <a href="/" class="sideLink active" aria-current="page">
                            {{-- <img src="{{ asset('assets/images/home.svg') }}" alt="" /> --}}
                            <span class="mr-2">
                                <svg width="18" height="18" viewBox="0 0 24 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.2386 3.46404C12.9876 2.26362 11.0124 2.26362 9.76139 3.46404L3.11313 9.84343C2.95024 9.99973 2.84067 10.2033 2.79995 10.4254C2.00366 14.7678 1.94488 19.2134 2.62609 23.5754L2.78778 24.6108H7.06499V15.685C7.06499 15.0898 7.54752 14.6073 8.14275 14.6073H15.8572C16.4525 14.6073 16.935 15.0898 16.935 15.685V24.6108H21.2122L21.3739 23.5754C22.0551 19.2134 21.9963 14.7678 21.2 10.4254C21.1593 10.2033 21.0498 9.99973 20.8869 9.84343L14.2386 3.46404ZM8.26898 1.90873C10.354 -0.0919731 13.646 -0.0919731 15.731 1.90873L22.3793 8.28812C22.8687 8.75773 23.1979 9.36945 23.3202 10.0366C24.1602 14.6173 24.2222 19.3067 23.5036 23.908L23.2439 25.5713C23.1364 26.2592 22.544 26.7663 21.8478 26.7663H15.8572C15.262 26.7663 14.7795 26.2838 14.7795 25.6885V16.7628H9.22051V25.6885C9.22051 26.2838 8.73798 26.7663 8.14275 26.7663H2.15223C1.45602 26.7663 0.86356 26.2592 0.756136 25.5713L0.496378 23.908C-0.222198 19.3067 -0.160195 14.6173 0.679783 10.0366C0.80212 9.36945 1.13132 8.75773 1.62072 8.28812L8.26898 1.90873Z"
                                        fill="#FF6600" />
                                </svg>
                            </span>

                            <span>Dashboard </span>
                        </a>
                    </li>
                @endif

                @if ($menu->userManagement == 1)
                    <li>
                        <a class="sideLink" href="/user-management">
                            <span class="mr-2">
                                <svg width="18" height="18" viewBox="0 0 28 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.94727 6.0074C4.94727 2.68961 7.63688 0 10.9547 0C14.2725 0 16.9621 2.68961 16.9621 6.0074C16.9621 9.3252 14.2725 12.0148 10.9547 12.0148C7.63688 12.0148 4.94727 9.3252 4.94727 6.0074ZM10.9547 2.12026C8.80786 2.12026 7.06753 3.86059 7.06753 6.0074C7.06753 8.15421 8.80786 9.89454 10.9547 9.89454C13.1015 9.89454 14.8418 8.15421 14.8418 6.0074C14.8418 3.86059 13.1015 2.12026 10.9547 2.12026Z"
                                        fill="#FF6600" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 19.4357C0 16.5082 2.37318 14.1351 5.30065 14.1351H5.78247C6.04325 14.1351 6.30239 14.1763 6.55029 14.2572L7.7737 14.6567C9.84065 15.3316 12.0687 15.3316 14.1356 14.6567L15.3591 14.2572C15.607 14.1763 15.8661 14.1351 16.1269 14.1351H16.6087C19.5362 14.1351 21.9093 16.5082 21.9093 19.4357V21.1154C21.9093 22.1801 21.1377 23.0879 20.087 23.2594C14.0388 24.2469 7.87054 24.2469 1.82239 23.2594C0.77161 23.0879 0 22.18 0 21.1154V19.4357ZM5.30065 16.2553C3.54417 16.2553 2.12026 17.6792 2.12026 19.4357V21.1154C2.12026 21.1409 2.13879 21.1627 2.16404 21.1669C7.98592 22.1174 13.9234 22.1174 19.7453 21.1669C19.7706 21.1627 19.7891 21.1409 19.7891 21.1154V19.4357C19.7891 17.6792 18.3652 16.2553 16.6087 16.2553H16.1269C16.0896 16.2553 16.0526 16.2612 16.0172 16.2728L14.7938 16.6723C12.2992 17.4868 9.61016 17.4868 7.11557 16.6723L5.89216 16.2728C5.85674 16.2612 5.81972 16.2553 5.78247 16.2553H5.30065Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M22.9695 4.24052C23.555 4.24052 24.0296 4.71515 24.0296 5.30065V7.77428H26.5032C27.0887 7.77428 27.5634 8.24892 27.5634 8.83441C27.5634 9.41991 27.0887 9.89454 26.5032 9.89454H24.0296V12.3682C24.0296 12.9537 23.555 13.4283 22.9695 13.4283C22.384 13.4283 21.9093 12.9537 21.9093 12.3682V9.89454H19.4357C18.8502 9.89454 18.3756 9.41991 18.3756 8.83441C18.3756 8.24892 18.8502 7.77428 19.4357 7.77428H21.9093V5.30065C21.9093 4.71515 22.384 4.24052 22.9695 4.24052Z"
                                        fill="#FF6600" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/user.svg') }}" alt="" /> --}}
                            <span>User Management </span>
                        </a>
                    </li>
                @endif

                @if ($menu->vehicleManagement == 1)
                    <li>
                        <a class="sideLink" href="/vehicle-management">
                            <span class="mr-2">
                                <svg width="18" height="15" viewBox="0 0 30 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 10H29" stroke="#FF6600" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M27 17V21C27 21.2652 26.8946 21.5196 26.7071 21.7071C26.5196 21.8946 26.2652 22 26 22H23C22.7348 22 22.4804 21.8946 22.2929 21.7071C22.1054 21.5196 22 21.2652 22 21V17"
                                        stroke="#FF6600" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8 17V21C8 21.2652 7.89464 21.5196 7.70711 21.7071C7.51957 21.8946 7.26522 22 7 22H4C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21V17"
                                        stroke="#FF6600" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M27 10L23.2639 1.59386C23.1854 1.4171 23.0572 1.26691 22.895 1.16151C22.7328 1.0561 22.5436 1 22.3501 1H7.64987C7.45644 1 7.26716 1.0561 7.10496 1.16151C6.94277 1.26691 6.81463 1.4171 6.73606 1.59386L3 10V17H27V10Z"
                                        stroke="#FF6600" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/car.png') }}" alt="" /> --}}
                            <span>Vehicle Management</span>
                        </a>
                    </li>
                @endif

                @if ($menu->vehicleManagement == 1)
                    <li>
                        <a class="sideLink" href="/technical-desk">
                            <span class="mr-2">
                                <svg width="20" height="20" viewBox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.9113 9.69434H5.95337C5.48509 9.69434 5.10547 10.074 5.10547 10.5422V22.4128C5.10547 22.8811 5.48509 23.2607 5.95337 23.2607H22.9113C23.3796 23.2607 23.7592 22.8811 23.7592 22.4128V10.5422C23.7592 10.074 23.3796 9.69434 22.9113 9.69434Z"
                                        stroke="#FF6600" stroke-width="1.6958" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M10.6172 9.69456V5.87902C10.6172 4.86707 11.0192 3.89658 11.7347 3.18102C12.4503 2.46547 13.4208 2.06348 14.4327 2.06348C15.4447 2.06348 16.4152 2.46547 17.1307 3.18102C17.8463 3.89658 18.2483 4.86707 18.2483 5.87902V9.69456"
                                        stroke="#FF6600" stroke-width="1.6958" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M14.432 17.7488C15.1344 17.7488 15.7039 17.1793 15.7039 16.4769C15.7039 15.7745 15.1344 15.2051 14.432 15.2051C13.7296 15.2051 13.1602 15.7745 13.1602 16.4769C13.1602 17.1793 13.7296 17.7488 14.432 17.7488Z"
                                        fill="#FF6600" />
                                </svg>


                            </span>
                            {{-- <img src="{{ asset('assets/images/sidecar.png') }}" style="height: 20px" alt="" /> --}}

                            <span class="mr-2">Technical Desk</span>
                            <span class="new">
                                BETA
                            </span>
                        </a>
                    </li>
                @endif

                <li>
                    <a class="sideLink" href="/account-officer">
                        <span class="mr-2">
                            <svg width="17" height="20" viewBox="0 0 20 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.4353 9.69889C19.3358 9.50148 19.1836 9.33548 18.9956 9.21928C18.8075 9.10307 18.591 9.04121 18.3699 9.04053H12.3849V1.85852C12.3978 1.596 12.3239 1.33655 12.1746 1.12021C12.0253 0.903878 11.809 0.742688 11.559 0.661523C11.3187 0.582452 11.0595 0.581564 10.8186 0.658984C10.5777 0.736405 10.3676 0.888153 10.2184 1.09244L0.64234 14.2595C0.52236 14.4329 0.450316 14.6349 0.4335 14.8451C0.416684 15.0553 0.455694 15.2662 0.54658 15.4565C0.630277 15.674 0.775672 15.8624 0.96492 15.9985C1.15417 16.1346 1.37903 16.2125 1.61191 16.2225H7.59692V23.4046C7.59711 23.657 7.67708 23.9029 7.82542 24.1071C7.97376 24.3113 8.18287 24.4635 8.42285 24.5417C8.54312 24.579 8.66804 24.5991 8.79392 24.6016C8.98279 24.6021 9.1691 24.5578 9.33761 24.4725C9.50612 24.3872 9.65206 24.2633 9.76349 24.1108L19.3395 10.9438C19.4685 10.7652 19.5457 10.5544 19.5626 10.3348C19.5795 10.1152 19.5354 9.89511 19.4353 9.69889ZM9.99092 19.7178V15.0255C9.99092 14.7081 9.86481 14.4036 9.64033 14.1791C9.41585 13.9547 9.11139 13.8285 8.79392 13.8285H4.00592L9.99092 5.54529V10.2375C9.99092 10.555 10.117 10.8595 10.3415 11.0839C10.566 11.3084 10.8705 11.4345 11.1879 11.4345H15.9759L9.99092 19.7178Z"
                                    fill="#FF6600" />
                            </svg>


                        </span>
                        {{-- <img src="{{ asset('assets/images/car.png') }}" alt="" /> --}}
                        <span>Account Officer</span>
                    </a>
                </li>
                @if ($menu->financeOffice == 1)
                    <li>
                        <a class="sideLink" href="/finance-office">
                            <span class="mr-2">
                                <svg width="20" height="20" viewBox="0 0 27 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.0988 10.7698C17.0988 9.71937 17.9504 8.8678 19.0009 8.8678C20.0514 8.8678 20.9029 9.71937 20.9029 10.7698C20.9029 11.8203 20.0514 12.6719 19.0009 12.6719C17.9504 12.6719 17.0988 11.8203 17.0988 10.7698Z"
                                        fill="#FF5500" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M23.3646 4.01633C22.5306 2.05637 20.6876 0.647428 18.4945 0.416648L17.6679 0.329666C13.4932 -0.109648 9.28236 -0.0806783 5.11403 0.416036L4.56631 0.481304C2.45023 0.733464 0.773566 2.38674 0.491712 4.49908C-0.0636436 8.66116 -0.0636436 12.8786 0.491712 17.0406C0.773566 19.153 2.45023 20.8063 4.56631 21.0584L5.11403 21.1237C9.28236 21.6204 13.4932 21.6494 17.6679 21.2101L18.4945 21.1231C20.6876 20.8923 22.5306 19.4834 23.3646 17.5234C24.6824 17.131 25.6882 15.9886 25.8533 14.577C26.1492 12.0475 26.1492 9.4922 25.8533 6.96276C25.6882 5.55115 24.6824 4.40868 23.3646 4.01633ZM17.4689 2.22127C13.4352 1.7968 9.3666 1.82479 5.33909 2.30472L4.79138 2.36999C3.53753 2.5194 2.54406 3.49902 2.37705 4.75064C1.84398 8.74576 1.84398 12.794 2.37705 16.7891C2.54406 18.0407 3.53753 19.0203 4.79138 19.1697L5.33909 19.235C9.3666 19.7149 13.4352 19.7429 17.4689 19.3185L18.2955 19.2315C19.374 19.118 20.3283 18.5864 20.9896 17.7972C19.0772 17.9088 17.1394 17.8589 15.2497 17.6477C13.6401 17.4678 12.3384 16.2004 12.1485 14.577C11.8527 12.0475 11.8527 9.4922 12.1485 6.96275C12.3384 5.33934 13.6401 4.07189 15.2497 3.892C17.1394 3.6808 19.0772 3.63097 20.9896 3.74249C20.3283 2.95336 19.374 2.42175 18.2955 2.30825L17.4689 2.22127ZM21.8887 5.71636C21.8895 5.72123 21.8902 5.7261 21.891 5.73097L21.8986 5.78028L22.1505 5.74116C22.2809 5.75406 22.411 5.76776 22.5408 5.78228C23.2857 5.86553 23.8788 6.45407 23.9641 7.18371C24.2428 9.56636 24.2428 11.9734 23.9641 14.356C23.8788 15.0856 23.2857 15.6742 22.5408 15.7574C22.411 15.772 22.2808 15.7857 22.1505 15.7986L21.8986 15.7594L21.891 15.8088C21.8902 15.8136 21.8895 15.8185 21.8887 15.8234C19.7601 16.0159 17.5771 15.994 15.461 15.7574C14.7161 15.6742 14.123 15.0856 14.0377 14.356C13.759 11.9734 13.759 9.56636 14.0377 7.18371C14.123 6.45407 14.7161 5.86553 15.461 5.78228C17.5771 5.54577 19.7601 5.5238 21.8887 5.71636Z"
                                        fill="#FF5500" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/eye.png') }}" alt="" /> --}}
                            <span>Finance Office</span>
                        </a>
                    </li>
                @endif

                @if ($menu->taskManagement == 1)
                    <li>
                        <a class="sideLink" href="/task-management">
                            <span class="mr-2">
                                <svg width="20" height="20" viewBox="0 0 26 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.4204 16.6794C6.41006 17.1094 6.69371 17.4912 7.10833 17.6054C7.52295 17.7196 7.96209 17.537 8.17339 17.1624L9.30077 15.1639C10.6378 12.7937 13.2993 11.4952 15.9903 11.9002L16.1768 11.9283C16.2104 12.7752 16.258 13.6218 16.3196 14.4675L16.4044 15.6303C16.4733 16.5759 17.5277 17.1045 18.3266 16.594C20.9476 14.9193 23.226 12.7614 25.0406 10.2353L25.6105 9.442C25.8452 9.1153 25.8452 8.67527 25.6105 8.34857L25.0406 7.55525C23.226 5.02918 20.9476 2.87128 18.3266 1.19657C17.5277 0.686068 16.4733 1.21467 16.4044 2.16027L16.3196 3.32305C16.2699 4.00491 16.2294 4.68727 16.1979 5.36994L14.9257 5.36994C10.3469 5.36994 6.60447 9.02345 6.49442 13.601L6.4204 16.6794ZM16.2692 10.0469C13.2464 9.59198 10.2525 10.8089 8.39792 13.1559C8.72479 9.82848 11.5294 7.24411 14.9257 7.24411L17.0981 7.24411C17.6032 7.24411 18.0174 6.84383 18.0347 6.33906C18.0675 5.37849 18.1189 4.41839 18.1888 3.45931L18.1956 3.36628C20.249 4.81771 22.0486 6.60241 23.5185 8.64868L23.6956 8.89529L23.5185 9.14189C22.0486 11.1882 20.249 12.9729 18.1956 14.4243L18.1888 14.3313C18.1102 13.2519 18.0549 12.1712 18.0232 11.0901C18.0099 10.637 17.6742 10.2584 17.226 10.1909L16.2692 10.0469Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M21.9024 19.6289C22.0498 18.369 22.1538 17.1054 22.2145 15.8402C22.221 15.7033 22.2831 15.575 22.3859 15.4842C22.8399 15.0835 23.2798 14.667 23.7048 14.2356C23.8647 14.0734 24.144 14.1868 24.1391 14.4145C24.1001 16.2286 23.975 18.0414 23.7639 19.8466C23.4683 22.3736 21.4388 24.354 18.9249 24.635C14.5936 25.1191 10.1164 25.1191 5.7851 24.635C3.27115 24.354 1.24163 22.3736 0.946074 19.8466C0.428132 15.4182 0.428132 10.9445 0.946074 6.5161C1.24163 3.98906 3.27115 2.00868 5.7851 1.72771C8.64755 1.40778 11.5737 1.29929 14.4794 1.40223C14.724 1.41089 14.8924 1.65039 14.8619 1.89327C14.8556 1.94385 14.8505 1.99501 14.8467 2.04673L14.7827 2.92611C14.7679 3.12801 14.5956 3.28162 14.3933 3.27452C11.5857 3.17602 8.75804 3.28127 5.99327 3.59028C4.33138 3.77602 3.00011 5.08745 2.80755 6.73381C2.30653 11.0176 2.30653 15.3451 2.80755 19.6289C3.00011 21.2752 4.33138 22.5867 5.99327 22.7724C10.1862 23.241 14.5238 23.241 18.7167 22.7724C20.3786 22.5867 21.7099 21.2752 21.9024 19.6289Z"
                                        fill="#FF6600" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/arrow2.png') }}" alt="" /> --}}
                            <span>Task Management</span>
                        </a>
                    </li>
                @endif

                @if ($menu->workShop == 1)
                    <li>
                        <a class="sideLink" href="/workshop">
                            <span class="mr-2">
                                <svg width="20" height="20" viewBox="0 0 26 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.4204 16.6794C6.41006 17.1094 6.69371 17.4912 7.10833 17.6054C7.52295 17.7196 7.96209 17.537 8.17339 17.1624L9.30077 15.1639C10.6378 12.7937 13.2993 11.4952 15.9903 11.9002L16.1768 11.9283C16.2104 12.7752 16.258 13.6218 16.3196 14.4675L16.4044 15.6303C16.4733 16.5759 17.5277 17.1045 18.3266 16.594C20.9476 14.9193 23.226 12.7614 25.0406 10.2353L25.6105 9.442C25.8452 9.1153 25.8452 8.67527 25.6105 8.34857L25.0406 7.55525C23.226 5.02918 20.9476 2.87128 18.3266 1.19657C17.5277 0.686068 16.4733 1.21467 16.4044 2.16027L16.3196 3.32305C16.2699 4.00491 16.2294 4.68727 16.1979 5.36994L14.9257 5.36994C10.3469 5.36994 6.60447 9.02345 6.49442 13.601L6.4204 16.6794ZM16.2692 10.0469C13.2464 9.59198 10.2525 10.8089 8.39792 13.1559C8.72479 9.82848 11.5294 7.24411 14.9257 7.24411L17.0981 7.24411C17.6032 7.24411 18.0174 6.84383 18.0347 6.33906C18.0675 5.37849 18.1189 4.41839 18.1888 3.45931L18.1956 3.36628C20.249 4.81771 22.0486 6.60241 23.5185 8.64868L23.6956 8.89529L23.5185 9.14189C22.0486 11.1882 20.249 12.9729 18.1956 14.4243L18.1888 14.3313C18.1102 13.2519 18.0549 12.1712 18.0232 11.0901C18.0099 10.637 17.6742 10.2584 17.226 10.1909L16.2692 10.0469Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M21.9024 19.6289C22.0498 18.369 22.1538 17.1054 22.2145 15.8402C22.221 15.7033 22.2831 15.575 22.3859 15.4842C22.8399 15.0835 23.2798 14.667 23.7048 14.2356C23.8647 14.0734 24.144 14.1868 24.1391 14.4145C24.1001 16.2286 23.975 18.0414 23.7639 19.8466C23.4683 22.3736 21.4388 24.354 18.9249 24.635C14.5936 25.1191 10.1164 25.1191 5.7851 24.635C3.27115 24.354 1.24163 22.3736 0.946074 19.8466C0.428132 15.4182 0.428132 10.9445 0.946074 6.5161C1.24163 3.98906 3.27115 2.00868 5.7851 1.72771C8.64755 1.40778 11.5737 1.29929 14.4794 1.40223C14.724 1.41089 14.8924 1.65039 14.8619 1.89327C14.8556 1.94385 14.8505 1.99501 14.8467 2.04673L14.7827 2.92611C14.7679 3.12801 14.5956 3.28162 14.3933 3.27452C11.5857 3.17602 8.75804 3.28127 5.99327 3.59028C4.33138 3.77602 3.00011 5.08745 2.80755 6.73381C2.30653 11.0176 2.30653 15.3451 2.80755 19.6289C3.00011 21.2752 4.33138 22.5867 5.99327 22.7724C10.1862 23.241 14.5238 23.241 18.7167 22.7724C20.3786 22.5867 21.7099 21.2752 21.9024 19.6289Z"
                                        fill="#FF6600" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/arrow2.png') }}" alt="" /> --}}
                            <span>Workshop</span>
                        </a>
                    </li>
                @endif


                @if ($menu->reportModule == 1)
                    <li>
                        <a class="sideLink" href="/report-module">
                            <span class="mr-2">
                                <svg width="20" height="22" viewBox="0 0 24 31" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.8065 17.1432C17.8065 16.5018 17.2865 15.9819 16.6452 15.9819H7.35484C6.71348 15.9819 6.19355 16.5018 6.19355 17.1432C6.19355 17.7846 6.71348 18.3045 7.35484 18.3045H16.6452C17.2865 18.3045 17.8065 17.7846 17.8065 17.1432Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M17.8065 23.3368C17.8065 22.6954 17.2865 22.1755 16.6452 22.1755H7.35484C6.71348 22.1755 6.19355 22.6954 6.19355 23.3368C6.19355 23.9781 6.71348 24.498 7.35484 24.498H16.6452C17.2865 24.498 17.8065 23.9781 17.8065 23.3368Z"
                                        fill="#FF6600" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.25806 0.498047C1.9064 0.498047 0 2.40445 0 4.75611V26.4335C0 28.7852 1.9064 30.6916 4.25806 30.6916H19.7419C22.0936 30.6916 24 28.7852 24 26.4335V9.35119C24 8.76161 23.8077 8.18812 23.4523 7.71771L18.8106 1.57424C18.2984 0.896444 17.4981 0.498047 16.6486 0.498047H4.25806ZM2.32258 4.75611C2.32258 3.68717 3.18913 2.82063 4.25806 2.82063H15.4839V9.62896C15.4839 10.2703 16.0038 10.7902 16.6452 10.7902H21.6774V26.4335C21.6774 27.5025 20.8109 28.369 19.7419 28.369H4.25806C3.18913 28.369 2.32258 27.5025 2.32258 26.4335V4.75611Z"
                                        fill="#FF6600" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/file.png') }}" alt="" /> --}}
                            <span>Report Module</span>
                        </a>
                    </li>
                @endif

                @if ($menu->activityLog == 1)
                    <li>
                        <a class="sideLink" href="/activity-log">
                            <span class="mr-2">
                                <svg width="20" height="20" viewBox="0 0 27 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.28724 8.3071C6.22813 8.3071 5.36955 9.16568 5.36955 10.2248C5.36955 11.2839 6.22813 12.1425 7.28724 12.1425C8.34636 12.1425 9.20494 11.2839 9.20494 10.2248C9.20494 9.16568 8.34636 8.3071 7.28724 8.3071Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M13.4239 8.3071C12.3648 8.3071 11.5062 9.16568 11.5062 10.2248C11.5062 11.2839 12.3648 12.1425 13.4239 12.1425C14.483 12.1425 15.3416 11.2839 15.3416 10.2248C15.3416 9.16568 14.483 8.3071 13.4239 8.3071Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M17.6428 10.2248C17.6428 9.16568 18.5014 8.3071 19.5605 8.3071C20.6196 8.3071 21.4782 9.16568 21.4782 10.2248C21.4782 11.2839 20.6196 12.1425 19.5605 12.1425C18.5014 12.1425 17.6428 11.2839 17.6428 10.2248Z"
                                        fill="#FF6600" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.715 0.77867C15.5817 0.426183 11.4268 0.405727 7.29022 0.717499L6.99377 0.739842C3.04899 1.03716 0 4.32459 0 8.28057V21.3474C0 21.7522 0.212735 22.1273 0.560195 22.335C0.907655 22.5427 1.33871 22.5526 1.6953 22.361L7.69507 19.1366C7.97415 18.9866 8.28604 18.9081 8.60287 18.9081H22.3741C24.1109 18.9081 25.5993 17.6664 25.9106 15.9577C26.5416 12.4948 26.5914 8.95092 26.0581 5.47159L25.901 4.44627C25.6148 2.57959 24.0877 1.15157 22.2061 0.991107L19.715 0.77867ZM7.46317 3.01222C11.4771 2.7097 15.5088 2.72955 19.5195 3.07158L22.0105 3.28402C22.8334 3.35419 23.5012 3.97865 23.6263 4.79494L23.7835 5.82026C24.2781 9.04702 24.2318 12.3336 23.6467 15.5452C23.5346 16.1601 22.9991 16.6069 22.3741 16.6069H8.60287C7.90585 16.6069 7.21968 16.7796 6.6057 17.1095L2.30123 19.4228V8.28057C2.30123 5.52844 4.42238 3.24141 7.16673 3.03457L7.46317 3.01222Z"
                                        fill="#FF6600" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/activity.png') }}" alt="" /> --}}
                            <span>Activity Log</span>
                        </a>
                    </li>
                @endif
                @if ($menu->adminOffice == 1)
                    <li>
                        <a class="sideLink" href="/admin">
                            <span class="mr-2">
                                <svg width="22" height="20" viewBox="0 0 24 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.1775 0.621599C11.7134 0.456863 12.2866 0.456863 12.8225 0.621599L17.0215 1.91215C19.212 2.58542 21.2924 3.57528 23.1966 4.85034C24.6777 5.84207 23.9757 8.15231 22.1932 8.15231H1.80678C0.0243205 8.15231 -0.677718 5.84207 0.803365 4.85034C2.70758 3.57528 4.78796 2.58542 6.97852 1.91215L11.1775 0.621599ZM12.2028 2.63801C12.0707 2.59739 11.9294 2.59739 11.7972 2.63801L7.59827 3.92856C5.93766 4.43894 4.34662 5.1492 2.85982 6.04282H21.1402C19.6534 5.1492 18.0623 4.43894 16.4017 3.92855L12.2028 2.63801Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M1.10093 26.7862C1.10093 26.2037 1.57316 25.7315 2.15568 25.7315H21.8443C22.4269 25.7315 22.8991 26.2037 22.8991 26.7862C22.8991 27.3687 22.4269 27.841 21.8443 27.841H2.15568C1.57316 27.841 1.10093 27.3687 1.10093 26.7862Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M3.91359 21.1609C3.91359 21.7434 4.38582 22.2156 4.96834 22.2156C5.55087 22.2156 6.02309 21.7434 6.02309 21.1609L6.02309 12.7229C6.02309 12.1404 5.55087 11.6681 4.96834 11.6681C4.38582 11.6681 3.91359 12.1404 3.91359 12.7229L3.91359 21.1609Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M12 22.2156C11.4175 22.2156 10.9453 21.7434 10.9453 21.1609L10.9453 12.7229C10.9453 12.1404 11.4175 11.6681 12 11.6681C12.5825 11.6681 13.0548 12.1404 13.0548 12.7229V21.1609C13.0548 21.7434 12.5825 22.2156 12 22.2156Z"
                                        fill="#FF6600" />
                                    <path
                                        d="M17.9769 21.1609C17.9769 21.7434 18.4491 22.2156 19.0317 22.2156C19.6142 22.2156 20.0864 21.7434 20.0864 21.1609V12.7229C20.0864 12.1404 19.6142 11.6681 19.0317 11.6681C18.4491 11.6681 17.9769 12.1404 17.9769 12.7229V21.1609Z"
                                        fill="#FF6600" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/admin.png') }}" alt="" /> --}}
                            <span>Admin Office</span>
                        </a>
                    </li>
                @endif

                @if ($menu->controlPanel == 1)
                    <li>
                        <a class="sideLink" href="/control-panel">
                            <span class="mr-2">
                                <svg width="18" height="18" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.95873 2.60817C6.28905 2.42156 4.56068 2.42156 2.89101 2.60817C2.4853 2.65352 2.16534 2.97477 2.11971 3.36494C1.92032 5.06972 1.92032 6.79192 2.11971 8.4967C2.16534 8.88687 2.4853 9.20812 2.89101 9.25346C4.56068 9.44007 6.28905 9.44007 7.95873 9.25346C8.36444 9.20812 8.68439 8.88687 8.73003 8.4967C8.92941 6.79192 8.92941 5.06972 8.73003 3.36494C8.68439 2.97477 8.36444 2.65352 7.95873 2.60817ZM2.67217 0.650196C4.48729 0.447331 6.36245 0.447331 8.17756 0.650196C9.47898 0.795648 10.5329 1.82012 10.6869 3.13607C10.904 4.99291 10.904 6.86873 10.6869 8.72556C10.5329 10.0415 9.47898 11.066 8.17756 11.2114C6.36245 11.4143 4.48729 11.4143 2.67217 11.2114C1.37076 11.066 0.316793 10.0415 0.16288 8.72556C-0.0542934 6.86873 -0.0542934 4.99291 0.16288 3.13607C0.316793 1.82012 1.37076 0.795648 2.67217 0.650196Z"
                                        fill="#FF6600" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.95873 15.7426C6.28905 15.556 4.56068 15.556 2.89101 15.7426C2.4853 15.788 2.16534 16.1092 2.11971 16.4994C1.92032 18.2042 1.92032 19.9264 2.11971 21.6312C2.16534 22.0213 2.4853 22.3426 2.89101 22.3879C4.56068 22.5745 6.28905 22.5745 7.95873 22.3879C8.36444 22.3426 8.68439 22.0213 8.73003 21.6312C8.92941 19.9264 8.92941 18.2042 8.73003 16.4994C8.68439 16.1092 8.36444 15.788 7.95873 15.7426ZM2.67217 13.7847C4.48729 13.5818 6.36245 13.5818 8.17756 13.7847C9.47898 13.9301 10.5329 14.9546 10.6869 16.2705C10.904 18.1274 10.904 20.0032 10.6869 21.86C10.5329 23.176 9.47898 24.2004 8.17756 24.3459C6.36245 24.5488 4.48729 24.5488 2.67217 24.3459C1.37076 24.2004 0.316793 23.176 0.16288 21.86C-0.0542934 20.0032 -0.0542934 18.1274 0.16288 16.2705C0.316793 14.9546 1.37076 13.9301 2.67217 13.7847Z"
                                        fill="#FF6600" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21.0932 2.60817C19.4235 2.42156 17.6951 2.42156 16.0255 2.60817C15.6198 2.65352 15.2998 2.97477 15.2542 3.36494C15.0548 5.06972 15.0548 6.79192 15.2542 8.4967C15.2998 8.88687 15.6198 9.20812 16.0255 9.25346C17.6951 9.44007 19.4235 9.44007 21.0932 9.25346C21.4989 9.20812 21.8188 8.88687 21.8645 8.4967C22.0639 6.79192 22.0639 5.06972 21.8645 3.36494C21.8188 2.97477 21.4989 2.65352 21.0932 2.60817ZM15.8066 0.650196C17.6217 0.447331 19.4969 0.447331 21.312 0.650196C22.6134 0.795648 23.6674 1.82012 23.8213 3.13607C24.0385 4.99291 24.0385 6.86873 23.8213 8.72556C23.6674 10.0415 22.6134 11.066 21.312 11.2114C19.4969 11.4143 17.6217 11.4143 15.8066 11.2114C14.5052 11.066 13.4512 10.0415 13.2973 8.72556C13.0802 6.86873 13.0802 4.99291 13.2973 3.13607C13.4512 1.82012 14.5052 0.795648 15.8066 0.650196Z"
                                        fill="#FF6600" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21.0932 15.7426C19.4235 15.556 17.6951 15.556 16.0255 15.7426C15.6198 15.788 15.2998 16.1092 15.2542 16.4994C15.0548 18.2042 15.0548 19.9264 15.2542 21.6312C15.2998 22.0213 15.6198 22.3426 16.0255 22.3879C17.6951 22.5745 19.4235 22.5745 21.0932 22.3879C21.4989 22.3426 21.8188 22.0213 21.8645 21.6312C22.0639 19.9264 22.0639 18.2042 21.8645 16.4994C21.8188 16.1092 21.4989 15.788 21.0932 15.7426ZM15.8066 13.7847C17.6217 13.5818 19.4969 13.5818 21.312 13.7847C22.6134 13.9301 23.6674 14.9546 23.8213 16.2705C24.0385 18.1274 24.0385 20.0032 23.8213 21.86C23.6674 23.176 22.6134 24.2004 21.312 24.3459C19.4969 24.5488 17.6217 24.5488 15.8066 24.3459C14.5052 24.2004 13.4512 23.176 13.2973 21.86C13.0802 20.0032 13.0802 18.1274 13.2973 16.2705C13.4512 14.9546 14.5052 13.9301 15.8066 13.7847Z"
                                        fill="#FF6600" />
                                </svg>

                            </span>
                            {{-- <img src="{{ asset('assets/images/control.png') }}" alt="" /> --}}
                            <span>Control Panel</span>
                        </a>
                    </li>
                @endif

            </ul>
            <a class="baseExit" href="/user-profile">
                <li class="footer-profile">
                    <div class="leftBase">
                        <img src="{{ Auth()->user()->image }}" alt="" />
                    </div>
                    <span class="admin-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                </li>
            </a>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>