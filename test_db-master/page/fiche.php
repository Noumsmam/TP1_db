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
        $salaire=$row['salary'];
        $to=$row['to_date'];
        $from=$row['from_date'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="col-8">
            <p><?php echo $first; ?> <?php echo $last ?></p>
            <table>
                <tr>
                    <th>Salary</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
                <tr>
                    <td><?php echo $salaire ?></td>
                    <td><?php echo $from ?></td>
                    <td><?php echo $to ?></td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>