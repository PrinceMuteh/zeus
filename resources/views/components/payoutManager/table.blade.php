<table id="datatable-buttons" class="table table-bordered nowrap"
    style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
    <thead class="text-inter">
        <tr>
            <th>
                <input type="checkbox" class="check" />
            </th>
            <th>Plate NO.</th>
            <th>DRIVER NAME</th>
            <th>FLEET</th>
            <th>AMOUNT</th>
            <th>REFERENCE</th>
            <th>DATE</th>
            <th>REASON</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>
                <span class="link-plate-no">RBC1234</span>
            </td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>RBC1234</td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>RBC1234</td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>RBC1234</td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>RBC1234</td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>RBC1234</td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>RBC1234</td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>RBC1234</td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="check" />
            </td>
            <td>RBC1234</td>
            <td>DEMAJI BANKOLE</td>
            <td>BREKETE, NG</td>
            <td>₦35,000.00</td>
            <td>DX23RM345</td>
            <td>23 Feb, 2021</td>
            <td>Remittance</td>
            <td>SUCCESS</td>
        </tr>

        {{-- @if ($transaction)

        @foreach ($transaction->take(50) as $item)
            <tr>
                <td> {{ $item->orderid }} </td>
                <td> {{ $item->vehno }} </td>
                <td>{{ $item->type ?? 'UNKNOWN' }}</td>
                <td>₦ {{ number_format($item->amount) }} </td>
                <td>₦ {{ number_format($item->needpayment) }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->createtime }}</td>
                <td>{{ $item->agentName }}</td>
                <td>
                    <div class="dropdown">
                        <div class="iconBox">
                            <i class="icon-options text-dark pt-2 dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"></i>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Pending</a></li>
                                <li><a class="dropdown-item" href="#">Processing</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Active</a></li>
                                <li><a class="dropdown-item" href="#">Assigned</a></li>
                                <li><a class="dropdown-item" href="#">Suspend</a></li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        @endif --}}



    </tbody>

    <div class="modal-transaction-detail">
        <div class="in-transaction">
            <div class="top-row-transaction">
                <div class="logo-text">
                    <div class="logo-img-text">
                        <span class="logo-svg">
                            <svg width="40" height="40" viewBox="0 0 43 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0 15.4825L15.4161 0.0664062H3.56734C1.6053 0.0664062 3.51278e-05 1.67168 3.51278e-05 3.63371V15.4824L0 15.4825Z"
                                    fill="#FF6600" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M41.0564 2.00976C43.6478 4.60099 43.6476 8.8411 41.0564 11.4325L11.3662 41.1226C8.77494 43.7141 4.53483 43.7141 1.94359 41.1228H1.9434C-0.647833 38.5316 -0.647833 34.2913 1.94359 31.7001L31.6337 2.00983C34.2251 -0.581403 38.4652 -0.581403 41.0565 2.00983L41.0564 2.00976Z"
                                    fill="#FF6600" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M43 27.6504L27.584 43.0664H39.4327C41.3947 43.0664 43 41.4612 43 39.4991V27.6504L43 27.6504Z"
                                    fill="#FF6600" />
                            </svg>
                        </span>

                        <div class="logo-side-text">
                            <span>Zeus Systems</span>
                            <span>Transaction Details</span>
                        </div>
                    </div>

                    <span class="close-icon-bx">
                        <i class='bx bx-x'></i>
                    </span>
                </div>
            </div>

            <div class="details-transaction-modal">
                <div class="detail-in">
                    <span>Trans ID:</span>
                    <span>-</span>
                </div>
                <div class="detail-in">
                    <span>Date:</span>
                    <span>-</span>
                </div>
                <div class="detail-in">
                    <span>Channel:</span>
                    <span>-</span>
                </div>
                <div class="detail-in">
                    <span>Amount:</span>
                    <span>-</span>
                </div>
                <div class="detail-in">
                    <span>Description</span>
                    <span>-</span>
                </div>
                <div class="detail-in">
                    <span>Platform Commission</span>
                    <span>-</span>
                </div>
                <div class="detail-in">
                    <span>Status</span>
                    <span class="success-box">
                        <div class="greenbox mr-1"></div>
                        Successful
                    </span>
                </div>
            </div>
        </div>
    </div>
</table>
<div class="shade-bg-100"></div>


<script>
    let contentPage = document.querySelector('.content-page');
    let linkPlateNo = document.querySelector('.link-plate-no');
    let modalTransactionDetail = document.querySelector('.modal-transaction-detail');
    let closeBx = document.querySelector('.close-icon-bx');
    let filterCalender = document.querySelector('.filter-calender');
    let closeFilterSection = document.querySelector('.close-filter-section');
    let filterSec = document.querySelector('.filter-section');
    let shadeBg = document.querySelector('.shade-bg-100');

    filterCalender.addEventListener('click', () => {
        // contentPage.classList.add('bg-shade');
        shadeBg.style.display = "block";
        filterSec.style.display = "block";
    });
    closeFilterSection.addEventListener('click', () => {
        // contentPage.classList.remove("bg-shade");
        shadeBg.classList.add('d-none');    
        filterSec.classList.add('d-none');
    });

    linkPlateNo.addEventListener('click', () => {
        modalTransactionDetail.style.display = "flex";
    })
    closeBx.addEventListener('click', () => {
        modalTransactionDetail.style.display = "none";
    })
</script>
