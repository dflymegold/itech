<?php

    if (isset($_REQUEST['TaskInfo']) and isset($_REQUEST['date']))
        $Project = $_REQUEST['TaskInfo'];
        $Date = $_REQUEST['date'];
        include 'dbConnection.php';
        include 'printTable.php';
        include 'index.php';

        $query = "
            select worker.ID_Worker,
            projects.name as project_name,
            work.time_start,
            work.time_end,
            work.description
            from work inner join worker
            on work.FID_Worker=worker.ID_Worker
            inner join projects
            on projects.ID_Projects=work.FID_Projects
            where projects.name= :project and work.TIME_END < :date";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':project' => $Project, ':date' => $Date));

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        printTable($result);

        $pdo = null;

?>