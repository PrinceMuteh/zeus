<!-- fleet -->
<div class="fleet_section">
    {{-- <div class="row mt-3 g-2">
        <div class="col-sm-6 col-md-12 col-lg-3">
            <div class="boxInfo bg-orange text-light">
                <div class="topInfo">
                    <div class="vectorBox bg-red">
                        <img src="{{ asset('assets/images/white-vector.png') }}" alt="" />
                    </div>
                </div>
                <div class="bottomInfo">
                    <div class="leftBottom text-light">
                        <span class="lft1 text-light">OFFLINE DEVICE(S)</span><br />
                        <span class="lft2 text-inter text-light">{{ count($allVehicle) - $onlineDevice }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-3">
            <div class="boxInfo">
                <div class="topInfo">
                    <div class="vectorBox">
                        <img src="{{ asset('assets/images/vector.png') }}" alt="" />
                    </div>
                    <i class="bx bx-dots-vertical-rounded adjust"></i>
                </div>
                <div class="bottomInfo">
                    <div class="leftBottom">
                        <span class="lft1">ONLINE DEVICE(S)</span><br />
                        <span class="lft2 text-inter">{{ $onlineDevice }}</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-3">
            <div class="boxInfo">
                <div class="topInfo">
                    <div class="vectorBox">
                        <img src="{{ asset('assets/images/vector.png') }}" alt="" />
                    </div>
                    <i class="bx bx-dots-vertical-rounded adjust"></i>
                </div>
                <div class="bottomInfo">
                    <div class="leftBottom">
                        <span class="lft1">MAINTENANCE OVERDUE</span><br />
                        <span class="lft2 text-inter">23</span>
                    </div>
                    <span class="
                        rightBottom
                        bg-light-red
                        red-text
                        font-weight-bold
                        ">
                        <i class="bx bx-down-arrow-alt"></i>
                        <span>22.5%</span> <span>APRIL</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-3">
            <div class="boxInfo">
                <div class="topInfo">
                    <div class="vectorBox">
                        <img src="{{ asset('assets/images/vector.png') }}" alt="" />
                    </div>
                    <i class="bx bx-dots-vertical-rounded adjust"></i>
                </div>
                <div class="bottomInfo">
                    <div class="leftBottom">
                        <span class="lft1">TOTAL MILEAGE</span><br />
                        <span class="lft2 text-inter">{{ number_format($totalMiles / 1000) }}Km</span>
                    </div>
                    <span class=" rightBottom bg-light-red red-text font-weight-bold ">
                        <i class="bx bx-down-arrow-alt"></i>
                        <span>22.5%</span> <span>APRIL</span>
                    </span>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- table -->
    <div class="row">
        <div class="col-12">


            {{-- <div class="row justify-content-end mr-3 mb-2">
                @if (Auth()->user()->user_type == 'SUPER')
                    <button type="button" class="btn btn-primary btn-lg  addBtn" data-toggle="modal"
                        data-target="#myFleet">
                        Assign to Fleet Operator
                    </button>
                @endif
            </div> --}}



            <!-- Modal -->
            <div class="modal fade" id="myFleet" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-lg" role="document">
                    <div class="modal-content">

                        <form action="{{ route('createFleet') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Assign Fleet to Fleet Operator</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{-- <div class="form-group">
                                    <label for="">Choose Name</label>
                                    <input type="text" name="name" class="form-control" required />
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="">Fleet Type</label>
                                    <input type="text" name="type" class="form-control" required />
                                </div> --}}
                                <div class="form-group">
                                    <label for="">Vehicle group</label>
                                    <select class="form-control users" name="name" required>
                                        @foreach ($vehicletype as $item)
                                            <option value="{{ $item->bodytypename }}">{{ $item->bodytypename }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Assign To</label>
                                    <select class="form-control users" name="fleet" required>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->first_name }}
                                                {{ $item->last_name }} -- {{ $item->phone }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Procced</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="card-box table-responsive">
                {{-- <table id="datatable-buttons" class="table table-bordered nowrap" --}}
                <table id="tableWorkshop" class=" display table table-bordered nowrap"
                    style=" border-collapse: collapse;  border-spacing: 0; width: 100%; ">
                    <thead class="text-inter">
                        <tr>
                            <th>
                                <input type="checkbox" class="check" />
                            </th>
                            <th>PLATE NO.</th>
                            <th>Type</th>
                            <th>Fleet OPS</th>
                            <th>TODAY MILEAGE</th>
                            <th>Status</th>
                            <th>IGNITION</th>
                            <th>Last Updated</th>
                            <th>PACKAGE</th>
                            <th>ADDRESS</th>
                        </tr>
                    </thead>

                    <tbody id="data2">
                        @foreach ($allVehicle as $item)
                            <tr>
                                <td> <input type="checkbox" class="check" /></td>
                                <td>
                                    <a
                                        href="{{ route('operational', ['plate' => $item->vehno ?? 'unknow']) }}">{{ $item->vehno }}</a>
                                </td>
                                <td>{{ $item->brandname ?? '-' }}</td>
                                <td>{{ $item->bodytypename ?? 'unknow' }}</td>
                                <td>{{ number_format($item->todayMiles ?? 0 / 1000) }} KM</td>
                                <td>
                                    @if ($item->offlineStatus == 'Offline')
                                        <div class="text text-danger">Offline</div>
                                    @else
                                        <div class="text text-success">Online</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->Dtstatus == '0')
                                        <div class="text text-danger">Off</div>
                                    @else
                                        <div class="text text-success">On</div>
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->time)->format('d-m-Y h:i a') }}</td>
                                <td>
                                    @if ($item->status == '0')
                                        Available
                                    @elseif ($item->status == '1')
                                        Disabled
                                    @elseif ($item->status == '2')
                                        Rental
                                    @else
                                        Hire Purchase
                                    @endif
                                </td>
                                <td>{{ $item->address ?? '-' }}</td>
                                {{-- <td>{{ $item->time ?? "" }}</td> --}}
                                {{-- <td>{{ number_format($item->miles / 1000) }}</td> --}}


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    // $(document).ready(function() {
    //     $.ajax({
    //         type: "GET",
    //         url: "data.php",
    //         dataType: "html",
    //         success: function(data) {
    //             console.log(data);
    //             $("#data2").html(data);
    //         }
    //     });
    // });
    // inverval_timer = setInterval(function() {
    //     $(document).ready(function() {
    //         $.ajax({
    //             type: "GET",
    //             url: "{{ route('getFleet') }}",
    //             dataType: "html",
    //             success: function(data) {
    //                 $("#data2").html(data);
    //                 console.log(data);
    //             }
    //         });
    //     });

    //     console.log("5 seconds completed");

    // }, 5000);
</script>
