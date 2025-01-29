<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Invitation Guests List</h4>
        <div class="d-flex align-items-right justify-content-between">
          <p class="card-description mb-0">BRI Microfinance Outlook 2025</p>
          <div class="col-md-4 ms-auto">
            <div class="search-container d-flex justify-content-end">
              <input type="text" id="guests-search-input" class="form-control search-input" placeholder="Search...">
              <button id="guests-search-button" class="btn btn-secondary active ms-2">
                Search
              </button>
            </div>
          </div>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-hover" id="guests-invitations-table">
            <thead>
              <tr>
                <th>Fullname</th>
                <th>Company</th>
                <th>Status</th>
                <th>Guest of Invitation</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <div id="pagination-guests"></div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="guestsModal" tabindex="-1" aria-labelledby="guestsModalLabel" data-mdb-backdrop="true" data-mdb-keyboard="true">
          <div class="modal-dialog modal-dialog-centered text-center d-flex justify-content-center">
            <div class="modal-content w-75">
              <div class="modal-body p-4">
                <!-- Modal Header with Avatar -->
                <div class="text-center mb-2">
                  <img id="guests-image" alt="" loading="lazy"
                    class="rounded-circle position-absolute top-0 start-25 translate-middle h-25" />
                  <!-- <div id="vip-stars" class="text-warning mt-5"></div> -->
                  <!-- <span id="invitations-type"></span> -->
                  <br>
                  <br>
                  <h5 class="pt-2 mt-2 text-primary" id="guest-fullname">guest name</h5>
                </div>

                <!-- Form with Single Column Design -->
                <form class="forms-sample">
                  <div class="form-group">
                    <input type="hidden" id="guests-invitation-id" value="">
                    <label for="guests-position" class="text-start w-100">Position</label>
                    <input type="text" class="form-control text-left" id="guest-position" placeholder="-">
                  </div>
                  <div class="form-group">
                    <label for="guests-company" class="text-start w-100">Company</label>
                    <input type="text" class="form-control text-left" id="guest-company" placeholder="-">
                  </div>

                  <hr /> <!-- Separator Line -->

                  <!-- Check-In, and Close with Same Size -->
                  <div class="row">
                    <div class="col-6">
                      <button type="submit" id="guest-checkInBtn" class="btn btn-success btn-rounded btn-fw w-100 py-2" data-bs-dismiss="modal">
                        Check-In
                      </button>
                    </div>
                    <div class="col-6">
                      <button type="button" id="guest-closeModal" class="btn btn-danger btn-rounded btn-fw w-100 py-2" data-bs-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </div>
                </form>

                <!-- Invitation Status -->
                <div class="form-group mt-4">
                  <label for="guests-status">Guest Status</label>
                  <button type="button" id="guests-status-button" class="btn btn-secondary disable w-100"></button>
                </div>

                <hr /> <!-- Separator Line -->
                <div class="form-group mt-4">
                  <label for="guest-attendee">Guest of Invitation</label>
                  <!-- Simple Table -->
                  <div class="table-responsive">
                    <table class="table" id="guest-invitation-data">
                      <thead>
                        <tr>
                          <th>Fullname</th>
                          <th>Company</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="d-flex ">
                              <img id="invitation-guest-image" alt="" loading="lazy">
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <div>
                                <h6 class="font-bold" id="invitation-guest-fullname">-</h6>
                                <p class="text-gray-600 text-ellipsis" id="invitation-guest-position">-</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <h6 id="invitation-guest-institution">-</h6>
                            <p>-</p>
                          </td>
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
      <!-- Modal End -->
    </div>
  </div>
</div>
</div>
</div>