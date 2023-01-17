@extends('main')
@section('content')
    <div class="content-page bg-light-grey">
        {{-- <div class="content"> --}}
        <!-- Start Content-->
        <div class="container-fluid mt-3">
            <div class="finance_section mb-3">
                <div class="row ">
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="row_top_info">
                            <div class="top3">
                                <span>Reference Number</span>
                                <span class="arrow_box">
                                    <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="">
                                </span>
                            </div>
                            <span class="deposit_amount">
                                {{ $data->reference }}
                            </span>
                            <span class="total_info">
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="row_top_info">
                            <div class="top3">
                                <span>Amount Due</span>
                                <span class="arrow_box">
                                    <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="">
                                </span>
                            </div>
                            <span class="deposit_amount">
                                ₦ {{ number_format($data->amount_disbursed, 2) }}
                            </span>
                            <span class="total_info">
                                Total from {{ count($record) }} entries
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-4">
                        <div class="row_top_info">
                            <div class="top3">
                                <span>Status</span>
                                <span class="arrow_box">
                                    <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="">
                                </span>
                            </div>
                            <span class="deposit_amount">
                                {{ $data->status }}
                            </span>
                            <span class="total_info">
                                {{-- Total from 45 entries --}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="finance_section ">
                <div class="table-responsive pt-3">
                    <table id="datatable" class="table table-bordered nowrap"
                        style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                        <thead class="text-inter">
                            <tr>
                                <th>REFERENCE NO.</th>
                                <th>Plate No.</th>
                                <th>AMOUNT</th>
                                <th>Driver Name</th>
                                <th>Fleet</th>
                                <th>Reason</th>
                                <th>Date</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($record as $item)
                                <tr>
                                    <td> <a href="{{ route('payout-view', ['id' => $item->id]) }}">{{ $item->reference }}
                                        </a>
                                    </td>
                                    <td>{{ $item->vehiclePlateNo }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->driverName }}</td>
                                    <td>Fleet</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>Status</td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>



        </div>
        <!-- end container-fluid -->
        {{-- </div> --}}
        <!-- end content -->
    </div>
@endsection
