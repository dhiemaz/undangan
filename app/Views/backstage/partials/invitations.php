<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

      <div class="card-body">
        <h4 class="card-title">Invitation List</h4>
        <div class="d-flex align-items-right justify-content-between">
          <p class="card-description mb-0">BRI Microfinance Outlook 2025</p>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 ms-auto">
                <div class="search-container d-flex justify-content-end">
                  <input type="text" id="all-invitations-search-input" class="form-control search-input" placeholder="Search...">
                  <button id="all-invitations-search-button" class="btn btn-secondary active ms-2">
                    Search
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive mt-3">
          <table class="table table-hover" id="all-invitations-table">
            <thead>
              <tr>
                <th>Fullname</th>
                <th>Company</th>
                <th>Status</th>
                <th>Invitation Type</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <div id="pagination-invitations"></div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="invitationModal" tabindex="-1" aria-labelledby="invitationModalLabel" data-mdb-backdrop="true" data-mdb-keyboard="true">
          <div class="modal-dialog modal-dialog-centered text-center d-flex justify-content-center">
            <div class="modal-content w-75">
              <div class="modal-body p-4">
                <!-- Modal Header with Avatar -->
                <div class="text-center mb-2">
                  <img id="invitations-image" alt="" loading="lazy"
                    class="rounded-circle position-absolute top-0 start-25 translate-middle h-25" />
                  <div id="vip-stars" class="text-warning mt-5"></div>
                  <!-- <span id="invitations-type"></span> -->
                  <h5 class="pt-2 mt-2 text-primary" id="modal-fullname">invitation name</h5>
                </div>

                <!-- Form with Single Column Design -->
                <form class="forms-sample">
                  <div class="form-group">
                    <input type="hidden" id="invitations-invitation-id">
                    <label for="invitations-position" class="text-start w-100">Position</label>
                    <input type="text" class="form-control text-left" id="invitations-position" placeholder="-">
                  </div>
                  <div class="form-group">
                    <label for="invitations-company" class="text-start w-100">Company</label>
                    <input type="text" class="form-control text-left" id="invitations-company" placeholder="-">
                  </div>

                  <hr /> <!-- Separator Line -->

                  <!-- Check-In, and Close with Same Size -->
                  <div class="row">
                    <div class="col-6">
                      <button type="submit" id="invitations-checkInBtn" class="btn btn-success btn-rounded btn-fw w-100 py-2" data-bs-dismiss="modal">
                        Check-In
                      </button>
                    </div>
                    <div class="col-6">
                      <button type="button" id="closeModal" class="btn btn-danger btn-rounded btn-fw w-100 py-2" data-bs-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </div>
                </form>

                <!-- Invitation Status -->
                <div class="form-group mt-4">
                  <label for="InputStatus">Invitation Status</label>
                  <button type="button" id="invitations-status-button" class="btn btn-secondary disable w-100"></button>
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