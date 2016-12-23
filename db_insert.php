<!DOCTYPE html>
<html>
<head>
<style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 30px 36px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
</head>

<body>

<ul>
  <li><a class="active" href="/">Home</a></li>
  <li><a href="db_display.php">이전 검색지역 조회</a></li>
  <li><a href="search_weather.html">구글맵으로 날씨검색</a></li>
  <li><a href="#about">About</a></li>
</ul>

  <img src="sunman.jpg" width="700" height="500">


<?php

$idnumber = $addr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// $idnumber = test_input($_POST["idnumber"]);
 $addr = test_input($_POST["addr"]);
}

function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "localhost";
$username = "cs20111637";
$password = "dbpass";
$dbname = "db20111637";

$connect = mysql_connect($servername, $username, $password)
	or die("DB Connection Failed");
$result = mysql_select_db($dbname, $connect);

$sql = "INSERT INTO MyAddrs (address)
VALUES ('$addr')";

if(mysql_query($sql, $connect)) {
	echo "\nSearched Address has been sent to the DB!";
}

mysql_close($connect);

?>
</body>
</html>
