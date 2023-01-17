@extends('layouts.driver')
@section('content')
    <title>Zeus | Driver Onboarding</title>


    <div class="formBox">
        {{-- <nav class="navbar bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Navbar</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <br> --}}
        <div class="cnntainer-fluid" id="driver-registration">
            <div class="logo-section">
                <div class="img-111">
                    <img class="img-fluid" src="{{ asset('images/motorafrica_logo.png') }}" alt="">
                </div>
                <span class="info-100">Driver Onboarding</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
                <span class="info-200" style="font-size:16px;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login To
                        Continue</a>
                </span>

            </div>
            @include('components.message')
            <form action="{{ route('driverRegistration2') }}" class="mt-4" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Bio Data <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="lname" value="{{ old('lname') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John" required>
                                <label for="floatingInput">Last Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="fname" value="{{ old('fname') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe" required>
                                <label for="floatingInput">First Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John" required>
                                <label for="floatingInput">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe" required>
                                <label for="floatingInput">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" name="dob" value="{{ old('dob') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe" required>
                                <label for="floatingInput">Date of Birth</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">


                                    <select name="city" class="form-select formInput" id="floatingSelect"
                                        aria-label="Floating label select example" required>
                                        @include('components.state')
                                    </select>
                                    <label for="floatingSelect">City of Residence</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="address" value="{{ old('address') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe" required>
                                <label for="floatingInput">Residential Address</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select name="country" class="form-select formInput" id="floatingSelect"
                                        aria-label="Floating label select example" required>
                                        <option {{ old('country') == 'Nigeria' ? 'selected' : '' }} value="Nigeria">Nigeria
                                        </option>
                                        <option {{ old('country') == 'Ghana' ? 'selected' : '' }} value="Ghana">Ghana
                                        </option>
                                    </select>
                                    <label for="floatingSelect">Nationality</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="file" name="bills" class="form-control formInput" id="floatingInput"
                                    placeholder="John">
                                <label for="floatingInput" class="mb-4">Upload Utility Bill</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="file" name="tenancyAgreement" class="form-control formInput"
                                    id="floatingInput" placeholder="John">
                                <label for="floatingInput" class="mb-4">Upload Tenancy Agreement</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    required>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Are you authorized to work in Nigeria?
                                </label>
                            </div>
                        </div>
                        <div class="submitSec">
                            <div class="steps-count">
                                Step 1 / 9
                            </div>
                            <button type="submit" name="form1" class="nextBtn">Save & Proceed</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('driverlogin') }}">
                        
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Login to Continue</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <script>
            let driverReg = document.querySelector('#driver-registration');
        </script>
    @endsection
