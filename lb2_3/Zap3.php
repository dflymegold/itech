 <?php
 include "connect.php";
 try
{
//	$pdo= new PDO('mysql:host=localhost;dbname=work_db;charset=utf8','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$FID_Projects1=$_GET['name3'];
	$date1=$_GET['name4'];
//	$sql = "
//SELECT description
//From work as w Join projects as p
//    On(w.FID_Projects=p.ID_Projects)
//WHERE p.name = 'Wordpress' and
//      TIME_END < '2021-06-06'";

     	$sql = "
            select projects.name as project_name,
            work.description
            from work inner join projects
            on projects.ID_Projects=work.FID_Projects
            where projects.name= 'Project1' and work.TIME_END < '2021-06-06'";



	$result=$pdo->prepare($sql);


		echo '<?xml version="1.0" encoding="utf8" ?>';
		echo "<root>";


	
	foreach($pdo->query($sql) as $row){
        echo "<row>".$row['project_name']."</row>";
		echo "<row>".$row['description']."</row>";
	}

		echo "</root>";
	
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

?>