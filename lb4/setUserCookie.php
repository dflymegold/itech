<head>
    <title>cookie setter</title>
</head>
<body>

<?php
$username=$_GET['username'];
setcookie("username",$username);
?>

Cookies were set. You can check this by links below:
<br>
<a href='page1.php'>hello</a><br>
<a href='page2.php'>bye</a>
</body>