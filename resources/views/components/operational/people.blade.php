<div class="people-section">
    <div class="row justify-content-center g-0 border-top-line">
        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section scroll">
                @if ($data['garantor'] != 'null')
                    <div class="mainBox mt-3 border-none text-left">
                     <div class="top-mainBox">
                            <span class="p-0 sub1 text-inter">Gurantors Information</span>
                            <a class="assign-info-border" href="{{ route('editGurantor', ['id' => $data['garantor']->id]) }}">
                                                    Update Gurantors Details
                            </a>
                     </div>
                                                
                        <div class="top-mainBox">
                            <p class="sub1 text-inter">Gurantor 1</p>
                        </div>
                        <div class="row top-thirdBox pl-2 pr-2">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-6 side1">NAME:</div>
                                    <div class="col-6 side2">
                                        {{ $data['garantor']->GUARANTOR_NAME ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">PHONE NO.:</div>
                                    <div class="col-6 side2">
                                        {{ $data['garantor']->GUARANTOR_PHONE ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">OCCUPATION:</div>
                                    <div class="col-6 side2">
                                        {{ $data['garantor']->GUARANTOR_COMPANY ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">LEVEL:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR_LEVEL ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">ADDRESS:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR_ADDRESS ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">Company Address:</div>
                                    <div class="col-6 side2">
                                        {{ $data['garantor']->GUARANTOR_COMPANY_ADDRESS ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-mainBox">
                            <p class="sub1 text-inter">Gurantor 2</p>
                        </div>
                        <div class="row top-thirdBox pl-2 pr-2">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-6 side1">NAME:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_NAME ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">PHONE NO.:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_PHONE ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">OCCUPATION:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_PHONE ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">LEVEL:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_LEVEL ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">ADDRESS:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_ADDRESS ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">Company Address:</div>
                                    <div class="col-6 side2">
                                        {{ $data['garantor']->GUARANTOR2_COMPANY_ADDRESS ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-mainBox">
                            <p class="sub1 text-inter">Refrence Info</p>
                        </div>
                        {{-- REferrer --}}
                        @isset($data['garantor']->REFRENCES_NAME)
                            <div class="top-mainBox">
                                <p class="sub1 text-inter">Referrer Information</p>
                            </div>
                            <div class="row top-thirdBox pl-2 pr-2">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">NAME:</div>
                                        <div class="col-6 side2">{{ $data['garantor']->REFRENCES_NAME ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">RELATIONSHIP.:</div>
                                        <div class="col-6 side2">
                                            {{ $data['garantor']->REFRENCES_RELATIONSHIP ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">COMPANY:</div>
                                        <div class="col-6 side2">{{ $data['garantor']->REFRENCES_COMPANY ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PHONE:</div>
                                        <div class="col-6 side2">{{ $data['garantor']->REFRENCES_PHONE ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">ADDRESS:</div>
                                        <div class="col-6 side2">{{ $data['garantor']->REFRENCES_ADDRESS ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div style="padding: 10px 20px;">
                                <span>Documents</span>
                                <div class="documents-sec">
                                    <div class="doc">
                                        <div class="doc-item">
                                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.64191 17.6764H2.94053C2.68851 17.6764 2.44682 17.5763 2.26862 17.3981C2.09042 17.2199 1.9903 16.9782 1.9903 16.7262V3.42295C1.9903 3.17094 2.09042 2.92924 2.26862 2.75104C2.44682 2.57284 2.68851 2.47272 2.94053 2.47272H7.69168V5.32341C7.69168 6.07946 7.99202 6.80454 8.52662 7.33915C9.06123 7.87376 9.78631 8.1741 10.5424 8.1741H13.3931V12.9252C13.3931 13.1773 13.4932 13.419 13.6714 13.5972C13.8496 13.7754 14.0913 13.8755 14.3433 13.8755C14.5953 13.8755 14.837 13.7754 15.0152 13.5972C15.1934 13.419 15.2935 13.1773 15.2935 12.9252V7.22387C15.2935 7.22387 15.2935 7.22387 15.2935 7.16686C15.2836 7.07956 15.2645 6.99356 15.2365 6.91029V6.82477C15.1908 6.72707 15.1299 6.63726 15.056 6.55871L9.35458 0.857334C9.27603 0.783422 9.18622 0.722479 9.08851 0.676791C9.05708 0.671288 9.02493 0.671288 8.99349 0.676791C8.90109 0.627382 8.8018 0.592146 8.69892 0.572266H2.94053C2.18448 0.572266 1.4594 0.872605 0.924791 1.40721C0.390183 1.94182 0.0898438 2.6669 0.0898438 3.42295V16.7262C0.0898438 17.4822 0.390183 18.2073 0.924791 18.7419C1.4594 19.2765 2.18448 19.5768 2.94053 19.5768H8.64191C8.89392 19.5768 9.13562 19.4767 9.31382 19.2985C9.49202 19.1203 9.59214 18.8786 9.59214 18.6266C9.59214 18.3746 9.49202 18.1329 9.31382 17.9547C9.13562 17.7765 8.89392 17.6764 8.64191 17.6764ZM9.59214 3.81255L12.0532 6.27364H10.5424C10.2903 6.27364 10.0487 6.17353 9.87045 5.99532C9.69225 5.81712 9.59214 5.57543 9.59214 5.32341V3.81255ZM4.84099 11.975H10.5424C10.7944 11.975 11.0361 11.8749 11.2143 11.6967C11.3925 11.5185 11.4926 11.2768 11.4926 11.0248C11.4926 10.7728 11.3925 10.5311 11.2143 10.3529C11.0361 10.1747 10.7944 10.0746 10.5424 10.0746H4.84099C4.58897 10.0746 4.34728 10.1747 4.16908 10.3529C3.99087 10.5311 3.89076 10.7728 3.89076 11.0248C3.89076 11.2768 3.99087 11.5185 4.16908 11.6967C4.34728 11.8749 4.58897 11.975 4.84099 11.975ZM8.64191 13.8755H4.84099C4.58897 13.8755 4.34728 13.9756 4.16908 14.1538C3.99087 14.332 3.89076 14.5737 3.89076 14.8257C3.89076 15.0777 3.99087 15.3194 4.16908 15.4976C4.34728 15.6758 4.58897 15.7759 4.84099 15.7759H8.64191C8.89392 15.7759 9.13562 15.6758 9.31382 15.4976C9.49202 15.3194 9.59214 15.0777 9.59214 14.8257C9.59214 14.5737 9.49202 14.332 9.31382 14.1538C9.13562 13.9756 8.89392 13.8755 8.64191 13.8755ZM4.84099 8.1741H5.79122C6.04324 8.1741 6.28493 8.07399 6.46313 7.89578C6.64133 7.71758 6.74145 7.47589 6.74145 7.22387C6.74145 6.97185 6.64133 6.73016 6.46313 6.55196C6.28493 6.37375 6.04324 6.27364 5.79122 6.27364H4.84099C4.58897 6.27364 4.34728 6.37375 4.16908 6.55196C3.99087 6.73016 3.89076 6.97185 3.89076 7.22387C3.89076 7.47589 3.99087 7.71758 4.16908 7.89578C4.34728 8.07399 4.58897 8.1741 4.84099 8.1741ZM17.8686 14.151C17.7803 14.062 17.6752 13.9913 17.5594 13.943C17.4436 13.8948 17.3194 13.87 17.194 13.87C17.0685 13.87 16.9443 13.8948 16.8285 13.943C16.7127 13.9913 16.6076 14.062 16.5193 14.151L13.3931 17.2868L12.1673 16.0515C12.0787 15.9629 11.9735 15.8926 11.8577 15.8447C11.742 15.7967 11.6179 15.772 11.4926 15.772C11.3673 15.772 11.2432 15.7967 11.1275 15.8447C11.0117 15.8926 10.9065 15.9629 10.8179 16.0515C10.7293 16.1401 10.6591 16.2453 10.6111 16.361C10.5632 16.4768 10.5385 16.6009 10.5385 16.7262C10.5385 16.8515 10.5632 16.9755 10.6111 17.0913C10.6591 17.207 10.7293 17.3122 10.8179 17.4008L12.7184 19.3013C12.8067 19.3903 12.9118 19.461 13.0276 19.5093C13.1434 19.5575 13.2676 19.5824 13.3931 19.5824C13.5185 19.5824 13.6427 19.5575 13.7585 19.5093C13.8743 19.461 13.9794 19.3903 14.0677 19.3013L17.8686 15.5004C17.9577 15.412 18.0284 15.3069 18.0766 15.1911C18.1249 15.0753 18.1497 14.9511 18.1497 14.8257C18.1497 14.7003 18.1249 14.5761 18.0766 14.4603C18.0284 14.3445 17.9577 14.2394 17.8686 14.151Z"
                                                    fill="#444444" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="doc-info">
                                        <span class="doc-name">GUARANTORS FORM.PDF</span>
                                        <span class="doc-size">56 KB</span>
                                    </div>
                                    <div class="doc-date">
                                        <span>27 AUG, 2021</span>
                                    </div>
                                </div>
                                <div class="doc-border"></div>
                            </div> --}}
                        @endisset

                        <div class="top-thirdBox pl-2 pr-2">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-6 side1">NAME:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_NAME ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">PHONE NO.:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_PHONE ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">OCCUPATION:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_PHONE ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">LEVEL:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_LEVEL ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">ADDRESS:</div>
                                    <div class="col-6 side2">{{ $data['garantor']->GUARANTOR2_ADDRESS ?? '-' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">Company Address:</div>
                                    <div class="col-6 side2">
                                        {{ $data['garantor']->GUARANTOR2_COMPANY_ADDRESS ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div style="padding: 10px 20px;">
                            <span>Documents</span>
                            <div class="documents-sec">
                                <div class="doc">
                                    <div class="doc-item">
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.64191 17.6764H2.94053C2.68851 17.6764 2.44682 17.5763 2.26862 17.3981C2.09042 17.2199 1.9903 16.9782 1.9903 16.7262V3.42295C1.9903 3.17094 2.09042 2.92924 2.26862 2.75104C2.44682 2.57284 2.68851 2.47272 2.94053 2.47272H7.69168V5.32341C7.69168 6.07946 7.99202 6.80454 8.52662 7.33915C9.06123 7.87376 9.78631 8.1741 10.5424 8.1741H13.3931V12.9252C13.3931 13.1773 13.4932 13.419 13.6714 13.5972C13.8496 13.7754 14.0913 13.8755 14.3433 13.8755C14.5953 13.8755 14.837 13.7754 15.0152 13.5972C15.1934 13.419 15.2935 13.1773 15.2935 12.9252V7.22387C15.2935 7.22387 15.2935 7.22387 15.2935 7.16686C15.2836 7.07956 15.2645 6.99356 15.2365 6.91029V6.82477C15.1908 6.72707 15.1299 6.63726 15.056 6.55871L9.35458 0.857334C9.27603 0.783422 9.18622 0.722479 9.08851 0.676791C9.05708 0.671288 9.02493 0.671288 8.99349 0.676791C8.90109 0.627382 8.8018 0.592146 8.69892 0.572266H2.94053C2.18448 0.572266 1.4594 0.872605 0.924791 1.40721C0.390183 1.94182 0.0898438 2.6669 0.0898438 3.42295V16.7262C0.0898438 17.4822 0.390183 18.2073 0.924791 18.7419C1.4594 19.2765 2.18448 19.5768 2.94053 19.5768H8.64191C8.89392 19.5768 9.13562 19.4767 9.31382 19.2985C9.49202 19.1203 9.59214 18.8786 9.59214 18.6266C9.59214 18.3746 9.49202 18.1329 9.31382 17.9547C9.13562 17.7765 8.89392 17.6764 8.64191 17.6764ZM9.59214 3.81255L12.0532 6.27364H10.5424C10.2903 6.27364 10.0487 6.17353 9.87045 5.99532C9.69225 5.81712 9.59214 5.57543 9.59214 5.32341V3.81255ZM4.84099 11.975H10.5424C10.7944 11.975 11.0361 11.8749 11.2143 11.6967C11.3925 11.5185 11.4926 11.2768 11.4926 11.0248C11.4926 10.7728 11.3925 10.5311 11.2143 10.3529C11.0361 10.1747 10.7944 10.0746 10.5424 10.0746H4.84099C4.58897 10.0746 4.34728 10.1747 4.16908 10.3529C3.99087 10.5311 3.89076 10.7728 3.89076 11.0248C3.89076 11.2768 3.99087 11.5185 4.16908 11.6967C4.34728 11.8749 4.58897 11.975 4.84099 11.975ZM8.64191 13.8755H4.84099C4.58897 13.8755 4.34728 13.9756 4.16908 14.1538C3.99087 14.332 3.89076 14.5737 3.89076 14.8257C3.89076 15.0777 3.99087 15.3194 4.16908 15.4976C4.34728 15.6758 4.58897 15.7759 4.84099 15.7759H8.64191C8.89392 15.7759 9.13562 15.6758 9.31382 15.4976C9.49202 15.3194 9.59214 15.0777 9.59214 14.8257C9.59214 14.5737 9.49202 14.332 9.31382 14.1538C9.13562 13.9756 8.89392 13.8755 8.64191 13.8755ZM4.84099 8.1741H5.79122C6.04324 8.1741 6.28493 8.07399 6.46313 7.89578C6.64133 7.71758 6.74145 7.47589 6.74145 7.22387C6.74145 6.97185 6.64133 6.73016 6.46313 6.55196C6.28493 6.37375 6.04324 6.27364 5.79122 6.27364H4.84099C4.58897 6.27364 4.34728 6.37375 4.16908 6.55196C3.99087 6.73016 3.89076 6.97185 3.89076 7.22387C3.89076 7.47589 3.99087 7.71758 4.16908 7.89578C4.34728 8.07399 4.58897 8.1741 4.84099 8.1741ZM17.8686 14.151C17.7803 14.062 17.6752 13.9913 17.5594 13.943C17.4436 13.8948 17.3194 13.87 17.194 13.87C17.0685 13.87 16.9443 13.8948 16.8285 13.943C16.7127 13.9913 16.6076 14.062 16.5193 14.151L13.3931 17.2868L12.1673 16.0515C12.0787 15.9629 11.9735 15.8926 11.8577 15.8447C11.742 15.7967 11.6179 15.772 11.4926 15.772C11.3673 15.772 11.2432 15.7967 11.1275 15.8447C11.0117 15.8926 10.9065 15.9629 10.8179 16.0515C10.7293 16.1401 10.6591 16.2453 10.6111 16.361C10.5632 16.4768 10.5385 16.6009 10.5385 16.7262C10.5385 16.8515 10.5632 16.9755 10.6111 17.0913C10.6591 17.207 10.7293 17.3122 10.8179 17.4008L12.7184 19.3013C12.8067 19.3903 12.9118 19.461 13.0276 19.5093C13.1434 19.5575 13.2676 19.5824 13.3931 19.5824C13.5185 19.5824 13.6427 19.5575 13.7585 19.5093C13.8743 19.461 13.9794 19.3903 14.0677 19.3013L17.8686 15.5004C17.9577 15.412 18.0284 15.3069 18.0766 15.1911C18.1249 15.0753 18.1497 14.9511 18.1497 14.8257C18.1497 14.7003 18.1249 14.5761 18.0766 14.4603C18.0284 14.3445 17.9577 14.2394 17.8686 14.151Z"
                                                fill="#444444" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="doc-info">
                                    <span class="doc-name">GUARANTORS FORM.PDF</span>
                                    <span class="doc-size">56 KB</span>
                                </div>
                                <div class="doc-date">
                                    <span>27 AUG, 2021</span>
                                </div>
                            </div>
                            <div class="doc-border"></div>
                        </div> --}}
                        @isset($data['garantor']->REFRENCES2_NAME)
                            <div class="top-thirdBox pl-2 pr-2">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-6 side1">NAME:</div>
                                        <div class="col-6 side2">{{ $data['garantor']->REFRENCES2_NAME ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">RELATIONSHIP.:</div>
                                        <div class="col-6 side2">
                                            {{ $data['garantor']->REFRENCES2_RELATIONSHIP ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">COMPANY:</div>
                                        <div class="col-6 side2">{{ $data['garantor']->REFRENCES2_COMPANY ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">PHONE:</div>
                                        <div class="col-6 side2">{{ $data['garantor']->REFRENCES2_PHONE ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 side1">ADDRESS:</div>
                                        <div class="col-6 side2">{{ $data['garantor']->REFRENCES2_ADDRESS ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset

                    </div>
                @else
                    <div class="mainBox mt-3">
                        <div class="top-mainBox">
                            <p class="sub1 text-inter">Gurantor Information</p>
                        </div>
                        <hr>
                        <div class="top-thirdBox pl-2 pr-2">
                            <div class="container-fluid p-3">
                                <div class="text-center text-warning"> No Record Found Yet </div>
                                {{-- {{ $data['vehicleDetails']->vehno }} --}}
                                <a class="btn btn-primary "
                                    href="{{ route('getGurantor', ['plate' => $data['vehicleDetails']->vehno ?? 0]) }}">
                                    Upload Gurantors </a>
                            </div>
                        </div>
                    </div>
                @endif


                {{-- <div class="mainBox mt-4">
                    <div class="mt-3 d-flex align-items-center justify-content-between" style="padding: 0 20px;">
                        <span class="top-text-300">GUARANTORS INFORMATION</span>
                    </div>
                    <div class="top-thirdBox pl-2 pr-2 mt-3">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-6 side1">NAME:</div>
                                <div class="col-6 side2">
                                    {{ $data['garantor']->GUARANTOR_NAME ?? ('-' ?? '-') }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">PHONE NO:</div>
                                <div class="col-6 side2">
                                    {{ $data['garantor']->GUARANTOR_PHONE ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">OCCUPATION:</div>
                                <div class="col-6 side2">
                                    {{ $data['garantor']->GUARANTOR_COMPANY ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">LEVEL:</div>
                                <div class="col-6 side2">{{ $data['garantor']->GUARANTOR_LEVEL ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">RELATIONSHIP:</div>
                                <div class="col-6 side2">
                                    {{ $data['garantor']->GUARANTOR_ADDRESS ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">ADDRESS:</div>
                                <div class="col-6 side2">
                                    {{ $data['garantor']->GUARANTOR_COMPANY_ADDRESS ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">Company Address:</div>
                                <div class="col-6 side2">
                                    {{ $data['garantor']->GUARANTOR_COMPANY_ADDRESS ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                     <div style="padding: 10px 20px;">
                        <span>Documents</span>
                        <div class="documents-sec">
                            <div class="doc">
                                <div class="doc-item">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.64191 17.6764H2.94053C2.68851 17.6764 2.44682 17.5763 2.26862 17.3981C2.09042 17.2199 1.9903 16.9782 1.9903 16.7262V3.42295C1.9903 3.17094 2.09042 2.92924 2.26862 2.75104C2.44682 2.57284 2.68851 2.47272 2.94053 2.47272H7.69168V5.32341C7.69168 6.07946 7.99202 6.80454 8.52662 7.33915C9.06123 7.87376 9.78631 8.1741 10.5424 8.1741H13.3931V12.9252C13.3931 13.1773 13.4932 13.419 13.6714 13.5972C13.8496 13.7754 14.0913 13.8755 14.3433 13.8755C14.5953 13.8755 14.837 13.7754 15.0152 13.5972C15.1934 13.419 15.2935 13.1773 15.2935 12.9252V7.22387C15.2935 7.22387 15.2935 7.22387 15.2935 7.16686C15.2836 7.07956 15.2645 6.99356 15.2365 6.91029V6.82477C15.1908 6.72707 15.1299 6.63726 15.056 6.55871L9.35458 0.857334C9.27603 0.783422 9.18622 0.722479 9.08851 0.676791C9.05708 0.671288 9.02493 0.671288 8.99349 0.676791C8.90109 0.627382 8.8018 0.592146 8.69892 0.572266H2.94053C2.18448 0.572266 1.4594 0.872605 0.924791 1.40721C0.390183 1.94182 0.0898438 2.6669 0.0898438 3.42295V16.7262C0.0898438 17.4822 0.390183 18.2073 0.924791 18.7419C1.4594 19.2765 2.18448 19.5768 2.94053 19.5768H8.64191C8.89392 19.5768 9.13562 19.4767 9.31382 19.2985C9.49202 19.1203 9.59214 18.8786 9.59214 18.6266C9.59214 18.3746 9.49202 18.1329 9.31382 17.9547C9.13562 17.7765 8.89392 17.6764 8.64191 17.6764ZM9.59214 3.81255L12.0532 6.27364H10.5424C10.2903 6.27364 10.0487 6.17353 9.87045 5.99532C9.69225 5.81712 9.59214 5.57543 9.59214 5.32341V3.81255ZM4.84099 11.975H10.5424C10.7944 11.975 11.0361 11.8749 11.2143 11.6967C11.3925 11.5185 11.4926 11.2768 11.4926 11.0248C11.4926 10.7728 11.3925 10.5311 11.2143 10.3529C11.0361 10.1747 10.7944 10.0746 10.5424 10.0746H4.84099C4.58897 10.0746 4.34728 10.1747 4.16908 10.3529C3.99087 10.5311 3.89076 10.7728 3.89076 11.0248C3.89076 11.2768 3.99087 11.5185 4.16908 11.6967C4.34728 11.8749 4.58897 11.975 4.84099 11.975ZM8.64191 13.8755H4.84099C4.58897 13.8755 4.34728 13.9756 4.16908 14.1538C3.99087 14.332 3.89076 14.5737 3.89076 14.8257C3.89076 15.0777 3.99087 15.3194 4.16908 15.4976C4.34728 15.6758 4.58897 15.7759 4.84099 15.7759H8.64191C8.89392 15.7759 9.13562 15.6758 9.31382 15.4976C9.49202 15.3194 9.59214 15.0777 9.59214 14.8257C9.59214 14.5737 9.49202 14.332 9.31382 14.1538C9.13562 13.9756 8.89392 13.8755 8.64191 13.8755ZM4.84099 8.1741H5.79122C6.04324 8.1741 6.28493 8.07399 6.46313 7.89578C6.64133 7.71758 6.74145 7.47589 6.74145 7.22387C6.74145 6.97185 6.64133 6.73016 6.46313 6.55196C6.28493 6.37375 6.04324 6.27364 5.79122 6.27364H4.84099C4.58897 6.27364 4.34728 6.37375 4.16908 6.55196C3.99087 6.73016 3.89076 6.97185 3.89076 7.22387C3.89076 7.47589 3.99087 7.71758 4.16908 7.89578C4.34728 8.07399 4.58897 8.1741 4.84099 8.1741ZM17.8686 14.151C17.7803 14.062 17.6752 13.9913 17.5594 13.943C17.4436 13.8948 17.3194 13.87 17.194 13.87C17.0685 13.87 16.9443 13.8948 16.8285 13.943C16.7127 13.9913 16.6076 14.062 16.5193 14.151L13.3931 17.2868L12.1673 16.0515C12.0787 15.9629 11.9735 15.8926 11.8577 15.8447C11.742 15.7967 11.6179 15.772 11.4926 15.772C11.3673 15.772 11.2432 15.7967 11.1275 15.8447C11.0117 15.8926 10.9065 15.9629 10.8179 16.0515C10.7293 16.1401 10.6591 16.2453 10.6111 16.361C10.5632 16.4768 10.5385 16.6009 10.5385 16.7262C10.5385 16.8515 10.5632 16.9755 10.6111 17.0913C10.6591 17.207 10.7293 17.3122 10.8179 17.4008L12.7184 19.3013C12.8067 19.3903 12.9118 19.461 13.0276 19.5093C13.1434 19.5575 13.2676 19.5824 13.3931 19.5824C13.5185 19.5824 13.6427 19.5575 13.7585 19.5093C13.8743 19.461 13.9794 19.3903 14.0677 19.3013L17.8686 15.5004C17.9577 15.412 18.0284 15.3069 18.0766 15.1911C18.1249 15.0753 18.1497 14.9511 18.1497 14.8257C18.1497 14.7003 18.1249 14.5761 18.0766 14.4603C18.0284 14.3445 17.9577 14.2394 17.8686 14.151Z"
                                            fill="#444444" />
                                    </svg>
                                </div>
                            </div>
                            <div class="doc-info">
                                <span class="doc-name">GUARANTORS FORM.PDF</span>
                                <span class="doc-size">56 KB</span>
                            </div>
                            <div class="doc-date">
                                <span>27 AUG, 2021</span>
                            </div>
                        </div>
                        <div class="doc-border"></div>
                    </div>
                    <hr> 
                </div> --}}

            </div>
        </div>

        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section">
                <div class="mainBox border-none mt-2">
                    @if ($data['driverInfo'] == 'null')
                        <div class="top-mainBox">
                            <span class="p-0 sub1 text-inter">DRIVER INFORMATION</span>
                            <span class="assign-info-border" data-bs-toggle="modal" data-bs-target="#assign">
                                ASSIGN / RECALL</span>
                        </div>
                    @endif
                    <form action="{{ route('updateConfiguration') }}" method="post">
                        <input type="hidden" name="plate" value="{{ $data['vehicleDetails']->vehno }}">
                        @csrf
                        {{-- assign modal --}}
                        
                        <div class="modal fade" id="assign" tabindex="-1" aria-labelledby="updateLabel" 
                            aria-hidden="true">
                            
                            
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title">CONFIGURATION & WALLET</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-30">
                                            <div class="form-group">
                                                <label for="">ASSIGN DRIVER</label>
                                                
                                                <select name="driver" class="mymodalselect form-control">
                                                    @foreach ($driver as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->phone . ' -  ' . $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Package</label>
                                                <select name="package" id="" class=" package form-control"
                                                    name="package">
                                                    <option value="Rental">Rental</option>
                                                    <option value="HirePurchase">Hire Purchase</option>
                                                    <option value="Premium">Premium</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">VEHICLE VALUE</label>
                                                <input type="number" name="vehicle_value" id="vehicle_value"
                                                    class="form-control vehicle_value authorizationInput"
                                                    placeholder="N0.00" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">OWNER COMMISSION</label>
                                                <input type="number" name="owner_comm" id="owner_comm"
                                                    class="form-control owner_comm authorizationInput"
                                                    placeholder="%0" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">PLATFORM COMMISSION</label>
                                                <input type="number" name="plat_comm" id="plat_comm"
                                                    class="form-control authorizationInput" placeholder="%0" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">FLEET OPERATOR</label>
                                                <input type="number" name="fleet_comm" id="fleet_comm"
                                                    class="form-control authorizationInput" placeholder="%0" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">MAINTENANCE COMMISSION</label>
                                                <input type="number" name="maintenance_comm" id="maintenance_comm"
                                                    class="form-control authorizationInput" placeholder="%0" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">REPAYMENT FREQUENCY</label>
                                                <select name="repayment" id="repayment"
                                                    class="form-control authorizationInput">
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">INITIAL DEPOSIT</label>
                                                <input type="number" name="deposite" id="deposite"
                                                    class="form-control authorizationInput" placeholder="%0" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">START DATE</label>
                                                <input type="date" name="start_date" id="start_date"
                                                    class="form-control authorizationInput" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">ENABLE COUPON</label>
                                                <select name="coupon" id="coupon"
                                                    class="form-control authorizationInput">
                                                    <option value="yes">YES</option>
                                                    <option value="no">NO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <button class="btn addBtn sizeBtn" style="width: 100%">
                                            SUBMIT
                                        </button>
                                        {{-- <button  class="btn addBtn sizeBtn"
                                            style="width: 100%" data-bs-dismiss="modal" data-bs-toggle="modal"
                                            data-bs-target="#configuration">
                                            SUBMIT
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <input type="hidden" name="vehicle_value" id="vehicle_value">
                    {{-- configuration modal --}}
                    <div class="modal fade" id="configuration" tabindex="-1" aria-labelledby="requestPaymentLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" style="width: 400px">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="requestPaymentLabel">CONFIGURATION SUMMARY
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="everyInfo">
                                        <p class="info-text-top"> Summary </p>
                                        <div class="formSec container-fluid"
                                            style="background: #fafafa; border-radius: 6px; height: auto">
                                            <div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Package</div>
                                                    <div class="col-6 side3" id="package">Hire Purchase</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Vehicle Value</div>
                                                    <div class="col-6 side3" id="vehicle_value">N0.00</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Owner Commission
                                                    </div>
                                                    <div class="col-6 side3" id="owner_comm">75%</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Platform Commission
                                                    </div>
                                                    <div class="col-6 side3" id="plat_comm"> 20%</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Fleet Operator</div>
                                                    <div class="col-6 side3" id="fleet">4%</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Maintenance</div>
                                                    <div class="col-6 side3" id="maintenance">1%</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Repaym. Frequency
                                                    </div>
                                                    <div class="col-6 side3" id="repayment">Weekly</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold" id="deposite">
                                                        Initial
                                                    </div>
                                                    <div class="col-6 side3">15%</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold" id="start_date">
                                                        Start
                                                        Date</div>
                                                    <div class="col-6 side3">15/09/2022
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Coupon</div>
                                                    <div class="col-6 side3" id="coupon">Yes</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Created by</div>
                                                    <div class="col-6 side3">{{ Auth()->user()->name }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 side1 font-weight-bold">Creation Date</div>
                                                    <div class="col-6 side3">21/05/2021</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="main2">
                                        <div class="form-group">
                                            {{-- <button class="submitBtn btn" data-bs-dismiss="modal"
                                                    data-bs-toggle="modal" data-bs-target="#success">SHARE</button> --}}
                                            <button class="submitBtn btn">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- successs modal --}}
                    {{-- <div class="modal fade" id="success" tabindex="-1" aria-labelledby="success"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" style="width: 400px">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="success-info">
                                            <div class="cover-circle">
                                                <div class="circle-success">
                                                    <svg width="32" height="20" viewBox="0 0 51 35"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M47.8215 3L17.9403 31.5228L3 17.2614"
                                                            stroke="#4A4AFF" stroke-width="6" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>

                                            <span class="success-info">Successful</span>

                                            <button class="btn addBtn" data-bs-dismiss="modal">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                    <div class="user-100">
                        <img src="https://test.mygarage.africa/user.png" class="userAvatar100" alt="" />
                    </div>
                    
               

                    <div class="top-thirdBox pl-2 mt-2 pr-2">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-4 side1">Driver Name.:</div>
                                <div class="col-7 side2">
                                    {{ $data['allVehicle']->drivername }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 side1">PHONE NO.:</div>
                                <div class="col-7 side2">
                                    {{ $data['allVehicle']->driverphone }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 side1">EMAIL.:</div>
                                <div class="col-7 side2">
                                    {{ $data['allVehicle']->driveremail }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 side1">USER ID:</div>
                                <div class="col-7 side2">
                                    {{ $data['allVehicle']->driverid }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 side1">START DATE:</div>
                                <div class="col-7 side2">
                                    {{ $data['carFleet']->start_date ?? '-' }}
                                </div>
                            </div>

                        </div>

                    </div>
                    {{-- <div class="mt-3 d-flex align-items-center justify-content-between" style="padding: 0 20px;">
                        <span class="top-text-300"></span>
                        <span class="assign-info-border" data-bs-toggle="modal" data-bs-target="#assign">
                            ASSIGN</span>
                    </div> --}}
                    {{-- <div class="top-secondBox">
                        <div class="imageUser">
                            <img src="https://test.mygarage.africa/user.png" alt="" />
                        </div>
                    </div>
                    <div class="top-thirdBox pl-2 pr-2">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-6 side1">NAME:</div>
                                <div class="col-6 side2">
                                    {{ $data['driverDetail']->firstname ?? '-' }}
                                    {{ $data['driverDetail']->lastname ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">PHONE NO:</div>
                                <div class="col-6 side2">
                                    {{ $data['driverDetail']->phone ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">EMAIL:</div>
                                <div class="col-6 side2">
                                    {{ $data['driverDetail']->email ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">START DATE:</div>
                                <div class="col-6 side2">{{ $data['allVehicle']->createtime ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">PAYMENT GOAL:</div>
                                <div class="col-6 side2">-</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">TOTAL CONTRIBUTED:</div>
                                <div class="col-6 side2">₦ {{ number_format($data['totalPayment'], 2) ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">NEXT PAYMENT:</div>
                                <div class="col-6 side2">{{ $data['recentPayment']->lastUnpaid->duedate ?? '-' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 side1">Package:</div>
                                <div class="col-6 side2"> {{ $data['driverDetail']->package ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 10px 20px" class="mb-2">
                        <span>Documents</span>
                        <div class="documents-sec">
                            <div class="doc">
                                <div class="doc-item">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.64191 17.6764H2.94053C2.68851 17.6764 2.44682 17.5763 2.26862 17.3981C2.09042 17.2199 1.9903 16.9782 1.9903 16.7262V3.42295C1.9903 3.17094 2.09042 2.92924 2.26862 2.75104C2.44682 2.57284 2.68851 2.47272 2.94053 2.47272H7.69168V5.32341C7.69168 6.07946 7.99202 6.80454 8.52662 7.33915C9.06123 7.87376 9.78631 8.1741 10.5424 8.1741H13.3931V12.9252C13.3931 13.1773 13.4932 13.419 13.6714 13.5972C13.8496 13.7754 14.0913 13.8755 14.3433 13.8755C14.5953 13.8755 14.837 13.7754 15.0152 13.5972C15.1934 13.419 15.2935 13.1773 15.2935 12.9252V7.22387C15.2935 7.22387 15.2935 7.22387 15.2935 7.16686C15.2836 7.07956 15.2645 6.99356 15.2365 6.91029V6.82477C15.1908 6.72707 15.1299 6.63726 15.056 6.55871L9.35458 0.857334C9.27603 0.783422 9.18622 0.722479 9.08851 0.676791C9.05708 0.671288 9.02493 0.671288 8.99349 0.676791C8.90109 0.627382 8.8018 0.592146 8.69892 0.572266H2.94053C2.18448 0.572266 1.4594 0.872605 0.924791 1.40721C0.390183 1.94182 0.0898438 2.6669 0.0898438 3.42295V16.7262C0.0898438 17.4822 0.390183 18.2073 0.924791 18.7419C1.4594 19.2765 2.18448 19.5768 2.94053 19.5768H8.64191C8.89392 19.5768 9.13562 19.4767 9.31382 19.2985C9.49202 19.1203 9.59214 18.8786 9.59214 18.6266C9.59214 18.3746 9.49202 18.1329 9.31382 17.9547C9.13562 17.7765 8.89392 17.6764 8.64191 17.6764ZM9.59214 3.81255L12.0532 6.27364H10.5424C10.2903 6.27364 10.0487 6.17353 9.87045 5.99532C9.69225 5.81712 9.59214 5.57543 9.59214 5.32341V3.81255ZM4.84099 11.975H10.5424C10.7944 11.975 11.0361 11.8749 11.2143 11.6967C11.3925 11.5185 11.4926 11.2768 11.4926 11.0248C11.4926 10.7728 11.3925 10.5311 11.2143 10.3529C11.0361 10.1747 10.7944 10.0746 10.5424 10.0746H4.84099C4.58897 10.0746 4.34728 10.1747 4.16908 10.3529C3.99087 10.5311 3.89076 10.7728 3.89076 11.0248C3.89076 11.2768 3.99087 11.5185 4.16908 11.6967C4.34728 11.8749 4.58897 11.975 4.84099 11.975ZM8.64191 13.8755H4.84099C4.58897 13.8755 4.34728 13.9756 4.16908 14.1538C3.99087 14.332 3.89076 14.5737 3.89076 14.8257C3.89076 15.0777 3.99087 15.3194 4.16908 15.4976C4.34728 15.6758 4.58897 15.7759 4.84099 15.7759H8.64191C8.89392 15.7759 9.13562 15.6758 9.31382 15.4976C9.49202 15.3194 9.59214 15.0777 9.59214 14.8257C9.59214 14.5737 9.49202 14.332 9.31382 14.1538C9.13562 13.9756 8.89392 13.8755 8.64191 13.8755ZM4.84099 8.1741H5.79122C6.04324 8.1741 6.28493 8.07399 6.46313 7.89578C6.64133 7.71758 6.74145 7.47589 6.74145 7.22387C6.74145 6.97185 6.64133 6.73016 6.46313 6.55196C6.28493 6.37375 6.04324 6.27364 5.79122 6.27364H4.84099C4.58897 6.27364 4.34728 6.37375 4.16908 6.55196C3.99087 6.73016 3.89076 6.97185 3.89076 7.22387C3.89076 7.47589 3.99087 7.71758 4.16908 7.89578C4.34728 8.07399 4.58897 8.1741 4.84099 8.1741ZM17.8686 14.151C17.7803 14.062 17.6752 13.9913 17.5594 13.943C17.4436 13.8948 17.3194 13.87 17.194 13.87C17.0685 13.87 16.9443 13.8948 16.8285 13.943C16.7127 13.9913 16.6076 14.062 16.5193 14.151L13.3931 17.2868L12.1673 16.0515C12.0787 15.9629 11.9735 15.8926 11.8577 15.8447C11.742 15.7967 11.6179 15.772 11.4926 15.772C11.3673 15.772 11.2432 15.7967 11.1275 15.8447C11.0117 15.8926 10.9065 15.9629 10.8179 16.0515C10.7293 16.1401 10.6591 16.2453 10.6111 16.361C10.5632 16.4768 10.5385 16.6009 10.5385 16.7262C10.5385 16.8515 10.5632 16.9755 10.6111 17.0913C10.6591 17.207 10.7293 17.3122 10.8179 17.4008L12.7184 19.3013C12.8067 19.3903 12.9118 19.461 13.0276 19.5093C13.1434 19.5575 13.2676 19.5824 13.3931 19.5824C13.5185 19.5824 13.6427 19.5575 13.7585 19.5093C13.8743 19.461 13.9794 19.3903 14.0677 19.3013L17.8686 15.5004C17.9577 15.412 18.0284 15.3069 18.0766 15.1911C18.1249 15.0753 18.1497 14.9511 18.1497 14.8257C18.1497 14.7003 18.1249 14.5761 18.0766 14.4603C18.0284 14.3445 17.9577 14.2394 17.8686 14.151Z"
                                            fill="#444444" />
                                    </svg>

                                </div>
                            </div>
                            <div class="doc-info">
                                <span class="doc-name">VEHICLE AGREEMENT.PDF</span>
                                <span class="doc-size">224 KB</span>
                            </div>
                            <div class="doc-date">
                                <span>24 AUG, 2021</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-8 col-lg-4">
            <div class="operation-data-section">
                <div class="mainBox border-none">
                    <div class="mt-3 d-flex align-items-center justify-content-between" style="padding: 0 20px;">
                        <span class="top-text-300">OWNER INFORMATION</span>
                    </div>
                    @if ($data['investorInfo'])
                        <div class="top-thirdBox pl-2 mt-2 pr-2">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-6 side1">NAME:</div>
                                    <div class="col-6 side2">

                                        {{ $data['investorInfo']->firstname ?? ('-' . ' ' . $data['investorInfo']->lastname ?? '-') }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">PHONE NO.:</div>
                                    <div class="col-6 side2">{{ $data['investorInfo']->phone ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">EMAIL:</div>
                                    <div class="col-6 side2">{{ $data['investorInfo']->email ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">OCCUPATION:</div>
                                    <div class="col-6 side2">-</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 side1">START DATE:</div>
                                    <div class="col-6 side2">-</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div style="padding: 10px 20px" class="mb-2">
                        <span>Documents</span>
                        <div class="documents-sec">
                            <div class="doc">
                                <div class="doc-item">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.64191 17.6764H2.94053C2.68851 17.6764 2.44682 17.5763 2.26862 17.3981C2.09042 17.2199 1.9903 16.9782 1.9903 16.7262V3.42295C1.9903 3.17094 2.09042 2.92924 2.26862 2.75104C2.44682 2.57284 2.68851 2.47272 2.94053 2.47272H7.69168V5.32341C7.69168 6.07946 7.99202 6.80454 8.52662 7.33915C9.06123 7.87376 9.78631 8.1741 10.5424 8.1741H13.3931V12.9252C13.3931 13.1773 13.4932 13.419 13.6714 13.5972C13.8496 13.7754 14.0913 13.8755 14.3433 13.8755C14.5953 13.8755 14.837 13.7754 15.0152 13.5972C15.1934 13.419 15.2935 13.1773 15.2935 12.9252V7.22387C15.2935 7.22387 15.2935 7.22387 15.2935 7.16686C15.2836 7.07956 15.2645 6.99356 15.2365 6.91029V6.82477C15.1908 6.72707 15.1299 6.63726 15.056 6.55871L9.35458 0.857334C9.27603 0.783422 9.18622 0.722479 9.08851 0.676791C9.05708 0.671288 9.02493 0.671288 8.99349 0.676791C8.90109 0.627382 8.8018 0.592146 8.69892 0.572266H2.94053C2.18448 0.572266 1.4594 0.872605 0.924791 1.40721C0.390183 1.94182 0.0898438 2.6669 0.0898438 3.42295V16.7262C0.0898438 17.4822 0.390183 18.2073 0.924791 18.7419C1.4594 19.2765 2.18448 19.5768 2.94053 19.5768H8.64191C8.89392 19.5768 9.13562 19.4767 9.31382 19.2985C9.49202 19.1203 9.59214 18.8786 9.59214 18.6266C9.59214 18.3746 9.49202 18.1329 9.31382 17.9547C9.13562 17.7765 8.89392 17.6764 8.64191 17.6764ZM9.59214 3.81255L12.0532 6.27364H10.5424C10.2903 6.27364 10.0487 6.17353 9.87045 5.99532C9.69225 5.81712 9.59214 5.57543 9.59214 5.32341V3.81255ZM4.84099 11.975H10.5424C10.7944 11.975 11.0361 11.8749 11.2143 11.6967C11.3925 11.5185 11.4926 11.2768 11.4926 11.0248C11.4926 10.7728 11.3925 10.5311 11.2143 10.3529C11.0361 10.1747 10.7944 10.0746 10.5424 10.0746H4.84099C4.58897 10.0746 4.34728 10.1747 4.16908 10.3529C3.99087 10.5311 3.89076 10.7728 3.89076 11.0248C3.89076 11.2768 3.99087 11.5185 4.16908 11.6967C4.34728 11.8749 4.58897 11.975 4.84099 11.975ZM8.64191 13.8755H4.84099C4.58897 13.8755 4.34728 13.9756 4.16908 14.1538C3.99087 14.332 3.89076 14.5737 3.89076 14.8257C3.89076 15.0777 3.99087 15.3194 4.16908 15.4976C4.34728 15.6758 4.58897 15.7759 4.84099 15.7759H8.64191C8.89392 15.7759 9.13562 15.6758 9.31382 15.4976C9.49202 15.3194 9.59214 15.0777 9.59214 14.8257C9.59214 14.5737 9.49202 14.332 9.31382 14.1538C9.13562 13.9756 8.89392 13.8755 8.64191 13.8755ZM4.84099 8.1741H5.79122C6.04324 8.1741 6.28493 8.07399 6.46313 7.89578C6.64133 7.71758 6.74145 7.47589 6.74145 7.22387C6.74145 6.97185 6.64133 6.73016 6.46313 6.55196C6.28493 6.37375 6.04324 6.27364 5.79122 6.27364H4.84099C4.58897 6.27364 4.34728 6.37375 4.16908 6.55196C3.99087 6.73016 3.89076 6.97185 3.89076 7.22387C3.89076 7.47589 3.99087 7.71758 4.16908 7.89578C4.34728 8.07399 4.58897 8.1741 4.84099 8.1741ZM17.8686 14.151C17.7803 14.062 17.6752 13.9913 17.5594 13.943C17.4436 13.8948 17.3194 13.87 17.194 13.87C17.0685 13.87 16.9443 13.8948 16.8285 13.943C16.7127 13.9913 16.6076 14.062 16.5193 14.151L13.3931 17.2868L12.1673 16.0515C12.0787 15.9629 11.9735 15.8926 11.8577 15.8447C11.742 15.7967 11.6179 15.772 11.4926 15.772C11.3673 15.772 11.2432 15.7967 11.1275 15.8447C11.0117 15.8926 10.9065 15.9629 10.8179 16.0515C10.7293 16.1401 10.6591 16.2453 10.6111 16.361C10.5632 16.4768 10.5385 16.6009 10.5385 16.7262C10.5385 16.8515 10.5632 16.9755 10.6111 17.0913C10.6591 17.207 10.7293 17.3122 10.8179 17.4008L12.7184 19.3013C12.8067 19.3903 12.9118 19.461 13.0276 19.5093C13.1434 19.5575 13.2676 19.5824 13.3931 19.5824C13.5185 19.5824 13.6427 19.5575 13.7585 19.5093C13.8743 19.461 13.9794 19.3903 14.0677 19.3013L17.8686 15.5004C17.9577 15.412 18.0284 15.3069 18.0766 15.1911C18.1249 15.0753 18.1497 14.9511 18.1497 14.8257C18.1497 14.7003 18.1249 14.5761 18.0766 14.4603C18.0284 14.3445 17.9577 14.2394 17.8686 14.151Z"
                                            fill="#444444" />
                                    </svg>

                                </div>
                            </div>
                            <div class="doc-info">
                                <span class="doc-name">VEHICLE AGREEMENT.PDF</span>
                                <span class="doc-size">256 KB</span>
                            </div>
                            <div class="doc-date">
                                <span>27 AUG, 2021</span>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

</div>

