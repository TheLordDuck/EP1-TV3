<?php
$host="192.168.3.10";
$port=3306;
$socket="";
$user="iris";
$password="iris";
$dbname="irisempresa";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

$query = "SELECT * FROM EMP";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2, $field3, $field4, $field5, $field6,$field7, $field8);
    while ($stmt->fetch()) {
        printf("<li> %s, %s </li>", $field1, $field2);
    }
    $stmt->close();
}
?>