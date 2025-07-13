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
        $req="CREATE OR REPLACE VIEW v_emp_dept AS SELECT employees.emp_no,employees.first_name,employees.last_name,employees.birth_date,employees.gender,employees.hire_date
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
        $sql=mysqli_query(dbconnect(),$req);
        $result=[];
        while( $row=mysqli_fetch_assoc($sql) )
        {
            $result[]=$row;
        }
        return $result;
    }

    function rechercher($numDept, $nom, $min, $max, $page){
        $limit = $page * 20;
        $sql = "CREATE OR REPLACE VIEW v_recherche AS SELECT employees.*, TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) as Age FROM employees
                JOIN dept_emp ON employees.emp_no = dept_emp.emp_no
                WHERE 1=1 
                AND dept_no='%s'
                AND first_name LIKE '%s' 
                AND TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) > '%s' 
                AND TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) < '%s' LIMIT %s, 20;";
        $sql = sprintf($sql, $numDept, $nom, $min, $max, $limit);
        $requete = mysqli_query(dbconnect(), $sql);
        return $requete;
    }
?>