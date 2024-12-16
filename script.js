// Insert Function 
function addRow() {
    let employee_name = document.getElementById("employee_name").value;
    let employee_email = document.getElementById("employee_email").value;
    let company = document.getElementById("company").value;
    let employee_designation = document.getElementById("employee_designation").value;

    if (!employee_name || !employee_email || !company || !employee_designation) {
        alert("All fields are required. Please fill out all fields.");
        return;
    }

    $.ajax({
        url: "add.php",
        type: "POST",
        data: {
            name: employee_name,
            email: employee_email,
            company: company,
            designation: employee_designation
        },
        success: function (response) {
            let newid = response;
            let newtable = document.getElementById("table-body");

            let newrow = document.createElement("tr");
            newrow.innerHTML = `
            <td>${newid}</td>
            <td>${employee_name}</td>
            <td>${employee_email}</td>
            <td>${company}</td>
            <td>${employee_designation}</td>
            <td>
            <button class="btn-update" data-id="${newid}" onclick="updateRow(this)">Update</button>
            <button class="btn-delete" data-id="${newid}" onclick="deleteRow(this)">Delete</button>
            </td>`;
            newtable.appendChild(newrow);

            document.getElementById("employee_name").value = '';
            document.getElementById("employee_email").value = '';
            document.getElementById("company").value = '';
            document.getElementById("employee_designation").value = '';
        }
    });
}
// Delete Function 
function deleteRow(button) {
    let check = confirm("Are you sure you want to delete this row?");
    if (check == true) {
        let id = button.getAttribute("data-id");

        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                rowid: id,
            },
            success: function (response) {
                alert(response);

                let row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
        });
    }
}
// Update Function 
function updateRow(button){
    let id = button.getAttribute("data-id");
    let row = button.parentNode.parentNode;

    let employee_name = row.cells[1].innerHTML;
    let employee_email = row.cells[2].innerHTML;
    let employee_company = row.cells[3].innerHTML;
    let employee_designation = row.cells[4].innerHTML;

    let new_emp_name = prompt("Enter employee name", employee_name);
    let new_emp_email = prompt("Enter employee email", employee_email);
    
    let new_emp_company = prompt("Enter employee company", employee_company);
    let new_emp_designation = prompt("Enter employee designation", employee_designation);
    
    if (new_emp_name && new_emp_email && new_emp_company && new_emp_designation) {
        
    $.ajax({
        url: "update.php",
        type: "POST",
        data: {
            newid: id,
            name: new_emp_name,
            email: new_emp_email,
            company: new_emp_company,
            designation: new_emp_designation
        },
        success: function(response){
           row.cells[1].innerHTML = new_emp_name;
           row.cells[2].innerHTML = new_emp_email;
           row.cells[3].innerHTML = new_emp_company;
           row.cells[4].innerHTML = new_emp_designation;
           alert(response);
        }
    });
    }else{
        alert("All fields are required. Please fill out all fields.");
    }
}

// Search Query Function 
function searchFunction(){
    let search_query = document.getElementById("search_input").value;
    
    $.ajax({
        url: "search.php",
        type: "POST",
        data: {
            search: search_query
        },
        success: function(response){
            document.getElementById("table-body").innerHTML = response;
        }
    });
}