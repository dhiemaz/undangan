<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div id="scanner-container" class="text-center">
                    <label for="InputFullname" class="fw-bold text-dark">[ Camera Stop ]</label>
                </div>
                <!-- Flip Camera Icon Button -->
                <button id="flip-camera" class="btn btn-secondary mt-3 w-100 d-flex justify-content-center align-items-center">
                    <i class="mdi mdi-camera me-2"></i> Flip Camera
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">QR-Code Check-In</h4>
                <p class="card-description">
                    Invitation detail
                </p>
                <form class="form-invitation-detail">
                    <!-- User Image -->
                    <div class="text-center mb-4">
                        <img id="user-image" src="/assets/images/faces/unknown.png" alt="User Image" class="rounded-circle" width="100" height="100">
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="checkin-invitation-id" value="">
                        <label for="InputFullname" class="fw-bold text-dark">Fullname</label>
                        <input type="text" disabled="true" class="form-control" id="checkin-fullname" placeholder="-">
                    </div>
                    <div class="form-group">
                        <label for="InputPosition" class="fw-bold text-dark">Position</label>
                        <input type="text" disabled="true" class="form-control" id="checkin-position" placeholder="-">
                    </div>
                    <div class="form-group">
                        <label for="InputCompany" class="fw-bold text-dark">Company</label>
                        <input type="text" disabled="true" class="form-control" id="checkin-institution" placeholder="-">
                    </div>
                    <div class="form-group">
                        <label for="InputType" class="fw-bold text-dark">Invitation Type</label><br>
                        <div id="invitation-type">-</div>
                    </div>
                    <div class="form-group">
                        <label for="InputStatus" class="fw-bold text-dark">Status</label><br>
                        <button type="button" id="statusButton" class="btn btn-success">-</button>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="submit" id="checkInButton" class="btn btn-success btn-rounded btn-fw w-100">Check-In</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="resetButton" class="btn btn-warning btn-rounded btn-fw w-100">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>