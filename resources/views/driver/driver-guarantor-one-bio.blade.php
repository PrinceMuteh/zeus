@extends('layouts.driver')
@section('content')
    <title>Zeus | Driver Guarantor Onboarding</title>
    <div class="formBox">
        <div class="cnntainer-fluid">
            <div class="logo-section">
                <div class="img-111">
                    <img class="img-fluid" src="{{ asset('images/motorafrica_logo.png') }}" alt="">
                </div>
                <span class="info-100 mt-3">Guarantor 1 Onboarding</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
                <span class="info-200">{{ session()->get('email') }}</span>

            </div>
            @include('components.message')
            <form action="{{ route('guarnatorOneBio2') }}" class="mt-4" method="post">
                @csrf
                <div class="form-section">

                    <span class="lead-text">Basic Info <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="fname" value="{{ old('fname') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">First name</label>
                                <small class="text-danger font-weight-bold">
                                    @error('fname')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="lname" value="{{ old('lname') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe">
                                <label for="floatingInput">Last name</label>
                                <small class="text-danger font-weight-bold">
                                    @error('lname')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Doe">
                                <label for="floatingInput">Email</label>
                                <small class="text-danger font-weight-bold">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Phone Number</label>
                                <small class="text-danger font-weight-bold">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="job" value="{{ old('job') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Job Description</label>
                                <small class="text-danger font-weight-bold">
                                    @error('job')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                    <span class="lead-text">Job Info <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="organisation" value="{{ old('organisation') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Organisation Name</label>
                                <small class="text-danger font-weight-bold">
                                    @error('organisation')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="orgAddress" value="{{ old('orgAddress') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Organisation Address</label>
                                <small class="text-danger font-weight-bold">
                                    @error('orgAddress')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="level" value="{{ old('level') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Organisation Address</label>
                                <small class="text-danger font-weight-bold">
                                    @error('level')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="submitSec">
                        <div class="steps-count">
                            Step 8 / 9
                        </div>
                        <button type="submit" class="nextBtn">Save & Proceed</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
