@extends('layouts.driver')
@section('content')
    <title>Zeus | Driver Guarantor Onboarding</title>
    <div class="formBox">
        <div class="cnntainer-fluid">
            <div class="logo-section">
                <div class="img-111">
                    <img class="img-fluid" src="{{ asset('images/motorafrica_logo.png') }}" alt="">
                </div>
                <span class="info-100 mt-3">Guarantor Registration</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
            </div>
            @include('components.message')
            <form action="{{ route('guarnatorOneReg2') }}" class="mt-4" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-section">
                    <span class="lead-text">Basic Bio Data <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="fname" value="{{ old('fname') ?? $user->first_name  }}"
                                    class="form-control formInput"  id="floatingInput" placeholder="John" required>
                                <label for="floatingInput">First Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="lname" value="{{ old('lname') ?? $user->last_name }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe" required>
                                <label for="floatingInput">Surname</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" name = "dob" value = "{{old('dob')}}" class="form-control formInput" id="floatingInput" placeholder="Doe"
                                    required>
                                <label for="floatingInput">Date of Birth</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select name = "gender" class="form-select formInput" id="floatingSelect"
                                        aria-label="Floating label select example" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
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
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John" required>
                                <label for="floatingInput">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control formInput" value="{{ $user->email }}" id="floatingInput" placeholder="Doe" disabled>
                                <label for="floatingInput">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select name = "state" class="form-select formInput" id="floatingSelect"
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
                            <div class="form-floating mb-3">
                                <input type="text" name="landmark" value="{{ old('landmark') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe" required>
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
                                <input type="file" name="file" class="form-control formInput" id="floatingInput"
                                    placeholder="John">
                                <label for="floatingInput" class="mb-4">Photograph</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="nin" value="{{ old('nin') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe" required>
                                <label for="floatingInput">National Identity Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" name="driverLicense" value="{{ old('driverLicense') }}"
                                    class="form-control formInput" id="floatingInput" required placeholder="Doe">
                                <label for="floatingInput">Driver License Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" name="bvn" value="{{ old('bvn') }}"
                                    class="form-control formInput" id="floatingInput" required placeholder="Doe">
                                <label for="floatingInput">BVN</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" name="criminalRecord" value="{{ old('crimimalRecord') }}"
                                    class="form-control formInput" id="floatingInput" required placeholder="Doe">
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
                                <input type="text" name="country" value="{{ old('country') }}"
                                    class="form-control formInput" id="floatingInput" required placeholder="John">
                                <label for="floatingInput" class="mb-4">Nationality</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name = "authorise" class="form-control formInput" id="floatingInput" required
                                    placeholder="Doe">
                                <label for="floatingInput">Authorized to work in Nigeria(Yes or No)</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="educationLevel" value="{{ old('educationLevel') }}"
                                    class="form-control formInput" id="floatingInput" required placeholder="Doe">
                                <label for="floatingInput">Education Level</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="qualification" value="{{ old('qualification') }}"
                                    class="form-control formInput" id="floatingInput" required placeholder="Doe">
                                <label for="floatingInput">Professional Qualification</label>
                            </div>
                        </div>
                        <div class="submitSec">
                            <button type="submit" class="nextBtn">Save & Proceed</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    @endsection
