<?php
    include('../assets/inc/fonction.php');
    $idDept=$_GET['dept'];
    $emp=getDepartementEmployees($idDept);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
</head>
<body>
    <main>
        <div class="col-8 text-center mx-auto ">
            <table class="table table-striped border">
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Hire Date</th>
                </tr>
                <?php foreach($emp as $row) { ?>
                    <tr>
                        <td><?php echo $row['emp_no']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name'] ?></td>    
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['hire_date']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</body>
</html>