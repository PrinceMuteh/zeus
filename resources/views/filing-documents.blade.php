@extends('main')
@section('content')
    <title>Zeus | User Account Permission</title>
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-sm-6 col-md-10 col-lg-3 account-section-1">
                    <div class="account-profile-info">
                        <a href="{{ URL::previous() }}">
                            <img src="{{ asset('assets/images/arrow-left.svg') }}" class="image-padding" alt="" />
                        </a>
                        <div class="avatar">
                            <img src="{{ asset('assets/images/deen.png') }}" alt="" />
                        </div>
                        <span class="account-profile-name">Sharafadeen Mubarak</span>
                        <span class="account-created">Date created: 12 Sept, 2022</span>
                        <span class="designation">Fleet Operator</span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-10 col-lg-9 account-section-2">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="top-dd">
                                <p class="title-permissions">Filing & Documents</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 d-flex justify-content-end">
                            <div class="top-btn">
                                <button class="saveUpdateBtn bg-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">ADD FILE</button>
                                <button class="saveUpdateBtn">SAVE & UPDATE</button>
                                <button class="resetBtn">RESET</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">NEW DOCUMENT</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="p-2">
                                        <div class="form-group">
                                            <label for="">DOCUMENT TYPE</label>
                                            <select class="form-control infoInput">
                                                <option value="">-- Please select --</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">TITLE/NAME</label>
                                            <input type="text" class="form-control infoInput">
                                        </div>
                                        <div class="form-group">
                                            <label for="">ISSUE DATE</label>
                                            <input type="date" class="form-control infoInput">
                                        </div>
                                        <div class="form-group">
                                            <label for="">UPLOAD FILE</label>
                                            <input type="date" class="form-control infoInput">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="addBtn w-100">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row mt-4">
                        <div class="col-sm-6 col-md-11">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-bordered nowrap"
                                    style=" border-collapse: collapse; border-spacing: 0; width: 100%; ">
                                    <thead class="text-inter">
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="check" />
                                            </th>
                                            <th>TYPE</th>
                                            <th>FILE NAME</th>
                                            <th>EXP DATE</th>
                                            <th>LAST MODIFIED</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check" />
                                            </td>
                                            <td>VEHICLE LICENSE</td>
                                            <td>MASUD LICENCE</td>
                                            <td>21 FEB, 2021</td>
                                            <td>23 FEB, 2021 @09:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check" />
                                            </td>
                                            <td>VEHICLE LICENSE</td>
                                            <td>MASUD LICENCE</td>
                                            <td>21 FEB, 2021</td>
                                            <td>23 FEB, 2021 @09:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check" />
                                            </td>
                                            <td>VEHICLE LICENSE</td>
                                            <td>MASUD LICENCE</td>
                                            <td>21 FEB, 2021</td>
                                            <td>23 FEB, 2021 @09:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check" />
                                            </td>
                                            <td>VEHICLE LICENSE</td>
                                            <td>MASUD LICENCE</td>
                                            <td>21 FEB, 2021</td>
                                            <td>23 FEB, 2021 @09:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check" />
                                            </td>
                                            <td>VEHICLE LICENSE</td>
                                            <td>MASUD LICENCE</td>
                                            <td>21 FEB, 2021</td>
                                            <td>23 FEB, 2021 @09:00 PM</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
