@extends('main')
@section('content')
    <div class="content-page bg-light-grey">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-10">
                <div class="main-report">
                    <!-- text-inter -->
                    <div class="top-row">
                        <div>
                          {{--  <p class="sectionTitle text-inter pb-0 pl-0">Report Module</p>--}}
                            <p class="sectionTitle text-inter pb-0 pl-0">Remittances</p>
                        </div>
                        <!-- end super filter modal -->
                        <div class="filter-calender reportModuleFilter">
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
                                <span class="closeBtn" id="closeBtn">X</span>
                            </div>
                            <ul class="filterList">
                                <li> <a href="{{ route('report-module') }}"> Default / Live </a></li>
                                <li> <a href="{{ route('reportModuleFilter2', ['date' => '7']) }}"> Last Week </a> </li>
                                <li> <a href="{{ route('reportModuleFilter2', ['date' => '30']) }}"> Past 30 days </a> </li>
                                <li> <a href="{{ route('reportModuleFilter2', ['date' => '90']) }}"> Last 3 months </a>
                                </li>
                                <li> <a href="{{ route('reportModuleFilter2', ['date' => '180']) }}"> Last 6 months </a>
                                </li>
                                <li> <a href="{{ route('reportModuleFilter2', ['date' => '365']) }}"> Last Year </a> </li>
                            </ul>
                            <form action="{{ route('reportModuleFilter') }}" method="post">
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
                                        style=" border: none; background: transparent; font-weight: bold; ">
                                        RESET</button>
                                    <button type="submit" class="btn ml-3"
                                        style=" background: #4a4aff; color: #fff; border-radius: 8px; font-weight: bold; ">
                                        SUBMIT
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3 g-2">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="boxInfo">
                                <div class="topInfo">
                                    <div class="vectorBox bg-light-blue">
                                        <img src="{{ asset('assets/images/graph.svg') }}" alt="" />
                                    </div>
                                    <span>PROJECTED INCOME</span>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1">REVENUE EXPECTED</span><br />
                                        <span class="lft2 text-inter" id="project"><span>&#8358;</span> <span
                                                id="load">{{ number_format($income ?? 0, 2) }}</span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="boxInfo text-dark">
                                <div class="topInfo">
                                    <div class="vectorBox2 bg-light-green">
                                        <img src="{{ asset('assets/images/shield.svg') }}" alt="" />
                                    </div>
                                    <span>PAID USERS</span>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1">ALL PAYMENT EARNED</span><br />
                                        <span class="lft2 text-inter text-dark" id="paidUser"><span>&#8358;</span> <span
                                                id="load2">{{ number_format($paid, 2) }}</span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="boxInfo text-dark">
                                <div class="topInfo">
                                    <div class="vectorBox">
                                        <img src="{{ asset('assets/images/vector.svg') }}" alt="" />
                                    </div>
                                    <span>UNPAID USERS</span>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1">TOTAL OUTSTANDING PAYMENT</span><br />

                                        <span class="lft2 text-inter text-dark " id="unpaid">

                                            <spanid="load3">
                                                @if ($unpaid < 0)
                                                    <span class="lft2 text-inter text-dark " id="unpaid">
                                                        +<span>&#8358;</span> <span id="load3">
                                                            {{ number_format(abs($unpaid), 2) }}
                                                        </span> </span>
                                                @else
                                                    <span class="lft2 text-inter text-dark " id="unpaid">
                                                        <span>&#8358;</span>
                                                        <span id="load3">
                                                            {{ number_format($unpaid, 2) }}
                                                        </span> </span>
                                                @endif


                                        </span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="boxInfo light-red">
                                <div class="topInfo">
                                    <div class="vectorBox bg-light-purple">
                                        <img src="{{ asset('assets/images/warning.svg') }}" alt="" />
                                    </div>
                                    <span class="black-text">PAYMENT DEPOT</span>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1 text-bold black-text">ALL OVERDUE &amp; OUTSTANDING
                                            PAYMENTS</span><br />
                                        <span class="lft2 text-inter" id="depot"> <span>&#8358;</span> <span
                                                id="load4">{{ number_format($depot, 2) }}</span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- graph -->
                    <div class="graph-section2 p-3">
                        {{-- <h4 class="header-title">REVENUE BY TREND</h4> --}}
                       {{-- <div id="barchart_material" style="height: 450px"></div> --}}
                        <canvas id="barchart_material" height="20vh" width="80vw"></canvas>
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
                    <li class="list-critical-payment ">
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


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
     <script src="{{ asset('assets/js/chart.js') }} "></script>
    <script>
        const ctx = document.getElementById('barchart_material').getContext('2d');
        var datas = <?php echo json_encode($paidUserChart); ?>

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

                datasets: [{
                    label: '# of traansactions',
                    data: datas,
                    barPercentage: 0.5,
                    barThickness: 70,
                    maxBarThickness: 44,
                    minBarLength: 10,
                    highlightFill: "green",
                    highlightStroke: "red",
                    backgroundColor: 'rgba(4, 4, 255, 0.406)'

                    // borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        gridLines: {
                            drawOnChartArea: false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            drawOnChartArea: false
                        }
                    }]
                }
            }
        });
    </script>
    
    
    <script type="text/javascript">
        var datas = <?php echo json_encode($paidUserChart); ?>

        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Paid Users'],
                ['Jan', datas[1], ],
                ['Feb', datas[2], ],
                ['Mar', datas[3], ],
                ['Apr', datas[4], ],
                ['May', datas[5], ],
                ['Jun', datas[6], ],
                ['Jul', datas[7], ],
                ['Aug', datas[8], ],
                ['Sep', datas[9], ],
                ['Oct', datas[10], ],
                ['Nov', datas[11], ],
                ['Dec', datas[12], ]
            ]);
            var options = {
                chart: {
                    title: 'Revenue by trend',
                    subtitle: '2022',
                },
                bars: 'vertical' // Required for Material Bar Charts.
            };
            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection

