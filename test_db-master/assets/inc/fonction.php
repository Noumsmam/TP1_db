<?php
    require('connect.php');
    function getDepartement()
    {
        $req="SELECT departments.dept_name,employees.first_name,employees.last_name,departments.dept_no
            FROM departments 
            JOIN dept_manager 
            JOIN employees
            ON departments.dept_no = dept_manager.dept_no
            AND dept_manager.emp_no = employees.emp_no ;";
        $sql=mysqli_query(dbconnect(),$req);
        $result=[];
        while( $row=mysqli_fetch_assoc($sql) )
        {
            $result[]=$row;
        }
        return $result;
    }
?>