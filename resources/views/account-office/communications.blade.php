@extends('main')
@section('content')
    <style>
        .communications-link {
            font-weight: bolder;
            border-bottom: 3px solid #08102E;
            color: #08102E !important;
        }

        .card {
            padding: 20px;
            border: 2px solid #ECECEC;
            border-radius: 6px;
        }

        .communication-all-tickets  {
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
            <div class="card">
                <table id="datatable-buttons" class="table nowrap"
                    style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">

                    @include('account-office.section.communication-table-links')

                    <thead class="text-inter">
                        <tr>
                            <th>
                                <input type="checkbox" class="check" />
                            </th>
                            <th>TICKET ID</th>
                            <th>CATEGORY</th>
                            <th>STATUS</th>
                            <th>ASSIGNEE</th>
                            <th>CREATED</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <input type="checkbox" class="check" />
                            </td>
                            <td>
                                <a href="communication-user">#158ABC</a>
                            </td>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
