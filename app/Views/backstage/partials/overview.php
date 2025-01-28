<div class="row">
  <div class="col-sm-12">
    <div class="statistics-details d-flex align-items-center justify-content-between">
      <div>
        <p class="statistics-title">Total invitations</p>
        <h3 class="rate-percentage" id="total-invitation">0</h3>
      </div>
      <div>
        <p class="statistics-title">Attend</p>
        <h3 class="rate-percentage" id="attend-count">0</h3>
      </div>
      <div>
        <p class="statistics-title">Attend with guests</p>
        <h3 class="rate-percentage" id="attend-with-guests-count">0</h3>
      </div>
      <div>
        <p class="statistics-title">Delegate</p>
        <h3 class="rate-percentage" id="delegate-count">0</h3>
      </div>
      <div>
        <p class="statistics-title">Inattend</p>
        <h3 class="rate-percentage" id="inattend-count">0</h3>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-8 d-flex flex-column">
    <div class="row flex-grow">
      <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title card-title-dash">Invitation update list</h4>
                <p class="card-subtitle card-subtitle-dash"></p>
              </div>
              <div>
                <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="fetchUpdatedInvitations()"><i class="mdi mdi-ref"></i>Refresh</button>
              </div>
            </div>
            <div class="table-responsive mt-2 mb-0">
              <table class="table" id="updated-invitations-table">
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
              <div id="pagination-updated-invitations"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 d-flex flex-column">
    <div class="row flex-grow">
      <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="card-title card-title-dash">Type By Amount</h4>
                </div>
                <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row flex-grow">
      <div class="col-md-6 col-lg-12 grid-margin">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                  <div class="circle-progress-width">
                    <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                  </div>
                  <div>
                    <p class="text-small mb-2">Total Invitations</p>
                    <h4 class="mb-0 fw-bold" id="total-invitation-chart">0</h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="circle-progress-width">
                    <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                  </div>
                  <div>
                    <p class="text-small mb-2">Total Confirmed</p>
                    <h4 class="mb-0 fw-bold" id="total-confirmed-chart">0</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-12 grid-margin">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="card-title card-title-dash">Activities</h4>
              <!-- <p class="mb-0">20 finished, 5 remaining</p> -->
            </div>
            <ul class="bullet-line-list" id="activity-list">
            </ul>
            <div class="list align-items-center pt-3">
              <div class="wrapper w-100">
                <p class="mb-0">
                  <a class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin stretch-card">
  </div>
</div>