<?php
function printTable($result) {
    if (isset($result[0])) {
        print "<table>";
        print "<tr>";
        foreach ($result[0] as $key => $value) {
            print "<th>$key</th>";
        }
        print "</tr>";
        foreach ($result as $row) {
            print "<tr>";
            foreach ($row as $key => $value) {
                print "<td>$value</td>";
            }
            print "</th>";
        }
        print "</table>";
    }
    else {
        print "<p>Данных по указанному запросу не найдено!</p>";
    }
}