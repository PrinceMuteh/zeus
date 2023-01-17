@extends('layouts.driver')
@section('content')
    <title>Zeus | Driver Guarantor Onboarding</title>
    <div class="formBox">
        <div class="cnntainer-fluid">
            <div class="logo-section">
                <div class="img-111">
                    <img class="img-fluid" src="{{ asset('images/motorafrica_logo.png') }}" alt="">
                </div>
                <span class="info-100 mt-3">Guarantor 2 Onboarding</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
            </div>
            @include('components.message')
            <form action="{{ route('guarnatorTwoBio') }}" class="mt-4" method="post">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Basic Bio Data <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">First Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" placeholder="Doe">
                                <label for="floatingInput">Surname</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control formInput" id="floatingInput" placeholder="Doe">
                                <label for="floatingInput">Date of Birth</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select class="form-select formInput" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option selected>Male</option>
                                        <option value="1">Female</option>
                                        <option value="1">Other</option>
                                    </select>
                                    <label for="floatingSelect">Gender</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <span class="lead-text">Contact Information <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control formInput" id="floatingInput" placeholder="Doe">
                                <label for="floatingInput">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select class="form-select formInput" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option selected>Abuja</option>
                                        <option value="1">Lagos</option>
                                        <option value="1">Benue</option>
                                    </select>
                                    <label for="floatingSelect">City of Residence</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" placeholder="Doe">
                                <label for="floatingInput">Residential Address</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" placeholder="Doe">
                                <label for="floatingInput">Nearest Landmark</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <span class="lead-text">Identification <span class="asterisk">*</span></span>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput" class="mb-4">Photograph</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput"
                                    placeholder="Doe">
                                <label for="floatingInput">National Identity Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput"
                                    placeholder="Doe">
                                <label for="floatingInput">Driver License Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput"
                                    placeholder="Doe">
                                <label for="floatingInput">BVN</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput"
                                    placeholder="Doe">
                                <label for="floatingInput">Criminal Record</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <span class="lead-text">Other <span class="asterisk">*</span></span>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput"
                                    placeholder="John">
                                <label for="floatingInput" class="mb-4">Nationality</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput"
                                    placeholder="Doe">
                                <label for="floatingInput">Authorized to work in Nigeria</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput"
                                    placeholder="Doe">
                                <label for="floatingInput">Education Level</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput"
                                    placeholder="Doe">
                                <label for="floatingInput">Professional Qualification</label>
                            </div>
                        </div>
                        <div class="submitSec">
                            <div class="step-100">
                                {{-- <span>Step</span> --}}
                                {{-- <div class="steps">
                                    <span>1</span>
                                    <span>2</span>
                                    <span>3</span>
                                    <span>4</span>
                                    <span class="active-step">5</span>
                                    <span>6</span>
                                </div> --}}
                            </div>
                            <button class="submitBtn">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    @endsection
