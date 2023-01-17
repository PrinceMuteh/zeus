@extends('main')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-10">
                <!-- text-inter -->
                <div class="top-row mb-4">
                    <div>
                        <p class="sectionTitle text-inter pb-0 pl-0">
                            Gurantors Information
                        </p>
                    </div>
                    {{-- <a href="{{ route('gurantors') }}" class="addBtn">Gurantors</a>Fr --}}
                    {{-- <a href="{{ route('add.admin') }}" class="addBtn">Create an admin</a> --}}
                </div>

                <div class="row">
                    @include('components.message')
                </div>
                <!-- end add staff modal -->
                <!-- table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-bordered nowrap"
                                style="
                                        border-collapse: collapse;
                                        border-spacing: 0;
                                        width: 100%;
                                        ">
                                <thead class="text-inter">
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="check" />
                                        </th>
                                        <th>Plate Nuber</th>
                                        <th>Phone</th>
                                        <th>Emal</th>
                                        <th>Driver NAME</th>
                                        <th>Relative Name</th>
                                        <th>Address</th>
                                        {{-- <th>STATUS</th> --}}
                                        {{-- <th>START DATE</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($gurantors as $item)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check" />
                                            </td>
                                            <td>
                                                <a href="{{ route('editGurantor', ['id' => $item->id]) }}">
                                                    {{ $item->plate_number }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('editGurantor', ['id' => $item->id]) }}">
                                                    {{ $item->Driver_PHONE }}
                                                </a>
                                            </td>
                                            <td>{{ $item->Driver_EMAIL }}</td>
                                            {{-- <td>{{ $item->Driver_FIRST_NAME }} {{ $item->Driver_LAST_NAME }}</td> --}}
                                            <td>{{ $item->RELATIVE_NAME }}<td>
                                            <td>{{ $item->Driver_ADDRESS }}</td>

                                            {{-- <td>
                                                @if ($item->status == 1)
                                                    <h6 class="text-success"> ACTIVE</h6>
                                                @else
                                                    <h6 class="text-danger"> INACTIVE</h6>
                                                @endif
                                            </td> --}}
                                            {{-- <td>{{ $item->created_at }}</td> --}}
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
@endsection
