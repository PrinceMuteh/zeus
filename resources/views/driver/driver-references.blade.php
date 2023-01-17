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
                <span class="info-100">References</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
                <span class="info-200">{{ session()->get('email') }}</span>

            </div>
            @include('components.message')
            <form action="{{ route('driverReferences2') }}" class="mt-4" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Bio Data <span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="lname" value="{{ old('lname') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Enter details">
                                <label for="floatingInput">Last Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="fname" value="{{ old('fname') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Enter details">
                                <label for="floatingInput">First Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="relationship" value="{{ old('relationship') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Enter details">
                                <label for="floatingInput">Relationship</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="company" value="{{ old('company') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="Enter details">
                                <label for="floatingInput">Company</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select class="form-select formInput" name="city" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        @include('components.state')
                                    </select>
                                    <label for="floatingSelect">City</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="address" value="{{ old('address') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Residential Address</label>
                            </div>
                        </div>

                        <div class="submitSec">
                            <div class="steps-count">
                                Step 5 / 9
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
