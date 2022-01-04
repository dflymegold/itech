<?php
    if (isset($_REQUEST['ProjectTime']))

        $Project = $_REQUEST['ProjectTime'];
        include 'printTable.php';

        include 'dbConnection.php';
        include 'index.php';

        $query = "
            select b.name as project_name,            
            Sum(TIMESTAMPDIFF(MINUTE, time_start, time_end)/60) as work_hours 
            from work as a
            inner join projects as b 
            on a.FID_Projects = b.ID_Projects 
            where b.name = :project";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':project' => $Project));

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        printTable($result);

        $pdo = null;

?>