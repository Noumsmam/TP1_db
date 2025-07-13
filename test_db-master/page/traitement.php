<?php  
    $dept=$_GET['dept'];
    $page=$_GET['page'];
    header("Location:employees.php?dept=" . $dept . "&page=" . $page);
?>