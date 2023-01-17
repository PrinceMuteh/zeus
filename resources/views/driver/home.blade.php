@extends('layouts.driver')
@section('content')
    <title>Zeus | Driver Guarantor Onboarding</title>
    <div class="formBox">
        <div class="cnntainer-fluid">
            <div class="logo-section">
                <img src="{{ asset('images/zeus_logo.png') }}" alt="">
                <span class="info-100 mt-3">Guarantor 1 Onboarding</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
            </div>
            @include('components.message')
            <form action="{{ route('guarnatorTwoBio') }}" class="mt-4" method="post">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Basic Info <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control formInput" id="floatingInput" placeholder="Doe">
                                <label for="floatingInput">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Job Description</label>
                            </div>
                        </div>

                    </div>
                    <div class="submitSec">
                        <div class="step-100">
                            {{-- <span>Step</span> --}}
                            <div class="steps">
                                <span>1</span>
                                <span>2</span>
                                <span class="active-step">3</span>
                                <span>4</span>
                            </div>
                        </div>
                        <button class="nextBtn">Proceed to Norminate Guarantor 2</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
