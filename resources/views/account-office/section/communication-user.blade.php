@extends('main')
@section('content')
    <style>
        .communications-link {
            font-weight: bolder;
            border-bottom: 3px solid #08102E;
            color: #08102E !important;
        }

        .card {
            padding: 20px;
            border: 2px solid #ECECEC;
            border-radius: 6px;
        }

        .communication-all-tickets  {
            font-weight: bolder;
            border-bottom: 3px solid #08102E;
            color: #08102E !important;
        }

        .remittance-row {
            margin-bottom: 2rem;
        }
    </style>
    
    <div class="content-page" style="background: #e5e5e504;">
        <div class="content container-fluid">
            @include('account-office.section.account-nav-links')

        </div>
    </div>
@endsection
