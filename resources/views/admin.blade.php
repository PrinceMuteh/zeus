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
                            Administrator Office
                        </p>
                    </div>
                    {{-- <button class="addBtn" data-bs-toggle="modal" data-bs-target="#addUser">ADD USER</button> --}}
                    <a href="{{ route('gurantors') }}" class="addBtn">Gurantors</a>
                    <a href="{{ route('add.admin') }}" class="addBtn">Create an admin</a>
                </div>

                <div class="row">
                    @include('components.message')
                </div>
                <!-- add staff modal -->
                <!-- Modal -->
                <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">USER INFORMATION</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('addAdmin') }}" method="post">
                                    @csrf
                                    <div class="formSec">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <select class="form-select users" name="usertype">
                                                @foreach ($usertype as $item)
                                                    <option value="{{ $item->user_type_id }}">{{ $item->user_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input name="first_name" value="{{ old('first_name') }}"
                                                class="form-control infoInput" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input name="last_name" value="{{ old('last_name') }}"
                                                class="form-control infoInput" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="">Phone No.</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text brd-left" id="basic-addon1">+234</span>
                                                <input type="number" value="{{ old('phone') }}" name="phone"
                                                    class="form-control infoInput brd-right" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input name="email" value="{{ old('email') }}" class="form-control infoInput"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Department</label>
                                            <select name="department" class="form-control form-control infoInput">
                                                <option value="null">--Please Select--</option>
                                                @foreach ($depart as $item)
                                                    <option value="{{ $item->id }}">{{ $item->department_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn w-100"
                                    style=" height: 60px; background: #4a4aff; color: #fff; border-radius: 8px;  font-weight: bold; ">
                                    ADD STAFF
                                </button>
                            </div>
                            </form>

                        </div>
                    </div>
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
                                        <th>EMAIL</th>
                                        <th>First NAME</th>
                                        <th>Last NAME</th>
                                        <th>User Type</th>
                                        <th>STATUS</th>
                                        <th>START DATE</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($admin as $item)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check" />
                                            </td>
                                            <td><a
                                                    href="{{ route('adminInfo', ['id' => $item->id]) }}">{{ $item->email }}</a>
                                            </td>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->user_type }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <h6 class="text-success"> ACTIVE</h6>
                                                @else
                                                    <h6 class="text-danger"> INACTIVE</h6>
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
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
