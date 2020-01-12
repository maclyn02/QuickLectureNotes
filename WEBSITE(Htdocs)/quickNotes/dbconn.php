<!-- pRoJecT bY krUpesH333 Email:-Krupesh333@gmail.com   -->
<?php
$host="localhost";
$user="root";
$pass="";
$db="kdproject";

$conn=mysql_connect($host,$user,$pass) or die("connection failed");

mysql_select_db($db,$conn) or die("connection failed");
?>