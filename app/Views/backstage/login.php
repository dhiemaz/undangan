<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BRI Microfinance Outlook 2025 - backstage </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/css/feather/feather.css">
  <link rel="stylesheet" href="../../assets/css/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/css/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../assets/css/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/css/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../assets/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">              
              <p class="mb-4 pb-0"><h2><b>BRI Microfinance Outlook 2025 - Backstage</b></h2></p>      
              <!-- <h4>Hello! let's get started</h4> -->
              <h6 class="fw-light">Sign in to continue.</h6>
              <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger mt-2">
                <?= session()->getFlashdata('error') ?>
                </div>
              <?php endif; ?>
              <form class="pt-3" action="<?= base_url('/backstage/login/authenticate') ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>                  
                </div>                                
              </form>              
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/lib/vendors/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/lib/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/template.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
