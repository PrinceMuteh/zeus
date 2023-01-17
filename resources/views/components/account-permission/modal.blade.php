  <!-- Modal -->
  <div class="modal fade" id="addNewPermission" tabindex="-1" aria-labelledby="addNewPermissionLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="width: 450px">
          <div class="modal-content">
              <div class="modal-header border-bottom-0" style="padding:25px 20px">
                  <div class="header-modal-permission modalAddNewHeading">
                      <h5 class="modal-title w-100 mb-2" id="addNewPermissionLabel">ADD NEW</h5>
                      <span class="smallText">Lorem ipsum dolor sit amet consectetur
                          adipisicing elit. Quae repellat odio, dolorem
                          libero voluptatibus.</span>
                  </div>
                  <div class="header-modal-permission modalPermControlHeading">
                      <h5 class="modal-title w-100 mb-2" id="addNewPermissionLabel">PERMISSIONS CONTROL</h5>
                      <span class="smallText">Lorem ipsum dolor sit amet consectetur
                          adipisicing elit. Quae repellat odio, dolorem
                          libero voluptatibus.</span>
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="formSec addNewSec">
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" class="form-control infoInput" placeholder="Enter Details">
                      </div>
                      <div class="form-group">
                          <label for="">Description</label>
                          <textarea name="" class="form-control infoInput" rows="3"></textarea>
                      </div>
                      <div class="form-group mb-4">
                          <label for="">Configure Permissions</label>
                          {{-- <select class="form-select infoInput openPermSecBtn">
                          <option value="">--Choose Permission--</option>
                      </select> --}}
                          {{-- <input type="text" placeholder="--Choose Permission--"
                          class="form-control openPermSecBtn infoInput" disabled> --}}
                          <div
                              class="infoInput openPermSecBtn d-flex justify-content-between align-items-center pl-2 pr-2">
                              <span>--Choose Permissioni</span>
                              <svg width="6" height="12" viewBox="0 0 8 14" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path d="M1 1L7 7L1 13" stroke="#888888" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                              </svg>

                          </div>
                      </div>
                  </div>
                  <div class="formSec permControlSec">
                      <div class="form-search mb-3">
                          <input type="text" placeholder="Search" class="searchInput2">
                          <button class="searchBtn2">
                              <i class='bx bx-search'></i>
                          </button>
                      </div>

                      <div class="form-main-2">
                          <div class="toogle-item-list ml-2 mb-2">
                              <span class="itemsList list-1">x</span>
                              <span class="itemList-title">Title</span>
                          </div>
                          <div class="sub-sub-1 pl-3 mb-2">
                              <div class="form-check">
                                  <input class="form-check-input checkInput" type="checkbox" value=""
                                      id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                      Add Vehicle to Fleet
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input checkInput" type="checkbox" value=""
                                      id="flexCheckChecked">
                                  <label class="form-check-label" for="flexCheckChecked">
                                      Assign Vehicle to Driver
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input checkInput" type="checkbox" value=""
                                      id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                      Add Workshop to Fleet
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input checkInput" type="checkbox" value=""
                                      id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                      Edit / Delete Workshop
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input checkInput" type="checkbox" value=""
                                      id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                      Assign Vehicle to Workshop
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input checkInput" type="checkbox" value=""
                                      id="flexCheckChecked">
                                  <label class="form-check-label" for="flexCheckChecked">
                                      Create User Account
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input checkInput" type="checkbox" value=""
                                      id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                      Edit / Delete User Account
                                  </label>
                              </div>
                          </div>


                          <div class="toogle-item-list ml-2 mb-2">
                              <span class="itemsList list-2">+</span>
                              <span class="itemList-title">Another Title</span>
                          </div>
                          <div class="sub-sub-2 pl-3 mb-2">
                              <div class="form-check">
                                  <input class="form-check-input checkInput" type="checkbox" value=""
                                      id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                      Remittance Deposit Configuration
                                  </label>
                              </div>
                              <div class="value-number mb-2 mr-4">
                                  <span class="valueText">General Remittance</span>
                                  <input type="number" value="75" class="value2">
                              </div>
                              <div class="value-number mb-2 mr-4">
                                  <span class="valueText">Maintenance Contribution</span>
                                  <input type="number" value="2" class="value2">
                              </div>
                              <div class="value-number mb-2 mr-4">
                                  <span class="valueText">Account Commission</span>
                                  <input type="number" value="15" class="value2">
                              </div>
                              <div class="value-number mb-2 mr-4">
                                  <span class="valueText">Union Due / Fees</span>
                                  <input type="number" value="15" class="value2">
                              </div>
                          </div>

                          <div class="toogle-item-list ml-2 mb-2">
                              <span class="itemsList">+</span>
                              <span class="itemList-title">More Titles</span>
                          </div>
                          <div class="toogle-item-list ml-2 mb-2">
                              <span class="itemsList">+</span>
                              <span class="itemList-title">Title Continues</span>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer" style="background:#F5F5F5;">
                  <button type="button" class="resetModalBtn" data-bs-dismiss="modal">RESET</button>
                  <button type="button" class="addBtn">SAVE</button>
              </div>
          </div>
      </div>
  </div>


  {{-- successs modal --}}
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

                      <span class="success-info">Successful</span>
                      <span class="success-desc">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum sunt numquam non
                          vero, officiis earum dolorum itaque explicabo, soluta debitis illo dolorem saepe rem
                          vel?
                      </span>
                      <button class="btn addBtn">Continue</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- end container-fluid -->
