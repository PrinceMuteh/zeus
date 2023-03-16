<div class="m15">
    <!-- text-inter -->
    <div class="top-row">
        <div>
            <p class="sectionTitle text-inter pb-0 pl-0">Account officer module</p>
        </div>
    </div>
    <div class="links-filter">
        <ul class="account-office-tab">
            <li class="general-overview-link"><a href="">General Overview</a></li>
            <li class="fleet-operations-link"><a href="account-officer-fleet-operations">Fleet Operations</a></li>
            <li class="remittance-manager-link"><a href="account-officer-remittance-manager">Remittance Manager</a></li>
            <li class="service-center-link"><a href="account-officer-service-center">Service Center</a></li>
            <li class="loan-credit-link"><a href="account-officer-loans-credit">Loans & Credit</a></li>
            <li class="communications-link"><a href="account-officer-communication">Communication</a></li>
            <li class="documents-link"><a href="account-officer-documents">Documents</a></li>
        </ul>

        <div class="filter-calender">
            <div class="filterIcon">
                <svg width="15" height="14" viewBox="0 0 17 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.65252 0.779297H15.668C15.7944 0.779297 15.9181 0.816017 16.0241 0.884993C16.13 0.95397 16.2136 1.05223 16.2648 1.16784C16.3159 1.28345 16.3324 1.41142 16.3121 1.53621C16.2919 1.66099 16.2359 1.77722 16.1509 1.87076L10.7875 7.7704C10.6783 7.89051 10.6178 8.04701 10.6178 8.20933V12.828C10.6178 12.9355 10.5913 13.0412 10.5406 13.1359C10.4899 13.2306 10.4167 13.3114 10.3273 13.371L7.71718 15.111C7.61891 15.1765 7.5047 15.2142 7.38673 15.2199C7.26876 15.2256 7.15146 15.1991 7.04733 15.1434C6.9432 15.0877 6.85614 15.0047 6.79545 14.9034C6.73476 14.8021 6.7027 14.6862 6.7027 14.5681V8.20933C6.7027 8.04701 6.6422 7.89051 6.53301 7.7704L1.1697 1.87076C1.08466 1.77722 1.02863 1.66099 1.0084 1.53621C0.988181 1.41142 1.00464 1.28345 1.05578 1.16784C1.10692 1.05223 1.19054 0.95397 1.29648 0.884993C1.40242 0.816017 1.52611 0.779297 1.65252 0.779297V0.779297Z"
                        stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="filterCalender">
                <span>FILTER:<span class="font-weight-bold">CUSTOM RANGE</span></span>
                <img src="{{ asset('assets/images/calender.png') }}" alt="" />
            </div>

            <div class="filter-section">
                <div class="top-filter-section">
                    <span>SUPER FILTER</span>
                    <span class="close-filter-section">
                        <i class='bx bx-x'></i>
                    </span>
                </div>

                <div>
                    <div class="form-group mb-1">
                        <label for="">By Fleet</label>
                        <select name="">
                            <option value="">Default / All</option>
                        </select>
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Stakeholders</label>
                        <select name="">
                            <option value="">Investors</option>
                        </select>
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Specify Period</label>
                        <select name="">
                            <option value="">--Please select--</option>
                        </select>
                    </div>

                    <div class="date-range">Date range</div>
                    <div class="form-group mb-1">
                        <label for="">Start Date</label>
                        <input type="date" name="">
                    </div>
                    <div class="form-group mb-1">
                        <label for="">End Date</label>
                        <input type="date" name="">
                    </div>

                    <button class="submit-modal">
                        submit
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
