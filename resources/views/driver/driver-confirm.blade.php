@extends('layouts.driver')
@section('content')
    <title>Zeus | Driver Guarantor Onboarding</title>
    <div class="formBox">
        <div class="cnntainer-fluid">
            <div class="logo-section">
                <div class="img-111">
                    <img class="img-fluid" src="{{ asset('images/motorafrica_logo.png') }}" alt="">
                </div>
                <span class="info-100 mt-3">Application Completed</span>
                <span class="info-200">Gurantors will get an Email for verification.</span>
                <span class="info-200">{{ session()->get('email') }}</span>

            </div>
            @include('components.message')
            <div class="logo-section">
                <div class=" info-100">
                    <h3>Application Completed</h3>
                    <h4>We will Get back to you via an Email</h4>
                </div>
            </div>
        </div>
    @endsection
