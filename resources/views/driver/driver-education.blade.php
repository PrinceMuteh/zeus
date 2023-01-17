@extends('layouts.driver')
@section('content')
    <title>Zeus | Contact Person Info</title>
    <div class="formBox">
        <div class="cnntainer-fluid">
            <div class="logo-section">
                <div class="img-111">
                    <img class="img-fluid" src="{{ asset('images/motorafrica_logo.png') }}" alt="">
                </div>
                <span class="info-100 mt-3">Driver Education</span>
                <span class="info-200">Please fill in the form to complete the process and make sure to provide accurate
                    details.</span>
                <span class="info-200">{{ session()->get('email') }}</span>
            </div>
            @include('components.message')
            <form action="{{ route('driverEducation2') }}" class="mt-4" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-section">
                    <span class="lead-text">Primary Education<span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="primary" value="{{ old('primary') }}"
                                    class="form-control formInput" id="floatingInput" placeholder="John">
                                <label for="floatingInput">Name of school</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select class="form-select formInput" name="primaryCity" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        @include('components.state')

                                    </select>
                                    <label for="floatingSelect">City</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="file" name="uploadPrimary" class="form-control formInput" id="floatingInput"
                                    placeholder="John">
                                <label for="floatingInput" class="mb-4">Upload Certificate</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <span class="lead-text">Secondary Education<span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="secondary" class="form-control formInput" id="floatingInput"
                                    placeholder="John">
                                <label for="floatingInput">Name of school</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select name="secondaryCity" class="form-select formInput" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        @include('components.state')
                                    </select>
                                    <label for="floatingSelect">City</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="file" name="uploadSecondary" class="form-control formInput"
                                    id="floatingInput" placeholder="John">
                                <label for="floatingInput" class="mb-4">Upload Certificate</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <span class="lead-text">University<span class="asterisk">*</span></span>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="university" class="form-control formInput" id="floatingInput"
                                    placeholder="John">
                                <label for="floatingInput">Name of school</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-2">
                                <div class="form-floating">
                                    <select name="universityCity" class="form-select formInput" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        @include('components.state')
                                    </select>
                                    <label for="floatingSelect">City</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input name="uploadUniversity" type="file" class="form-control formInput"
                                    id="floatingInput" placeholder="John">
                                <label for="floatingInput" class="mb-4">Upload Certificate</label>
                            </div>
                        </div>
                    </div>
                    <div class="submitSec">
                        {{-- <div class="step-100">

                            <div class="steps">
                                <span>1</span>
                                <span class="active-step">2</span>
                                <span>3</span>
                                <span>4</span>
                            </div>
                        </div> --}}
                        <div class="steps-count">
                            Step 2 / 9
                        </div>
                        <button class="nextBtn">Save & Proceed</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
