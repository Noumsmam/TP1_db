<?php
    require('connect.php');
    function getDepartement()
    {
        $now=date("Y-m-d");
        $req="CREATE OR REPLACE VIEW v_departement AS SELECT departments.dept_name,employees.first_name,employees.last_name,departments.dept_no
            FROM departments 
            JOIN dept_manager 
            JOIN employees
            ON departments.dept_no = dept_manager.dept_no
            AND dept_manager.emp_no = employees.emp_no 
            WHERE dept_manager.to_date > '%s' ORDER BY dept_name ASC;";
        $req=sprintf($req,$now);
        mysqli_query(dbconnect(),$req);

        $r="SELECT * FROM v_departement;";
        $query=mysqli_query(dbconnect(),$r);
        $result=[];
        while( $row=mysqli_fetch_assoc($query) )
        {
            $result[]=$row;
        }
        return $result;
    }

    function getDepartementEmployees($id,$page)
    {
        $limit=$page * 20;
        $req="CREATE OR REPLACE VIEW v_emp_dept AS SELECT employees.emp_no,employees.first_name,employees.last_name,employees.birth_date,employees.gender,employees.hire_date
        FROM employees 
        JOIN departments
        JOIN dept_emp
        ON dept_emp.emp_no = employees.emp_no
        WHERE dept_emp.dept_no = '%s'LIMIT %s,20;";
        $req=sprintf($req,$id,$limit);
        mysqli_query(dbconnect(),$req);
        $r="SELECT * FROM v_emp_dept;";
        $query=mysqli_query(dbconnect(),$r);
        $result=[];
        while( $row=mysqli_fetch_assoc($query) )
        {
            $result[]=$row;
        }
        return $result;
    }

    function getFicheEmployee($id)
    {
        $req="CREATE OR REPLACE VIEW v_fiche_emp AS SELECT employees.first_name,employees.last_name,employees.gender,
        salaries.salary,salaries.from_date,salaries.to_date,departments.dept_name
        FROM employees
        JOIN salaries
        JOIN departments
        JOIN dept_emp
        ON employees.emp_no = salaries.emp_no
        AND departments.dept_no = dept_emp.dept_no
        AND employees.emp_no = dept_emp.emp_no
        WHERE employees.emp_no = '%s' ;";
        $req=sprintf($req,$id);
        mysqli_query(dbconnect(),$req);
        $r="SELECT * FROM v_fiche_emp;";
        $query=mysqli_query(dbconnect(),$r);
        $result=[];
        while( $row=mysqli_fetch_assoc($query) )
        {
            $result[]=$row;
        }
        return $result;
    }

    function rechercher($numDept, $nom, $min, $max, $page)
    {
        $limit = $page * 20;
        $sql = "SELECT employees.*, TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) as Age
                FROM employees
                JOIN dept_emp ON employees.emp_no = dept_emp.emp_no
                WHERE 1=1 ";

        if (!empty($numDept) && $numDept != "0") {
            $sql .= "AND dept_emp.dept_no = '$numDept' ";
        }

        if (!empty($nom)) {
            $sql .= "AND employees.first_name LIKE '%$nom%' ";
        }

        if (!empty($min)) {
            $sql .= "AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) >= $min ";
        }

        if (!empty($max)) {
            $sql .= "AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) <= $max ";
        }

        $sql .= "LIMIT $limit, 20";

        $requete = mysqli_query(dbconnect(), $sql);
        return $requete;
    }
?>