@extends('main')
@section('content')
    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-2">
                <!-- text-inter -->
                <div class="top-row">
                    <span class="sectionTitle text-inter pb-0 pl-0">
                        ACCOUNT OFFICER (Fleet)
                    </span>
                </div>
                <ul class="sub-tabs">
                    <li>DASHBOARD</li>
                    <li>FINANCE REPORT</li>
                    <li class="bbd"> <a href="/account-officer/fleet"> FLEET </a></li>
                    <li>DISCUSSIONS</li>
                    <li>OFFICERS</li>
                    <li>
                        <a href="/account-Officer/host">HOSTS</a>
                    </li>
                </ul>


                <div class="row pt-2">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-borderless"
                                style="
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 100%;
                        padding-top: 10px;
                      ">
                                <thead class="text-inter">
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="form-check">
                                        </th>
                                        <th>Plate No</th>
                                        <th>Account Officer</th>
                                        <th>Support Manager</th>
                                        <th>Account</th>
                                        <th>Support</th>
                                        <th>
                                            <i class='bx bx-dots-vertical-rounded'></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fleet as $item)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="form-check">
                                            </td>
                                            <td>
                                                {{ $item->vehno ?? '-' }} </td>


                                            <td>{{ $item->accountOfficer ?? '-' }}</td>
                                            <td>{{ $item->supportManager ?? '-' }}</td>
                                            <td>
                                                   <a href = ""  data-bs-toggle="modal"
                                                    data-bs-id="{{ $item->id }}" data-bs-target="#mymodal" >  Change account Officerr </a>
                                            </td>
                                            <td>
                                                <a href = ""  data-bs-toggle="modal"
                                                    data-bs-idz="{{ $item->id }}" data-bs-target="#mymodal2" >  Change Support Manager </a>

                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <i class='bx bx-dots-vertical-rounded' data-bs-toggle="dropdown"></i>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">ASSIGN</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">UPDATE
                                                                STATUS</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">EDIT</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">DELETE</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>

            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Account Officer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('updateFleet') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" class="idz">
                            <div class="form-group">
                                <label for="">Select Account Officer</label>
                                <select name="accountOfficer" id="" class="form-control">
                                    @foreach ($officerz as $item)
                                        <option value="{{ $item->accountOfficer }}">{{ $item->accountOfficer }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <input type="submit" value="Submit" class="form-control btn btn-primary">
                            </div>
                        </form>
                        <div class="col-6 side2 amount"></div>

                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mymodal2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Support Manger</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('updateSupportManager') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" class="idz">
                            <div class="form-group">
                                <label for="">Select Support Managers</label>
                                <select name="accountOfficer" id="" class="form-control">
                                    @foreach ($users as $item)
                                        <option value="{{ $item->email }}">{{ $item->first_name }} {{ $item->last_name }} </option>
                                    @endforeach
                                </select>
                                <br>
                                <input type="submit" value="Submit" class="form-control btn btn-primary">
                            </div>
                        </form>
                        <div class="col-6 side2 amount"></div>

                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <script>
        const myModal = document.querySelector('#mymodal');
        myModal.addEventListener('show.bs.modal', function(event) {
           var  button = event.relatedTarget;
            var  id = button.getAttribute('data-bs-id');
            $('.idz').val(id);
        });
    </script>
    <script>
        const myModal2 = document.querySelector('#mymodal2');
        myModal2.addEventListener('show.bs.modal', function(event) {
            // Get the reference of the triggering button
            var button = event.relatedTarget;
            var  id = button.getAttribute('data-bs-idz');
            $('.idz').val(id);
        });
    </script>
@endsection
