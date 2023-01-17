@if (session('status'))
    <div class="alert alert-warning text-capitalize">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Whoops !</strong>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> --}}
    </div>
@endif

<div class="container">
    {{-- @if (session()->has('success'))
        <div class="modal fade" id="success" tabindex="-1" aria-labelledby="success" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 400px">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="success-info">
                            <div class="cover-circle">
                                <div class="circle-success">
                                    <svg width="32" height="20" viewBox="0 0 51 35" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M47.8215 3L17.9403 31.5228L3 17.2614" stroke="#4A4AFF" stroke-width="6"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>

                            <span class="success-info" style="font-size: 15px; margin:15px 0; padding:0;">OPERATION
                                SUCCESSFUL</span>
                            <span>
                                <strong>{{ session()->get('success') }}</strong>
                            </span>
                            <button type="button" class="btn  addBtn" data-dismiss="modal" aria-label="Close">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#success').modal('show')
        </script>
    @endif --}}



    @if (session()->has('success'))
        <div class="alert alert-success text-capitalize">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('Smessage'))
        <div class="alert alert-success text-capitalize">
            {{ session()->get('Smessage') }}
        </div>
    @endif

    @if (session()->has('Emessage'))
        <div class="alert alert-danger text-capitalize">
            {{ session()->get('Emessage') }}
        </div>
    @endif


    {{-- @if (session()->has('success'))
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="false">
            <div class="modal-dialog  modal-dialog-centered" role="document">
                <div class="modal-content alert-success">
                    <div class="modal-body alert alert-success">
                        <div class="container">
                            <div class="row justify-content-center">
                                <svg width="170" height="170" viewBox="0 0 300 300" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.05" cx="150" cy="150" r="150" fill="#4A4AFF" />
                                    <circle opacity="0.15" cx="150.762" cy="150" r="115.049" fill="#4A4AFF" />
                                    <path d="M174.009 136.904L141.998 167.46L125.993 152.182" stroke="#4A4AFF"
                                        stroke-width="9" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M150 202.381C178.929 202.381 202.381 178.929 202.381 150C202.381 121.071 178.929 97.6191 150 97.6191C121.071 97.6191 97.619 121.071 97.619 150C97.619 178.929 121.071 202.381 150 202.381Z"
                                        stroke="#4A4AFF" stroke-width="9" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </div>
                            <div class="text-center mt-3" style="font-size:16px;">
                                <div class="alert m-6 text-success">
                                    <strong>{{ session()->get('success') }}</strong>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary form-control" style = "height:50px;" data-dismiss="modal"
                                aria-label="Close">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    @endif
    @if (session()->has('unsuccess'))
        <div class="modal fade" id="unsuccessModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="false">
            <div class="modal-dialog  modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body alert alert-warning ">
                        <div class="container">
                            <div class="row justify-content-center">
                                <svg width="170" height="170" viewBox="0 0 300 300" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.05" cx="150" cy="150" r="150" fill="#4A4AFF" />
                                    <circle opacity="0.15" cx="150.762" cy="150" r="115.049" fill="#4A4AFF" />
                                    <path d="M174.009 136.904L141.998 167.46L125.993 152.182" stroke="#4A4AFF"
                                        stroke-width="9" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M150 202.381C178.929 202.381 202.381 178.929 202.381 150C202.381 121.071 178.929 97.6191 150 97.6191C121.071 97.6191 97.619 121.071 97.619 150C97.619 178.929 121.071 202.381 150 202.381Z"
                                        stroke="#4A4AFF" stroke-width="9" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </div>
                            <div class="text-center mt-3" style="font-size:16px;">
                                <div class="alert m-6 text-success">
                                    <strong>{{ session()->get('success') }}</strong>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary form-control" data-dismiss="modal"
                                aria-label="Close">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    @endif --}}
</div>
