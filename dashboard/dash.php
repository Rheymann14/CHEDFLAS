<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/icon.png" />
</head>

<body style="background-color: #dddce1;">
  <div style="background-color: #0c2245; height: 50px; width: 100%; position: absolute;">
    
    <h3 style="color: #fff; margin-top: 9px; text-align: center;">DASHBOARD</h3>
  </div>
<?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $dbname = 'chedflasusers';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully<br>';
         $sql = 'SELECT COUNT(`school_id`) FROM users WHERE`usertype`="Supervisor"';
         $result = mysqli_query($conn, $sql);

$sql2 = 'SELECT COUNT(`school_id`) FROM users WHERE`usertype`="School"';
         $result2 = mysqli_query($conn, $sql2);



        $sql3 = 'SELECT COUNT(`school_id`) FROM users where `city`="Zamboanga City"';
         $result3 = mysqli_query($conn, $sql3);

        $sql4 = 'SELECT COUNT(`school_id`) FROM users where `city`="Lamitan City"';
         $result4 = mysqli_query($conn, $sql4);

         $sql5 = 'SELECT COUNT(`school_id`) FROM users where `city`="Isabela City"';
         $result5 = mysqli_query($conn, $sql5);

         $sql6 = 'SELECT COUNT(`school_id`) FROM users where `city`="Dipolog City"';
         $result6 = mysqli_query($conn, $sql6);


         $sql7 = 'SELECT COUNT(`school_id`) FROM users where `city`="Dapitan City"';
         $result7 = mysqli_query($conn, $sql7);


         $sql8 = 'SELECT COUNT(`school_id`) FROM users where `city`="Pagadian City"';
         $result8 = mysqli_query($conn, $sql8);



 if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              //echo "Name: " . $row["COUNT(`school_id`)"]. "<br>";
               $ccc=$row["COUNT(`school_id`)"];
            }
         } else {
            echo "0 results";
         }








         if (mysqli_num_rows($result2) > 0) {
            while($row2 = mysqli_fetch_assoc($result2)) {
               //echo "Name: " . $row2["COUNT(`school_id`)"]. "<br>";
               $ccc2=$row2["COUNT(`school_id`)"];
            }
         } else {
            echo "0 results";
         }

 if (mysqli_num_rows($result3) > 0) {
            while($row3 = mysqli_fetch_assoc($result3)) {
               //echo "Name: " . $row2["COUNT(`school_id`)"]. "<br>";
               $ccc3=$row3["COUNT(`school_id`)"];
            }
         } else {
            echo "0 results";
         }


if (mysqli_num_rows($result4) > 0) {
            while($row4 = mysqli_fetch_assoc($result4)) {
               //echo "Name: " . $row2["COUNT(`school_id`)"]. "<br>";
               $ccc4=$row4["COUNT(`school_id`)"];
            }
         } else {
            echo "0 results";
         }

if (mysqli_num_rows($result5) > 0) {
            while($row5 = mysqli_fetch_assoc($result5)) {
               //echo "Name: " . $row2["COUNT(`school_id`)"]. "<br>";
               $ccc5=$row5["COUNT(`school_id`)"];
            }
         } else {
            echo "0 results";
         }


if (mysqli_num_rows($result6) > 0) {
            while($row6 = mysqli_fetch_assoc($result6)) {
               //echo "Name: " . $row2["COUNT(`school_id`)"]. "<br>";
               $ccc6=$row6["COUNT(`school_id`)"];
            }
         } else {
            echo "0 results";
         }


if (mysqli_num_rows($result7) > 0) {
            while($row7 = mysqli_fetch_assoc($result7)) {
               //echo "Name: " . $row2["COUNT(`school_id`)"]. "<br>";
               $ccc7=$row7["COUNT(`school_id`)"];
            }
         } else {
            echo "0 results";
         }


if (mysqli_num_rows($result8) > 0) {
            while($row8 = mysqli_fetch_assoc($result8)) {
               //echo "Name: " . $row2["COUNT(`school_id`)"]. "<br>";
               $ccc8=$row8["COUNT(`school_id`)"];
            }
         } else {
            echo "0 results";
         }






         mysqli_close($conn);
      ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->

      <nav class="sidebar" id="sidebar" style="width: 125px;">
 
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" >
        
          <div class="row"> 
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Admin</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">2</h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Supervisor</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $ccc;?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">School</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $ccc2;?></h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                 
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Space</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">400GB</h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                 
                </div>
              </div>
            </div>
          </div>

          
          <div class="row">
          
       
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Detailed Reports</p>
                  <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                      <div class="ml-xl-4">
                        <h1>32</h1>
                        <h3 class="font-weight-light mb-xl-4">Registered</h3>
                        <p class="text-muted mb-2 mb-xl-0">The total number of registered accounts</p>
                      </div>  
                    </div>
                    <div class="col-md-12 col-xl-9">
                      <div class="row">
                        <div class="col-md-6 mt-3 col-xl-5">
                          <canvas id="north-america-chart"></canvas>
                           <div id="north-america-legend"></div>
                        </div>
                        <div class="col-md-6 col-xl-7">
                          <div class="table-responsive mb-3 mb-md-0">
                            <table class="table table-borderless report-table">
                              <tr>
                                <td class="text-muted">Zamboanga</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $ccc3."%";?>" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $ccc3;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Lamitan</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $ccc4."%";?>" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $ccc4;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Isabela</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $ccc5."%";?>" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $ccc5;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Dipolog</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $ccc6."%";?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $ccc6;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Dapitan</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $ccc7."%";?>" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $ccc7;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Pagadian</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $ccc8."%";?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $ccc8;?></h5></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
 
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

