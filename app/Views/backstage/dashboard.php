<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BRI Microfinance Outlook 2025 Backstage </title>

  <!-- external icon -->
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/lib/feather/feather.css">
  <link rel="stylesheet" href="../../assets/lib/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/lib/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../assets/lib/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/lib/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../assets/css/vendor.bundle.base.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->

  <!-- Latest compiled and minified JavaScript -->
  <!-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> -->
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link href="https://cdn.datatables.net/v/bs4/dt-2.2.1/sl-3.0.0/datatables.min.css" rel="stylesheet">
  <!-- End plugin css for this page -->
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  <style>
    #scanner-container {
      margin: 40px auto;
      width: 100%;
      max-width: 400px;
      /* border: 1px solid #ccc; */
      /* Adds a border */
      padding: 10px;
      /* Adds padding inside the container */
      border-radius: 8px;
      /* Optional: Rounds the corners */
      overflow: hidden;
      /* Prevents content from overflowing the container */
    }

    #flip-camera {
      width: 50%;
      /* Ensures the button is as wide as the container */
      border-radius: 0;
      /* Optional: removes border radius if you want sharp corners */
    }

    .text-ellipsis {
      overflow: collapse;
      white-space: wrap;
      text-overflow: clip;
      max-width: 200px;
      /* Adjust based on your layout */
    }
  </style>
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="#">
            <img src="../../assets/images/BRI_MFO_2025.png" alt="logo" />
          </a>
          <!-- <a class="navbar-brand brand-logo-mini" href="#">
            <img src="../../assets/images/BRI_MFO_2025.png" alt="logo" />
          </a> -->
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">BRI Microfinance Outlook 2025</h1>
            <h3 class="welcome-sub-text">Backstage Dashboard </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left"> -- sample notification -- </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <!-- <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                  <p class="fw-light small-text mb-0"> -- sample notification --- </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                  <p class="fw-light small-text mb-0"> -- sample notification --- </p>
                </div>
              </a> -->
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="../../assets/images/man-user-circle-icon.webp" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-sm rounded-circle" src="../../assets/images/man-user-circle-icon.webp" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">user</p>
                <!-- <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p> -->
              </div>
              <a class="dropdown-item" href="/backstage/logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">Themes</p>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-bg-options sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Backstage</span>
            </a>
          </li>
          <li class="nav-item nav-category">pages</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#attendees" aria-expanded="false" aria-controls="attendees">
              <i class="menu-icon mdi mdi-checkbox-marked-circle-outline"></i>
              <span class="menu-title">Check-In</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="attendees">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" id="check-in" data-bs-toggle="tab" href="/backstage/dashboard/tabs/check_in" data-content-target="#overview" role="tab" aria-selected="false">QR check-in</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" id="manual-check-in" data-bs-toggle="tab" href="/backstage/dashboard/tabs/manual_check_in" data-content-target="#overview" role="tab" aria-selected="false">Manual check-in</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#datasheet" aria-expanded="false" aria-controls="datasheet">
              <i class="menu-icon mdi mdi-google-spreadsheet"></i>
              <span class="menu-title">Attendees List</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="datasheet">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="https://docs.google.com/spreadsheets/d/1yrYbzNa6bzlDp6gsr6YGFfrwz3vU5E4oVci96M-BpR0/edit?usp=sharing" target="_blank"> Google Sheet </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="backstage/logout"> Logout </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="overview-tab" data-bs-toggle="tab" href="/backstage/dashboard/tabs/overview" data-content-target="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="invitations-tab" data-bs-toggle="tab" href="/backstage/dashboard/tabs/invitations" data-content-target="#overview" role="tab" aria-selected="false">Invitations</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="guests-tab" data-bs-toggle="tab" href="/backstage/dashboard/tabs/guests" data-content-target="#overview" role="tab" aria-selected="false">Guests</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-0" id="delegations-tab" data-bs-toggle="tab" href="/backstage/dashboard/tabs/delegations" data-content-target="#overview" role="tab" aria-selected="false">Delegations</a>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <!-- content -->
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
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
                                <div class="table-responsive mt-2">
                                  <table class="table" id="updated-invitations-table">
                                    <thead>
                                      <tr>
                                        <th>Fullname</th>
                                        <th>Company</th>
                                        <th>Status</th>
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
                                      <h4 class="card-title card-title-dash">Event Data</h4>
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
                                </div>
                                <ul class="bullet-line-list" id="activity-list">
                                </ul>
                                <!-- <div class="list align-items-center pt-3">
                                  <div class="wrapper w-100">
                                    <p class="mb-0">
                                      <a class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 grid-margin stretch-card">
                      </div>
                    </div>
                  </div>
                  <div id="scanner-container" class="text-center"></div>
                  <!-- content-wrapper ends -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span> -->
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../assets/lib/vendors/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/lib/chart.js/Chart.min.js"></script>
  <script src="../../assets/lib/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../../assets/lib/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/template.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/dashboard.js"></script>
  <script src="../../assets/js/Chart.roundedBarCharts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script src="https://unpkg.com/html5-qrcode/html5-qrcode.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- End custom js for this page-->
  <script>
    let updateStatisticsInterval; // Store the interval ID
    let recentActivityInterval;
    let fetchUpdatedInvitationsInterval;
    let fetchAllInvitationsInterval;
    let fetchInvitationGuestsInterval;
    let fetchInvitationDelegationInterval;

    function initializeOverviewIntervals() {
      if (!updateStatisticsInterval) {
        updateStatisticsInterval = setInterval(updateStatistics, 180000); // Every 3 minutes
      }

      if (!recentActivityInterval) {
        recentActivityInterval = setInterval(fetchRecentActivities, 180000); // Every 3 minutes
      }

      if (!fetchUpdatedInvitationsInterval) {
        recentActivityInterval = setInterval(fetchUpdatedInvitations, 300000); // Every 5 minutes
      }
    }

    function initializeInvitationsIntervals() {
      if (!fetchAllInvitationsInterval) {
        fetchAllInvitationsInterval = setInterval(fetchAllInvitations, 300000); // Every 5 minutes
      }
    }

    function initializeInvitationGuestsIntervals() {
      if (!fetchInvitationGuestsInterval) {
        fetchInvitationGuestsInterval = setInterval(fetchInvitationGuests, 300000); // Every 5 minutes
      }
    }

    function initializeInvitationDelegationIntervals() {
      if (!fetchInvitationGuestsInterval) {
        fetchInvitationGuestsInterval = setInterval(fetchInvitationGuests, 300000); // Every 5 minutes
      }
    }


    function clearIntervals() {
      if (updateStatisticsInterval) {
        clearInterval(updateStatisticsInterval);
        updateStatisticsInterval = null; // Reset the interval ID
      }

      if (recentActivityInterval) {
        clearInterval(recentActivityInterval);
        recentActivityInterval = null; // Reset the interval ID
      }

      if (fetchUpdatedInvitationsInterval) {
        clearInterval(fetchUpdatedInvitationsInterval);
        fetchUpdatedInvitationsInterval = null; // Reset the interval ID
      }

      if (fetchAllInvitationsInterval) {
        clearInterval(fetchAllInvitationsInterval);
        fetchAllInvitationsInterval = null; // Reset the interval ID
      }

      if (fetchInvitationGuestsInterval) {
        clearInterval(fetchInvitationGuestsInterval);
        fetchInvitationGuestsInterval = null; // Reset the interval ID
      }

      if (fetchInvitationDelegationInterval) {
        clearInterval(fetchInvitationDelegationInterval);
        fetchInvitationDelegationInterval = null; // Reset the interval ID
      }
    }

    // Initialize the scanner once
    let currentCameraId;
    let scanner = new Html5Qrcode("scanner-container", {
      fps: 10,
      qrbox: 250
    });
    let isScannerStart = false;

    // Function to start scanning
    async function startScanner(cameraId) {
      document.getElementById("checkin-invitation-id").value = "";
      document.getElementById("checkin-fullname").value = "";
      document.getElementById("checkin-position").value = "";
      document.getElementById("checkin-institution").value = "";
      const button = document.getElementById("statusButton");
      // Remove existing color classes
      button.classList.remove("btn-success", "btn-danger", "btn-warning", "btn-primary");
      button.classList.add("btn-secondary");
      button.textContent = "N/A";

      // const buttonCheckIn = document.getElementById("check-in");
      // buttonCheckIn.disabled = true;

      try {
        if (!scanner) {
          console.error("Scanner is not initialized.");
          return;
        }

        // Stop the scanner if it's already running
        if (scanner.isScanning) {
          await scanner.stop();
        }

        // Start the scanner with the specified camera ID
        await scanner.start(
          cameraId, {
            fps: 10,
            qrbox: {
              width: 250,
              height: 250,
            },
          },
          onScanSuccess,
          onScanError
        );

        currentCameraId = cameraId; // Store the current camera ID
        console.log("start using camera ID:", cameraId);
      } catch (err) {
        console.error("Error starting scanner:", err);
      }
    }

    // Function to switch between front and rear cameras, prioritizing the front camera
    async function flipCamera() {
      try {
        const devices = await Html5Qrcode.getCameras(); // Get list of available cameras
        if (devices && devices.length > 0) {
          // Look for a front camera first, then a back camera
          const frontCamera = devices.find(device =>
            device.label.toLowerCase().includes("front") || device.label.toLowerCase().includes("front-facing")
          );
          const backCamera = devices.find(device =>
            device.label.toLowerCase().includes("back") || device.label.toLowerCase().includes("rear")
          );

          // If a front camera is found, use it; otherwise, use the back camera
          const nextCamera = frontCamera || backCamera || devices[0]; // Default to the first available camera

          // Switch only if the camera is different from the current one
          if (nextCamera.id !== currentCameraId) {
            console.log("Switching to camera:", nextCamera.label);
            await startScanner(nextCamera.id);
          } else {
            alert("Already using the selected camera.");
          }
        } else {
          alert("No cameras found.");
        }
      } catch (err) {
        console.error("Error flipping camera:", err);
      }
    }

    // Set up the initial camera (rear camera preferred)
    async function initializeScanner() {
      try {
        const devices = await Html5Qrcode.getCameras(); // Get list of available cameras
        if (devices && devices.length > 0) {
          // Look for a back camera in the list of devices
          const backCamera = devices.find(device =>
            device.label.toLowerCase().includes("back") || device.label.toLowerCase().includes("rear")
          );
          // Use the back camera if available, otherwise fallback to the first available camera
          const cameraToUse = backCamera ? backCamera.id : devices[0].id;
          console.log("Using camera ID:", cameraToUse);
          await startScanner(cameraToUse);
        } else {
          alert("No cameras found.");
        }
      } catch (err) {
        console.error("Error starting scanner:", err);
      }
    }

    // Function to stop scanning
    function stopScanning() {
      isScannerStart = false;
      scanner
        .stop()
        .then(() => {
          console.log("Scanner stopped.");
        })
        .catch((err) => {
          console.error("Error stopping scanner:", err);
        });
    }

    // Handlers for scan success and errors
    function onScanSuccess(decodedText, decodedResult) {
      const resultContainer = document.getElementById("InputFullname");
      if (resultContainer) {
        resultContainer.textContent.value = `QR Code Content: ${decodedText}`;
      }

      //https://brimicrofinanceoutlook.id/bri-microfinance-2025/invitation/WpNRCRmdntxINbSNZWuK6ZIuw

      // Create a URL object
      const urlObj = new URL(decodedResult.decodedText);

      // Extract the token from the pathname
      const pathSegments = urlObj.pathname.split("/");
      const token = pathSegments[pathSegments.length - 1];
      console.log("Decoded result:", token);
      getInvitationDetail(token);

      // Optionally stop scanning after successful detection 
      stopScanning();
    }

    function onScanError(errorMessage) {
      console.log("Scan error:", errorMessage);
    }

    // Call this function on tab switch
    function handleTabSwitch(id) {
      // clear intervals
      clearIntervals();
      if (id === 'overview-tab') {
        if (isScannerStart) {
          stopScanning();
          isScannerStart = false;
        }

        // reinitialize intervals
        initializeOverviewIntervals();
        // update statistics
        updateStatistics();
        // Fetch activities
        fetchRecentActivities();
        // Fetch updated invitations
        fetchUpdatedInvitations();
      }

      if (id === 'invitations-tab') {
        if (isScannerStart) {
          stopScanning();
          isScannerStart = false;
        }
        // reinitialize intervals
        initializeInvitationsIntervals();
        // fetchAllInvitations
        fetchAllInvitations();
      }

      if (id === 'guests-tab') {
        if (isScannerStart) {
          stopScanning();
          isScannerStart = false;
        }
        // reinitialize intervals
        initializeInvitationGuestsIntervals();
        // fetchAllInvitations
        fetchInvitationGuests();
      }

      if (id === 'delegations-tab') {
        if (isScannerStart) {
          stopScanning();
          isScannerStart = false;
        }
        // reinitialize intervals
        initializeInvitationDelegationIntervals();
        // fetchAllInvitations
        fetchInvitationDelegation();
      }

      if (id === 'delegations-tab') {
        if (isScannerStart) {
          stopScanning();
          isScannerStart = false;
        }
        // reinitialize intervals
        initializeInvitationDelegationIntervals();
        // fetchAllInvitations
        fetchInvitationDelegation();
      }

      if (id === 'delegations-tab') {
        if (isScannerStart) {
          stopScanning();
          isScannerStart = false;
        }
        // reinitialize intervals
        initializeInvitationDelegationIntervals();
        // fetchAllInvitations
        fetchInvitationDelegation();
      }

      if (id === 'check-in') {
        const flipCameraButton = document.getElementById("flip-camera");
        // Event listener for the flip camera button
        flipCameraButton.addEventListener("click", flipCamera);

        // Initialize the scanner when the page loads
        isScannerStart = true;
        initializeScanner();
      }

      if (id === 'manual-check-in') {
        if (isScannerStart) {
          stopScanning();
          isScannerStart = false;
        }

        // reinitialize intervals
        initializeInvitationDelegationIntervals();
        // fetchAllInvitations
        fetchInvitationDelegation();

        initializeManualCheckIn();
      }
    }

    // Function to reset the QR code check-in
    function resetQRCheckIn() {
      const vipStarsElement = document.getElementById('invitation-type');
      if (vipStarsElement) {
        vipStarsElement.innerHTML = ''; // Clear existing stars
      } else {
        console.log('vipStarsElement is null');
      }

      initializeScanner();
    }

    // Attach event listeners to buttons
    function getInvitationDetail(token) {
      let invitations_type = '';

      $.ajax({
        // url: 'http://localhost:8080/backstage/api/getInvitationData/'.concat(token), // Replace with your API endpoint
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getInvitationData/'.concat(token), // Replace with your API endpoint
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response);

          if (response.data.type === null) {
            invitations_type = "standard";
          } else {
            invitations_type = response.data.type;
          }

          document.getElementById('user-image').src = getTitle(response.data.title);
          document.getElementById("checkin-invitation-id").value = response.data.id;
          document.getElementById("checkin-fullname").value = response.data.fullname;
          document.getElementById("checkin-position").value = response.data.position;
          document.getElementById("checkin-institution").value = response.data.institution;
          const button = document.getElementById("statusButton");
          const checkInButton = document.getElementById("checkInButton");
          const resetButton = document.getElementById("resetButton");

          // Remove existing color classes
          button.classList.remove("btn-success", "btn-danger", "btn-warning", "btn-primary");
          // Change the button's text and color based on the status
          switch (response.data.status) {
            case "attend":
              button.classList.add("btn-success");
              button.textContent = response.data.status;
              break;
            case "delegate":
              button.classList.add("btn-warning");
              button.textContent = response.data.status;
              break;
            case "attend with guests":
              button.classList.add("btn-primary");
              button.textContent = response.data.status;
              break;
            default:
              button.classList.add("btn-secondary");
              button.textContent = "unconfirmed";
          }

          if (response.data.status === 'check-in' || response.data.status === null) {
            checkInButton.disabled = true;
          } else {
            checkInButton.disabled = false;
          }

          const vipStarsElement = document.getElementById('invitation-type');
          if (vipStarsElement) {
            vipStarsElement.innerHTML = ''; // Clear existing stars
          } else {
            console.log('vipStarsElement is null');
          }

          let starCount = 0;
          if (invitations_type === 'vvip') {
            starCount = 5; // 5 stars for VVIP
          } else if (invitations_type === 'vip') {
            starCount = 4; // 4 stars for VIP
          } else if (invitations_type === 'standard') {
            starCount = 3; // 4 stars for standard
          }

          for (let i = 0; i < starCount; i++) {
            const starIcon = document.createElement('i');
            starIcon.className = 'mdi mdi-star'; // MDI star icon class
            vipStarsElement.appendChild(starIcon);
          }

          checkInButton.addEventListener("click", QRCheckIn);
          resetButton.addEventListener("click", resetQRCheckIn);
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch statistics:', error);
        }


      });
    }

    function CheckIn(id) {
      // const id = document.getElementById('checkin-invitation-id');
      const status = 'check-in';

      if (id) {
        const requestData = {
          id: id,
          status: status
        };

        console.log(requestData);
        $.ajax({
          url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/invitations/checkIn', // Replace with your API endpoint
          // url: 'http://localhost:8080/backstage/api/invitations/checkIn', // Replace with your API endpoint
          method: 'POST',
          dataType: 'json',
          contentType: 'application/json', // Ensure the content type matches the cURL
          data: JSON.stringify(requestData), // Convert data to JSON string
          success: function(response) {
            if (response.success) {
              console.log(response.message);
              // Optionally update UI elements
              alert('Check-In Successful: ' + response.message);
            } else {
              console.error('Check-In Failed:', response.message);
              alert('Error: ' + response.message);
            }
          },
          error: function(xhr, status, error) {
            console.error('Failed to process check-in:', error);
            alert('Failed to process check-in. Please try again.');
          }
        });
      } else {
        alert('Invitation ID is required.');
      }
    }


    function QRCheckIn() {
      const id = document.getElementById('checkin-invitation-id').value;
      const status = 'check-in';

      if (id) {
        const requestData = {
          id: id,
          status: status
        };

        console.log(requestData);
        $.ajax({
          url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/invitations/checkIn', // Replace with your API endpoint
          // url: 'http://localhost:8080/backstage/api/invitations/checkIn', // Replace with your API endpoint
          method: 'POST',
          dataType: 'json',
          contentType: 'application/json', // Ensure the content type matches the cURL
          data: JSON.stringify(requestData), // Convert data to JSON string
          success: function(response) {
            if (response.success) {
              console.log(response.message);
              // Optionally update UI elements
              alert('Check-In Successful: ' + response.message);
            } else {
              console.error('Check-In Failed:', response.message);
              alert('Error: ' + response.message);
            }
          },
          error: function(xhr, status, error) {
            console.error('Failed to process check-in:', error);
            alert('Failed to process check-in. Please try again.');
          }
        });
      } else {
        alert('Invitation ID is required.');
      }
    }

    function generateHash(data) {
      // Generate SHA-256 hash synchronously
      return CryptoJS.SHA256(data).toString(CryptoJS.enc.Hex);
    }


    // Function to register and check in
    function RegisterAndCheckIn(fullname, position, company) {
      let hashData = '';
      const status = 'check-in';

      if (fullname == '' || position == '' || company == '') {
        alert('Please fill in all fields');
      } else {
        hashData = generateHash(fullname.concat(position, company));
        const requestData = {
          hash: hashData,
          fullname: fullname,
          position: position,
          company: company,
          status: status
        };

        console.log(requestData);
        $.ajax({
          url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/invitations/registrationAndCheckIn', // Replace with your API endpoint
          // url: 'http://localhost:8080/backstage/api/invitations/registrationAndCheckIn', // Replace with your API endpoint
          method: 'POST',
          dataType: 'json',
          contentType: 'application/json', // Ensure the content type matches the cURL
          data: JSON.stringify(requestData), // Convert data to JSON string
          success: function(response) {
            if (response.success) {
              console.log(response.message);
              // Optionally update UI elements
              alert(response.message);

              // $('#checkin-manual-fullname').val('');
              // $('#checkin-manual-position').val('');
              // $('#checkin-manual-institution').val('');
            } else {
              console.error(response.message);
              alert('Error: ' + response.message);
            }
          },
          error: function(xhr, status, error) {
            console.error('Failed to process check-in:', error);
            alert('Failed to process registration & check-in. Please try again.');
          }
        });
      }
    }

    // Function to fetch and update statistics
    function updateStatistics() {
      $.ajax({
        // url: 'http://localhost:8080/backstage/api/getSummaryCount', // Replace with your API endpoint
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getSummaryCount', // Replace with your API endpoint
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          // Update the statistics in the DOM
          $('#total-invitation').text(response.total_invitations);
          $('#total-invitation-chart').text(response.total_invitations);
          $('#total-confirmed-chart').text(response.total_confirmed);
          $('#attend-count').text(response.attend);
          $('#attend-with-guests-count').text(response.attend_with_guests);
          $('#delegate-count').text(response.delegates);
          $('#inattend-count').text(response.inattend);
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch statistics:', error);
        }
      });
    }

    function fetchRecentActivities() {
      $.ajax({
        // url: 'http://localhost:8080/backstage/api/getRecentActivities', // Replace with your API endpoint
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getRecentActivities', // Replace with your API endpoint
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          const activityList = $('#activity-list');
          activityList.empty(); // Clear existing activities

          response.activities.forEach(activity => {
            const timeAgo = calculateTimeAgo(activity.updated_at); // Helper function to calculate time
            const listItem = `
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">${activity.fullname}</span> ${activity.status}</div>
                                    <p>${timeAgo}</p>
                                </div>
                            </li>`;
            activityList.append(listItem); // Append new activity
          });
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch activities:', error);
        }
      });
    }

    // Calculate time ago from timestamp
    function calculateTimeAgo(timestamp) {
      const activityTime = new Date(timestamp);
      const now = new Date();
      const diffMinutes = Math.floor((now - activityTime) / 60000); // Difference in minutes

      if (diffMinutes < 1) return 'Just now';
      if (diffMinutes < 60) return `${diffMinutes} min ago`;
      if (diffMinutes < 1440) return `${Math.floor(diffMinutes / 60)} h ago`;
      return `${Math.floor(diffMinutes / 1440)} d ago`;
    }

    // Function to fetch updated invitations
    const fetchUpdatedInvitations = (page = 1) => {
      const perPage = 7; // Items per page

      $.ajax({
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getUpdatedInvitations', // Replace with your API endpoint
        // url: 'http://localhost:8080/backstage/api/getUpdatedInvitations', // Replace with your API endpoint
        method: 'GET',
        data: {
          page,
          perPage
        }, // Pass pagination parameters
        dataType: 'json',
        success: function(response) {
          const tbody = $('#updated-invitations-table tbody');
          const pagination = $('#pagination-updated-invitations');
          tbody.empty(); // Clear existing rows
          pagination.empty(); // Clear pagination controls

          // Populate table rows
          response.data.forEach(invitation => {
            const tableRow = `
                            <tr>                                        
                              <td>
                                  <div class="d-flex ">                                    
                                    <img src="${getTitle(invitation.title)}" alt="" loading="lazy">
                                    &nbsp;&nbsp;
                                    <div class="ml-2">
                                      <h6 class="font-bold">${invitation.fullname}</h6>
                                      <p class="text-gray-600 text-ellipsis">${invitation.position}</p>
                                    </div>
                                  </div>
                              </td>
                              <td>
                                <h6>${invitation.institution}</h6>
                                <p>-</p>
                              </td>
                              <td>
                                <div class="badge badge-opacity-${getStatusBadge(invitation.status)}">
                                    ${invitation.status}
                                </div>
                              </td>                              
                            </tr>`;
            tbody.append(tableRow);
          });

          // Generate Tailwind CSS-based pagination controls
          const {
            currentPage,
            totalPages,
            totalItems,
            perPage
          } = response.pagination;
          const startItem = (currentPage - 1) * perPage + 1;
          const endItem = Math.min(currentPage * perPage, totalItems);

          // Generate pagination controls
          pagination.append(`              
              <div class="mt-auto d-flex flex-column align-items-center">
                  <span class="text-muted small"> Showing <span class="fw-semibold">${startItem}</span> to 
                  <span class="fw-semibold">${endItem}</span> of 
                  <span class="fw-semibold">${totalItems}</span> Entries </span>
                <div class="btn-group mt-2">
                  <button class="btn btn-dark btn-sm ${currentPage === 1 ? 'disabled' : ''}" ${currentPage == 1 ? 'disabled' : ''} id="prev-updated-invitations">Prev</button>
                  <button class="btn btn-dark btn-sm ${currentPage === totalPages ? 'disabled' : ''}" ${currentPage == totalPages ? 'disabled' : ''} id="next-updated-invitations">Next</button>
                </div>
              </div>
            `);

          $('#prev-updated-invitations').on('click', function() {
            if (currentPage > 1) {
              fetchUpdatedInvitations(currentPage - 1);
            }
          });

          $('#next-updated-invitations').on('click', function() {
            if (currentPage < totalPages) {
              fetchUpdatedInvitations(currentPage + 1);
            }
          });
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch updated invitations:', error);
        }
      });
    };

    // Function to fetch all invitations
    const fetchAllInvitations = (page = 1) => {
      const perPage = 20; // Items per page
      var invitations_type;

      $.ajax({
        // url: 'http://localhost:8080/backstage/api/getAllInvitations', // Replace with your API endpoint
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getAllInvitations', // Replace with your API endpoint
        method: 'GET',
        data: {
          page,
          perPage
        }, // Pass pagination parameters
        dataType: 'json',
        success: function(response) {
          const tbody = $('#all-invitations-table tbody');
          const pagination = $('#pagination-invitations');
          tbody.empty(); // Clear existing rows
          pagination.empty(); // Clear pagination controls          

          response.data.forEach(invitation => {
            let starCount = 0;

            if (invitation.type === null) {
              invitations_type = "biasa bri"
            } else {
              invitations_type = invitation.type
            }

            if (invitations_type === 'vvip bri' || invitations_type === 'vvip a' || invitations_type === 'vvip') {
              starCount = 5; // 5 stars for VVIP
            } else if (invitations_type === 'vip bri' || invitations_type === 'vip a' || invitations_type === 'vip') {
              starCount = 4; // 4 stars for VIP
            } else if (invitations_type === 'biasa bri') {
              starCount = 3; // 4 stars for VIP
            }

            // Generate star icons as a string
            let starsHTML = '';
            for (let i = 0; i < starCount; i++) {
              starsHTML += '<i class="mdi mdi-star text-warning"></i>'; // Material Design Icon (mdi) star class
            }

            const tableRow = `                            
                            <tr data-bs-toggle="modal" data-bs-target="#invitationModal" data-invitation-id="${invitation.id}" data-image="${getTitle(invitation.title)}" data-fullname="${invitation.fullname}" data-position="${invitation.position}" data-company="${invitation.institution}" data-status="${getInvitationStatus(invitation.status)}" data-info="Some additional info">                                        
                              <td>
                                  <div class="d-flex ">                                    
                                    <img src="${getTitle(invitation.title)}" alt="" loading="lazy">
                                    &nbsp;&nbsp;
                                    <div class="ml-2">
                                      <h6 class="font-bold">${invitation.fullname}</h6>
                                      <p class="text-gray-600 text-ellipsis">${invitation.position}</p>
                                    </div>
                                  </div>
                              </td>
                              <td>
                                <h6>${invitation.institution}</h6>
                                <p>-</p>
                              </td>
                              <td>
                                <div class="badge badge-opacity-${getStatusBadge(invitation.status || 'unconfirmed')}">
                                    ${invitation.status || 'unconfirmed'}
                                </div>
                              </td>
                              <td>
                                  <div id="invitations-star">
                                    ${starsHTML}
                                  </div>
                              </td>
                            </tr>`;
            tbody.append(tableRow);
          });

          // Add event listeners to rows for modal handling
          document.querySelectorAll('tr[data-bs-toggle="modal"]').forEach(row => {
            row.addEventListener('click', function() {
              const invitationId = row.getAttribute('data-invitation-id');
              const imageSrc = row.getAttribute('data-image');
              const fullname = row.getAttribute('data-fullname');
              const position = row.getAttribute('data-position');
              const company = row.getAttribute('data-company');
              const status = row.getAttribute('data-status');
              const info = row.getAttribute('data-info');

              // Update the modal content                            
              document.querySelector('#invitationModal #invitations-invitation-id').value = invitationId;
              document.querySelector('#invitationModal #invitations-image').src = imageSrc;
              document.querySelector('#invitationModal #modal-fullname').textContent = fullname;
              document.querySelector('#invitationModal #invitations-position').value = position; // You may need to add this span in the modal
              document.querySelector('#invitationModal #invitations-company').value = company;
              document.querySelector('#invitationModal #invitations-status-button').textContent = status;
              // document.querySelector('#invitationModal #invitations-type').value = invitations_type;              

              if (status === 'check-in') {
                document.querySelector('#invitationModal #invitations-checkInBtn').disabled = true;
              } else {
                document.querySelector('#invitationModal #invitations-checkInBtn').disabled = false;
              }

              const vipStarsElement = document.querySelector('#invitationModal #vip-stars');
              if (vipStarsElement) {
                vipStarsElement.innerHTML = ''; // Clear existing stars                
              } else {
                console.log('vipStarsElement is null');
              }

              let starCount = 0;
              if (invitations_type === 'vvip bri' || invitations_type === 'vvip a' || invitations_type === 'vvip') {
                starCount = 5; // 5 stars for VVIP
              } else if (invitations_type === 'vip bri' || invitations_type === 'vip a' || invitations_type === 'vip') {
                starCount = 4; // 4 stars for VIP
              } else if (invitations_type === 'biasa bri') {
                starCount = 3; // 4 stars for VIP
              }

              for (let i = 0; i < starCount; i++) {
                const starIcon = document.createElement('i');
                starIcon.className = 'mdi mdi-star'; // MDI star icon class
                vipStarsElement.appendChild(starIcon);
              }

              const br = document.createElement('br');
              vipStarsElement.appendChild(br);
              vipStarsElement.appendChild(br);

              // Add a label after the stars
              const label = document.createElement('span');
              label.className = 'ml-2 text-sm text-black'; // Optional class for spacing
              label.textContent = "[" + invitations_type + "]"; // Use the invitation type as the label text
              vipStarsElement.appendChild(label);
            });
          });

          // Generate Tailwind CSS-based pagination controls
          const {
            currentPage,
            totalPages,
            totalItems,
            perPage
          } = response.pagination;
          const startItem = (currentPage - 1) * perPage + 1;
          const endItem = Math.min(currentPage * perPage, totalItems);

          // Generate pagination controls
          pagination.append(`
                <div class="mt-auto d-flex flex-column align-items-center">
                  <span class="text-muted small"> Showing <span class="fw-semibold">${startItem}</span> to 
                  <span class="fw-semibold">${endItem}</span> of 
                  <span class="fw-semibold">${totalItems}</span> Entries </span>
                  <div class="btn-group mt-2">
                    <button class="btn btn-dark btn-sm ${currentPage === 1 ? 'disabled' : ''}" ${currentPage == 1 ? 'disabled' : ''} id="all-invitations-prev-btn">Prev</button>
                    <button class="btn btn-dark btn-sm ${currentPage === totalPages ? 'disabled' : ''}" ${currentPage == totalPages ? 'disabled' : ''} id="all-invitations-next-btn">Next</button>
                  </div>
                </div>
            `);

          $('#all-invitations-prev-btn').on('click', function() {
            if (currentPage > 1) {
              fetchAllInvitations(currentPage - 1);
            }
          });

          $('#all-invitations-next-btn').on('click', function() {
            if (currentPage < totalPages) {
              fetchAllInvitations(currentPage + 1);
            }
          });

          const invitationsCheckIn = document.querySelector('#invitationModal #invitations-checkInBtn');
          invitationsCheckIn.addEventListener('click', function() {
            const invitationID = document.querySelector('#invitationModal #invitations-invitation-id');
            CheckIn(invitationID.value);

            if (currentPage < totalPages) {
              fetchAllInvitations(currentPage + 1);
            }

            if (currentPage > 1) {
              fetchAllInvitations(currentPage - 1);
            }
          });
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch all invitations:', error);
        }
      });
    };

    // Fetch invitation guests
    const fetchInvitationGuests = (page = 1) => {
      const perPage = 20; // Items per page

      $.ajax({
        // url: 'http://localhost:8080/backstage/api/getInvitationGuests', // Replace with your API endpoint
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getInvitationGuests', // Replace with your API endpoint
        method: 'GET',
        data: {
          page,
          perPage
        }, // Pass pagination parameters
        dataType: 'json',
        success: function(response) {
          const tbody = $('#guests-invitations-table tbody');
          const pagination = $('#pagination-guests');
          tbody.empty(); // Clear existing rows
          pagination.empty(); // Clear pagination controls

          // Populate table rows
          response.data.forEach(invitation => {
            const tableRow = `
                            <tr>                                        
                              <td>
                                  <div class="d-flex ">                                    
                                    <img src="${getTitle(invitation.title)}" alt="" loading="lazy">
                                    &nbsp;&nbsp;
                                    <div class="ml-2">
                                      <h6 class="font-bold">${invitation.fullname}</h6>
                                      <p class="text-gray-600 text-ellipsis">${invitation.position}</p>
                                    </div>
                                  </div>
                              </td>
                              <td>
                                <h6>${invitation.institution}</h6>
                                <p>-</p>
                              </td>
                              <td>
                                <div class="badge badge-opacity-${getStatusBadge(invitation.status || 'unconfirmed')}">
                                    ${invitation.status || 'unconfirmed'}
                                </div>
                              </td>
                              <td>${invitation.attendee_name}</td>
                            </tr>`;
            tbody.append(tableRow);
          });

          // Generate Tailwind CSS-based pagination controls
          const {
            currentPage,
            totalPages,
            totalItems,
            perPage
          } = response.pagination;
          const startItem = (currentPage - 1) * perPage + 1;
          const endItem = Math.min(currentPage * perPage, totalItems);

          // Generate pagination controls
          pagination.append(`
                <div class="mt-auto d-flex flex-column align-items-center">
                  <span class="text-muted small"> Showing <span class="fw-semibold">${startItem}</span> to 
                  <span class="fw-semibold">${endItem}</span> of 
                  <span class="fw-semibold">${totalItems}</span> Entries </span>
                  <div class="btn-group mt-2">
                    <button class="btn btn-dark btn-sm ${currentPage === 1 ? 'disabled' : ''}" ${currentPage == 1 ? 'disabled' : ''} id="guests-invitations-prev-btn">Prev</button>
                    <button class="btn btn-dark btn-sm ${currentPage === totalPages ? 'disabled' : ''}" ${currentPage == totalPages ? 'disabled' : ''} id="guests-invitations-next-btn">Next</button>
                  </div>
                </div>
            `);

          $('#guests-invitations-prev-btn').on('click', function() {
            if (currentPage > 1) {
              fetchInvitationGuests(currentPage - 1);
            }
          });

          $('#guests-invitations-next-btn').on('click', function() {
            if (currentPage < totalPages) {
              fetchInvitationGuests(currentPage + 1);
            }
          });
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch guests invitations:', error);
        }
      });
    };

    // Fetch invitation delegation
    const fetchInvitationDelegation = (page = 1) => {
      const perPage = 20; // Items per page

      $.ajax({
        // url: 'http://localhost:8080/backstage/api/getInvitationDelegation', // Replace with your API endpoint
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getInvitationDelegation', // Replace with your API endpoint
        method: 'GET',
        data: {
          page,
          perPage
        }, // Pass pagination parameters
        dataType: 'json',
        success: function(response) {
          const tbody = $('#delegations-invitations-table tbody');
          const pagination = $('#pagination-delegations');
          tbody.empty(); // Clear existing rows
          pagination.empty(); // Clear pagination controls

          // Populate table rows
          response.data.forEach(invitation => {
            const tableRow = `
                            <tr>                                        
                              <td>
                                  <div class="d-flex ">                                    
                                    <img src="${getTitle(invitation.title)}" alt="" loading="lazy">
                                    &nbsp;&nbsp;
                                    <div class="ml-2">
                                      <h6 class="font-bold">${invitation.fullname}</h6>
                                      <p class="text-gray-600 text-ellipsis">${invitation.position}</p>
                                    </div>
                                  </div>
                              </td>
                              <td>
                                <h6>${invitation.institution}</h6>
                                <p>-</p>
                              </td>
                              <td>
                                <div class="badge badge-opacity-${getStatusBadge(invitation.status || 'unconfirmed')}">
                                    ${invitation.status || 'unconfirmed'}
                                </div>
                              </td>
                              <td>${invitation.attendee_name}</td>
                            </tr>`;
            tbody.append(tableRow);
          });

          // Generate Tailwind CSS-based pagination controls
          const {
            currentPage,
            totalPages,
            totalItems,
            perPage
          } = response.pagination;
          const startItem = (currentPage - 1) * perPage + 1;
          const endItem = Math.min(currentPage * perPage, totalItems);

          // Generate pagination controls
          pagination.append(`
                <div class="mt-auto d-flex flex-column align-items-center">
                  <span class="text-muted small"> Showing <span class="fw-semibold">${startItem}</span> to 
                  <span class="fw-semibold">${endItem}</span> of 
                  <span class="fw-semibold">${totalItems}</span> Entries </span>
                  <div class="btn-group mt-2">
                    <button class="btn btn-dark btn-sm ${currentPage === 1 ? 'disabled' : ''}" ${currentPage == 1 ? 'disabled' : ''} id="delegations-invitations-prev-btn">Prev</button>
                    <button class="btn btn-dark btn-sm ${currentPage === totalPages ? 'disabled' : ''}" ${currentPage == totalPages ? 'disabled' : ''} id="delegations-invitations-next-btn">Next</button>
                  </div>
                </div>
            `);

          $('#delegations-invitations-prev-btn').on('click', function() {
            if (currentPage > 1) {
              fetchInvitationDelegation(currentPage - 1);
            }
          });

          $('#delegations-invitations-next-btn').on('click', function() {
            if (currentPage < totalPages) {
              fetchInvitationDelegation(currentPage + 1);
            }
          });
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch delegations invitations:', error);
        }
      });
    };

    // Search API
    const searchAllInvitations = (query, page = 1) => {
      const perPage = 20; // Items per page
      var invitations_type;

      $.ajax({
        // url: 'http://localhost:8080/backstage/api/invitations/search', // Replace with your API endpoint
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/invitations/search', // Replace with your API endpoint
        method: 'GET',
        data: {
          query,
          page,
          perPage
        }, // Pass pagination parameters
        dataType: 'json',
        success: function(response) {
          const tbody = $('#all-invitations-table tbody');
          const pagination = $('#pagination-invitations');
          tbody.empty(); // Clear existing rows
          pagination.empty(); // Clear pagination controls          

          response.data.forEach(invitation => {
            let starCount = 0;

            if (invitation.type === null) {
              invitations_type = "biasa bri"
            } else {
              invitations_type = invitation.type
            }

            if (invitations_type === 'vvip bri' || invitations_type === 'vvip a' || invitations_type === 'vvip') {
              starCount = 5; // 5 stars for VVIP
            } else if (invitations_type === 'vip bri' || invitations_type === 'vip a' || invitations_type === 'vip') {
              starCount = 4; // 4 stars for VIP
            } else if (invitations_type === 'biasa bri') {
              starCount = 3; // 4 stars for VIP
            }

            // Generate star icons as a string
            let starsHTML = '';
            for (let i = 0; i < starCount; i++) {
              starsHTML += '<i class="mdi mdi-star text-warning"></i>'; // Material Design Icon (mdi) star class
            }

            const tableRow = `  
                            <tr data-bs-toggle="modal" data-bs-target="#invitationModal" data-invitation-id="${invitation.id}" data-image="${getTitle(invitation.title)}" data-fullname="${invitation.fullname}" data-position="${invitation.position}" data-company="${invitation.institution}" data-status="${getInvitationStatus(invitation.status)}" data-info="Some additional info">                                                                                       
                              <td>
                                  <div class="d-flex ">                                    
                                    <img src="${getTitle(invitation.title)}" alt="" loading="lazy">
                                    &nbsp;&nbsp;
                                    <div class="ml-2">
                                      <h6 class="font-bold">${invitation.fullname}</h6>
                                      <p class="text-gray-600 text-ellipsis">${invitation.position}</p>
                                    </div>
                                  </div>
                              </td>
                              <td>
                                <h6>${invitation.institution}</h6>
                                <p>-</p>
                              </td>
                              <td>
                                <div class="badge badge-opacity-${getStatusBadge(invitation.status || 'unconfirmed')}">
                                    ${invitation.status || 'unconfirmed'}
                                </div>
                              </td>
                              <td>
                                  <div id="invitations-star">
                                    ${starsHTML}
                                  </div>
                              </td>
                            </tr>`;
            tbody.append(tableRow);
          });

          // Add event listeners to rows for modal handling
          document.querySelectorAll('tr[data-bs-toggle="modal"]').forEach(row => {
            row.addEventListener('click', function() {
              const invitationId = row.getAttribute('data-invitation-id');
              const imageSrc = row.getAttribute('data-image');
              const fullname = row.getAttribute('data-fullname');
              const position = row.getAttribute('data-position');
              const company = row.getAttribute('data-company');
              const status = row.getAttribute('data-status');
              const info = row.getAttribute('data-info');

              // Update the modal content                            
              document.querySelector('#invitationModal #invitations-invitation-id').value = invitationId;
              document.querySelector('#invitationModal #invitations-image').src = imageSrc;
              document.querySelector('#invitationModal #modal-fullname').textContent = fullname;
              document.querySelector('#invitationModal #invitations-position').value = position; // You may need to add this span in the modal
              document.querySelector('#invitationModal #invitations-company').value = company;
              document.querySelector('#invitationModal #invitations-status-button').textContent = status;
              // document.querySelector('#invitationModal #invitations-type').value = invitations_type;              

              if (status === 'check-in') {
                document.querySelector('#invitationModal #invitations-checkInBtn').disabled = true;
              } else {
                document.querySelector('#invitationModal #invitations-checkInBtn').disabled = false;
              }

              const vipStarsElement = document.querySelector('#invitationModal #vip-stars');
              if (vipStarsElement) {
                vipStarsElement.innerHTML = ''; // Clear existing stars                
              } else {
                console.log('vipStarsElement is null');
              }

              let starCount = 0;
              if (invitations_type === 'vvip bri' || invitations_type === 'vvip a' || invitations_type === 'vvip') {
                starCount = 5; // 5 stars for VVIP
              } else if (invitations_type === 'vip bri' || invitations_type === 'vip a' || invitations_type === 'vip') {
                starCount = 4; // 4 stars for VIP
              } else if (invitations_type === 'biasa bri') {
                starCount = 3; // 4 stars for VIP
              }

              for (let i = 0; i < starCount; i++) {
                const starIcon = document.createElement('i');
                starIcon.className = 'mdi mdi-star'; // MDI star icon class
                vipStarsElement.appendChild(starIcon);
              }

              const br = document.createElement('br');
              vipStarsElement.appendChild(br);
              vipStarsElement.appendChild(br);

              // Add a label after the stars
              const label = document.createElement('span');
              label.className = 'ml-2 text-sm text-black'; // Optional class for spacing
              label.textContent = "[" + invitations_type + "]"; // Use the invitation type as the label text
              vipStarsElement.appendChild(label);
            });
          });

          // Generate Tailwind CSS-based pagination controls
          const {
            currentPage,
            totalPages,
            totalItems,
            perPage
          } = response.pagination;
          const startItem = (currentPage - 1) * perPage + 1;
          const endItem = Math.min(currentPage * perPage, totalItems);

          // Generate pagination controls
          pagination.append(`
                <div class="mt-auto d-flex flex-column align-items-center">
                  <span class="text-muted small"> Showing <span class="fw-semibold">${startItem}</span> to 
                  <span class="fw-semibold">${endItem}</span> of 
                  <span class="fw-semibold">${totalItems}</span> Entries </span>
                  <div class="btn-group mt-2">
                    <button class="btn btn-dark btn-sm ${currentPage === 1 ? 'disabled' : ''}" ${currentPage == 1 ? 'disabled' : ''} id="all-invitations-prev-btn">Prev</button>
                    <button class="btn btn-dark btn-sm ${currentPage === totalPages ? 'disabled' : ''}" ${currentPage == totalPages ? 'disabled' : ''} id="all-invitations-next-btn">Next</button>
                  </div>
                </div>
            `);

          $('#all-invitations-prev-btn').on('click', function() {
            if (currentPage > 1) {
              fetchAllInvitations(currentPage - 1);
            }
          });

          $('#all-invitations-next-btn').on('click', function() {
            if (currentPage < totalPages) {
              fetchAllInvitations(currentPage + 1);
            }
          });

          const invitationsCheckIn = document.querySelector('#invitationModal #invitations-checkInBtn');
          invitationsCheckIn.addEventListener('click', function() {
            const invitationID = document.querySelector('#invitationModal #invitations-invitation-id');
            CheckIn(invitationID.value);

            if (currentPage < totalPages) {
              if (query !== null) {
                searchAllInvitations(query, currentPage + 1);
              } else {
                fetchAllInvitations(currentPage + 1);
              }

            }

            if (currentPage > 1) {
              if (query !== null) {
                searchAllInvitations(query, currentPage - 1);
              } else {
                fetchAllInvitations(currentPage - 1);
              }
            }
          });
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch all invitations:', error);
        }
      });
    };


    // Search API
    const searchGuests = (query, page = 1) => {
      const perPage = 20; // Items per page
      var invitations_type;

      $.ajax({
        // url: 'http://localhost:8080/backstage/api/invitations/guests-search', // Replace with your API endpoint
        url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/invitations/guests-search', // Replace with your API endpoint
        method: 'GET',
        data: {
          query,
          page,
          perPage
        }, // Pass pagination parameters
        dataType: 'json',
        success: function(response) {
          const tbody = $('#guests-invitations-table tbody');
          const pagination = $('#pagination-guests');
          tbody.empty(); // Clear existing rows
          pagination.empty(); // Clear pagination controls

          // Populate table rows
          response.data.forEach(invitation => {
            const tableRow = `
                            <tr>                                        
                              <td>
                                  <div class="d-flex ">                                    
                                    <img src="${getTitle(invitation.title)}" alt="" loading="lazy">
                                    &nbsp;&nbsp;
                                    <div class="ml-2">
                                      <h6 class="font-bold">${invitation.fullname}</h6>
                                      <p class="text-gray-600 text-ellipsis">${invitation.position}</p>
                                    </div>
                                  </div>
                              </td>
                              <td>
                                <h6>${invitation.institution}</h6>
                                <p>-</p>
                              </td>
                              <td>
                                <div class="badge badge-opacity-${getStatusBadge(invitation.status || 'unconfirmed')}">
                                    ${invitation.status || 'unconfirmed'}
                                </div>
                              </td>
                              <td>${getInvitationStatus(invitation.type)}</td>
                            </tr>`;
            tbody.append(tableRow);
          });

          // Generate Tailwind CSS-based pagination controls
          const {
            currentPage,
            totalPages,
            totalItems,
            perPage
          } = response.pagination;
          const startItem = (currentPage - 1) * perPage + 1;
          const endItem = Math.min(currentPage * perPage, totalItems);

          // Generate pagination controls
          pagination.append(`
                <div class="mt-auto d-flex flex-column align-items-center">
                  <span class="text-muted small"> Showing <span class="fw-semibold">${startItem}</span> to 
                  <span class="fw-semibold">${endItem}</span> of 
                  <span class="fw-semibold">${totalItems}</span> Entries </span>
                  <div class="btn-group mt-2">
                    <button class="btn btn-dark btn-sm ${currentPage === 1 ? 'disabled' : ''}" ${currentPage == 1 ? 'disabled' : ''} id="guests-invitations-prev-btn">Prev</button>
                    <button class="btn btn-dark btn-sm ${currentPage === totalPages ? 'disabled' : ''}" ${currentPage == totalPages ? 'disabled' : ''} id="guests-invitations-next-btn">Next</button>
                  </div>
                </div>
            `);

          $('#guests-invitations-prev-btn').on('click', function() {
            if (currentPage > 1) {
              fetchInvitationGuests(currentPage - 1);
            }
          });

          $('#guests-invitations-next-btn').on('click', function() {
            if (currentPage < totalPages) {
              fetchInvitationGuests(currentPage + 1);
            }
          });
        },
        error: function(xhr, status, error) {
          console.error('Failed to search invitations:', error);
        }
      });
    };

    const initializeManualCheckIn = () => {
      const registerAndCheckInButton = document.querySelector("#registerAndCheckInButton"); // Fix the typo here
      registerAndCheckInButton.addEventListener('click', function() {
        const fullname = $('#checkin-manual-fullname').val().trim();
        const position = $('#checkin-manual-position').val().trim();
        const company = $('#checkin-manual-institution').val().trim();

        if (!fullname || !position || !company) { // Check for empty fields
          alert('Please fill in all fields');
        } else {
          RegisterAndCheckIn(fullname, position, company);
        }
      });
    }




    // $(document).on('click', '#registerAndCheckInButton', function() {
    //   console.log('register and check-in button clicked');
    //   const fullname = $('#checkin-manual-fullname').val().trim();
    //   const position = $('#checkin-manual-position').val().trim();
    //   const company = $('#checkin-manual-institution').val().trim();

    //   if (fullname === null || position === null || company === null) {
    //     alert('Please fill in all fields');
    //   } else {
    //     RegisterAndCheckIn(fullname, position, company);
    //   }
    // });

    const getTitle = (title) => {
      switch (title) {
        case 'Bapak':
        case 'Mr':
          return '/assets/images/faces/man_icon.png';
        default:
          return '/assets/images/faces/women_icon.png';
      }
    }

    const getInvitationStatus = (title) => {
      if (title === null) {
        return 'unconfirmed';
      }

      return title;
    }

    // Helper function to determine badge style
    const getStatusBadge = (status) => {
      switch (status.toLowerCase()) {
        case 'attend':
          return 'success';
        case 'attend with guests':
          return 'info';
        case 'delegate':
          return 'warning';
        case 'inattend':
          return 'danger';
        default:
          return 'warning';
      }
    };

    $(document).ready(function() {
      // Initial call to update statistics
      updateStatistics();
      // Fetch activities on load
      fetchRecentActivities();
      // Fetch updated invitations on page load
      fetchUpdatedInvitations();


      // Set interval to refresh data every 3 minutes
      setInterval(updateStatistics, 180000); // 180000 ms = 3 minutes
      // Set interval to refresh activities every 3 minutes
      setInterval(fetchRecentActivities, 180000); // 180000 ms = 3 minutes
      // Set interval to refresh activities every 3 minutes
      setInterval(fetchUpdatedInvitations, 300000); // 300000 ms = 5 minutes

      // Add the new script here
      document.querySelectorAll('.nav-link').forEach(tab => {
        tab.addEventListener('click', function(event) {
          const contentTarget = this.getAttribute('data-content-target');
          const url = this.getAttribute('href');
          const id = this.getAttribute('id');

          if (contentTarget && url) {
            fetch(url)
              .then(response => {
                if (response.ok) {
                  return response.text();
                } else {
                  throw new Error('Failed to load content');
                }
              })
              .then(html => {
                document.querySelector(contentTarget).innerHTML = html;
                // Reinitialize functionality for the loaded content
                handleTabSwitch(id);
              })
              .catch(error => {
                console.error('Error loading content:', error);
                document.querySelector(contentTarget).innerHTML = `<p class="text-danger">Error loading content</p>`;
              });
          }
          event.preventDefault();
        });
      });

      // Add search functionality
      $(document).on('click', '#all-invitations-search-button', function() {
        console.log('search button clicked');
        const query = $('#all-invitations-search-input').val().trim();
        if (query !== '') {
          searchAllInvitations(query);
        } else {
          fetchAllInvitations();
        }
      });

      // Add search functionality
      $(document).on('click', '#guests-search-button', function() {
        console.log('search button clicked');
        const query = $('#guests-search-input').val().trim();
        if (query !== '') {
          searchGuests(query);
        } else {
          fetchInvitationGuests();
        }
      });

      // $(document).on('click', '#delegations-search-button', function() {
      //   console.log('search button clicked');
      //   const query = $('#guests-search-input').val().trim();
      //   if (query !== '') {
      //     searchDelegations(query);
      //   } else {
      //     fetchInvitationDelegation();
      //   }
      // });

      $(document).on('click', '#resetManualCheckInButton', function() {
        console.log('reset register and check-in button clicked');
        $('#checkin-manual-fullname').val('');
        $('#checkin-manual-position').val('');
        $('#checkin-manual-institution').val('');
      });
    });
  </script>
</body>

</html>