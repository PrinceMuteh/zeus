<div class="top-row">
    <div>
        <p class="sectionTitle text-inter pb-0 pl-0">Technical Desk</p>
    </div>
</div>
<ul class="sub-tabs border-none mb-0" style="margin-left: 5px;">
    <li class="list_finance_transaction">
        <a href="technical-desk">Dashboard</a>
    </li>
    <li class="list_finance_remittance border-none bbd">
        <a class="fw-bold">
            Task(S) LOG
        </a>
    </li>
</ul>
<div class="container-fluid">
    <div class="row technical-inner">
        <div class="col-sm-6 col-md-12 col-lg-3 p-3">
            <div class="row_top_info">
                <div class="top3">
                    <span> ALL TASK(S)</span>
                    <span class="arrow_box">
                        <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.79692 8.91797L10.9998 3.71511L16.2026 8.91797" stroke="#08102E"
                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11 18.2852V3.85944" stroke="#08102E" stroke-width="2"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <span class="deposit_amount">
                    {{$allTask}}
                </span>
                <span class="total_info">
                    LAST UPDATED:23 AUG, 2022
                </span>
                <div class="line-right-100"></div>
            </div>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-3 p-3">
            <div class="row_top_info">
                <div class="top3">
                    <span>NEW TASK(S)</span>
                    <span class="arrow_box">
                        <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.79692 8.91797L10.9998 3.71511L16.2026 8.91797" stroke="#08102E"
                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11 18.2852V3.85944" stroke="#08102E" stroke-width="2"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <span class="deposit_amount">
                    {{$newTask}}
                </span>
                <span class="total_info">
                    LAST UPDATED:23 AUG, 2022
                </span>
                <div class="line-right-100"></div>

            </div>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-3 p-3">
            <div class="row_top_info">
                <div class="top3">
                    <span> PROCESSING TASK(S)</span>
                    <span class="arrow_box">
                        <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.79692 8.91797L10.9998 3.71511L16.2026 8.91797" stroke="#08102E"
                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11 18.2852V3.85944" stroke="#08102E" stroke-width="2"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <span class="deposit_amount">
                    {{$processing}}
                </span>
                <span class="total_info">
                    LAST UPDATED:23 AUG, 2022
                </span>
                <div class="line-right-100"></div>
            </div>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-3 p-3">
            <div class="row_top_info">
                <div class="top3">
                    <span>CLOSED TASK(S)</span>
                    <span class="arrow_box">
                        <svg width="16" height="16" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.79692 8.91797L10.9998 3.71511L16.2026 8.91797" stroke="#08102E"
                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11 18.2852V3.85944" stroke="#08102E" stroke-width="2"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <span class="deposit_amount">
                    {{$closedTask}}
                </span>
                <span class="total_info">
                    LAST UPDATED:23 AUG, 2022
                </span>
            </div>
        </div>
    </div>
</div>
