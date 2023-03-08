@extends('main')
@section('content')
    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-2">
                <!-- text-inter -->
                <div class="top-row">
                    <span class="sectionTitle text-inter pb-0 pl-0">
                        ACCOUNT OFFICER
                    </span>
                </div>

                @include('account-officer.menu')

            </div>

            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection
