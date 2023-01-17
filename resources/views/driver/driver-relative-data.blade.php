@extends('layouts.driver')
@section('content')
    <title>Zeus | Driver Onboarding</title>
    <div class="formBox">
        <div class="cnntainer-fluid" id="driver-registration">
            <div class="logo-section">
                {{-- <img src="{{ asset('images/zeus_logo.png') }}" alt=""> --}}
                <div class="img-111">
                    <img class="img-fluid" src="{{ asset('images/motorafrica_logo.png') }}" alt="">
                </div>
                <span class="info-100">Spouse/Relative Data</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
                <span class="info-200">{{ session()->get('email') }}</span>

            </div>
            @include('components.message')
            <form action="{{ route('relativeData2') }}" class="mt-4" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Bio Data <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select name="relative" value="{{ old('relative') }}" class="form-select formInput"
                                        id="floatingSelect" aria-label="Floating label select example" required>
                                        <option value="Spouse">Spouse</option>
                                        <option value="Relative">Relative</option>
                                    </select>
                                    <label for="floatingSelect">Type Spouse/Relative</label>
                                </div>
                            </div>
                        </div>
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
                                <input type="text" name="phone" value="{{ old('phone') }}"
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
                                    <select class="form-select formInput" id="floatingSelect"
                                        aria-label="Floating label select example" required>
                                        @include('components.state')
                                    </select>
                                    <label for="floatingSelect">City</label>
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
                                    <select name="country" value="{{ old('country') }}" class="form-select formInput"
                                        id="floatingSelect" aria-label="Floating label select example" required>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Ghana">Ghana</option>
                                    </select>
                                    <label for="floatingSelect">Nationality</label>
                                </div>
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
                            {{-- <div class="step-100">
                                <div class="steps">
                                    <span>1</span>
                                    <span>2</span>
                                    <span class="active-step">3</span>
                                    <span>4</span>
                                </div>
                            </div> --}}
                            <div class="steps-count">
                                Step 3 / 9
                            </div>
                            <button type="submit" class="nextBtn">Save & Proceed</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>


        <script>
            let driverReg = document.querySelector('#driver-registration');
        </script>
    @endsection
