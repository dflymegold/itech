 <?php
 include "connect.php";
 try
{

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(empty($_POST['name2']))exit("Поле не заполнено");
	$ID_Projects=$_POST['name2'];


	$sql = "
SELECT Sum(TIMESTAMPDIFF(MINUTE, time_start, time_end)/60) as work_hours
FROM work w JOIN projects p
    On (w.FID_Projects=p.ID_Projects)
WHERE p.name=:ID_Projects";
	$result=$pdo->prepare($sql);
	$result->execute(['ID_Projects'=>$ID_Projects]);

	while ($row=$result->fetch(PDO::FETCH_BOTH))
	{
		echo json_encode($row[0]);
	}
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>


<?php
//try
//{
//include "connect.php";
//
//$Project = $_REQUEST['ProjectTime'];
//
//$query = "
//            select b.name as project_name,
//            Sum(TIMESTAMPDIFF(MINUTE, time_start, time_end)/60) as work_hours
//            from work as a
//            inner join projects as b
//            on a.FID_Projects = b.ID_Projects
//            where b.name = :project";
//$stmt = $pdo->prepare($query);
//$stmt->execute(array(':project' => $Project));
//
//$result = $stmt->fetchAll(PDO::FETCH_OBJ);
//
//	while ($row=$result->fetch(PDO::FETCH_BOTH))
//	{
//		echo json_encode($row[0]);
//	}
//
//
//$pdo = null;
//}
//catch(PDOException $e)
//{
//	echo $e->getMessage();
//}
//
//?>