<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "ajax_database";

$conn = new mysqli($servername, $username, $password, $database);

$id = $_POST['rowid'];
$sql = "DELETE FROM database_table where id = $id";

if ($conn->query($sql) === TRUE) {
    $response = "Record deleted successfully";
    echo $response;
} else {
    $response = "Error deleting record: ". $conn->error;
    echo $response;
}
?>