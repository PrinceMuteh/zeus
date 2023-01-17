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
                            Gurantor Information
                        </p>
                    </div>
                    {{-- <a href="{{ route('gurantors') }}" class="addBtn">Gurantors</a>Fr --}}
                    {{-- <a href="{{ route('add.admin') }}" class="addBtn">Create an admin</a> --}}
                </div>

                {{-- <div class="row">
                    @include('components.message')
                </div> --}}
                <!-- end add staff modal -->
                <!-- table -->
                <div class="row justify-content-center">
                    <div class="col-8">
                        <form action="{{route('updateGurantor')}}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value = "{{$gurantor->id}}">

                            <h3>Driver Details</h3>
                            <div class="form-group mt-2">
                                <label for="">Driver Phone</label>
                                <input type="text" class="form-control infoInput" name = "" value="{{ $gurantor->Driver_PHONE }}"
                                    placeholder="Enter Details" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Driver First Name</label>
                                <input type="text" class="form-control infoInput" name="Driver_FIRST_NAME"
                                    value="{{ $gurantor->Driver_FIRST_NAME }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Driver Last Name</label>
                                <input type="text" class="form-control infoInput" name="Driver_LAST_NAME"
                                    value="{{ $gurantor->Driver_LAST_NAME }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Alternative Phone</label>
                                <input type="text" class="form-control infoInput" name="Driver_ALTERNATIVE_PHONE"
                                    value="{{ $gurantor->Driver_ALTERNATIVE_PHONE }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Driver Address</label>
                                <textarea name="Driver_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->Driver_ADDRESS }}</textarea>
                            </div>

                            <hr>
                            <h3>Relative Details</h3>
                            <div class="form-group">
                                <label for="">Relative Phone</label>
                                <input type="text" class="form-control infoInput" name="RELATIVE_PHONE"
                                    value="{{ $gurantor->RELATIVE_PHONE }}" placeholder="Enter Details" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Relative Full Name</label>
                                <input type="text" class="form-control infoInput" name="RELATIVE_NAME"
                                    value="{{ $gurantor->RELATIVE_NAME }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Relative Email</label>
                                <input type="text" class="form-control infoInput" name="RELATIVE_EMAIL"
                                    value="{{ $gurantor->RELATIVE_EMAIL }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Relative Alternative</label>
                                <input type="text" class="form-control infoInput"
                                    value="{{ $gurantor->RELATIVE_ALTERNATIVE_PHONE }}" name="RELATIVE_ALTERNATIVE_PHONE"
                                    placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Relative Address</label>
                                <textarea name="RELATIVE_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->RELATIVE_ADDRESS }}</textarea>
                            </div>

                            <hr>

                            <h3>Reference Details</h3>
                            <div class="form-group">
                                <label for="">Reference Phone</label>
                                <input type="text" class="form-control infoInput"
                                    value="{{ $gurantor->REFRENCES_PHONE }}" name="REFRENCES_PHONE"
                                    placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Reference Full Name</label>
                                <input type="text" class="form-control infoInput"
                                    value="{{ $gurantor->REFRENCES_NAME }}" name="REFRENCES_NAME"
                                    placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Relationship</label>
                                <input type="text" class="form-control infoInput"
                                    value="{{ $gurantor->REFRENCES_RELATIONSHIP }}" name="REFRENCES_RELATIONSHIP"
                                    placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Reference Company</label>
                                <input type="text" class="form-control infoInput" name="REFRENCES_COMPANY"
                                    value="{{ $gurantor->REFRENCES_COMPANY }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Reference Address</label>
                                <textarea name="REFRENCES_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->REFRENCES_ADDRESS }}</textarea>
                            </div>

                            <hr>
                            <h3>Reference 2 Details</h3>
                            <div class="form-group">
                                <label for="">Reference 2 Phone</label>
                                <input type="text" class="form-control infoInput" name="REFRENCES2_PHONE"
                                    value="{{ $gurantor->REFRENCES2_PHONE }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Reference 2 Full Name</label>
                                <input type="text" class="form-control infoInput" name="REFRENCES2_NAME"
                                    value="{{ $gurantor->REFRENCES2_NAME }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Relationship </label>
                                <input type="text" class="form-control infoInput" name="REFRENCES2_RELATIONSHIP"
                                    value="{{ $gurantor->REFRENCES2_RELATIONSHIP }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Reference 2 Company</label>
                                <input type="text" class="form-control infoInput" name="REFRENCES2_COMPANY"
                                    value="{{ $gurantor->REFRENCES2_COMPANY }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Reference 2 Address</label>
                                <textarea name="REFRENCES2_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->REFRENCES2_ADDRESS }}</textarea>
                            </div>

                            <hr>
                            <h3>Guarantor Details</h3>
                            <div class="form-group">
                                <label for="">Gurantor Phone</label>
                                <input type="text" class="form-control infoInput" name="GUARANTOR_PHONE"
                                    value="{{ $gurantor->GUARANTOR_PHONE }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor Full Name</label>
                                <input type="text" class="form-control infoInput" name="GUARANTOR_NAME"
                                    value="{{ $gurantor->GUARANTOR_NAME }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor Company</label>
                                <input type="text" class="form-control infoInput" name="GUARANTOR_COMPANY"
                                    value="{{ $gurantor->GUARANTOR_COMPANY }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor Level</label>
                                <input type="text" class="form-control infoInput" name="GUARANTOR_LEVEL"
                                    value="{{ $gurantor->GUARANTOR_LEVEL }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor Address</label>
                                <textarea name="GUARANTOR_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->GUARANTOR_ADDRESS }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor Company Address</label>
                                <textarea name="GUARANTOR_COMPANY_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->GUARANTOR_COMPANY_ADDRESS }}</textarea>
                            </div>

                            <hr>
                            <h3>Guarantor 2 Details</h3>
                            <div class="form-group">
                                <label for="">Gurantor 2 Phone</label>
                                <input type="text" class="form-control infoInput" name="GUARANTOR2_PHONE"
                                    value="{{ $gurantor->GUARANTOR2_PHONE }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor 2 Full Name</label>
                                <input type="text" class="form-control infoInput" name="GUARANTOR2_NAME"
                                    value="{{ $gurantor->GUARANTOR2_NAME }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor 2 Company</label>
                                <input type="text" class="form-control infoInput" name="GUARANTOR2_COMPANY"
                                    value="{{ $gurantor->GUARANTOR2_COMPANY }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor 2 Level</label>
                                <input type="text" class="form-control infoInput" name="GUARANTOR2_LEVEL"
                                    value="{{ $gurantor->GUARANTOR2_LEVEL }}" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor 2 Address</label>
                                <textarea name="GUARANTOR2_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->GUARANTOR2_ADDRESS }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Gurantor 2 Company Address</label>
                                <textarea name="GUARANTOR2_COMPANY_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->GUARANTOR2_COMPANY_ADDRESS }}</textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>




                        </form>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection
