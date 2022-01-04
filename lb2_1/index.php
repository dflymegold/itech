<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title>Гаршанов lb2.1</title>
    <link href="index.css" rel="stylesheet"/>
</head>
<body>

<?php
    include 'dbConnection.php';
?>


<div class="row">

    <div class="column">
        <div class="card">
            <h3>Информация о выполненных задачах по проекту на указанную дату</h3>
            <form action="handler1.php" method="post">
                <select name="TaskInfo" id="TaskInfo">
                    <?php
                        $stmt = $pdo->query("select NAME from projects");
                        $result = $stmt->fetchAll();
                        foreach ($result as $key => $value) {
                            echo "<option value=\"$value[0]\">$value[0]</option>";
                        }
                    ?>
                </select>
                <input type="date" name="date" id="date">
                <input type="submit" value="Отобразить">
            </form>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h3>Общее время работы над проектом</h3>
            <form action="handler2.php" method="post">
                <select name="ProjectTime" id="ProjectTime">
                    <?php
                        $stmt = $pdo->query("select NAME from projects");
                        $result = $stmt->fetchAll();
                        foreach ($result as $key => $value) {
                            echo "<option value=\"$value[0]\">$value[0]</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Отобразить">
            </form>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h3>Число сотрудников отдела руководителя</h3>
            <form action="handler3.php" method="post">
                <select name="EmployeeNumber" id="EmployeeNumber">
                    <?php
                        $stmt = $pdo->query("select CHIEF from department    ");
                        $result = $stmt->fetchAll();
                        foreach ($result as $key => $value) {
                            echo "<option value = \"$value[0]\">$value[0]</option>";
                        }
                    ?>
                </select>
                <br><input type="submit" value="Отобразить">
            </form>
        </div>
    </div>
</div>

<br><br><br>


</body>
</html>