<div class="gps-section">
    <div class="row justify-content-center g-0 border-top-line">
        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section">
                <div class="operation-data bg-light-grey mt-2 p-2" style="height: 200px">
                    <canvas id="top_x_divs" height="10vh" width="22vw"></canvas>
                </div>
                <div class="operation-data mt-3 border-0">
                    <div class="traffic-info">
                        <div class="traffic-info1">
                            <div class="top-circle tc1">
                                <img src="{{ asset('assets/images/yellow_pin.svg') }}" alt="">
                            </div>
                            <span class="info-desc1">{{ $data['vehicleLocation']->Miles ?? 0 / 1000 }} km</span>
                            <span class="info-desc2">Mileage</span>
                        </div>
                        <div class="traffic-info1">
                            <div class="top-circle tc2">
                                <img src="{{ asset('assets/images/blue_circle.svg') }}" alt="">
                            </div>
                            <span class="info-desc1">0 km/h</span>
                            <span class="info-desc2">Avg. Speed</span>
                        </div>
                        <div class="traffic-info1">
                            <div class="top-circle tc3">
                                <img src="{{ asset('assets/images/blue_clock.svg') }}" alt="">
                            </div>
                            <span class="info-desc1">00h:0m</span>
                            <span class="info-desc2">Drive Time</span>
                        </div>
                    </div>

                </div>
                <div class="operation-data mt-2 border-0">
                    <div class="top-300">
                        <span class="top-text-300">MAINTENANCE</span>
                        <span class="small-grey">see more</span>
                    </div>
                    <div class="next-payment">
                        <div class="circle-left-100">
                            <div class="box-100">
                                <svg width="23" height="23" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.3687 7.28711V13.9538" stroke="#28BE5B" stroke-width="2.17302"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M9.02892 1.57227H17.7077C17.8328 1.57227 17.9566 1.5969 18.0721 1.64476C18.1877 1.69262 18.2927 1.76278 18.3811 1.85121L24.5179 7.98802C24.6064 8.07646 24.6765 8.18145 24.7244 8.297C24.7722 8.41254 24.7969 8.53639 24.7969 8.66146V17.3402C24.7969 17.4653 24.7722 17.5891 24.7244 17.7047C24.6765 17.8202 24.6064 17.9252 24.5179 18.0137L18.3811 24.1505C18.2927 24.2389 18.1877 24.309 18.0721 24.3569C17.9566 24.4048 17.8328 24.4294 17.7077 24.4294H9.02892C8.90386 24.4294 8.78001 24.4048 8.66446 24.3569C8.54891 24.309 8.44393 24.2389 8.35549 24.1505L2.21868 18.0137C2.13024 17.9252 2.06009 17.8202 2.01223 17.7047C1.96437 17.5891 1.93973 17.4653 1.93973 17.3402V8.66146C1.93973 8.53639 1.96437 8.41254 2.01223 8.297C2.06009 8.18145 2.13024 8.07646 2.21868 7.98802L8.35549 1.85121C8.44393 1.76278 8.54891 1.69262 8.66446 1.64476C8.78001 1.5969 8.90386 1.57227 9.02892 1.57227Z"
                                        stroke="#28BE5B" stroke-width="2.17302" stroke-miterlimit="10" />
                                    <path
                                        d="M13.3683 19.6677C12.5793 19.6677 11.9397 19.0281 11.9397 18.2391C11.9397 17.4501 12.5793 16.8105 13.3683 16.8105C14.1573 16.8105 14.7969 17.4501 14.7969 18.2391C14.7969 19.0281 14.1573 19.6677 13.3683 19.6677Z"
                                        fill="#28BE5B" />
                                </svg>

                            </div>
                        </div>
                        <div class="mid-100">
                            <span class="top-text-400">NEXT MAINTENANCE</span>
                            <progress id="file"class="w-100" max="100" value="0"> 70%
                            </progress>
                            <span class="small-grey">Due: 03 Days from today / 2,500km away</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section">
                <div class="operation-data mt-2 mb-2" style="height: 200px">
                    <div class="mapUser">
                        <div id="map" style="width:100%; height:100%"></div>
                    </div>
                </div>

                <div class="baseInfo">
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">DEVICE ID:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ $data['vehicleLocation']->SystemNo ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">TIME:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ $data['vehicleLocation']->Time ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">LOCATION:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">
                                @if ($data['vehicleLocation']->Locate ?? 0 == 1)
                                    YES
                                @else
                                    NO
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">IGNITION:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">
                                @if ($data['vehicleLocation']->DtStatus ?? 0 == 1)
                                    YES
                                @else
                                    NO
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">TOTAL MILEAGE (KM):</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ number_format($data['vehicleLocation']->Miles ?? 0 / 1000) }}
                                KM</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">LONGTITUDE:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text deco-blue">{{ $data['vehicleLocation']->Longitude ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">LATITUDE:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text deco-blue">{{ $data['vehicleLocation']->Latitude ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">ADDRESS:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ $data['location'] ?? '-' }}</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section pt-4">

                <span class="status-100 mb-4 ml-2 mt-4">OVERVIEW</span>
                <div class="baseInfo" style="padding-bottom: 10px;">
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">HEALTH:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">ALERT(S):</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">DATA SIZE:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">0MB</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">STATUS:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">CONNECTED</span>
                        </div>
                    </div>

                </div>

                <span class="status-100 mb-4 ml-2">ACTIVITY LOG</span>
                {{-- <div class="info-activity border-0 pr-4">
                    <div class="info-info border-0">
                        <div class="info-icon">
                            <div class="icon-notice bg-light-blue">
                                <img src="{{ asset('assets/images/notice.svg') }}" alt="" />
                            </div>
                        </div>
                        <div class="info-desc">
                            <span class="infoTop">
                                GPS device connection lost for RBC123XC
                            </span>
                            <span class="infoButtom">16 May, 2022 @ 04:35</span>
                        </div>
                    </div>
                    <div class="info-info border-0">
                        <div class="info-icon">
                            <div class="icon-notice bg-light-blue">
                                <img src="{{ asset('assets/images/notice.svg') }}" alt="" />
                            </div>
                        </div>
                        <div class="info-desc">
                            <span class="infoTop">
                                Maintenance Started @ Godwin Motors, Abuja
                            </span>
                            <span class="infoButtom">16 May, 2022 @ 04:35</span>
                        </div>
                    </div>
                    <div class="info-info border-0">
                        <div class="info-icon">
                            <div class="icon-notice bg-light-blue">
                                <img src="{{ asset('assets/images/notice.svg') }}" alt="" />
                            </div>
                        </div>
                        <div class="info-desc">
                            <span class="infoTop">
                                Repair Advisory submitted
                            </span>
                            <span class="infoButtom">16 May, 2022 @ 04:35</span>
                        </div>
                    </div>
                </div>




               --}}
            </div>
        </div>
    </div>
</div>

