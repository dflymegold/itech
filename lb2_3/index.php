<?php
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>lab3</title>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="index.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>

<div class="row">

    <div class="column">
        <div class="card">
            <h3>Информация о выполненных задачах по проекту на указанную дату</h3>
            <div class="Zapros3">
                <select name="name3" id="name3" class="z3">
                    <?php
                    try {
                        $result = $pdo->query('SELECT name FROM projects');
                        while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                            $lite = $row[0];
                            print"<option value='$lite'>$lite</option>";
                        }
                    } catch (Exception $e) {
                        print("Error");
                    }
                    ?>
                </select>
                <input class="dateForm" type="date" name="name4" id="name4" value="2021-01-01">
                <input class="Form3_Zapros" type="submit" onclick="getProject();" name="Получить">
                <script>
                    function getProject() {
                        var zapros2_2 = $('select.z3').val();
                        var zapros3_3 = $('select.dateForm').val();
                        $.ajax({
                            converters: {
                                "text xml": function (data) {
                                    return data
                                }
                            },
                            type: "GET",
                            url: "Zap3.php",
                            data: {name3: zapros2_2, name4: zapros3_3},
                            success: function (result) {
                                $('#result2').html('');
                                $(result).find('row').each(function () {
                                    $('#result2').append($(this).text() + '</br>');

                                    console.log(result);
                                });


                            }
                        });
                    }
                </script>
            </div>
            <div id="result2"></div>

        </div>
    </div>

    <div class="column">
        <div class="card">
            <h3>Общее время работы над проектом</h3>
            <div class="Zapros2">
                <select name="name2" class="z2">
                    <?php
                    try {
                        $result = $pdo->query('SELECT name FROM projects');
                        while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                            $lite = $row[0];
                            print"<option value='$lite'>$lite</option>";
                        }
                    } catch (Exception $e) {
                        print("Error");
                    }
                    ?>
                </select>
                <input class="Form2_Zapros" type="submit" name="Получить">
            </div>
            <script>
                $(document).ready(function () {
                    $('input.Form2_Zapros').on('click', function () {
                        var zapros2_2 = $('select.z2').val();

                        $.ajax({
                            method: "POST",
                            url: "Zap2.php",
                            asyn: true,
                            dataType: 'json',
                            data: {name2: zapros2_2},
                            success: function (data) {
                                data = JSON.parse(data);
                                alert(data);
                            }
                        })

                    });
                });
            </script>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h3>Число сотрудников отдела руководителя</h3>

            <div class="Zapros1">
                <select name="name1" class="z1">
                    <?php
                    try {
                        $result = $pdo->query('SELECT chief FROM department');
                        while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                            $lite = $row[0];
                            print"<option value='$lite'>$lite</option>";
                        }
                    } catch (Exception $e) {
                        print("Error");
                    }
                    ?>
                </select>
                <input class="Form1_Zapros" type="submit" name="Получить">
            </div>
            <script>
                $(document).ready(function () {
                    $('input.Form1_Zapros').on('click', function () {
                        var zapros1_1 = $('select.z1').val();

                        $.ajax({
                            method: "POST",
                            url: "Zap1.php",
                            asyn: true,
                            data: {name1: zapros1_1}
                        })
                            .done(function (msg) {
                                alert(msg);
                                console.log(msg);
                            });

                    });
                });
            </script>

        </div>
    </div>
</div>


</body>
</html>