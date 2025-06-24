<?php
    include('../assets/inc/fonction.php');
    $liste = getDepartement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.bundle.min.js">
</head>
<body>
    <main>
        <div class="container-fluid">
            <table>
                <tr>
                    <th>Departments</th>
                    <th>Manager</th>
                    <th>Bouton Action</th>
                </tr>
                <?php foreach($liste as $row) { ?>
                    <tr>
                        <td><?php echo $row[''] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</body>
</html>