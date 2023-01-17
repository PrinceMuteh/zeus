@extends('main')
@section('content')
    <style>
        div.scroll {
            /* background-color: #fed9ff; */
            /* width: 600px; */
            height: 500px;
            overflow-x: hidden;
            overflow-y: auto;
            /* text-align: center; */
            padding: 20px;
            margin-top: 230px;
        }
    </style>
    @include('components.message')

    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="">
                <div class="top-row mb-4">
                    <div>
                        <p class="sectionTitle text-inter ml-2 mt-2">User Profile</p>
                    </div>
                </div>
                <form action="{{ route('updateProfile') }}" method="post">
                    @csrf
                    <div class="row fixedbanner">
                        <div class="col-sm-6 col-md-9">
                            <div class="bannerBox no-radius">
                                <div class="row">
                                    <div class="col-sm-6 col-md-2">
                                        <div class="box-col">
                                            <div class="avatar">
                                                <img src="{{ Auth()->user()->image }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <div class="box-col align-items-start p-2">
                                            <p class="staff-name">{{ Auth()->user()->user_type }}</p>
                                            <p class="staff-id">User ID: #{{ Auth()->user()->id * 999999 }}</p>
                                            <p class="staff-id">Email Address: {{ Auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="sideProfile">
                                <div class="firstInfo">
                                    <p>Control Panel</p>
                                    <p>
                                        This component provides the Admin the ability to view and
                                        change account settings.
                                    </p>
                                </div>
                                <div class="secondInfo">
                                    <ul class="sideLists">
                                        <li>
                                            <img src="{{ asset('assets/images/list-arrow.svg') }}" alt="" />
                                            <span>Download Account Statement</span>
                                        </li>
                                        <li class="justify-content-between">
                                            <div class="w-100">
                                                <img src="{{ asset('assets/images/list-arrow.svg') }}" alt="" />
                                                <span>Notification Sound</span>
                                            </div>
                                            <!-- <Switch v-model="sound"></Switch> -->
                                            <i-switch></i-switch>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/list-arrow.svg') }}" alt="" />
                                            <span>Subscription</span>
                                        </li>
                                        <li>
                                            {{-- <a href="{{route('password.reset')}}"> --}}
                                            <a href="{{route('reset')}}">
                                                <img src="{{ asset('assets/images/list-arrow.svg') }}" alt="" />
                                                <span>Password Reset</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="thirdInfo">
                                    <button type="submit" class="submitBtn">SAVE AND UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scroll">
                        <div class="">
                            <p class="infoForm">Manager Details</p>
                            <div class="container">
                                <div class="row info-section">
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control infoInput" name="first_name"
                                                value="{{ Auth()->user()->first_name }}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control infoInput" placeholder=""
                                                name="last_name" value="{{ Auth()->user()->last_name }}" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Phone No</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text brd-left" id="basic-addon1">+234</span>
                                                <input type="number" class="form-control infoInput brd-right"
                                                    name="phone" value="{{ Auth()->user()->phone }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control infoInput" name="email"
                                                placeholder="{{ Auth()->user()->email }}"
                                                value="{{ Auth()->user()->email }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">National Identification Number (NIN)</label>
                                            <input type="text" class="form-control infoInput" placeholder="Accountant"
                                                name="nin" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <select class="form-control infoInput">
                                                {{-- <option value="">--Please select--</option> --}}
                                                @if (Auth()->user()->gender == 'male')
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Fe-Male</option>
                                                @else
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Date of Birth</label>
                                            <input type="date" class="form-control infoInput"
                                                value="{{ Auth()->user()->dob }}" name="dob" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea rows="2" name="address" class="form-control infoInput">{{ Auth()->user()->address }} </textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-6 col-md-8">
                                                <select name="city" class="form-control infoInput">
                                                    <option value="">--Please select--</option>
                                                    <option value="Male">Abuja </option>
                                                    <option value="Female">Lagos</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <input type="text" value="{{ Auth()->user()->zip_code }}"
                                                    placeholder="Zip Code" name="zip_code"
                                                    class="form-control infoInput" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="infoForm">Center Details</p>
                            <div class="container">
                                <div class="row info-section mt-4">
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Company Name</label>
                                            <input type="text" class="form-control infoInput" placeholder=""
                                                value="{{ Auth()->user()->company_name }}" name="company_name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text brd-left" id="basic-addon1">+234</span>
                                                <input type="number" class="form-control infoInput brd-right"
                                                    value="{{ Auth()->user()->company_phone }}" name="company_phone" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control infoInput"
                                                value="{{ Auth()->user()->company_email }}" name="company_email" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Website URL</label>
                                            <input type="url" class="form-control infoInput" name="url"
                                                value="{{ Auth()->user()->url }}" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6 col-md-7">
                                        <label for="">Display Photo (Logo)</label>
                                        <Upload
                                        type="drag"
                                        :headers="{ 'x-csrf-token': tokenAvatar }"
                                        :on-success="handleSuccess"
                                        :max-size="2048"
                                        :format="['jpg', 'jpeg', 'png']"
                                        :on-exceeded-size="handleMaxSize"
                                        :on-format-error="handleFormatError"
                                        ref="uploads"
                                        action=""
                                        >
                                        <div style="padding: 20px 0">
                                            <Icon
                                            type="ios-cloud-upload"
                                            size="52"
                                            style="color: #3399ff"
                                            ></Icon>
                                            <p>Click or drag files here to upload</p>
                                        </div>
                                        </Upload>
                                    </div>

                                    <div class="col-sm-6 col-md-7">
                                        <label for="">CAC Certificate</label>
                                        <Upload
                                        type="drag"
                                        :headers="{ 'x-csrf-token': tokenAvatar }"
                                        :on-success="handleSuccess"
                                        :max-size="2048"
                                        :format="['jpg', 'jpeg', 'png']"
                                        :on-exceeded-size="handleMaxSize"
                                        :on-format-error="handleFormatError"
                                        ref="uploads"
                                        action=""
                                        >
                                        <div style="padding: 20px 0">
                                            <Icon
                                            type="ios-cloud-upload"
                                            size="52"
                                            style="color: #3399ff"
                                            ></Icon>
                                            <p>Click or drag files here to upload</p>
                                        </div>
                                        </Upload>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea
                                            rows="2"
                                            class="form-control infoInput"
                                        ></textarea>
                                        </div>
                                        <div class="form-row">
                                        <div class="col-sm-6 col-md-8">
                                            <select class="form-control infoInput">
                                            <option value="">--Please select--</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <input
                                            type="text"
                                            placeholder="Zip Code"
                                            class="form-control infoInput"
                                            />
                                        </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <p class="infoForm">Bank Information</p>
                            <div class="container">
                                <div class="row info-section space-down mt-4">
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Bank Name</label>
                                            <input type="text" class="form-control infoInput" placeholder=""
                                                value="{{ Auth()->user()->bank_name }}" name="bank_name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Account Number</label>
                                            <input type="text" class="form-control infoInput" placeholder=""
                                                value="{{ Auth()->user()->account_number }}" name="account_number" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Account Name</label>
                                            <input type="text" class="form-control infoInput"
                                                value="{{ Auth()->user()->account_name }}" name="account_name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="form-group">
                                            <label for="">Sort Code</label>
                                            <input type="text" class="form-control infoInput"
                                                value="{{ Auth()->user()->sort_code }}" name="sort_code" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- </div> -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
