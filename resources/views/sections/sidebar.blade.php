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
                            <img src="{{ asset('assets/images/home.svg') }}" alt="" />
                            <span>Dashboard </span>
                    </a>
                    </li>
                @endif

                @if ($menu->userManagement == 1)
                    <li>
                        <a class="sideLink" href="/user-management">
                            <img src="{{ asset('assets/images/user.svg') }}" alt="" />
                            <span>User Management </span>
                        </a>
                    </li>
                @endif
                
                
                
               @if ($menu->technicalDesk?? "" == 1)
                    <li>
                        <a class="sideLink" href="/technical-desk">
                            <img src="{{ asset('assets/images/Lock.png') }}" alt="" />
                            
                            <span>Technical  Desk</span>
                             <span class="new">
                                BETA
                            </span>
                        </a>
                    </li>
                @endif    
                

                @if ($menu->vehicleManagement == 1)
                    <li>
                        <a class="sideLink" href="/vehicle-management">
                            <img src="{{ asset('assets/images/car.png') }}" alt="" />
                            <span>Vehicle Management</span>
                        </a>
                    </li>
                @endif

                @if ($menu->financeOffice == 1)
                    <li>
                        <a class="sideLink" href="/finance-office">
                            <img src="{{ asset('assets/images/eye.png') }}" alt="" />
                            <span>Finance Office</span>
                        </a>
                    </li>
                @endif

                @if ($menu->taskManagement == 1)
                <li>
                    <a class="sideLink" href="/task-management">
                        <img src="{{ asset('assets/images/arrow2.png') }}" alt="" />
                        <span>Task Management</span>
                    </a>
                </li>
                @endif
                
                

                @if ($menu->workShop == 1)
                <li>
                    <a class="sideLink" href="/workshop">
                        <img src="{{ asset('assets/images/arrow2.png') }}" alt="" />
                        <span>Workshop</span>
                    </a>
                </li>
                @endif


                @if ($menu->reportModule == 1)
                    <li>
                        <a class="sideLink" href="/report-module">
                            <img src="{{ asset('assets/images/file.png') }}" alt="" />
                            <span>Remittances</span>
                            {{-- Previous know as report module --}}
                        </a>
                    </li>
                @endif

                @if ($menu->activityLog == 1)
                    <li>
                    <a class="sideLink" href="/activity-log">
                        <img src="{{ asset('assets/images/activity.png') }}" alt="" />
                        <span>Activity Log</span>
                    </a>
                </li>
                @endif
                @if ($menu->adminOffice == 1)
                    <li>
                        <a class="sideLink" href="/admin">
                            <img src="{{ asset('assets/images/admin.png') }}" alt="" />
                            <span>Admin Office</span>
                        </a>
                    </li>
                @endif

               @if ($menu->controlPanel == 1)
                    <li>
                        <a class="sideLink" href="/control-panel">
                            <img src="{{ asset('assets/images/control.png') }}" alt="" />
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
