<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "ajax_database";

$conn = new mysqli($servername, $username, $password, $database);

$id = $_POST['newid'];
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$designation = $_POST['designation'];

$sql = "UPDATE database_table set emp_name='$name', emp_email='$email', emp_company='$company', emp_designation='$designation' where id='$id'";

if ($conn->query($sql) === TRUE) {
   $response = "Record Successfully Updated";
   echo $response;
} 
$conn->close();

?>