<div class="row">    
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manual Check-In</h4>
                <p class="card-description">
                    Invitation detail
                </p>
                <form class="form-invitation-detail">
                    <!-- User Image -->
                    <div class="text-center mb-4">
                        <img id="user-image" src="/assets/images/faces/unknown.png" alt="User Image" class="rounded-circle" width="100" height="100">
                    </div>

                    <div class="form-group">                        
                        <label for="InputFullname" class="fw-bold text-dark">Fullname (*)</label>
                        <input type="text" class="form-control" id="checkin-manual-fullname" placeholder="fullname">
                    </div>
                    <div class="form-group">
                        <label for="InputPosition" class="fw-bold text-dark">Position (*)</label>
                        <input type="text" class="form-control" id="checkin-manual-position" placeholder="position">
                    </div>
                    <div class="form-group">
                        <label for="InputCompany" class="fw-bold text-dark">Company (*)</label>
                        <input type="text" class="form-control" id="checkin-manual-institution" placeholder="company">
                    </div>                
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" id="registerAndCheckInButton" class="btn btn-success btn-rounded btn-fw w-100">Register and Check-In</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="resetManualCheckInButton" class="btn btn-warning btn-rounded btn-fw w-100">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>