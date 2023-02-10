@php
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://checkout.envio.africa/api/loan-credit',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
        echo 'cURL Error #:' . $err;
    } else {
        $data = json_decode($response, true);
         //dd($data);
        // $data = $data['data'];
        if($data != null){
            foreach ($data as $key) {
                // $cars[] = $key['vehiclePlateNo'];
                $plate = $key['vehiclePlateNo'];
                $phone = $key['phone'];
                $reference = $key['reference'];
        
                $cars = $car->where('vehno', $plate)->first();
                // $cars = $car->where('vehno', 'YAB452SK')->first();
                // dd($cars);
                echo '<tr>';
                echo '<td><input type="checkbox" class="form-check"></td>';
                echo '<td>';
                echo '<a href=' . route('motorCardUser', ['plate' => $plate, 'phone' => $phone, 'reference' => $reference]) . '>';
                echo $key['vehiclePlateNo'];
                echo '</a>';
                echo '</td>';
                echo '<td> ' . $key['loanType'] . '  </td>';
                echo '<td>';
                echo $cars->fleet ?? '-';
                echo '</td>';
                echo '<td> ₦ ' . number_format($key['amount']) . '  </td>';
                echo '<td> ₦ ' . number_format($key['amount'] - $key['outstanding']) . '  </td>';
                echo '<td>₦ ' . number_format($key['outstanding']) . '</td>';
        
                echo '<td>' . $key['paymentCircle'] - $key['remainingCircle'] . ' / ' . $key['paymentCircle'] . '</td>';
        
                echo '<td>';
                // echo $cars->address ?? '';
                echo '</td>';
                echo '<td> ' . $key['status'] . '  </td>';
                echo '<td> ' . $key['paymentStatus'] . '  </td>';
                echo '<td>';
                echo $cars->time ?? '-';
                echo '</td>';
                echo '<td>';
                echo $cars->created_at ?? '-';
                echo '</td>';
                echo '
                <td>
                    <div class="dropdown">
                    <i class="bx bx-dots-vertical-rounded" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">ASSIGN</a>
                    </li>
                    <li><a class="dropdown-item" href="#">UPDATE
                    STATUS</a>
                    </li>
                    <li><a class="dropdown-item" href="#">EDIT</a></li>
                    <li>
                    <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">DELETE</a>
                    </li>
                    </ul>
                    </div>
                ';
                echo '</tr>';
                //     echo ' <option value =' . "'" . $key['code'] . ',' . $key['name'] . "'" . '>';
                //     echo $key['name'];
                //     echo '</option>';
            }
        }else{
        echo  "<div class = 'alert alert-info m-3'> No Record yet. </div>";
        }
        // dd($cars);
    }
@endphp


{{-- "id" => 47
"reference" => "512419083827"
"userId" => 1370
"vehiclePlateNo" => "YAB452SK"
"loanProductId" => 62
"amount" => null
"interest" => 79
"contribution" => 52.14
"singleRepayment" => 70.705
"paymentCircle" => 2
"remainingCircle" => 2
"nextPaymentDate" => "2023-01-29"
"nextPaymentAmount" => 70.705
"outstanding" => null
"repaid" => null
"paymentStatus" => "Unpaid"
"status" => "Approved"
"created_at" => "2023-01-22 10:06:06"
"updated_at" => null
"penaltyInterest" => 0
"unPaidCircle" => 0
"loanType" => "CREDIT"
"loanNote" => null
"loanSource" => "OnePipeAbang"
"overdue" => null
"name" => "UTE COMFORT"
"email" => "cute@envio.com.ng"
"phone" => "08038820045"
"email_verified_at" => null
"password" => null
"password2" => null
"remember_token" => null
"userName" => null
"account" => null
"address" => null
"town" => null
"state" => null
"package" => null
"acctBal" => null
"image" => "https://test.mygarage.africa/user.png"
"category" => null
"accountNumber" => null
"sortCode" => null
"driverId" => null
"investorId" => null
"transactionPin" => "0000"
"nin" => null
"dob" => null
"referral" => null
"defaultCar" => null --}}
