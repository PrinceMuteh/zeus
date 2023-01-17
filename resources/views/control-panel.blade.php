@extends('main')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-10">
                <div class="paymentRecieved">
                    <div class="top-row">
                        <div>
                            <p class="sectionTitle text-inter pl-3 pb-0 pl-0">
                                {{-- <img src="{{ asset('assets/images/arrow-left.svg') }}" class="mr-1" alt=""> --}}
                                Control Panel
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            @include('components.control-panel.sidebar')
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <div class="row">
                                {{-- mainetenace cost --}}
                                <div class="col-md-12 maintenace_cost">
                                    @include('sections.maintenance-cost')
                                </div>
                                {{-- account configurationi --}}
                                <div class="col-md-12 account_config">
                                    @include('sections.account-configuration')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->
    </div>

    <script>
        let maintenaceCostLink = document.querySelector('.maintenanceCostLink');
        let accountConfigLink = document.querySelector('.accountConfigLink');

        let maintenace_cost = document.querySelector('.maintenace_cost');
        let account_config = document.querySelector('.account_config');

        maintenaceCostLink.addEventListener('click', () => {
            maintenace_cost.style.display = 'block';
            account_config.style.display = 'none';
            maintenaceCostLink.classList.add('activeSubLink');
            accountConfigLink.classList.remove('activeSubLink');
        })

        accountConfigLink.addEventListener('click', () => {
            maintenace_cost.style.display = 'none';
            account_config.style.display = 'block';
            maintenaceCostLink.classList.remove('activeSubLink');
            accountConfigLink.classList.add('activeSubLink');
        })
    </script>
@endsection
