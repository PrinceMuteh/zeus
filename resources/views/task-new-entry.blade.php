@extends('main')
@section('content')
    <title>Zeus | Techincal Desk</title>
    <style>
        tr:nth-last-child() {
            border-bottom: none;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-item {
            font-size: 10px;
        }
    </style>
    <div class="content-page" style="background: #fff;">
        <div class="content">
            <div class="container-fluid m15">
                {{-- @include('sections.technical-desk-info') --}}

                <div class="container mt-2">
                    <div class="">
                        <div class="sideInstall pr-4">
                            {{-- <span class="close-commission">
                                <svg width="13" height="13" viewBox="0 0 10 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.77342 1.2882C10.0663 0.995302 10.0663 0.520428 9.77342 0.227535C9.48053 -0.0653583 9.00566 -0.0653583 8.71276 0.227535L9.77342 1.2882ZM0.227482 8.71282C-0.0654108 9.00571 -0.0654108 9.48058 0.227482 9.77348C0.520376 10.0664 0.995249 10.0664 1.28814 9.77348L0.227482 8.71282ZM8.71276 9.77342C9.00566 10.0663 9.48053 10.0663 9.77342 9.77342C10.0663 9.48053 10.0663 9.00566 9.77342 8.71276L8.71276 9.77342ZM1.28814 0.227482C0.995249 -0.0654108 0.520376 -0.0654108 0.227482 0.227482C-0.0654108 0.520376 -0.0654108 0.995249 0.227482 1.28814L1.28814 0.227482ZM8.71276 0.227535L0.227482 8.71282L1.28814 9.77348L9.77342 1.2882L8.71276 0.227535ZM9.77342 8.71276L1.28814 0.227482L0.227482 1.28814L8.71276 9.77342L9.77342 8.71276Z"
                                        fill="#28303F" />
                                </svg>
                            </span> --}}
                            <div class="top-lead-side" style="border-top: none">

                                <div class="top-sidebar pb-2 mb-2" style="border-bottom: 1px solid #ccc;">
                                    <span class="sectionTitle d-block text-inter p-0">
                                        New envioBOx GPS installation <br>
                                        Via mobile App
                                    </span>
                                    <button class="editBtn">
                                        New Entry
                                    </button>
                                </div>
                                <p class="fw-bold subTitle-side" style="color: #08102E">
                                    Task Summary
                                </p>
                                <span class="subTitle-side pr-4">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Sed
                                    tempore laudantium doloribus iusto, natus ab
                                    accusamus. Commodi reprehenderit.
                                </span>
                            </div>



                            <div class="row row-list">
                                <div class="col-12">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Entry Date:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->created_at ?? "" }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Status:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">
                                                {{ $data->taskStatus ?? 0 == 0 ? 'pending' : 'active' }}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Assigned:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission"> - </div>
                                            {{-- <div class="right-side-commission">Lucy Ekene - Lagos, NG</div> --}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Due Date:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission"> - </div>
                                            {{-- <div class="right-side-commission">21 Aug, 2021 </div> --}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Customer:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission"> {{ $data->name ?? "" }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Email:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->email ?? "" }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Phone:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->phone ?? "" }}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Location:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->state ?? "" }}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Fleet:</div>
                                        </div>
                                        <div class="col-6">
                                            {{-- <div class="right-side-commission">7 Central Transport </div> --}}
                                            <div class="right-side-commission"> - </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Support Center:
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            {{-- <div class="right-side-commission">Segun Alaka Lugbe Centre</div> --}}
                                            <div class="right-side-commission">-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="top-lead-side">
                                <p class="fw-bold subTitle-side" style="color: #08102E">
                                    Vehicle Specification
                                </p>
                                <span class="subTitle-side pr-4">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Sed
                                    tempore laudantium doloribus iusto, natus ab
                                    accusamus. Commodi reprehenderit.
                                </span>
                            </div>

                            <div class="row row-list">
                                <div class="col-12">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">License Plate:
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->vehiclePlateNo ?? "" }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Type:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->type ?? "" }}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Model:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->model ?? "" }}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Year:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->year ?? "" }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Chassis:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->chasis ?? "" }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Body:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->body ?? "" }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Engine:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->engine ?? "" }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Transamission:
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->transmission ?? "" }}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="left-side-commission">Color:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="right-side-commission">{{ $data->colour ?? "" }}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="top-lead-side">
                                <p class="fw-bold subTitle-side" style="color: #08102E">
                                    Status Management
                                </p>
                                <span class="subTitle-side pr-4">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Sed
                                    tempore laudantium doloribus iusto, natus ab
                                    accusamus. Commodi reprehenderit.
                                </span>
                            </div>
                            
                            <form method="post" action="{{route('taskCreate')}}">
                                @csrf
                                <input type="hidden" name="id" value = "{{$data->taskId}}">

                                <div class="row mt-2">
                                    <div class="col-lg-10">
                                        <div class="form-group form-desk">
                                            <label for="">Assign Installer
                                                (Technician)*</label>
                                                <select name="installer" id="" class = "form-control users">
                                                    @foreach ($installer as $item)
                                                        <option value = "{{$item->id}}"> {{$item->first_name}}</option>
                                                    @endforeach
                                                </select>
                                           

                                            <span class="searchIcont">
                                                <svg width="18" height="18" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 17.5L21 21M20 10.5C20 5.25329 15.7467 1 10.5 1C5.25329 1 1 5.25329 1 10.5C1 15.7467 5.25329 20 10.5 20C15.7467 20 20 15.7467 20 10.5Z"
                                                        stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" name="address" id="" class="form-control"
                                                placeholder="" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Data</label>
                                            <input type="datetime-local" name="date" id=""
                                                class="form-control" placeholder="" aria-describedby="helpId">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name = "status" class="form-select inputCommission">
                                                <option value="Closing">CLOSING</option>
                                                <option value="Processing">PROCESSING</option>
                                                <option value="Completed">COMPLETED</option>
                                                <option value="New">NEW</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>
                            <button class="save-commission-btn" type = "submit">
                                <span class="mr-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.2699 8.36328H4.729C4.32746 8.36328 4.00195 8.68879 4.00195 9.09033V19.269C4.00195 19.6705 4.32746 19.996 4.729 19.996H19.2699C19.6715 19.996 19.997 19.6705 19.997 19.269V9.09033C19.997 8.68879 19.6715 8.36328 19.2699 8.36328Z"
                                            stroke="white" stroke-width="1.45409" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M8.72852 8.36374V5.09202C8.72852 4.22431 9.07321 3.39214 9.68678 2.77857C10.3003 2.16501 11.1325 1.82031 12.0002 1.82031C12.8679 1.82031 13.7001 2.16501 14.3137 2.77857C14.9272 3.39214 15.2719 4.22431 15.2719 5.09202V8.36374"
                                            stroke="white" stroke-width="1.45409" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12.0007 15.271C12.603 15.271 13.0913 14.7827 13.0913 14.1804C13.0913 13.5781 12.603 13.0898 12.0007 13.0898C11.3984 13.0898 10.9102 13.5781 10.9102 14.1804C10.9102 14.7827 11.3984 15.271 12.0007 15.271Z"
                                            fill="white" />
                                    </svg>

                                </span>
                                <span>SAVE & UPDATE</span>
                            </button>
                        </form>

                        </div>
                    </div>

                </div>


            </div>



        </div>
        <!-- end content -->
    </div>


    {{--   side info --}}
@endsection
