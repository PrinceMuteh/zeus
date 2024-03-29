@extends('main')
@section('content')
    @php
        if (Auth()->user()->user_type_name == 'Demo') {
            $totalAssigned = $totalVehicle->count() - $nodriver->count() + 999;
            $unAssigned = $nodriver->count() - 276;
            $totalAssetValue = number_format(2000000 * ($totalUsers->count() - $totalUsers->where('status', 5)->count()));
            $maintenaceActive = 2011;
            $maintenanceDue = 705;
            $overDue = 43;

            $documentExpired = 540;
            $documentDue = 1700;
            $documentActive = 6033;

            $envioBox = number_format(($totalUsers->count() - $totalUsers->where('status', 5)->count()) * 50000);
        } else {
            $totalAssigned = $totalVehicle->count() - $nodriver->count();
            $unAssigned = $nodriver->count();
            $totalAssetValue = number_format(2000000 * ($totalUsers->count() - $totalUsers->where('status', 5)->count()));

            $envioBox = number_format(($totalUsers->count() - $totalUsers->where('status', 5)->count()) * 50000);

            $maintenaceActive = 1;
            $maintenanceDue = 1;
            $overDue = 1;

            $documentExpired = 0;
            $documentDue = 0;
            $documentActive = 0;
        }
    @endphp
    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-2">
                <!-- text-inter -->
                <div class="top-row">
                    <span class="sectionTitle text-inter pb-0 pl-0">
                        Dashboard
                    </span>
                </div>
                <div class="home-row">
                    <div class="top-banner-100">
                        <div class="top-row-banner">
                            <span class="title-100">Hello, {{ auth()->user()->first_name }}
                                ({{ auth()->user()->user_type }})</span>
                            <img src="{{ asset('assets/images/computer.png') }}" class="computer_img" alt="">
                        </div>
                        <div class="mt-4 graph-home p-2 w-100">
                            <canvas id="top_x_div"></canvas>
                        </div>
                        <div class="row pt-2" style="margin-bottom:5px">
                            <div class="col-sm-6 col-md-6 pl-4 pr-4 pb-2 pt-2 first-col-100">
                                <div class="revenue-balance">
                                    <span class="inner-sub-100">Total Transaction(s)</span>
                                    <span class="inner-sub-100"><span class="counter">
                                            @if (Auth()->user()->user_type_name == 'Demo')
                                                {{ number_format($totalTransaction->count() * 1.5, 0) }}
                                            @else
                                                {{ number_format($totalTransaction->count()) }}
                                            @endif
                                        </span></span>
                                </div>
                                <div class="revenue-balance">
                                    <span class="inner-sub-100">Total Transaction Volume</span>
                                    <span class="inner-sub-100">₦ <span class="counter">
                                            @if (Auth()->user()->user_type_name == 'Demo')
                                                {{ number_format($totalTransaction->sum('needpayment') + 284821005) }}
                                            @else
                                                {{ number_format($totalTransaction->sum('needpayment')) }}
                                            @endif
                                        </span></span>
                                </div>
                                <div class="revenue-balance">
                                    <span class="inner-sub-100">Transaction Commission</span>
                                    <span class="inner-sub-100">₦ <span class="counter">
                                            {{ number_format(($totalTransaction->sum('needpayment') + 284821005) * 0.15) }}
                                        </span></span>
                                </div>
                                <div class="sideLine-col"></div>
                            </div>

                            <div class="col-sm-6 col-md-6 pl-4 pr-4 pb-2 pt-2">
                                <div class="revenue-balance">
                                    <span class="inner-sub-100">Total Asset Value</span>
                                    <span class="inner-sub-100">₦ <span class="counter">{{ $totalAssetValue }}
                                        </span></span>
                                </div>
                                <div class="revenue-balance">
                                    <span class="inner-sub-100">envioBox GPS System</span>
                                    <span class="inner-sub-100">₦ <span class="counter">{{ $envioBox }}</span></span>
                                </div>
                                <div class="revenue-balance">
                                    <span class="inner-sub-100">Active Locations</span>
                                    <span class="inner-sub-100"><span class="counter">4</span></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="right-side-home">
                        <div class="top-finance-heading">
                            <span class="title-250">User Overview</span>
                            <a href="add-user" class="addBtn-100">ADD NEW</a>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 p-3 d-flex flex-column justify-content-center">
                                <canvas id="myChart3"></canvas>
                            </div>
                            <div
                                class="col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center justify-cotent-center">
                                <div>
                                    <span class="value-donut mb-2 mt-3">
                                        <div class="dot-100 mr-2 bg-orange-100"></div>
                                        <div>
                                            <div class="t-100">Active Accounts</div>
                                            <div class="t-200">
                                                {{ $totalUsers->count() - $totalUsers->where('status', 5)->count() }}
                                            </div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-2">
                                        <div class="dot-100 mr-2 bg-orange-200"></div>
                                        <div>
                                            <div class="t-100">In-Active Accounts</div>
                                            <div class="t-200">

                                                {{ $totalUsers->where('status', 5)->count() + 300 }}
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="right-side-home-2">
                        <div class="top-finance-heading">
                            <span class="title-250 adjust-title">Document Status</span>
                        </div>
                        <div class="row">
                            <div
                                class="col-sm-6 col-md-6 col-lg-6 p-3 d-flex flex-column align-items-center justify-content-center">
                                <canvas id="myChart"></canvas>
                            </div>
                            <div
                                class="col-sm-6 col-md-6 col-lg-6 d-flex flex-column justify-content-center align-items-center">
                                <div>
                                    <span class="value-donut mb-3 mt-3">
                                        <div class="dot-100 mr-2 bg-blue-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Active:</div>
                                            <div class="t-200">{{ number_format($documentActive) }}</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-3">
                                        <div class="dot-100 mr-2 bg-gold-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Due Soon</div>
                                            <div class="t-200">{{ number_format($documentDue) }}</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-3">
                                        <div class="dot-100 mr-2 bg-red-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Expired</div>
                                            <div class="t-200">{{ number_format($documentExpired) }}</div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right-side-home-3">
                        <div class="top-finance-heading">
                            <span class="title-250 adjust-title">Maintenance Summary</span>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 p-3 d-flex flex-column justify-content-center">
                                <canvas id="myChart2" class="mt-4"></canvas>
                            </div>
                            <div
                                class="col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center justify-content-center">
                                <div>
                                    <span class="value-donut mb-2 mt-3">
                                        <div class="dot-100 mr-2 bg-green-400"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Active:</div>
                                            <div class="t-200"> {{ number_format($maintenaceActive) }}</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-3">
                                        <div class="dot-100 mr-2 bg-gold-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Due Soon</div>
                                            <div class="t-200">{{ number_format($maintenanceDue) }}</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-3">
                                        <div class="dot-100 mr-2 bg-red-100"></div>
                                        <div class="d-flex">
                                            <div class="t-200 mr-1">Overdue</div>
                                            <div class="t-200"> {{ number_format($overDue) }}</div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right-side-home-4">
                        <div class="top-finance-heading">
                            <span class="title-250">Fleet Overview</span>
                            <a href="add-vehicle" class="addBtn-100">ADD NEW</a>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 p-3 d-flex flex-column justify-content-center">
                                <canvas id="myChart4"></canvas>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
                                <div>
                                    <span class="value-donut mb-1 mt-3">
                                        <div class="dot-100 mr-2 bg-green-100"></div>
                                        <div>
                                            <div class="t-100">Total Assigned</div>
                                            <div class="t-200">
                                                {{ $totalAssigned }}</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-1">
                                        <div class="dot-100 mr-2 bg-green-200"></div>
                                        <div>
                                            <div class="t-100">Un- Assigned</div>
                                            <div class="t-200">{{ $unAssigned }}</div>
                                        </div>
                                    </span>
                                    <span class="value-donut mb-4">
                                        <div class="dot-100 mr-2 bg-green-300"></div>
                                        <div>
                                            <div class="t-100">Others</div>
                                            <div class="t-200">0</div>
                                        </div>
                                    </span>
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

    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- <script src="{{ asset('assets/js/chart.js') }} "></script> --}}


    <script>
        const ctx = document.getElementById('top_x_div').getContext('2d');
        var datas = <?php echo json_encode($datas); ?>

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
                            drawOnChartArea: true
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            drawOnChartArea: true
                        }
                    }]
                }
            }
        });
    </script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Total Assigned', {{ $totalVehicle->count() ?? 2011 }}],
                ['Un-Assigned', {{ $nodriver->count() ?? 0 }}],
                ['Other', 0],
            ]);

            var options = {
                // title: 'Maintenance Summary',
                pieHole: 0.6,
                colors: ['#75E76B', '#79f99B', '#44953D'],
                legend: 'none'
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart-4'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        var datas = <?php echo json_encode($datas); ?>

        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Month', 'total'],
                ["JAN", datas[0]],
                ["FEB", datas[1]],
                ["MAR", datas[2]],
                ["APR", datas[3]],
                ['MAY', datas[4]],
                ['JUN', datas[5]],
                ['JUL', datas[6]],
                ['AUG', datas[7]],
                ['SEP', datas[8]],
                ['OCT', datas[9]],
                ['NOV', datas[10]],
                ['DEC', datas[11]],
            ]);

            var options = {
                width: 800,
                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'Revenue Trend',
                    subtitle: ''
                },
                axes: {
                    x: {
                        0: {
                            side: 'bottom',
                            label: ''
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "60%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>


    <script>
        var yValues = [{{ $documentActive }}, {{ $documentDue }}, {{ $documentExpired }}];
        var barColors = [
            "#79D2DE",
            "#FFB619",
            "#FF4A4A"
        ];

        new Chart("myChart", {
            type: "doughnut",
            data: {
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true
                }
            }
        });

        var yValues = [{{ $maintenaceActive }}, {{ $maintenanceDue }}, {{ $overDue }}];
        var barColors = [
            "#87DE79",
            "#FFB619",
            "#FF4A4A"
        ];

        new Chart("myChart2", {
            type: "doughnut",
            data: {
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                cutoutPercentage: 60,
            }
        });

        var yValues = [80, 49];
        var barColors = [
            "#FFAC32",
            "#FFAC3259"
        ];

        new Chart("myChart3", {
            type: "doughnut",
            data: {
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                cutoutPercentage: 60,
            }
        });

        var yValues = [80, 49, 120];
        var barColors = [
            "#44953D",
            "#91f16B",
            "#75E76B"
        ];

        new Chart("myChart4", {
            type: "doughnut",
            data: {
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                cutoutPercentage: 60,

            }
        });
    </script>
@endsection
