<div class="basic-info-section">
    <div class="row justify-content-center g-0 border-top-line">
        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section">
                <div class="mt-2">
                    <div class="image-car-sample-100">
                       

                         <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ $data['carFleet']->front ?? 'https://test.mygarage.africa/car1.png' }}"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ $data['carFleet']->interior ?? 'https://test.mygarage.africa/car1.png' }}"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ $data['carFleet']->back ?? 'https://test.mygarage.africa/car1.png' }}"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ $data['carFleet']->diagonal ?? 'https://test.mygarage.africa/car1.png' }}"
                                        class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth()->user()->user_type == 'SUPER')
                    <div class="d-flex justify-content-end">
                        <span class="assign-info-border mt-2 mb-2" data-toggle="modal" data-target="#operationalData"
                            style="width: 100px;">
                            UPDATE</span>
                    </div>
                @endif
                <div class="baseInfo">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">LICENCE PLATE:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['vehicleDetails']->vehno ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">TYPE:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['allVehicle']->brandname ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">MODEL:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['carFleet']->model ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">YEAR:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['carFleet']->year ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">CHASSIS:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">2T1BU40E49C179680</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">BODY:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['carFleet']->body ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">ENGINE:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['carFleet']->engine ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">TRANSMISSION:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['carFleet']->transmission ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">COLOR:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['carFleet']->colour ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">DATE ADDED:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['carFleet']->created_at ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">FLEET:</span>
                        </div>
                        <div class="col-md-5">
                            <span class="lr-text">{{ $data['allVehicle']->bodytypename ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="ll-text">SUPPORT CENTRE:</span>
                        </div>
                        <div class="col-md-7">
                            <span class="lr-text">{{ $data['carFleet']->serviceCentreName ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section">
                <div class="operation-data-balance mt-2 mb-4">
                    <div class="shape-circle-100 ml-2 mr-3">
                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.4353 9.69889C19.3358 9.50148 19.1836 9.33548 18.9956 9.21928C18.8075 9.10307 18.591 9.04121 18.3699 9.04053H12.3849V1.85852C12.3978 1.596 12.3239 1.33655 12.1746 1.12021C12.0253 0.903878 11.809 0.742688 11.559 0.661523C11.3187 0.582452 11.0595 0.581564 10.8186 0.658984C10.5777 0.736405 10.3676 0.888153 10.2184 1.09244L0.64234 14.2595C0.52236 14.4329 0.450316 14.6349 0.4335 14.8451C0.416684 15.0553 0.455694 15.2662 0.54658 15.4565C0.630277 15.674 0.775672 15.8624 0.96492 15.9985C1.15417 16.1346 1.37903 16.2125 1.61191 16.2225H7.59692V23.4046C7.59711 23.657 7.67708 23.9029 7.82542 24.1071C7.97376 24.3113 8.18287 24.4635 8.42285 24.5417C8.54312 24.579 8.66804 24.5991 8.79392 24.6016C8.98279 24.6021 9.1691 24.5578 9.33761 24.4725C9.50612 24.3872 9.65206 24.2633 9.76349 24.1108L19.3395 10.9438C19.4685 10.7652 19.5457 10.5544 19.5626 10.3348C19.5795 10.1152 19.5354 9.89511 19.4353 9.69889ZM9.99092 19.7178V15.0255C9.99092 14.7081 9.86481 14.4036 9.64033 14.1791C9.41585 13.9547 9.11139 13.8285 8.79392 13.8285H4.00592L9.99092 5.54529V10.2375C9.99092 10.555 10.117 10.8595 10.3415 11.0839C10.566 11.3084 10.8705 11.4345 11.1879 11.4345H15.9759L9.99092 19.7178Z"
                                fill="white" />
                        </svg>
                    </div>
                    <div class="operation-item-100 mb-1">
                        <span style="font-size: 10px">WALLET BALANCE</span>
                        <span style="font-size: 18px; font-weight:bold;">
                            {{ number_format($data['mangament']->acctBal ?? 0) }} </span>
                        {{-- <span style="font-size: 10px;">TOTAL SPEND:$78,0000</span> --}}
                    </div>
                </div>

                <span class="status-100 mb-4 mt-4 ml-2">INTEGRATION SUMMARY</span>
                <div class="baseInfo" style="padding-bottom: 10px;">
                    <div class="row mb-2 mt-2">
                        <div class="col-6">
                            <span class="ll-text">PAYMENT START DATE:</span>
                        </div>
                        <div class="col-6">
                            {{-- <span class="lr-text">{{ $data['carFleet']->start_date ?? '-' }}</span> --}}
                            <span
                                class="lr-text">{{ $data['payments'][count($data['payments']) - 1]->createtime ?? '-' }}</span>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">SUBCRIBTION VALUE:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ $data['carFleet']->remittanceAmount ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">NEXT PAYMENT:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">PACKAGE:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ $data['allVehicle']->bodytypename ?? '-' }} </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">PAYMENT CIRCLE:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ $data['carFleet']->paymentMode ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">PLATFORM COMMISSION:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text"> {{ $data['carFleet']->platform_comm ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">OWNER COMMISSION:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ $data['carFleet']->owner_comm ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <span class="ll-text">VEHICLE COST:</span>
                        </div>
                        <div class="col-6">
                            <span class="lr-text">{{ $data['carFleet']->hirePurchaseValue ?? '-' }}</span>
                        </div>
                    </div>
                    {{-- <div id="donutchart-4" style=" height: 150px; padding-bottom:5px; font-size: 20px;">
                    </div> --}}
                </div>


            </div>
        </div>


        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section">
                <div class="mb-3 pt-2 d-flex align-items-center justify-content-between">
                    <span class="top-text-300">TRANSACTION HISTORY</span>
                    <span class="assign-info">
                        DOWNLOAD ALL</span>
                </div>

                <div class="main-transaction-history scroll">
                    @foreach ($data['payments'] as $item)
                        <div class="transaction-history text-left">
                            <div class="shape-arrow-down">
                                <div class="arrow-green-down bg-light-green200">
                                    <svg width="54" height="55" viewBox="0 0 54 55" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect y="0.871094" width="53.5312" height="53.5312" rx="8.92187"
                                            fill="#E6FFCC" />
                                        <path d="M19.1953 28.9863L26.7657 36.5568L34.3362 28.9863" stroke="#27B235"
                                            stroke-width="3.56875" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M26.7656 18.7148V36.5586" stroke="#27B235" stroke-width="3.56875"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="credit-detail">
                                <span class="credit-info-100">CREDIT</span>
                                <span class="credit-info-200"> {{ $item->orderid }}</span>
                                <span
                                    class="credit-info-100">{{ \Carbon\Carbon::parse($item->createtime)->format('d-m-Y : hi') }}</span>
                            </div>
                            <div class="credit-value">
                                <span class="credit-info-100">CLEARED</span>
                                <span class="credit-info-200">₦ {{ number_format($item->needpayment, 2) }}</span>
                                <span></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="operationalData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Vehicle Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('updatefleet') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="hidden" name="vehno" value="{{ $data['allVehicle']->vehno }}">

                        <div class="form-group">
                            <label for="">Type</label>
                            <input type="text" name="barandname" id="type"
                                class="form-control authorizationInput" value="{{ $data['allVehicle']->brandname }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Model</label>
                            <input type="text" name="model" class="form-control authorizationInput"
                                value="{{ $data['allVehicle']->model ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Year</label>
                            <select class="form-control year" name="year">
                                <?php
                                            for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                                <option value="<?= $year ?>"><?= $year ?></option>
                                <?php endfor; ?>
                            </select>
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
                        </div>
                        <div class="form-group">
                            <label for="">Engine</label>
                            <input type="text" name="engine" class="form-control authorizationInput"
                                value="{{ $data['allVehicle']->engine ?? '' }}" required>
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
                        </div>
                        <div class="form-group">
                            <label for="">Fleet</label>
                            <select name="fleet" id="" class="form-control fleet" required>
                                @foreach ($fleet as $item)
                                    <option value="{{ $item->fleet_id }}">{{ $item->fleet_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Font Image</label>
                            <input type="file" name="frontImage" id="" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="">Interoir Image</label>
                            <input type="file" name="interiorImage" id="" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="">Back Image</label>
                            <input type="file" name="backImage" id="" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for=""> Diagonal Image</label>
                            <input type="file" name="diagonalImage" id="" class="form-control" accept="image/*">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>
