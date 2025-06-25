<?php
    include('../assets/inc/fonction.php');
    $id=$_GET['id'];
    $fiche=getFicheEmployee($id);
    $first;
    $last;
    $salaire;
    $from;
    $to;
    foreach($fiche as $row)
    {
        $first=$row['first_name'];
        $last=$row['last_name'];
        // $salaire=$row['salary'];
        // $to=$row['to_date'];
        // $from=$row['from_date'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <main>
        <div class="col-8">
            <h2><?php echo $first; ?> <?php echo $last ?></h2>
            <table class="table table-spired">
                <tr>
                    <th>Salary</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
                <?php foreach($fiche as $row) { ?>
                    <tr>
                        <td><?php echo $row['salary'] ?></td>
                        <td><?php echo $row['from_date']  ?></td>
                        <td><?php echo  $row['to_date'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <a href="liste_departement.php"><button class="btn btn-primary">retour</button></a>
    </main>
</body>
</html>