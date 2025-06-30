<?php
    include('../assets/inc/fonction.php');
    $idDept=$_GET['dept'];
    $emp=getDepartementEmployees($idDept);
    $dep=getDepartement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <form class="d-flex" role="search" action="../page/rechercher.php" method="post">
            <select name="numDept">
                <option value="0">Tous</option>
                <?php foreach($dep as $row) { ?>
                    <option value="<?php echo $row['dept_no'] ?>"><?php echo $row['dept_name'] ?></option>
                <?php } ?>
            </select>
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="min" placeholder="Age min">
            <input type="text" name="max" placeholder="Age max">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </form>
    </nav>
    <main>
        <div class="col-8 text-center mx-auto ">
            <table class="table table-striped border table-hover">
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Hire Date</th>
                    <th>Voir plus</th>
                </tr>
                <?php foreach($emp as $row) { ?>
                    <tr>
                        <td><?php echo $row['emp_no']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>    
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['hire_date']; ?></td>
                        <td><a href="fiche.php?id=<?php echo $row['emp_no']; ?>"><button class="btn btn-primary" >fiche</button></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</body>
</html>