@extends('main')
@section('content')
    <div class="content-page" style="background: #fff">
        <div class="content">
            <!-- Start Content-->
            <div class="">
                <!-- text-inter -->
                <div class="row userInfo-row">
                    <div class="col-sm-6 col-md-8">
                        <div class="container-dm">
                            <div class="top-row m-25">
                                <div class="fixed-section">
                                    <p class="sectionTitle text-inter pb-0 pl-0">
                                        Creating a new vehicle
                                    </p>
                                    <p class="subTitle">
                                        This entire process takes less than 10 mins to fillout the
                                        information required to create a new booking for a vehicle.
                                    </p>
                                </div>
                            </div>
                            <div class="form-area">
                                {{-- <form action="/add-vehicle" method="post"> --}}
                                <form action="{{ route('add-vehicle') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Add Vehicle Owner </label>
                                        <select name="vehicleOwner" class="vehicleOwner form-control">
                                            @foreach ($vehicleOwner as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->phone . ' -  ' . $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small>A vehicle oowner must be on the database before a vehicle can be
                                            created</small>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <label for="">Liecense Plate *</label>
                                        <input type="text" class="form-control" name="plate" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Chasis</label>
                                        <input type="text" class="form-control" name="chasis" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Engine Cap.</label>
                                        <input type="text" class="form-control" name="capacity" placeholder="4cyL" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Model *</label>
                                        <input type="text" class="form-control" name="model" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Location *</label>
                                        <input type="text" class="form-control" name="location" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vehicle Type (Brand) *</label>
                                        <select name="type" class="brands form-control">
                                            <option value="Seat"> Seat </option>
                                            <option value="Renault"> Renault </option>
                                            <option value="Peugeot"> Peugeot </option>
                                            <option value="Dacia"> Dacia </option>
                                            <option value="Citroën"> Citroën </option>
                                            <option value="Opel"> Opel </option>
                                            <option value="Rom"> Alfa Rom </option>
                                            <option value="Škoda"> Škoda </option>
                                            <option value="Chevrolet"> Chevrolet </option>
                                            <option value="Porsche"> Porsche </option>
                                            <option value="Honda"> Honda </option>
                                            <option value="Subaru"> Subaru </option>
                                            <option value="Mazda"> Mazda </option>
                                            <option value="Mitsubishi"> Mitsubishi </option>
                                            <option value="Lexus"> Lexus </option>
                                            <option value="Toyota"> Toyota </option>
                                            <option value="BMW"> BMW </option>
                                            <option value="Volkswagen"> Volkswagen </option>
                                            <option value="Suzuki"> Suzuki </option>
                                            <option value="Be"> Mercedes-Be </option>
                                            <option value="Saab"> Saab </option>
                                            <option value="Audi"> Audi </option>
                                            <option value="Kia"> Kia </option>
                                            <option value="Rov"> Land Rov </option>
                                            <option value="Dodge"> Dodge </option>
                                            <option value="Chrysler"> Chrysler </option>
                                            <option value="Ford"> Ford </option>
                                            <option value="Hummer"> Hummer </option>
                                            <option value="Hyundai"> Hyundai </option>
                                            <option value="Infiniti"> Infiniti </option>
                                            <option value="Jaguar"> Jaguar </option>
                                            <option value="Jeep"> Jeep </option>
                                            <option value="Nissan"> Nissan </option>
                                            <option value="Volvo"> Volvo </option>
                                            <option value="Daewoo"> Daewoo </option>
                                            <option value="Fiat"> Fiat </option>
                                            <option value="MINI"> MINI </option>
                                            <option value="Rover"> Rover </option>
                                            <option value="Smart"> Smart </option>
                                        </select>
                                        {{-- <input type="text" class="form-control" name="type" required /> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="">Year *</label>
                                        <select class="form-control year" name="year">
                                            <?php
                                            for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                                            <option value="<?= $year ?>"><?= $year ?></option>
                                            <?php endfor; ?>
                                        </select>

                                        {{-- <input type="date" date="year" class="form-control" name="year" required /> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="">Body</label>
                                        <select name="body" id="" class="body form-control">
                                            <option value="Hatchback">Hatchback </option>
                                            <option value="Minivan">Minivan </option>
                                            <option value="CUV">CUV </option>
                                            <option value="Coupe">Coupe </option>
                                            <option value="Supercar">Supercar </option>
                                            <option value="Kammback">Kammback </option>
                                            <option value="Convertible">Cabriolet/Convertible </option>
                                            <option value="Sedan">Sedan </option>
                                            <option value="Campervan">Campervan </option>
                                            <option value="Micro">Micro </option>
                                            <option value="SUV">SUV </option>
                                            <option value="Spyder">Roadster/Spider/Spyder </option>

                                        </select>
                                        {{-- <input type="text" class="form-control" name="body" /> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="">Transmission</label>
                                        <select name="transmission" class="form-control transmission" id="">
                                            <option value="Manual">Manual Transmission</option>
                                            <option value="Automatic"> Automatic Transmission</option>
                                            <option value="Continuously Variable"> Continuously Variable Transmission
                                            </option>
                                            <option value="Semi-Automatic"> Semi-Automatic Transmission</option>
                                            <option value="Dual-Clutch"> Dual-Clutch Transmission</option>
                                        </select>
                                        {{-- <input type="text" class="form-control" name="transmission" /> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="">Color</label>
                                        <select name="color" id="" class="form-control colors">
                                            <option value="Red">Red</option>
                                            <option value="Orange">Orange</option>
                                            <option value="Yellow">Yellow</option>
                                            <option value="Green">Green</option>
                                            <option value="Cyan">Cyan</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Magenta">Magenta</option>
                                            <option value="Purple">Purple</option>
                                            <option value="White">White</option>
                                            <option value="Black">Black</option>
                                            <option value="Gray">Gray </option>
                                            <option value="Silver">Silver</option>
                                            <option value="Pink">Pink</option>
                                            <option value="Maroon">Maroon</option>
                                            <option value="Brown">Brown</option>
                                            <option value="Beige">Beige</option>
                                            <option value="Tan">Tan</option>
                                            <option value="Peach">Peach</option>
                                            <option value="Lime">Lime</option>
                                            <option value="Turquoise">Turquoise</option>
                                            <option value="Teal">Teal</option>
                                            <option value="Navy">Navy blue</option>
                                            <option value="Indigo">Indigo</option>
                                            <option value="Violet">Violet</option>
                                        </select>

                                        {{-- <input type="color" class="form-control" name="color" /> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="">Package</label>
                                        <select name="package" id="" class=" package form-control"
                                            name="package">
                                            <option value="Rental">Rental</option>
                                            <option value="HirePurchase">Hire Purchase</option>
                                            <option value="Premium">Premium</option>
                                        </select>
                                        {{-- <input type="text" class="form-control" name="package" /> --}}
                                    </div>


                                    <div class="form-group">
                                        <label for="">Font Image</label>
                                        <input type="file" name="frontImage" id="" class="form-control"
                                            accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Interoir Image</label>
                                        <input type="file" name="interiorImage" id="" class="form-control"
                                            accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Back Image</label>
                                        <input type="file" name="backImage" id="" class="form-control"
                                            accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Diagonal Image</label>
                                        <input type="file" name="diagonalImage" id="" class="form-control"
                                            accept="image/*">
                                    </div>





                                    <div class="text-left">
                                        <b>Vehicle Management *</b>
                                        <span>All new Vehicle must be assign to a fleet and workshop on the database before
                                            a vehicle can be created</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">Assign fleet *</label>
                                        <select name="fleet" id="" class="form-control fleet" required>
                                            {{-- @foreach ($fleet as $item)
                                                <option value="{{ $item->fleet_id }}">{{ $item->fleet_name }}</option>
                                            @endforeach --}}


                                            @foreach ($fleet as $item)
                                                <option value="{{ $item->bodytypename }}">
                                                    {{ $item->bodytypename }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Service Center *</label>
                                        <select name="serviceCenter" class="form-control serviceCenter" id="">
                                            @foreach ($service as $item)
                                                <option value="{{ $item->center_id }}">{{ $item->center_name }}</option>
                                            @endforeach

                                        </select>
                                        {{-- <select name="" id="" class="form-control" required>
                                            @foreach ($vehicleOwner->where('user_type', 'Fleet Operator') as $item)
                                                <option value="{{$item->id}}">{{ $item->first_name . ' ' . $item->last_name }}
                                                </option>
                                            @endforeach
                                        </select> --}}
                                    </div>

                            </div>
                            <button type="submit" class="addBtn mt-2">
                                <i class="bx bx-shopping-bag"></i>
                                <span class="ml-1">SAVE AND CREATE</span>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="side-ribbon">
                        <div class="ribbon-area">
                            <div class="ribbon-one">
                                <img src="{{ asset('assets/images/zeus.svg') }}" alt="" required />
                            </div>
                            <div class="ribbon-two">
                                <p class="ribbon-text">
                                    A tool designed to help you automate the mobility
                                    experience
                                </p>
                                <p class="ribbon-name">- Team Zeus</p>
                            </div>
                            <div class="ribbon-three">
                                <img src="{{ asset('assets/images/ribbon.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
    </div>
    <!-- end content -->
    </div>
@endsection
