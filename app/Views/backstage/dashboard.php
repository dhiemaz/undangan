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
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link href="https://cdn.datatables.net/v/bs4/dt-2.2.1/sl-3.0.0/datatables.min.css" rel="stylesheet">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  <style>    
    #scanner-container {
      margin: 20px auto;
      width: 80%;
      max-width: 500px;
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
            <h3 class="welcome-sub-text">Event summary report </h3>
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
          <p class="settings-heading">Sidebar Menu Theme</p>          
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>          
        </div>
      </div>      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-bg-options sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
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
                <li class="nav-item"><a class="nav-link" id="check-in" data-bs-toggle="tab" href="/backstage/dashboard/tabs/check_in" data-content-target="#overview" role="tab" aria-selected="false">Invitation check-in</a></li>
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
              <span class="menu-title">User Pages</span>
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
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>                                        
                                        <th>Fullname</th>
                                        <th>Position</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>                                      
                                    </tbody>
                                  </table>
                                  <nav>
                                    <ul class="pagination justify-content-center mt-3" id="pagination-updated-invitations"></ul>
                                  </nav>
                                </div>
                              </div>
                            </div>                            
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
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
                  </div>
                  <div id="scanner-container"></div>                
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
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
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/dashboard.js"></script>
  <script src="../../assets/js/Chart.roundedBarCharts.js"></script>
  <script src="https://unpkg.com/html5-qrcode/html5-qrcode.min.js"></script>

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
    const scanner = new Html5Qrcode("scanner-container");
    let currentCameraId;
    let isScannerStart = false;

    // Function to start scanning
    async function startScanning() {
      try {
        const devices = await Html5Qrcode.getCameras(); // Get list of available cameras
        if (devices && devices.length) {
          // Use the first camera in the list
          currentCameraId = devices[0].id;
          console.log("Using camera ID:", currentCameraId);

          // Start the QR code scanner with the selected camera
          await scanner.start(
            currentCameraId, // Pass the camera ID
            { fps: 10, qrbox: { width: 250, height: 250 } }, // Set scan options
            onScanSuccess,
            onScanError
          );
        } else {
          console.log("No cameras found.");
        }
      } catch (err) {
          console.error("Error starting scanner:", err);
      }
    }

    // Function to stop scanning
    function stopScanning() {
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


      console.log("Decoded result:", decodedResult);
      alert("Decoded result:", decodedResult.decodedText);
      // Optionally stop scanning after successful detection
      stopScanning();
    }

    function onScanError(errorMessage) {
      //console.warn("Scan error:", errorMessage);
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

      if (id === 'check-in') {
        const resultContainer = document.getElementById("InputFullname");
        const resetButton = document.getElementById("reset"); 

        resetButton.addEventListener("click", startScanning);
        isScannerStart = true;            
        startScanning();
      }        
    }

    // Attach event listeners to buttons
    //startButton.addEventListener("click", startScanning);
    //stopButton.addEventListener("click", stopScanning);

    // Function to fetch and update statistics
    function updateStatistics() {
            $.ajax({
                url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getSummaryCount', // Replace with your API endpoint
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    // Update the statistics in the DOM
                    $('#total-invitation').text(response.total_invitations);
                    $('#total-invitation-chart').text(response.total_invitations);
                    $('#total-confirmed-chart').text(response.total_confirmed);
                    $('#attend-count').text(response.attend);
                    $('#attend-with-guests-count').text(response.attend_with_guests);
                    $('#delegate-count').text(response.delegates);
                    $('#inattend-count').text(response.inattend);
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch statistics:', error);
                }
            });
        }

        function fetchRecentActivities() {
            $.ajax({
                url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getRecentActivities', // Replace with your API endpoint
                method: 'GET',
                dataType: 'json',
                success: function (response) {
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
                error: function (xhr, status, error) {
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
            const perPage = 5; // Items per page

            $.ajax({
                url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getUpdatedInvitations', // Replace with your API endpoint
                method: 'GET',
                data: { page, perPage }, // Pass pagination parameters
                dataType: 'json',
                success: function (response) {
                    const tbody = $('.select-table tbody');
                    const pagination = $('#pagination-updated-invitations');
                    tbody.empty(); // Clear existing rows
                    pagination.empty(); // Clear pagination controls

                    // Populate table rows
                    response.data.forEach(invitation => {
                        const tableRow = `
                            <tr>
                                <td>${invitation.fullname}</td>
                                <td>${invitation.position}</td>
                                <td>${invitation.institution}</td>
                                <td>
                                    <div class="badge badge-opacity-${getStatusBadge(invitation.status)}">
                                        ${invitation.status}
                                    </div>
                                </td>
                            </tr>`;
                        tbody.append(tableRow);
                    });

                    // Generate pagination controls
                    for (let i = 1; i <= response.pagination.totalPages; i++) {
                        pagination.append(`
                            <li class="page-item ${i === response.pagination.currentPage ? 'active' : ''}">
                                <a class="page-link" href="#">${i}</a>
                            </li>
                        `);
                    }

                    // Add click event for pagination links
                    $('.page-link').on('click', function (e) {
                        e.preventDefault();
                        const page = $(this).text();
                        fetchUpdatedInvitations(page);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch updated invitations:', error);
                }
            });
        };

        

      // Function to fetch updated invitations
      const fetchAllInvitations = (page = 1) => {
            const perPage = 20; // Items per page

            $.ajax({
                url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getAllInvitations', // Replace with your API endpoint
                method: 'GET',
                data: { page, perPage }, // Pass pagination parameters
                dataType: 'json',
                success: function (response) {
                    const tbody = $('.table-hover tbody');
                    const pagination = $('#pagination-invitations');
                    tbody.empty(); // Clear existing rows
                    pagination.empty(); // Clear pagination controls

                    console.log(response);

                    // Populate table rows
                    response.data.forEach(invitation => {
                        const tableRow = `
                            <tr>
                                <td>${invitation.fullname}</td>
                                <td>${invitation.position}</td>
                                <td>${invitation.institution}</td>
                                <td>
                                    <div class="badge badge-opacity-${getStatusBadge(invitation.status || 'unconfirmed')}">
                                      ${invitation.status || 'unconfirmed'}
                                    </div>
                                </td>
                            </tr>`;
                        tbody.append(tableRow);
                    });

                    // Generate pagination controls
                    for (let i = 1; i <= response.pagination.totalPages; i++) {
                        pagination.append(`
                            <li class="page-item ${i === response.pagination.currentPage ? 'active' : ''}">
                                <a class="page-link" href="#">${i}</a>
                            </li>
                        `);
                    }

                    // Add click event for pagination links
                    $('.page-link').on('click', function (e) {
                        e.preventDefault();
                        const page = $(this).text();
                        fetchAllInvitations(page);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch updated invitations:', error);
                }
            });
        };

        const fetchInvitationGuests = (page = 1) => {
            const perPage = 20; // Items per page

            $.ajax({
                url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getInvitationGuests', // Replace with your API endpoint
                method: 'GET',
                data: { page, perPage }, // Pass pagination parameters
                dataType: 'json',
                success: function (response) {
                    const tbody = $('.table-hover tbody');
                    const pagination = $('#pagination-guests');
                    tbody.empty(); // Clear existing rows
                    pagination.empty(); // Clear pagination controls

                    console.log(response);

                    // Populate table rows
                    response.data.forEach(invitation => {
                        const tableRow = `
                            <tr>
                                <td>${invitation.fullname}</td>
                                <td>${invitation.position}</td>
                                <td>${invitation.attendee_name}</td>                                
                            </tr>`;
                        tbody.append(tableRow);
                    });

                    // Generate pagination controls
                    for (let i = 1; i <= response.pagination.totalPages; i++) {
                        pagination.append(`
                            <li class="page-item ${i === response.pagination.currentPage ? 'active' : ''}">
                                <a class="page-link" href="#">${i}</a>
                            </li>
                        `);
                    }

                    // Add click event for pagination links
                    $('.page-link').on('click', function (e) {
                        e.preventDefault();
                        const page = $(this).text();
                        fetchInvitationGuests(page);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch updated invitations:', error);
                }
            });
        };

        const fetchInvitationDelegation = (page = 1) => {
            const perPage = 20; // Items per page

            $.ajax({
                url: 'https://brimicrofinanceoutlook.id/bri-microfinance-2025/backstage/api/getInvitationDelegation', // Replace with your API endpoint
                method: 'GET',
                data: { page, perPage }, // Pass pagination parameters
                dataType: 'json',
                success: function (response) {
                    const tbody = $('.table-hover tbody');
                    const pagination = $('#pagination-delegations');
                    tbody.empty(); // Clear existing rows
                    pagination.empty(); // Clear pagination controls

                    console.log(response);

                    // Populate table rows
                    response.data.forEach(invitation => {
                        const tableRow = `
                            <tr>
                                <td>${invitation.fullname}</td>
                                <td>${invitation.position}</td>
                                <td>${invitation.attendee_name}</td>                                
                            </tr>`;
                        tbody.append(tableRow);
                    });

                    // Generate pagination controls
                    for (let i = 1; i <= response.pagination.totalPages; i++) {
                        pagination.append(`
                            <li class="page-item ${i === response.pagination.currentPage ? 'active' : ''}">
                                <a class="page-link" href="#">${i}</a>
                            </li>
                        `);
                    }

                    // Add click event for pagination links
                    $('.page-link').on('click', function (e) {
                        e.preventDefault();
                        const page = $(this).text();
                        fetchInvitationDelegation(page);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch updated invitations:', error);
                }
            });
        };

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


    $(document).ready(function () {
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
            tab.addEventListener('click', function (event) {
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
    });
</script>
</body>

</html> 