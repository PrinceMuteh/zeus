<table id="datatable" class="table table-bordered nowrap"
    style=" border-collapse: collapse;  border-spacing: 0; width: 100%;">
    <thead class="text-inter">
        <tr>
            <th>REFERENCE NO.</th>
            <th>Plate No.</th>
            <th>FLEET</th>
            {{-- <th>AMOUNT DUE</th> --}}
            <th>AMOUNT</th>
            {{-- <th>STATUS</th> --}}
            <th>DATE</th>
            {{-- <th>AGENT</th> --}}
            <th></th>
        </tr>
    </thead>
    <tbody>
        
       
        
        @if ($transaction)
            
        @foreach ($transaction->take(50) as $item)
            <tr>
                <td> {{ $item->orderid }} </td>
                <td> {{ $item->vehno }} </td>
                <td>{{ $item->type ?? 'UNKNOWN' }}</td>
                {{-- <td>₦ {{ number_format($item->amount) }} </td> --}}
                <td>₦ {{ number_format($item->needpayment) }}</td>
                {{-- <td>{{ $item->status }}</td> --}}
                <td>{{ $item->createtime }}</td>
                {{-- <td>{{ $item->agentName }}</td> --}}
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
        @endif



    </tbody>
</table>
