@extends('main')
@section('content')
    <div class="content-page" style="background: #fff;">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid m15">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle mb-1 text-inter pb-0 pl-0">
                            Vehicle Management
                        </p>
                    </div>
                    {{-- <a href="/add-vehicle" class="addBtn addNew">ADD NEW</a> --}}
                </div>
                <ul class="sub-tabs">
                    <li class="vehicle-list-overview bbd">OVERVIEW</li>
                    <li class="vehicle-list-fleet">FLEET STATUS</li>
                    {{-- <li class="vehicle-list-fleet">
                        <a href="technical-desk">TECHNICAL</a>
                    </li> --}}
                    <li class="vehicle-list-track"> <a href="track-web">TRACK WEB</a> </li>
                    <li class="vehicle-list-card"><a href="motor-card">MOTOR CARD</a></li>
                    {{-- <li class="vehicle-list-card">MOTOR CARD</li> --}}
                </ul>

                <!-- overview -->
                @include('components.vehicle.overview')

                <!-- fleet -->
                @include('components.vehicle.fleet')

                <!-- track -->
                <div class="container-fluid mt-3 g-2 track_section">
                    {{-- <div class="track-map">
                    <img src="{{ asset('assets/images/big-graph.png') }}" alt="">
                </div> --}}
                    <div class="main-track-section">
                        <div class="left-track-cord"></div>
                        <div class="right-track-map"></div>
                        <!-- track -->
                        <div class="container-fluid mt-3 g-2 track_section">
                            <div class="track-map">
                                <img src="{{ asset('assets/images/big-graph.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end content -->
            </div>



            <script src="{{ asset('assets/js/chart.js') }} "></script>


            <script>
                const ctx = document.getElementById('top_x_div').getContext('2d');
                var datas = <?php echo json_encode($data); ?>

                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: '# of cars',
                            data: datas,
                            barPercentage: 0.5,
                            barThickness: 70,
                            maxBarThickness: 44,
                            minBarLength: 10,
                            highlightFill: "rgba((99,102,241)",
                            highlightStroke: "rgba(220,220,220,1)",
                            backgroundColor: 'rgba(161,163,247)'

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



            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Active Accounts', 11],
                        ['In-Active Accounts', 2],
                    ]);

                    var options = {
                        // title: 'Maintenance Summary',
                        pieHole: 0.6,
                        colors: ['#FFAC32', '#ffac75']
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart-3'));
                    chart.draw(data, options);
                }
            </script>
            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Total Assigned', {{ count($allVehicle) }} - {{ $noDriver }}],
                        ['Un-Assigned', {{ $noDriver }}],
                    ]);
                    var options = {
                        // title: 'Maintenance Summary',
                        pieHole: 0.6,
                        colors: ['#75E76B', '#79f99B']
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart-4'));
                    chart.draw(data, options);
                }
            </script>
            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Active', 11],
                        ['Due soon', 2],
                        ['Expired', 7]
                    ]);

                    var options = {
                        pieHole: 0.6,
                        colors: ['#79D2DE', '#FFB619', '#FF4A4A']
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                    chart.draw(data, options);
                }
            </script>
            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Active', 11],
                        ['Due soon', 2],
                        ['Expired', 7]
                    ]);

                    var options = {
                        pieHole: 0.6,
                        colors: ['#87DE79', '#FFB619', '#FF4A4A']
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart-2'));
                    chart.draw(data, options);
                }
            </script>


            <script type="text/javascript">
                var datas = <?php echo json_encode($data); ?>

                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawStuff);

                function drawStuff() {
                    var data = new google.visualization.arrayToDataTable([
                        ['Month', 'total'],
                        ["JAN", datas[1]],
                        ["FEB", datas[2]],
                        ["MAR", datas[3]],
                        ["APR", datas[4]],
                        ['MAY', datas[5]],
                        ['JUN', datas[6]],
                        ['JUL', datas[7]],
                        ['AUG', datas[8]],
                        ['SEP', datas[9]],
                        ['OCT', datas[10]],
                        ['NOV', datas[11]],
                        ['DEC', datas[12]],
                    ]);

                    var options = {
                        width: 800,
                        legend: {
                            position: 'none'
                        },
                        chart: {
                            title: 'summary',
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

                    // var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                    // Convert the Classic options to Material options.
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                };
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
            <script>
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
                        title: {
                            display: true
                        }
                    }
                });
            </script>


            <script>
                var yValues = [80, 49, 14];
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
                        title: {
                            display: true
                        }
                    }
                });
            </script>

            <script>
                var yValues = [70, 49, 44];
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
            </script>
        @endsection
