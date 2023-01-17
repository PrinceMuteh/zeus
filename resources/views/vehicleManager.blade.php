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
                            Vehicle Manager
                        </p>
                    </div>
                    {{-- <button class="addBtn" data-bs-toggle="modal" data-bs-target="#addUser">ADD USER</button> --}}
                </div>

                <div class="row">
                    @include('components.message')
                </div>
                <!-- end add staff modal -->

                <!-- table -->
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('vehicle_manager') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">All Fleet
                                    <span class="text-danger font-weight-bold">*</span></label>
                                    <select class="form-select users" name="fleet" required>
                                        @foreach ($vehicletype as $item)
                                            <option value="{{ $item->bodytypename }}">
                                                {{ $item->bodytypename }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row ">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Workshop Category
                                            <span class="text-danger font-weight-bold">*</span></label>
                                            <select class="form-select users" name="category" required>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->name }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">New Category</label>
                                            <a href="" class="btn btn-primary btn-sm"   data-toggle="modal" data-target="#modelId">Add Category</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Payee
                                    <span class="text-danger font-weight-bold">*</span></label>
                                    <select class="form-select users" name="payee" required>
                                        <option value="Driver">Driver</option>
                                        <option value="Owner">Owner</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="number" class="form-control" value="" name="amount" id=""
                                        aria-describedby="helpId" placeholder="" required>
                                </div>
                                <button type="submit" name = "vehicle_manager" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                          <table class="table">
                            <thead>
                                <tr>
                                    <th>Fleet</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manager as $item)
                                    
                                <tr>
                                    <td scope="row">{{$item->fleet}}</td>
                                    <td>{{$item->category}}</td>
                                    <td>{{$item->user}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->created_at}}</td>
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
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category Name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categoryName') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Category name</label>
                            <input type="text" class="form-control" value="" name="name" id=""
                                aria-describedby="helpId" placeholder="" required>
                        </div>
                        <button type="submit" name = "category" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
