<?php
    require('connect.php');
    function getDepartement()
    {
        $now=date("Y-m-d");
        $req="SELECT departments.dept_name,employees.first_name,employees.last_name,departments.dept_no
            FROM departments 
            JOIN dept_manager 
            JOIN employees
            ON departments.dept_no = dept_manager.dept_no
            AND dept_manager.emp_no = employees.emp_no 
            WHERE dept_manager.to_date > '%s';";
        $req=sprintf($req,$now);
        $sql=mysqli_query(dbconnect(),$req);
        $result=[];
        while( $row=mysqli_fetch_assoc($sql) )
        {
            $result[]=$row;
        }
        return $result;
    }

    function getDepartementEmployees($id)
    {
        $req="SELECT employees.emp_no,employees.first_name,employees.last_name,employees.birth_date,employees.gender,employees.hire_date
        FROM employees 
        JOIN departments
        JOIN dept_emp
        ON dept_emp.emp_no = employees.emp_no
        WHERE dept_emp.dept_no = '%s';";
        $req=sprintf($req,$id);
        $sql=mysqli_query(dbconnect(),$req);
        $result=[];
        while( $row=mysqli_fetch_assoc($sql) )
        {
            $result[]=$row;
        }
        return $result;
    }

    function getFicheEmployee($id)
    {
        $req="SELECT employees.first_name,employees.last_name,employees.gender,
        salaries.salary,salaries.from_date,salaries.to_date,departments.dept_name
        FROM employees
        JOIN salaries
        JOIN departments
        JOIN dept_emp
        ON employees.emp_no = salaries.emp_no
        AND departments.dept_no = dept_emp.dept_no
        AND employees.emp_no = dept_emp.emp_no
        WHERE employees.emp_no = '%s';";
        $req=sprintf($req,$id);
        $sql=mysqli_query(dbconnect(),$req);
        $result=[];
        while( $row=mysqli_fetch_assoc($sql) )
        {
            $result[]=$row;
        }
        return $result;
    }
?>