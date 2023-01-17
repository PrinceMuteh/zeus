<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Check Out | Password Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Envio" name="description" />
    <meta content="Envio" name="Envio Team" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select').select2({
                placeholder: 'Select an option'
            });
        });
    </script>

    <style>
        .btn-primary {
            background-color: #1565d8;
        }

        label {
            font-weight: bold;
        }

        .textbg {
            background-color: #f5f5f5;
        }

        .card-box {
            border-radius: 12px;
        }

        .rad {
            border-radius: 12px;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        #tit {
            color: darkorange;
            font-weight: 100px;
        }

        div.scroll {
            margin: 4px, 4px;
            padding: 4px;
            /* background-color: green; */
            /* width: 500px; */
            height: 550px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: justify;
        }

        #t {
            font-size: 16px;
            font-weight: bold;
        }

        .btn {
            font-size: 12px;
            border-radius: 5px;
        }
    </style>
</head>

<body style="background-color:#08102e;">

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/zeus.svg') }}" style="opacity: .1" height="300px"
                            alt="" srcset="">
                    </div>
                    <p class="display-2 text-left" style="opacity: .1">Admin Console</p>

                </div>
                <div class="col-md-8 col-lg-8 col-xl-8">
                    <div class="card mb-0" style="min-height: 550px;">
                        <div class="card-body">
                            <div class="account-logo-box p-2 text-center">
                                {{-- <div class="text-left">
                                    <img src="{{ asset('assets/images/zeus.svg') }}" height="100"
                                        alt="" srcset="">
                                </div> --}}
                                <h3 class="text-uppercase mb-1 mt-3">Admin Console</h3>
                                <p class="mb-0">Please Fill in the Following information. </p>
                                @include('components.message')
                            </div>

                            <div class="account-box">

                                <div class="scroll">
                                    <form method="POST" action="{{ route('changePasswordz') }}"
                                        class="form-horizontal">
                                        @csrf
                                        <div class="">

                                            <p class="infoForm">Manager Details</p>
                                            <div class="container">
                                                <div class="row info-section">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">First Name</label>
                                                            <input type="text" class="form-control infoInput"
                                                                name="first_name" value="{{ $user->first_name }}"
                                                                placeholder="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Last Name</label>
                                                            <input type="text" class="form-control infoInput"
                                                                placeholder="" name="last_name"
                                                                value="{{ $user->last_name }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Phone No</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text brd-left"
                                                                    id="basic-addon1">+234</span>
                                                                <input type="number"
                                                                    class="form-control infoInput brd-right"
                                                                    name="phone" value="{{ $user->phone }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" class="form-control infoInput"
                                                                name="email" placeholder="{{ $user->email }}"
                                                                value="{{ $user->email }}" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">National Identification Number
                                                                (NIN)</label>
                                                            <input type="number" class="form-control infoInput"
                                                                placeholder="" value="{{ old('nin') }}"
                                                                name="nin" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Gender</label>
                                                            <select class="form-control infoInput" name="gender">
                                                                @if ($user->gender == 'male')
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">FeMale</option>
                                                                @else
                                                                    <option value="Female">Female</option>
                                                                    <option value="Male">Male</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Date of Birth</label>
                                                            <input type="date" class="form-control infoInput"
                                                                value="{{ old('dob') }}" name="dob" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Address</label>
                                                            <textarea rows="2" name="address" class="form-control infoInput">{{ old('address') }} </textarea>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-6 col-md-8">
                                                                <select name="city" class="form-control infoInput">
                                                                    <option value="">--Please select--</option>
                                                                    <option value="Male">Abuja </option>
                                                                    <option value="Female">Lagos</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="infoForm">Center Details</p>
                                            <div class="container">
                                                <div class="row info-section mt-4">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Company Name</label>
                                                            <input type="text" class="form-control infoInput"
                                                                placeholder="" value="{{ old('company_name') }}"
                                                                name="company_name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Phone Number</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text brd-left"
                                                                    id="basic-addon1">+234</span>
                                                                <input type="number"
                                                                    class="form-control infoInput brd-right"
                                                                    value="{{ old('company_phone') }}"
                                                                    name="company_phone" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" class="form-control infoInput"
                                                                value="{{ old('company_email') }}"
                                                                name="company_email" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="infoForm">Bank Information</p>
                                            <div class="container">
                                                <div class="row info-section  mt-4">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Bank Name</label>
                                                            <select name="bank" class="form-control select  infoInput"
                                                                value="{{ old('bank') }}" id="">
                                                                @include('components.bankApi')
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Account Number</label>
                                                            <input type="number" min="10"
                                                                class="form-control infoInput" placeholder=""
                                                                value="{{ old('account_number') }}"
                                                                name="account_number" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="infoForm">Security Details</p>

                                            <div class="container">
                                                <div class="row info-section">
                                                    <input type="hidden" name="tok"
                                                        value="{{ $id }}">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group row">
                                                            <label for="password">Password</label>
                                                            <input id="password" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" required
                                                                autocomplete="current-password">

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group row">
                                                            <label for="password-confirm"> Confrim Password</label>
                                                            <input id="password-confirm" type="password"
                                                                class="form-control" name="password_confirmation"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group row">
                                                            <label for="pin"> Transaction Pin</label>
                                                            <input id="pin" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="pin" required>
                                                        </div>
                                                        @error('pin')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group row">
                                                            <label for="pin-confirm"> Confirm Transaction Pin</label>
                                                            <input id="pin-confirm" type="password"
                                                                class="form-control" name="pin_confirmation" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group row text-center mt-2">
                                                            <button
                                                                class="btn btn-md btn-block btn-primary waves-effect waves-light"
                                                                type="submit">Proceed</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="account-box">
                                <div class="account-logo-box">
                                    <div class="text-left">
                                        <img src="{{ asset('assets/images/zeus.svg') }}" height="100" alt=""  srcset="">
                                    </div>
                                    <h3 class="text-uppercase mb-1 mt-3">Admin Console</h3>
                                    <p class="mb-0">Please Enter Your Password and Transaction Pin. </p>
                                </div>
                                @include('components.message')
                                <div class="account-content mt-4">
                                    <form method="POST" action="{{ route('changePasswordz') }}"
                                        class="form-horizontal">
                                        @csrf
                                        <input type="hidden" name="tok" value="{{ $id }}">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="password">Password</label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="password-confirm"> Confrim Password</label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="pin"> Transaction Pin</label>
                                                <input id="pin" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="pin" required>
                                            </div>
                                            @error('pin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="pin-confirm"> Confirm Transaction Pin</label>
                                                <input id="pin-confirm" type="password" class="form-control"
                                                    name="pin_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="form-group row text-center mt-2">
                                            <div class="col-12">
                                                <button
                                                    class="btn btn-md btn-block btn-primary waves-effect waves-light"
                                                    type="submit">Proceed</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>

            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
</body>

<!-- end page -->
