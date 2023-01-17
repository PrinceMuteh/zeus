@extends('main')
@section('content')
    <title>Zeus | User Account</title>
    <style>
        div.scroll {
            /* background-color: #fed9ff; */
            /* width: 600px; */
            height: 600px;
            overflow-x: hidden;
            overflow-y: auto;
            /* text-align: center; */
            padding: 20px;
            margin-top: 230px;
        }
    </style>
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-9">

                    <div class="row fixedbanner">
                        <div class="col-sm-6 col-md-9">
                            <div class="p-4 no-radius bg-light-banner" style="width:100%">
                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="box-col align-items-center">
                                            <a href="/user-management">
                                                <img src="{{ asset('assets/images/arrow-left.svg') }}" class="image-padding"
                                                    alt="" />
                                            </a>
                                            <div class="avatar">
                                                <img src="{{ $user->image }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <div class="box-col align-items-start">
                                            <span class="staff-name">{{ $user->name }}</span>
                                            <span class="staff-id">Date created: {{ $user->created_at }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="box-col align-items-center">

                                            @if (!$gurantor)
                                                <span class="text-danger h5">
                                                    Gurantors Details not found... <br> Please Upload Record
                                                </span>
                                            @endif
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scroll">
                        <div id="userz">
                            @include('components.users.user')
                        </div>
                        <div id="gurantor" style="display: none;">
                            @include('components.users.gurantor')
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="col-sm-6 col-md-3">
                        <div class="sideProfile">
                            <div class="firstInfo">
                                <span>Control Panel</span>
                                <span>
                                    This component provides the Admin the ability to view and
                                    change account settings.
                                </span>
                            </div>

                            <div class="secondInfo">
                                <ul class="sideLists border-sideLists">
                                    <li>
                                        <a id="basicInfo" style="cursor:pointer">Basic Info</a>
                                    </li>
                                    <li>
                                        <a id="gurantors" style="cursor:pointer">Gurantors & Documents</a>
                                        @if (!$gurantor)
                                            <span class="text-danger">
                                                Gurantors Details not found
                                            </span>
                                        @endif
                                    </li>
                                    {{-- <li>
                                        <a href="/account-permissions">Account Permissions</a>
                                    </li> --}}
                                    <li>
                                        <a href="">Wallet / Finance</a>
                                    </li>
                                    <li>
                                        <a href="">Activity Log</a>
                                    </li>
                                    <li>
                                        <a href="" class="text-danger">Password Reset</a>
                                    </li>
                                    <li>
                                        <a href="" class="text-danger">Archive User</a>
                                    </li>
                                </ul>
                            </div>

                            {{-- <div class="thirdInfo">
                                <button class="submitBtn" type = "submit" >SAVE AND UPDATE</button>
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

    <script>
        $("#gurantors").click(function() {
            $('#userz').hide();
            $('#gurantor').show();
        });

        $("#basicInfo").click(function() {
            $('#userz').show();
            $('#gurantor').hide();
        });
    </script>
@endsection

{{-- <div class="container">
                <div class="row">
                    @include('components.message')
                </div>
                <div class="row top-70">
                    <div class="col-sm-6 col-md-2">
                        <div class="profile">
                            <div class="profileImage">
                                <img src="{{ $user->image }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-9 offset-md-1">
                        <form action="{{ route('editUserAccount') }}" method="post">
                            @csrf
                            <div class="row pr-3 pl-3">
                                <input type="hidden" name="email" value="{{ $user->email }}">
                                <div class="col-sm-6 col-md-5">
                                    <p class="subText">USER DATA</p>
                                    <div class="form-campaign">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" value="{{ $user->name }}" name="name"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" value="{{ $user->email }}"  class="form-control"
                                                disabled />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $user->address }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">NIN</label>
                                            <input type="number" class="form-control" name="nin"
                                                value="{{ $user->nin }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <p class="subText empty">Empty</p>
                                    <div class="form-campaign">
                                        <div class="form-group">
                                            <label for="">User Type ({{ $user->category }})</label>
                                            <select class="form-control" name="category">
                                                <option value="driver">Driver</option>
                                                <option value="investor">Investors</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $user->phone }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob"
                                                value="{{ $user->dob }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Town</label>
                                            <input type="text" value="{{ $user->town }}" name="town"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group  p-3">
                                            <button type="submit" class="btn btn-primary">UPDATE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
