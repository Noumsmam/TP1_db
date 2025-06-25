<?php
    include('../assets/inc/fonction.php');
    $liste = getDepartement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.bundle.min.js">
</head>
<body>
    <header>
        <a href="rechercher.php"><button>Recherche</button></a>
    </header>
    <main>
        <div class="col-8 text-center mx-auto ">
            <table class="table table-striped border">
                <tr>
                    <th>Departments</th>
                    <th>Manager</th>
                    <th>Bouton Action</th>
                </tr>
                <?php foreach($liste as $row) { ?>
                    <tr>
                        <td><?php echo $row['dept_name']; ?></td>
                        <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> </td>
                        <td><a href="employees.php?dept=<?php echo $row['dept_no']; ?>"><button class="btn btn-primary">See Employees</button></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</body>
</html>