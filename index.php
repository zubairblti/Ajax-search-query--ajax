<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Form with Input Fields and Table</h1>

    <div class="form-container">
        <input type="text" id="employee_name" placeholder="Employee Name" required>
        <input type="email" id="employee_email" placeholder="Employee Email" required>
        <input type="text" id="company" placeholder="Company" required>
        <input type="text" id="employee_designation" placeholder="Employee Designation" required>
        <button onclick="addRow()">Submit</button>
    </div>
    <div class="search-container">
        <input type="text" id="search_input" onkeyup="searchFunction()" placeholder="Search...">
    </div>
<p id="data-add"></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Employee Email</th>
                <th>Company</th>
                <th>Employee Designation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "ajax_database";
            
            $conn = new mysqli($servername, $username, $password, $database);
             $sql = "SELECT * FROM database_table";
             $result = $conn->query($sql); 
     if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){  ?>     
        <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["emp_name"]; ?></td>
        <td><?php echo $row["emp_email"]; ?></td>
        <td><?php echo $row["emp_company"]; ?></td>
        <td><?php echo $row["emp_designation"]; ?></td>
        <td>
            <button class="btn-update" data-id="<?php echo $row["id"]; ?>" onclick="updateRow(this)">Update</button>
            <button class="btn-delete" data-id="<?php echo $row["id"]; ?>" onclick="deleteRow(this)">Delete</button>
        </td>
        </tr>
            <?php 
        }
    }   
    ?>
        </tbody>
    </table>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="script.js"></script>
</body>
</html>