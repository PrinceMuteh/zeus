<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light d-flex align-items-center" data-toggle="dropdown"
                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                {{-- <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle"> --}}
                <i class='bx bx-user userIcon'></i>
                <span class="pro-user-name text-dark ml-1">
                    {{ auth()->user()->first_name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome {{ auth()->user()->first_name }}!</h6>
                </div>

                <!-- item-->
                <a href="user-profile" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Profile</span>
                </a>
                <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="fe-log-out"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>

    </ul>
    <div class="logo-box d-flex pl-3">
        <a href="/" class="logo text-center">
            <div class="logo-lg d-flex justify-content-center align-items-center">
                <img src="{{ Auth()->user()->company_image }}" alt="" height="40" width="40"
                    style="border-radius: 5px" />
                <div class="ml-2">

                @if(Auth()->user()->email == "abang@onepipe.io")
                    <span class="text-inter logo-lg-text-light">ONE PIPE</span><br />
                @else
                    <span class="text-inter logo-lg-text-light">The Zeus</span><br />
                @endif
                  
                    <small class="m-0 text-light text-inter">Admin console</small>
                </div>
            </div>
            <span class="logo-sm">
                <img src="{{ Auth()->user()->company_image }}" alt="" height="28" />
            </span>
        </a>
    </div>

    <ul
        class="
        list-unstyled
        topnav-menu topnav-menu-left
        m-0
        d-flex
        align-items-center
      ">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu text-dark"></i>
            </button>
        </li>
    </ul>
</div>
