<form action="{{ route('editUserAccount') }}" method="post">
    @csrf
    <div class="mt-4 pt-4">
        <p class="infoForm">Basic User Information</p>
        <div class="container">
            <div class="row info-section mt-1">
                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for="">User Account ID:</label>
                        <input type="text" class="form-control infoInput" value="{{ $user->phone }}" disabled />
                    </div>
                </div>
                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for="">User Account Type*</label>
                        <select class="form-control infoInput">
                            <option value="Fleet Operator">{{ $user->category }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for="">User Location</label>
                        <select class="form-control infoInput">
                            <option value="Lagos">{{ $user->address }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <p class="infoForm">Contact Information</p>
        <div class="container">
            <div class="row info-section mt-1">
                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control infoInput" value="{{ $user->phone }}" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control infoInput" value="{{ $user->email }}" disabled />
                    </div>
                </div>
                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea rows="2" name="address" class="form-control infoInput">{{ $user->address }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 col-md-8">
                            <select class="form-control infoInput" name="state">
                                <option value="{{ $user->state }}" selected>{{ $user->state }}</option>
                                @include('components.state')

                            </select>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <input type="text" placeholder="Zip Code" class="form-control infoInput" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="infoForm">Bank Information</p>
        <div class="container">
            <div class="row info-section mt-1">

                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for="">Bank Name</label>
                        <select class="form-control infoInput" name="bank">
                            <option value="{{ $user->bankName }}" selected>{{ $user->bankName }}</option>
                            @include('components.bankApi')
                        </select>

                    </div>
                </div>

                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for="">Designated Account Number</label>
                        <input type="text" class="form-control infoInput" name="accountNumber"
                            value="{{ $user->accountNumber ?? '' }}" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-10 mb-1">
                    <div class="form-group">
                        <label for=""> Account Name</label>
                        <input type="text" class="form-control infoInput" name="accountName"
                            value="{{ $user->accountName }}" />
                    </div>
                </div>
                <div class="thirdInfo col-md-6">
                    <button class="submitBtn" type="submit">SAVE AND UPDATE</button>
                </div>
            </div>
        </div>
    </div>
</form>
