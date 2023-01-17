@extends('main')
@section('content')
    <title>Zeus | Payout Manager</title>


    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid m15">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle text-inter pb-0 pl-0">Finance Office</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <ul class="sub-tabs pr-4">
                        <li class="list_finance_transaction">
                            <a href="finance-office">Deposit Module</a>
                        </li>
                        <li class="list_finance_remittance bbd">
                            <a href="payout-manager">Payout Manager</a>
                        </li>
                    </ul>

                    <div class="d-flex pl-4">

                        <div class="filter-calender mr-2 reportModuleFilter" onclick="showfilter()">
                            <div class="filterIcon">
                                <img src="{{ asset('assets/images/filter.svg') }}" alt="" />
                            </div>
                            <div class="filterCalender">
                                <span>FILTER:<span class="font-weight-bold">CUSTOM RANGE</span></span>
                                <img src="{{ asset('assets/images/calender.png') }}" alt="" />
                            </div>
                        </div>

                        <div class="filterModal">
                            <div class="topFilter">
                                <h3>Super Filter</h3>
                                <span class="closeBtn" id="closeBtn" onclick="hidefilter()">X</span>
                            </div>
                            <hr>
                            {{-- <ul class="filterList" style = "margin-top: -30px ">
                                <li> <a href="{{ route('code-red') }}"> Default / Live </a></li>
                                <li> <a href="{{ route('filterPayoutManeger2', ['date' => '30']) }}"> Past 30 days </a> </li>
                                <li> <a href="{{ route('filterPayoutManeger2', ['date' => '90']) }}"> Last 3 months </a> </li>
                                <li> <a href="{{ route('filterPayoutManeger2', ['date' => '180']) }}"> Last 6 months </a> </li>
                                <li> <a href="{{ route('filterPayoutManeger2', ['date' => '365']) }}"> Last Year </a> </li>
                            </ul> --}}
                            <form action="{{ route('filterPayoutManeger') }}" method="post" style="margin-top: -30px ">
                                @csrf
                                <div class="row row-dates ">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">By Fleet</label>
                                            <select name="fleet" id="" class="form-control">
                                                <option value="default">Default/All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">StakeHolders</label>
                                            <select name="stakeholder" id="" class="form-control">
                                                <option value="investor">Investors</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-dates selectPeriod" style=" margin-left:10px;  ">
                                    <div class="col-md-12">
                                        <ul class="sub-tabs ">
                                            <li class="specPeriod bbd" onclick="specPeriod()">
                                                Specific
                                            </li>
                                            <li class="range " onclick=" range()">
                                                Range
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row row-dates " id="specPeriod">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Specific Period</label>
                                            <input type="date" name="date" id="specDate" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-dates" id="range" style="display:none;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">START</label>
                                            <input type="date" name="startDate" id="startDate" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">STOP</label>
                                            <input type="date" name="endDate" id="endDate" class="form-control" />
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

                        <a href="/add-user" class="addBtn" data-bs-toggle="modal" data-bs-target="#generateReport">GENERATE
                            PAYOUT</a>
                    </div>
                    {{-- modal generate report --}}
                    <div class="modal fade" id="generateReport" tabindex="-1" aria-labelledby="generateReportLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('downloadCsv') }}" method="Post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">By Fleet</label>
                                            <select class="form-select">
                                                <option value="">Default / All</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Stakeholders</label>
                                            <select class="form-select">
                                                <option value="">Investors, Agents etc</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Specific Period</label>
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date Range</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="date" name="startDate" class="form-control"
                                                        placeholder="Start Date">
                                                    <small>start date</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="date" name="endDate" class="form-control"
                                                        placeholder="Stop Date">
                                                    <small>stop date</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn addBtn w-100">
                                                <i class="bx bx-shopping-bag"></i>
                                                <span class="ml-1">Generate Payout</span>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('components.message')
                <!-- track -->
                <div class="container-fluid mt-3 g-2 finance_remittance_table">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-3 mb-2">
                            <div class="row">
                                <div class="col-sm-6 col-md-12 mb-2">
                                    <div class="payment_console blue_shade">
                                        <div class="top_blue sky_shade" id="tb1">
                                            <img src="{{ asset('assets/images/logout.svg') }}" alt="">
                                        </div>
                                        <div class="desc_payment">
                                            <span>Payment Console</span>
                                            <span>
                                                {{-- <img src="{{ asset('assets/images/arrow-right.svg') }}" class="ar1 d-none"
                                                    alt=""> --}}
                                                {{-- <img src="{{ asset('assets/images/arrow-right2.svg') }}" class="ar2"
                                                    alt=""> --}}
                                            </span>
                                        </div>
                                        <span>0 new entries pending</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="payout_requests">
                                        <div class="top_blue sky_shade" id="tb2">
                                            <img src="{{ asset('assets/images/logout.svg') }}" alt="">
                                            {{-- <img src="{{ asset('assets/images/calabash.svg') }}" alt=""> --}}
                                        </div>
                                        <div class="desc_payment">
                                            <span>Payment Request(s)</span>
                                            <span>
                                                {{-- <img src="{{ asset('assets/images/arrow-right.svg') }}" class="ar3"
                                                    alt="">
                                                <img src="{{ asset('assets/images/arrow-right2.svg') }}"
                                                    class="ar4 d-none" alt=""> --}}
                                            </span>
                                        </div>
                                        <span>0 new entries pending</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-12 col-lg-9 payout_manager_section">
                            {{-- finance_section --}}
                            <!-- Button trigger modal -->
                            {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#modelId">
                                Launch
                            </button> --}}
                            @include('components.payoutManager.finance')
                        </div>

                        <div class="col-sm-6 col-md-12 col-lg-9 payout_request_section">
                            <div class="finance_section">
                                <div class="row">
                                    <div class="col-sm-6 col-md-12 col-lg-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Total Request(s)</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦0
                                            </span>
                                            <span class="total_info">
                                                Total from 0 entries
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-12 col-lg-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Processing Payment(s)</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦0
                                            </span>
                                            <span class="total_info">
                                                Total from 0 entries
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-12 col-lg-4">
                                        <div class="row_top_info">
                                            <div class="top3">
                                                <span>Pending Payment(s)</span>
                                                <span class="arrow_box">
                                                    <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="">
                                                </span>
                                            </div>
                                            <span class="deposit_amount">
                                                ₦0
                                            </span>
                                            <span class="total_info">
                                                Total from 0 entries
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-12 mt-2">
                                    <div class="finance_section">
                                        <div class="card-box table-responsive">
                                            <table id="datatable-buttons" class="table table-bordered nowrap"
                                                style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                                <thead class="text-inter">
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" class="check" />
                                                        </th>
                                                        <th>REFERENCE NO.</th>
                                                        <th>AMOUNT DUE</th>
                                                        <th>ORDER ID</th>
                                                        <th>STATUS</th>
                                                        <th>DATE</th>
                                                        <th>BENEFICIARY </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>
                                                            <input type="checkbox" class="check" />
                                                        </td>
                                                        <td>
                                                            RBC123XY
                                                        </td>
                                                        <td>₦35,000.00</td>
                                                        <td>MGA ABUJA</td>
                                                        <td>PENDING</td>
                                                        <td>23 Feb, 2021</td>
                                                        <td>GODWIN ADEJOH</td>
                                                        <td>
                                                            <button class="payNow">PAY NOW</button>
                                                        </td>
                                                    </tr>
                                                     --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>

    @include('components.payoutManager.modal')

    <script>
        let payment_console = document.querySelector('.payment_console');
        let payout_requests = document.querySelector('.payout_requests');

        let payout_manager_section = document.querySelector('.payout_manager_section');
        let payout_request_section = document.querySelector('.payout_request_section');

        let tb1 = document.querySelector('#tb1');
        let tb2 = document.querySelector('#tb2');

        payment_console.addEventListener('click', () => {
            payment_console.classList.add('blue_shade');
            payout_requests.classList.remove('blue_shade');
            payout_manager_section.style.display = 'block';
            payout_request_section.style.display = 'none';

        });
        payout_requests.addEventListener('click', () => {
            payout_requests.style.display = 'nnoe';
            payment_console.classList.remove('blue_shade');
            payout_requests.classList.add('blue_shade');
            payout_manager_section.style.display = 'none';
            payout_request_section.style.display = 'block';
        });
    </script>
    <script>
        function showfilter() {
            let filterModal = document.querySelector('.filterModal');
            filterModal.style.display = 'block';
        }

        function hidefilter() {
            let filterModal = document.querySelector('.filterModal');
            filterModal.style.display = 'none';
        }

        function specPeriod() {
            let specPeriod = document.querySelector('.specPeriod');
            let range = document.querySelector('.range');

            specPeriod.classList.add('bbd');
            range.classList.remove('bbd');

            document.querySelector('#range').style.display = 'none';
            document.querySelector('#specPeriod').style.display = 'block';
            document.getElementById("startDate").disabled = true;
            document.getElementById("endDate").disabled = true;
            document.getElementById("specDate").disabled = false;
        }

        function range() {
            let range = document.querySelector('.range');
            let specPeriod = document.querySelector('.specPeriod');

            range.classList.add('bbd');
            specPeriod.classList.remove('bbd');

            document.querySelector('#range').style.display = 'block';
            document.querySelector('#specPeriod').style.display = 'none';
            document.getElementById("startDate").disabled = false;
            document.getElementById("endDate").disabled = false;
            document.getElementById("specDate").disabled = true;
        }

        console.log(document.getElementById("subTotal").value);
        document.getElementById("showTotal").innerText = document.getElementById("subTotal").value;
        let reportModuleFilter = document.querySelector('.reportModuleFilter');
        let ae1 = document.querySelector('.ae1');
        let ar2 = document.querySelector('.ar2');
        let ar3 = document.querySelector('.ar3');
        let ar4 = document.querySelector('.ar4');

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
        document.querySelector('.specPeriod').addEventListener('click', () => {
            document.querySelector('#range').style.display = 'none';
            document.querySelector('#specPeriod').style.display = 'block';
            document.getElementById("startDate").disabled = true;
            document.getElementById("endDate").disabled = true;
            document.getElementById("specDate").disabled = false;
        });
        document.querySelector('.range').addEventListener('click', () => {
            document.querySelector('#range').style.display = 'block';
            document.querySelector('#specPeriod').style.display = 'none';
            document.getElementById("startDate").disabled = false;
            document.getElementById("endDate").disabled = false;
            document.getElementById("specDate").disabled = true;
        });
        document.querySelector('.close').addEventListener('click', () => {
            searchModal.style.display = 'none';
            $('#searchModal').modal('hide')
            // closeBtn.style.display = 'none';
        });
    </script>
    @if ($modal == 'true')
        <script>
            $(document).ready(function() {
                $('#searchModal').modal('show');
                $('#close').click(function() {
                    $('#searchModal').modal('hide');
                })
            });
        </script>

        <script src="{{ asset('assets/js/chart.js') }} "></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ]
                });
            });
        </script>
    @endif
@endsection
