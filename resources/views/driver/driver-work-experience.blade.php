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
                <span class="info-100">Work Experience</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
                <span class="info-200">{{ session()->get('email') }}</span>

            </div>
            @include('components.message')
            <form action="{{ route('workExperience2') }}" class="mt-4" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Basic Information <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" name="company"
                                    required value="{{ old('company') }}" placeholder="Enter details">
                                <label for="floatingInput">Company</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" name="jobTitle"
                                    required value="{{ old('jobTitle') }}" placeholder="Enter details">
                                <label for="floatingInput">Job Title</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" name="duration"
                                    required value="{{ old('duration') }}" placeholder="Enter details">
                                <label for="floatingInput">Duration</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select name="city" class="form-select formInput" id="floatingSelect" required
                                        aria-label="Floating label select example">
                                        @include('components.state')
                                    </select>
                                    <label for="floatingSelect">City</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" name="address"
                                    required value="{{ old('address') }}" placeholder="John">
                                <label for="floatingInput">Address</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control formInput" id="floatingInput"
                                    name="referenceNumber" value="{{ old('referenceNumber') }}" placeholder="John" required>
                                <label for="floatingInput">Reference Phone Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" name="supervisor"
                                    value="{{ old('supervisor') }}" id="floatingInput" placeholder="John" required>
                                <label for="floatingInput">Supervisor</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                                    name="contactSupervisor" value="{{ old('contactSupervisor') }}">

                                <label class="form-check-label" for="flexCheckDefault">
                                    May we contact your previous supervisor?
                                </label>
                            </div>
                        </div>
                        <div class="submitSec">
                            {{-- <div class="step-100">
                                <div class="steps">
                                    <span>1</span>
                                    <span>2</span>
                                    <span>3</span>
                                    <span class="active-step">4</span>
                                </div>
                            </div> --}}
                            <div class="steps-count">
                                Step 4 / 9
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
