@extends('main')
@section('content')
    <style>
        .fleet-operations-link {
            font-weight: bolder;
            border-bottom: 3px solid #08102E;
            color: #08102E !important;
        }

        .card {
            padding: 20px;
            border: 2px solid #ECECEC;
            border-radius: 6px;
        }

        .account-office-online-vehicles {
            font-weight: bolder;
            border-bottom: 3px solid #08102E;
            color: #08102E !important;
        }
    </style>
    <div class="content-page" style="background: #e5e5e504;">
        <div class="content container-fluid">
            @include('account-office.section.account-nav-links')

            <div class="card">
                <table id="datatable-buttons" class="table table-responsive nowrap"
                    style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">

                    @include('account-office.section.fleet-operations-table-links')

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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
