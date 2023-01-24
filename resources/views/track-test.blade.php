@extends('main')
@section('content')
    <div class="content-page ">
        <div class="">
            <div class="mt-10">
                <!-- text-inter -->
                <div class="top-row">
                    <div>
                        <p class="sectionTitle text-inter pl-2">Track web</p>
                    </div>
                </div>
                <div class="main-track-section">
                    <div class="left-track-info ml-2">
                        <p class="subTitle mt-2">
                            Control Panel
                        </p>
                        <div class="form-search">
                            <form method="get" action="../track-search" class="form-inline">
                                <div class="row d-flex">

                                    <input type="text" name="plateNo" placeholder="Search" class="searchInput">
                                    <button type="submit" class="searchBtn">
                                        <i class='bx bx-search'></i>

                                    </button>
                                </div>
                            </form>
                            {{-- <img src="{{ asset('assets/images/filterIcon.svg') }}" alt=""> --}}
                        </div>

                        <ul class="sub-tabs2 mt-4">
                            <li class="total-vehicles bbd">Total vehicles ({{ $cars->count() }})</li>
                            <!-- <li class="online-vehicles">Online vehicles ({{ $cars->where('offlineStatus', 'Online')->count() }})</li> -->
                            <!-- <li class="offline-vehicles">
                                                    Offline vehicles ({{ $cars->where('offlineStatus', 'Offline')->count() }})
                                                </li> -->
                        </ul>

                        <div class="cars-section all-vehicles-sec">
                            @php
                                $x = 0;
                            @endphp
                            @foreach ($cars as $item)
                                @php
                                    $x++;
                                    if ($x == 1) {
                                        $id = 'openSideNav';
                                    } else {
                                        $id = '';
                                    }
                                    // $sub1 = DB::table('vehicle_status')->where('vehno', $item->vehno)->first();
                                @endphp
                                <a href="track-web2/{{ $item->vehno }}"></a>
                                <div class="car-info-section" id="{{ $id }}">
                                    <div class="carIcon bg-light-blue">
                                        <img src="{{ asset('assets/images/blue_car.svg') }}" alt="">
                                    </div>
                                    <div class="plate-number-section">
                                        <div class="plate-number">{{ $item->vehno }}</div>
                                        <div class="message">Today Mileage: {{ $item->todayMiles }}KM</div>
                                    </div>
                                    <!-- <span class="driving text-blue bg-light-blue">Driving: @if ($data['vehicleLocation']->Miles > 0)
                                    {{ $data['vehicleLocation']->Miles }}
                                    @endif
                                   </span> -->
                                    <div class="opt">
                                        <i class='bx bx-dots-vertical-rounded text-dark' data-bs-toggle="dropdown"
                                            aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"></a></li>
                                            <li><a class="dropdown-item" href="#"></a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            @endforeach
                        </div>



                    </div>
                    <div class="right-track-info">
                        <div id="map" style="width:100%; height:100%"></div>
                        <span class="backArrow">
                            <i class='bx bxs-chevrons-left'></i>
                        </span>
                        <span class="frontArrow">
                            <i class='bx bxs-chevrons-right'></i>
                        </span>
                        {{-- <img src="{{asset('assets/images/car_direct2.png')}}" class="car_track" alt=""> --}}
                    </div>


                    <div class="side-track-info">
                        <div class="side-region">
                            <!-- <p class="sub-title2">Date Added: 23 <span class="text-bold">August, 2022</span></p> -->
                            {{-- right side accordion --}}
                            <div class="mt-4 accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            <img src="{{ asset('assets/images/blue_cube.svg') }}" alt="">
                                            <div class="mid-info">
                                                <span class="t1">Vehicle Details</span>
                                                <span class="t2">This is a summary of the vehicle operator, This is a
                                                    summary of the vehicle operator.</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse accordion-section collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="info-main">
                                                <div class="user-info2">
                                                    <div class="left-info2">LICENCE PLATE:</div>
                                                    <div class="right-info2"> {{ $cars[0]->vehno }}</div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">TYPE:</div>
                                                    <div class="right-info2"> {{ $data['vehicleDetails']->brandname }}
                                                    </div>
                                                </div>

                                                <div class="user-info2">
                                                    <div class="left-info2">YEAR</div>
                                                    <div class="right-info2">
                                                        {{ 'Not Available' }} </div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">BODY:</div>
                                                    <div class="right-info2">
                                                        {{ $data['vehicleDetails']->bodytypename ?? 'Not Available' }}
                                                    </div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">ENGINE:</div>
                                                    <div class="right-info2">
                                                        {{ $data['vehicleDetails']->enginecapacityname }}</div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">TRANSMISSION:</div>
                                                    <div class="right-info2">Not Availiable</div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">COLOR:</div>
                                                    <div class="right-info2"> {{ $data['vehicleDetails']->colorname }}
                                                    </div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">PACKAGE:</div>
                                                    <div class="right-info2">
                                                        {{ $data['vehicleDetails']->bodytypename ?? 'Not Available' }}
                                                    </div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">DATE ADDED:</div>


                                                    <div class="right-info2"> {{ $data['vehicleDetails']->createtime }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <img src="{{ asset('assets/images/driver_info.svg') }}" alt="">
                                            <div class="mid-info">
                                                <span class="t1">Driver Information</span>
                                                <span class="t2">This is a summary of the vehicle operator.</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse accordion-section collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="accordion-main">
                                                <div class="user-img2">
                                                    <!--  <img src="{{ asset('assets/images/deen.png') }}" alt=""> -->
                                                </div>
                                                <div class="info-main">
                                                    <div class="user-info2">
                                                        <div class="left-info2">NAME:</div>
                                                        <div class="right-info2">{{ $cars[0]->drivername }}</div>
                                                    </div>
                                                    <div class="user-info2">
                                                        <div class="left-info2">PHONE NO:</div>
                                                        <div class="right-info2">{{ $cars[0]->driverphone }}</div>
                                                    </div>
                                                    <div class="user-info2">
                                                        <div class="left-info2">EMAIL:</div>
                                                        <div class="right-info2">{{ $cars[0]->driverphone }}</div>
                                                    </div>
                                                    <div class="user-info2">
                                                        <div class="left-info2">START DATE:</div>
                                                        <div class="right-info2">
                                                            {{-- {{$otherDetails->startDate}} --}}
                                                        </div>
                                                    </div>
                                                    <div class="user-info2">
                                                        <div class="left-info2">PAYMENT GOAL:</div>
                                                        <div class="right-info2">
                                                            {{ $otherDetails->hirePurchaseValue ?? '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="user-info2">
                                                        <div class="left-info2">TOTAL CONTRIBUTED:</div>
                                                        <div class="right-info2">
                                                            {{ $otherDetails->totalContributed ?? '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="user-info2">
                                                        <div class="left-info2">NEXT PAYMENT:</div>
                                                        <div class="right-info2">
                                                            {{ $otherDetails->nextPaymentDate ?? '-' }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <span class="top-accordion-text">Driver rating</span>
                                                <div class="rating-level">
                                                    <span class="rating-percent">nil</span>
                                                    <span
                                                        class="rating-status">{{ $otherDetails->driverRating ?? '-' }}</span>
                                                </div>

                                                <span class="top-accordion-text">Key Indicators</span>
                                                <div class="indictor-section">
                                                    <div class="indicator-row">
                                                        <div class="indicator-img bg-light-green200">
                                                            <img src="{{ asset('assets/images/greenr2.svg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="indicator-info">
                                                            <span class="distance"><span
                                                                    class="text-dark">{{ $otherDetails->avgSpeed ?? '-' }}</span>
                                                            </span>
                                                            <span class="avg-speed">Avg Speed</span>
                                                        </div>
                                                    </div>
                                                    <div class="indicator-row">
                                                        <div class="indicator-img bg-light-orange200">
                                                            <img src="{{ asset('assets/images/time.svg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="indicator-info">
                                                            <span class="distance"><span
                                                                    class="text-dark">{{ $otherDetails->driveTime ?? '-' }}</span>
                                                            </span>
                                                            <span class="avg-speed">Drive time</span>
                                                        </div>
                                                    </div>
                                                    <div class="indicator-row">
                                                        <div class="indicator-img bg-light-blue200">
                                                            <img src="{{ asset('assets/images/exclaim.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="indicator-info">
                                                            <span class="distance"><span
                                                                    class="text-dark">{{ $otherDetails->maintenanceScore ?? '-' }}</span>
                                                            </span>
                                                            <span class="avg-speed">Maintenace score</span>
                                                        </div>
                                                    </div>
                                                    <div class="indicator-row">
                                                        <div class="indicator-img bg-light-pink200">
                                                            <img src="{{ asset('assets/images/card.svg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="indicator-info">
                                                            <span class="distance"><span class="text-dark">Not
                                                                    Available</span>
                                                            </span>
                                                            <span class="avg-speed">Remittance</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed show" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            <img src="{{ asset('assets/images/location_yellow.svg') }}" alt="">
                                            <div class="mid-info">
                                                <span class="t1">GPS & Telematics</span>
                                                <span class="t2">This is a summary of the vehicle operator.</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse accordion-section collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <span class="top-accordion-text">GPS DATA</span>
                                            <div class="info-main">
                                                <div class="user-info2">
                                                    <div class="left-info2">TIME:</div>
                                                    <div class="right-info2"> {{ $data['vehicleLocation']->Time }}
                                                    </div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">IGNITION:</div>
                                                    @if ($data['vehicleLocation']->DtStatus == 1)
                                                        <div class="right-info2">ON</div>
                                                    @else
                                                        <div class="right-info2">off</div>
                                                    @endif
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">TOTAL MILLEAGE (KM):</div>
                                                    <div class="right-info2">{{ $data['vehicleLocation']->Miles / 1000 }}
                                                        KM</div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">LONGTITUDE:</div>
                                                    <div class="right-info2 text-dcr">
                                                        {{ $data['vehicleLocation']->Longitude }}</div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">LATITITUDE:</div>
                                                    <div class="right-info2 text-dcr">
                                                        {{ $data['vehicleLocation']->Latitude }}</div>
                                                </div>
                                                <div class="user-info2">
                                                    <div class="left-info2">ADDRESS:</div>
                                                    <div class="right-info2">{{ $placeAddress }} </div>
                                                </div>
                                            </div>

                                            <!-- <span class="top-accordion-text">Drive-train Analytic(s)</span>
                                                                <div class="traffic-info mt-2">
                                                                    <div class="traffic-info1">
                                                                        <div class="top-circle tc1">
                                                                            <img src="{{ asset('assets/images/yellow_pin.svg') }}"
                                                                                alt="">
                                                                        </div>
                                                                        <span class="info-desc1">35.3km</span>
                                                                        <span class="info-desc2">Mileage</span>
                                                                    </div>
                                                                    <div class="traffic-info1">
                                                                        <div class="top-circle tc2">
                                                                            <img src="{{ asset('assets/images/blue_circle.svg') }}"
                                                                                alt="">
                                                                        </div>
                                                                        <span class="info-desc1">85.5km/h</span>
                                                                        <span class="info-desc2">Avg. Speed</span>
                                                                    </div>
                                                                    <div class="traffic-info1">
                                                                        <div class="top-circle tc3">
                                                                            <img src="{{ asset('assets/images/blue_clock.svg') }}"
                                                                                alt="">
                                                                        </div>
                                                                        <span class="info-desc1">02h:27m</span>
                                                                        <span class="info-desc2">Drive Time</span>
                                                                    </div>
                                                                </div>

                                                                <div class="graph-accordion">

                                                                </div>

                                                                <button class="btn-more">See more</button> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                            aria-expanded="false" aria-controls="flush-collapseFour">
                                            <img src="{{ asset('assets/images/heartbreak.svg') }}" alt="">
                                            <div class="mid-info">
                                                <span class="t1">Maintenance Information</span>
                                                <span class="t2">This is a summary of the vehicle operator.</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse accordion-section collapse"
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="accordion-body">
                                                no data available
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive"
                                            aria-expanded="false" aria-controls="flush-collapseFive">
                                            <img src="{{ asset('assets/images/bag_purple.svg') }}" alt="">
                                            <div class="mid-info">
                                                <span class="t1">Fleet & Payment</span>
                                                <span class="t2">This is a summary of the vehicle operator, This is a
                                                    summary of the vehicle operator.</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse accordion-section collapse"
                                        aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="accordion-body">
                                                no data available
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>
@endsection

@if (isset($single) && $single == 'single')
    <script>
        var app = <?php echo json_encode($cars3); ?>;
        var lng = {{ $data['vehicleLocation']->Longitude }};
        var lat = {{ $data['vehicleLocation']->Latitude }};

        console.log(lat);
        // The following example creates complex markers to indicate beaches near
        // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
        // to the base of the flagpole.
      



        // console.log(app[0][1]);
        const beaches = [
            [{!! "'Plate " . $cars[0]->vehno . "'" !!}, lat, lng, 4],



        ];

        function setMarkers(map) {
            // Adds markers to the map.
            // Marker sizes are expressed as a Size of X,Y where the origin of the image
            // (0,0) is located in the top left of the image.
            // Origins, anchor positions and coordinates of the marker increase in the X
            // direction to the right and in the Y direction down.
            const image = "https://zeus.motorafrica.co/assets/images/mapIcon.png"

            // Shapes define the clickable region of the icon. The type defines an HTML
            // <area> element 'poly' which traces out a polygon as a series of X,Y points.
            // The final coordinate closes the poly by connecting to the first coordinate.
            const shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: "poly",
            };

            for (let i = 0; i < beaches.length; i++) {
                const beach = beaches[i];

                new google.maps.Marker({
                    position: {
                        lat: beach[1],
                        lng: beach[2]
                    },
                    map,
                    icon: image,
                    shape: shape,
                    title: beach[0],
                    zIndex: beach[3],
                });
            }
        }

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                zoomControl: true,
                center: {
                    lat: lat,
                    lng: lng
                },
            });

            setMarkers(map);
        }


        inverval_timer = setInterval(function() {
            window.initMap = initMap;
   
            console.log("5 seconds completed");

        }, 5000);


      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhGe6x_ij_ivUkQTmsXGIZVHegzig1JBk&callback=initMap&v=weekly" defer></script>


  
@endif
