    <div class="maintenanceCost">
        <div>
            <span class="sectionTitle d-block text-inter p-0">Maintenance Cost</span>
            <span class="subTitle">
                The amount to be dedcted for routine maintenance from
                drivers wallet cost </span>
        </div>
        <button class="addBtn" data-bs-toggle="modal" data-bs-target="#createNew">
            CREATE NEW
        </button>
    </div>
    @include('components.message')

    <div class="card-box table-responsive">
        <table id="datatable" class="table table-bordered nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="text-inter">
                <tr>
                    <th>
                        <input type="checkbox" class="check" />
                    </th>
                    <th>REFERENCE</th>
                    <th>AMOUNT</th>
                    <th>FLEET</th>
                    <th>PACKAGE</th>
                    <th>WORKSHOP</th>
                    <th>PAYEE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maintenace as $item)
                    @foreach ($users as $user)
                        @if ($user->id == $item->workshop_id)
                         {{   
                                $workshop = $item->first_name ?? "-";
                           }}
                        @endif
                    @endforeach
                    <tr>
                        <td>
                            <input type="checkbox" class="check" />
                        </td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#requestPayment"
                                data-reference="{{ $item->reference }}" data-payee="{{ $item->payee }}"
                                data-amount="₦ {{ number_format($item->amount) }}"
                                data-package_name="{{ $item->package_name }}" data-fleet="{{ $item->first_name }}"
                                data-datez="{{ $item->created_at }}" data-workshop="{{ $workshop ?? "-" }}">
                                {{ $item->reference }}
                            </a>
                        </td>
                        <td>₦ {{ number_format($item->amount) }}</td>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        <td>{{ $item->package_name }}</td>
                        <td>{{ $workshop ?? "-" }}</td>
                        <td>{{ $item->payee }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="requestPayment" tabindex="-1" aria-labelledby="requestPaymentLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestPaymentLabel">MAINTENANCE COST
                        DETAILS
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="everyInfo">
                        <p class="info-text-top">
                            GENERATED FROM MOTORAFRICA ON <span class="datez"></span>
                        </p>
                        <div class="formSec container-fluid"
                            style="background: #fafafa; border-radius: 6px; height: auto">
                            <div>
                                <div class="row mb-3">
                                    <div class="col-6 side1">Date</div>
                                    <div class="col-6 side2 datez"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 side1">Amount</div>
                                    <div class="col-6 side2 amount"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 side1">Fleet</div>
                                    <div class="col-6 side2 fleetz"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 side1">Package</div>
                                    <div class="col-6 side2 package_name"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 side1">Payee</div>
                                    <div class="col-6 side2 payeez"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 side1">Workshop</div>
                                    <div class="col-6 side2 workshop"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 side1">Reference</div>
                                    <div class="col-6 side2 referencez" id="reference"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="main2">
                        <div class="form-group mt-3">
                            <button class="submitBtn btn">SHARE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="createNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('maintenance') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">MAINTENANCE COST</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <span>Set and Manage the cost to be deducted for regular vehicle maintenance</span>
                        <hr>
                        <div class="formSec">
                            <div class="form-group">
                                <label for="">Choose Fleet</label>
                                <select class="form-control infoInput" name="fleet">
                                    <option value="">--Please Select--</option>
                                    @foreach ($users->where('user_type', 'Fleet Operator') as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->first_name . ' ' . $item->last_name }}</option>
                                    @endforeach

                                    {{-- <option value="AutoChek Lagos">AutoChek Lagos</option>
                                <option value="Brekete Taxi">Brekete Taxi</option>
                                <option value="7Central Logistics">
                                    7Central Logistics
                                </option> --}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Package</label>
                                <select class="form-control infoInput" name="package">
                                    <option value="">--Please Select--</option>
                                    @foreach ($package as $item)
                                        <option value="{{ $item->package_id }}">{{ $item->package_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Payee</label>
                                <select class="form-control infoInput" name="payee">
                                    <option value="">--Please Select--</option>

                                    <option value="Driver">Driver</option>
                                    <option value="Vehicle Owner">Vehicle Owner</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-6 col-md-7">
                                    <div class="form-group">
                                        <label for="">Assign Workshop</label>
                                        <select class="form-control infoInput" name="workshop">
                                            <option value="">--Please Select--</option>

                                            @foreach ($users->where('user_type', 'Workshop Administrator') as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->first_name . ' ' . $item->last_name }}</option>
                                            @endforeach
                                            {{-- <option value="Short Rental">
                                                AutoChek Lugbe Centre
                                            </option>
                                            <option value="Dabo Tire Ltd">Dabo Tire Ltd</option>
                                            <option value="7Central Technologies">
                                                7Central Technologies
                                            </option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label for="" style="visibility: hidden">Info</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text brd-none" id="basic-addon1">₦</span>
                                        <input type="number" name="amount"
                                            class="form-control infoInput brd-none" />
                                        <small class="bottomText">workshop service commission</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn" style="background: #4a4aff;">SUBMIT</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
