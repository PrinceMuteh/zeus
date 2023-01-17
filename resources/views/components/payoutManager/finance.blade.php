<div class="finance_section">
    <div class="row">
        <div class="col-sm-6 col-md-12 col-lg-4">
            <div class="row_top_info">
                <div class="top3">
                    <span>Total Disbursed(s)</span>
                    <span class="arrow_box">
                        <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="">
                    </span>
                </div>
                <span class="deposit_amount">
                    {{-- ₦345,000,000.00 --}}
                    ₦ {{ number_format($payout->sum('amount_disbursed'), 2) }}
                </span>
                <span class="total_info">
                    Total from {{ number_format(count($payout)) }} entries
                </span>
            </div>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-4">
            <div class="row_top_info">
                <div class="top3">
                    <span>Processing Payment(s)</span>
                    <span class="arrow_box">
                        <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="">
                    </span>
                </div>
                <span class="deposit_amount">
                    ₦ 0.0
                    {{-- 345,000,000.00 --}}
                </span>
                <span class="total_info">
                    Total from 300 entries
                </span>
            </div>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-4">
            <div class="row_top_info">
                <div class="top3">
                    <span>Pending Payment(s)</span>
                    <span class="arrow_box">
                        <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="">
                    </span>
                </div>
                <span class="deposit_amount">
                    ₦ 0.0
                    {{-- 45,000,000.00 --}}
                </span>
                <span class="total_info">
                    Total from 45 entries
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-12 mt-2">
        <div class="finance_section">
            <div class="card-box table-responsive">
                <table id="datatable" class="table table-bordered nowrap"
                    style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
                    <thead class="text-inter">
                        <tr>
                            <th>REFERENCE NO.</th>
                            <th>FLEET</th>
                            <th>AMOUNT</th>
                            <th>AMOUNT DUE</th>
                            <th>STATUS</th>
                            <th>DATE</th>
                            <th>AGENT</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payout as $item)
                            <tr>
                                <td> <a href="{{ route('payout-view', ['id' => $item->id]) }}">{{ $item->reference }} </a>
                                </td>
                                <td>{{ $item->fleet }}</td>
                                {{-- <td>₦ {{ number_format($item->amount) }} </td> --}}
                                <td>₦ {{ number_format($item->total_amount, 2) }}</td>
                                <td>₦ {{ number_format($item->amount_disbursed) }}</td>
                                <td>
                                    @if ($item->status == 'Active')
                                        <div class="text-success"> {{ $item->status }}</div>
                                    @elseif($item->status == 'Pending')
                                        <div class="text-warning"> {{ $item->status }}</div>
                                    @elseif($item->status == 'Processing')
                                        <div class="text-primary"> {{ $item->status }}</div>
                                    @else
                                        <div class="text-danger"> {{ $item->status }}</div>
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->agent }}</td>
                                <td>
                                    <div class="dropdown">
                                        <div class="iconBox">
                                            <i class="icon-options text-dark pt-2 dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('payout-status', ['status' => 'Pending', 'id' => $item->id]) }}">Pending</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('payout-status', ['status' => 'Processing', 'id' => $item->id]) }}">Processing</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('payout-status', ['status' => 'Active', 'id' => $item->id]) }}">Active</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('payout-status', ['status' => 'Assigned', 'id' => $item->id]) }}">Assigned</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('payout-status', ['status' => 'Suspend', 'id' => $item->id]) }}">Suspend</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
