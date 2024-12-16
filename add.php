<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ajax_database";

$conn = new mysqli($servername, $username, $password, $database);
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$designation = $_POST['designation'];


$sql = "INSERT INTO database_table (emp_name, emp_email, emp_company, emp_designation) VALUES ('$name', '$email', '$company', '$designation')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $response =  $last_id;
    echo $response;
} else {
    $response = "Error: ". $sql . "<br>". $conn->error;
    echo $response;
}

$conn->close();
?>