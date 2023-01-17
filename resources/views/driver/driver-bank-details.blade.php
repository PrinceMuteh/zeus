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
                <span class="info-100">Bank details</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
                <span class="info-200">{{ session()->get('email') }}</span>

            </div>
            @include('components.message')
            <form action="{{ route('bankDetails2') }}" class="mt-4" method="post">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Basic Information <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="accountName" value="{{ old('accountName') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Enter details">
                                <label for="floatingInput">Account Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="number" min="10" name="accountNumber" value="{{ old('accountNumber') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Enter details">
                                <label for="floatingInput">Account Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select formInput" name="bank" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    @include('components.bankApi')
                                </select>
                                <label for="floatingInput">Bank Name</label>
                            </div>
                        </div>
                        <div class="submitSec">
                            <div class="steps-count">
                                Step 6 / 9
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
