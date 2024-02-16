<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'guidance');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Ensure the 'id' parameter is set in the URL
if (isset($_GET['case_id'])) {
    // Get the value of 'id' from the URL
    $case_id = $_GET['case_id'];
} else {
}



if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Alumni Tracker</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            

            <div class="d-flex align-items-center">
                <div class="text-center">
                    <img src="national university.png" alt="NU Logo" height="50" width="auto" class="mx-auto">
                </div>
                
                <a class="navbar-brand ps-3">Case Report</a>
            </div>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars" style="color: yellow;"></i>
            </button>           
            
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="guidance_view.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Caselist
                            </a>

                            <a class="nav-link" href="register.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Add User
                            </a>

                   
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>

                            <a class="nav-link" href="login.html">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Log Out
                            </a>
                            
                        </div>
                    </div>
                  
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Case Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">More Info</li>
                        </ol>
                        
                        <?php
                        $sql = "SELECT * FROM _case_reports WHERE case_id = '$case_id'";
                        $result = mysqli_query($con, $sql);

                        
                            if (!$result) {
                                die("Error: " . mysqli_error($con));
                            }



                        while ($row = mysqli_fetch_assoc($result)) {
                            $case_id = $row['case_id'];

                            $victim_name = $row['victim_name'];
                            $victim_birthdate = $row['victim_birthdate'];
                            $victim_age = $row['victim_age'];
                            $victim_sex = $row['victim_sex'];
                            
                            $victim_gryrsection = $row['victim_gryrsection'];
                            $victim_adviser = $row['victim_adviser'];
                            $victim_address = $row['victim_address'];
                            
                            $victim_mother = $row['victim_mother'];
                            $victim_father = $row['victim_father'];
                            $victim_father_contact = $row['victim_father_contact'];
                            $victim_mother_contact = $row['victim_mother_contact'];
                            
                            $complain_name = $row['complain_name'];
                            $relationship_to_victim = $row['relationship_to_victim'];
                            $complain_address = $row['complain_address'];
                            $complain_contact = $row['complain_contact'];
                            
                            $respondent_type = $row['respondent_type'];
                            $type_info = $row['type_info'];
                            
                            $respondent_name = $row['respondent_name'];
                            $respondent_age = $row['respondent_age'];
                            $respondent_sex = $row['respondent_sex'];
                            
                            $respondent_address = $row['respondent_address'];
                            $respondent_contact = $row['respondent_contact'];
                            
                            $details_case = $row['details_case'];
                            
                        
                                            
                               
                    
                            }
                            ?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Data</title>
</head>
<body>

    <!-- First row -->
    <div class="row">
        <div class="col-md-12">
            <br>
            <p>Case ID: <?php echo $case_id; ?></p>
            <br>
        </div>
    </div>

    <h4>Victim Info</h4>

    <!-- Second row -->
    <div class="row">
        <div class="col-md-3">
            <br>
            <p>Name:</p>
            <p><?php echo $victim_name; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Birthdate:</p>
            <p><?php echo $victim_birthdate; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Age:</p>
            <p><?php echo $victim_age; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Sex:</p>
            <p><?php echo $victim_sex; ?></p>
            <br>
        </div>
    </div>

    <!-- Third row -->
    <div class="row">
        <div class="col-md-3">
            <br>
            <p>Grade/Year Section:</p>
            <p><?php echo $victim_gryrsection; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Adviser:</p>
            <p><?php echo $victim_adviser; ?></p>
            <br>
        </div>
        <div class="col-md-6">
            <br>
            <p>Address:</p>
            <p><?php echo $victim_address; ?></p>
            <br>
        </div>
    </div>

    <!-- Fourth row -->
    <div class="row">
        <div class="col-md-3">
            <br>
            <p>Mother:</p>
            <p><?php echo $victim_mother; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Father:</p>
            <p><?php echo $victim_father; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Father Contact:</p>
            <p><?php echo $victim_father_contact; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Mother Contact:</p>
            <p><?php echo $victim_mother_contact; ?></p>
            <br>
        </div>
    </div>

    <h4>Complainant Info</h4>

    <!-- Fifth row -->
    <div class="row">
        <div class="col-md-3">
            <br>
            <p>Name:</p>
            <p><?php echo $complain_name; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Relationship to Victim:</p>
            <p><?php echo $relationship_to_victim; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Address:</p>
            <p><?php echo $complain_address; ?></p>
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <p>Contact:</p>
            <p><?php echo $complain_contact; ?></p>
            <br>
        </div>
    </div>

    <h4>Respondent Info</h4>

    <!-- Seventh row -->
    <div class="row">
        <div class="col-md-6">
            <br>
            <p>Respondent Type:</p>
            <p><?php echo $respondent_type; ?></p>
            <br>
        </div>
        <div class="col-md-6">
            <br>
            <p>Type Info:</p>
            <p><?php echo $type_info; ?></p>
            <br>
        </div>
    </div>

    <!-- Eighth row -->
    <div class="row">
        <div class="col-md-4">
            <br>
            <p>Name:</p>
            <p><?php echo $respondent_name; ?></p>
            <br>
        </div>
        <div class="col-md-4">
            <br>
            <p>Age:</p>
            <p><?php echo $respondent_age; ?></p>
            <br>
        </div>
        <div class="col-md-4">
            <br>
            <p>Sex:</p>
            <p><?php echo $respondent_sex; ?></p>
            <br>
        </div>
    </div>

    <!-- Ninth row -->
    <div class="row">
        <div class="col-md-6">
            <br>
            <p>Address:</p>
            <p><?php echo $respondent_address; ?></p>
            <br>
        </div>
        <div class="col-md-6">
            <br>
            <p>Contact:</p>
            <p><?php echo $respondent_contact; ?></p>
            <br>
        </div>
    </div>

    <h4>Details of the Case </h4>

    <!-- Tenth row -->

    

    <div class="row">
        <div class="col-md-12">
            <br>
            <p><?php echo $details_case; ?></p>
            <br>
        </div>
    </div>


    <a href="guidance_view.php"><button type="button" class="btn btn-primary ms-auto" >Back to Case List</button></a>



</body>
</html>






                       
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

