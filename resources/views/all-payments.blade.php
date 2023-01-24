@extends('main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-10">
                <div class="paymentRecieved">
                    <div class="top-row">
                        <div>
                            <p class="sectionTitle text-inter pb-0 pl-0">
                                <img src="{{ asset('assets/images/arrow-left.svg') }}" alt="" />
                                Remittances / Total Payments
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
                        <div class="filter-calender reportModuleFilter">
                            <div class="filterIcon">
                                <img src="{{ asset('assets/images/filter.svg') }}" alt="" />
                            </div>
                            <div class="filterCalender">
                                <span>FILTER:<b>CUSTOM RANGE</b></span>
                                <img src="{{ asset('assets/images/calender.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="filterModal">
                            <div class="topFilter">
                                <h3>Super Filter</h3>
                                <span class="closeBtn">X</span>
                            </div>
                            <ul class="filterList">
                                <li> <a href="{{ route('all-payments') }}"> Default / Live </a></li>
                                <li> <a href="{{ route('allPaymentFilter2', ['date' => '7']) }}"> Last Week </a> </li>
                                <li> <a href="{{ route('allPaymentFilter2', ['date' => '30']) }}"> Past 30 days </a> </li>
                                <li> <a href="{{ route('allPaymentFilter2', ['date' => '90']) }}"> Last 3 months </a> </li>
                                <li> <a href="{{ route('allPaymentFilter2', ['date' => '180']) }}"> Last 6 months </a> </li>
                                <li> <a href="{{ route('allPaymentFilter2', ['date' => '365']) }}"> Last Year </a> </li>


                            </ul>
                            <form action="{{ route('allPaymentFilter') }}" method="post">
                                @csrf
                                <div class="row row-dates">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">START</label>
                                            <input type="date" name="startDate" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">STOP</label>
                                            <input type="date" name="endDate" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="filterFooter">
                                    <button class="btn text-dark closeBtn"
                                        style=" border: none;background: transparent; font-weight: bold; ">
                                        RESET</button>
                                    <button type="submit" class="btn ml-3"
                                        style=" background: #4a4aff; color: #fff; border-radius: 8px; font-weight: bold; ">
                                        SUBMIT
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <!-- table -->
                    <div class="row pt-2">
                        <div class="col-12">
                            <div class="card-box table-responsive">

                                {{--    <button  
                                    class="btn btn-success" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#mymodal"
                                    data-bs-heading="GeeksforGeeks Practice Portal"
                                    data-bs-footercontent="Visit the Practice Portal for more details"
                                    data-bs-modalcontent="Using GFG's Practice portal you can 
                                    practice on you problem soving skills.">
                                    Open Modal for Practice Portals
                                </button>
                                    --}}
                                <table id="datatable-buttons"
                                    class="table table-bordered nowrap"style=" border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="text-inter">
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="check" />
                                            </th>
                                            <th>PLATE NO.</th>
                                            <th>DRIVER NAME</th>
                                            <th>PHONE NO.</th>
                                            {{--  <th>GPS STATUS</th> --}}
                                            <th>AMOUNT</th>
                                            <th>TRANS ID</th>
                                            <th>PAYMENT DATE</th>
                                            {{-- <th>DESCRIPTION</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{dd($data)}} --}}
                                        @if ($data)
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td> <input type="checkbox" class="check" /></td>
                                                    <td>
                                                        @if (Auth()->user()->email == 'accounts@thankucash.com')
                                                            {{ substr($item->vehno, 0, 3) }}****
                                                        @else
                                                            <a href="" data-bs-toggle="modal"
                                                                data-bs-target="#mymodal"
                                                                data-bs-vehno="{{ $item->vehno }}"
                                                                data-bs-fleet="{{ $item->fleet }}"
                                                                data-bs-ref="{{ $item->orderid ?? '-' }}"
                                                                data-bs-drivername="{{ $item->drivername ?? '-' }}"
                                                                data-bs-amount="₦ {{ number_format($item->needpayment, 2) }}"
                                                                data-bs-date="{{ \Carbon\Carbon::parse($item->createtime)->format('Y-m-d: h:i a') ?? '-' }}"
                                                                data-bs-date2="{{ \Carbon\Carbon::parse($item->createtime)->format('Y-m-d: h:i a') ?? '-' }}">

                                                                {{ $item->vehno ?? '-' }}
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        @if (Auth()->user()->email == 'accounts@thankucash.com')
                                                            {{ substr($item->drivername, 0, 3) }}****
                                                        @else
                                                            {{ $item->drivername ?? '-' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (Auth()->user()->email == 'accounts@thankucash.com')
                                                            {{ substr($item->driverphone, 0, 4) }}****
                                                        @else
                                                            {{ $item->driverphone ?? '-' }}
                                                        @endif


                                                    </td>
                                                    {{-- <td>
                                                        @if (!empty($item->time))
                                                            {{ \Carbon\Carbon::parse($item->time)->diffForHumans() }}
                                                        @else
                                                            UNKNOW
                                                        @endif
                                                    </td>
                                                    --}}
                                                    <td><span>&#8358;</span> {{ number_format($item->needpayment, 2) }}
                                                    </td>
                                                    <td>{{ $item->orderid ?? '-' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->createtime)->format('Y-m-d: h:i a') ?? '-' }}
                                                    </td>
                                                    {{-- <td>{{ $item->note ?? "null" }}</td> --}}
                                                </tr>
                                            @endforeach
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




                {{-- modal --}}
                <div class="modal fade" id="mymodal" id="allPayment" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="width: 400px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TRANSACTION DETAILS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="everyInfo">
                                    <p class="info-text-top" style="font-size:11px;">
                                        Generated from MotorAfrica on <span class="date"> </span>
                                    </p>
                                    <div class="formSec container-fluid"
                                        style="background: #fafafa; border-radius: 6px; height: auto">
                                        <div>
                                            <div class="row mb-3">
                                                <div class="col-6 side1">Date:</div>
                                                <div class="col-6 side2 date2">30 Sep, 2021</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 side1">Driver Name:</div>
                                                <div class="col-6 side2 drivername">MyGarage</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 side1">Vehno:</div>
                                                <div class="col-6 side2 vehno">MyGarage</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 side1 ">Amount</div>
                                                <div class="col-6 side2 amount"></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 side1">Fleet:</div>
                                                <div class="col-6 side2 fleets">MyGarage</div>
                                            </div>


                                            {{-- <div class="row mb-3">
                                                <div class="col-6 side1">Package:</div>
                                                <div class="col-6 side2 packages">Hire Purchase</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 side1">Workshop:</div>
                                                <div class="col-6 side2 workshop">AutoChek Lugbe Centre</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 side1">Commission:</div>
                                                <div class="col-6 side2 commission">4%</div>
                                            </div>
                                              --}}
                                            <div class="row">
                                                <div class="col-6 side1">Transaction Id:</div>
                                                <div class="col-6 side2 ref">3456WTY</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer footer-row">
                                <button type="button" class="btn w-100 modalWideBtn" style=" ">SHARE</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- sub tab -->
                <ul class="sub-tabs pt-2">
                    <li class="list-payment bbd">
                        <a href="{{ route('all-payments') }}">Payments Recieved</a>
                    </li>
                    <li class="list-due-payment">
                        <a href="{{ route('due-payments') }}">Due Payments</a>
                    </li>
                    <li class="list-overdue-payment">
                        <a href="{{ route('overdue-payments') }}">Overdue Payments</a>
                    </li>
                    <li class="list-critical-payment">
                        <a href="{{ route('critical-payments') }}">Critical Payments</a>
                    </li>
                    <li class="list-color">
                        <a href="{{ route('code-red') }}">Code Red</a>
                    </li>
                </ul>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
    <script>
        const myModal = document.querySelector('#mymodal');
        myModal.addEventListener('show.bs.modal', function(event) {
            // Get the reference of the triggering button
            const button = event.relatedTarget;

            // Get the data for inserting into modal
            // const heading = button.getAttribute('data-bs-heading');
            // const modalcontent = button.getAttribute('data-bs-modalcontent');
            const amount = button.getAttribute('data-bs-amount');
            const date = button.getAttribute('data-bs-date');
            const date2 = button.getAttribute('data-bs-date2');

            const fleet = button.getAttribute('data-bs-fleet');
            const ref = button.getAttribute('data-bs-ref');
            const vehno = button.getAttribute('data-bs-vehno');
            const drivername = button.getAttribute('data-bs-drivername');
            // const footercontent = button.getAttribute('data-bs-footercontent');

            // Set the value in the modal
            // myModal.querySelector('.modal-title').textContent = heading;
            // myModal.querySelector('.modal-body').textContent = modalcontent;
            myModal.querySelector('.amount').textContent = amount;
            myModal.querySelector('.date').textContent = date;
            myModal.querySelector('.date2').textContent = date2;
            myModal.querySelector('.fleets').textContent = fleet;
            myModal.querySelector('.ref').textContent = ref;
            myModal.querySelector('.vehno').textContent = vehno;
            myModal.querySelector('.drivername').textContent = drivername;
            // myModal.querySelector('.modal-footer').textContent = footercontent;
        });
    </script>


    <script>
        let reportModuleFilter = document.querySelector('.reportModuleFilter');
        let filterModal = document.querySelector('.filterModal');
        let closeBtn = document.querySelector('#closeBtn');

        reportModuleFilter.addEventListener('click', () => {
            filterModal.style.display = 'block';
            // closeBtn.style.display = 'none';
        });
        closeBtn.addEventListener('click', () => {
            filterModal.style.display = 'none';
            // closeBtn.style.display = 'none';
        });
    </script>


@endsection
