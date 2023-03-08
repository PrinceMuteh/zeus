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
                                            <br>
                                            
                                            <div class ="row">   <h3>₦ {{ number_format($acctBal) }} </h3> <a href ="/collect-money/{{$user->id}}" class="btn btn-primary"> Collect Money</a> <br> <a href ="/pay-owner/{{$user->id}}" class="btn btn-info mt-1"> Pay Owner</a>
                                            <a href ="/update-vms/{{$user->id}}" class="btn btn-success mt-1"> Update Vms</a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="box-col align-items-center">

                                            @if ($user->category == 'Driver')
                                                @if (!$gurantor)
                                                    <span class="text-danger h5">
                                                        Gurantors Details not found... <br> Please Upload Record
                                                    </span>
                                                @endif
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
                                    @if ($user->category == 'Driver')
                                        <li>
                                            <a id="gurantors" style="cursor:pointer">Gurantors & Documents</a>
                                            @if (!$gurantor)
                                                <span class="text-danger">
                                                    Gurantors Details not found
                                                </span>
                                            @endif
                                        </li>
                                    @endif
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
