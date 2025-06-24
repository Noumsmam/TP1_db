<?php
    require('connect.php');
    function getDepartement()
    {
        $req="SELECT * FROM departments ;";
        $sql=mysqli_query(dbconnect(),$req);
        $result=[];
        while( $row=mysqli_fetch_array($sql) )
        {
            $result[]=$row;
        }
        return $result;
    }
?>