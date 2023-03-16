@extends('main')
@section('content')
    <style>
        .general-overview-link {
            font-weight: bolder;
            border-bottom: 3px solid #08102E;
            color: #08102E !important;
        }
    </style>
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->

            @include('account-office.section.account-nav-links')
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection
