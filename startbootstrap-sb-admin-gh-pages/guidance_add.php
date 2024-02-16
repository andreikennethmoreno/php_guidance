<?php
/* Database credentials. Assuming you are running MySQL
   server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'guidance');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    echo "Database connected successfully!";
}

// Escape user inputs for security
$victim_name = mysqli_real_escape_string($con, $_REQUEST['victim_name']);
$victim_birthdate = mysqli_real_escape_string($con, $_REQUEST['victim_birthdate']);
$victim_age = mysqli_real_escape_string($con, $_REQUEST['victim_age']);
$victim_sex = mysqli_real_escape_string($con, $_REQUEST['victim_sex']);
$victim_gryrsection = mysqli_real_escape_string($con, $_REQUEST['victim_gryrsection']);
$victim_adviser = mysqli_real_escape_string($con, $_REQUEST['victim_adviser']);
$victim_mother = mysqli_real_escape_string($con, $_REQUEST['victim_mother']);
$victim_father = mysqli_real_escape_string($con, $_REQUEST['victim_father']);
$victim_address = mysqli_real_escape_string($con, $_REQUEST['victim_address']);
$victim_father_contact = mysqli_real_escape_string($con, $_REQUEST['victim_father_contact']);
$victim_mother_contact = mysqli_real_escape_string($con, $_REQUEST['victim_mother_contact']);


$complain_name = mysqli_real_escape_string($con, $_REQUEST['complain_name']);
$relationship_to_victim = mysqli_real_escape_string($con, $_REQUEST['relationship_to_victim']);
$complain_address = mysqli_real_escape_string($con, $_REQUEST['complain_address']);
$complain_contact = mysqli_real_escape_string($con, $_REQUEST['complain_contact']);


$respondent_type = mysqli_real_escape_string($con, $_REQUEST['respondent_type']);
$type_info = mysqli_real_escape_string($con, $_REQUEST['type_info']);
$respondent_name = mysqli_real_escape_string($con, $_REQUEST['respondent_name']);
$respondent_age = mysqli_real_escape_string($con, $_REQUEST['respondent_age']);
$respondent_sex = mysqli_real_escape_string($con, $_REQUEST['respondent_sex']);
$respondent_address = mysqli_real_escape_string($con, $_REQUEST['respondent_address']);
$respondent_contact = mysqli_real_escape_string($con, $_REQUEST['respondent_contact']);
$details_case = mysqli_real_escape_string($con, $_REQUEST['details_case']);


// Attempt insert query execution
$sql = "INSERT INTO _case_reports (victim_name, victim_birthdate, victim_age, victim_sex, victim_gryrsection, victim_adviser, victim_mother, victim_father, victim_address, victim_father_contact, victim_mother_contact, complain_name, relationship_to_victim, complain_address, complain_contact, respondent_type, type_info, respondent_name, respondent_age, respondent_sex, respondent_address, respondent_contact, details_case)
VALUES ('$victim_name', '$victim_birthdate', '$victim_age', '$victim_sex', '$victim_gryrsection', '$victim_adviser', '$victim_mother', '$victim_father', '$victim_address', '$victim_father_contact', '$victim_mother_contact', '$complain_name', '$relationship_to_victim', '$complain_address', '$complain_contact', '$respondent_type', '$type_info', '$respondent_name', '$respondent_age', '$respondent_sex', '$respondent_address', '$respondent_contact', '$details_case')";




if (mysqli_query($con, $sql)) {
    header("Location: guidance_view.php");
    exit();

} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}






// Close connection
mysqli_close($con);
?>
