@extends('main')
@section('content')
    <title>Zeus | Techincal Desk</title>
    <style>
        tr:nth-last-child() {
            border-bottom: none;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-item {
            font-size: 10px;
        }
    </style>
    <div class="content-page" style="background: #fff;">
        <div class="content">
            <div class="container-fluid m15">
                {{ $allTask = count($newInstallation) + count($processing) }}
                
                @include('sections.technical-desk-info', [
                    'allTask' => $allTask,
                    'newTask' => count($newInstallation),
                    'processing' => count($processing),
                    'closedTask' => '0',
                ])

                <div class="container-fluid mt-2">
                    <ul class="mt-3 tasklogs-links">
                        <li class="bbd">
                            <a href="task-logs">new installation ({{ count($newInstallation) }})</a>
                        </li>
                        <li>
                            {{--<a href="technical-desk-offline-cars">offline cars (4)</a>--}}
                            offline cars (4)
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
                                            @foreach ($newInstallation as $item)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="form-check">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('task-new-entry', ['id' => $item->id]) }}">
                                                            {{ $item->taskId }} </a>
                                                    </td>
                                                    <td>New Installation</td>
                                                    <td>{{$item->taskStatus}}</td>
                                                    <td>{{ $item->updated_at ?? "-" }}</td>
                                                    <td>{{$item->state ?? "-"}}</td>
                                                    <td>
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </td>
                                                </tr>
                                            @endforeach

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


    {{--   side info --}}


    <script>
        public
        function showInstallations(elem) {
            console.log('hello');
        }
    </script>

    <script>
        showInstallation = document.querySelector('.showInstallation');
        closeInstallation = document.querySelector('.close-commission');
        sideInstallation = document.querySelector('.sideInstallation');


        showInstallation.addEventListener('click', () => {
            sideInstallation.classList.add('showInstall');


            console.log(showInstallations.getAttribute('data-id'));
        })



        closeInstallation.addEventListener('click', () => {
            sideInstallation.classList.remove('showInstall');
            console.log("hello");

        })
    </script>
@endsection
