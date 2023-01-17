@extends('main')
@section('content')
    <style>
        div.scroll {
            margin: 4px, 4px;
            padding: 4px;
            /* background-color: green; */
            /* width: 500px; */
            height: 300px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: justify;
        }
    </style>
    <title>Zeus | Admin Information</title>
    <div class="content-page" style="background: #fff">
        <div class="content">
            <div class="container">
                <h3 class="mt-5 pt-5">
                    Gurantors Details ( {{$plate}} )
                </h3>
            </div>

            <div class="container mt-3">
                <form action="{{ route('uploadGurantor') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plate" value="{{ $plate }}">
                    {{-- @if (!$gurantor) 
                    <h3>Select Vehicle</h3>
                    <div class="form-group mt-2">
                        <label for="">All Vehicle</label>
                        <select name="plate_number" id="" class="form-control users">
                            @foreach ($allVehicle as $item)
                                <option value="{{ $item->vehno }} "> {{ $item->vehno }} -- {{ $item->brandname }} --
                                    {{ $item->bodytypename }} </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <input type="hidden" name="plate_number" value="{{ $gurantor->plate_number }}">
                @endif --}}
                    <h4>Driver Details</h4>
                    {{-- @if (!$gurantor)
                    <div class="form-group mt-2">
                        <label for="">Driver Phone</label>
                        <input type="text" class="form-control infoInput" value="">
                    </div>
                @else --}}
                    <div class="form-group mt-2">
                        <label for="">Driver Phone</label>
                        <input type="number" class="form-control infoInput" value="{{ $phone ?? '' }}">
                    </div>
                    {{-- @endif --}}
                    <div class="form-group">
                        <label for="">Driver Email</label>
                        <input type="text" class="form-control infoInput" name="Driver_EMAIL"
                            value="{{ $gurantor->Driver_EMAIL ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Driver First Name</label>
                        <input type="text" class="form-control infoInput" name="Driver_FIRST_NAME"
                            value="{{ $gurantor->Driver_FIRST_NAME ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Driver Last Name</label>
                        <input type="text" class="form-control infoInput" name="Driver_LAST_NAME"
                            value="{{ $gurantor->Driver_LAST_NAME ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Alternative Phone</label>
                        <input type="number" class="form-control infoInput" name="Driver_ALTERNATIVE_PHONE"
                            value="{{ $gurantor->Driver_ALTERNATIVE_PHONE ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Driver Address</label>
                        <textarea name="Driver_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->Driver_ADDRESS ?? '' }}</textarea>
                    </div>

                    <hr>
                    <h4>Relative Details</h4>
                    <div class="form-group">
                        <label for="">Relative Phone</label>
                        <input type="number" class="form-control infoInput" name="RELATIVE_PHONE"
                            value="{{ $gurantor->RELATIVE_PHONE ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Relative Full Name</label>
                        <input type="text" class="form-control infoInput" name="RELATIVE_NAME"
                            value="{{ $gurantor->RELATIVE_NAME ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Relative Email</label>
                        <input type="text" class="form-control infoInput" name="RELATIVE_EMAIL"
                            value="{{ $gurantor->RELATIVE_EMAIL ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Relative Alternative</label>
                        <input type="number" class="form-control infoInput"
                            value="{{ $gurantor->RELATIVE_ALTERNATIVE_PHONE ?? '' }}" name="RELATIVE_ALTERNATIVE_PHONE">
                    </div>
                    <div class="form-group">
                        <label for="">Relative Address</label>
                        <textarea name="RELATIVE_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->RELATIVE_ADDRESS ?? '' }}</textarea>
                    </div>

                    <hr>

                    <h4>Reference Details</h4>
                    <div class="form-group">
                        <label for="">Reference Phone</label>
                        <input type="text" class="form-control infoInput" value="{{ $gurantor->REFRENCES_PHONE ?? '' }}"
                            name="REFRENCES_PHONE">
                    </div>
                    <div class="form-group">
                        <label for="">Reference Full Name</label>
                        <input type="text" class="form-control infoInput" value="{{ $gurantor->REFRENCES_NAME ?? '' }}"
                            name="REFRENCES_NAME">
                    </div>
                    <div class="form-group">
                        <label for="">Relationship</label>
                        <input type="text" class="form-control infoInput"
                            value="{{ $gurantor->REFRENCES_RELATIONSHIP ?? '' }}" name="REFRENCES_RELATIONSHIP">
                    </div>
                    <div class="form-group">
                        <label for="">Reference Company</label>
                        <input type="text" class="form-control infoInput" name="REFRENCES_COMPANY"
                            value="{{ $gurantor->REFRENCES_COMPANY ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Reference Address</label>
                        <textarea name="REFRENCES_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->REFRENCES_ADDRESS ?? '' }}</textarea>
                    </div>

                    <hr>
                    <h4>Reference 2 Details</h4>
                    <div class="form-group">
                        <label for="">Reference 2 Phone</label>
                        <input type="text" class="form-control infoInput" name="REFRENCES2_PHONE"
                            value="{{ $gurantor->REFRENCES2_PHONE ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Reference 2 Full Name</label>
                        <input type="text" class="form-control infoInput" name="REFRENCES2_NAME"
                            value="{{ $gurantor->REFRENCES2_NAME ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Relationship </label>
                        <input type="text" class="form-control infoInput" name="REFRENCES2_RELATIONSHIP"
                            value="{{ $gurantor->REFRENCES2_RELATIONSHIP ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Reference 2 Company</label>
                        <input type="text" class="form-control infoInput" name="REFRENCES2_COMPANY"
                            value="{{ $gurantor->REFRENCES2_COMPANY ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Reference 2 Address</label>
                        <textarea name="REFRENCES2_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->REFRENCES2_ADDRESS ?? '' }}</textarea>
                    </div>

                    <hr>
                    <h4>Guarantor Details</h4>
                    <div class="form-group">
                        <label for="">Gurantor Phone</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR_PHONE"
                            value="{{ $gurantor->GUARANTOR_PHONE ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor Full Name</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR_NAME"
                            value="{{ $gurantor->GUARANTOR_NAME ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor Email</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR_EMAIL"
                            value="{{ $gurantor->GUARANTOR_EMAIL ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor Company</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR_COMPANY"
                            value="{{ $gurantor->GUARANTOR_COMPANY ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor Level</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR_LEVEL"
                            value="{{ $gurantor->GUARANTOR_LEVEL ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor Address</label>
                        <textarea name="GUARANTOR_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->GUARANTOR_ADDRESS ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor Company Address</label>
                        <textarea name="GUARANTOR_COMPANY_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->GUARANTOR_COMPANY_ADDRESS ?? '' }}</textarea>
                    </div>

                    <hr>
                    <h4>Guarantor 2 Details</h4>
                    <div class="form-group">
                        <label for="">Gurantor 2 Phone</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR2_PHONE"
                            value="{{ $gurantor->GUARANTOR2_PHONE ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor 2 Full Name</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR2_NAME"
                            value="{{ $gurantor->GUARANTOR2_NAME ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor 2 Email</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR2_EMAIL"
                            value="{{ $gurantor->GUARANTOR2_EMAIL ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor 2 Company</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR2_COMPANY"
                            value="{{ $gurantor->GUARANTOR2_COMPANY ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor 2 Level</label>
                        <input type="text" class="form-control infoInput" name="GUARANTOR2_LEVEL"
                            value="{{ $gurantor->GUARANTOR2_LEVEL ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor 2 Address</label>
                        <textarea name="GUARANTOR2_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->GUARANTOR2_ADDRESS ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Gurantor 2 Company Address</label>
                        <textarea name="GUARANTOR2_COMPANY_ADDRESS" class="form-control infoInput" rows="3">{{ $gurantor->GUARANTOR2_COMPANY_ADDRESS ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>




                </form>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
