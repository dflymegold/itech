<?php

    if (isset($_REQUEST['EmployeeNumber']))
        $Chief = $_REQUEST['EmployeeNumber'];
        include 'dbConnection.php';
        include 'index.php';
        include 'printTable.php';

        $query = "
                select ID_DEPARTMENT,
                CHIEF as chief_name,
                count(ID_Worker) as workers_number
                from worker as b
                inner join department as a
                on a.ID_Department = b.FID_Department
                where CHIEF= :chief";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':chief' => $Chief));

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        printTable($result);

        $pdo = null;

?>