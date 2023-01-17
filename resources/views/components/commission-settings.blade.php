@extends('main')
@section('content')
    <style>
        .commissionLink {
            font-weight: bold;
            position: relative;
            margin-left: 17px !important;
            color: #FF6600 !important;
        }

        .commissionLink::before {
            content: "";
            width: 4px;
            height: 12px;
            background-color: #FF6600;
            position: absolute;
            top: 14px;
            left: 2px;
        }

        .searchCom {
            border: none;
            outline: none;
            width: 500px;
            background: #cccccc60;
            border-radius: 24px;
            height: 40px;
            position: relative;
            padding: 0 150px 0 10px;
            color: #000;
        }

        .searchComBtn {
            border: none;
            outline: none;
            height: 30px;
            width: auto;
            padding: 5px 24px;
            color: #fff;
            background: #4A4AFF;
            border-radius: 36px;
            position: absolute;
            right: 5px;
            top: 5px;
            font-size: 13px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .searchCommission {
            position: relative;
        }

        .commission-sidebar {
            padding: 40px 120px 50px 70px;
            width: 45%;
            height: 100vh;
            background: #fff;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 1000;

        }

        label {
            font-size: 10px !important;
            color: #08102E !important;
        }
    </style>
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-10">
                <div class="paymentRecieved">
                    <div class="top-row">
                        <div>
                            <p class="sectionTitle text-inter pl-3 pb-0 pl-0">
                                <img src="{{ asset('assets/images/arrow-left.svg') }}" class="mr-1" alt="">
                                Control Panel
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            @include('components.control-panel.sidebar')
                        </div>
                        <div class="col-sm-6 col-md-9">
                            <div class="maintenanceCost">
                                <div>
                                    <span class="sectionTitle d-block text-inter p-0">Commission Config.</span>
                                </div>
                                <div class="searchCommission">
                                    <input type="search" class="searchCom">
                                    <button class="searchComBtn">ADD NEW</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        {{-- <h4 class="header-title">Default Example</h4> --}}
                                        <h4 class="header-title pl-0 mb-3 mt-2">ACCOUNT LIST</h4>
                                        <table id="datatable"
                                            class="table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap table"
                                            style="
                                        border-collapse: collapse;
                                        border-spacing: 0;
                                        width: 100%;
                                      ">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" class="form-check">
                                                    </th>
                                                    <th>FLEET ID</th>
                                                    <th>NAME</th>
                                                    <th>LOCATION</th>
                                                    <th>COMMISSION</th>
                                                    <th>DATE</th>
                                                    <th>CONTACT</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="form-check">
                                                    </td>
                                                    <td>45678-EWS</td>
                                                    <td>BREKETE TAXI</td>
                                                    <td>ABUJA</td>
                                                    <td>23%</td>
                                                    <td>23 Feb, 2021</td>
                                                    <td>08012345678</td>
                                                    <td>ACTIVE</td>
                                                    <td>
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="form-check">
                                                    </td>
                                                    <td>45678-EWS</td>
                                                    <td>BREKETE TAXI</td>
                                                    <td>ABUJA</td>
                                                    <td>23%</td>
                                                    <td>23 Feb, 2021</td>
                                                    <td>08012345678</td>
                                                    <td>ACTIVE</td>
                                                    <td>
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="form-check">
                                                    </td>
                                                    <td>45678-EWS</td>
                                                    <td>BREKETE TAXI</td>
                                                    <td>ABUJA</td>
                                                    <td>23%</td>
                                                    <td>23 Feb, 2021</td>
                                                    <td>08012345678</td>
                                                    <td>ACTIVE</td>
                                                    <td>
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </td>
                                                </tr>
                                                <tr class="view-info">
                                                    <td>
                                                        <input type="checkbox" class="form-check">
                                                    </td>
                                                    <td>45678-EWS</td>
                                                    <td>BREKETE TAXI</td>
                                                    <td>ABUJA</td>
                                                    <td>23%</td>
                                                    <td>23 Feb, 2021</td>
                                                    <td>08012345678</td>
                                                    <td>ACTIVE</td>
                                                    <td>
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}

                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>


    <div class="commission-sidebar firstSlideCommission">
        <span class="close-commission">
            <svg width="13" height="13" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.77342 1.2882C10.0663 0.995302 10.0663 0.520428 9.77342 0.227535C9.48053 -0.0653583 9.00566 -0.0653583 8.71276 0.227535L9.77342 1.2882ZM0.227482 8.71282C-0.0654108 9.00571 -0.0654108 9.48058 0.227482 9.77348C0.520376 10.0664 0.995249 10.0664 1.28814 9.77348L0.227482 8.71282ZM8.71276 9.77342C9.00566 10.0663 9.48053 10.0663 9.77342 9.77342C10.0663 9.48053 10.0663 9.00566 9.77342 8.71276L8.71276 9.77342ZM1.28814 0.227482C0.995249 -0.0654108 0.520376 -0.0654108 0.227482 0.227482C-0.0654108 0.520376 -0.0654108 0.995249 0.227482 1.28814L1.28814 0.227482ZM8.71276 0.227535L0.227482 8.71282L1.28814 9.77348L9.77342 1.2882L8.71276 0.227535ZM9.77342 8.71276L1.28814 0.227482L0.227482 1.28814L8.71276 9.77342L9.77342 8.71276Z"
                    fill="#28303F" />
            </svg>
        </span>

        <div class="top-lead-side">
            <div class="top-sidebar mb-3">
                <span class="sectionTitle d-block text-inter p-0">Comission Configuration for Fleet <br> Management on
                    platform</span>
                <button class="editBtn">
                    Edit
                </button>
            </div>
            <span class="subTitle-side pr-4">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed tempore laudantium doloribus iusto, natus ab
                accusamus. Commodi reprehenderit.
            </span>
        </div>

        <div class="row row-list">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="left-side-commission">ENTRY DATE:</div>
                    </div>
                    <div class="col-6">
                        <div class="right-side-commission">21 Aug, 2021</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="left-side-commission">FLEET ID:</div>
                    </div>
                    <div class="col-6">
                        <div class="right-side-commission">45678-EWS</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="left-side-commission">NAME:</div>
                    </div>
                    <div class="col-6">
                        <div class="right-side-commission">BREKETE TAXI</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="left-side-commission">LOCATION:</div>
                    </div>
                    <div class="col-6">
                        <div class="right-side-commission">ABUJA</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="left-side-commission">COMMISSION:</div>
                    </div>
                    <div class="col-6">
                        <div class="right-side-commission">23%</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="left-side-commission">LAST MODIFIED:</div>
                    </div>
                    <div class="col-6">
                        <div class="right-side-commission">21 Aug, 2021</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="left-side-commission">CONTACT:</div>
                    </div>
                    <div class="col-6">
                        <div class="right-side-commission">08012345678</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="left-side-commission">STATUS:</div>
                    </div>
                    <div class="col-6">
                        <div class="right-side-commission">ACTIVE</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="base-specification pt-3">
            <p class="subTitle-side pr-4 fw-bold">
                Vehicle Specification
            </p>
            <p class="subTitle-side pr-4 d-block">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed tempore laudantium doloribus iusto, natus ab
                accusamus. Commodi reprehenderit.
            </p>
        </div>
        <button class="save-commission-btn">
            <span class="mr-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.2699 8.36328H4.729C4.32746 8.36328 4.00195 8.68879 4.00195 9.09033V19.269C4.00195 19.6705 4.32746 19.996 4.729 19.996H19.2699C19.6715 19.996 19.997 19.6705 19.997 19.269V9.09033C19.997 8.68879 19.6715 8.36328 19.2699 8.36328Z"
                        stroke="white" stroke-width="1.45409" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M8.72852 8.36374V5.09202C8.72852 4.22431 9.07321 3.39214 9.68678 2.77857C10.3003 2.16501 11.1325 1.82031 12.0002 1.82031C12.8679 1.82031 13.7001 2.16501 14.3137 2.77857C14.9272 3.39214 15.2719 4.22431 15.2719 5.09202V8.36374"
                        stroke="white" stroke-width="1.45409" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12.0007 15.271C12.603 15.271 13.0913 14.7827 13.0913 14.1804C13.0913 13.5781 12.603 13.0898 12.0007 13.0898C11.3984 13.0898 10.9102 13.5781 10.9102 14.1804C10.9102 14.7827 11.3984 15.271 12.0007 15.271Z"
                        fill="white" />
                </svg>

            </span>
            <span>SAVE & UPDATE</span>
        </button>
    </div>

    <div class="commission-sidebar editCommission">
        <span class="exit-commission">
            <svg width="13" height="13" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.77342 1.2882C10.0663 0.995302 10.0663 0.520428 9.77342 0.227535C9.48053 -0.0653583 9.00566 -0.0653583 8.71276 0.227535L9.77342 1.2882ZM0.227482 8.71282C-0.0654108 9.00571 -0.0654108 9.48058 0.227482 9.77348C0.520376 10.0664 0.995249 10.0664 1.28814 9.77348L0.227482 8.71282ZM8.71276 9.77342C9.00566 10.0663 9.48053 10.0663 9.77342 9.77342C10.0663 9.48053 10.0663 9.00566 9.77342 8.71276L8.71276 9.77342ZM1.28814 0.227482C0.995249 -0.0654108 0.520376 -0.0654108 0.227482 0.227482C-0.0654108 0.520376 -0.0654108 0.995249 0.227482 1.28814L1.28814 0.227482ZM8.71276 0.227535L0.227482 8.71282L1.28814 9.77348L9.77342 1.2882L8.71276 0.227535ZM9.77342 8.71276L1.28814 0.227482L0.227482 1.28814L8.71276 9.77342L9.77342 8.71276Z"
                    fill="#28303F" />
            </svg>

        </span>
        <div class="top-lead-side">
            <div class="top-sidebar mb-3">
                <span class="sectionTitle d-block text-inter p-0">Comission Configuration for Fleet <br> Management on
                    platform</span>
            </div>
            <span class="subTitle-side pr-4">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed tempore laudantium doloribus iusto, natus ab
                accusamus. Commodi reprehenderit.
            </span>
        </div>

        <div class="form-commission-setting">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ENTRY DATE</label>
                            <input type="date" class="form-control inputCommission">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">FLEET ID</label>
                            <input type="text" placeholder="456788-EWS" class="form-control inputCommission">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NAME</label>
                            <input type="text" placeholder="BREKETE TAXI" class="form-control inputCommission">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">LOCATION</label>
                            <select class="form-control inputCommission">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">COMMISSION (%)</label>
                            <input type="number" placeholder="BREKETE TAXI" class="form-control inputCommission">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">CONTACT</label>
                            <input type="text" placeholder="08099887788" class="form-control inputCommission">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">STATUS</label>
                            <select class="form-control inputCommission">
                                <option value="">ACTIVE</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <button class="save-commission-btn">
            <span class="mr-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.2699 8.36328H4.729C4.32746 8.36328 4.00195 8.68879 4.00195 9.09033V19.269C4.00195 19.6705 4.32746 19.996 4.729 19.996H19.2699C19.6715 19.996 19.997 19.6705 19.997 19.269V9.09033C19.997 8.68879 19.6715 8.36328 19.2699 8.36328Z"
                        stroke="white" stroke-width="1.45409" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M8.72852 8.36374V5.09202C8.72852 4.22431 9.07321 3.39214 9.68678 2.77857C10.3003 2.16501 11.1325 1.82031 12.0002 1.82031C12.8679 1.82031 13.7001 2.16501 14.3137 2.77857C14.9272 3.39214 15.2719 4.22431 15.2719 5.09202V8.36374"
                        stroke="white" stroke-width="1.45409" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12.0007 15.271C12.603 15.271 13.0913 14.7827 13.0913 14.1804C13.0913 13.5781 12.603 13.0898 12.0007 13.0898C11.3984 13.0898 10.9102 13.5781 10.9102 14.1804C10.9102 14.7827 11.3984 15.271 12.0007 15.271Z"
                        fill="white" />
                </svg>

            </span>
            <span>SAVE & UPDATE</span>
        </button>
    </div>

    <script>
        firstSlideCommission = document.querySelector('.firstSlideCommission');
        editCommission = document.querySelector('.editCommission');
        viewInfo = document.querySelector('.view-info');
        closeCommission = document.querySelector('.close-commission');
        wideCover = document.querySelector('.wideCover');

        exitCommission = document.querySelector('.exit-commission')

        editBtn = document.querySelector('.editBtn');

        editBtn.addEventListener('click', () => {
            editCommission.classList.add('displaySlide');
            firstSlideCommission.classList.remove('displaySlide');
        });
        closeCommission.addEventListener('click', () => {
            firstSlideCommission.classList.remove('displaySlide');
            wideCover.classList.remove('darken');
        });
        exitCommission.addEventListener('click', () => {
            editCommission.classList.remove('displaySlide');
            firstSlideCommission.classList.remove('displaySlide');
            wideCover.classList.remove('darken');
        })
        viewInfo.addEventListener('click', () => {
            firstSlideCommission.classList.add('displaySlide');
            wideCover.classList.add('darken');
        });
    </script>
@endsection
