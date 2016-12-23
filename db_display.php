<H1>DB-Table : MyAddrs' list</H1>
<HR>

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "localhost";
$username = "cs20111637";
$password = "dbpass";
$dbname = "db20111637";

$connect = mysql_connect($servername, $username, $password)
	or die("DB Connection Failed");
mysql_select_db($dbname, $connect);

$sql = "SELECT * FROM MyAddrs";
$result = mysql_query($sql, $connect);

//echo "Total List<br />\n\n";

echo "<table>";
echo "<tr><td>" . "idnumber" . "</td><td>" . "address" . "</td></tr>";

while($row = mysql_fetch_array($result)){
echo "<tr><td>" . $row['idnumber'] . "</td><td>" . $row['address'] . "</td></tr>";
}

echo "</table>";

echo "<br />\n";

mysql_close($connect);

?>

