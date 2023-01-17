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
                <span class="info-100">Additional skills & hobbies</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
                <span class="info-200">{{ session()->get('email') }}</span>

            </div>
            @include('components.message')
            <form action="{{ route('additionalInfo2') }}" class="mt-4" method="post">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Basic Information <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="additionalSkill" value="{{ old('additionalSkill') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Enter details">
                                <label for="floatingInput">Additional Skills</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="hobby" value="{{ old('hobby') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Enter details">
                                <label for="floatingInput">Hobbies</label>
                            </div>
                        </div>
                        <div class="submitSec">
                            <div class="steps-count">
                                Step 7 / 9
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
