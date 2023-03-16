@extends('main')
@section('content')
    <style>
        .loan-credit-link {
            font-weight: bolder;
            border-bottom: 3px solid #08102E;
            color: #08102E !important;
        }

        .card {
            padding: 20px;
            border: 2px solid #ECECEC;
            border-radius: 6px;
        }

        .loan-recieved {
            font-weight: bolder;
            border-bottom: 3px solid #08102E;
            color: #08102E !important;
        }

        .remittance-row {
            margin-bottom: 2rem;
        }
    </style>
    <div class="content-page" style="background: #e5e5e504;">
        <div class="content container-fluid">
            @include('account-office.section.account-nav-links')

            @include('account-office.section.loans-row')

            <div class="card">
                <table id="datatable-buttons" class="table nowrap"
                    style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">

                    @include('account-office.section.loans-credit-table-links')

                    <thead class="text-inter">
                        <tr>
                            <th>
                                <input type="checkbox" class="check" />
                            </th>
                            <th>Plate NO.</th>
                            <th>DRIVER NAME</th>
                            <th>PHONE NO.</th>
                            <th>DATE</th>
                            <th>AMOUNT</th>
                            <th>DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <input type="checkbox" class="check" />
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="check" />
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
