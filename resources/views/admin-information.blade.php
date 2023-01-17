@extends('main')
@section('content')
    <style>
        div.scroll {
            margin: 4px, 4px;
            padding: 4px;
            /* background-color: green; */
            /* width: 500px; */
            height: 300px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: justify;
        }
    </style>
    <title>Zeus | Admin Information</title>
    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <form action="{{ route('updateUserProfile') }}" method="post">
                @csrf
                <input type="hidden" name="id" value = "{{$user->id}}">
                <div class="container-fluid">
                    <div class="top-row mb-1">
                        <div>
                            <h3 class=" pb-0 pl-0 h3">Admin Information</h3>
                        </div>
                    </div>
                    <div class="bannrBox">
                        <div class="row">
                            <div class="col-sm-6 col-md-2">
                                <div class="box-col">
                                    <div class="avatar">
                                        <img src="{{ $user->image }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="box-col align-items-start p-2">
                                    <p class="staff-name">{{ $user->first_name }} {{ $user->last_name }}</p>
                                    <p class="staff-id">User ID: #{{ $user->id * 999999 }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="box-col flex-row">
                                    <select name="status" class="selectBtn form-control form-select infoInput mr-1">
                                        @if ($user->status == '1')
                                            <option value="Active">ACTIVE</option>
                                            <option value="Inactive">DISABLE</option>
                                        @else
                                            <option value="Inactive">DISABLE</option>
                                            <option value="Active">ACTIVE</option>
                                        @endif
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-lg">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row info-section ">
                        <div class="col-md-6">
                            <div class="row ">
                                <div class="col">
                                    <h4>Assigned vehicle Type</h4>
                                </div>
                                <div class="col">
                                    <a href="" data-toggle="modal" data-target="#modelId"
                                        class="btn btn-sm btn-secondary">Assign More </a>
                                </div>
                            </div>
                            <hr>

                            <div>
                                @if (Auth()->user()->user_type == 'SUPER' && count($vehicletype) < 1)
                                    <div class="row">
                                        <div class="permit mb-1 p-1">
                                            <div class="equal">
                                                <svg width="12" height="7" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.00039 0.898438C0.530949 0.898438 0.150391 1.279 0.150391 1.74844C0.150391 2.21788 0.530949 2.59844 1.00039 2.59844H7.00039H13.0004C13.4698 2.59844 13.8504 2.21788 13.8504 1.74844C13.8504 1.279 13.4698 0.898438 13.0004 0.898438H7.00039H1.00039ZM1.00039 6.89844C0.530949 6.89844 0.150391 7.279 0.150391 7.74844C0.150391 8.21788 0.530949 8.59844 1.00039 8.59844H7.00039H13.0004C13.4698 8.59844 13.8504 8.21788 13.8504 7.74844C13.8504 7.279 13.4698 6.89844 13.0004 6.89844H7.00039H1.00039Z"
                                                        fill="#6B7280" />
                                                </svg>
                                            </div>
                                            <div class="mid-permit">
                                                <span>All Fleet</span>
                                                {{-- <span> {{ $item->fleet_type }} </span> --}}
                                                <span></span>
                                            </div>
                                            {{-- <div class="equal">
                            <svg width="14" height="16" viewBox="0 0 20 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.75 7C3.75 6.58579 3.41421 6.25 3 6.25C2.58579 6.25 2.25 6.58579 2.25 7H3.75ZM17.75 7C17.75 6.58579 17.4142 6.25 17 6.25C16.5858 6.25 16.25 6.58579 16.25 7H17.75ZM12.75 10C12.75 9.58579 12.4142 9.25 12 9.25C11.5858 9.25 11.25 9.58579 11.25 10H12.75ZM11.25 16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16H11.25ZM8.75 10C8.75 9.58579 8.41421 9.25 8 9.25C7.58579 9.25 7.25 9.58579 7.25 10H8.75ZM7.25 16C7.25 16.4142 7.58579 16.75 8 16.75C8.41421 16.75 8.75 16.4142 8.75 16H7.25ZM19 4.75C19.4142 4.75 19.75 4.41421 19.75 4C19.75 3.58579 19.4142 3.25 19 3.25V4.75ZM1 3.25C0.585786 3.25 0.25 3.58579 0.25 4C0.25 4.41421 0.585786 4.75 1 4.75V3.25ZM12.5937 1.8906L11.9697 2.30662L12.5937 1.8906ZM7.40627 1.8906L6.78223 1.47457L7.40627 1.8906ZM7 21.75H13V20.25H7V21.75ZM2.25 7V17H3.75V7H2.25ZM17.75 17V7H16.25V17H17.75ZM13 21.75C15.6234 21.75 17.75 19.6234 17.75 17H16.25C16.25 18.7949 14.7949 20.25 13 20.25V21.75ZM7 20.25C5.20507 20.25 3.75 18.7949 3.75 17H2.25C2.25 19.6234 4.37665 21.75 7 21.75V20.25ZM11.25 10V16H12.75V10H11.25ZM7.25 10L7.25 16H8.75L8.75 10H7.25ZM9.07037 1.75H10.9296V0.25H9.07037V1.75ZM11.9697 2.30662L13.376 4.41603L14.624 3.58397L13.2178 1.47457L11.9697 2.30662ZM14 3.25H6V4.75H14V3.25ZM6.62404 4.41603L8.0303 2.30662L6.78223 1.47457L5.37596 3.58397L6.62404 4.41603ZM14 4.75H19V3.25H14V4.75ZM6 3.25H1V4.75H6V3.25ZM10.9296 1.75C11.3476 1.75 11.7379 1.95888 11.9697 2.30662L13.2178 1.47457C12.7077 0.709528 11.8491 0.25 10.9296 0.25V1.75ZM9.07037 0.25C8.1509 0.25 7.29226 0.709528 6.78223 1.47457L8.0303 2.30662C8.26214 1.95888 8.65243 1.75 9.07037 1.75V0.25Z"
                                    fill="#28303F" />
                            </svg>
                        </div> --}}
                                        </div>
                                    </div>
                                @endif
                                <div class="row scroll">
                                    @foreach ($vehicletype as $item)
                                        <div class="permit mb-1 p-1">
                                            <div class="equal">
                                                <svg width="12" height="7" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.00039 0.898438C0.530949 0.898438 0.150391 1.279 0.150391 1.74844C0.150391 2.21788 0.530949 2.59844 1.00039 2.59844H7.00039H13.0004C13.4698 2.59844 13.8504 2.21788 13.8504 1.74844C13.8504 1.279 13.4698 0.898438 13.0004 0.898438H7.00039H1.00039ZM1.00039 6.89844C0.530949 6.89844 0.150391 7.279 0.150391 7.74844C0.150391 8.21788 0.530949 8.59844 1.00039 8.59844H7.00039H13.0004C13.4698 8.59844 13.8504 8.21788 13.8504 7.74844C13.8504 7.279 13.4698 6.89844 13.0004 6.89844H7.00039H1.00039Z"
                                                        fill="#6B7280" />
                                                </svg>
                                            </div>
                                            <div class="mid-permit">
                                                <span>{{ $item->fleet_name }}</span>
                                                {{-- <span> {{ $item->fleet_type }} </span> --}}
                                                <span></span>
                                            </div>
                                            <div class="equal">
                                                <a href="{{ route('UnAssignFleet', ['id' => $item->fleet_id]) }}">
                                                    <svg width="14" height="16" viewBox="0 0 20 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M3.75 7C3.75 6.58579 3.41421 6.25 3 6.25C2.58579 6.25 2.25 6.58579 2.25 7H3.75ZM17.75 7C17.75 6.58579 17.4142 6.25 17 6.25C16.5858 6.25 16.25 6.58579 16.25 7H17.75ZM12.75 10C12.75 9.58579 12.4142 9.25 12 9.25C11.5858 9.25 11.25 9.58579 11.25 10H12.75ZM11.25 16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16H11.25ZM8.75 10C8.75 9.58579 8.41421 9.25 8 9.25C7.58579 9.25 7.25 9.58579 7.25 10H8.75ZM7.25 16C7.25 16.4142 7.58579 16.75 8 16.75C8.41421 16.75 8.75 16.4142 8.75 16H7.25ZM19 4.75C19.4142 4.75 19.75 4.41421 19.75 4C19.75 3.58579 19.4142 3.25 19 3.25V4.75ZM1 3.25C0.585786 3.25 0.25 3.58579 0.25 4C0.25 4.41421 0.585786 4.75 1 4.75V3.25ZM12.5937 1.8906L11.9697 2.30662L12.5937 1.8906ZM7.40627 1.8906L6.78223 1.47457L7.40627 1.8906ZM7 21.75H13V20.25H7V21.75ZM2.25 7V17H3.75V7H2.25ZM17.75 17V7H16.25V17H17.75ZM13 21.75C15.6234 21.75 17.75 19.6234 17.75 17H16.25C16.25 18.7949 14.7949 20.25 13 20.25V21.75ZM7 20.25C5.20507 20.25 3.75 18.7949 3.75 17H2.25C2.25 19.6234 4.37665 21.75 7 21.75V20.25ZM11.25 10V16H12.75V10H11.25ZM7.25 10L7.25 16H8.75L8.75 10H7.25ZM9.07037 1.75H10.9296V0.25H9.07037V1.75ZM11.9697 2.30662L13.376 4.41603L14.624 3.58397L13.2178 1.47457L11.9697 2.30662ZM14 3.25H6V4.75H14V3.25ZM6.62404 4.41603L8.0303 2.30662L6.78223 1.47457L5.37596 3.58397L6.62404 4.41603ZM14 4.75H19V3.25H14V4.75ZM6 3.25H1V4.75H6V3.25ZM10.9296 1.75C11.3476 1.75 11.7379 1.95888 11.9697 2.30662L13.2178 1.47457C12.7077 0.709528 11.8491 0.25 10.9296 0.25V1.75ZM9.07037 0.25C8.1509 0.25 7.29226 0.709528 6.78223 1.47457L8.0303 2.30662C8.26214 1.95888 8.65243 1.75 9.07037 1.75V0.25Z"
                                                            fill="#28303F" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <h4>Menu Allocations</h4>
                                </div>
                            </div>
                            <hr>
                            @php
                                $menu = json_decode($user->menu_permission);
                            @endphp
                            <div class="permissions-main-sub">
                                <div class="row justify-content-between">

                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="dashboard" type="checkbox"
                                            for="" @if ($menu->dashboard == 1) checked @endif>
                                        <label class="form-check-label">
                                            Dashboard
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="userManagement" type="checkbox"
                                            id="flexCheckChecked" @if ($menu->userManagement == 1) checked @endif>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            User Mangement
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="technicalDesk" type="checkbox"
                                            @if ($menu->technicalDesk?? "" == 1) checked @endif>
                                        <label class="form-check-label" for="">
                                            Technical Desk
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="vehicleManagement" type="checkbox"
                                            @if ($menu->vehicleManagement == 1) checked @endif>
                                        <label class="form-check-label" for="">
                                            Vehicle Management
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="financeOffice" type="checkbox"
                                            @if ($menu->financeOffice == 1) checked @endif id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Finance Office
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="activityLog" type="checkbox"
                                            @if ($menu->activityLog == 1) checked @endif id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Activity Log
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="taskManagement" type="checkbox"
                                            @if ($menu->taskManagement == 1) checked @endif id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Task Management
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="workShop" type="checkbox"
                                            @if ($menu->workShop == 1) checked @endif id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Work Shop
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="reportModule" type="checkbox"
                                            @if ($menu->reportModule == 1) checked @endif id="">
                                        <label class="form-check-label" for="">
                                            Report Module
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="adminOffice" type="checkbox"
                                            @if ($menu->adminOffice == 1) checked @endif id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Admin Office
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input checkInput" name="controlPanel" type="checkbox"
                                            @if ($menu->controlPanel == 1) checked @endif>
                                        <label class="form-check-label" for="">
                                            Control Panel
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row info-section">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control infoInput" name="first_name"
                                    value="{{ $user->first_name }}" placeholder="" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control infoInput" name="last_name"
                                    value="{{ $user->last_name }}" placeholder="" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ $user->email }}"
                                    class="form-control infoInput" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Phone No</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text brd-left" name="phone" id="basic-addon1">+234</span>
                                    <input type="number" value="{{ $user->phone }}"
                                        class="form-control infoInput brd-right" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Department</label>
                                <input type="text" value="{{ $user->user_type }}"
                                    class="form-control infoInput brd-right" disabled />
                                {{-- <select class="form-control infoInput">
                                    <option value="Recovery">Recovery</option>
                                </select> --}}
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Creator</label>
                                <input type="text" name="creator" class="form-control infoInput" placeholder="" />
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input type="text" name="date" value="{{ $user->created_at }}"
                                    class="form-control infoInput" disabled />
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Last Login</label>
                                <input type="date" class="form-control infoInput" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name = "password" class="form-control infoInput" />
                            </div>
                        </div>
                    </div>
                </div>


            </form>
            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <form action="{{ route('assignFleet') }}" method="post">
                            @csrf
                            <input type="hidden" name="fleet" value="{{ $user->id }}">

                            <div class="modal-header">
                                <h5 class="modal-title">Assign Fleet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Vehicle group</label>
                                    <select class="form-control users" name="name[]" multiple required>
                                        @foreach ($fleet as $item)
                                            <option value="{{ $item->bodytypename }}">
                                                {{ $item->bodytypename }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
