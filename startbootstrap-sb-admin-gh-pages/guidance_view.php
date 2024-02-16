<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'guidance');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Fetch alumni data
$sql = "SELECT * FROM _case_reports";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error: " . mysqli_error($con));
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
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
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
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Case List
                            </a>
                            <a class="nav-link" href="register.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
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

                        
                        
                        <h1 class="mt-4">Case List</h1>
                      
                     
                        <div class="card mb-4">
                            <div class="card-header">

                                <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#victimModal">Add Case</button>


                                
                            <!-- Add Victim Information Modal -->
                            <div class="modal fade" id="victimModal" tabindex="-1" role="dialog" aria-labelledby="victimModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="victimModalLabel">Add Case Report</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Victim Information Form -->
                                            <form action="guidance_add.php" method="get">
                                            <!-- First row -->
                                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Victim Info</h4>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="victim_name">Name</label>
                                                    <input type="text" class="form-control" id="victim_name" name="victim_name" required>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="victim_birthdate">Birthdate</label>
                                                    <input type="date" class="form-control" id="victim_birthdate" name="victim_birthdate" required>
                                                </div>
                                                </div>
                                                <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="victim_age">Age</label>
                                                    <input type="number" class="form-control" id="victim_age" name="victim_age" required>
                                                </div>
                                                </div>
                                                <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="victim_sex">Sex</label>
                                                    <select class="form-control" id="victim_sex" name="victim_sex" required>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Second row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="victim_gryrsection">Grade/Year Section</label>
                                                    <input type="text" class="form-control" id="victim_gryrsection" name="victim_gryrsection" required>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="victim_adviser">Adviser</label>
                                                    <input type="text" class="form-control" id="victim_adviser" name="victim_adviser" required>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="victim_address">Address</label>
                                                    <textarea class="form-control" id="victim_address" name="victim_address" rows="3" required></textarea>
                                                </div>
                                                </div>
                                            </div>

                                            <!-- Third row -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="victim_father">Father</label>
                                                    <input type="text" class="form-control" id="victim_father" name="victim_father" required>
                                                </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="victim_mother">Mother</label>
                                                    <input type="text" class="form-control" id="victim_mother" name="victim_mother" required>
                                                </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="victim_father_contact">Father Contact</label>
                                                    <input type="tel" class="form-control" id="victim_father_contact" name="victim_father_contact" required>
                                                </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="victim_mother_contact">Mother Contact Number</label>
                                                    <input type="tel" class="form-control" id="victim_mother_contact" name="victim_mother_contact" required>
                                                </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Complainant Info</h4>
                                                </div>
                                            </div>
                                            <br>

                                            <!-- Fourth row: Complainant Info -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="complain_name">Name</label>
                                                        <input type="text" class="form-control" id="complain_name" name="complain_name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="relationship_to_victim">Relationship to Victim</label>
                                                        <input type="text" class="form-control" id="relationship_to_victim" name="relationship_to_victim" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Fifth row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="complain_address">Address</label>
                                                        <textarea class="form-control" id="complain_address" name="complain_address" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="complain_contact">Contact</label>
                                                        <input type="tel" class="form-control" id="complain_contact" name="complain_contact" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Respondent Info</h4>
                                                </div>
                                            </div>
                                            <br>

                                            <!-- Sixth row -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <label for="respondent_type">Respondent Type</label>

                                                        <select class="form-control" id="respondent_type" name="respondent_type" required>
                                                            <option value="Student">Student</option>
                                                            <option value="School Personnel">School Personnel</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="type_info">If STUDENT indicate Grade, Year & Section </label>
                                                        <label for="type_info">If SCHOOL PERSONNEL indicate Job Position </label>

                                                        <input type="text" class="form-control" id="type_info" name="type_info" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Seventh row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="respondent_name">Name</label>
                                                        <input type="text" class="form-control" id="respondent_name" name="respondent_name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="respondent_age">Age</label>
                                                        <input type="number" class="form-control" id="respondent_age" name="respondent_age" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="respondent_sex"> Sex</label>
                                                        <select class="form-control" id="respondent_sex" name="respondent_sex" required>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Eighth row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="respondent_address">Address</label>
                                                        <textarea class="form-control" id="respondent_address" name="respondent_address" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="respondent_contact">Contact</label>
                                                        <input type="tel" class="form-control" id="respondent_contact" name="respondent_contact" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Details of the Case</h4>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="details_case"></label>
                                                        <textarea class="form-control" id="details_case" name="details_case" rows="10" required></textarea>
                                                    </div>
                                                </div>
                                            </div>



                                           
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Submit">
                                        </div>

                                            <!-- Add additional fields as needed -->
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>




                                
        
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            
                                            <th>Case ID</th>
                                            <th>Victim Name</th>
                                            <th>Complainant name</th>
                                            <th>Respondent name</th>
                                            <th>Case Description</th>
                                            <th>Edit</th>
                                            <th>Info</th>
                                            <th>Delete</th>


                                        </tr>
                                    </thead>
                                    
                                    <tbody>


                                
                                    <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $case_id =  $row['case_id'];
                                            $victim_name =  $row['victim_name'];
                                            $complain_name = $row['complain_name'];
                                            $respondent_name = $row['respondent_name'];
                                            $details_case = $row['details_case'];
                                      

                                            echo "
                                            
                                                <tr>
                                                <td>$case_id</td>
                                                <td>$victim_name</td>
                                                <td>$complain_name</td>
                                                <td>$respondent_name</td>
                                                <td>$details_case</td>

                                                            
                                                    <td>    


                                                    


                                                    <button type='button' class='btn btn-secondary ms-auto' data-bs-toggle='modal' data-bs-target='#editCaseModal'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                  </button>
                                                    </td>




                                                   


                                                    <td>    

                                                    <a href='view_more.php?case_id=$case_id' class='btn btn-warning' title='View More'>Info</a>

                                                    </td>

                                                    <td>
                                                    <!-- DELETE Button -->
                                                    <a href='guidance_delete.php?deleteid=$case_id>' class='btn btn-danger'><i class='fa-solid fa-trash-can'></i></a>


                                                    </td>


                                                

                                                        </tr>

                                                    
                                                        

                                                        <!-- Edit Student Modal -->
                                                        <div id='editCaseModal' class='modal fade' id='editCaseModal' tabindex='-1' role='dialog' aria-labelledby='editCaseModal' aria-hidden='true'>
                                                            <div class='modal-dialog modal-xl' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='editStudentModalLabel'>Edit Case</h5>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <form action='guidance_edit.php' method='get'>
                                                                            <div class='col-md-2'>
                                                                                <div class='form-group'>
                                                                                    <label >Case ID Identifier</label>
                                                                                    <input type='in' class='form-control' id='case_id' name='case_id' required>

                                                                                </div>
                                                                            </div>
                                                                            <div class='row'>
                                                                                <div class='col-md-12'>
                                                                                    <h4>Victim Info</h4>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class='row'>
                                                                                <div class='col-md-4'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_name'>Name</label>
                                                                                        <input type='text' class='form-control' id='victim_name' name='victim_name' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-4'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_birthdate'>Birthdate</label>
                                                                                        <input type='date' class='form-control' id='victim_birthdate' name='victim_birthdate' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-2'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_age'>Age</label>
                                                                                        <input type='number' class='form-control' id='victim_age' name='victim_age' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-2'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_sex'>Sex</label>
                                                                                        <select class='form-control' id='victim_sex' name='victim_sex' required>
                                                                                            <option value='male'>Male</option>
                                                                                            <option value='female'>Female</option>
                                                                                            <option value='other'>Other</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Second row -->
                                                                            <div class='row'>
                                                                                <div class='col-md-4'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_gryrsection'>Grade/Year Section</label>
                                                                                        <input type='text' class='form-control' id='victim_gryrsection' name='victim_gryrsection' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-4'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_adviser'>Adviser</label>
                                                                                        <input type='text' class='form-control' id='victim_adviser' name='victim_adviser' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-4'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_address'>Address</label>
                                                                                        <textarea class='form-control' id='victim_address' name='victim_address' rows='3' required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Third row -->
                                                                            <div class='row'>
                                                                                <div class='col-md-3'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_father'>Father</label>
                                                                                        <input type='text' class='form-control' id='victim_father' name='victim_father' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-3'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_mother'>Mother</label>
                                                                                        <input type='text' class='form-control' id='victim_mother' name='victim_mother' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-3'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_father_contact'>Father Contact Number</label>
                                                                                        <input type='tel' class='form-control' id='victim_father_contact' name='victim_father_contact' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-3'>
                                                                                    <div class='form-group'>
                                                                                        <label for='victim_mother_contact'> Mother Contact Number</label>
                                                                                        <input type='tel' class='form-control' id='victim_mother_contact' name='victim_mother_contact' required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <br>
                                                                            <div class='row'>
                                                                                <div class='col-md-12'>
                                                                                    <h4>Complainant Info</h4>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <!-- Fourth row: Complainant Info -->
                                                                            <div class='row'>
                                                                                <div class='col-md-6'>
                                                                                    <div class='form-group'>
                                                                                        <label for='complain_name'>Name</label>
                                                                                        <input type='text' class='form-control' id='complain_name' name='complain_name' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-4'>
                                                                                    <div class='form-group'>
                                                                                        <label for='relationship_to_victim'>Relationship to Victim</label>
                                                                                        <input type='text' class='form-control' id='relationship_to_victim' name='relationship_to_victim' required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Fifth row -->
                                                                            <div class='row'>
                                                                                <div class='col-md-6'>
                                                                                    <div class='form-group'>
                                                                                        <label for='complain_address'>Address</label>
                                                                                        <textarea class='form-control' id='complain_address' name='complain_address' rows='3' required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-3'>
                                                                                    <div class='form-group'>
                                                                                        <label for='complain_contact'>Contact</label>
                                                                                        <input type='tel' class='form-control' id='complain_contact' name='complain_contact' required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <br>
                                                                            <div class='row'>
                                                                                <div class='col-md-12'>
                                                                                    <h4>Respondent Info</h4>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <!-- Sixth row -->
                                                                            <div class='row'>
                                                                                <div class='col-md-3'>
                                                                                    <div class='form-group'>
                                                                                        <br>
                                                                                        <label for='respondent_type'>Respondent Type</label>
                                                                                        <select class='form-control' id='respondent_type' name='respondent_type' required>
                                                                                            <option value='Student'>Student</option>
                                                                                            <option value='School Personnel'>School Personnel</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-6'>
                                                                                    <div class='form-group'>
                                                                                        <label for='type_info'>If STUDENT indicate Grade, Year & Section </label>
                                                                                        <label for='type_info'>If SCHOOL PERSONNEL indicate Job Position </label>
                                                                                        <input type='text' class='form-control' id='type_info' name='type_info' required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Seventh row -->
                                                                            <div class='row'>
                                                                                <div class='col-md-4'>
                                                                                    <div class='form-group'>
                                                                                        <label for='respondent_name'>Name</label>
                                                                                        <input type='text' class='form-control' id='respondent_name' name='respondent_name' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-2'>
                                                                                    <div class='form-group'>
                                                                                        <label for='respondent_age'>Age</label>
                                                                                        <input type='number' class='form-control' id='respondent_age' name='respondent_age' required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-2'>
                                                                                    <div class='form-group'>
                                                                                        <label for='respondent_sex'>Sex</label>
                                                                                        <select class='form-control' id='respondent_sex' name='respondent_sex' required>
                                                                                            <option value='male'>Male</option>
                                                                                            <option value='female'>Female</option>
                                                                                            <option value='other'>Other</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Eighth row -->
                                                                            <div class='row'>
                                                                                <div class='col-md-6'>
                                                                                    <div class='form-group'>
                                                                                        <label for='respondent_address'>Address</label>
                                                                                        <textarea class='form-control' id='respondent_address' name='respondent_address' rows='3' required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='col-md-3'>
                                                                                    <div class='form-group'>
                                                                                        <label for='respondent_contact'>Contact</label>
                                                                                        <input type='tel' class='form-control' id='respondent_contact' name='respondent_contact' required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <br>
                                                                            <div class='row'>
                                                                                <div class='col-md-12'>
                                                                                    <h4>Details of the Case</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class='row'>
                                                                                <div class='col-md-6'>
                                                                                    <div class='form-group'>
                                                                                        <label for='details_case'></label>
                                                                                        <textarea class='form-control' id='details_case' name='details_case' rows='10' required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class='modal-footer'>
                                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button></a>
                                                                                <input type='submit' name='btnsubmit' id='btnsubmit' class='btn btn-primary' value='Submit'>
                                                                            </div>
                                                                            <!-- Add additional fields as needed -->
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    



                                                    
                                                    ";
                                      
                                        }
                                        ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>


               


                <






              



                                    
                                        



                                    
                                   
              





                

                
                
                
                


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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
