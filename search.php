<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ajax_database";

$conn = new mysqli($servername, $username, $password, $database);

$search = $_POST['search'];

$sql = "SELECT * FROM database_table where emp_name like '%$search%' or emp_email like '%$search%' or emp_company like '%$search%' or emp_designation like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$response = "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["emp_name"]."</td>
                <td>".$row["emp_email"]."</td>
                <td>".$row["emp_company"]."</td>
                <td>".$row["emp_designation"]."</td>
                <td>
                <button class='btn-update' data-id=".$row["id"]." onclick='updateRow(this)'>Update</button>
                <button class='btn-delete' data-id=".$row["id"]." onclick='deleteRow(this)'>Delete</button>
                 </td>
            </tr>";
    echo $response;        
    }
} 

$conn->close();

?>