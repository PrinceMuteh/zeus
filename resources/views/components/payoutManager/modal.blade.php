@if ($modal == 'true')
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <style>
        td {
            padding: 20px !important;

        }

        /* tr{
            border-bottom: none !important;
        } */

        .modal-dialog {
            padding: 25px;
            max-width: 100%;
            margin: 0;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100vh;
            display: flex;
        }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" id="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <div class="row g-2 mb-5">
                        <div class="col-sm-6 col-md-12 col-lg-4">
                            <div class="boxInfo">
                                <div class="topInfo">
                                    <div class="vectorBox">
                                        <img src="{{ asset('assets/images/deep-vector.svg') }}" alt="">
                                    </div>
                                    <i class="bx bx-dots-vertical-rounded adjust"></i>

                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1">ToTal Deposite</span><br />
                                        <span class="lft2 text-inter"><span>&#8358;</span>
                                            {{ number_format($transaction->whereNotNull('vehno')->sum('needpayment'), 2) }}</span>
                                    </div>
                                    <span class="rightBottom bg-light-red red-text font-weight-bold">
                                        <i class="bx bx-down-arrow-alt"></i>
                                        {{-- <span>22.5%</span> <span>APRIL</span> --}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-4">
                            <div class="boxInfo">
                                <div class="topInfo">
                                    <div class="vectorBox">
                                        <img src="{{ asset('assets/images/deep-vector.svg') }}" alt="">
                                    </div>
                                    <i class="bx bx-dots-vertical-rounded adjust"></i>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1">Total Payout</span><br />
                                        <span class="lft2 text-inter" id="showTotal"></span>
                                    </div>
                                    <span class="rightBottom bg-light-red red-text font-weight-bold">
                                        <i class="bx bx-down-arrow-alt"></i>
                                        {{-- <span>22.5%</span> <span>APRIL</span> --}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-4">

                            <div class="boxInfo bg-blk text-light">
                                <div class="topInfo">
                                    <div class="vectorBox2">
                                        <img src="{{ asset('assets/images/deep-vector.svg') }}" alt="">
                                    </div>
                                    <i class="bx bx-dots-vertical-rounded adjust"></i>
                                </div>
                                <div class="bottomInfo">
                                    <div class="leftBottom">
                                        <span class="lft1 text-light">Total User(s)</span><br />
                                        <span
                                            class="lft2 text-inter text-light">{{ number_format(count($transaction->whereNotNull('vehno'))) }}</span>
                                    </div>
                                    <span class="rightBottom bg-light-dark text-light font-weight-bold">
                                        <i class="bx bx-down-arrow-alt"></i>
                                        <span>22.5%</span> <span>APRIL</span>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <table class="table p-5 table-hover m-0 mt-5 table-actions-bar " id="example">
                        <thead>
                            <tr class="font-weigth-bold">
                                <th>
                                    <input type="checkbox" name="" id="">
                                </th>
                                <th>TRANSACTION REFERENCE NUMBER</th>
                                <th>BENEFICIARY NAME</th>
                                <th>PAYMENT AMOUNT</th>
                                <th>PAYMENT DUE DATE</th>
                                <th>BENEFICIARY CODE</th>
                                <th>BENEFICIARY ACCOUNT NUMBER</th>
                                <th>BENEFICIARY BANK SORT CODE</th>
                                <th>DEBIT ACCOUNT NUMBER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1;
                            $total = 0; ?>
                            @foreach ($transaction as $item)
                                <?php $x++; ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td><a href="details/vehicle/{{ $item->vehno }}">{{ $item->vehno }}{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                            - {{ $x }}</a></td>
                                    <td><a
                                            href="details/vehicle/{{ $item->vehno }}">{{ $item->investorName }}</a>
                                    </td>
                                    <td>
                                        @if ($item->percentage)
                                            {{ ((100 - $item->percentage) / 100) * $item->needpayment }}
                                            <?php $total = ((100 - $item->percentage) / 100) * $item->needpayment + $total; ?>
                                        @else
                                            {{ ((100 - 14.5) / 100) * $item->needpayment }}
                                            <?php $total = ((100 - 14.5) / 100) * $item->needpayment + $total; ?>
                                        @endif


                                        {{-- @if ($item->percentage == '0')
                                        {{ $item->amount }}
                                    @else
                                        {{ ((100 - 14.5) / 100) * $item->amount }}
                                    @endif --}}
                                    </td>
                                    {{-- <td>{{Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td> --}}
                                    <td>
                                        <?php
                                        $date = new DateTime($item->created_at);
                                        $date->modify('+1 day');
                                        echo $date->format('d/m/Y');
                                        ?>
                                    </td>
                                    <td>{{ strtok($item->investorName, ' ') }}{{ $item->vehno }}{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}-{{ $x }}
                                    </td>
                                    <td> <?= str_pad($item->acctNumber, 10, '0', STR_PAD_LEFT) ?></td>
                                    <td> <?= str_pad($item->sortCode, 3, '0', STR_PAD_LEFT) ?></td>
                                    <td><?= $item->debitAccount ?? "1017577749" ?></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <input type="hidden" value="<?php echo '₦ ' . number_format($total, 2); ?>" id="subTotal">
                </div>
                <div class="modal-footer">
                    {{-- <a href="" class="btn btn-primary">
                        Generate Invoice
                    </a> --}}
                    <form action="{{ route('generatePayoutManager') }}" method="Post">
                        <input type="hidden" name="date" value="{{ $dates }}">
                    <input type="hidden" name = "disbursedAmount" value="{{$total }}" id="subTotal">

                        <input type="hidden" name="totalAmount" value = "{{$transaction->whereNotNull('vehno')->sum('needpayment')}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Generate Invoice</button>
                        {{-- </a> --}}
                    </form>
                    {{-- <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button> --}}
                    {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                </div>
            </div>
        </div>
    </div>
@endif
