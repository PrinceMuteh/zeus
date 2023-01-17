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
                            API KEYS
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
                            <form action="{{ route('updateApi') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Google Api Key</label>
                                    <input type="hidden" name="name" value = "gogle">
                                    <input type="text" class="form-control" value="{{ $gogle->api_key }}" name="apikey"
                                        id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Google Api Key</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <form action="{{ route('updateApi') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Maptiller</label>
                                    <input type="hidden" name="name" value = "maptiller">
                                    <input type="text" class="form-control" value="{{ $maptiller->api_key }}" name="apikey"
                                        id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Maptiller Api Key</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection
