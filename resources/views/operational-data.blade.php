@extends('main')
@section('content')
    <style>
        div.scroll {
            /* background-color: #fed9ff; */
            /* width: 600px; */
            max-height: 600px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: center;
            padding: 20px;
        }
    </style>

    <title>Zeus | Vehicle Profile</title>
    <div class="content-page" style="background: #fff; height: auto">
        <div class="content card-bg">
            <div class="container-fluid main-operations">
                <div class="top-row d-flex justify-content-between" style="overflow: visible">
                    <p class="sectionTitle text-inter pb-0 pl-0 ml-3">
                        Operational Data
                    </p>
                </div>
                <ul class="vehicle-top-list border-bottom-0">
                    <li class="active-top-list gpsBtn">GPS & ANALYTICS</li>
                    <li class="operationsBtn">OPERATIONS DATA</li>
                    <li class="peopleBtn">PEOPLE</li>

                    <li class="alertBtn">ALERT(S)</li>


                    <li class="communicationBtn">COMMUNICATION</li>
                </ul>

                @include('components.operational.alert-section')

                @include('components.operational.gps-section')
                @include('components.operational.basic-info')
                @include('components.operational.people')
                @include('components.operational.communication')
                @include('components.operational.activity-log')



            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="{{ asset('assets/js/chart.js') }} "></script>


        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.users').select2({
                    placeholder: 'Select an option'
                });
            });
        </script>




        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            const ctx = document.getElementById('top_x_divs').getContext('2d');
            var datas = <?php echo json_encode($chart); ?>
            // var datas 
            // console.log(datas);

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

                    datasets: [{
                        label: '# of traansactions',
                        data: datas,
                        barPercentage: 0.5,
                        barThickness: 30,
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



        <script>
            let actBtn = document.querySelector('.activityBtn');
            let activityLog = document.querySelector('.activity-log');
            let gpsBtn = document.querySelector('.gpsBtn');
            let communicationBtn = document.querySelector('.communicationBtn');
            let operationsBtn = document.querySelector('.operationsBtn');
            let alertBtn = document.querySelector('.alertBtn');
            let peopleBtn = document.querySelector('.peopleBtn');
            let gpsSec = document.querySelector('.gps-section');
            let peopleSec = document.querySelector('.people-section');
            let basicInfoSec = document.querySelector('.basic-info-section');
            let alertSec = document.querySelector('.alert-section');
            let communicationSec = document.querySelector('.communication-sec');

            communicationBtn.addEventListener('click', () => {
                gpsBtn.classList.remove('active-top-list');
                alertBtn.classList.remove('active-top-list');
                operationsBtn.classList.remove('active-top-list');
                gpsSec.style.display = 'none';
                basicInfoSec.style.display = 'none';
                alertSec.style.display = 'none';
                peopleBtn.classList.remove('active-top-list');
                peopleSec.style.display = 'none';
                communicationBtn.classList.add('active-top-list');
                communicationSec.style.display = 'block';
                activityLog.style.display = 'none';
            })
            gpsBtn.addEventListener('click', () => {
                gpsBtn.classList.add('active-top-list');
                alertBtn.classList.remove('active-top-list');
                operationsBtn.classList.remove('active-top-list');
                gpsSec.style.display = 'block';
                basicInfoSec.style.display = 'none';
                peopleBtn.classList.remove('active-top-list');
                peopleSec.style.display = 'none';
                alertSec.style.display = 'none';
                communicationBtn.classList.remove('active-top-list');
                communicationSec.style.display = 'none';
                activityLog.style.display = 'none';

            })
            operationsBtn.addEventListener('click', () => {
                gpsBtn.classList.remove('active-top-list');
                alertBtn.classList.remove('active-top-list');
                operationsBtn.classList.add('active-top-list');
                gpsSec.style.display = 'none';
                basicInfoSec.style.display = 'block';
                alertSec.style.display = 'none';
                peopleBtn.classList.remove('active-top-list');
                peopleSec.style.display = 'none';
                communicationBtn.classList.remove('active-top-list');
                communicationSec.style.display = 'none';
                activityLog.style.display = 'none';

            })
            alertBtn.addEventListener('click', () => {
                gpsBtn.classList.remove('active-top-list');
                alertBtn.classList.add('active-top-list');
                operationsBtn.classList.remove('active-top-list');
                gpsSec.style.display = 'none';
                basicInfoSec.style.display = 'none';
                alertSec.style.display = 'block';
                peopleBtn.classList.remove('active-top-list');
                peopleSec.style.display = 'none';
                communicationBtn.classList.remove('active-top-list');
                communicationSec.style.display = 'none';
                activityLog.style.display = 'none';

            })
            peopleBtn.addEventListener('click', () => {
                gpsBtn.classList.remove('active-top-list');
                alertBtn.classList.remove('active-top-list');
                operationsBtn.classList.remove('active-top-list');
                gpsSec.style.display = 'none';
                basicInfoSec.style.display = 'none';
                alertSec.style.display = 'none';
                peopleBtn.classList.add('active-top-list');
                peopleSec.style.display = 'block';
                communicationBtn.classList.remove('active-top-list');
                communicationSec.style.display = 'none';
                activityLog.style.display = 'none';

            })
            communicationBtn.addEventListener('click', () => {
                gpsBtn.classList.remove('active-top-list');
                alertBtn.classList.remove('active-top-list');
                operationsBtn.classList.remove('active-top-list');
                gpsSec.style.display = 'none';
                basicInfoSec.style.display = 'none';
                alertSec.style.display = 'none';
                peopleBtn.classList.remove('active-top-list');
                peopleSec.style.display = 'none';
                communicationBtn.classList.add('active-top-list');
                communicationSec.style.display = 'block';
                activityLog.style.display = 'none';

            })

            actBtn.addEventListener('click', () => {
                gpsBtn.classList.remove('active-top-list');
                alertBtn.classList.remove('active-top-list');
                operationsBtn.classList.remove('active-top-list');
                gpsSec.style.display = 'none';
                basicInfoSec.style.display = 'none';
                alertSec.style.display = 'none';
                peopleBtn.classList.remove('active-top-list');
                peopleSec.style.display = 'none';
                communicationBtn.classList.remove('active-top-list');
                communicationSec.style.display = 'none';
                activityLog.style.display = 'block';
                actBtn.classList.add('active-top-list');
            })
        </script>



        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Total Assigned', 2],
                    ['Un-Assigned', 2],
                    ['Other', 2],
                ]);

                var options = {
                    // title: 'Maintenance Summary',
                    pieHole: 0.6,
                    colors: ['#75E76B', '#79f99B', '#44953D']
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart-4'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawStuff);

            function drawStuff() {
                var data = new google.visualization.arrayToDataTable([
                    ['Move', 'Percentage', {
                        role: 'style'
                    }],
                    ["1", 300, 'color: gray'],
                    ["2", 400, 'color: gray'],
                    ["3", 760, 'color: gray'],
                    ["4", 500, 'color: gray'],
                    ["5", 400, 'color: gray'],
                    ["6", 490, 'color: gray'],
                    ["7", 300, 'color: gray'],
                    ["8", 320, 'color: gray'],
                    ["9", 450, 'color: gray'],
                    ['10', 550, 'color: gray'],
                    ["11", 100, 'color: gray'],
                    ["12", 110, 'color: gray'],
                ]);
                var options = {
                    width: 390,
                    legend: {
                        position: 'none'
                    },
                    chart: {
                        title: 'Fleet Trend',
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
                        groupWidth: "80%"
                    }
                };
                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                // Convert the Classic options to Material options.
                chart.draw(data, google.charts.Bar.convertOptions(options));
            };
        </script>
    @endsection
