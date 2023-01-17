@extends('main')
@section('content')
    <title>Zeus | Techincal Desk</title>
    <style>
        tr:nth-last-child() {
            border-bottom: none;
        }
    </style>
    <div class="content-page" style="background: #fff;">
        <div class="content">
            <div class="container-fluid m15">
                @include('sections.technical-desk-info')

                <div class="container-fluid mt-2">
                    <ul class="mt-3 tasklogs-links">
                        <li>
                            <a href="task-logs">new installation (30)</a>
                        </li>
                        <li class="bbd">
                            <a href="technical-desk-offline-cars">offline cars (4)</a>
                        </li>
                        <li>reset task (12)</li>
                        <li>termination (2)</li>
                        <li>support (22)</li>
                    </ul>

                    <div class="newInstallation mt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title pl-0 mb-3 mt-2">Task table</h4>
                                    <table id="datatable-buttons"
                                        class="table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap table"
                                        style="
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                  ">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="form-check">
                                                </th>
                                                <th>TASK ID</th>
                                                <th>CATEGORY</th>
                                                <th>STATUS</th>
                                                <th>DATE</th>
                                                <th>LOCATION</th>
                                                <th>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check">
                                                </td>
                                                <td>45678-EWS</td>
                                                <td>NEW INSTALLATION</td>
                                                <td>PENDING</td>
                                                <td>23 Feb, 2021</td>
                                                <td>LAGOS, NIG</td>
                                                <td>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check">
                                                </td>
                                                <td>45678-EWS</td>
                                                <td>OFFLINE CARS</td>
                                                <td>PENDING</td>
                                                <td>23 Feb, 2021</td>
                                                <td>LAGOS, NIG</td>
                                                <td>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check">
                                                </td>
                                                <td>45678-EWS</td>
                                                <td>WITHDRAWALS</td>
                                                <td>PENDING</td>
                                                <td>23 Feb, 2021</td>
                                                <td>LAGOS, NIG</td>
                                                <td>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check">
                                                </td>
                                                <td>45678-EWS</td>
                                                <td>RESET</td>
                                                <td>COMPLETED</td>
                                                <td>23 Feb, 2021</td>
                                                <td>LAGOS, NIG</td>
                                                <td>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check">
                                                </td>
                                                <td>45678-EWS</td>
                                                <td>SUPPORT</td>
                                                <td>NEW</td>
                                                <td>23 Feb, 2021</td>
                                                <td>LAGOS, NIG</td>
                                                <td>
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </div>
        <!-- end content -->
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="{{ asset('assets/js/chart.js') }} "></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                datasets: [{
                    label: 'TASK TREND',
                    data: [400, 800, 800, 400, 600, 900, 600, 400, 600, 600, 400, 200, 200],
                    borderWidth: 1,
                    minBarLength: 10,
                    highlightFill: "green",
                    highlightStroke: "red",
                    backgroundColor: 'rgba(4, 4, 255, 0.406)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var yValues = [70, 49, 44];
        var barColors = [
            "#0D42A8F2",
            "#0d43a8b3",
            "#0d43a83e"
        ];

        new Chart("myChart-doughnut", {
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
