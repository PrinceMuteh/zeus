@extends('main')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-10">
                <div class="paymentRecieved">
                    <div class="top-row">
                        <div>
                            <p class="sectionTitle text-inter pb-0 pl-0">
                                <img src="{{ asset('assets/images/arrow-left.svg') }}" alt="" />
                                Report Module / Total Payments
                                <span class="ml-2">
                                    ( <span>&#8358;</span> {{ number_format($totalAmount, 2) }} )
                                </span>
                                / Payment Count
                                <span class="ml-2">
                                    @if ($data)
                                        ( {{ number_format(count($data)) }} )
                                    @endif

                                </span>

                            </p>
                        </div>
                        {{-- <div class="filter-calender">
                            <div class="filterIcon">
                                <img src="{{ asset('assets/images/filter.svg') }}" alt="" />
                            </div>
                            <div class="filterCalender">
                                <span>FILTER:<b>CUSTOM RANGE</b></span>
                                <img src="{{ asset('assets/images/calender.png') }}" alt="" />
                            </div>
                        </div> --}}
                    </div>

                    <!-- table -->
                    <div class="row pt-2">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-bordered nowrap"
                                    style="
                    border-collapse: collapse;
                    border-spacing: 0;
                    width: 100%;
                  ">
                                    <thead class="text-inter">
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="check" />
                                            </th>
                                            <th>PLATE NO.</th>
                                            <th>DRIVER NAME</th>
                                            <th>PHONE NO.</th>
                                            <th>Last Updated</th>
                                            <th>AMOUNT</th>
                                            <th>FLEET</th>
                                            <th>DUE DATE</th>
                                            <th>LAST PAYMENT DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{ dd($data) }} --}}
                                        @if ($data)
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="check" />
                                                    </td>
                                                    <td>

                                                        @if (Auth()->user()->email == 'accounts@thankucash.com')
                                                            {{ substr($item->vehno, 0, 3) }}****
                                                        @else
                                                            <a
                                                                href="{{ route('userInfo', ['phone' => $item->driverphone, 'plate' => $item->vehno, 'investorphone' => $item->investorphone]) }}">
                                                                {{ $item->vehno }}
                                                            </a>
                                                        @endif


                                                    </td>
                                                    <td>
                                                        @if (Auth()->user()->email == 'accounts@thankucash.com')
                                                            {{ substr($item->drivername, 0, 3) }}****
                                                        @else
                                                            {{ $item->drivername }}
                                                        @endif


                                                    </td>
                                                    <td>
                                                        @if (Auth()->user()->email == 'accounts@thankucash.com')
                                                            {{ substr($item->driverphone, 0, 3) }}****
                                                        @else
                                                            <a
                                                                href="{{ route('userInfo', ['phone' => $item->driverphone, 'plate' => $item->vehno, 'investorphone' => $item->investorphone]) }}">
                                                                {{ $item->driverphone }}
                                                            </a>
                                                        @endif




                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($item->time)->format('d-m-Y h:i a') }}
                                                    </td>

                                                    </td>
                                                    <td><span>&#8358;</span> {{ number_format($item->needpayment, 2) }}
                                                    </td>
                                                    <td>
                                                        @if (Auth()->user()->email == 'accounts@thankucash.com')
                                                            {{ substr($item->bodytypename, 0, 3) }}****
                                                        @else
                                                            <a
                                                                href="{{ route('userInfo', ['phone' => $item->driverphone, 'plate' => $item->vehno, 'investorphone' => $item->investorphone]) }}">
                                                                {{ $item->bodytypename }}
                                                            </a>
                                                        @endif


                                                    </td>
                                                    <td>{{ $item->duetime }}</td>
                                                    <td>{{ $item->createtime }}</td>

                                                </tr>
                                            @endforeach
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- sub tab -->
                <ul class="sub-tabs pt-2">
                    <li class="list-payment">
                        <a href=" {{ route('all-payments') }}">Payments Recieved</a>
                    </li>
                    <li class="list-due-payment bbd">
                        <a href=" {{ route('due-payments') }}">Due Payments</a>
                    </li>
                    <li class="list-overdue-payment">
                        <a href=" {{ route('overdue-payments') }}">Overdue Payments</a>
                    </li>
                    <li class="list-critical-payment">
                        <a href=" {{ route('critical-payments') }}">Critical Payments</a>
                    </li>
                    <li class="list-color">
                        <a href=" {{ route('code-red') }}">Code Red</a>
                    </li>
                </ul>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection
